<?php // namespace Platform;

require_once('core/data/pgsql/DataProvider.php');

class BasePlatformData {

    public $data;
    
    public function __construct() {
        $this->data = new DataProvider();
    }
    
    public function __destruct() {
        
    }

}

/*

import ent
from ent import *

import libs.core.data.pgsql
from libs.core.data.pgsql import *

class BasePlatformData(object):

    def __init__(self):
        self.connection_string = ''
        self.data_provider = DataProvider()
        
    def CountApp(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppByTypeId(self
        , type_id
    ) :
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_count_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppByCodeByTypeId(self
        , code
        , type_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_count_code_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppByPlatformByTypeId(self
        , platform
        , type_id
    ) :
        parameters = []
        parameters.append(platform) #"in_platform"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_count_platform_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppByPlatform(self
        , platform
    ) :
        parameters = []
        parameters.append(platform) #"in_platform"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_count_platform"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseAppListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetAppByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetAppByCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelAppByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetAppList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppListByTypeId(self
        , type_id
    ) :
            
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_get_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppListByCodeByTypeId(self
        , code
        , type_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_get_code_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppListByPlatformByTypeId(self
        , platform
        , type_id
    ) :
            
        parameters = []
        parameters.append(platform) #"in_platform"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_get_platform_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppListByPlatform(self
        , platform
    ) :
            
        parameters = []
        parameters.append(platform) #"in_platform"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_get_platform"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountAppType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountAppTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseAppTypeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetAppTypeByUuid(self, set_type, obj) :
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
            , "usp_app_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetAppTypeByCode(self, set_type, obj) :
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
            , "usp_app_type_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelAppTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelAppTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetAppTypeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppTypeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetAppTypeListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_app_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountSite(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteByTypeId(self
        , type_id
    ) :
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_count_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteByCodeByTypeId(self
        , code
        , type_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_count_code_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteByDomainByTypeId(self
        , domain
        , type_id
    ) :
        parameters = []
        parameters.append(domain) #"in_domain"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_count_domain_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteByDomain(self
        , domain
    ) :
        parameters = []
        parameters.append(domain) #"in_domain"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_count_domain"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseSiteListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetSiteByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.domain) #"in_domain"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetSiteByCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.domain) #"in_domain"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelSiteByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelSiteByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetSiteList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteListByTypeId(self
        , type_id
    ) :
            
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_get_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteListByCodeByTypeId(self
        , code
        , type_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_get_code_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteListByDomainByTypeId(self
        , domain
        , type_id
    ) :
            
        parameters = []
        parameters.append(domain) #"in_domain"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_get_domain_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteListByDomain(self
        , domain
    ) :
            
        parameters = []
        parameters.append(domain) #"in_domain"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_get_domain"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountSiteType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseSiteTypeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetSiteTypeByUuid(self, set_type, obj) :
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
            , "usp_site_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetSiteTypeByCode(self, set_type, obj) :
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
            , "usp_site_type_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelSiteTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelSiteTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetSiteTypeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteTypeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteTypeListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOrg(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOrgListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOrgByUuid(self, set_type, obj) :
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
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOrgByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOrgList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOrgType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOrgTypeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOrgTypeByUuid(self, set_type, obj) :
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
            , "usp_org_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetOrgTypeByCode(self, set_type, obj) :
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
            , "usp_org_type_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOrgTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOrgTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOrgTypeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgTypeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgTypeListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountContentItem(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentItemByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentItemByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentItemByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentItemByPath(self
        , path
    ) :
        parameters = []
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_count_path"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseContentItemListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetContentItemByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.date_end) #"in_date_end"
        parameters.append(obj.date_start) #"in_date_start"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelContentItemByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelContentItemByPath(self
        , path
    ) :
        parameters = []
        parameters.append(path) #"in_path"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_del_path"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetContentItemList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentItemListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentItemListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentItemListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentItemListByPath(self
        , path
    ) :
            
        parameters = []
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_get_path"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountContentItemType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentItemTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentItemTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseContentItemTypeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetContentItemTypeByUuid(self, set_type, obj) :
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
            , "usp_content_item_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetContentItemTypeByCode(self, set_type, obj) :
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
            , "usp_content_item_type_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelContentItemTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelContentItemTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetContentItemTypeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentItemTypeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentItemTypeListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_item_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountContentPage(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentPageByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentPageByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentPageByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountContentPageByPath(self
        , path
    ) :
        parameters = []
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_count_path"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseContentPageListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetContentPageByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.date_end) #"in_date_end"
        parameters.append(obj.date_start) #"in_date_start"
        parameters.append(obj.site_id) #"in_site_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.template) #"in_template"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelContentPageByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelContentPageByPathBySiteId(self
        , path
        , site_id
    ) :
        parameters = []
        parameters.append(path) #"in_path"
        parameters.append(site_id) #"in_site_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_del_path_site_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelContentPageByPath(self
        , path
    ) :
        parameters = []
        parameters.append(path) #"in_path"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_del_path"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetContentPageList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentPageListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentPageListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentPageListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentPageListByPath(self
        , path
    ) :
            
        parameters = []
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_get_path"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentPageListBySiteId(self
        , site_id
    ) :
            
        parameters = []
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_get_site_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetContentPageListBySiteIdByPath(self
        , site_id
        , path
    ) :
            
        parameters = []
        parameters.append(site_id) #"in_site_id"
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_content_page_get_site_id_path"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountMessage(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_message_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountMessageByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_message_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseMessageListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_message_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetMessageByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.profile_from_name) #"in_profile_from_name"
        parameters.append(obj.read) #"in_read"
        parameters.append(obj.profile_from_id) #"in_profile_from_id"
        parameters.append(obj.profile_to_token) #"in_profile_to_token"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.subject) #"in_subject"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_to_id) #"in_profile_to_id"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.profile_to_name) #"in_profile_to_name"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.sent) #"in_sent"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_message_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelMessageByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_message_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetMessageList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_message_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetMessageListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_message_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOffer(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOfferListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOfferByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.usage_count) #"in_usage_count"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOfferByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOfferByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_del_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOfferList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOfferType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferTypeByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOfferTypeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOfferTypeByUuid(self, set_type, obj) :
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
            , "usp_offer_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOfferTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOfferTypeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferTypeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferTypeListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferTypeListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_type_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOfferLocation(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferLocationByOfferId(self
        , offer_id
    ) :
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_count_offer_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferLocationByCity(self
        , city
    ) :
        parameters = []
        parameters.append(city) #"in_city"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_count_city"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferLocationByCountryCode(self
        , country_code
    ) :
        parameters = []
        parameters.append(country_code) #"in_country_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_count_country_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferLocationByPostalCode(self
        , postal_code
    ) :
        parameters = []
        parameters.append(postal_code) #"in_postal_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_count_postal_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOfferLocationListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOfferLocationByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.fax) #"in_fax"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.address1) #"in_address1"
        parameters.append(obj.twitter) #"in_twitter"
        parameters.append(obj.phone) #"in_phone"
        parameters.append(obj.postal_code) #"in_postal_code"
        parameters.append(obj.offer_id) #"in_offer_id"
        parameters.append(obj.country_code) #"in_country_code"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.state_province) #"in_state_province"
        parameters.append(obj.city) #"in_city"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.dob) #"in_dob"
        parameters.append(obj.date_start) #"in_date_start"
        parameters.append(obj.longitude) #"in_longitude"
        parameters.append(obj.email) #"in_email"
        parameters.append(obj.date_end) #"in_date_end"
        parameters.append(obj.latitude) #"in_latitude"
        parameters.append(obj.facebook) #"in_facebook"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.address2) #"in_address2"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOfferLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOfferLocationList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferLocationListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferLocationListByOfferId(self
        , offer_id
    ) :
            
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_get_offer_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferLocationListByCity(self
        , city
    ) :
            
        parameters = []
        parameters.append(city) #"in_city"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_get_city"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferLocationListByCountryCode(self
        , country_code
    ) :
            
        parameters = []
        parameters.append(country_code) #"in_country_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_get_country_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferLocationListByPostalCode(self
        , postal_code
    ) :
            
        parameters = []
        parameters.append(postal_code) #"in_postal_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_location_get_postal_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOfferCategory(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryByTypeId(self
        , type_id
    ) :
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_count_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryByOrgIdByTypeId(self
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
            , "usp_offer_category_count_org_id_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOfferCategoryListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOfferCategoryByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
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
            , "usp_offer_category_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOfferCategoryByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOfferCategoryByCodeByOrgId(self
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
            , "usp_offer_category_del_code_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOfferCategoryByCodeByOrgIdByTypeId(self
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
            , "usp_offer_category_del_code_org_id_type_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOfferCategoryList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryListByTypeId(self
        , type_id
    ) :
            
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_get_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryListByOrgIdByTypeId(self
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
            , "usp_offer_category_get_org_id_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOfferCategoryTree(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryTreeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryTreeByParentId(self
        , parent_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_count_parent_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryTreeByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_count_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryTreeByParentIdByCategoryId(self
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
            , "usp_offer_category_tree_count_parent_id_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOfferCategoryTreeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOfferCategoryTreeByUuid(self, set_type, obj) :
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
            , "usp_offer_category_tree_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOfferCategoryTreeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOfferCategoryTreeByParentId(self
        , parent_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_del_parent_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOfferCategoryTreeByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_del_category_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOfferCategoryTreeByParentIdByCategoryId(self
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
            , "usp_offer_category_tree_del_parent_id_category_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOfferCategoryTreeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryTreeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryTreeListByParentId(self
        , parent_id
    ) :
            
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_get_parent_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryTreeListByCategoryId(self
        , category_id
    ) :
            
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_tree_get_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryTreeListByParentIdByCategoryId(self
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
            , "usp_offer_category_tree_get_parent_id_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOfferCategoryAssoc(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryAssocByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryAssocByOfferId(self
        , offer_id
    ) :
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_count_offer_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryAssocByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_count_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferCategoryAssocByOfferIdByCategoryId(self
        , offer_id
        , category_id
    ) :
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_count_offer_id_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOfferCategoryAssocListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOfferCategoryAssocByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.offer_id) #"in_offer_id"
        parameters.append(obj.category_id) #"in_category_id"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOfferCategoryAssocByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOfferCategoryAssocList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryAssocListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryAssocListByOfferId(self
        , offer_id
    ) :
            
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_get_offer_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryAssocListByCategoryId(self
        , category_id
    ) :
            
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_get_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferCategoryAssocListByOfferIdByCategoryId(self
        , offer_id
        , category_id
    ) :
            
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_category_assoc_get_offer_id_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOfferGameLocation(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferGameLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferGameLocationByGameLocationId(self
        , game_location_id
    ) :
        parameters = []
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_count_game_location_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferGameLocationByOfferId(self
        , offer_id
    ) :
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_count_offer_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOfferGameLocationByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
    ) :
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_count_offer_id_game_location_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOfferGameLocationListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOfferGameLocationByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.game_location_id) #"in_game_location_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.offer_id) #"in_offer_id"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.data) #"in_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOfferGameLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOfferGameLocationList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferGameLocationListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferGameLocationListByGameLocationId(self
        , game_location_id
    ) :
            
        parameters = []
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_get_game_location_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferGameLocationListByOfferId(self
        , offer_id
    ) :
            
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_get_offer_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOfferGameLocationListByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
    ) :
            
        parameters = []
        parameters.append(offer_id) #"in_offer_id"
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_offer_game_location_get_offer_id_game_location_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountEventInfo(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventInfoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventInfoByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventInfoByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventInfoByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseEventInfoListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetEventInfoByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.usage_count) #"in_usage_count"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelEventInfoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelEventInfoByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_del_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetEventInfoList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventInfoListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventInfoListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventInfoListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventInfoListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_info_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountEventLocation(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventLocationByEventId(self
        , event_id
    ) :
        parameters = []
        parameters.append(event_id) #"in_event_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_count_event_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventLocationByCity(self
        , city
    ) :
        parameters = []
        parameters.append(city) #"in_city"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_count_city"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventLocationByCountryCode(self
        , country_code
    ) :
        parameters = []
        parameters.append(country_code) #"in_country_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_count_country_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventLocationByPostalCode(self
        , postal_code
    ) :
        parameters = []
        parameters.append(postal_code) #"in_postal_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_count_postal_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseEventLocationListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetEventLocationByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.fax) #"in_fax"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.address1) #"in_address1"
        parameters.append(obj.twitter) #"in_twitter"
        parameters.append(obj.phone) #"in_phone"
        parameters.append(obj.postal_code) #"in_postal_code"
        parameters.append(obj.country_code) #"in_country_code"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.state_province) #"in_state_province"
        parameters.append(obj.city) #"in_city"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.dob) #"in_dob"
        parameters.append(obj.date_start) #"in_date_start"
        parameters.append(obj.longitude) #"in_longitude"
        parameters.append(obj.email) #"in_email"
        parameters.append(obj.event_id) #"in_event_id"
        parameters.append(obj.date_end) #"in_date_end"
        parameters.append(obj.latitude) #"in_latitude"
        parameters.append(obj.facebook) #"in_facebook"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.address2) #"in_address2"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelEventLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetEventLocationList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventLocationListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventLocationListByEventId(self
        , event_id
    ) :
            
        parameters = []
        parameters.append(event_id) #"in_event_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_get_event_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventLocationListByCity(self
        , city
    ) :
            
        parameters = []
        parameters.append(city) #"in_city"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_get_city"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventLocationListByCountryCode(self
        , country_code
    ) :
            
        parameters = []
        parameters.append(country_code) #"in_country_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_get_country_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventLocationListByPostalCode(self
        , postal_code
    ) :
            
        parameters = []
        parameters.append(postal_code) #"in_postal_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_location_get_postal_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountEventCategory(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryByTypeId(self
        , type_id
    ) :
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_count_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryByOrgIdByTypeId(self
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
            , "usp_event_category_count_org_id_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseEventCategoryListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetEventCategoryByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
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
            , "usp_event_category_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelEventCategoryByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelEventCategoryByCodeByOrgId(self
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
            , "usp_event_category_del_code_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelEventCategoryByCodeByOrgIdByTypeId(self
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
            , "usp_event_category_del_code_org_id_type_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetEventCategoryList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryListByTypeId(self
        , type_id
    ) :
            
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_get_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryListByOrgIdByTypeId(self
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
            , "usp_event_category_get_org_id_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountEventCategoryTree(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryTreeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryTreeByParentId(self
        , parent_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_count_parent_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryTreeByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_count_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryTreeByParentIdByCategoryId(self
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
            , "usp_event_category_tree_count_parent_id_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseEventCategoryTreeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetEventCategoryTreeByUuid(self, set_type, obj) :
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
            , "usp_event_category_tree_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelEventCategoryTreeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelEventCategoryTreeByParentId(self
        , parent_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_del_parent_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelEventCategoryTreeByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_del_category_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelEventCategoryTreeByParentIdByCategoryId(self
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
            , "usp_event_category_tree_del_parent_id_category_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetEventCategoryTreeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryTreeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryTreeListByParentId(self
        , parent_id
    ) :
            
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_get_parent_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryTreeListByCategoryId(self
        , category_id
    ) :
            
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_tree_get_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryTreeListByParentIdByCategoryId(self
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
            , "usp_event_category_tree_get_parent_id_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountEventCategoryAssoc(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryAssocByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryAssocByEventId(self
        , event_id
    ) :
        parameters = []
        parameters.append(event_id) #"in_event_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_count_event_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryAssocByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_count_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountEventCategoryAssocByEventIdByCategoryId(self
        , event_id
        , category_id
    ) :
        parameters = []
        parameters.append(event_id) #"in_event_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_count_event_id_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseEventCategoryAssocListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetEventCategoryAssocByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.event_id) #"in_event_id"
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
            , "usp_event_category_assoc_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelEventCategoryAssocByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetEventCategoryAssocList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryAssocListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryAssocListByEventId(self
        , event_id
    ) :
            
        parameters = []
        parameters.append(event_id) #"in_event_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_get_event_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryAssocListByCategoryId(self
        , category_id
    ) :
            
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_get_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetEventCategoryAssocListByEventIdByCategoryId(self
        , event_id
        , category_id
    ) :
            
        parameters = []
        parameters.append(event_id) #"in_event_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_event_category_assoc_get_event_id_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountChannel(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelByTypeId(self
        , type_id
    ) :
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_count_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelByOrgIdByTypeId(self
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
            , "usp_channel_count_org_id_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseChannelListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetChannelByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
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
            , "usp_channel_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelChannelByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelChannelByCodeByOrgId(self
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
            , "usp_channel_del_code_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelChannelByCodeByOrgIdByTypeId(self
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
            , "usp_channel_del_code_org_id_type_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetChannelList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelListByTypeId(self
        , type_id
    ) :
            
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_get_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelListByOrgIdByTypeId(self
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
            , "usp_channel_get_org_id_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountChannelType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountChannelTypeByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseChannelTypeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetChannelTypeByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelChannelTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetChannelTypeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelTypeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelTypeListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetChannelTypeListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_channel_type_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountQuestion(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountQuestionByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountQuestionByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountQuestionByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountQuestionByChannelId(self
        , channel_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count_channel_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountQuestionByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count_channel_id_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountQuestionByChannelIdByCode(self
        , channel_id
        , code
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_count_channel_id_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseQuestionListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetQuestionByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.choices) #"in_choices"
        parameters.append(obj.channel_id) #"in_channel_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetQuestionByChannelIdByCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.choices) #"in_choices"
        parameters.append(obj.channel_id) #"in_channel_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_set_channel_id_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelQuestionByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(org_id) #"in_org_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_del_channel_id_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetQuestionList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByType(self
        , type
    ) :
            
        parameters = []
        parameters.append(type) #"in_type"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_type"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByChannelId(self
        , channel_id
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_channel_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_channel_id_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetQuestionListByChannelIdByCode(self
        , channel_id
        , code
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_question_get_channel_id_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileOffer(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileOfferByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileOfferByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileOfferListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileOfferByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.redeem_code) #"in_redeem_code"
        parameters.append(obj.offer_id) #"in_offer_id"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.redeemed) #"in_redeemed"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileOfferByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileOfferByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_del_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileOfferList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileOfferListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileOfferListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_offer_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileApp(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileAppByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_count_profile_id_app_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileAppListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileAppByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.data) #"in_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileAppByProfileIdByAppId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.data) #"in_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_set_profile_id_app_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileAppByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_del_profile_id_app_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileAppList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAppListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAppListByAppId(self
        , app_id
    ) :
            
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_get_app_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAppListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileAppListByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_app_get_profile_id_app_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileOrg(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileOrgByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileOrgByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileOrgByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileOrgListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileOrgByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.data) #"in_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileOrgByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileOrgList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileOrgListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileOrgListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileOrgListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_org_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileQuestion(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByChannelId(self
        , channel_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_channel_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByQuestionId(self
        , question_id
    ) :
        parameters = []
        parameters.append(question_id) #"in_question_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_question_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_channel_id_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_channel_id_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileQuestionByQuestionIdByProfileId(self
        , question_id
        , profile_id
    ) :
        parameters = []
        parameters.append(question_id) #"in_question_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_count_question_id_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileQuestionListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileQuestionByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.channel_id) #"in_channel_id"
        parameters.append(obj.answer) #"in_answer"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.question_id) #"in_question_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileQuestionByChannelIdByProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.channel_id) #"in_channel_id"
        parameters.append(obj.answer) #"in_answer"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.question_id) #"in_question_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_set_channel_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileQuestionByQuestionIdByProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.channel_id) #"in_channel_id"
        parameters.append(obj.answer) #"in_answer"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.question_id) #"in_question_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_set_question_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileQuestionByChannelIdByQuestionIdByProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.channel_id) #"in_channel_id"
        parameters.append(obj.answer) #"in_answer"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.question_id) #"in_question_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_set_channel_id_question_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileQuestionByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(org_id) #"in_org_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_del_channel_id_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileQuestionList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByChannelId(self
        , channel_id
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_channel_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByQuestionId(self
        , question_id
    ) :
            
        parameters = []
        parameters.append(question_id) #"in_question_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_question_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_channel_id_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_channel_id_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileQuestionListByQuestionIdByProfileId(self
        , question_id
        , profile_id
    ) :
            
        parameters = []
        parameters.append(question_id) #"in_question_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_question_get_question_id_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileChannel(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileChannelByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileChannelByChannelId(self
        , channel_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_count_channel_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileChannelByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileChannelByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_count_channel_id_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileChannelListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileChannelByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.channel_id) #"in_channel_id"
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
            , "usp_profile_channel_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileChannelByChannelIdByProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.channel_id) #"in_channel_id"
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
            , "usp_profile_channel_set_channel_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileChannelByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileChannelByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_del_channel_id_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileChannelList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileChannelListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileChannelListByChannelId(self
        , channel_id
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_get_channel_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileChannelListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileChannelListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
            
        parameters = []
        parameters.append(channel_id) #"in_channel_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_channel_get_channel_id_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountOrgSite(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgSiteByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgSiteByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgSiteBySiteId(self
        , site_id
    ) :
        parameters = []
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_count_site_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountOrgSiteByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_count_org_id_site_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseOrgSiteListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetOrgSiteByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.site_id) #"in_site_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.org_id) #"in_org_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetOrgSiteByOrgIdBySiteId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.site_id) #"in_site_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.org_id) #"in_org_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_set_org_id_site_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelOrgSiteByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelOrgSiteByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(site_id) #"in_site_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_del_org_id_site_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetOrgSiteList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgSiteListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgSiteListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgSiteListBySiteId(self
        , site_id
    ) :
            
        parameters = []
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_get_site_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetOrgSiteListByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_org_site_get_org_id_site_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountSiteApp(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteAppByAppId(self
        , app_id
    ) :
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_count_app_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteAppBySiteId(self
        , site_id
    ) :
        parameters = []
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_count_site_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountSiteAppByAppIdBySiteId(self
        , app_id
        , site_id
    ) :
        parameters = []
        parameters.append(app_id) #"in_app_id"
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_count_app_id_site_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseSiteAppListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetSiteAppByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.site_id) #"in_site_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.app_id) #"in_app_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetSiteAppByAppIdBySiteId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.site_id) #"in_site_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.app_id) #"in_app_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_set_app_id_site_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelSiteAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelSiteAppByAppIdBySiteId(self
        , app_id
        , site_id
    ) :
        parameters = []
        parameters.append(app_id) #"in_app_id"
        parameters.append(site_id) #"in_site_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_del_app_id_site_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetSiteAppList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteAppListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteAppListByAppId(self
        , app_id
    ) :
            
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_get_app_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteAppListBySiteId(self
        , site_id
    ) :
            
        parameters = []
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_get_site_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetSiteAppListByAppIdBySiteId(self
        , app_id
        , site_id
    ) :
            
        parameters = []
        parameters.append(app_id) #"in_app_id"
        parameters.append(site_id) #"in_site_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_site_app_get_app_id_site_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountPhoto(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountPhotoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountPhotoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_count_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountPhotoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_count_url"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountPhotoByUrlByExternalId(self
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
            , "usp_photo_count_url_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountPhotoByUuidByExternalId(self
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
            , "usp_photo_count_uuid_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowsePhotoListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetPhotoByUuid(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_photo_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetPhotoByExternalId(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_photo_set_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetPhotoByUrl(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_photo_set_url"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetPhotoByUrlByExternalId(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_photo_set_url_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetPhotoByUuidByExternalId(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_photo_set_uuid_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelPhotoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelPhotoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_del_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelPhotoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_del_url"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelPhotoByUrlByExternalId(self
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
            , "usp_photo_del_url_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelPhotoByUuidByExternalId(self
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
            , "usp_photo_del_uuid_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetPhotoList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetPhotoListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetPhotoListByExternalId(self
        , external_id
    ) :
            
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_get_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetPhotoListByUrl(self
        , url
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_photo_get_url"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetPhotoListByUrlByExternalId(self
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
            , "usp_photo_get_url_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetPhotoListByUuidByExternalId(self
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
            , "usp_photo_get_uuid_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountVideo(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountVideoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountVideoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_count_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountVideoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_count_url"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountVideoByUrlByExternalId(self
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
            , "usp_video_count_url_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountVideoByUuidByExternalId(self
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
            , "usp_video_count_uuid_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseVideoListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetVideoByUuid(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_video_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetVideoByExternalId(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_video_set_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetVideoByUrl(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_video_set_url"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetVideoByUrlByExternalId(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_video_set_url_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetVideoByUuidByExternalId(self, set_type, obj) :
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
        parameters.append(obj.data) #"in_data"
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
            , "usp_video_set_uuid_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelVideoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelVideoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_del_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelVideoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_del_url"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelVideoByUrlByExternalId(self
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
            , "usp_video_del_url_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelVideoByUuidByExternalId(self
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
            , "usp_video_del_uuid_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetVideoList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetVideoListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetVideoListByExternalId(self
        , external_id
    ) :
            
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_get_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetVideoListByUrl(self
        , url
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_video_get_url"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetVideoListByUrlByExternalId(self
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
            , "usp_video_get_url_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetVideoListByUuidByExternalId(self
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
            , "usp_video_get_uuid_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None


*/

?>
