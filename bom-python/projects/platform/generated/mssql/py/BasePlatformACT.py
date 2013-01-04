import ent
from ent import *

import BasePlatformData
from BasePlatformData import *

class BasePlatformACT(object):

    def __init__(self):
        self.connection_string = ''
        self.data = BasePlatformData()
        
        
    def FillApp(self, row) :
        obj = App()

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
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['platform'] != None) :                 
            obj.platform = row['platform'] #dataType.FillData(dr, "platform");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountApp(self
    ) :         
        return self.data.CountApp(
        )
               
    def CountAppUuid(self
        , uuid
    ) :         
        return self.data.CountAppUuid(
            uuid
        )
               
    def CountAppCode(self
        , code
    ) :         
        return self.data.CountAppCode(
            code
        )
               
    def CountAppTypeId(self
        , type_id
    ) :         
        return self.data.CountAppTypeId(
            type_id
        )
               
    def CountAppCodeTypeId(self
        , code
        , type_id
    ) :         
        return self.data.CountAppCodeTypeId(
            code
            , type_id
        )
               
    def CountAppPlatformTypeId(self
        , platform
        , type_id
    ) :         
        return self.data.CountAppPlatformTypeId(
            platform
            , type_id
        )
               
    def CountAppPlatform(self
        , platform
    ) :         
        return self.data.CountAppPlatform(
            platform
        )
               
    def BrowseAppListFilter(self, filter_obj) :
        result = AppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseAppListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                app = self.FillApp(row)
                result.data.append(app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetAppUuid(self, set_type, obj) :            
            return self.data.SetAppUuid(set_type, obj)
            
    def SetAppCode(self, set_type, obj) :            
            return self.data.SetAppCode(set_type, obj)
            
    def DelAppUuid(self
        , uuid
    ) :
        return self.data.DelAppUuid(
            uuid
        )
        
    def DelAppCode(self
        , code
    ) :
        return self.data.DelAppCode(
            code
        )
        
    def GetAppList(self
    ) :

        results = []
        rows = self.data.GetAppList(
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetAppListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetAppListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetAppListTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListCodeTypeId(self
        , code
        , type_id
    ) :

        results = []
        rows = self.data.GetAppListCodeTypeId(
            code
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListPlatformTypeId(self
        , platform
        , type_id
    ) :

        results = []
        rows = self.data.GetAppListPlatformTypeId(
            platform
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListPlatform(self
        , platform
    ) :

        results = []
        rows = self.data.GetAppListPlatform(
            platform
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
        
    def FillAppType(self, row) :
        obj = AppType()

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
        
    def CountAppType(self
    ) :         
        return self.data.CountAppType(
        )
               
    def CountAppTypeUuid(self
        , uuid
    ) :         
        return self.data.CountAppTypeUuid(
            uuid
        )
               
    def CountAppTypeCode(self
        , code
    ) :         
        return self.data.CountAppTypeCode(
            code
        )
               
    def BrowseAppTypeListFilter(self, filter_obj) :
        result = AppTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseAppTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                app_type = self.FillAppType(row)
                result.data.append(app_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetAppTypeUuid(self, set_type, obj) :            
            return self.data.SetAppTypeUuid(set_type, obj)
            
    def SetAppTypeCode(self, set_type, obj) :            
            return self.data.SetAppTypeCode(set_type, obj)
            
    def DelAppTypeUuid(self
        , uuid
    ) :
        return self.data.DelAppTypeUuid(
            uuid
        )
        
    def DelAppTypeCode(self
        , code
    ) :
        return self.data.DelAppTypeCode(
            code
        )
        
    def GetAppTypeList(self
    ) :

        results = []
        rows = self.data.GetAppTypeList(
        )
        
        if(rows != None) :
            for row in rows :
                app_type  = self.FillAppType(row)
                results.append(app_type)
            return results        
        
    def GetAppTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetAppTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                app_type  = self.FillAppType(row)
                results.append(app_type)
            return results        
        
    def GetAppTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetAppTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                app_type  = self.FillAppType(row)
                results.append(app_type)
            return results        
        
        
    def FillSite(self, row) :
        obj = Site()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['domain'] != None) :                 
            obj.domain = row['domain'] #dataType.FillData(dr, "domain");                
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
        
    def CountSite(self
    ) :         
        return self.data.CountSite(
        )
               
    def CountSiteUuid(self
        , uuid
    ) :         
        return self.data.CountSiteUuid(
            uuid
        )
               
    def CountSiteCode(self
        , code
    ) :         
        return self.data.CountSiteCode(
            code
        )
               
    def CountSiteTypeId(self
        , type_id
    ) :         
        return self.data.CountSiteTypeId(
            type_id
        )
               
    def CountSiteCodeTypeId(self
        , code
        , type_id
    ) :         
        return self.data.CountSiteCodeTypeId(
            code
            , type_id
        )
               
    def CountSiteDomainTypeId(self
        , domain
        , type_id
    ) :         
        return self.data.CountSiteDomainTypeId(
            domain
            , type_id
        )
               
    def CountSiteDomain(self
        , domain
    ) :         
        return self.data.CountSiteDomain(
            domain
        )
               
    def BrowseSiteListFilter(self, filter_obj) :
        result = SiteResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseSiteListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                site = self.FillSite(row)
                result.data.append(site)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetSiteUuid(self, set_type, obj) :            
            return self.data.SetSiteUuid(set_type, obj)
            
    def SetSiteCode(self, set_type, obj) :            
            return self.data.SetSiteCode(set_type, obj)
            
    def DelSiteUuid(self
        , uuid
    ) :
        return self.data.DelSiteUuid(
            uuid
        )
        
    def DelSiteCode(self
        , code
    ) :
        return self.data.DelSiteCode(
            code
        )
        
    def GetSiteList(self
    ) :

        results = []
        rows = self.data.GetSiteList(
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetSiteListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetSiteListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetSiteListTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListCodeTypeId(self
        , code
        , type_id
    ) :

        results = []
        rows = self.data.GetSiteListCodeTypeId(
            code
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListDomainTypeId(self
        , domain
        , type_id
    ) :

        results = []
        rows = self.data.GetSiteListDomainTypeId(
            domain
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListDomain(self
        , domain
    ) :

        results = []
        rows = self.data.GetSiteListDomain(
            domain
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
        
    def FillSiteType(self, row) :
        obj = SiteType()

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
        
    def CountSiteType(self
    ) :         
        return self.data.CountSiteType(
        )
               
    def CountSiteTypeUuid(self
        , uuid
    ) :         
        return self.data.CountSiteTypeUuid(
            uuid
        )
               
    def CountSiteTypeCode(self
        , code
    ) :         
        return self.data.CountSiteTypeCode(
            code
        )
               
    def BrowseSiteTypeListFilter(self, filter_obj) :
        result = SiteTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseSiteTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                site_type = self.FillSiteType(row)
                result.data.append(site_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetSiteTypeUuid(self, set_type, obj) :            
            return self.data.SetSiteTypeUuid(set_type, obj)
            
    def SetSiteTypeCode(self, set_type, obj) :            
            return self.data.SetSiteTypeCode(set_type, obj)
            
    def DelSiteTypeUuid(self
        , uuid
    ) :
        return self.data.DelSiteTypeUuid(
            uuid
        )
        
    def DelSiteTypeCode(self
        , code
    ) :
        return self.data.DelSiteTypeCode(
            code
        )
        
    def GetSiteTypeList(self
    ) :

        results = []
        rows = self.data.GetSiteTypeList(
        )
        
        if(rows != None) :
            for row in rows :
                site_type  = self.FillSiteType(row)
                results.append(site_type)
            return results        
        
    def GetSiteTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetSiteTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                site_type  = self.FillSiteType(row)
                results.append(site_type)
            return results        
        
    def GetSiteTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetSiteTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                site_type  = self.FillSiteType(row)
                results.append(site_type)
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
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                
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
               
    def CountOrgUuid(self
        , uuid
    ) :         
        return self.data.CountOrgUuid(
            uuid
        )
               
    def CountOrgCode(self
        , code
    ) :         
        return self.data.CountOrgCode(
            code
        )
               
    def CountOrgName(self
        , name
    ) :         
        return self.data.CountOrgName(
            name
        )
               
    def BrowseOrgListFilter(self, filter_obj) :
        result = OrgResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOrgListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                org = self.FillOrg(row)
                result.data.append(org)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOrgUuid(self, set_type, obj) :            
            return self.data.SetOrgUuid(set_type, obj)
            
    def DelOrgUuid(self
        , uuid
    ) :
        return self.data.DelOrgUuid(
            uuid
        )
        
    def GetOrgList(self
    ) :

        results = []
        rows = self.data.GetOrgList(
        )
        
        if(rows != None) :
            for row in rows :
                org  = self.FillOrg(row)
                results.append(org)
            return results        
        
    def GetOrgListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOrgListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                org  = self.FillOrg(row)
                results.append(org)
            return results        
        
    def GetOrgListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOrgListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                org  = self.FillOrg(row)
                results.append(org)
            return results        
        
    def GetOrgListName(self
        , name
    ) :

        results = []
        rows = self.data.GetOrgListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                org  = self.FillOrg(row)
                results.append(org)
            return results        
        
        
    def FillOrgType(self, row) :
        obj = OrgType()

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
        
    def CountOrgType(self
    ) :         
        return self.data.CountOrgType(
        )
               
    def CountOrgTypeUuid(self
        , uuid
    ) :         
        return self.data.CountOrgTypeUuid(
            uuid
        )
               
    def CountOrgTypeCode(self
        , code
    ) :         
        return self.data.CountOrgTypeCode(
            code
        )
               
    def BrowseOrgTypeListFilter(self, filter_obj) :
        result = OrgTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOrgTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                org_type = self.FillOrgType(row)
                result.data.append(org_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOrgTypeUuid(self, set_type, obj) :            
            return self.data.SetOrgTypeUuid(set_type, obj)
            
    def SetOrgTypeCode(self, set_type, obj) :            
            return self.data.SetOrgTypeCode(set_type, obj)
            
    def DelOrgTypeUuid(self
        , uuid
    ) :
        return self.data.DelOrgTypeUuid(
            uuid
        )
        
    def DelOrgTypeCode(self
        , code
    ) :
        return self.data.DelOrgTypeCode(
            code
        )
        
    def GetOrgTypeList(self
    ) :

        results = []
        rows = self.data.GetOrgTypeList(
        )
        
        if(rows != None) :
            for row in rows :
                org_type  = self.FillOrgType(row)
                results.append(org_type)
            return results        
        
    def GetOrgTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOrgTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                org_type  = self.FillOrgType(row)
                results.append(org_type)
            return results        
        
    def GetOrgTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOrgTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                org_type  = self.FillOrgType(row)
                results.append(org_type)
            return results        
        
        
    def FillContentItem(self, row) :
        obj = ContentItem()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                
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
        if (row['date_end'] != None) :                 
            obj.date_end = row['date_end'] #dataType.FillData(dr, "date_end");                
        if (row['date_start'] != None) :                 
            obj.date_start = row['date_start'] #dataType.FillData(dr, "date_start");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['path'] != None) :                 
            obj.path = row['path'] #dataType.FillData(dr, "path");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountContentItem(self
    ) :         
        return self.data.CountContentItem(
        )
               
    def CountContentItemUuid(self
        , uuid
    ) :         
        return self.data.CountContentItemUuid(
            uuid
        )
               
    def CountContentItemCode(self
        , code
    ) :         
        return self.data.CountContentItemCode(
            code
        )
               
    def CountContentItemName(self
        , name
    ) :         
        return self.data.CountContentItemName(
            name
        )
               
    def CountContentItemPath(self
        , path
    ) :         
        return self.data.CountContentItemPath(
            path
        )
               
    def BrowseContentItemListFilter(self, filter_obj) :
        result = ContentItemResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseContentItemListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                content_item = self.FillContentItem(row)
                result.data.append(content_item)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetContentItemUuid(self, set_type, obj) :            
            return self.data.SetContentItemUuid(set_type, obj)
            
    def DelContentItemUuid(self
        , uuid
    ) :
        return self.data.DelContentItemUuid(
            uuid
        )
        
    def DelContentItemPath(self
        , path
    ) :
        return self.data.DelContentItemPath(
            path
        )
        
    def GetContentItemList(self
    ) :

        results = []
        rows = self.data.GetContentItemList(
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
    def GetContentItemListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetContentItemListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
    def GetContentItemListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetContentItemListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
    def GetContentItemListName(self
        , name
    ) :

        results = []
        rows = self.data.GetContentItemListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
    def GetContentItemListPath(self
        , path
    ) :

        results = []
        rows = self.data.GetContentItemListPath(
            path
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
        
    def FillContentItemType(self, row) :
        obj = ContentItemType()

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
        
    def CountContentItemType(self
    ) :         
        return self.data.CountContentItemType(
        )
               
    def CountContentItemTypeUuid(self
        , uuid
    ) :         
        return self.data.CountContentItemTypeUuid(
            uuid
        )
               
    def CountContentItemTypeCode(self
        , code
    ) :         
        return self.data.CountContentItemTypeCode(
            code
        )
               
    def BrowseContentItemTypeListFilter(self, filter_obj) :
        result = ContentItemTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseContentItemTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                content_item_type = self.FillContentItemType(row)
                result.data.append(content_item_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetContentItemTypeUuid(self, set_type, obj) :            
            return self.data.SetContentItemTypeUuid(set_type, obj)
            
    def SetContentItemTypeCode(self, set_type, obj) :            
            return self.data.SetContentItemTypeCode(set_type, obj)
            
    def DelContentItemTypeUuid(self
        , uuid
    ) :
        return self.data.DelContentItemTypeUuid(
            uuid
        )
        
    def DelContentItemTypeCode(self
        , code
    ) :
        return self.data.DelContentItemTypeCode(
            code
        )
        
    def GetContentItemTypeList(self
    ) :

        results = []
        rows = self.data.GetContentItemTypeList(
        )
        
        if(rows != None) :
            for row in rows :
                content_item_type  = self.FillContentItemType(row)
                results.append(content_item_type)
            return results        
        
    def GetContentItemTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetContentItemTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                content_item_type  = self.FillContentItemType(row)
                results.append(content_item_type)
            return results        
        
    def GetContentItemTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetContentItemTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                content_item_type  = self.FillContentItemType(row)
                results.append(content_item_type)
            return results        
        
        
    def FillContentPage(self, row) :
        obj = ContentPage()

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
        if (row['date_end'] != None) :                 
            obj.date_end = row['date_end'] #dataType.FillData(dr, "date_end");                
        if (row['date_start'] != None) :                 
            obj.date_start = row['date_start'] #dataType.FillData(dr, "date_start");                
        if (row['site_id'] != None) :                 
            obj.site_id = row['site_id'] #dataType.FillData(dr, "site_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['template'] != None) :                 
            obj.template = row['template'] #dataType.FillData(dr, "template");                
        if (row['path'] != None) :                 
            obj.path = row['path'] #dataType.FillData(dr, "path");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountContentPage(self
    ) :         
        return self.data.CountContentPage(
        )
               
    def CountContentPageUuid(self
        , uuid
    ) :         
        return self.data.CountContentPageUuid(
            uuid
        )
               
    def CountContentPageCode(self
        , code
    ) :         
        return self.data.CountContentPageCode(
            code
        )
               
    def CountContentPageName(self
        , name
    ) :         
        return self.data.CountContentPageName(
            name
        )
               
    def CountContentPagePath(self
        , path
    ) :         
        return self.data.CountContentPagePath(
            path
        )
               
    def BrowseContentPageListFilter(self, filter_obj) :
        result = ContentPageResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseContentPageListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                content_page = self.FillContentPage(row)
                result.data.append(content_page)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetContentPageUuid(self, set_type, obj) :            
            return self.data.SetContentPageUuid(set_type, obj)
            
    def DelContentPageUuid(self
        , uuid
    ) :
        return self.data.DelContentPageUuid(
            uuid
        )
        
    def DelContentPagePathSiteId(self
        , path
        , site_id
    ) :
        return self.data.DelContentPagePathSiteId(
            path
            , site_id
        )
        
    def DelContentPagePath(self
        , path
    ) :
        return self.data.DelContentPagePath(
            path
        )
        
    def GetContentPageList(self
    ) :

        results = []
        rows = self.data.GetContentPageList(
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetContentPageListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetContentPageListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListName(self
        , name
    ) :

        results = []
        rows = self.data.GetContentPageListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListPath(self
        , path
    ) :

        results = []
        rows = self.data.GetContentPageListPath(
            path
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListSiteId(self
        , site_id
    ) :

        results = []
        rows = self.data.GetContentPageListSiteId(
            site_id
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListSiteIdPath(self
        , site_id
        , path
    ) :

        results = []
        rows = self.data.GetContentPageListSiteIdPath(
            site_id
            , path
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
        
    def FillMessage(self, row) :
        obj = Message()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['profile_from_name'] != None) :                 
            obj.profile_from_name = row['profile_from_name'] #dataType.FillData(dr, "profile_from_name");                
        if (row['read'] != None) :                 
            obj.read = row['read'] #dataType.FillData(dr, "read");                
        if (row['profile_from_id'] != None) :                 
            obj.profile_from_id = row['profile_from_id'] #dataType.FillData(dr, "profile_from_id");                
        if (row['profile_to_token'] != None) :                 
            obj.profile_to_token = row['profile_to_token'] #dataType.FillData(dr, "profile_to_token");                
        if (row['app_id'] != None) :                 
            obj.app_id = row['app_id'] #dataType.FillData(dr, "app_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['subject'] != None) :                 
            obj.subject = row['subject'] #dataType.FillData(dr, "subject");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['profile_to_id'] != None) :                 
            obj.profile_to_id = row['profile_to_id'] #dataType.FillData(dr, "profile_to_id");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['profile_to_name'] != None) :                 
            obj.profile_to_name = row['profile_to_name'] #dataType.FillData(dr, "profile_to_name");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['sent'] != None) :                 
            obj.sent = row['sent'] #dataType.FillData(dr, "sent");                

        return obj
        
    def CountMessage(self
    ) :         
        return self.data.CountMessage(
        )
               
    def CountMessageUuid(self
        , uuid
    ) :         
        return self.data.CountMessageUuid(
            uuid
        )
               
    def BrowseMessageListFilter(self, filter_obj) :
        result = MessageResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseMessageListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                message = self.FillMessage(row)
                result.data.append(message)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetMessageUuid(self, set_type, obj) :            
            return self.data.SetMessageUuid(set_type, obj)
            
    def DelMessageUuid(self
        , uuid
    ) :
        return self.data.DelMessageUuid(
            uuid
        )
        
    def GetMessageList(self
    ) :

        results = []
        rows = self.data.GetMessageList(
        )
        
        if(rows != None) :
            for row in rows :
                message  = self.FillMessage(row)
                results.append(message)
            return results        
        
    def GetMessageListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetMessageListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                message  = self.FillMessage(row)
                results.append(message)
            return results        
        
        
    def FillOffer(self, row) :
        obj = Offer()

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
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                
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
        
    def CountOffer(self
    ) :         
        return self.data.CountOffer(
        )
               
    def CountOfferUuid(self
        , uuid
    ) :         
        return self.data.CountOfferUuid(
            uuid
        )
               
    def CountOfferCode(self
        , code
    ) :         
        return self.data.CountOfferCode(
            code
        )
               
    def CountOfferName(self
        , name
    ) :         
        return self.data.CountOfferName(
            name
        )
               
    def CountOfferOrgId(self
        , org_id
    ) :         
        return self.data.CountOfferOrgId(
            org_id
        )
               
    def BrowseOfferListFilter(self, filter_obj) :
        result = OfferResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer = self.FillOffer(row)
                result.data.append(offer)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferUuid(self, set_type, obj) :            
            return self.data.SetOfferUuid(set_type, obj)
            
    def DelOfferUuid(self
        , uuid
    ) :
        return self.data.DelOfferUuid(
            uuid
        )
        
    def DelOfferOrgId(self
        , org_id
    ) :
        return self.data.DelOfferOrgId(
            org_id
        )
        
    def GetOfferList(self
    ) :

        results = []
        rows = self.data.GetOfferList(
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
    def GetOfferListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
    def GetOfferListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOfferListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
    def GetOfferListName(self
        , name
    ) :

        results = []
        rows = self.data.GetOfferListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
    def GetOfferListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetOfferListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
        
    def FillOfferType(self, row) :
        obj = OfferType()

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
        
    def CountOfferType(self
    ) :         
        return self.data.CountOfferType(
        )
               
    def CountOfferTypeUuid(self
        , uuid
    ) :         
        return self.data.CountOfferTypeUuid(
            uuid
        )
               
    def CountOfferTypeCode(self
        , code
    ) :         
        return self.data.CountOfferTypeCode(
            code
        )
               
    def CountOfferTypeName(self
        , name
    ) :         
        return self.data.CountOfferTypeName(
            name
        )
               
    def BrowseOfferTypeListFilter(self, filter_obj) :
        result = OfferTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_type = self.FillOfferType(row)
                result.data.append(offer_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferTypeUuid(self, set_type, obj) :            
            return self.data.SetOfferTypeUuid(set_type, obj)
            
    def DelOfferTypeUuid(self
        , uuid
    ) :
        return self.data.DelOfferTypeUuid(
            uuid
        )
        
    def GetOfferTypeList(self
    ) :

        results = []
        rows = self.data.GetOfferTypeList(
        )
        
        if(rows != None) :
            for row in rows :
                offer_type  = self.FillOfferType(row)
                results.append(offer_type)
            return results        
        
    def GetOfferTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_type  = self.FillOfferType(row)
                results.append(offer_type)
            return results        
        
    def GetOfferTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOfferTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                offer_type  = self.FillOfferType(row)
                results.append(offer_type)
            return results        
        
    def GetOfferTypeListName(self
        , name
    ) :

        results = []
        rows = self.data.GetOfferTypeListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                offer_type  = self.FillOfferType(row)
                results.append(offer_type)
            return results        
        
        
    def FillOfferLocation(self, row) :
        obj = OfferLocation()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['fax'] != None) :                 
            obj.fax = row['fax'] #dataType.FillData(dr, "fax");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                
        if (row['address1'] != None) :                 
            obj.address1 = row['address1'] #dataType.FillData(dr, "address1");                
        if (row['twitter'] != None) :                 
            obj.twitter = row['twitter'] #dataType.FillData(dr, "twitter");                
        if (row['phone'] != None) :                 
            obj.phone = row['phone'] #dataType.FillData(dr, "phone");                
        if (row['postal_code'] != None) :                 
            obj.postal_code = row['postal_code'] #dataType.FillData(dr, "postal_code");                
        if (row['offer_id'] != None) :                 
            obj.offer_id = row['offer_id'] #dataType.FillData(dr, "offer_id");                
        if (row['country_code'] != None) :                 
            obj.country_code = row['country_code'] #dataType.FillData(dr, "country_code");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['state_province'] != None) :                 
            obj.state_province = row['state_province'] #dataType.FillData(dr, "state_province");                
        if (row['city'] != None) :                 
            obj.city = row['city'] #dataType.FillData(dr, "city");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['dob'] != None) :                 
            obj.dob = row['dob'] #dataType.FillData(dr, "dob");                
        if (row['date_start'] != None) :                 
            obj.date_start = row['date_start'] #dataType.FillData(dr, "date_start");                
        if (row['longitude'] != None) :                 
            obj.longitude = row['longitude'] #dataType.FillData(dr, "longitude");                
        if (row['email'] != None) :                 
            obj.email = row['email'] #dataType.FillData(dr, "email");                
        if (row['date_end'] != None) :                 
            obj.date_end = row['date_end'] #dataType.FillData(dr, "date_end");                
        if (row['latitude'] != None) :                 
            obj.latitude = row['latitude'] #dataType.FillData(dr, "latitude");                
        if (row['facebook'] != None) :                 
            obj.facebook = row['facebook'] #dataType.FillData(dr, "facebook");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['address2'] != None) :                 
            obj.address2 = row['address2'] #dataType.FillData(dr, "address2");                

        return obj
        
    def CountOfferLocation(self
    ) :         
        return self.data.CountOfferLocation(
        )
               
    def CountOfferLocationUuid(self
        , uuid
    ) :         
        return self.data.CountOfferLocationUuid(
            uuid
        )
               
    def CountOfferLocationOfferId(self
        , offer_id
    ) :         
        return self.data.CountOfferLocationOfferId(
            offer_id
        )
               
    def CountOfferLocationCity(self
        , city
    ) :         
        return self.data.CountOfferLocationCity(
            city
        )
               
    def CountOfferLocationCountryCode(self
        , country_code
    ) :         
        return self.data.CountOfferLocationCountryCode(
            country_code
        )
               
    def CountOfferLocationPostalCode(self
        , postal_code
    ) :         
        return self.data.CountOfferLocationPostalCode(
            postal_code
        )
               
    def BrowseOfferLocationListFilter(self, filter_obj) :
        result = OfferLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferLocationListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_location = self.FillOfferLocation(row)
                result.data.append(offer_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferLocationUuid(self, set_type, obj) :            
            return self.data.SetOfferLocationUuid(set_type, obj)
            
    def DelOfferLocationUuid(self
        , uuid
    ) :
        return self.data.DelOfferLocationUuid(
            uuid
        )
        
    def GetOfferLocationList(self
    ) :

        results = []
        rows = self.data.GetOfferLocationList(
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferLocationListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListOfferId(self
        , offer_id
    ) :

        results = []
        rows = self.data.GetOfferLocationListOfferId(
            offer_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListCity(self
        , city
    ) :

        results = []
        rows = self.data.GetOfferLocationListCity(
            city
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListCountryCode(self
        , country_code
    ) :

        results = []
        rows = self.data.GetOfferLocationListCountryCode(
            country_code
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListPostalCode(self
        , postal_code
    ) :

        results = []
        rows = self.data.GetOfferLocationListPostalCode(
            postal_code
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
        
    def FillOfferCategory(self, row) :
        obj = OfferCategory()

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
        
    def CountOfferCategory(self
    ) :         
        return self.data.CountOfferCategory(
        )
               
    def CountOfferCategoryUuid(self
        , uuid
    ) :         
        return self.data.CountOfferCategoryUuid(
            uuid
        )
               
    def CountOfferCategoryCode(self
        , code
    ) :         
        return self.data.CountOfferCategoryCode(
            code
        )
               
    def CountOfferCategoryName(self
        , name
    ) :         
        return self.data.CountOfferCategoryName(
            name
        )
               
    def CountOfferCategoryOrgId(self
        , org_id
    ) :         
        return self.data.CountOfferCategoryOrgId(
            org_id
        )
               
    def CountOfferCategoryTypeId(self
        , type_id
    ) :         
        return self.data.CountOfferCategoryTypeId(
            type_id
        )
               
    def CountOfferCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountOfferCategoryOrgIdTypeId(
            org_id
            , type_id
        )
               
    def BrowseOfferCategoryListFilter(self, filter_obj) :
        result = OfferCategoryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferCategoryListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_category = self.FillOfferCategory(row)
                result.data.append(offer_category)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferCategoryUuid(self, set_type, obj) :            
            return self.data.SetOfferCategoryUuid(set_type, obj)
            
    def DelOfferCategoryUuid(self
        , uuid
    ) :
        return self.data.DelOfferCategoryUuid(
            uuid
        )
        
    def DelOfferCategoryCodeOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelOfferCategoryCodeOrgId(
            code
            , org_id
        )
        
    def DelOfferCategoryCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelOfferCategoryCodeOrgIdTypeId(
            code
            , org_id
            , type_id
        )
        
    def GetOfferCategoryList(self
    ) :

        results = []
        rows = self.data.GetOfferCategoryList(
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferCategoryListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOfferCategoryListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListName(self
        , name
    ) :

        results = []
        rows = self.data.GetOfferCategoryListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryListTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListOrgIdTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryListOrgIdTypeId(
            org_id
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
        
    def FillOfferCategoryTree(self, row) :
        obj = OfferCategoryTree()

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
        
    def CountOfferCategoryTree(self
    ) :         
        return self.data.CountOfferCategoryTree(
        )
               
    def CountOfferCategoryTreeUuid(self
        , uuid
    ) :         
        return self.data.CountOfferCategoryTreeUuid(
            uuid
        )
               
    def CountOfferCategoryTreeParentId(self
        , parent_id
    ) :         
        return self.data.CountOfferCategoryTreeParentId(
            parent_id
        )
               
    def CountOfferCategoryTreeCategoryId(self
        , category_id
    ) :         
        return self.data.CountOfferCategoryTreeCategoryId(
            category_id
        )
               
    def CountOfferCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.data.CountOfferCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
        )
               
    def BrowseOfferCategoryTreeListFilter(self, filter_obj) :
        result = OfferCategoryTreeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferCategoryTreeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_category_tree = self.FillOfferCategoryTree(row)
                result.data.append(offer_category_tree)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferCategoryTreeUuid(self, set_type, obj) :            
            return self.data.SetOfferCategoryTreeUuid(set_type, obj)
            
    def DelOfferCategoryTreeUuid(self
        , uuid
    ) :
        return self.data.DelOfferCategoryTreeUuid(
            uuid
        )
        
    def DelOfferCategoryTreeParentId(self
        , parent_id
    ) :
        return self.data.DelOfferCategoryTreeParentId(
            parent_id
        )
        
    def DelOfferCategoryTreeCategoryId(self
        , category_id
    ) :
        return self.data.DelOfferCategoryTreeCategoryId(
            category_id
        )
        
    def DelOfferCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        return self.data.DelOfferCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
        )
        
    def GetOfferCategoryTreeList(self
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeList(
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
    def GetOfferCategoryTreeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
    def GetOfferCategoryTreeListParentId(self
        , parent_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListParentId(
            parent_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
    def GetOfferCategoryTreeListCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
    def GetOfferCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
        
    def FillOfferCategoryAssoc(self, row) :
        obj = OfferCategoryAssoc()

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
        if (row['offer_id'] != None) :                 
            obj.offer_id = row['offer_id'] #dataType.FillData(dr, "offer_id");                
        if (row['category_id'] != None) :                 
            obj.category_id = row['category_id'] #dataType.FillData(dr, "category_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountOfferCategoryAssoc(self
    ) :         
        return self.data.CountOfferCategoryAssoc(
        )
               
    def CountOfferCategoryAssocUuid(self
        , uuid
    ) :         
        return self.data.CountOfferCategoryAssocUuid(
            uuid
        )
               
    def CountOfferCategoryAssocOfferId(self
        , offer_id
    ) :         
        return self.data.CountOfferCategoryAssocOfferId(
            offer_id
        )
               
    def CountOfferCategoryAssocCategoryId(self
        , category_id
    ) :         
        return self.data.CountOfferCategoryAssocCategoryId(
            category_id
        )
               
    def CountOfferCategoryAssocOfferIdCategoryId(self
        , offer_id
        , category_id
    ) :         
        return self.data.CountOfferCategoryAssocOfferIdCategoryId(
            offer_id
            , category_id
        )
               
    def BrowseOfferCategoryAssocListFilter(self, filter_obj) :
        result = OfferCategoryAssocResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferCategoryAssocListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_category_assoc = self.FillOfferCategoryAssoc(row)
                result.data.append(offer_category_assoc)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferCategoryAssocUuid(self, set_type, obj) :            
            return self.data.SetOfferCategoryAssocUuid(set_type, obj)
            
    def DelOfferCategoryAssocUuid(self
        , uuid
    ) :
        return self.data.DelOfferCategoryAssocUuid(
            uuid
        )
        
    def GetOfferCategoryAssocList(self
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocList(
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
    def GetOfferCategoryAssocListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
    def GetOfferCategoryAssocListOfferId(self
        , offer_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListOfferId(
            offer_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
    def GetOfferCategoryAssocListCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
    def GetOfferCategoryAssocListOfferIdCategoryId(self
        , offer_id
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListOfferIdCategoryId(
            offer_id
            , category_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
        
    def FillOfferGameLocation(self, row) :
        obj = OfferGameLocation()

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
        if (row['offer_id'] != None) :                 
            obj.offer_id = row['offer_id'] #dataType.FillData(dr, "offer_id");                
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountOfferGameLocation(self
    ) :         
        return self.data.CountOfferGameLocation(
        )
               
    def CountOfferGameLocationUuid(self
        , uuid
    ) :         
        return self.data.CountOfferGameLocationUuid(
            uuid
        )
               
    def CountOfferGameLocationGameLocationId(self
        , game_location_id
    ) :         
        return self.data.CountOfferGameLocationGameLocationId(
            game_location_id
        )
               
    def CountOfferGameLocationOfferId(self
        , offer_id
    ) :         
        return self.data.CountOfferGameLocationOfferId(
            offer_id
        )
               
    def CountOfferGameLocationOfferIdGameLocationId(self
        , offer_id
        , game_location_id
    ) :         
        return self.data.CountOfferGameLocationOfferIdGameLocationId(
            offer_id
            , game_location_id
        )
               
    def BrowseOfferGameLocationListFilter(self, filter_obj) :
        result = OfferGameLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferGameLocationListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_game_location = self.FillOfferGameLocation(row)
                result.data.append(offer_game_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferGameLocationUuid(self, set_type, obj) :            
            return self.data.SetOfferGameLocationUuid(set_type, obj)
            
    def DelOfferGameLocationUuid(self
        , uuid
    ) :
        return self.data.DelOfferGameLocationUuid(
            uuid
        )
        
    def GetOfferGameLocationList(self
    ) :

        results = []
        rows = self.data.GetOfferGameLocationList(
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
    def GetOfferGameLocationListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
    def GetOfferGameLocationListGameLocationId(self
        , game_location_id
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListGameLocationId(
            game_location_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
    def GetOfferGameLocationListOfferId(self
        , offer_id
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListOfferId(
            offer_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
    def GetOfferGameLocationListOfferIdGameLocationId(self
        , offer_id
        , game_location_id
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListOfferIdGameLocationId(
            offer_id
            , game_location_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
        
    def FillEventInfo(self, row) :
        obj = EventInfo()

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
        
    def CountEventInfo(self
    ) :         
        return self.data.CountEventInfo(
        )
               
    def CountEventInfoUuid(self
        , uuid
    ) :         
        return self.data.CountEventInfoUuid(
            uuid
        )
               
    def CountEventInfoCode(self
        , code
    ) :         
        return self.data.CountEventInfoCode(
            code
        )
               
    def CountEventInfoName(self
        , name
    ) :         
        return self.data.CountEventInfoName(
            name
        )
               
    def CountEventInfoOrgId(self
        , org_id
    ) :         
        return self.data.CountEventInfoOrgId(
            org_id
        )
               
    def BrowseEventInfoListFilter(self, filter_obj) :
        result = EventInfoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventInfoListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_info = self.FillEventInfo(row)
                result.data.append(event_info)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventInfoUuid(self, set_type, obj) :            
            return self.data.SetEventInfoUuid(set_type, obj)
            
    def DelEventInfoUuid(self
        , uuid
    ) :
        return self.data.DelEventInfoUuid(
            uuid
        )
        
    def DelEventInfoOrgId(self
        , org_id
    ) :
        return self.data.DelEventInfoOrgId(
            org_id
        )
        
    def GetEventInfoList(self
    ) :

        results = []
        rows = self.data.GetEventInfoList(
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
    def GetEventInfoListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventInfoListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
    def GetEventInfoListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetEventInfoListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
    def GetEventInfoListName(self
        , name
    ) :

        results = []
        rows = self.data.GetEventInfoListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
    def GetEventInfoListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetEventInfoListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
        
    def FillEventLocation(self, row) :
        obj = EventLocation()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['fax'] != None) :                 
            obj.fax = row['fax'] #dataType.FillData(dr, "fax");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                
        if (row['address1'] != None) :                 
            obj.address1 = row['address1'] #dataType.FillData(dr, "address1");                
        if (row['twitter'] != None) :                 
            obj.twitter = row['twitter'] #dataType.FillData(dr, "twitter");                
        if (row['phone'] != None) :                 
            obj.phone = row['phone'] #dataType.FillData(dr, "phone");                
        if (row['postal_code'] != None) :                 
            obj.postal_code = row['postal_code'] #dataType.FillData(dr, "postal_code");                
        if (row['country_code'] != None) :                 
            obj.country_code = row['country_code'] #dataType.FillData(dr, "country_code");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['state_province'] != None) :                 
            obj.state_province = row['state_province'] #dataType.FillData(dr, "state_province");                
        if (row['city'] != None) :                 
            obj.city = row['city'] #dataType.FillData(dr, "city");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['dob'] != None) :                 
            obj.dob = row['dob'] #dataType.FillData(dr, "dob");                
        if (row['date_start'] != None) :                 
            obj.date_start = row['date_start'] #dataType.FillData(dr, "date_start");                
        if (row['longitude'] != None) :                 
            obj.longitude = row['longitude'] #dataType.FillData(dr, "longitude");                
        if (row['email'] != None) :                 
            obj.email = row['email'] #dataType.FillData(dr, "email");                
        if (row['event_id'] != None) :                 
            obj.event_id = row['event_id'] #dataType.FillData(dr, "event_id");                
        if (row['date_end'] != None) :                 
            obj.date_end = row['date_end'] #dataType.FillData(dr, "date_end");                
        if (row['latitude'] != None) :                 
            obj.latitude = row['latitude'] #dataType.FillData(dr, "latitude");                
        if (row['facebook'] != None) :                 
            obj.facebook = row['facebook'] #dataType.FillData(dr, "facebook");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['address2'] != None) :                 
            obj.address2 = row['address2'] #dataType.FillData(dr, "address2");                

        return obj
        
    def CountEventLocation(self
    ) :         
        return self.data.CountEventLocation(
        )
               
    def CountEventLocationUuid(self
        , uuid
    ) :         
        return self.data.CountEventLocationUuid(
            uuid
        )
               
    def CountEventLocationEventId(self
        , event_id
    ) :         
        return self.data.CountEventLocationEventId(
            event_id
        )
               
    def CountEventLocationCity(self
        , city
    ) :         
        return self.data.CountEventLocationCity(
            city
        )
               
    def CountEventLocationCountryCode(self
        , country_code
    ) :         
        return self.data.CountEventLocationCountryCode(
            country_code
        )
               
    def CountEventLocationPostalCode(self
        , postal_code
    ) :         
        return self.data.CountEventLocationPostalCode(
            postal_code
        )
               
    def BrowseEventLocationListFilter(self, filter_obj) :
        result = EventLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventLocationListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_location = self.FillEventLocation(row)
                result.data.append(event_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventLocationUuid(self, set_type, obj) :            
            return self.data.SetEventLocationUuid(set_type, obj)
            
    def DelEventLocationUuid(self
        , uuid
    ) :
        return self.data.DelEventLocationUuid(
            uuid
        )
        
    def GetEventLocationList(self
    ) :

        results = []
        rows = self.data.GetEventLocationList(
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventLocationListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListEventId(self
        , event_id
    ) :

        results = []
        rows = self.data.GetEventLocationListEventId(
            event_id
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListCity(self
        , city
    ) :

        results = []
        rows = self.data.GetEventLocationListCity(
            city
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListCountryCode(self
        , country_code
    ) :

        results = []
        rows = self.data.GetEventLocationListCountryCode(
            country_code
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListPostalCode(self
        , postal_code
    ) :

        results = []
        rows = self.data.GetEventLocationListPostalCode(
            postal_code
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
        
    def FillEventCategory(self, row) :
        obj = EventCategory()

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
        
    def CountEventCategory(self
    ) :         
        return self.data.CountEventCategory(
        )
               
    def CountEventCategoryUuid(self
        , uuid
    ) :         
        return self.data.CountEventCategoryUuid(
            uuid
        )
               
    def CountEventCategoryCode(self
        , code
    ) :         
        return self.data.CountEventCategoryCode(
            code
        )
               
    def CountEventCategoryName(self
        , name
    ) :         
        return self.data.CountEventCategoryName(
            name
        )
               
    def CountEventCategoryOrgId(self
        , org_id
    ) :         
        return self.data.CountEventCategoryOrgId(
            org_id
        )
               
    def CountEventCategoryTypeId(self
        , type_id
    ) :         
        return self.data.CountEventCategoryTypeId(
            type_id
        )
               
    def CountEventCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountEventCategoryOrgIdTypeId(
            org_id
            , type_id
        )
               
    def BrowseEventCategoryListFilter(self, filter_obj) :
        result = EventCategoryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventCategoryListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_category = self.FillEventCategory(row)
                result.data.append(event_category)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventCategoryUuid(self, set_type, obj) :            
            return self.data.SetEventCategoryUuid(set_type, obj)
            
    def DelEventCategoryUuid(self
        , uuid
    ) :
        return self.data.DelEventCategoryUuid(
            uuid
        )
        
    def DelEventCategoryCodeOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelEventCategoryCodeOrgId(
            code
            , org_id
        )
        
    def DelEventCategoryCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelEventCategoryCodeOrgIdTypeId(
            code
            , org_id
            , type_id
        )
        
    def GetEventCategoryList(self
    ) :

        results = []
        rows = self.data.GetEventCategoryList(
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventCategoryListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetEventCategoryListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListName(self
        , name
    ) :

        results = []
        rows = self.data.GetEventCategoryListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetEventCategoryListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetEventCategoryListTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListOrgIdTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetEventCategoryListOrgIdTypeId(
            org_id
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
        
    def FillEventCategoryTree(self, row) :
        obj = EventCategoryTree()

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
        
    def CountEventCategoryTree(self
    ) :         
        return self.data.CountEventCategoryTree(
        )
               
    def CountEventCategoryTreeUuid(self
        , uuid
    ) :         
        return self.data.CountEventCategoryTreeUuid(
            uuid
        )
               
    def CountEventCategoryTreeParentId(self
        , parent_id
    ) :         
        return self.data.CountEventCategoryTreeParentId(
            parent_id
        )
               
    def CountEventCategoryTreeCategoryId(self
        , category_id
    ) :         
        return self.data.CountEventCategoryTreeCategoryId(
            category_id
        )
               
    def CountEventCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.data.CountEventCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
        )
               
    def BrowseEventCategoryTreeListFilter(self, filter_obj) :
        result = EventCategoryTreeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventCategoryTreeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_category_tree = self.FillEventCategoryTree(row)
                result.data.append(event_category_tree)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventCategoryTreeUuid(self, set_type, obj) :            
            return self.data.SetEventCategoryTreeUuid(set_type, obj)
            
    def DelEventCategoryTreeUuid(self
        , uuid
    ) :
        return self.data.DelEventCategoryTreeUuid(
            uuid
        )
        
    def DelEventCategoryTreeParentId(self
        , parent_id
    ) :
        return self.data.DelEventCategoryTreeParentId(
            parent_id
        )
        
    def DelEventCategoryTreeCategoryId(self
        , category_id
    ) :
        return self.data.DelEventCategoryTreeCategoryId(
            category_id
        )
        
    def DelEventCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        return self.data.DelEventCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
        )
        
    def GetEventCategoryTreeList(self
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeList(
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
    def GetEventCategoryTreeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
    def GetEventCategoryTreeListParentId(self
        , parent_id
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListParentId(
            parent_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
    def GetEventCategoryTreeListCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
    def GetEventCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
        
    def FillEventCategoryAssoc(self, row) :
        obj = EventCategoryAssoc()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['event_id'] != None) :                 
            obj.event_id = row['event_id'] #dataType.FillData(dr, "event_id");                
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
        
    def CountEventCategoryAssoc(self
    ) :         
        return self.data.CountEventCategoryAssoc(
        )
               
    def CountEventCategoryAssocUuid(self
        , uuid
    ) :         
        return self.data.CountEventCategoryAssocUuid(
            uuid
        )
               
    def CountEventCategoryAssocEventId(self
        , event_id
    ) :         
        return self.data.CountEventCategoryAssocEventId(
            event_id
        )
               
    def CountEventCategoryAssocCategoryId(self
        , category_id
    ) :         
        return self.data.CountEventCategoryAssocCategoryId(
            category_id
        )
               
    def CountEventCategoryAssocEventIdCategoryId(self
        , event_id
        , category_id
    ) :         
        return self.data.CountEventCategoryAssocEventIdCategoryId(
            event_id
            , category_id
        )
               
    def BrowseEventCategoryAssocListFilter(self, filter_obj) :
        result = EventCategoryAssocResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventCategoryAssocListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_category_assoc = self.FillEventCategoryAssoc(row)
                result.data.append(event_category_assoc)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventCategoryAssocUuid(self, set_type, obj) :            
            return self.data.SetEventCategoryAssocUuid(set_type, obj)
            
    def DelEventCategoryAssocUuid(self
        , uuid
    ) :
        return self.data.DelEventCategoryAssocUuid(
            uuid
        )
        
    def GetEventCategoryAssocList(self
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocList(
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
            return results        
        
    def GetEventCategoryAssocListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
            return results        
        
    def GetEventCategoryAssocListEventId(self
        , event_id
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListEventId(
            event_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
            return results        
        
    def GetEventCategoryAssocListCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
            return results        
        
    def GetEventCategoryAssocListEventIdCategoryId(self
        , event_id
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListEventIdCategoryId(
            event_id
            , category_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
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
               
    def CountChannelUuid(self
        , uuid
    ) :         
        return self.data.CountChannelUuid(
            uuid
        )
               
    def CountChannelCode(self
        , code
    ) :         
        return self.data.CountChannelCode(
            code
        )
               
    def CountChannelName(self
        , name
    ) :         
        return self.data.CountChannelName(
            name
        )
               
    def CountChannelOrgId(self
        , org_id
    ) :         
        return self.data.CountChannelOrgId(
            org_id
        )
               
    def CountChannelTypeId(self
        , type_id
    ) :         
        return self.data.CountChannelTypeId(
            type_id
        )
               
    def CountChannelOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountChannelOrgIdTypeId(
            org_id
            , type_id
        )
               
    def BrowseChannelListFilter(self, filter_obj) :
        result = ChannelResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseChannelListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                channel = self.FillChannel(row)
                result.data.append(channel)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetChannelUuid(self, set_type, obj) :            
            return self.data.SetChannelUuid(set_type, obj)
            
    def DelChannelUuid(self
        , uuid
    ) :
        return self.data.DelChannelUuid(
            uuid
        )
        
    def DelChannelCodeOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelChannelCodeOrgId(
            code
            , org_id
        )
        
    def DelChannelCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelChannelCodeOrgIdTypeId(
            code
            , org_id
            , type_id
        )
        
    def GetChannelList(self
    ) :

        results = []
        rows = self.data.GetChannelList(
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetChannelListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetChannelListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListName(self
        , name
    ) :

        results = []
        rows = self.data.GetChannelListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetChannelListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetChannelListTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListOrgIdTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetChannelListOrgIdTypeId(
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
               
    def CountChannelTypeUuid(self
        , uuid
    ) :         
        return self.data.CountChannelTypeUuid(
            uuid
        )
               
    def CountChannelTypeCode(self
        , code
    ) :         
        return self.data.CountChannelTypeCode(
            code
        )
               
    def CountChannelTypeName(self
        , name
    ) :         
        return self.data.CountChannelTypeName(
            name
        )
               
    def BrowseChannelTypeListFilter(self, filter_obj) :
        result = ChannelTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseChannelTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                channel_type = self.FillChannelType(row)
                result.data.append(channel_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetChannelTypeUuid(self, set_type, obj) :            
            return self.data.SetChannelTypeUuid(set_type, obj)
            
    def DelChannelTypeUuid(self
        , uuid
    ) :
        return self.data.DelChannelTypeUuid(
            uuid
        )
        
    def GetChannelTypeList(self
    ) :

        results = []
        rows = self.data.GetChannelTypeList(
        )
        
        if(rows != None) :
            for row in rows :
                channel_type  = self.FillChannelType(row)
                results.append(channel_type)
            return results        
        
    def GetChannelTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetChannelTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                channel_type  = self.FillChannelType(row)
                results.append(channel_type)
            return results        
        
    def GetChannelTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetChannelTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                channel_type  = self.FillChannelType(row)
                results.append(channel_type)
            return results        
        
    def GetChannelTypeListName(self
        , name
    ) :

        results = []
        rows = self.data.GetChannelTypeListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                channel_type  = self.FillChannelType(row)
                results.append(channel_type)
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
               
    def CountQuestionUuid(self
        , uuid
    ) :         
        return self.data.CountQuestionUuid(
            uuid
        )
               
    def CountQuestionCode(self
        , code
    ) :         
        return self.data.CountQuestionCode(
            code
        )
               
    def CountQuestionName(self
        , name
    ) :         
        return self.data.CountQuestionName(
            name
        )
               
    def CountQuestionChannelId(self
        , channel_id
    ) :         
        return self.data.CountQuestionChannelId(
            channel_id
        )
               
    def CountQuestionOrgId(self
        , org_id
    ) :         
        return self.data.CountQuestionOrgId(
            org_id
        )
               
    def CountQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.data.CountQuestionChannelIdOrgId(
            channel_id
            , org_id
        )
               
    def CountQuestionChannelIdCode(self
        , channel_id
        , code
    ) :         
        return self.data.CountQuestionChannelIdCode(
            channel_id
            , code
        )
               
    def BrowseQuestionListFilter(self, filter_obj) :
        result = QuestionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseQuestionListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                question = self.FillQuestion(row)
                result.data.append(question)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetQuestionUuid(self, set_type, obj) :            
            return self.data.SetQuestionUuid(set_type, obj)
            
    def SetQuestionChannelIdCode(self, set_type, obj) :            
            return self.data.SetQuestionChannelIdCode(set_type, obj)
            
    def DelQuestionUuid(self
        , uuid
    ) :
        return self.data.DelQuestionUuid(
            uuid
        )
        
    def DelQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :
        return self.data.DelQuestionChannelIdOrgId(
            channel_id
            , org_id
        )
        
    def GetQuestionList(self
    ) :

        results = []
        rows = self.data.GetQuestionList(
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetQuestionListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetQuestionListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListName(self
        , name
    ) :

        results = []
        rows = self.data.GetQuestionListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListType(self
        , type
    ) :

        results = []
        rows = self.data.GetQuestionListType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetQuestionListChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetQuestionListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListChannelIdOrgId(self
        , channel_id
        , org_id
    ) :

        results = []
        rows = self.data.GetQuestionListChannelIdOrgId(
            channel_id
            , org_id
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListChannelIdCode(self
        , channel_id
        , code
    ) :

        results = []
        rows = self.data.GetQuestionListChannelIdCode(
            channel_id
            , code
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
        
    def FillProfileOffer(self, row) :
        obj = ProfileOffer()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['redeem_code'] != None) :                 
            obj.redeem_code = row['redeem_code'] #dataType.FillData(dr, "redeem_code");                
        if (row['offer_id'] != None) :                 
            obj.offer_id = row['offer_id'] #dataType.FillData(dr, "offer_id");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['redeemed'] != None) :                 
            obj.redeemed = row['redeemed'] #dataType.FillData(dr, "redeemed");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountProfileOffer(self
    ) :         
        return self.data.CountProfileOffer(
        )
               
    def CountProfileOfferUuid(self
        , uuid
    ) :         
        return self.data.CountProfileOfferUuid(
            uuid
        )
               
    def CountProfileOfferProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileOfferProfileId(
            profile_id
        )
               
    def BrowseProfileOfferListFilter(self, filter_obj) :
        result = ProfileOfferResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileOfferListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_offer = self.FillProfileOffer(row)
                result.data.append(profile_offer)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileOfferUuid(self, set_type, obj) :            
            return self.data.SetProfileOfferUuid(set_type, obj)
            
    def DelProfileOfferUuid(self
        , uuid
    ) :
        return self.data.DelProfileOfferUuid(
            uuid
        )
        
    def DelProfileOfferProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileOfferProfileId(
            profile_id
        )
        
    def GetProfileOfferList(self
    ) :

        results = []
        rows = self.data.GetProfileOfferList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_offer  = self.FillProfileOffer(row)
                results.append(profile_offer)
            return results        
        
    def GetProfileOfferListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileOfferListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_offer  = self.FillProfileOffer(row)
                results.append(profile_offer)
            return results        
        
    def GetProfileOfferListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileOfferListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_offer  = self.FillProfileOffer(row)
                results.append(profile_offer)
            return results        
        
        
    def FillProfileApp(self, row) :
        obj = ProfileApp()

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
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['app_id'] != None) :                 
            obj.app_id = row['app_id'] #dataType.FillData(dr, "app_id");                

        return obj
        
    def CountProfileApp(self
    ) :         
        return self.data.CountProfileApp(
        )
               
    def CountProfileAppUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAppUuid(
            uuid
        )
               
    def CountProfileAppProfileIdAppId(self
        , profile_id
        , app_id
    ) :         
        return self.data.CountProfileAppProfileIdAppId(
            profile_id
            , app_id
        )
               
    def BrowseProfileAppListFilter(self, filter_obj) :
        result = ProfileAppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAppListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_app = self.FillProfileApp(row)
                result.data.append(profile_app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAppUuid(self, set_type, obj) :            
            return self.data.SetProfileAppUuid(set_type, obj)
            
    def SetProfileAppProfileIdAppId(self, set_type, obj) :            
            return self.data.SetProfileAppProfileIdAppId(set_type, obj)
            
    def DelProfileAppUuid(self
        , uuid
    ) :
        return self.data.DelProfileAppUuid(
            uuid
        )
        
    def DelProfileAppProfileIdAppId(self
        , profile_id
        , app_id
    ) :
        return self.data.DelProfileAppProfileIdAppId(
            profile_id
            , app_id
        )
        
    def GetProfileAppList(self
    ) :

        results = []
        rows = self.data.GetProfileAppList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
    def GetProfileAppListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAppListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
    def GetProfileAppListAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetProfileAppListAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
    def GetProfileAppListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileAppListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
    def GetProfileAppListProfileIdAppId(self
        , profile_id
        , app_id
    ) :

        results = []
        rows = self.data.GetProfileAppListProfileIdAppId(
            profile_id
            , app_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
        
    def FillProfileOrg(self, row) :
        obj = ProfileOrg()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
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
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                

        return obj
        
    def CountProfileOrg(self
    ) :         
        return self.data.CountProfileOrg(
        )
               
    def CountProfileOrgUuid(self
        , uuid
    ) :         
        return self.data.CountProfileOrgUuid(
            uuid
        )
               
    def CountProfileOrgOrgId(self
        , org_id
    ) :         
        return self.data.CountProfileOrgOrgId(
            org_id
        )
               
    def CountProfileOrgProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileOrgProfileId(
            profile_id
        )
               
    def BrowseProfileOrgListFilter(self, filter_obj) :
        result = ProfileOrgResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileOrgListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_org = self.FillProfileOrg(row)
                result.data.append(profile_org)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileOrgUuid(self, set_type, obj) :            
            return self.data.SetProfileOrgUuid(set_type, obj)
            
    def DelProfileOrgUuid(self
        , uuid
    ) :
        return self.data.DelProfileOrgUuid(
            uuid
        )
        
    def GetProfileOrgList(self
    ) :

        results = []
        rows = self.data.GetProfileOrgList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_org  = self.FillProfileOrg(row)
                results.append(profile_org)
            return results        
        
    def GetProfileOrgListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileOrgListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_org  = self.FillProfileOrg(row)
                results.append(profile_org)
            return results        
        
    def GetProfileOrgListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileOrgListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_org  = self.FillProfileOrg(row)
                results.append(profile_org)
            return results        
        
    def GetProfileOrgListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileOrgListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_org  = self.FillProfileOrg(row)
                results.append(profile_org)
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
               
    def CountProfileQuestionUuid(self
        , uuid
    ) :         
        return self.data.CountProfileQuestionUuid(
            uuid
        )
               
    def CountProfileQuestionChannelId(self
        , channel_id
    ) :         
        return self.data.CountProfileQuestionChannelId(
            channel_id
        )
               
    def CountProfileQuestionOrgId(self
        , org_id
    ) :         
        return self.data.CountProfileQuestionOrgId(
            org_id
        )
               
    def CountProfileQuestionProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileQuestionProfileId(
            profile_id
        )
               
    def CountProfileQuestionQuestionId(self
        , question_id
    ) :         
        return self.data.CountProfileQuestionQuestionId(
            question_id
        )
               
    def CountProfileQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.data.CountProfileQuestionChannelIdOrgId(
            channel_id
            , org_id
        )
               
    def CountProfileQuestionChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.data.CountProfileQuestionChannelIdProfileId(
            channel_id
            , profile_id
        )
               
    def CountProfileQuestionQuestionIdProfileId(self
        , question_id
        , profile_id
    ) :         
        return self.data.CountProfileQuestionQuestionIdProfileId(
            question_id
            , profile_id
        )
               
    def BrowseProfileQuestionListFilter(self, filter_obj) :
        result = ProfileQuestionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileQuestionListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_question = self.FillProfileQuestion(row)
                result.data.append(profile_question)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileQuestionUuid(self, set_type, obj) :            
            return self.data.SetProfileQuestionUuid(set_type, obj)
            
    def SetProfileQuestionChannelIdProfileId(self, set_type, obj) :            
            return self.data.SetProfileQuestionChannelIdProfileId(set_type, obj)
            
    def SetProfileQuestionQuestionIdProfileId(self, set_type, obj) :            
            return self.data.SetProfileQuestionQuestionIdProfileId(set_type, obj)
            
    def SetProfileQuestionChannelIdQuestionIdProfileId(self, set_type, obj) :            
            return self.data.SetProfileQuestionChannelIdQuestionIdProfileId(set_type, obj)
            
    def DelProfileQuestionUuid(self
        , uuid
    ) :
        return self.data.DelProfileQuestionUuid(
            uuid
        )
        
    def DelProfileQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :
        return self.data.DelProfileQuestionChannelIdOrgId(
            channel_id
            , org_id
        )
        
    def GetProfileQuestionList(self
    ) :

        results = []
        rows = self.data.GetProfileQuestionList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileQuestionListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListQuestionId(self
        , question_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListQuestionId(
            question_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListChannelIdOrgId(self
        , channel_id
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListChannelIdOrgId(
            channel_id
            , org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListChannelIdProfileId(
            channel_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListQuestionIdProfileId(self
        , question_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListQuestionIdProfileId(
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

        return obj
        
    def CountProfileChannel(self
    ) :         
        return self.data.CountProfileChannel(
        )
               
    def CountProfileChannelUuid(self
        , uuid
    ) :         
        return self.data.CountProfileChannelUuid(
            uuid
        )
               
    def CountProfileChannelChannelId(self
        , channel_id
    ) :         
        return self.data.CountProfileChannelChannelId(
            channel_id
        )
               
    def CountProfileChannelProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileChannelProfileId(
            profile_id
        )
               
    def CountProfileChannelChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.data.CountProfileChannelChannelIdProfileId(
            channel_id
            , profile_id
        )
               
    def BrowseProfileChannelListFilter(self, filter_obj) :
        result = ProfileChannelResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileChannelListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_channel = self.FillProfileChannel(row)
                result.data.append(profile_channel)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileChannelUuid(self, set_type, obj) :            
            return self.data.SetProfileChannelUuid(set_type, obj)
            
    def SetProfileChannelChannelIdProfileId(self, set_type, obj) :            
            return self.data.SetProfileChannelChannelIdProfileId(set_type, obj)
            
    def DelProfileChannelUuid(self
        , uuid
    ) :
        return self.data.DelProfileChannelUuid(
            uuid
        )
        
    def DelProfileChannelChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :
        return self.data.DelProfileChannelChannelIdProfileId(
            channel_id
            , profile_id
        )
        
    def GetProfileChannelList(self
    ) :

        results = []
        rows = self.data.GetProfileChannelList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
    def GetProfileChannelListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileChannelListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
    def GetProfileChannelListChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetProfileChannelListChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
    def GetProfileChannelListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileChannelListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
    def GetProfileChannelListChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileChannelListChannelIdProfileId(
            channel_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
        
    def FillOrgSite(self, row) :
        obj = OrgSite()

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
        if (row['site_id'] != None) :                 
            obj.site_id = row['site_id'] #dataType.FillData(dr, "site_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                

        return obj
        
    def CountOrgSite(self
    ) :         
        return self.data.CountOrgSite(
        )
               
    def CountOrgSiteUuid(self
        , uuid
    ) :         
        return self.data.CountOrgSiteUuid(
            uuid
        )
               
    def CountOrgSiteOrgId(self
        , org_id
    ) :         
        return self.data.CountOrgSiteOrgId(
            org_id
        )
               
    def CountOrgSiteSiteId(self
        , site_id
    ) :         
        return self.data.CountOrgSiteSiteId(
            site_id
        )
               
    def CountOrgSiteOrgIdSiteId(self
        , org_id
        , site_id
    ) :         
        return self.data.CountOrgSiteOrgIdSiteId(
            org_id
            , site_id
        )
               
    def BrowseOrgSiteListFilter(self, filter_obj) :
        result = OrgSiteResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOrgSiteListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                org_site = self.FillOrgSite(row)
                result.data.append(org_site)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOrgSiteUuid(self, set_type, obj) :            
            return self.data.SetOrgSiteUuid(set_type, obj)
            
    def SetOrgSiteOrgIdSiteId(self, set_type, obj) :            
            return self.data.SetOrgSiteOrgIdSiteId(set_type, obj)
            
    def DelOrgSiteUuid(self
        , uuid
    ) :
        return self.data.DelOrgSiteUuid(
            uuid
        )
        
    def DelOrgSiteOrgIdSiteId(self
        , org_id
        , site_id
    ) :
        return self.data.DelOrgSiteOrgIdSiteId(
            org_id
            , site_id
        )
        
    def GetOrgSiteList(self
    ) :

        results = []
        rows = self.data.GetOrgSiteList(
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
    def GetOrgSiteListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOrgSiteListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
    def GetOrgSiteListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetOrgSiteListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
    def GetOrgSiteListSiteId(self
        , site_id
    ) :

        results = []
        rows = self.data.GetOrgSiteListSiteId(
            site_id
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
    def GetOrgSiteListOrgIdSiteId(self
        , org_id
        , site_id
    ) :

        results = []
        rows = self.data.GetOrgSiteListOrgIdSiteId(
            org_id
            , site_id
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
        
    def FillSiteApp(self, row) :
        obj = SiteApp()

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
        if (row['site_id'] != None) :                 
            obj.site_id = row['site_id'] #dataType.FillData(dr, "site_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['app_id'] != None) :                 
            obj.app_id = row['app_id'] #dataType.FillData(dr, "app_id");                

        return obj
        
    def CountSiteApp(self
    ) :         
        return self.data.CountSiteApp(
        )
               
    def CountSiteAppUuid(self
        , uuid
    ) :         
        return self.data.CountSiteAppUuid(
            uuid
        )
               
    def CountSiteAppAppId(self
        , app_id
    ) :         
        return self.data.CountSiteAppAppId(
            app_id
        )
               
    def CountSiteAppSiteId(self
        , site_id
    ) :         
        return self.data.CountSiteAppSiteId(
            site_id
        )
               
    def CountSiteAppAppIdSiteId(self
        , app_id
        , site_id
    ) :         
        return self.data.CountSiteAppAppIdSiteId(
            app_id
            , site_id
        )
               
    def BrowseSiteAppListFilter(self, filter_obj) :
        result = SiteAppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseSiteAppListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                site_app = self.FillSiteApp(row)
                result.data.append(site_app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetSiteAppUuid(self, set_type, obj) :            
            return self.data.SetSiteAppUuid(set_type, obj)
            
    def SetSiteAppAppIdSiteId(self, set_type, obj) :            
            return self.data.SetSiteAppAppIdSiteId(set_type, obj)
            
    def DelSiteAppUuid(self
        , uuid
    ) :
        return self.data.DelSiteAppUuid(
            uuid
        )
        
    def DelSiteAppAppIdSiteId(self
        , app_id
        , site_id
    ) :
        return self.data.DelSiteAppAppIdSiteId(
            app_id
            , site_id
        )
        
    def GetSiteAppList(self
    ) :

        results = []
        rows = self.data.GetSiteAppList(
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
    def GetSiteAppListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetSiteAppListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
    def GetSiteAppListAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetSiteAppListAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
    def GetSiteAppListSiteId(self
        , site_id
    ) :

        results = []
        rows = self.data.GetSiteAppListSiteId(
            site_id
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
    def GetSiteAppListAppIdSiteId(self
        , app_id
        , site_id
    ) :

        results = []
        rows = self.data.GetSiteAppListAppIdSiteId(
            app_id
            , site_id
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
        
    def FillPhoto(self, row) :
        obj = Photo()

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
        
    def CountPhoto(self
    ) :         
        return self.data.CountPhoto(
        )
               
    def CountPhotoUuid(self
        , uuid
    ) :         
        return self.data.CountPhotoUuid(
            uuid
        )
               
    def CountPhotoExternalId(self
        , external_id
    ) :         
        return self.data.CountPhotoExternalId(
            external_id
        )
               
    def CountPhotoUrl(self
        , url
    ) :         
        return self.data.CountPhotoUrl(
            url
        )
               
    def CountPhotoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountPhotoUrlExternalId(
            url
            , external_id
        )
               
    def CountPhotoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountPhotoUuidExternalId(
            uuid
            , external_id
        )
               
    def BrowsePhotoListFilter(self, filter_obj) :
        result = PhotoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowsePhotoListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                photo = self.FillPhoto(row)
                result.data.append(photo)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetPhotoUuid(self, set_type, obj) :            
            return self.data.SetPhotoUuid(set_type, obj)
            
    def SetPhotoExternalId(self, set_type, obj) :            
            return self.data.SetPhotoExternalId(set_type, obj)
            
    def SetPhotoUrl(self, set_type, obj) :            
            return self.data.SetPhotoUrl(set_type, obj)
            
    def SetPhotoUrlExternalId(self, set_type, obj) :            
            return self.data.SetPhotoUrlExternalId(set_type, obj)
            
    def SetPhotoUuidExternalId(self, set_type, obj) :            
            return self.data.SetPhotoUuidExternalId(set_type, obj)
            
    def DelPhotoUuid(self
        , uuid
    ) :
        return self.data.DelPhotoUuid(
            uuid
        )
        
    def DelPhotoExternalId(self
        , external_id
    ) :
        return self.data.DelPhotoExternalId(
            external_id
        )
        
    def DelPhotoUrl(self
        , url
    ) :
        return self.data.DelPhotoUrl(
            url
        )
        
    def DelPhotoUrlExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelPhotoUrlExternalId(
            url
            , external_id
        )
        
    def DelPhotoUuidExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelPhotoUuidExternalId(
            uuid
            , external_id
        )
        
    def GetPhotoList(self
    ) :

        results = []
        rows = self.data.GetPhotoList(
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetPhotoListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetPhotoListExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetPhotoListUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListUrlExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetPhotoListUrlExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListUuidExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetPhotoListUuidExternalId(
            uuid
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
        
    def FillVideo(self, row) :
        obj = Video()

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
        
    def CountVideo(self
    ) :         
        return self.data.CountVideo(
        )
               
    def CountVideoUuid(self
        , uuid
    ) :         
        return self.data.CountVideoUuid(
            uuid
        )
               
    def CountVideoExternalId(self
        , external_id
    ) :         
        return self.data.CountVideoExternalId(
            external_id
        )
               
    def CountVideoUrl(self
        , url
    ) :         
        return self.data.CountVideoUrl(
            url
        )
               
    def CountVideoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountVideoUrlExternalId(
            url
            , external_id
        )
               
    def CountVideoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountVideoUuidExternalId(
            uuid
            , external_id
        )
               
    def BrowseVideoListFilter(self, filter_obj) :
        result = VideoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseVideoListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                video = self.FillVideo(row)
                result.data.append(video)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetVideoUuid(self, set_type, obj) :            
            return self.data.SetVideoUuid(set_type, obj)
            
    def SetVideoExternalId(self, set_type, obj) :            
            return self.data.SetVideoExternalId(set_type, obj)
            
    def SetVideoUrl(self, set_type, obj) :            
            return self.data.SetVideoUrl(set_type, obj)
            
    def SetVideoUrlExternalId(self, set_type, obj) :            
            return self.data.SetVideoUrlExternalId(set_type, obj)
            
    def SetVideoUuidExternalId(self, set_type, obj) :            
            return self.data.SetVideoUuidExternalId(set_type, obj)
            
    def DelVideoUuid(self
        , uuid
    ) :
        return self.data.DelVideoUuid(
            uuid
        )
        
    def DelVideoExternalId(self
        , external_id
    ) :
        return self.data.DelVideoExternalId(
            external_id
        )
        
    def DelVideoUrl(self
        , url
    ) :
        return self.data.DelVideoUrl(
            url
        )
        
    def DelVideoUrlExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelVideoUrlExternalId(
            url
            , external_id
        )
        
    def DelVideoUuidExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelVideoUuidExternalId(
            uuid
            , external_id
        )
        
    def GetVideoList(self
    ) :

        results = []
        rows = self.data.GetVideoList(
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetVideoListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetVideoListExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetVideoListUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListUrlExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetVideoListUrlExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListUuidExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetVideoListUuidExternalId(
            uuid
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        



