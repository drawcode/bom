import ent
from ent import *

import BaseProfileData
from BaseProfileData import *

class BaseProfileACT(object):

    def __init__(self):
        self.connection_string = ''
        self.data = BaseProfileData()
        
        
    def FillProfile(self, row) :
        obj = Profile()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['hash'] != None) :                 
            obj.hash = row['hash'] #dataType.FillData(dr, "hash");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                

        return obj
        
    def CountProfile(self
    ) :         
        return self.data.CountProfile(
        )
               
    def CountProfileByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileByUuid(
            uuid
        )
               
    def CountProfileByUsernameByHash(self
        , username
        , hash
    ) :         
        return self.data.CountProfileByUsernameByHash(
            username
            , hash
        )
               
    def CountProfileByUsername(self
        , username
    ) :         
        return self.data.CountProfileByUsername(
            username
        )
               
    def BrowseProfileListByFilter(self, filter_obj) :
        result = ProfileResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile = self.FillProfile(row)
                result.data.append(profile)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileByUuid(self, set_type, obj) :            
            return self.data.SetProfileByUuid(set_type, obj)
            
    def SetProfileByUsername(self, set_type, obj) :            
            return self.data.SetProfileByUsername(set_type, obj)
            
    def DelProfileByUuid(self
        , uuid
    ) :
        return self.data.DelProfileByUuid(
            uuid
        )
        
    def DelProfileByUsername(self
        , username
    ) :
        return self.data.DelProfileByUsername(
            username
        )
        
    def GetProfileListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile  = self.FillProfile(row)
                results.append(profile)
            return results        
        
    def GetProfileListByUsernameByHash(self
        , username
        , hash
    ) :

        results = []
        rows = self.data.GetProfileListByUsernameByHash(
            username
            , hash
        )
        
        if(rows != None) :
            for row in rows :
                profile  = self.FillProfile(row)
                results.append(profile)
            return results        
        
    def GetProfileListByUsername(self
        , username
    ) :

        results = []
        rows = self.data.GetProfileListByUsername(
            username
        )
        
        if(rows != None) :
            for row in rows :
                profile  = self.FillProfile(row)
                results.append(profile)
            return results        
        
        
    def FillProfileType(self, row) :
        obj = ProfileType()

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
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountProfileType(self
    ) :         
        return self.data.CountProfileType(
        )
               
    def CountProfileTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileTypeByUuid(
            uuid
        )
               
    def CountProfileTypeByTypeId(self
        , type_id
    ) :         
        return self.data.CountProfileTypeByTypeId(
            type_id
        )
               
    def BrowseProfileTypeListByFilter(self, filter_obj) :
        result = ProfileTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_type = self.FillProfileType(row)
                result.data.append(profile_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileTypeByUuid(self, set_type, obj) :            
            return self.data.SetProfileTypeByUuid(set_type, obj)
            
    def DelProfileTypeByUuid(self
        , uuid
    ) :
        return self.data.DelProfileTypeByUuid(
            uuid
        )
        
    def GetProfileTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_type  = self.FillProfileType(row)
                results.append(profile_type)
            return results        
        
    def GetProfileTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetProfileTypeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                profile_type  = self.FillProfileType(row)
                results.append(profile_type)
            return results        
        
    def GetProfileTypeListByTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetProfileTypeListByTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_type  = self.FillProfileType(row)
                results.append(profile_type)
            return results        
        
        
    def FillProfileAttribute(self, row) :
        obj = ProfileAttribute()

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
        
    def CountProfileAttribute(self
    ) :         
        return self.data.CountProfileAttribute(
        )
               
    def CountProfileAttributeByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAttributeByUuid(
            uuid
        )
               
    def CountProfileAttributeByCode(self
        , code
    ) :         
        return self.data.CountProfileAttributeByCode(
            code
        )
               
    def CountProfileAttributeByType(self
        , type
    ) :         
        return self.data.CountProfileAttributeByType(
            type
        )
               
    def CountProfileAttributeByGroup(self
        , group
    ) :         
        return self.data.CountProfileAttributeByGroup(
            group
        )
               
    def CountProfileAttributeByCodeByType(self
        , code
        , type
    ) :         
        return self.data.CountProfileAttributeByCodeByType(
            code
            , type
        )
               
    def BrowseProfileAttributeListByFilter(self, filter_obj) :
        result = ProfileAttributeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAttributeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_attribute = self.FillProfileAttribute(row)
                result.data.append(profile_attribute)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAttributeByUuid(self, set_type, obj) :            
            return self.data.SetProfileAttributeByUuid(set_type, obj)
            
    def SetProfileAttributeByCode(self, set_type, obj) :            
            return self.data.SetProfileAttributeByCode(set_type, obj)
            
    def DelProfileAttributeByUuid(self
        , uuid
    ) :
        return self.data.DelProfileAttributeByUuid(
            uuid
        )
        
    def DelProfileAttributeByCode(self
        , code
    ) :
        return self.data.DelProfileAttributeByCode(
            code
        )
        
    def GetProfileAttributeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAttributeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetProfileAttributeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListByType(self
        , type
    ) :

        results = []
        rows = self.data.GetProfileAttributeListByType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListByGroup(self
        , group
    ) :

        results = []
        rows = self.data.GetProfileAttributeListByGroup(
            group
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListByCodeByType(self
        , code
        , type
    ) :

        results = []
        rows = self.data.GetProfileAttributeListByCodeByType(
            code
            , type
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
        
    def FillProfileAttributeText(self, row) :
        obj = ProfileAttributeText()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['attribute_id'] != None) :                 
            obj.attribute_id = row['attribute_id'] #dataType.FillData(dr, "attribute_id");                
        if (row['attribute_value'] != None) :                 
            obj.attribute_value = row['attribute_value'] #dataType.FillData(dr, "attribute_value");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                

        return obj
        
    def CountProfileAttributeText(self
    ) :         
        return self.data.CountProfileAttributeText(
        )
               
    def CountProfileAttributeTextByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAttributeTextByUuid(
            uuid
        )
               
    def CountProfileAttributeTextByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileAttributeTextByProfileId(
            profile_id
        )
               
    def CountProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountProfileAttributeTextByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
               
    def BrowseProfileAttributeTextListByFilter(self, filter_obj) :
        result = ProfileAttributeTextResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAttributeTextListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_attribute_text = self.FillProfileAttributeText(row)
                result.data.append(profile_attribute_text)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAttributeTextByUuid(self, set_type, obj) :            
            return self.data.SetProfileAttributeTextByUuid(set_type, obj)
            
    def SetProfileAttributeTextByProfileId(self, set_type, obj) :            
            return self.data.SetProfileAttributeTextByProfileId(set_type, obj)
            
    def SetProfileAttributeTextByProfileIdByAttributeId(self, set_type, obj) :            
            return self.data.SetProfileAttributeTextByProfileIdByAttributeId(set_type, obj)
            
    def DelProfileAttributeTextByUuid(self
        , uuid
    ) :
        return self.data.DelProfileAttributeTextByUuid(
            uuid
        )
        
    def DelProfileAttributeTextByProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileAttributeTextByProfileId(
            profile_id
        )
        
    def DelProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return self.data.DelProfileAttributeTextByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
    def GetProfileAttributeTextListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAttributeTextListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_text  = self.FillProfileAttributeText(row)
                results.append(profile_attribute_text)
            return results        
        
    def GetProfileAttributeTextListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeTextListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_text  = self.FillProfileAttributeText(row)
                results.append(profile_attribute_text)
            return results        
        
    def GetProfileAttributeTextListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeTextListByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_text  = self.FillProfileAttributeText(row)
                results.append(profile_attribute_text)
            return results        
        
        
    def FillProfileAttributeData(self, row) :
        obj = ProfileAttributeData()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['attribute_id'] != None) :                 
            obj.attribute_id = row['attribute_id'] #dataType.FillData(dr, "attribute_id");                
        if (row['attribute_value'] != None) :                 
            obj.attribute_value = row['attribute_value'] #dataType.FillData(dr, "attribute_value");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                

        return obj
        
    def CountProfileAttributeData(self
    ) :         
        return self.data.CountProfileAttributeData(
        )
               
    def CountProfileAttributeDataByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAttributeDataByUuid(
            uuid
        )
               
    def CountProfileAttributeDataByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileAttributeDataByProfileId(
            profile_id
        )
               
    def CountProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountProfileAttributeDataByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
               
    def BrowseProfileAttributeDataListByFilter(self, filter_obj) :
        result = ProfileAttributeDataResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAttributeDataListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_attribute_data = self.FillProfileAttributeData(row)
                result.data.append(profile_attribute_data)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAttributeDataByUuid(self, set_type, obj) :            
            return self.data.SetProfileAttributeDataByUuid(set_type, obj)
            
    def SetProfileAttributeDataByProfileId(self, set_type, obj) :            
            return self.data.SetProfileAttributeDataByProfileId(set_type, obj)
            
    def SetProfileAttributeDataByProfileIdByAttributeId(self, set_type, obj) :            
            return self.data.SetProfileAttributeDataByProfileIdByAttributeId(set_type, obj)
            
    def DelProfileAttributeDataByUuid(self
        , uuid
    ) :
        return self.data.DelProfileAttributeDataByUuid(
            uuid
        )
        
    def DelProfileAttributeDataByProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileAttributeDataByProfileId(
            profile_id
        )
        
    def DelProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return self.data.DelProfileAttributeDataByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
    def GetProfileAttributeDataListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAttributeDataListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_data  = self.FillProfileAttributeData(row)
                results.append(profile_attribute_data)
            return results        
        
    def GetProfileAttributeDataListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeDataListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_data  = self.FillProfileAttributeData(row)
                results.append(profile_attribute_data)
            return results        
        
    def GetProfileAttributeDataListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeDataListByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_data  = self.FillProfileAttributeData(row)
                results.append(profile_attribute_data)
            return results        
        
        
    def FillProfileDevice(self, row) :
        obj = ProfileDevice()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['token'] != None) :                 
            obj.token = row['token'] #dataType.FillData(dr, "token");                
        if (row['secret'] != None) :                 
            obj.secret = row['secret'] #dataType.FillData(dr, "secret");                
        if (row['device_version'] != None) :                 
            obj.device_version = row['device_version'] #dataType.FillData(dr, "device_version");                
        if (row['device_type'] != None) :                 
            obj.device_type = row['device_type'] #dataType.FillData(dr, "device_type");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['device_os'] != None) :                 
            obj.device_os = row['device_os'] #dataType.FillData(dr, "device_os");                
        if (row['device_id'] != None) :                 
            obj.device_id = row['device_id'] #dataType.FillData(dr, "device_id");                
        if (row['device_platform'] != None) :                 
            obj.device_platform = row['device_platform'] #dataType.FillData(dr, "device_platform");                

        return obj
        
    def CountProfileDevice(self
    ) :         
        return self.data.CountProfileDevice(
        )
               
    def CountProfileDeviceByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileDeviceByUuid(
            uuid
        )
               
    def CountProfileDeviceByProfileIdByDeviceId(self
        , profile_id
        , device_id
    ) :         
        return self.data.CountProfileDeviceByProfileIdByDeviceId(
            profile_id
            , device_id
        )
               
    def CountProfileDeviceByProfileIdByToken(self
        , profile_id
        , token
    ) :         
        return self.data.CountProfileDeviceByProfileIdByToken(
            profile_id
            , token
        )
               
    def CountProfileDeviceByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileDeviceByProfileId(
            profile_id
        )
               
    def CountProfileDeviceByDeviceId(self
        , device_id
    ) :         
        return self.data.CountProfileDeviceByDeviceId(
            device_id
        )
               
    def CountProfileDeviceByToken(self
        , token
    ) :         
        return self.data.CountProfileDeviceByToken(
            token
        )
               
    def BrowseProfileDeviceListByFilter(self, filter_obj) :
        result = ProfileDeviceResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileDeviceListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_device = self.FillProfileDevice(row)
                result.data.append(profile_device)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileDeviceByUuid(self, set_type, obj) :            
            return self.data.SetProfileDeviceByUuid(set_type, obj)
            
    def DelProfileDeviceByUuid(self
        , uuid
    ) :
        return self.data.DelProfileDeviceByUuid(
            uuid
        )
        
    def DelProfileDeviceByProfileIdByDeviceId(self
        , profile_id
        , device_id
    ) :
        return self.data.DelProfileDeviceByProfileIdByDeviceId(
            profile_id
            , device_id
        )
        
    def DelProfileDeviceByProfileIdByToken(self
        , profile_id
        , token
    ) :
        return self.data.DelProfileDeviceByProfileIdByToken(
            profile_id
            , token
        )
        
    def DelProfileDeviceByToken(self
        , token
    ) :
        return self.data.DelProfileDeviceByToken(
            token
        )
        
    def GetProfileDeviceListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileDeviceListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListByProfileIdByDeviceId(self
        , profile_id
        , device_id
    ) :

        results = []
        rows = self.data.GetProfileDeviceListByProfileIdByDeviceId(
            profile_id
            , device_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListByProfileIdByToken(self
        , profile_id
        , token
    ) :

        results = []
        rows = self.data.GetProfileDeviceListByProfileIdByToken(
            profile_id
            , token
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileDeviceListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListByDeviceId(self
        , device_id
    ) :

        results = []
        rows = self.data.GetProfileDeviceListByDeviceId(
            device_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListByToken(self
        , token
    ) :

        results = []
        rows = self.data.GetProfileDeviceListByToken(
            token
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
        
    def FillCountry(self, row) :
        obj = Country()

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
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountCountry(self
    ) :         
        return self.data.CountCountry(
        )
               
    def CountCountryByUuid(self
        , uuid
    ) :         
        return self.data.CountCountryByUuid(
            uuid
        )
               
    def CountCountryByCode(self
        , code
    ) :         
        return self.data.CountCountryByCode(
            code
        )
               
    def BrowseCountryListByFilter(self, filter_obj) :
        result = CountryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseCountryListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                country = self.FillCountry(row)
                result.data.append(country)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetCountryByUuid(self, set_type, obj) :            
            return self.data.SetCountryByUuid(set_type, obj)
            
    def SetCountryByCode(self, set_type, obj) :            
            return self.data.SetCountryByCode(set_type, obj)
            
    def DelCountryByUuid(self
        , uuid
    ) :
        return self.data.DelCountryByUuid(
            uuid
        )
        
    def DelCountryByCode(self
        , code
    ) :
        return self.data.DelCountryByCode(
            code
        )
        
    def GetCountryList(self
    ) :

        results = []
        rows = self.data.GetCountryList(
        )
        
        if(rows != None) :
            for row in rows :
                country  = self.FillCountry(row)
                results.append(country)
            return results        
        
    def GetCountryListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetCountryListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                country  = self.FillCountry(row)
                results.append(country)
            return results        
        
    def GetCountryListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetCountryListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                country  = self.FillCountry(row)
                results.append(country)
            return results        
        
        
    def FillState(self, row) :
        obj = State()

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
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountState(self
    ) :         
        return self.data.CountState(
        )
               
    def CountStateByUuid(self
        , uuid
    ) :         
        return self.data.CountStateByUuid(
            uuid
        )
               
    def CountStateByCode(self
        , code
    ) :         
        return self.data.CountStateByCode(
            code
        )
               
    def BrowseStateListByFilter(self, filter_obj) :
        result = StateResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseStateListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                state = self.FillState(row)
                result.data.append(state)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetStateByUuid(self, set_type, obj) :            
            return self.data.SetStateByUuid(set_type, obj)
            
    def SetStateByCode(self, set_type, obj) :            
            return self.data.SetStateByCode(set_type, obj)
            
    def DelStateByUuid(self
        , uuid
    ) :
        return self.data.DelStateByUuid(
            uuid
        )
        
    def DelStateByCode(self
        , code
    ) :
        return self.data.DelStateByCode(
            code
        )
        
    def GetStateList(self
    ) :

        results = []
        rows = self.data.GetStateList(
        )
        
        if(rows != None) :
            for row in rows :
                state  = self.FillState(row)
                results.append(state)
            return results        
        
    def GetStateListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetStateListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                state  = self.FillState(row)
                results.append(state)
            return results        
        
    def GetStateListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetStateListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                state  = self.FillState(row)
                results.append(state)
            return results        
        
        
    def FillCity(self, row) :
        obj = City()

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
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountCity(self
    ) :         
        return self.data.CountCity(
        )
               
    def CountCityByUuid(self
        , uuid
    ) :         
        return self.data.CountCityByUuid(
            uuid
        )
               
    def CountCityByCode(self
        , code
    ) :         
        return self.data.CountCityByCode(
            code
        )
               
    def BrowseCityListByFilter(self, filter_obj) :
        result = CityResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseCityListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                city = self.FillCity(row)
                result.data.append(city)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetCityByUuid(self, set_type, obj) :            
            return self.data.SetCityByUuid(set_type, obj)
            
    def SetCityByCode(self, set_type, obj) :            
            return self.data.SetCityByCode(set_type, obj)
            
    def DelCityByUuid(self
        , uuid
    ) :
        return self.data.DelCityByUuid(
            uuid
        )
        
    def DelCityByCode(self
        , code
    ) :
        return self.data.DelCityByCode(
            code
        )
        
    def GetCityList(self
    ) :

        results = []
        rows = self.data.GetCityList(
        )
        
        if(rows != None) :
            for row in rows :
                city  = self.FillCity(row)
                results.append(city)
            return results        
        
    def GetCityListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetCityListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                city  = self.FillCity(row)
                results.append(city)
            return results        
        
    def GetCityListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetCityListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                city  = self.FillCity(row)
                results.append(city)
            return results        
        
        
    def FillPostalCode(self, row) :
        obj = PostalCode()

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
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountPostalCode(self
    ) :         
        return self.data.CountPostalCode(
        )
               
    def CountPostalCodeByUuid(self
        , uuid
    ) :         
        return self.data.CountPostalCodeByUuid(
            uuid
        )
               
    def CountPostalCodeByCode(self
        , code
    ) :         
        return self.data.CountPostalCodeByCode(
            code
        )
               
    def BrowsePostalCodeListByFilter(self, filter_obj) :
        result = PostalCodeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowsePostalCodeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                postal_code = self.FillPostalCode(row)
                result.data.append(postal_code)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetPostalCodeByUuid(self, set_type, obj) :            
            return self.data.SetPostalCodeByUuid(set_type, obj)
            
    def SetPostalCodeByCode(self, set_type, obj) :            
            return self.data.SetPostalCodeByCode(set_type, obj)
            
    def DelPostalCodeByUuid(self
        , uuid
    ) :
        return self.data.DelPostalCodeByUuid(
            uuid
        )
        
    def DelPostalCodeByCode(self
        , code
    ) :
        return self.data.DelPostalCodeByCode(
            code
        )
        
    def GetPostalCodeList(self
    ) :

        results = []
        rows = self.data.GetPostalCodeList(
        )
        
        if(rows != None) :
            for row in rows :
                postal_code  = self.FillPostalCode(row)
                results.append(postal_code)
            return results        
        
    def GetPostalCodeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetPostalCodeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                postal_code  = self.FillPostalCode(row)
                results.append(postal_code)
            return results        
        
    def GetPostalCodeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetPostalCodeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                postal_code  = self.FillPostalCode(row)
                results.append(postal_code)
            return results        
        



