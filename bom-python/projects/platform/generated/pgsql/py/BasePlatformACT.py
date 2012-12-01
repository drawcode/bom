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

        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['network_uuid'] != None) :                 
            obj.network_uuid = row['network_uuid'] #dataType.FillData(dr, "network_uuid");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['game_area'] != None) :                 
            obj.game_area = row['game_area'] #dataType.FillData(dr, "game_area");                
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
        if (row['game_level'] != None) :                 
            obj.game_level = row['game_level'] #dataType.FillData(dr, "game_level");                
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
        
        
    def FillGameStatistic(self, row) :
        obj = GameStatistic()

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
        
    def CountGameStatistic(self
    ) :         
        return self.data.CountGameStatistic(
        )
               
    def CountGameStatisticByUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticByUuid(
            uuid
        )
               
    def CountGameStatisticByKey(self
        , key
    ) :         
        return self.data.CountGameStatisticByKey(
            key
        )
               
    def CountGameStatisticByGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticByGameId(
            game_id
        )
               
    def CountGameStatisticByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameStatisticByKeyByGameId(
            key
            , game_id
        )
               
    def CountGameStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameStatisticByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def CountGameStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameStatisticByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
               
    def CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameStatisticListByFilter(self, filter_obj) :
        result = GameStatisticResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic = self.FillGameStatistic(row)
                result.data.append(game_statistic)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticByUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticByUuid(set_type, obj)
            
    def SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameStatisticByProfileIdByKey(self, set_type, obj) :            
            return self.data.SetGameStatisticByProfileIdByKey(set_type, obj)
            
    def SetGameStatisticByProfileIdByKeyByTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticByProfileIdByKeyByTimestamp(set_type, obj)
            
    def SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameStatisticByProfileIdByGameIdByKey(self, set_type, obj) :            
            return self.data.SetGameStatisticByProfileIdByGameIdByKey(set_type, obj)
            
    def DelGameStatisticByUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticByUuid(
            uuid
        )
        
    def DelGameStatisticByKeyByGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameStatisticByKeyByGameId(
            key
            , game_id
        )
        
    def DelGameStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameStatisticByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def DelGameStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        return self.data.DelGameStatisticByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
        
    def GetGameStatisticListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
            return results        
        
    def GetGameStatisticListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameStatisticListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
            return results        
        
    def GetGameStatisticListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
            return results        
        
    def GetGameStatisticListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticListByKeyByGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
            return results        
        
    def GetGameStatisticListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
            return results        
        
    def GetGameStatisticListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
            return results        
        
    def GetGameStatisticListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
            return results        
        
    def GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic  = self.FillGameStatistic(row)
                results.append(game_statistic)
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
        
        
    def FillGameStatisticTimestamp(self, row) :
        obj = GameStatisticTimestamp()

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
        
    def CountGameStatisticTimestamp(self
    ) :         
        return self.data.CountGameStatisticTimestamp(
        )
               
    def CountGameStatisticTimestampByUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticTimestampByUuid(
            uuid
        )
               
    def CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameStatisticTimestampListByFilter(self, filter_obj) :
        result = GameStatisticTimestampResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticTimestampListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic_timestamp = self.FillGameStatisticTimestamp(row)
                result.data.append(game_statistic_timestamp)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticTimestampByUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticTimestampByUuid(set_type, obj)
            
    def SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def DelGameStatisticTimestampByUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticTimestampByUuid(
            uuid
        )
        
    def DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        return self.data.DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
        
    def GetGameStatisticTimestampListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticTimestampListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_timestamp  = self.FillGameStatisticTimestamp(row)
                results.append(game_statistic_timestamp)
            return results        
        
    def GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_timestamp  = self.FillGameStatisticTimestamp(row)
                results.append(game_statistic_timestamp)
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
        
        
    def FillGameAchievement(self, row) :
        obj = GameAchievement()

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
        
    def CountGameAchievement(self
    ) :         
        return self.data.CountGameAchievement(
        )
               
    def CountGameAchievementByUuid(self
        , uuid
    ) :         
        return self.data.CountGameAchievementByUuid(
            uuid
        )
               
    def CountGameAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :         
        return self.data.CountGameAchievementByProfileIdByKey(
            profile_id
            , key
        )
               
    def CountGameAchievementByUsername(self
        , username
    ) :         
        return self.data.CountGameAchievementByUsername(
            username
        )
               
    def CountGameAchievementByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameAchievementByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
               
    def CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameAchievementListByFilter(self, filter_obj) :
        result = GameAchievementResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAchievementListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_achievement = self.FillGameAchievement(row)
                result.data.append(game_achievement)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAchievementByUuid(self, set_type, obj) :            
            return self.data.SetGameAchievementByUuid(set_type, obj)
            
    def SetGameAchievementByUuidByKey(self, set_type, obj) :            
            return self.data.SetGameAchievementByUuidByKey(set_type, obj)
            
    def SetGameAchievementByProfileIdByKey(self, set_type, obj) :            
            return self.data.SetGameAchievementByProfileIdByKey(set_type, obj)
            
    def SetGameAchievementByKeyByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetGameAchievementByKeyByProfileIdByGameId(set_type, obj)
            
    def SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def DelGameAchievementByUuid(self
        , uuid
    ) :
        return self.data.DelGameAchievementByUuid(
            uuid
        )
        
    def DelGameAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :
        return self.data.DelGameAchievementByProfileIdByKey(
            profile_id
            , key
        )
        
    def DelGameAchievementByUuidByKey(self
        , uuid
        , key
    ) :
        return self.data.DelGameAchievementByUuidByKey(
            uuid
            , key
        )
        
    def GetGameAchievementListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAchievementListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByProfileIdByKey(self
        , profile_id
        , key
    ) :

        results = []
        rows = self.data.GetGameAchievementListByProfileIdByKey(
            profile_id
            , key
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByUsername(self
        , username
    ) :

        results = []
        rows = self.data.GetGameAchievementListByUsername(
            username
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameAchievementListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementListByKeyByGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameAchievementListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
            return results        
        
    def GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement  = self.FillGameAchievement(row)
                results.append(game_achievement)
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
        



