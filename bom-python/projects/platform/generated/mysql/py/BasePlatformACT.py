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
               
    def CountAppByUuid(self
        , uuid
    ) :         
        return self.data.CountAppByUuid(
            uuid
        )
               
    def CountAppByCode(self
        , code
    ) :         
        return self.data.CountAppByCode(
            code
        )
               
    def CountAppByTypeId(self
        , type_id
    ) :         
        return self.data.CountAppByTypeId(
            type_id
        )
               
    def CountAppByCodeByTypeId(self
        , code
        , type_id
    ) :         
        return self.data.CountAppByCodeByTypeId(
            code
            , type_id
        )
               
    def CountAppByPlatformByTypeId(self
        , platform
        , type_id
    ) :         
        return self.data.CountAppByPlatformByTypeId(
            platform
            , type_id
        )
               
    def CountAppByPlatform(self
        , platform
    ) :         
        return self.data.CountAppByPlatform(
            platform
        )
               
    def BrowseAppListByFilter(self, filter_obj) :
        result = AppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseAppListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                app = self.FillApp(row)
                result.data.append(app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetAppByUuid(self, set_type, obj) :            
            return self.data.SetAppByUuid(set_type, obj)
            
    def SetAppByCode(self, set_type, obj) :            
            return self.data.SetAppByCode(set_type, obj)
            
    def DelAppByUuid(self
        , uuid
    ) :
        return self.data.DelAppByUuid(
            uuid
        )
        
    def DelAppByCode(self
        , code
    ) :
        return self.data.DelAppByCode(
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
        
    def GetAppListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetAppListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetAppListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListByTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetAppListByTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListByCodeByTypeId(self
        , code
        , type_id
    ) :

        results = []
        rows = self.data.GetAppListByCodeByTypeId(
            code
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListByPlatformByTypeId(self
        , platform
        , type_id
    ) :

        results = []
        rows = self.data.GetAppListByPlatformByTypeId(
            platform
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                app  = self.FillApp(row)
                results.append(app)
            return results        
        
    def GetAppListByPlatform(self
        , platform
    ) :

        results = []
        rows = self.data.GetAppListByPlatform(
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
               
    def CountAppTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountAppTypeByUuid(
            uuid
        )
               
    def CountAppTypeByCode(self
        , code
    ) :         
        return self.data.CountAppTypeByCode(
            code
        )
               
    def BrowseAppTypeListByFilter(self, filter_obj) :
        result = AppTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseAppTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                app_type = self.FillAppType(row)
                result.data.append(app_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetAppTypeByUuid(self, set_type, obj) :            
            return self.data.SetAppTypeByUuid(set_type, obj)
            
    def SetAppTypeByCode(self, set_type, obj) :            
            return self.data.SetAppTypeByCode(set_type, obj)
            
    def DelAppTypeByUuid(self
        , uuid
    ) :
        return self.data.DelAppTypeByUuid(
            uuid
        )
        
    def DelAppTypeByCode(self
        , code
    ) :
        return self.data.DelAppTypeByCode(
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
        
    def GetAppTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetAppTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                app_type  = self.FillAppType(row)
                results.append(app_type)
            return results        
        
    def GetAppTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetAppTypeListByCode(
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
               
    def CountSiteByUuid(self
        , uuid
    ) :         
        return self.data.CountSiteByUuid(
            uuid
        )
               
    def CountSiteByCode(self
        , code
    ) :         
        return self.data.CountSiteByCode(
            code
        )
               
    def CountSiteByTypeId(self
        , type_id
    ) :         
        return self.data.CountSiteByTypeId(
            type_id
        )
               
    def CountSiteByCodeByTypeId(self
        , code
        , type_id
    ) :         
        return self.data.CountSiteByCodeByTypeId(
            code
            , type_id
        )
               
    def CountSiteByDomainByTypeId(self
        , domain
        , type_id
    ) :         
        return self.data.CountSiteByDomainByTypeId(
            domain
            , type_id
        )
               
    def CountSiteByDomain(self
        , domain
    ) :         
        return self.data.CountSiteByDomain(
            domain
        )
               
    def BrowseSiteListByFilter(self, filter_obj) :
        result = SiteResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseSiteListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                site = self.FillSite(row)
                result.data.append(site)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetSiteByUuid(self, set_type, obj) :            
            return self.data.SetSiteByUuid(set_type, obj)
            
    def SetSiteByCode(self, set_type, obj) :            
            return self.data.SetSiteByCode(set_type, obj)
            
    def DelSiteByUuid(self
        , uuid
    ) :
        return self.data.DelSiteByUuid(
            uuid
        )
        
    def DelSiteByCode(self
        , code
    ) :
        return self.data.DelSiteByCode(
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
        
    def GetSiteListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetSiteListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetSiteListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListByTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetSiteListByTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListByCodeByTypeId(self
        , code
        , type_id
    ) :

        results = []
        rows = self.data.GetSiteListByCodeByTypeId(
            code
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListByDomainByTypeId(self
        , domain
        , type_id
    ) :

        results = []
        rows = self.data.GetSiteListByDomainByTypeId(
            domain
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                site  = self.FillSite(row)
                results.append(site)
            return results        
        
    def GetSiteListByDomain(self
        , domain
    ) :

        results = []
        rows = self.data.GetSiteListByDomain(
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
               
    def CountSiteTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountSiteTypeByUuid(
            uuid
        )
               
    def CountSiteTypeByCode(self
        , code
    ) :         
        return self.data.CountSiteTypeByCode(
            code
        )
               
    def BrowseSiteTypeListByFilter(self, filter_obj) :
        result = SiteTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseSiteTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                site_type = self.FillSiteType(row)
                result.data.append(site_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetSiteTypeByUuid(self, set_type, obj) :            
            return self.data.SetSiteTypeByUuid(set_type, obj)
            
    def SetSiteTypeByCode(self, set_type, obj) :            
            return self.data.SetSiteTypeByCode(set_type, obj)
            
    def DelSiteTypeByUuid(self
        , uuid
    ) :
        return self.data.DelSiteTypeByUuid(
            uuid
        )
        
    def DelSiteTypeByCode(self
        , code
    ) :
        return self.data.DelSiteTypeByCode(
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
        
    def GetSiteTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetSiteTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                site_type  = self.FillSiteType(row)
                results.append(site_type)
            return results        
        
    def GetSiteTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetSiteTypeListByCode(
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
               
    def CountOrgTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountOrgTypeByUuid(
            uuid
        )
               
    def CountOrgTypeByCode(self
        , code
    ) :         
        return self.data.CountOrgTypeByCode(
            code
        )
               
    def BrowseOrgTypeListByFilter(self, filter_obj) :
        result = OrgTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOrgTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                org_type = self.FillOrgType(row)
                result.data.append(org_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOrgTypeByUuid(self, set_type, obj) :            
            return self.data.SetOrgTypeByUuid(set_type, obj)
            
    def SetOrgTypeByCode(self, set_type, obj) :            
            return self.data.SetOrgTypeByCode(set_type, obj)
            
    def DelOrgTypeByUuid(self
        , uuid
    ) :
        return self.data.DelOrgTypeByUuid(
            uuid
        )
        
    def DelOrgTypeByCode(self
        , code
    ) :
        return self.data.DelOrgTypeByCode(
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
        
    def GetOrgTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOrgTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                org_type  = self.FillOrgType(row)
                results.append(org_type)
            return results        
        
    def GetOrgTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOrgTypeListByCode(
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
               
    def CountContentItemByUuid(self
        , uuid
    ) :         
        return self.data.CountContentItemByUuid(
            uuid
        )
               
    def CountContentItemByCode(self
        , code
    ) :         
        return self.data.CountContentItemByCode(
            code
        )
               
    def CountContentItemByName(self
        , name
    ) :         
        return self.data.CountContentItemByName(
            name
        )
               
    def CountContentItemByPath(self
        , path
    ) :         
        return self.data.CountContentItemByPath(
            path
        )
               
    def BrowseContentItemListByFilter(self, filter_obj) :
        result = ContentItemResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseContentItemListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                content_item = self.FillContentItem(row)
                result.data.append(content_item)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetContentItemByUuid(self, set_type, obj) :            
            return self.data.SetContentItemByUuid(set_type, obj)
            
    def DelContentItemByUuid(self
        , uuid
    ) :
        return self.data.DelContentItemByUuid(
            uuid
        )
        
    def DelContentItemByPath(self
        , path
    ) :
        return self.data.DelContentItemByPath(
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
        
    def GetContentItemListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetContentItemListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
    def GetContentItemListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetContentItemListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
    def GetContentItemListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetContentItemListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                content_item  = self.FillContentItem(row)
                results.append(content_item)
            return results        
        
    def GetContentItemListByPath(self
        , path
    ) :

        results = []
        rows = self.data.GetContentItemListByPath(
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
               
    def CountContentItemTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountContentItemTypeByUuid(
            uuid
        )
               
    def CountContentItemTypeByCode(self
        , code
    ) :         
        return self.data.CountContentItemTypeByCode(
            code
        )
               
    def BrowseContentItemTypeListByFilter(self, filter_obj) :
        result = ContentItemTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseContentItemTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                content_item_type = self.FillContentItemType(row)
                result.data.append(content_item_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetContentItemTypeByUuid(self, set_type, obj) :            
            return self.data.SetContentItemTypeByUuid(set_type, obj)
            
    def SetContentItemTypeByCode(self, set_type, obj) :            
            return self.data.SetContentItemTypeByCode(set_type, obj)
            
    def DelContentItemTypeByUuid(self
        , uuid
    ) :
        return self.data.DelContentItemTypeByUuid(
            uuid
        )
        
    def DelContentItemTypeByCode(self
        , code
    ) :
        return self.data.DelContentItemTypeByCode(
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
        
    def GetContentItemTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetContentItemTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                content_item_type  = self.FillContentItemType(row)
                results.append(content_item_type)
            return results        
        
    def GetContentItemTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetContentItemTypeListByCode(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountContentPageByUuid(self
        , uuid
    ) :         
        return self.data.CountContentPageByUuid(
            uuid
        )
               
    def CountContentPageByCode(self
        , code
    ) :         
        return self.data.CountContentPageByCode(
            code
        )
               
    def CountContentPageByName(self
        , name
    ) :         
        return self.data.CountContentPageByName(
            name
        )
               
    def CountContentPageByPath(self
        , path
    ) :         
        return self.data.CountContentPageByPath(
            path
        )
               
    def BrowseContentPageListByFilter(self, filter_obj) :
        result = ContentPageResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseContentPageListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                content_page = self.FillContentPage(row)
                result.data.append(content_page)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetContentPageByUuid(self, set_type, obj) :            
            return self.data.SetContentPageByUuid(set_type, obj)
            
    def DelContentPageByUuid(self
        , uuid
    ) :
        return self.data.DelContentPageByUuid(
            uuid
        )
        
    def DelContentPageByPathBySiteId(self
        , path
        , site_id
    ) :
        return self.data.DelContentPageByPathBySiteId(
            path
            , site_id
        )
        
    def DelContentPageByPath(self
        , path
    ) :
        return self.data.DelContentPageByPath(
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
        
    def GetContentPageListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetContentPageListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetContentPageListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetContentPageListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListByPath(self
        , path
    ) :

        results = []
        rows = self.data.GetContentPageListByPath(
            path
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListBySiteId(self
        , site_id
    ) :

        results = []
        rows = self.data.GetContentPageListBySiteId(
            site_id
        )
        
        if(rows != None) :
            for row in rows :
                content_page  = self.FillContentPage(row)
                results.append(content_page)
            return results        
        
    def GetContentPageListBySiteIdByPath(self
        , site_id
        , path
    ) :

        results = []
        rows = self.data.GetContentPageListBySiteIdByPath(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountMessageByUuid(self
        , uuid
    ) :         
        return self.data.CountMessageByUuid(
            uuid
        )
               
    def BrowseMessageListByFilter(self, filter_obj) :
        result = MessageResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseMessageListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                message = self.FillMessage(row)
                result.data.append(message)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetMessageByUuid(self, set_type, obj) :            
            return self.data.SetMessageByUuid(set_type, obj)
            
    def DelMessageByUuid(self
        , uuid
    ) :
        return self.data.DelMessageByUuid(
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
        
    def GetMessageListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetMessageListByUuid(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountOfferByUuid(self
        , uuid
    ) :         
        return self.data.CountOfferByUuid(
            uuid
        )
               
    def CountOfferByCode(self
        , code
    ) :         
        return self.data.CountOfferByCode(
            code
        )
               
    def CountOfferByName(self
        , name
    ) :         
        return self.data.CountOfferByName(
            name
        )
               
    def CountOfferByOrgId(self
        , org_id
    ) :         
        return self.data.CountOfferByOrgId(
            org_id
        )
               
    def BrowseOfferListByFilter(self, filter_obj) :
        result = OfferResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer = self.FillOffer(row)
                result.data.append(offer)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferByUuid(self, set_type, obj) :            
            return self.data.SetOfferByUuid(set_type, obj)
            
    def DelOfferByUuid(self
        , uuid
    ) :
        return self.data.DelOfferByUuid(
            uuid
        )
        
    def DelOfferByOrgId(self
        , org_id
    ) :
        return self.data.DelOfferByOrgId(
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
        
    def GetOfferListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
    def GetOfferListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOfferListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
    def GetOfferListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetOfferListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                offer  = self.FillOffer(row)
                results.append(offer)
            return results        
        
    def GetOfferListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetOfferListByOrgId(
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
               
    def CountOfferTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountOfferTypeByUuid(
            uuid
        )
               
    def CountOfferTypeByCode(self
        , code
    ) :         
        return self.data.CountOfferTypeByCode(
            code
        )
               
    def CountOfferTypeByName(self
        , name
    ) :         
        return self.data.CountOfferTypeByName(
            name
        )
               
    def BrowseOfferTypeListByFilter(self, filter_obj) :
        result = OfferTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_type = self.FillOfferType(row)
                result.data.append(offer_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferTypeByUuid(self, set_type, obj) :            
            return self.data.SetOfferTypeByUuid(set_type, obj)
            
    def DelOfferTypeByUuid(self
        , uuid
    ) :
        return self.data.DelOfferTypeByUuid(
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
        
    def GetOfferTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_type  = self.FillOfferType(row)
                results.append(offer_type)
            return results        
        
    def GetOfferTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOfferTypeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                offer_type  = self.FillOfferType(row)
                results.append(offer_type)
            return results        
        
    def GetOfferTypeListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetOfferTypeListByName(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountOfferLocationByUuid(self
        , uuid
    ) :         
        return self.data.CountOfferLocationByUuid(
            uuid
        )
               
    def CountOfferLocationByOfferId(self
        , offer_id
    ) :         
        return self.data.CountOfferLocationByOfferId(
            offer_id
        )
               
    def CountOfferLocationByCity(self
        , city
    ) :         
        return self.data.CountOfferLocationByCity(
            city
        )
               
    def CountOfferLocationByCountryCode(self
        , country_code
    ) :         
        return self.data.CountOfferLocationByCountryCode(
            country_code
        )
               
    def CountOfferLocationByPostalCode(self
        , postal_code
    ) :         
        return self.data.CountOfferLocationByPostalCode(
            postal_code
        )
               
    def BrowseOfferLocationListByFilter(self, filter_obj) :
        result = OfferLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferLocationListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_location = self.FillOfferLocation(row)
                result.data.append(offer_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferLocationByUuid(self, set_type, obj) :            
            return self.data.SetOfferLocationByUuid(set_type, obj)
            
    def DelOfferLocationByUuid(self
        , uuid
    ) :
        return self.data.DelOfferLocationByUuid(
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
        
    def GetOfferLocationListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferLocationListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListByOfferId(self
        , offer_id
    ) :

        results = []
        rows = self.data.GetOfferLocationListByOfferId(
            offer_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListByCity(self
        , city
    ) :

        results = []
        rows = self.data.GetOfferLocationListByCity(
            city
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListByCountryCode(self
        , country_code
    ) :

        results = []
        rows = self.data.GetOfferLocationListByCountryCode(
            country_code
        )
        
        if(rows != None) :
            for row in rows :
                offer_location  = self.FillOfferLocation(row)
                results.append(offer_location)
            return results        
        
    def GetOfferLocationListByPostalCode(self
        , postal_code
    ) :

        results = []
        rows = self.data.GetOfferLocationListByPostalCode(
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
        
    def CountOfferCategory(self
    ) :         
        return self.data.CountOfferCategory(
        )
               
    def CountOfferCategoryByUuid(self
        , uuid
    ) :         
        return self.data.CountOfferCategoryByUuid(
            uuid
        )
               
    def CountOfferCategoryByCode(self
        , code
    ) :         
        return self.data.CountOfferCategoryByCode(
            code
        )
               
    def CountOfferCategoryByName(self
        , name
    ) :         
        return self.data.CountOfferCategoryByName(
            name
        )
               
    def CountOfferCategoryByOrgId(self
        , org_id
    ) :         
        return self.data.CountOfferCategoryByOrgId(
            org_id
        )
               
    def CountOfferCategoryByTypeId(self
        , type_id
    ) :         
        return self.data.CountOfferCategoryByTypeId(
            type_id
        )
               
    def CountOfferCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountOfferCategoryByOrgIdByTypeId(
            org_id
            , type_id
        )
               
    def BrowseOfferCategoryListByFilter(self, filter_obj) :
        result = OfferCategoryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferCategoryListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_category = self.FillOfferCategory(row)
                result.data.append(offer_category)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferCategoryByUuid(self, set_type, obj) :            
            return self.data.SetOfferCategoryByUuid(set_type, obj)
            
    def DelOfferCategoryByUuid(self
        , uuid
    ) :
        return self.data.DelOfferCategoryByUuid(
            uuid
        )
        
    def DelOfferCategoryByCodeByOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelOfferCategoryByCodeByOrgId(
            code
            , org_id
        )
        
    def DelOfferCategoryByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelOfferCategoryByCodeByOrgIdByTypeId(
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
        
    def GetOfferCategoryListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferCategoryListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOfferCategoryListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetOfferCategoryListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListByTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryListByTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category  = self.FillOfferCategory(row)
                results.append(offer_category)
            return results        
        
    def GetOfferCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryListByOrgIdByTypeId(
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
               
    def CountOfferCategoryTreeByUuid(self
        , uuid
    ) :         
        return self.data.CountOfferCategoryTreeByUuid(
            uuid
        )
               
    def CountOfferCategoryTreeByParentId(self
        , parent_id
    ) :         
        return self.data.CountOfferCategoryTreeByParentId(
            parent_id
        )
               
    def CountOfferCategoryTreeByCategoryId(self
        , category_id
    ) :         
        return self.data.CountOfferCategoryTreeByCategoryId(
            category_id
        )
               
    def CountOfferCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.data.CountOfferCategoryTreeByParentIdByCategoryId(
            parent_id
            , category_id
        )
               
    def BrowseOfferCategoryTreeListByFilter(self, filter_obj) :
        result = OfferCategoryTreeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferCategoryTreeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_category_tree = self.FillOfferCategoryTree(row)
                result.data.append(offer_category_tree)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferCategoryTreeByUuid(self, set_type, obj) :            
            return self.data.SetOfferCategoryTreeByUuid(set_type, obj)
            
    def DelOfferCategoryTreeByUuid(self
        , uuid
    ) :
        return self.data.DelOfferCategoryTreeByUuid(
            uuid
        )
        
    def DelOfferCategoryTreeByParentId(self
        , parent_id
    ) :
        return self.data.DelOfferCategoryTreeByParentId(
            parent_id
        )
        
    def DelOfferCategoryTreeByCategoryId(self
        , category_id
    ) :
        return self.data.DelOfferCategoryTreeByCategoryId(
            category_id
        )
        
    def DelOfferCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        return self.data.DelOfferCategoryTreeByParentIdByCategoryId(
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
        
    def GetOfferCategoryTreeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
    def GetOfferCategoryTreeListByParentId(self
        , parent_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListByParentId(
            parent_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
    def GetOfferCategoryTreeListByCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListByCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_tree  = self.FillOfferCategoryTree(row)
                results.append(offer_category_tree)
            return results        
        
    def GetOfferCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryTreeListByParentIdByCategoryId(
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
               
    def CountOfferCategoryAssocByUuid(self
        , uuid
    ) :         
        return self.data.CountOfferCategoryAssocByUuid(
            uuid
        )
               
    def CountOfferCategoryAssocByOfferId(self
        , offer_id
    ) :         
        return self.data.CountOfferCategoryAssocByOfferId(
            offer_id
        )
               
    def CountOfferCategoryAssocByCategoryId(self
        , category_id
    ) :         
        return self.data.CountOfferCategoryAssocByCategoryId(
            category_id
        )
               
    def CountOfferCategoryAssocByOfferIdByCategoryId(self
        , offer_id
        , category_id
    ) :         
        return self.data.CountOfferCategoryAssocByOfferIdByCategoryId(
            offer_id
            , category_id
        )
               
    def BrowseOfferCategoryAssocListByFilter(self, filter_obj) :
        result = OfferCategoryAssocResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferCategoryAssocListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_category_assoc = self.FillOfferCategoryAssoc(row)
                result.data.append(offer_category_assoc)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferCategoryAssocByUuid(self, set_type, obj) :            
            return self.data.SetOfferCategoryAssocByUuid(set_type, obj)
            
    def DelOfferCategoryAssocByUuid(self
        , uuid
    ) :
        return self.data.DelOfferCategoryAssocByUuid(
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
        
    def GetOfferCategoryAssocListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
    def GetOfferCategoryAssocListByOfferId(self
        , offer_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListByOfferId(
            offer_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
    def GetOfferCategoryAssocListByCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListByCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_category_assoc  = self.FillOfferCategoryAssoc(row)
                results.append(offer_category_assoc)
            return results        
        
    def GetOfferCategoryAssocListByOfferIdByCategoryId(self
        , offer_id
        , category_id
    ) :

        results = []
        rows = self.data.GetOfferCategoryAssocListByOfferIdByCategoryId(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                

        return obj
        
    def CountOfferGameLocation(self
    ) :         
        return self.data.CountOfferGameLocation(
        )
               
    def CountOfferGameLocationByUuid(self
        , uuid
    ) :         
        return self.data.CountOfferGameLocationByUuid(
            uuid
        )
               
    def CountOfferGameLocationByGameLocationId(self
        , game_location_id
    ) :         
        return self.data.CountOfferGameLocationByGameLocationId(
            game_location_id
        )
               
    def CountOfferGameLocationByOfferId(self
        , offer_id
    ) :         
        return self.data.CountOfferGameLocationByOfferId(
            offer_id
        )
               
    def CountOfferGameLocationByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
    ) :         
        return self.data.CountOfferGameLocationByOfferIdByGameLocationId(
            offer_id
            , game_location_id
        )
               
    def BrowseOfferGameLocationListByFilter(self, filter_obj) :
        result = OfferGameLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOfferGameLocationListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                offer_game_location = self.FillOfferGameLocation(row)
                result.data.append(offer_game_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOfferGameLocationByUuid(self, set_type, obj) :            
            return self.data.SetOfferGameLocationByUuid(set_type, obj)
            
    def DelOfferGameLocationByUuid(self
        , uuid
    ) :
        return self.data.DelOfferGameLocationByUuid(
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
        
    def GetOfferGameLocationListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
    def GetOfferGameLocationListByGameLocationId(self
        , game_location_id
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListByGameLocationId(
            game_location_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
    def GetOfferGameLocationListByOfferId(self
        , offer_id
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListByOfferId(
            offer_id
        )
        
        if(rows != None) :
            for row in rows :
                offer_game_location  = self.FillOfferGameLocation(row)
                results.append(offer_game_location)
            return results        
        
    def GetOfferGameLocationListByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
    ) :

        results = []
        rows = self.data.GetOfferGameLocationListByOfferIdByGameLocationId(
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
        
    def CountEventInfo(self
    ) :         
        return self.data.CountEventInfo(
        )
               
    def CountEventInfoByUuid(self
        , uuid
    ) :         
        return self.data.CountEventInfoByUuid(
            uuid
        )
               
    def CountEventInfoByCode(self
        , code
    ) :         
        return self.data.CountEventInfoByCode(
            code
        )
               
    def CountEventInfoByName(self
        , name
    ) :         
        return self.data.CountEventInfoByName(
            name
        )
               
    def CountEventInfoByOrgId(self
        , org_id
    ) :         
        return self.data.CountEventInfoByOrgId(
            org_id
        )
               
    def BrowseEventInfoListByFilter(self, filter_obj) :
        result = EventInfoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventInfoListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_info = self.FillEventInfo(row)
                result.data.append(event_info)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventInfoByUuid(self, set_type, obj) :            
            return self.data.SetEventInfoByUuid(set_type, obj)
            
    def DelEventInfoByUuid(self
        , uuid
    ) :
        return self.data.DelEventInfoByUuid(
            uuid
        )
        
    def DelEventInfoByOrgId(self
        , org_id
    ) :
        return self.data.DelEventInfoByOrgId(
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
        
    def GetEventInfoListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventInfoListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
    def GetEventInfoListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetEventInfoListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
    def GetEventInfoListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetEventInfoListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                event_info  = self.FillEventInfo(row)
                results.append(event_info)
            return results        
        
    def GetEventInfoListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetEventInfoListByOrgId(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountEventLocationByUuid(self
        , uuid
    ) :         
        return self.data.CountEventLocationByUuid(
            uuid
        )
               
    def CountEventLocationByEventId(self
        , event_id
    ) :         
        return self.data.CountEventLocationByEventId(
            event_id
        )
               
    def CountEventLocationByCity(self
        , city
    ) :         
        return self.data.CountEventLocationByCity(
            city
        )
               
    def CountEventLocationByCountryCode(self
        , country_code
    ) :         
        return self.data.CountEventLocationByCountryCode(
            country_code
        )
               
    def CountEventLocationByPostalCode(self
        , postal_code
    ) :         
        return self.data.CountEventLocationByPostalCode(
            postal_code
        )
               
    def BrowseEventLocationListByFilter(self, filter_obj) :
        result = EventLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventLocationListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_location = self.FillEventLocation(row)
                result.data.append(event_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventLocationByUuid(self, set_type, obj) :            
            return self.data.SetEventLocationByUuid(set_type, obj)
            
    def DelEventLocationByUuid(self
        , uuid
    ) :
        return self.data.DelEventLocationByUuid(
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
        
    def GetEventLocationListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventLocationListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListByEventId(self
        , event_id
    ) :

        results = []
        rows = self.data.GetEventLocationListByEventId(
            event_id
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListByCity(self
        , city
    ) :

        results = []
        rows = self.data.GetEventLocationListByCity(
            city
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListByCountryCode(self
        , country_code
    ) :

        results = []
        rows = self.data.GetEventLocationListByCountryCode(
            country_code
        )
        
        if(rows != None) :
            for row in rows :
                event_location  = self.FillEventLocation(row)
                results.append(event_location)
            return results        
        
    def GetEventLocationListByPostalCode(self
        , postal_code
    ) :

        results = []
        rows = self.data.GetEventLocationListByPostalCode(
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
        
    def CountEventCategory(self
    ) :         
        return self.data.CountEventCategory(
        )
               
    def CountEventCategoryByUuid(self
        , uuid
    ) :         
        return self.data.CountEventCategoryByUuid(
            uuid
        )
               
    def CountEventCategoryByCode(self
        , code
    ) :         
        return self.data.CountEventCategoryByCode(
            code
        )
               
    def CountEventCategoryByName(self
        , name
    ) :         
        return self.data.CountEventCategoryByName(
            name
        )
               
    def CountEventCategoryByOrgId(self
        , org_id
    ) :         
        return self.data.CountEventCategoryByOrgId(
            org_id
        )
               
    def CountEventCategoryByTypeId(self
        , type_id
    ) :         
        return self.data.CountEventCategoryByTypeId(
            type_id
        )
               
    def CountEventCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountEventCategoryByOrgIdByTypeId(
            org_id
            , type_id
        )
               
    def BrowseEventCategoryListByFilter(self, filter_obj) :
        result = EventCategoryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventCategoryListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_category = self.FillEventCategory(row)
                result.data.append(event_category)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventCategoryByUuid(self, set_type, obj) :            
            return self.data.SetEventCategoryByUuid(set_type, obj)
            
    def DelEventCategoryByUuid(self
        , uuid
    ) :
        return self.data.DelEventCategoryByUuid(
            uuid
        )
        
    def DelEventCategoryByCodeByOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelEventCategoryByCodeByOrgId(
            code
            , org_id
        )
        
    def DelEventCategoryByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelEventCategoryByCodeByOrgIdByTypeId(
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
        
    def GetEventCategoryListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventCategoryListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetEventCategoryListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetEventCategoryListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetEventCategoryListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListByTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetEventCategoryListByTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category  = self.FillEventCategory(row)
                results.append(event_category)
            return results        
        
    def GetEventCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetEventCategoryListByOrgIdByTypeId(
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
               
    def CountEventCategoryTreeByUuid(self
        , uuid
    ) :         
        return self.data.CountEventCategoryTreeByUuid(
            uuid
        )
               
    def CountEventCategoryTreeByParentId(self
        , parent_id
    ) :         
        return self.data.CountEventCategoryTreeByParentId(
            parent_id
        )
               
    def CountEventCategoryTreeByCategoryId(self
        , category_id
    ) :         
        return self.data.CountEventCategoryTreeByCategoryId(
            category_id
        )
               
    def CountEventCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.data.CountEventCategoryTreeByParentIdByCategoryId(
            parent_id
            , category_id
        )
               
    def BrowseEventCategoryTreeListByFilter(self, filter_obj) :
        result = EventCategoryTreeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventCategoryTreeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_category_tree = self.FillEventCategoryTree(row)
                result.data.append(event_category_tree)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventCategoryTreeByUuid(self, set_type, obj) :            
            return self.data.SetEventCategoryTreeByUuid(set_type, obj)
            
    def DelEventCategoryTreeByUuid(self
        , uuid
    ) :
        return self.data.DelEventCategoryTreeByUuid(
            uuid
        )
        
    def DelEventCategoryTreeByParentId(self
        , parent_id
    ) :
        return self.data.DelEventCategoryTreeByParentId(
            parent_id
        )
        
    def DelEventCategoryTreeByCategoryId(self
        , category_id
    ) :
        return self.data.DelEventCategoryTreeByCategoryId(
            category_id
        )
        
    def DelEventCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        return self.data.DelEventCategoryTreeByParentIdByCategoryId(
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
        
    def GetEventCategoryTreeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
    def GetEventCategoryTreeListByParentId(self
        , parent_id
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListByParentId(
            parent_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
    def GetEventCategoryTreeListByCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListByCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_tree  = self.FillEventCategoryTree(row)
                results.append(event_category_tree)
            return results        
        
    def GetEventCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryTreeListByParentIdByCategoryId(
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
               
    def CountEventCategoryAssocByUuid(self
        , uuid
    ) :         
        return self.data.CountEventCategoryAssocByUuid(
            uuid
        )
               
    def CountEventCategoryAssocByEventId(self
        , event_id
    ) :         
        return self.data.CountEventCategoryAssocByEventId(
            event_id
        )
               
    def CountEventCategoryAssocByCategoryId(self
        , category_id
    ) :         
        return self.data.CountEventCategoryAssocByCategoryId(
            category_id
        )
               
    def CountEventCategoryAssocByEventIdByCategoryId(self
        , event_id
        , category_id
    ) :         
        return self.data.CountEventCategoryAssocByEventIdByCategoryId(
            event_id
            , category_id
        )
               
    def BrowseEventCategoryAssocListByFilter(self, filter_obj) :
        result = EventCategoryAssocResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseEventCategoryAssocListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                event_category_assoc = self.FillEventCategoryAssoc(row)
                result.data.append(event_category_assoc)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetEventCategoryAssocByUuid(self, set_type, obj) :            
            return self.data.SetEventCategoryAssocByUuid(set_type, obj)
            
    def DelEventCategoryAssocByUuid(self
        , uuid
    ) :
        return self.data.DelEventCategoryAssocByUuid(
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
        
    def GetEventCategoryAssocListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
            return results        
        
    def GetEventCategoryAssocListByEventId(self
        , event_id
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListByEventId(
            event_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
            return results        
        
    def GetEventCategoryAssocListByCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListByCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                event_category_assoc  = self.FillEventCategoryAssoc(row)
                results.append(event_category_assoc)
            return results        
        
    def GetEventCategoryAssocListByEventIdByCategoryId(self
        , event_id
        , category_id
    ) :

        results = []
        rows = self.data.GetEventCategoryAssocListByEventIdByCategoryId(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountProfileOfferByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileOfferByUuid(
            uuid
        )
               
    def CountProfileOfferByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileOfferByProfileId(
            profile_id
        )
               
    def BrowseProfileOfferListByFilter(self, filter_obj) :
        result = ProfileOfferResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileOfferListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_offer = self.FillProfileOffer(row)
                result.data.append(profile_offer)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileOfferByUuid(self, set_type, obj) :            
            return self.data.SetProfileOfferByUuid(set_type, obj)
            
    def DelProfileOfferByUuid(self
        , uuid
    ) :
        return self.data.DelProfileOfferByUuid(
            uuid
        )
        
    def DelProfileOfferByProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileOfferByProfileId(
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
        
    def GetProfileOfferListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileOfferListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_offer  = self.FillProfileOffer(row)
                results.append(profile_offer)
            return results        
        
    def GetProfileOfferListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileOfferListByProfileId(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                

        return obj
        
    def CountProfileApp(self
    ) :         
        return self.data.CountProfileApp(
        )
               
    def CountProfileAppByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAppByUuid(
            uuid
        )
               
    def CountProfileAppByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :         
        return self.data.CountProfileAppByProfileIdByAppId(
            profile_id
            , app_id
        )
               
    def BrowseProfileAppListByFilter(self, filter_obj) :
        result = ProfileAppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAppListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_app = self.FillProfileApp(row)
                result.data.append(profile_app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAppByUuid(self, set_type, obj) :            
            return self.data.SetProfileAppByUuid(set_type, obj)
            
    def SetProfileAppByProfileIdByAppId(self, set_type, obj) :            
            return self.data.SetProfileAppByProfileIdByAppId(set_type, obj)
            
    def DelProfileAppByUuid(self
        , uuid
    ) :
        return self.data.DelProfileAppByUuid(
            uuid
        )
        
    def DelProfileAppByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :
        return self.data.DelProfileAppByProfileIdByAppId(
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
        
    def GetProfileAppListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAppListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
    def GetProfileAppListByAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetProfileAppListByAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
    def GetProfileAppListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileAppListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_app  = self.FillProfileApp(row)
                results.append(profile_app)
            return results        
        
    def GetProfileAppListByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :

        results = []
        rows = self.data.GetProfileAppListByProfileIdByAppId(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                

        return obj
        
    def CountProfileOrg(self
    ) :         
        return self.data.CountProfileOrg(
        )
               
    def CountProfileOrgByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileOrgByUuid(
            uuid
        )
               
    def CountProfileOrgByOrgId(self
        , org_id
    ) :         
        return self.data.CountProfileOrgByOrgId(
            org_id
        )
               
    def CountProfileOrgByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileOrgByProfileId(
            profile_id
        )
               
    def BrowseProfileOrgListByFilter(self, filter_obj) :
        result = ProfileOrgResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileOrgListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_org = self.FillProfileOrg(row)
                result.data.append(profile_org)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileOrgByUuid(self, set_type, obj) :            
            return self.data.SetProfileOrgByUuid(set_type, obj)
            
    def DelProfileOrgByUuid(self
        , uuid
    ) :
        return self.data.DelProfileOrgByUuid(
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
        
    def GetProfileOrgListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileOrgListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_org  = self.FillProfileOrg(row)
                results.append(profile_org)
            return results        
        
    def GetProfileOrgListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileOrgListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_org  = self.FillProfileOrg(row)
                results.append(profile_org)
            return results        
        
    def GetProfileOrgListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileOrgListByProfileId(
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
               
    def CountOrgSiteByUuid(self
        , uuid
    ) :         
        return self.data.CountOrgSiteByUuid(
            uuid
        )
               
    def CountOrgSiteByOrgId(self
        , org_id
    ) :         
        return self.data.CountOrgSiteByOrgId(
            org_id
        )
               
    def CountOrgSiteBySiteId(self
        , site_id
    ) :         
        return self.data.CountOrgSiteBySiteId(
            site_id
        )
               
    def CountOrgSiteByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :         
        return self.data.CountOrgSiteByOrgIdBySiteId(
            org_id
            , site_id
        )
               
    def BrowseOrgSiteListByFilter(self, filter_obj) :
        result = OrgSiteResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOrgSiteListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                org_site = self.FillOrgSite(row)
                result.data.append(org_site)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOrgSiteByUuid(self, set_type, obj) :            
            return self.data.SetOrgSiteByUuid(set_type, obj)
            
    def SetOrgSiteByOrgIdBySiteId(self, set_type, obj) :            
            return self.data.SetOrgSiteByOrgIdBySiteId(set_type, obj)
            
    def DelOrgSiteByUuid(self
        , uuid
    ) :
        return self.data.DelOrgSiteByUuid(
            uuid
        )
        
    def DelOrgSiteByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :
        return self.data.DelOrgSiteByOrgIdBySiteId(
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
        
    def GetOrgSiteListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOrgSiteListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
    def GetOrgSiteListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetOrgSiteListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
    def GetOrgSiteListBySiteId(self
        , site_id
    ) :

        results = []
        rows = self.data.GetOrgSiteListBySiteId(
            site_id
        )
        
        if(rows != None) :
            for row in rows :
                org_site  = self.FillOrgSite(row)
                results.append(org_site)
            return results        
        
    def GetOrgSiteListByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :

        results = []
        rows = self.data.GetOrgSiteListByOrgIdBySiteId(
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
               
    def CountSiteAppByUuid(self
        , uuid
    ) :         
        return self.data.CountSiteAppByUuid(
            uuid
        )
               
    def CountSiteAppByAppId(self
        , app_id
    ) :         
        return self.data.CountSiteAppByAppId(
            app_id
        )
               
    def CountSiteAppBySiteId(self
        , site_id
    ) :         
        return self.data.CountSiteAppBySiteId(
            site_id
        )
               
    def CountSiteAppByAppIdBySiteId(self
        , app_id
        , site_id
    ) :         
        return self.data.CountSiteAppByAppIdBySiteId(
            app_id
            , site_id
        )
               
    def BrowseSiteAppListByFilter(self, filter_obj) :
        result = SiteAppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseSiteAppListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                site_app = self.FillSiteApp(row)
                result.data.append(site_app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetSiteAppByUuid(self, set_type, obj) :            
            return self.data.SetSiteAppByUuid(set_type, obj)
            
    def SetSiteAppByAppIdBySiteId(self, set_type, obj) :            
            return self.data.SetSiteAppByAppIdBySiteId(set_type, obj)
            
    def DelSiteAppByUuid(self
        , uuid
    ) :
        return self.data.DelSiteAppByUuid(
            uuid
        )
        
    def DelSiteAppByAppIdBySiteId(self
        , app_id
        , site_id
    ) :
        return self.data.DelSiteAppByAppIdBySiteId(
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
        
    def GetSiteAppListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetSiteAppListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
    def GetSiteAppListByAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetSiteAppListByAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
    def GetSiteAppListBySiteId(self
        , site_id
    ) :

        results = []
        rows = self.data.GetSiteAppListBySiteId(
            site_id
        )
        
        if(rows != None) :
            for row in rows :
                site_app  = self.FillSiteApp(row)
                results.append(site_app)
            return results        
        
    def GetSiteAppListByAppIdBySiteId(self
        , app_id
        , site_id
    ) :

        results = []
        rows = self.data.GetSiteAppListByAppIdBySiteId(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountPhotoByUuid(self
        , uuid
    ) :         
        return self.data.CountPhotoByUuid(
            uuid
        )
               
    def CountPhotoByExternalId(self
        , external_id
    ) :         
        return self.data.CountPhotoByExternalId(
            external_id
        )
               
    def CountPhotoByUrl(self
        , url
    ) :         
        return self.data.CountPhotoByUrl(
            url
        )
               
    def CountPhotoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountPhotoByUrlByExternalId(
            url
            , external_id
        )
               
    def CountPhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountPhotoByUuidByExternalId(
            uuid
            , external_id
        )
               
    def BrowsePhotoListByFilter(self, filter_obj) :
        result = PhotoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowsePhotoListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                photo = self.FillPhoto(row)
                result.data.append(photo)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetPhotoByUuid(self, set_type, obj) :            
            return self.data.SetPhotoByUuid(set_type, obj)
            
    def SetPhotoByExternalId(self, set_type, obj) :            
            return self.data.SetPhotoByExternalId(set_type, obj)
            
    def SetPhotoByUrl(self, set_type, obj) :            
            return self.data.SetPhotoByUrl(set_type, obj)
            
    def SetPhotoByUrlByExternalId(self, set_type, obj) :            
            return self.data.SetPhotoByUrlByExternalId(set_type, obj)
            
    def SetPhotoByUuidByExternalId(self, set_type, obj) :            
            return self.data.SetPhotoByUuidByExternalId(set_type, obj)
            
    def DelPhotoByUuid(self
        , uuid
    ) :
        return self.data.DelPhotoByUuid(
            uuid
        )
        
    def DelPhotoByExternalId(self
        , external_id
    ) :
        return self.data.DelPhotoByExternalId(
            external_id
        )
        
    def DelPhotoByUrl(self
        , url
    ) :
        return self.data.DelPhotoByUrl(
            url
        )
        
    def DelPhotoByUrlByExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelPhotoByUrlByExternalId(
            url
            , external_id
        )
        
    def DelPhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelPhotoByUuidByExternalId(
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
        
    def GetPhotoListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetPhotoListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListByExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetPhotoListByExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListByUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetPhotoListByUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListByUrlByExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetPhotoListByUrlByExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                photo  = self.FillPhoto(row)
                results.append(photo)
            return results        
        
    def GetPhotoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetPhotoListByUuidByExternalId(
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
               
    def CountVideoByUuid(self
        , uuid
    ) :         
        return self.data.CountVideoByUuid(
            uuid
        )
               
    def CountVideoByExternalId(self
        , external_id
    ) :         
        return self.data.CountVideoByExternalId(
            external_id
        )
               
    def CountVideoByUrl(self
        , url
    ) :         
        return self.data.CountVideoByUrl(
            url
        )
               
    def CountVideoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountVideoByUrlByExternalId(
            url
            , external_id
        )
               
    def CountVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountVideoByUuidByExternalId(
            uuid
            , external_id
        )
               
    def BrowseVideoListByFilter(self, filter_obj) :
        result = VideoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseVideoListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                video = self.FillVideo(row)
                result.data.append(video)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetVideoByUuid(self, set_type, obj) :            
            return self.data.SetVideoByUuid(set_type, obj)
            
    def SetVideoByExternalId(self, set_type, obj) :            
            return self.data.SetVideoByExternalId(set_type, obj)
            
    def SetVideoByUrl(self, set_type, obj) :            
            return self.data.SetVideoByUrl(set_type, obj)
            
    def SetVideoByUrlByExternalId(self, set_type, obj) :            
            return self.data.SetVideoByUrlByExternalId(set_type, obj)
            
    def SetVideoByUuidByExternalId(self, set_type, obj) :            
            return self.data.SetVideoByUuidByExternalId(set_type, obj)
            
    def DelVideoByUuid(self
        , uuid
    ) :
        return self.data.DelVideoByUuid(
            uuid
        )
        
    def DelVideoByExternalId(self
        , external_id
    ) :
        return self.data.DelVideoByExternalId(
            external_id
        )
        
    def DelVideoByUrl(self
        , url
    ) :
        return self.data.DelVideoByUrl(
            url
        )
        
    def DelVideoByUrlByExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelVideoByUrlByExternalId(
            url
            , external_id
        )
        
    def DelVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelVideoByUuidByExternalId(
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
        
    def GetVideoListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetVideoListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListByExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetVideoListByExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListByUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetVideoListByUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListByUrlByExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetVideoListByUrlByExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        
    def GetVideoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetVideoListByUuidByExternalId(
            uuid
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                video  = self.FillVideo(row)
                results.append(video)
            return results        
        



