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
               
    public function CountProfileByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileByUuid(
            $uuid
        );
    }
               
    public function CountProfileByUsernameByHash(
        $username
        , $hash
    ) {       
        return $this->data->CountProfileByUsernameByHash(
            $username
            , $hash
        );
    }
               
    public function CountProfileByUsername(
        $username
    ) {       
        return $this->data->CountProfileByUsername(
            $username
        );
    }
               
    public function BrowseProfileListByFilter($filter_obj) {
        $result = new ProfileResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileListByFilter(filter_obj);
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

    public function SetProfileByUuid($set_type, $obj) {           
        return $this->data->SetProfileByUuid($set_type, $obj);
    }
            
    public function SetProfileByUsername($set_type, $obj) {           
        return $this->data->SetProfileByUsername($set_type, $obj);
    }
            
    public function DelProfileByUuid(
        $uuid
    ) {
        return $this->data->DelProfileByUuid(
            $uuid
        );
    }
        
    public function DelProfileByUsername(
        $username
    ) {
        return $this->data->DelProfileByUsername(
            $username
        );
    }
        
    public function GetProfileListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileListByUuid(
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
        
    public function GetProfileListByUsernameByHash(
        $username
        , $hash
    ) {

        $results = array();
        $rows = $this->data->GetProfileListByUsernameByHash(
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
        
    public function GetProfileListByUsername(
        $username
    ) {

        $results = array();
        $rows = $this->data->GetProfileListByUsername(
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
               
    public function CountProfileTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileTypeByUuid(
            $uuid
        );
    }
               
    public function CountProfileTypeByTypeId(
        $type_id
    ) {       
        return $this->data->CountProfileTypeByTypeId(
            $type_id
        );
    }
               
    public function BrowseProfileTypeListByFilter($filter_obj) {
        $result = new ProfileTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileTypeListByFilter(filter_obj);
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

    public function SetProfileTypeByUuid($set_type, $obj) {           
        return $this->data->SetProfileTypeByUuid($set_type, $obj);
    }
            
    public function DelProfileTypeByUuid(
        $uuid
    ) {
        return $this->data->DelProfileTypeByUuid(
            $uuid
        );
    }
        
    public function GetProfileTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileTypeListByUuid(
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
        
    public function GetProfileTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetProfileTypeListByCode(
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
        
    public function GetProfileTypeListByTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileTypeListByTypeId(
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
               
    public function CountProfileAttributeByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAttributeByUuid(
            $uuid
        );
    }
               
    public function CountProfileAttributeByCode(
        $code
    ) {       
        return $this->data->CountProfileAttributeByCode(
            $code
        );
    }
               
    public function CountProfileAttributeByType(
        $type
    ) {       
        return $this->data->CountProfileAttributeByType(
            $type
        );
    }
               
    public function CountProfileAttributeByGroup(
        $group
    ) {       
        return $this->data->CountProfileAttributeByGroup(
            $group
        );
    }
               
    public function CountProfileAttributeByCodeByType(
        $code
        , $type
    ) {       
        return $this->data->CountProfileAttributeByCodeByType(
            $code
            , $type
        );
    }
               
    public function BrowseProfileAttributeListByFilter($filter_obj) {
        $result = new ProfileAttributeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAttributeListByFilter(filter_obj);
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

    public function SetProfileAttributeByUuid($set_type, $obj) {           
        return $this->data->SetProfileAttributeByUuid($set_type, $obj);
    }
            
    public function SetProfileAttributeByCode($set_type, $obj) {           
        return $this->data->SetProfileAttributeByCode($set_type, $obj);
    }
            
    public function DelProfileAttributeByUuid(
        $uuid
    ) {
        return $this->data->DelProfileAttributeByUuid(
            $uuid
        );
    }
        
    public function DelProfileAttributeByCode(
        $code
    ) {
        return $this->data->DelProfileAttributeByCode(
            $code
        );
    }
        
    public function GetProfileAttributeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListByUuid(
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
        
    public function GetProfileAttributeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListByCode(
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
        
    public function GetProfileAttributeListByType(
        $type
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListByType(
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
        
    public function GetProfileAttributeListByGroup(
        $group
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListByGroup(
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
        
    public function GetProfileAttributeListByCodeByType(
        $code
        , $type
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeListByCodeByType(
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
               
    public function CountProfileAttributeTextByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAttributeTextByUuid(
            $uuid
        );
    }
               
    public function CountProfileAttributeTextByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileAttributeTextByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {       
        return $this->data->CountProfileAttributeTextByProfileIdByAttributeId(
            $profile_id
            , $attribute_id
        );
    }
               
    public function BrowseProfileAttributeTextListByFilter($filter_obj) {
        $result = new ProfileAttributeTextResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAttributeTextListByFilter(filter_obj);
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

    public function SetProfileAttributeTextByUuid($set_type, $obj) {           
        return $this->data->SetProfileAttributeTextByUuid($set_type, $obj);
    }
            
    public function SetProfileAttributeTextByProfileId($set_type, $obj) {           
        return $this->data->SetProfileAttributeTextByProfileId($set_type, $obj);
    }
            
    public function SetProfileAttributeTextByProfileIdByAttributeId($set_type, $obj) {           
        return $this->data->SetProfileAttributeTextByProfileIdByAttributeId($set_type, $obj);
    }
            
    public function DelProfileAttributeTextByUuid(
        $uuid
    ) {
        return $this->data->DelProfileAttributeTextByUuid(
            $uuid
        );
    }
        
    public function DelProfileAttributeTextByProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileAttributeTextByProfileId(
            $profile_id
        );
    }
        
    public function DelProfileAttributeTextByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->data->DelProfileAttributeTextByProfileIdByAttributeId(
            $profile_id
            , $attribute_id
        );
    }
        
    public function GetProfileAttributeTextListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeTextListByUuid(
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
        
    public function GetProfileAttributeTextListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeTextListByProfileId(
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
        
    public function GetProfileAttributeTextListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeTextListByProfileIdByAttributeId(
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
               
    public function CountProfileAttributeDataByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAttributeDataByUuid(
            $uuid
        );
    }
               
    public function CountProfileAttributeDataByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileAttributeDataByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {       
        return $this->data->CountProfileAttributeDataByProfileIdByAttributeId(
            $profile_id
            , $attribute_id
        );
    }
               
    public function BrowseProfileAttributeDataListByFilter($filter_obj) {
        $result = new ProfileAttributeDataResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAttributeDataListByFilter(filter_obj);
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

    public function SetProfileAttributeDataByUuid($set_type, $obj) {           
        return $this->data->SetProfileAttributeDataByUuid($set_type, $obj);
    }
            
    public function SetProfileAttributeDataByProfileId($set_type, $obj) {           
        return $this->data->SetProfileAttributeDataByProfileId($set_type, $obj);
    }
            
    public function SetProfileAttributeDataByProfileIdByAttributeId($set_type, $obj) {           
        return $this->data->SetProfileAttributeDataByProfileIdByAttributeId($set_type, $obj);
    }
            
    public function DelProfileAttributeDataByUuid(
        $uuid
    ) {
        return $this->data->DelProfileAttributeDataByUuid(
            $uuid
        );
    }
        
    public function DelProfileAttributeDataByProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileAttributeDataByProfileId(
            $profile_id
        );
    }
        
    public function DelProfileAttributeDataByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {
        return $this->data->DelProfileAttributeDataByProfileIdByAttributeId(
            $profile_id
            , $attribute_id
        );
    }
        
    public function GetProfileAttributeDataListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeDataListByUuid(
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
        
    public function GetProfileAttributeDataListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeDataListByProfileId(
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
        
    public function GetProfileAttributeDataListByProfileIdByAttributeId(
        $profile_id
        , $attribute_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAttributeDataListByProfileIdByAttributeId(
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
               
    public function CountProfileDeviceByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileDeviceByUuid(
            $uuid
        );
    }
               
    public function CountProfileDeviceByProfileIdByDeviceId(
        $profile_id
        , $device_id
    ) {       
        return $this->data->CountProfileDeviceByProfileIdByDeviceId(
            $profile_id
            , $device_id
        );
    }
               
    public function CountProfileDeviceByProfileIdByToken(
        $profile_id
        , $token
    ) {       
        return $this->data->CountProfileDeviceByProfileIdByToken(
            $profile_id
            , $token
        );
    }
               
    public function CountProfileDeviceByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileDeviceByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileDeviceByDeviceId(
        $device_id
    ) {       
        return $this->data->CountProfileDeviceByDeviceId(
            $device_id
        );
    }
               
    public function CountProfileDeviceByToken(
        $token
    ) {       
        return $this->data->CountProfileDeviceByToken(
            $token
        );
    }
               
    public function BrowseProfileDeviceListByFilter($filter_obj) {
        $result = new ProfileDeviceResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileDeviceListByFilter(filter_obj);
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

    public function SetProfileDeviceByUuid($set_type, $obj) {           
        return $this->data->SetProfileDeviceByUuid($set_type, $obj);
    }
            
    public function DelProfileDeviceByUuid(
        $uuid
    ) {
        return $this->data->DelProfileDeviceByUuid(
            $uuid
        );
    }
        
    public function DelProfileDeviceByProfileIdByDeviceId(
        $profile_id
        , $device_id
    ) {
        return $this->data->DelProfileDeviceByProfileIdByDeviceId(
            $profile_id
            , $device_id
        );
    }
        
    public function DelProfileDeviceByProfileIdByToken(
        $profile_id
        , $token
    ) {
        return $this->data->DelProfileDeviceByProfileIdByToken(
            $profile_id
            , $token
        );
    }
        
    public function DelProfileDeviceByToken(
        $token
    ) {
        return $this->data->DelProfileDeviceByToken(
            $token
        );
    }
        
    public function GetProfileDeviceListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListByUuid(
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
        
    public function GetProfileDeviceListByProfileIdByDeviceId(
        $profile_id
        , $device_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListByProfileIdByDeviceId(
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
        
    public function GetProfileDeviceListByProfileIdByToken(
        $profile_id
        , $token
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListByProfileIdByToken(
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
        
    public function GetProfileDeviceListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListByProfileId(
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
        
    public function GetProfileDeviceListByDeviceId(
        $device_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListByDeviceId(
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
        
    public function GetProfileDeviceListByToken(
        $token
    ) {

        $results = array();
        $rows = $this->data->GetProfileDeviceListByToken(
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
               
    public function CountCountryByUuid(
        $uuid
    ) {       
        return $this->data->CountCountryByUuid(
            $uuid
        );
    }
               
    public function CountCountryByCode(
        $code
    ) {       
        return $this->data->CountCountryByCode(
            $code
        );
    }
               
    public function BrowseCountryListByFilter($filter_obj) {
        $result = new CountryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseCountryListByFilter(filter_obj);
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

    public function SetCountryByUuid($set_type, $obj) {           
        return $this->data->SetCountryByUuid($set_type, $obj);
    }
            
    public function SetCountryByCode($set_type, $obj) {           
        return $this->data->SetCountryByCode($set_type, $obj);
    }
            
    public function DelCountryByUuid(
        $uuid
    ) {
        return $this->data->DelCountryByUuid(
            $uuid
        );
    }
        
    public function DelCountryByCode(
        $code
    ) {
        return $this->data->DelCountryByCode(
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
        
    public function GetCountryListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetCountryListByUuid(
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
        
    public function GetCountryListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetCountryListByCode(
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
               
    public function CountStateByUuid(
        $uuid
    ) {       
        return $this->data->CountStateByUuid(
            $uuid
        );
    }
               
    public function CountStateByCode(
        $code
    ) {       
        return $this->data->CountStateByCode(
            $code
        );
    }
               
    public function BrowseStateListByFilter($filter_obj) {
        $result = new StateResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseStateListByFilter(filter_obj);
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

    public function SetStateByUuid($set_type, $obj) {           
        return $this->data->SetStateByUuid($set_type, $obj);
    }
            
    public function SetStateByCode($set_type, $obj) {           
        return $this->data->SetStateByCode($set_type, $obj);
    }
            
    public function DelStateByUuid(
        $uuid
    ) {
        return $this->data->DelStateByUuid(
            $uuid
        );
    }
        
    public function DelStateByCode(
        $code
    ) {
        return $this->data->DelStateByCode(
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
        
    public function GetStateListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetStateListByUuid(
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
        
    public function GetStateListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetStateListByCode(
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
               
    public function CountCityByUuid(
        $uuid
    ) {       
        return $this->data->CountCityByUuid(
            $uuid
        );
    }
               
    public function CountCityByCode(
        $code
    ) {       
        return $this->data->CountCityByCode(
            $code
        );
    }
               
    public function BrowseCityListByFilter($filter_obj) {
        $result = new CityResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseCityListByFilter(filter_obj);
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

    public function SetCityByUuid($set_type, $obj) {           
        return $this->data->SetCityByUuid($set_type, $obj);
    }
            
    public function SetCityByCode($set_type, $obj) {           
        return $this->data->SetCityByCode($set_type, $obj);
    }
            
    public function DelCityByUuid(
        $uuid
    ) {
        return $this->data->DelCityByUuid(
            $uuid
        );
    }
        
    public function DelCityByCode(
        $code
    ) {
        return $this->data->DelCityByCode(
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
        
    public function GetCityListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetCityListByUuid(
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
        
    public function GetCityListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetCityListByCode(
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
               
    public function CountPostalCodeByUuid(
        $uuid
    ) {       
        return $this->data->CountPostalCodeByUuid(
            $uuid
        );
    }
               
    public function CountPostalCodeByCode(
        $code
    ) {       
        return $this->data->CountPostalCodeByCode(
            $code
        );
    }
               
    public function BrowsePostalCodeListByFilter($filter_obj) {
        $result = new PostalCodeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowsePostalCodeListByFilter(filter_obj);
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

    public function SetPostalCodeByUuid($set_type, $obj) {           
        return $this->data->SetPostalCodeByUuid($set_type, $obj);
    }
            
    public function SetPostalCodeByCode($set_type, $obj) {           
        return $this->data->SetPostalCodeByCode($set_type, $obj);
    }
            
    public function DelPostalCodeByUuid(
        $uuid
    ) {
        return $this->data->DelPostalCodeByUuid(
            $uuid
        );
    }
        
    public function DelPostalCodeByCode(
        $code
    ) {
        return $this->data->DelPostalCodeByCode(
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
        
    public function GetPostalCodeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetPostalCodeListByUuid(
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
        
    public function GetPostalCodeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetPostalCodeListByCode(
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