<?php // namespace Profile;

require_once('ent/Profile.php');
require_once('ent/ProfileType.php');
require_once('ent/ProfileAttribute.php');
require_once('ent/ProfileAttributeText.php');
require_once('ent/ProfileAttributeData.php');
require_once('ent/ProfileDevice.php');
require_once('ent/Country.php');
require_once('ent/State.php');
require_once('ent/City.php');
require_once('ent/PostalCode.php');

require_once('BaseProfileData.php');

class BaseProfileACT {

    public $data;
    
    public function __construct() {
        $this->data = new BaseProfileData();
    }
    
    public function __destruct() {
        
    }
        
        
    public function FillProfile($row) {
        $obj = new Profile();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['first_name'] != NULL) {                
            $obj->first_name = $row['first_name'];#dataType.FillDataString(dr, "first_name");
        }
        if ($row['last_name'] != NULL) {                
            $obj->last_name = $row['last_name'];#dataType.FillDataString(dr, "last_name");
        }
        if ($row['hash'] != NULL) {                
            $obj->hash = $row['hash'];#dataType.FillDataString(dr, "hash");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['email'] != NULL) {                
            $obj->email = $row['email'];#dataType.FillDataString(dr, "email");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }

        return $obj;
    }
        
    public function CountProfile(
    ) {       
        return $this->data->CountProfile(
        );
    }
               
    public function CountProfileUuid(
        $uuid
    ) {       
        return $this->data->CountProfileUuid(
            $uuid
        );
    }
               
    public function CountProfileUsernameHash(
        $username
        , $hash
    ) {       
        return $this->data->CountProfileUsernameHash(
            $username
            , $hash
        );
    }
               
    public function CountProfileUsername(
        $username
    ) {       
        return $this->data->CountProfileUsername(
            $username
        );
    }
               
    public function BrowseProfileListFilter($filter_obj) {
        $result = new ProfileResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile = $this->FillProfile($row);
                $result->data[] = $profile;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileUuid($set_type, $obj) {           
        return $this->data->SetProfileUuid($set_type, $obj);
    }
            
    public function SetProfileUsername($set_type, $obj) {           
        return $this->data->SetProfileUsername($set_type, $obj);
    }
            
    public function DelProfileUuid(
        $uuid
    ) {
        return $this->data->DelProfileUuid(
            $uuid
        );
    }
        
    public function DelProfileUsername(
        $username
    ) {
        return $this->data->DelProfileUsername(
            $username
        );
    }
        
    public function GetProfileListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile  = $this->FillProfile($row);
                $results[] = $profile;
            }
        }
        
        return $results;
    }
        
    public function GetProfileListUsernameHash(
        $username
        , $hash
    ) {

        $results = array();
        $rows = $this->data->GetProfileListUsernameHash(
            $username
            , $hash
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile  = $this->FillProfile($row);
                $results[] = $profile;
            }
        }
        
        return $results;
    }
        
    public function GetProfileListUsername(
        $username
    ) {

        $results = array();
        $rows = $this->data->GetProfileListUsername(
            $username
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile  = $this->FillProfile($row);
                $results[] = $profile;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileType($row) {
        $obj = new ProfileType();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountProfileType(
    ) {       
        return $this->data->CountProfileType(
        );
    }
               
    public function CountProfileTypeUuid(
        $uuid
    ) {       
        return $this->data->CountProfileTypeUuid(
            $uuid
        );
    }
               
    public function CountProfileTypeTypeId(
        $type_id
    ) {       
        return $this->data->CountProfileTypeTypeId(
            $type_id
        );
    }
               
    public function BrowseProfileTypeListFilter($filter_obj) {
        $result = new ProfileTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileTypeListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_type = $this->FillProfileType($row);
                $result->data[] = $profile_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileTypeUuid($set_type, $obj) {           
        return $this->data->SetProfileTypeUuid($set_type, $obj);
    }
            
    public function DelProfileTypeUuid(
        $uuid
    ) {
        return $this->data->DelProfileTypeUuid(
            $uuid
        );
    }
        
    public function GetProfileTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileTypeListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_type  = $this->FillProfileType($row);
                $results[] = $profile_type;
            }
        }
        
        return $results;
    }
        
    public function GetProfileTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetProfileTypeListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_type  = $this->FillProfileType($row);
                $results[] = $profile_type;
            }
        }
        
        return $results;
    }
        
    public function GetProfileTypeListTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileTypeListTypeId(
            $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_type  = $this->FillProfileType($row);
                $results[] = $profile_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileAttribute($row) {
        $obj = new ProfileAttribute();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['sort'] != NULL) {                
            $obj->sort = $row['sort'];#dataType.FillDataInt(dr, "sort");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['group'] != NULL) {                
            $obj->group = $row['group'];#dataType.FillDataInt(dr, "group");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataInt(dr, "type");
        }
        if ($row['order'] != NULL) {                
            $obj->order = $row['order'];#dataType.FillDataInt(dr, "order");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountProfileAttribute(
    ) {       
        return $this->data->CountProfileAttribute(
        );
    }
               
    public function CountProfileAttributeUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAttributeUuid(
            $uuid
        );
    }
               
    public function CountProfileAttributeCode(
        $code
    ) {       
        return $this->data->CountProfileAttributeCode(
            $code
        );
    }
               
    public function CountProfileAttributeType(
        $type
    ) {       
        return $this->data->CountProfileAttributeType(
            $type
        );
    }
               
    public function CountProfileAttributeGroup(
        $group
    ) {       
        return $this->data->CountProfileAttributeGroup(
            $group
        );
    }
               
    public function CountProfileAttributeCodeType(
        $code
        , $type
    ) {       
        return $this->data->CountProfileAttributeCodeType(
            $code
            , $type
        );
    }
               
    public function BrowseProfileAttributeListFilter($filter_obj) {
        $result = new ProfileAttributeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAttributeListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_attribute = $this->FillProfileAttribute($row);
                $result->data[] = $profile_attribute;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileAttributeUuid($set_type, $obj) {           
        return $this->data->SetProfileAttributeUuid($set_type, $obj);
    }
            
    public function SetProfileAttributeCode($set_type, $obj) {           
        return $this->data->SetProfileAttributeCode($set_type, $obj);
    }
            
    public function DelProfileAttributeUuid(
        $uuid
    ) {
        return $this->data->DelProfileAttributeUuid(
            $uuid
        );
    }
        
    public function DelProfileAttributeCode(
        $code
    ) {
        return $this->data->DelProfileAttributeCode(
            $code
        );
    }
        
    public function GetProfileAttributeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute  = $this->FillProfileAttribute($row);
                $results[] = $profile_attribute;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute  = $this->FillProfileAttribute($row);
                $results[] = $profile_attribute;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeListType(
        $type
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListType(
            $type
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute  = $this->FillProfileAttribute($row);
                $results[] = $profile_attribute;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeListGroup(
        $group
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListGroup(
            $group
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute  = $this->FillProfileAttribute($row);
                $results[] = $profile_attribute;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeListCodeType(
        $code
        , $type
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListCodeType(
            $code
            , $type
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute  = $this->FillProfileAttribute($row);
                $results[] = $profile_attribute;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileAttributeText($row) {
        $obj = new ProfileAttributeText();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['sort'] != NULL) {                
            $obj->sort = $row['sort'];#dataType.FillDataInt(dr, "sort");
        }
        if ($row['group'] != NULL) {                
            $obj->group = $row['group'];#dataType.FillDataInt(dr, "group");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['attribute_id'] != NULL) {                
            $obj->attribute_id = $row['attribute_id'];#dataType.FillDataString(dr, "attribute_id");
        }
        if ($row['attribute_value'] != NULL) {                
            $obj->attribute_value = $row['attribute_value'];#dataType.FillDataString(dr, "attribute_value");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataInt(dr, "type");
        }
        if ($row['order'] != NULL) {                
            $obj->order = $row['order'];#dataType.FillDataInt(dr, "order");
        }

        return $obj;
    }
        
    public function CountProfileAttributeText(
    ) {       
        return $this->data->CountProfileAttributeText(
        );
    }
               
    public function CountProfileAttributeTextUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAttributeTextUuid(
            $uuid
        );
    }
               
    public function CountProfileAttributeTextProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileAttributeTextProfileId(
            $profile_id
        );
    }
               
    public function CountProfileAttributeTextProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {       
        return $this->data->CountProfileAttributeTextProfileIdAttributeId(
            $profile_id
            , $attribute_id
        );
    }
               
    public function BrowseProfileAttributeTextListFilter($filter_obj) {
        $result = new ProfileAttributeTextResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAttributeTextListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_attribute_text = $this->FillProfileAttributeText($row);
                $result->data[] = $profile_attribute_text;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileAttributeTextUuid($set_type, $obj) {           
        return $this->data->SetProfileAttributeTextUuid($set_type, $obj);
    }
            
    public function SetProfileAttributeTextProfileId($set_type, $obj) {           
        return $this->data->SetProfileAttributeTextProfileId($set_type, $obj);
    }
            
    public function SetProfileAttributeTextProfileIdAttributeId($set_type, $obj) {           
        return $this->data->SetProfileAttributeTextProfileIdAttributeId($set_type, $obj);
    }
            
    public function DelProfileAttributeTextUuid(
        $uuid
    ) {
        return $this->data->DelProfileAttributeTextUuid(
            $uuid
        );
    }
        
    public function DelProfileAttributeTextProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileAttributeTextProfileId(
            $profile_id
        );
    }
        
    public function DelProfileAttributeTextProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->data->DelProfileAttributeTextProfileIdAttributeId(
            $profile_id
            , $attribute_id
        );
    }
        
    public function GetProfileAttributeTextListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeTextListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute_text  = $this->FillProfileAttributeText($row);
                $results[] = $profile_attribute_text;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeTextListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeTextListProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute_text  = $this->FillProfileAttributeText($row);
                $results[] = $profile_attribute_text;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeTextListProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeTextListProfileIdAttributeId(
            $profile_id
            , $attribute_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute_text  = $this->FillProfileAttributeText($row);
                $results[] = $profile_attribute_text;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileAttributeData($row) {
        $obj = new ProfileAttributeData();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['sort'] != NULL) {                
            $obj->sort = $row['sort'];#dataType.FillDataInt(dr, "sort");
        }
        if ($row['group'] != NULL) {                
            $obj->group = $row['group'];#dataType.FillDataInt(dr, "group");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['attribute_id'] != NULL) {                
            $obj->attribute_id = $row['attribute_id'];#dataType.FillDataString(dr, "attribute_id");
        }
        if ($row['attribute_value'] != NULL) {                
            $obj->attribute_value = $row['attribute_value'];#dataType.FillDataString(dr, "attribute_value");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataInt(dr, "type");
        }
        if ($row['order'] != NULL) {                
            $obj->order = $row['order'];#dataType.FillDataInt(dr, "order");
        }

        return $obj;
    }
        
    public function CountProfileAttributeData(
    ) {       
        return $this->data->CountProfileAttributeData(
        );
    }
               
    public function CountProfileAttributeDataUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAttributeDataUuid(
            $uuid
        );
    }
               
    public function CountProfileAttributeDataProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileAttributeDataProfileId(
            $profile_id
        );
    }
               
    public function CountProfileAttributeDataProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {       
        return $this->data->CountProfileAttributeDataProfileIdAttributeId(
            $profile_id
            , $attribute_id
        );
    }
               
    public function BrowseProfileAttributeDataListFilter($filter_obj) {
        $result = new ProfileAttributeDataResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAttributeDataListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_attribute_data = $this->FillProfileAttributeData($row);
                $result->data[] = $profile_attribute_data;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileAttributeDataUuid($set_type, $obj) {           
        return $this->data->SetProfileAttributeDataUuid($set_type, $obj);
    }
            
    public function SetProfileAttributeDataProfileId($set_type, $obj) {           
        return $this->data->SetProfileAttributeDataProfileId($set_type, $obj);
    }
            
    public function SetProfileAttributeDataProfileIdAttributeId($set_type, $obj) {           
        return $this->data->SetProfileAttributeDataProfileIdAttributeId($set_type, $obj);
    }
            
    public function DelProfileAttributeDataUuid(
        $uuid
    ) {
        return $this->data->DelProfileAttributeDataUuid(
            $uuid
        );
    }
        
    public function DelProfileAttributeDataProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileAttributeDataProfileId(
            $profile_id
        );
    }
        
    public function DelProfileAttributeDataProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->data->DelProfileAttributeDataProfileIdAttributeId(
            $profile_id
            , $attribute_id
        );
    }
        
    public function GetProfileAttributeDataListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeDataListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute_data  = $this->FillProfileAttributeData($row);
                $results[] = $profile_attribute_data;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeDataListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeDataListProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute_data  = $this->FillProfileAttributeData($row);
                $results[] = $profile_attribute_data;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAttributeDataListProfileIdAttributeId(
        $profile_id
        , $attribute_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeDataListProfileIdAttributeId(
            $profile_id
            , $attribute_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_attribute_data  = $this->FillProfileAttributeData($row);
                $results[] = $profile_attribute_data;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileDevice($row) {
        $obj = new ProfileDevice();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['token'] != NULL) {                
            $obj->token = $row['token'];#dataType.FillDataString(dr, "token");
        }
        if ($row['secret'] != NULL) {                
            $obj->secret = $row['secret'];#dataType.FillDataString(dr, "secret");
        }
        if ($row['device_version'] != NULL) {                
            $obj->device_version = $row['device_version'];#dataType.FillDataString(dr, "device_version");
        }
        if ($row['device_type'] != NULL) {                
            $obj->device_type = $row['device_type'];#dataType.FillDataString(dr, "device_type");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['device_os'] != NULL) {                
            $obj->device_os = $row['device_os'];#dataType.FillDataString(dr, "device_os");
        }
        if ($row['device_id'] != NULL) {                
            $obj->device_id = $row['device_id'];#dataType.FillDataString(dr, "device_id");
        }
        if ($row['device_platform'] != NULL) {                
            $obj->device_platform = $row['device_platform'];#dataType.FillDataString(dr, "device_platform");
        }

        return $obj;
    }
        
    public function CountProfileDevice(
    ) {       
        return $this->data->CountProfileDevice(
        );
    }
               
    public function CountProfileDeviceUuid(
        $uuid
    ) {       
        return $this->data->CountProfileDeviceUuid(
            $uuid
        );
    }
               
    public function CountProfileDeviceProfileIdDeviceId(
        $profile_id
        , $device_id
    ) {       
        return $this->data->CountProfileDeviceProfileIdDeviceId(
            $profile_id
            , $device_id
        );
    }
               
    public function CountProfileDeviceProfileIdToken(
        $profile_id
        , $token
    ) {       
        return $this->data->CountProfileDeviceProfileIdToken(
            $profile_id
            , $token
        );
    }
               
    public function CountProfileDeviceProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileDeviceProfileId(
            $profile_id
        );
    }
               
    public function CountProfileDeviceDeviceId(
        $device_id
    ) {       
        return $this->data->CountProfileDeviceDeviceId(
            $device_id
        );
    }
               
    public function CountProfileDeviceToken(
        $token
    ) {       
        return $this->data->CountProfileDeviceToken(
            $token
        );
    }
               
    public function BrowseProfileDeviceListFilter($filter_obj) {
        $result = new ProfileDeviceResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileDeviceListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_device = $this->FillProfileDevice($row);
                $result->data[] = $profile_device;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileDeviceUuid($set_type, $obj) {           
        return $this->data->SetProfileDeviceUuid($set_type, $obj);
    }
            
    public function DelProfileDeviceUuid(
        $uuid
    ) {
        return $this->data->DelProfileDeviceUuid(
            $uuid
        );
    }
        
    public function DelProfileDeviceProfileIdDeviceId(
        $profile_id
        , $device_id
    ) {
        return $this->data->DelProfileDeviceProfileIdDeviceId(
            $profile_id
            , $device_id
        );
    }
        
    public function DelProfileDeviceProfileIdToken(
        $profile_id
        , $token
    ) {
        return $this->data->DelProfileDeviceProfileIdToken(
            $profile_id
            , $token
        );
    }
        
    public function DelProfileDeviceToken(
        $token
    ) {
        return $this->data->DelProfileDeviceToken(
            $token
        );
    }
        
    public function GetProfileDeviceListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_device  = $this->FillProfileDevice($row);
                $results[] = $profile_device;
            }
        }
        
        return $results;
    }
        
    public function GetProfileDeviceListProfileIdDeviceId(
        $profile_id
        , $device_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListProfileIdDeviceId(
            $profile_id
            , $device_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_device  = $this->FillProfileDevice($row);
                $results[] = $profile_device;
            }
        }
        
        return $results;
    }
        
    public function GetProfileDeviceListProfileIdToken(
        $profile_id
        , $token
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListProfileIdToken(
            $profile_id
            , $token
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_device  = $this->FillProfileDevice($row);
                $results[] = $profile_device;
            }
        }
        
        return $results;
    }
        
    public function GetProfileDeviceListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_device  = $this->FillProfileDevice($row);
                $results[] = $profile_device;
            }
        }
        
        return $results;
    }
        
    public function GetProfileDeviceListDeviceId(
        $device_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListDeviceId(
            $device_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_device  = $this->FillProfileDevice($row);
                $results[] = $profile_device;
            }
        }
        
        return $results;
    }
        
    public function GetProfileDeviceListToken(
        $token
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListToken(
            $token
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_device  = $this->FillProfileDevice($row);
                $results[] = $profile_device;
            }
        }
        
        return $results;
    }
        
        
    public function FillCountry($row) {
        $obj = new Country();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountCountry(
    ) {       
        return $this->data->CountCountry(
        );
    }
               
    public function CountCountryUuid(
        $uuid
    ) {       
        return $this->data->CountCountryUuid(
            $uuid
        );
    }
               
    public function CountCountryCode(
        $code
    ) {       
        return $this->data->CountCountryCode(
            $code
        );
    }
               
    public function BrowseCountryListFilter($filter_obj) {
        $result = new CountryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseCountryListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $country = $this->FillCountry($row);
                $result->data[] = $country;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetCountryUuid($set_type, $obj) {           
        return $this->data->SetCountryUuid($set_type, $obj);
    }
            
    public function SetCountryCode($set_type, $obj) {           
        return $this->data->SetCountryCode($set_type, $obj);
    }
            
    public function DelCountryUuid(
        $uuid
    ) {
        return $this->data->DelCountryUuid(
            $uuid
        );
    }
        
    public function DelCountryCode(
        $code
    ) {
        return $this->data->DelCountryCode(
            $code
        );
    }
        
    public function GetCountryList(
    ) {

        $results = array();
        $rows = $this->data->GetCountryList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $country  = $this->FillCountry($row);
                $results[] = $country;
            }
        }
        
        return $results;
    }
        
    public function GetCountryListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetCountryListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $country  = $this->FillCountry($row);
                $results[] = $country;
            }
        }
        
        return $results;
    }
        
    public function GetCountryListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetCountryListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $country  = $this->FillCountry($row);
                $results[] = $country;
            }
        }
        
        return $results;
    }
        
        
    public function FillState($row) {
        $obj = new State();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountState(
    ) {       
        return $this->data->CountState(
        );
    }
               
    public function CountStateUuid(
        $uuid
    ) {       
        return $this->data->CountStateUuid(
            $uuid
        );
    }
               
    public function CountStateCode(
        $code
    ) {       
        return $this->data->CountStateCode(
            $code
        );
    }
               
    public function BrowseStateListFilter($filter_obj) {
        $result = new StateResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseStateListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $state = $this->FillState($row);
                $result->data[] = $state;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetStateUuid($set_type, $obj) {           
        return $this->data->SetStateUuid($set_type, $obj);
    }
            
    public function SetStateCode($set_type, $obj) {           
        return $this->data->SetStateCode($set_type, $obj);
    }
            
    public function DelStateUuid(
        $uuid
    ) {
        return $this->data->DelStateUuid(
            $uuid
        );
    }
        
    public function DelStateCode(
        $code
    ) {
        return $this->data->DelStateCode(
            $code
        );
    }
        
    public function GetStateList(
    ) {

        $results = array();
        $rows = $this->data->GetStateList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $state  = $this->FillState($row);
                $results[] = $state;
            }
        }
        
        return $results;
    }
        
    public function GetStateListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetStateListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $state  = $this->FillState($row);
                $results[] = $state;
            }
        }
        
        return $results;
    }
        
    public function GetStateListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetStateListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $state  = $this->FillState($row);
                $results[] = $state;
            }
        }
        
        return $results;
    }
        
        
    public function FillCity($row) {
        $obj = new City();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountCity(
    ) {       
        return $this->data->CountCity(
        );
    }
               
    public function CountCityUuid(
        $uuid
    ) {       
        return $this->data->CountCityUuid(
            $uuid
        );
    }
               
    public function CountCityCode(
        $code
    ) {       
        return $this->data->CountCityCode(
            $code
        );
    }
               
    public function BrowseCityListFilter($filter_obj) {
        $result = new CityResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseCityListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $city = $this->FillCity($row);
                $result->data[] = $city;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetCityUuid($set_type, $obj) {           
        return $this->data->SetCityUuid($set_type, $obj);
    }
            
    public function SetCityCode($set_type, $obj) {           
        return $this->data->SetCityCode($set_type, $obj);
    }
            
    public function DelCityUuid(
        $uuid
    ) {
        return $this->data->DelCityUuid(
            $uuid
        );
    }
        
    public function DelCityCode(
        $code
    ) {
        return $this->data->DelCityCode(
            $code
        );
    }
        
    public function GetCityList(
    ) {

        $results = array();
        $rows = $this->data->GetCityList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $city  = $this->FillCity($row);
                $results[] = $city;
            }
        }
        
        return $results;
    }
        
    public function GetCityListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetCityListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $city  = $this->FillCity($row);
                $results[] = $city;
            }
        }
        
        return $results;
    }
        
    public function GetCityListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetCityListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $city  = $this->FillCity($row);
                $results[] = $city;
            }
        }
        
        return $results;
    }
        
        
    public function FillPostalCode($row) {
        $obj = new PostalCode();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountPostalCode(
    ) {       
        return $this->data->CountPostalCode(
        );
    }
               
    public function CountPostalCodeUuid(
        $uuid
    ) {       
        return $this->data->CountPostalCodeUuid(
            $uuid
        );
    }
               
    public function CountPostalCodeCode(
        $code
    ) {       
        return $this->data->CountPostalCodeCode(
            $code
        );
    }
               
    public function BrowsePostalCodeListFilter($filter_obj) {
        $result = new PostalCodeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowsePostalCodeListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $postal_code = $this->FillPostalCode($row);
                $result->data[] = $postal_code;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetPostalCodeUuid($set_type, $obj) {           
        return $this->data->SetPostalCodeUuid($set_type, $obj);
    }
            
    public function SetPostalCodeCode($set_type, $obj) {           
        return $this->data->SetPostalCodeCode($set_type, $obj);
    }
            
    public function DelPostalCodeUuid(
        $uuid
    ) {
        return $this->data->DelPostalCodeUuid(
            $uuid
        );
    }
        
    public function DelPostalCodeCode(
        $code
    ) {
        return $this->data->DelPostalCodeCode(
            $code
        );
    }
        
    public function GetPostalCodeList(
    ) {

        $results = array();
        $rows = $this->data->GetPostalCodeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $postal_code  = $this->FillPostalCode($row);
                $results[] = $postal_code;
            }
        }
        
        return $results;
    }
        
    public function GetPostalCodeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetPostalCodeListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $postal_code  = $this->FillPostalCode($row);
                $results[] = $postal_code;
            }
        }
        
        return $results;
    }
        
    public function GetPostalCodeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetPostalCodeListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $postal_code  = $this->FillPostalCode($row);
                $results[] = $postal_code;
            }
        }
        
        return $results;
    }
        


}

?>