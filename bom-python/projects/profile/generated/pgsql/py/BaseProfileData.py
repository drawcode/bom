import ent
from ent import *

import libs.py.core.data.pgsql
from libs.py.core.data.pgsql import *

class BaseProfileData(object):

    def __init__(self):
        self.connection_string = ''
        self.data_provider = DataProvider()
        
    def CountProfile(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileUsernameHash(self
        , username
        , hash
    ) :
        parameters = []
        parameters.append(username) #"in_username"
        parameters.append(hash) #"in_hash"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_count_username_hash"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileUsername(self
        , username
    ) :
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_count_username"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.first_name) #"in_first_name"
        parameters.append(obj.last_name) #"in_last_name"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.email) #"in_email"
        parameters.append(obj.name) #"in_name"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileUsername(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.first_name) #"in_first_name"
        parameters.append(obj.last_name) #"in_last_name"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.email) #"in_email"
        parameters.append(obj.name) #"in_name"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_set_username"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileUsername(self
        , username
    ) :
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_del_username"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileListUsernameHash(self
        , username
        , hash
    ) :
            
        parameters = []
        parameters.append(username) #"in_username"
        parameters.append(hash) #"in_hash"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_get_username_hash"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileListUsername(self
        , username
    ) :
            
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_get_username"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileTypeUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileTypeTypeId(self
        , type_id
    ) :
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_count_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileTypeListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileTypeUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileTypeUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileTypeListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileTypeListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileTypeListTypeId(self
        , type_id
    ) :
            
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_type_get_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileAttribute(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeType(self
        , type
    ) :
        parameters = []
        parameters.append(type) #"in_type"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_count_type"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeGroup(self
        , group
    ) :
        parameters = []
        parameters.append(group) #"in_group"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_count_group"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeCodeType(self
        , code
        , type
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(type) #"in_type"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_count_code_type"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileAttributeListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileAttributeUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileAttributeCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileAttributeUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileAttributeCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileAttributeListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeListType(self
        , type
    ) :
            
        parameters = []
        parameters.append(type) #"in_type"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_get_type"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeListGroup(self
        , group
    ) :
            
        parameters = []
        parameters.append(group) #"in_group"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_get_group"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeListCodeType(self
        , code
        , type
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(type) #"in_type"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_get_code_type"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileAttributeText(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeTextUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeTextProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeTextProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(attribute_id) #"in_attribute_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_count_profile_id_attribute_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileAttributeTextListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileAttributeTextUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.attribute_id) #"in_attribute_id"
        parameters.append(obj.attribute_value) #"in_attribute_value"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileAttributeTextProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.attribute_id) #"in_attribute_id"
        parameters.append(obj.attribute_value) #"in_attribute_value"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_set_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileAttributeTextProfileIdAttributeId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.attribute_id) #"in_attribute_id"
        parameters.append(obj.attribute_value) #"in_attribute_value"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_set_profile_id_attribute_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileAttributeTextUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileAttributeTextProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_del_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileAttributeTextProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(attribute_id) #"in_attribute_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_del_profile_id_attribute_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileAttributeTextListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeTextListProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeTextListProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(attribute_id) #"in_attribute_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_text_get_profile_id_attribute_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileAttributeData(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeDataUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeDataProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAttributeDataProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(attribute_id) #"in_attribute_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_count_profile_id_attribute_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileAttributeDataListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileAttributeDataUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.attribute_id) #"in_attribute_id"
        parameters.append(obj.attribute_value) #"in_attribute_value"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileAttributeDataProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.attribute_id) #"in_attribute_id"
        parameters.append(obj.attribute_value) #"in_attribute_value"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_set_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileAttributeDataProfileIdAttributeId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.group) #"in_group"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.attribute_id) #"in_attribute_id"
        parameters.append(obj.attribute_value) #"in_attribute_value"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_set_profile_id_attribute_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileAttributeDataUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileAttributeDataProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_del_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileAttributeDataProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(attribute_id) #"in_attribute_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_del_profile_id_attribute_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileAttributeDataListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeDataListProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAttributeDataListProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(attribute_id) #"in_attribute_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_attribute_data_get_profile_id_attribute_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileDevice(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileDeviceUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileDeviceProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(device_id) #"in_device_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_count_profile_id_device_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileDeviceProfileIdToken(self
        , profile_id
        , token
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(token) #"in_token"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_count_profile_id_token"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileDeviceProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileDeviceDeviceId(self
        , device_id
    ) :
        parameters = []
        parameters.append(device_id) #"in_device_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_count_device_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileDeviceToken(self
        , token
    ) :
        parameters = []
        parameters.append(token) #"in_token"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_count_token"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileDeviceListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileDeviceUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.token) #"in_token"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.device_version) #"in_device_version"
        parameters.append(obj.device_type) #"in_device_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.device_os) #"in_device_os"
        parameters.append(obj.device_id) #"in_device_id"
        parameters.append(obj.device_platform) #"in_device_platform"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileDeviceUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileDeviceProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(device_id) #"in_device_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_del_profile_id_device_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileDeviceProfileIdToken(self
        , profile_id
        , token
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(token) #"in_token"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_del_profile_id_token"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileDeviceToken(self
        , token
    ) :
        parameters = []
        parameters.append(token) #"in_token"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_del_token"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileDeviceListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileDeviceListProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(device_id) #"in_device_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_get_profile_id_device_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileDeviceListProfileIdToken(self
        , profile_id
        , token
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(token) #"in_token"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_get_profile_id_token"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileDeviceListProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileDeviceListDeviceId(self
        , device_id
    ) :
            
        parameters = []
        parameters.append(device_id) #"in_device_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_get_device_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileDeviceListToken(self
        , token
    ) :
            
        parameters = []
        parameters.append(token) #"in_token"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_device_get_token"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountCountry(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountCountryUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountCountryCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseCountryListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetCountryUuid(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetCountryCode(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelCountryUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelCountryCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetCountryList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetCountryListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetCountryListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_country_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountState(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountStateUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountStateCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseStateListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetStateUuid(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetStateCode(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelStateUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelStateCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetStateList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetStateListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetStateListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_state_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountCity(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountCityUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountCityCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseCityListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetCityUuid(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetCityCode(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelCityUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelCityCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetCityList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetCityListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetCityListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_city_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountPostalCode(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountPostalCodeUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountPostalCodeCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowsePostalCodeListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetPostalCodeUuid(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetPostalCodeCode(self, set_type, obj) :
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
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelPostalCodeUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelPostalCodeCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetPostalCodeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetPostalCodeListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetPostalCodeListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_postal_code_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None





