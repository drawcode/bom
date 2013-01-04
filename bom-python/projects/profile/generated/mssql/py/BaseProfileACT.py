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
        if (row['first_name'] != None) :                 
            obj.first_name = row['first_name'] #dataType.FillData(dr, "first_name");                
        if (row['last_name'] != None) :                 
            obj.last_name = row['last_name'] #dataType.FillData(dr, "last_name");                
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
        if (row['email'] != None) :                 
            obj.email = row['email'] #dataType.FillData(dr, "email");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                

        return obj
        
    def CountProfile(self
    ) :         
        return self.data.CountProfile(
        )
               
    def CountProfileUuid(self
        , uuid
    ) :         
        return self.data.CountProfileUuid(
            uuid
        )
               
    def CountProfileUsernameHash(self
        , username
        , hash
    ) :         
        return self.data.CountProfileUsernameHash(
            username
            , hash
        )
               
    def CountProfileUsername(self
        , username
    ) :         
        return self.data.CountProfileUsername(
            username
        )
               
    def BrowseProfileListFilter(self, filter_obj) :
        result = ProfileResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile = self.FillProfile(row)
                result.data.append(profile)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileUuid(self, set_type, obj) :            
            return self.data.SetProfileUuid(set_type, obj)
            
    def SetProfileUsername(self, set_type, obj) :            
            return self.data.SetProfileUsername(set_type, obj)
            
    def DelProfileUuid(self
        , uuid
    ) :
        return self.data.DelProfileUuid(
            uuid
        )
        
    def DelProfileUsername(self
        , username
    ) :
        return self.data.DelProfileUsername(
            username
        )
        
    def GetProfileListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile  = self.FillProfile(row)
                results.append(profile)
            return results        
        
    def GetProfileListUsernameHash(self
        , username
        , hash
    ) :

        results = []
        rows = self.data.GetProfileListUsernameHash(
            username
            , hash
        )
        
        if(rows != None) :
            for row in rows :
                profile  = self.FillProfile(row)
                results.append(profile)
            return results        
        
    def GetProfileListUsername(self
        , username
    ) :

        results = []
        rows = self.data.GetProfileListUsername(
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
               
    def CountProfileTypeUuid(self
        , uuid
    ) :         
        return self.data.CountProfileTypeUuid(
            uuid
        )
               
    def CountProfileTypeTypeId(self
        , type_id
    ) :         
        return self.data.CountProfileTypeTypeId(
            type_id
        )
               
    def BrowseProfileTypeListFilter(self, filter_obj) :
        result = ProfileTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_type = self.FillProfileType(row)
                result.data.append(profile_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileTypeUuid(self, set_type, obj) :            
            return self.data.SetProfileTypeUuid(set_type, obj)
            
    def DelProfileTypeUuid(self
        , uuid
    ) :
        return self.data.DelProfileTypeUuid(
            uuid
        )
        
    def GetProfileTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_type  = self.FillProfileType(row)
                results.append(profile_type)
            return results        
        
    def GetProfileTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetProfileTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                profile_type  = self.FillProfileType(row)
                results.append(profile_type)
            return results        
        
    def GetProfileTypeListTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetProfileTypeListTypeId(
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
               
    def CountProfileAttributeUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAttributeUuid(
            uuid
        )
               
    def CountProfileAttributeCode(self
        , code
    ) :         
        return self.data.CountProfileAttributeCode(
            code
        )
               
    def CountProfileAttributeType(self
        , type
    ) :         
        return self.data.CountProfileAttributeType(
            type
        )
               
    def CountProfileAttributeGroup(self
        , group
    ) :         
        return self.data.CountProfileAttributeGroup(
            group
        )
               
    def CountProfileAttributeCodeType(self
        , code
        , type
    ) :         
        return self.data.CountProfileAttributeCodeType(
            code
            , type
        )
               
    def BrowseProfileAttributeListFilter(self, filter_obj) :
        result = ProfileAttributeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAttributeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_attribute = self.FillProfileAttribute(row)
                result.data.append(profile_attribute)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAttributeUuid(self, set_type, obj) :            
            return self.data.SetProfileAttributeUuid(set_type, obj)
            
    def SetProfileAttributeCode(self, set_type, obj) :            
            return self.data.SetProfileAttributeCode(set_type, obj)
            
    def DelProfileAttributeUuid(self
        , uuid
    ) :
        return self.data.DelProfileAttributeUuid(
            uuid
        )
        
    def DelProfileAttributeCode(self
        , code
    ) :
        return self.data.DelProfileAttributeCode(
            code
        )
        
    def GetProfileAttributeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAttributeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetProfileAttributeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListType(self
        , type
    ) :

        results = []
        rows = self.data.GetProfileAttributeListType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListGroup(self
        , group
    ) :

        results = []
        rows = self.data.GetProfileAttributeListGroup(
            group
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute  = self.FillProfileAttribute(row)
                results.append(profile_attribute)
            return results        
        
    def GetProfileAttributeListCodeType(self
        , code
        , type
    ) :

        results = []
        rows = self.data.GetProfileAttributeListCodeType(
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
               
    def CountProfileAttributeTextUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAttributeTextUuid(
            uuid
        )
               
    def CountProfileAttributeTextProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileAttributeTextProfileId(
            profile_id
        )
               
    def CountProfileAttributeTextProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountProfileAttributeTextProfileIdAttributeId(
            profile_id
            , attribute_id
        )
               
    def BrowseProfileAttributeTextListFilter(self, filter_obj) :
        result = ProfileAttributeTextResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAttributeTextListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_attribute_text = self.FillProfileAttributeText(row)
                result.data.append(profile_attribute_text)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAttributeTextUuid(self, set_type, obj) :            
            return self.data.SetProfileAttributeTextUuid(set_type, obj)
            
    def SetProfileAttributeTextProfileId(self, set_type, obj) :            
            return self.data.SetProfileAttributeTextProfileId(set_type, obj)
            
    def SetProfileAttributeTextProfileIdAttributeId(self, set_type, obj) :            
            return self.data.SetProfileAttributeTextProfileIdAttributeId(set_type, obj)
            
    def DelProfileAttributeTextUuid(self
        , uuid
    ) :
        return self.data.DelProfileAttributeTextUuid(
            uuid
        )
        
    def DelProfileAttributeTextProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileAttributeTextProfileId(
            profile_id
        )
        
    def DelProfileAttributeTextProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return self.data.DelProfileAttributeTextProfileIdAttributeId(
            profile_id
            , attribute_id
        )
        
    def GetProfileAttributeTextListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAttributeTextListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_text  = self.FillProfileAttributeText(row)
                results.append(profile_attribute_text)
            return results        
        
    def GetProfileAttributeTextListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeTextListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_text  = self.FillProfileAttributeText(row)
                results.append(profile_attribute_text)
            return results        
        
    def GetProfileAttributeTextListProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeTextListProfileIdAttributeId(
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
               
    def CountProfileAttributeDataUuid(self
        , uuid
    ) :         
        return self.data.CountProfileAttributeDataUuid(
            uuid
        )
               
    def CountProfileAttributeDataProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileAttributeDataProfileId(
            profile_id
        )
               
    def CountProfileAttributeDataProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountProfileAttributeDataProfileIdAttributeId(
            profile_id
            , attribute_id
        )
               
    def BrowseProfileAttributeDataListFilter(self, filter_obj) :
        result = ProfileAttributeDataResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileAttributeDataListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_attribute_data = self.FillProfileAttributeData(row)
                result.data.append(profile_attribute_data)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileAttributeDataUuid(self, set_type, obj) :            
            return self.data.SetProfileAttributeDataUuid(set_type, obj)
            
    def SetProfileAttributeDataProfileId(self, set_type, obj) :            
            return self.data.SetProfileAttributeDataProfileId(set_type, obj)
            
    def SetProfileAttributeDataProfileIdAttributeId(self, set_type, obj) :            
            return self.data.SetProfileAttributeDataProfileIdAttributeId(set_type, obj)
            
    def DelProfileAttributeDataUuid(self
        , uuid
    ) :
        return self.data.DelProfileAttributeDataUuid(
            uuid
        )
        
    def DelProfileAttributeDataProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileAttributeDataProfileId(
            profile_id
        )
        
    def DelProfileAttributeDataProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return self.data.DelProfileAttributeDataProfileIdAttributeId(
            profile_id
            , attribute_id
        )
        
    def GetProfileAttributeDataListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileAttributeDataListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_data  = self.FillProfileAttributeData(row)
                results.append(profile_attribute_data)
            return results        
        
    def GetProfileAttributeDataListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeDataListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_attribute_data  = self.FillProfileAttributeData(row)
                results.append(profile_attribute_data)
            return results        
        
    def GetProfileAttributeDataListProfileIdAttributeId(self
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetProfileAttributeDataListProfileIdAttributeId(
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
               
    def CountProfileDeviceUuid(self
        , uuid
    ) :         
        return self.data.CountProfileDeviceUuid(
            uuid
        )
               
    def CountProfileDeviceProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :         
        return self.data.CountProfileDeviceProfileIdDeviceId(
            profile_id
            , device_id
        )
               
    def CountProfileDeviceProfileIdToken(self
        , profile_id
        , token
    ) :         
        return self.data.CountProfileDeviceProfileIdToken(
            profile_id
            , token
        )
               
    def CountProfileDeviceProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileDeviceProfileId(
            profile_id
        )
               
    def CountProfileDeviceDeviceId(self
        , device_id
    ) :         
        return self.data.CountProfileDeviceDeviceId(
            device_id
        )
               
    def CountProfileDeviceToken(self
        , token
    ) :         
        return self.data.CountProfileDeviceToken(
            token
        )
               
    def BrowseProfileDeviceListFilter(self, filter_obj) :
        result = ProfileDeviceResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileDeviceListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_device = self.FillProfileDevice(row)
                result.data.append(profile_device)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileDeviceUuid(self, set_type, obj) :            
            return self.data.SetProfileDeviceUuid(set_type, obj)
            
    def DelProfileDeviceUuid(self
        , uuid
    ) :
        return self.data.DelProfileDeviceUuid(
            uuid
        )
        
    def DelProfileDeviceProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :
        return self.data.DelProfileDeviceProfileIdDeviceId(
            profile_id
            , device_id
        )
        
    def DelProfileDeviceProfileIdToken(self
        , profile_id
        , token
    ) :
        return self.data.DelProfileDeviceProfileIdToken(
            profile_id
            , token
        )
        
    def DelProfileDeviceToken(self
        , token
    ) :
        return self.data.DelProfileDeviceToken(
            token
        )
        
    def GetProfileDeviceListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileDeviceListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListProfileIdDeviceId(self
        , profile_id
        , device_id
    ) :

        results = []
        rows = self.data.GetProfileDeviceListProfileIdDeviceId(
            profile_id
            , device_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListProfileIdToken(self
        , profile_id
        , token
    ) :

        results = []
        rows = self.data.GetProfileDeviceListProfileIdToken(
            profile_id
            , token
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileDeviceListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListDeviceId(self
        , device_id
    ) :

        results = []
        rows = self.data.GetProfileDeviceListDeviceId(
            device_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_device  = self.FillProfileDevice(row)
                results.append(profile_device)
            return results        
        
    def GetProfileDeviceListToken(self
        , token
    ) :

        results = []
        rows = self.data.GetProfileDeviceListToken(
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
               
    def CountCountryUuid(self
        , uuid
    ) :         
        return self.data.CountCountryUuid(
            uuid
        )
               
    def CountCountryCode(self
        , code
    ) :         
        return self.data.CountCountryCode(
            code
        )
               
    def BrowseCountryListFilter(self, filter_obj) :
        result = CountryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseCountryListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                country = self.FillCountry(row)
                result.data.append(country)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetCountryUuid(self, set_type, obj) :            
            return self.data.SetCountryUuid(set_type, obj)
            
    def SetCountryCode(self, set_type, obj) :            
            return self.data.SetCountryCode(set_type, obj)
            
    def DelCountryUuid(self
        , uuid
    ) :
        return self.data.DelCountryUuid(
            uuid
        )
        
    def DelCountryCode(self
        , code
    ) :
        return self.data.DelCountryCode(
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
        
    def GetCountryListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetCountryListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                country  = self.FillCountry(row)
                results.append(country)
            return results        
        
    def GetCountryListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetCountryListCode(
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
               
    def CountStateUuid(self
        , uuid
    ) :         
        return self.data.CountStateUuid(
            uuid
        )
               
    def CountStateCode(self
        , code
    ) :         
        return self.data.CountStateCode(
            code
        )
               
    def BrowseStateListFilter(self, filter_obj) :
        result = StateResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseStateListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                state = self.FillState(row)
                result.data.append(state)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetStateUuid(self, set_type, obj) :            
            return self.data.SetStateUuid(set_type, obj)
            
    def SetStateCode(self, set_type, obj) :            
            return self.data.SetStateCode(set_type, obj)
            
    def DelStateUuid(self
        , uuid
    ) :
        return self.data.DelStateUuid(
            uuid
        )
        
    def DelStateCode(self
        , code
    ) :
        return self.data.DelStateCode(
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
        
    def GetStateListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetStateListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                state  = self.FillState(row)
                results.append(state)
            return results        
        
    def GetStateListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetStateListCode(
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
               
    def CountCityUuid(self
        , uuid
    ) :         
        return self.data.CountCityUuid(
            uuid
        )
               
    def CountCityCode(self
        , code
    ) :         
        return self.data.CountCityCode(
            code
        )
               
    def BrowseCityListFilter(self, filter_obj) :
        result = CityResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseCityListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                city = self.FillCity(row)
                result.data.append(city)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetCityUuid(self, set_type, obj) :            
            return self.data.SetCityUuid(set_type, obj)
            
    def SetCityCode(self, set_type, obj) :            
            return self.data.SetCityCode(set_type, obj)
            
    def DelCityUuid(self
        , uuid
    ) :
        return self.data.DelCityUuid(
            uuid
        )
        
    def DelCityCode(self
        , code
    ) :
        return self.data.DelCityCode(
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
        
    def GetCityListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetCityListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                city  = self.FillCity(row)
                results.append(city)
            return results        
        
    def GetCityListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetCityListCode(
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
               
    def CountPostalCodeUuid(self
        , uuid
    ) :         
        return self.data.CountPostalCodeUuid(
            uuid
        )
               
    def CountPostalCodeCode(self
        , code
    ) :         
        return self.data.CountPostalCodeCode(
            code
        )
               
    def BrowsePostalCodeListFilter(self, filter_obj) :
        result = PostalCodeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowsePostalCodeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                postal_code = self.FillPostalCode(row)
                result.data.append(postal_code)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetPostalCodeUuid(self, set_type, obj) :            
            return self.data.SetPostalCodeUuid(set_type, obj)
            
    def SetPostalCodeCode(self, set_type, obj) :            
            return self.data.SetPostalCodeCode(set_type, obj)
            
    def DelPostalCodeUuid(self
        , uuid
    ) :
        return self.data.DelPostalCodeUuid(
            uuid
        )
        
    def DelPostalCodeCode(self
        , code
    ) :
        return self.data.DelPostalCodeCode(
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
        
    def GetPostalCodeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetPostalCodeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                postal_code  = self.FillPostalCode(row)
                results.append(postal_code)
            return results        
        
    def GetPostalCodeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetPostalCodeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                postal_code  = self.FillPostalCode(row)
                results.append(postal_code)
            return results        
        



