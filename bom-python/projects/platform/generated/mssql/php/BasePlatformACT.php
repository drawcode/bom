<?php // namespace Platform;

require_once('ent/App.php');
require_once('ent/AppType.php');
require_once('ent/Site.php');
require_once('ent/SiteType.php');
require_once('ent/Org.php');
require_once('ent/OrgType.php');
require_once('ent/ContentItem.php');
require_once('ent/ContentItemType.php');
require_once('ent/ContentPage.php');
require_once('ent/Message.php');
require_once('ent/Offer.php');
require_once('ent/OfferType.php');
require_once('ent/OfferLocation.php');
require_once('ent/OfferCategory.php');
require_once('ent/OfferCategoryTree.php');
require_once('ent/OfferCategoryAssoc.php');
require_once('ent/OfferGameLocation.php');
require_once('ent/EventInfo.php');
require_once('ent/EventLocation.php');
require_once('ent/EventCategory.php');
require_once('ent/EventCategoryTree.php');
require_once('ent/EventCategoryAssoc.php');
require_once('ent/Channel.php');
require_once('ent/ChannelType.php');
require_once('ent/Question.php');
require_once('ent/ProfileOffer.php');
require_once('ent/ProfileApp.php');
require_once('ent/ProfileOrg.php');
require_once('ent/ProfileQuestion.php');
require_once('ent/ProfileChannel.php');
require_once('ent/OrgSite.php');
require_once('ent/SiteApp.php');
require_once('ent/Photo.php');
require_once('ent/Video.php');

require_once('BasePlatformData.php');

class BasePlatformACT {

    public $data;
    
    public function __construct() {
        $this->data = new BasePlatformData();
    }
    
    public function __destruct() {
        
    }
        
        
    public function FillApp($row) {
        $obj = new App();

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
        if ($row['platform'] != NULL) {                
            $obj->platform = $row['platform'];#dataType.FillDataString(dr, "platform");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountApp(
    ) {       
        return $this->data->CountApp(
        );
    }
               
    public function CountAppByUuid(
        $uuid
    ) {       
        return $this->data->CountAppByUuid(
            $uuid
        );
    }
               
    public function CountAppByCode(
        $code
    ) {       
        return $this->data->CountAppByCode(
            $code
        );
    }
               
    public function CountAppByTypeId(
        $type_id
    ) {       
        return $this->data->CountAppByTypeId(
            $type_id
        );
    }
               
    public function CountAppByCodeByTypeId(
        $code
        , $type_id
    ) {       
        return $this->data->CountAppByCodeByTypeId(
            $code
            , $type_id
        );
    }
               
    public function CountAppByPlatformByTypeId(
        $platform
        , $type_id
    ) {       
        return $this->data->CountAppByPlatformByTypeId(
            $platform
            , $type_id
        );
    }
               
    public function CountAppByPlatform(
        $platform
    ) {       
        return $this->data->CountAppByPlatform(
            $platform
        );
    }
               
    public function BrowseAppListByFilter($filter_obj) {
        $result = new AppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseAppListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $app = $this->FillApp($row);
                $result->data[] = $app;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetAppByUuid($set_type, $obj) {           
        return $this->data->SetAppByUuid($set_type, $obj);
    }
            
    public function SetAppByCode($set_type, $obj) {           
        return $this->data->SetAppByCode($set_type, $obj);
    }
            
    public function DelAppByUuid(
        $uuid
    ) {
        return $this->data->DelAppByUuid(
            $uuid
        );
    }
        
    public function DelAppByCode(
        $code
    ) {
        return $this->data->DelAppByCode(
            $code
        );
    }
        
    public function GetAppList(
    ) {

        $results = array();
        $rows = $this->data->GetAppList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app  = $this->FillApp($row);
                $results[] = $app;
            }
        }
        
        return $results;
    }
        
    public function GetAppListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetAppListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app  = $this->FillApp($row);
                $results[] = $app;
            }
        }
        
        return $results;
    }
        
    public function GetAppListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetAppListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app  = $this->FillApp($row);
                $results[] = $app;
            }
        }
        
        return $results;
    }
        
    public function GetAppListByTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetAppListByTypeId(
            $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app  = $this->FillApp($row);
                $results[] = $app;
            }
        }
        
        return $results;
    }
        
    public function GetAppListByCodeByTypeId(
        $code
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetAppListByCodeByTypeId(
            $code
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app  = $this->FillApp($row);
                $results[] = $app;
            }
        }
        
        return $results;
    }
        
    public function GetAppListByPlatformByTypeId(
        $platform
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetAppListByPlatformByTypeId(
            $platform
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app  = $this->FillApp($row);
                $results[] = $app;
            }
        }
        
        return $results;
    }
        
    public function GetAppListByPlatform(
        $platform
    ) {

        $results = array();
        $rows = $this->data->GetAppListByPlatform(
            $platform
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app  = $this->FillApp($row);
                $results[] = $app;
            }
        }
        
        return $results;
    }
        
        
    public function FillAppType($row) {
        $obj = new AppType();

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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountAppType(
    ) {       
        return $this->data->CountAppType(
        );
    }
               
    public function CountAppTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountAppTypeByUuid(
            $uuid
        );
    }
               
    public function CountAppTypeByCode(
        $code
    ) {       
        return $this->data->CountAppTypeByCode(
            $code
        );
    }
               
    public function BrowseAppTypeListByFilter($filter_obj) {
        $result = new AppTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseAppTypeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $app_type = $this->FillAppType($row);
                $result->data[] = $app_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetAppTypeByUuid($set_type, $obj) {           
        return $this->data->SetAppTypeByUuid($set_type, $obj);
    }
            
    public function SetAppTypeByCode($set_type, $obj) {           
        return $this->data->SetAppTypeByCode($set_type, $obj);
    }
            
    public function DelAppTypeByUuid(
        $uuid
    ) {
        return $this->data->DelAppTypeByUuid(
            $uuid
        );
    }
        
    public function DelAppTypeByCode(
        $code
    ) {
        return $this->data->DelAppTypeByCode(
            $code
        );
    }
        
    public function GetAppTypeList(
    ) {

        $results = array();
        $rows = $this->data->GetAppTypeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app_type  = $this->FillAppType($row);
                $results[] = $app_type;
            }
        }
        
        return $results;
    }
        
    public function GetAppTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetAppTypeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app_type  = $this->FillAppType($row);
                $results[] = $app_type;
            }
        }
        
        return $results;
    }
        
    public function GetAppTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetAppTypeListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $app_type  = $this->FillAppType($row);
                $results[] = $app_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillSite($row) {
        $obj = new Site();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['domain'] != NULL) {                
            $obj->domain = $row['domain'];#dataType.FillDataString(dr, "domain");
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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountSite(
    ) {       
        return $this->data->CountSite(
        );
    }
               
    public function CountSiteByUuid(
        $uuid
    ) {       
        return $this->data->CountSiteByUuid(
            $uuid
        );
    }
               
    public function CountSiteByCode(
        $code
    ) {       
        return $this->data->CountSiteByCode(
            $code
        );
    }
               
    public function CountSiteByTypeId(
        $type_id
    ) {       
        return $this->data->CountSiteByTypeId(
            $type_id
        );
    }
               
    public function CountSiteByCodeByTypeId(
        $code
        , $type_id
    ) {       
        return $this->data->CountSiteByCodeByTypeId(
            $code
            , $type_id
        );
    }
               
    public function CountSiteByDomainByTypeId(
        $domain
        , $type_id
    ) {       
        return $this->data->CountSiteByDomainByTypeId(
            $domain
            , $type_id
        );
    }
               
    public function CountSiteByDomain(
        $domain
    ) {       
        return $this->data->CountSiteByDomain(
            $domain
        );
    }
               
    public function BrowseSiteListByFilter($filter_obj) {
        $result = new SiteResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseSiteListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $site = $this->FillSite($row);
                $result->data[] = $site;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetSiteByUuid($set_type, $obj) {           
        return $this->data->SetSiteByUuid($set_type, $obj);
    }
            
    public function SetSiteByCode($set_type, $obj) {           
        return $this->data->SetSiteByCode($set_type, $obj);
    }
            
    public function DelSiteByUuid(
        $uuid
    ) {
        return $this->data->DelSiteByUuid(
            $uuid
        );
    }
        
    public function DelSiteByCode(
        $code
    ) {
        return $this->data->DelSiteByCode(
            $code
        );
    }
        
    public function GetSiteList(
    ) {

        $results = array();
        $rows = $this->data->GetSiteList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site  = $this->FillSite($row);
                $results[] = $site;
            }
        }
        
        return $results;
    }
        
    public function GetSiteListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetSiteListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site  = $this->FillSite($row);
                $results[] = $site;
            }
        }
        
        return $results;
    }
        
    public function GetSiteListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetSiteListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site  = $this->FillSite($row);
                $results[] = $site;
            }
        }
        
        return $results;
    }
        
    public function GetSiteListByTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteListByTypeId(
            $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site  = $this->FillSite($row);
                $results[] = $site;
            }
        }
        
        return $results;
    }
        
    public function GetSiteListByCodeByTypeId(
        $code
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteListByCodeByTypeId(
            $code
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site  = $this->FillSite($row);
                $results[] = $site;
            }
        }
        
        return $results;
    }
        
    public function GetSiteListByDomainByTypeId(
        $domain
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteListByDomainByTypeId(
            $domain
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site  = $this->FillSite($row);
                $results[] = $site;
            }
        }
        
        return $results;
    }
        
    public function GetSiteListByDomain(
        $domain
    ) {

        $results = array();
        $rows = $this->data->GetSiteListByDomain(
            $domain
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site  = $this->FillSite($row);
                $results[] = $site;
            }
        }
        
        return $results;
    }
        
        
    public function FillSiteType($row) {
        $obj = new SiteType();

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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountSiteType(
    ) {       
        return $this->data->CountSiteType(
        );
    }
               
    public function CountSiteTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountSiteTypeByUuid(
            $uuid
        );
    }
               
    public function CountSiteTypeByCode(
        $code
    ) {       
        return $this->data->CountSiteTypeByCode(
            $code
        );
    }
               
    public function BrowseSiteTypeListByFilter($filter_obj) {
        $result = new SiteTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseSiteTypeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $site_type = $this->FillSiteType($row);
                $result->data[] = $site_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetSiteTypeByUuid($set_type, $obj) {           
        return $this->data->SetSiteTypeByUuid($set_type, $obj);
    }
            
    public function SetSiteTypeByCode($set_type, $obj) {           
        return $this->data->SetSiteTypeByCode($set_type, $obj);
    }
            
    public function DelSiteTypeByUuid(
        $uuid
    ) {
        return $this->data->DelSiteTypeByUuid(
            $uuid
        );
    }
        
    public function DelSiteTypeByCode(
        $code
    ) {
        return $this->data->DelSiteTypeByCode(
            $code
        );
    }
        
    public function GetSiteTypeList(
    ) {

        $results = array();
        $rows = $this->data->GetSiteTypeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_type  = $this->FillSiteType($row);
                $results[] = $site_type;
            }
        }
        
        return $results;
    }
        
    public function GetSiteTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetSiteTypeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_type  = $this->FillSiteType($row);
                $results[] = $site_type;
            }
        }
        
        return $results;
    }
        
    public function GetSiteTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetSiteTypeListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_type  = $this->FillSiteType($row);
                $results[] = $site_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillOrg($row) {
        $obj = new Org();

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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountOrg(
    ) {       
        return $this->data->CountOrg(
        );
    }
               
    public function CountOrgByUuid(
        $uuid
    ) {       
        return $this->data->CountOrgByUuid(
            $uuid
        );
    }
               
    public function CountOrgByCode(
        $code
    ) {       
        return $this->data->CountOrgByCode(
            $code
        );
    }
               
    public function CountOrgByName(
        $name
    ) {       
        return $this->data->CountOrgByName(
            $name
        );
    }
               
    public function BrowseOrgListByFilter($filter_obj) {
        $result = new OrgResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOrgListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $org = $this->FillOrg($row);
                $result->data[] = $org;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOrgByUuid($set_type, $obj) {           
        return $this->data->SetOrgByUuid($set_type, $obj);
    }
            
    public function DelOrgByUuid(
        $uuid
    ) {
        return $this->data->DelOrgByUuid(
            $uuid
        );
    }
        
    public function GetOrgList(
    ) {

        $results = array();
        $rows = $this->data->GetOrgList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org  = $this->FillOrg($row);
                $results[] = $org;
            }
        }
        
        return $results;
    }
        
    public function GetOrgListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOrgListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org  = $this->FillOrg($row);
                $results[] = $org;
            }
        }
        
        return $results;
    }
        
    public function GetOrgListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOrgListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org  = $this->FillOrg($row);
                $results[] = $org;
            }
        }
        
        return $results;
    }
        
    public function GetOrgListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOrgListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org  = $this->FillOrg($row);
                $results[] = $org;
            }
        }
        
        return $results;
    }
        
        
    public function FillOrgType($row) {
        $obj = new OrgType();

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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountOrgType(
    ) {       
        return $this->data->CountOrgType(
        );
    }
               
    public function CountOrgTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountOrgTypeByUuid(
            $uuid
        );
    }
               
    public function CountOrgTypeByCode(
        $code
    ) {       
        return $this->data->CountOrgTypeByCode(
            $code
        );
    }
               
    public function BrowseOrgTypeListByFilter($filter_obj) {
        $result = new OrgTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOrgTypeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $org_type = $this->FillOrgType($row);
                $result->data[] = $org_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOrgTypeByUuid($set_type, $obj) {           
        return $this->data->SetOrgTypeByUuid($set_type, $obj);
    }
            
    public function SetOrgTypeByCode($set_type, $obj) {           
        return $this->data->SetOrgTypeByCode($set_type, $obj);
    }
            
    public function DelOrgTypeByUuid(
        $uuid
    ) {
        return $this->data->DelOrgTypeByUuid(
            $uuid
        );
    }
        
    public function DelOrgTypeByCode(
        $code
    ) {
        return $this->data->DelOrgTypeByCode(
            $code
        );
    }
        
    public function GetOrgTypeList(
    ) {

        $results = array();
        $rows = $this->data->GetOrgTypeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_type  = $this->FillOrgType($row);
                $results[] = $org_type;
            }
        }
        
        return $results;
    }
        
    public function GetOrgTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOrgTypeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_type  = $this->FillOrgType($row);
                $results[] = $org_type;
            }
        }
        
        return $results;
    }
        
    public function GetOrgTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOrgTypeListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_type  = $this->FillOrgType($row);
                $results[] = $org_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillContentItem($row) {
        $obj = new ContentItem();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['date_end'] != NULL) {                
            $obj->date_end = $row['date_end'];#dataType.FillDataDate(dr, "date_end");
        }
        if ($row['date_start'] != NULL) {                
            $obj->date_start = $row['date_start'];#dataType.FillDataDate(dr, "date_start");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['path'] != NULL) {                
            $obj->path = $row['path'];#dataType.FillDataString(dr, "path");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountContentItem(
    ) {       
        return $this->data->CountContentItem(
        );
    }
               
    public function CountContentItemByUuid(
        $uuid
    ) {       
        return $this->data->CountContentItemByUuid(
            $uuid
        );
    }
               
    public function CountContentItemByCode(
        $code
    ) {       
        return $this->data->CountContentItemByCode(
            $code
        );
    }
               
    public function CountContentItemByName(
        $name
    ) {       
        return $this->data->CountContentItemByName(
            $name
        );
    }
               
    public function CountContentItemByPath(
        $path
    ) {       
        return $this->data->CountContentItemByPath(
            $path
        );
    }
               
    public function BrowseContentItemListByFilter($filter_obj) {
        $result = new ContentItemResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseContentItemListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $content_item = $this->FillContentItem($row);
                $result->data[] = $content_item;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetContentItemByUuid($set_type, $obj) {           
        return $this->data->SetContentItemByUuid($set_type, $obj);
    }
            
    public function DelContentItemByUuid(
        $uuid
    ) {
        return $this->data->DelContentItemByUuid(
            $uuid
        );
    }
        
    public function DelContentItemByPath(
        $path
    ) {
        return $this->data->DelContentItemByPath(
            $path
        );
    }
        
    public function GetContentItemList(
    ) {

        $results = array();
        $rows = $this->data->GetContentItemList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item  = $this->FillContentItem($row);
                $results[] = $content_item;
            }
        }
        
        return $results;
    }
        
    public function GetContentItemListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item  = $this->FillContentItem($row);
                $results[] = $content_item;
            }
        }
        
        return $results;
    }
        
    public function GetContentItemListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item  = $this->FillContentItem($row);
                $results[] = $content_item;
            }
        }
        
        return $results;
    }
        
    public function GetContentItemListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item  = $this->FillContentItem($row);
                $results[] = $content_item;
            }
        }
        
        return $results;
    }
        
    public function GetContentItemListByPath(
        $path
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListByPath(
            $path
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item  = $this->FillContentItem($row);
                $results[] = $content_item;
            }
        }
        
        return $results;
    }
        
        
    public function FillContentItemType($row) {
        $obj = new ContentItemType();

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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountContentItemType(
    ) {       
        return $this->data->CountContentItemType(
        );
    }
               
    public function CountContentItemTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountContentItemTypeByUuid(
            $uuid
        );
    }
               
    public function CountContentItemTypeByCode(
        $code
    ) {       
        return $this->data->CountContentItemTypeByCode(
            $code
        );
    }
               
    public function BrowseContentItemTypeListByFilter($filter_obj) {
        $result = new ContentItemTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseContentItemTypeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $content_item_type = $this->FillContentItemType($row);
                $result->data[] = $content_item_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetContentItemTypeByUuid($set_type, $obj) {           
        return $this->data->SetContentItemTypeByUuid($set_type, $obj);
    }
            
    public function SetContentItemTypeByCode($set_type, $obj) {           
        return $this->data->SetContentItemTypeByCode($set_type, $obj);
    }
            
    public function DelContentItemTypeByUuid(
        $uuid
    ) {
        return $this->data->DelContentItemTypeByUuid(
            $uuid
        );
    }
        
    public function DelContentItemTypeByCode(
        $code
    ) {
        return $this->data->DelContentItemTypeByCode(
            $code
        );
    }
        
    public function GetContentItemTypeList(
    ) {

        $results = array();
        $rows = $this->data->GetContentItemTypeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item_type  = $this->FillContentItemType($row);
                $results[] = $content_item_type;
            }
        }
        
        return $results;
    }
        
    public function GetContentItemTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetContentItemTypeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item_type  = $this->FillContentItemType($row);
                $results[] = $content_item_type;
            }
        }
        
        return $results;
    }
        
    public function GetContentItemTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetContentItemTypeListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_item_type  = $this->FillContentItemType($row);
                $results[] = $content_item_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillContentPage($row) {
        $obj = new ContentPage();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['date_end'] != NULL) {                
            $obj->date_end = $row['date_end'];#dataType.FillDataDate(dr, "date_end");
        }
        if ($row['date_start'] != NULL) {                
            $obj->date_start = $row['date_start'];#dataType.FillDataDate(dr, "date_start");
        }
        if ($row['site_id'] != NULL) {                
            $obj->site_id = $row['site_id'];#dataType.FillDataString(dr, "site_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['template'] != NULL) {                
            $obj->template = $row['template'];#dataType.FillDataString(dr, "template");
        }
        if ($row['path'] != NULL) {                
            $obj->path = $row['path'];#dataType.FillDataString(dr, "path");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountContentPage(
    ) {       
        return $this->data->CountContentPage(
        );
    }
               
    public function CountContentPageByUuid(
        $uuid
    ) {       
        return $this->data->CountContentPageByUuid(
            $uuid
        );
    }
               
    public function CountContentPageByCode(
        $code
    ) {       
        return $this->data->CountContentPageByCode(
            $code
        );
    }
               
    public function CountContentPageByName(
        $name
    ) {       
        return $this->data->CountContentPageByName(
            $name
        );
    }
               
    public function CountContentPageByPath(
        $path
    ) {       
        return $this->data->CountContentPageByPath(
            $path
        );
    }
               
    public function BrowseContentPageListByFilter($filter_obj) {
        $result = new ContentPageResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseContentPageListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $content_page = $this->FillContentPage($row);
                $result->data[] = $content_page;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetContentPageByUuid($set_type, $obj) {           
        return $this->data->SetContentPageByUuid($set_type, $obj);
    }
            
    public function DelContentPageByUuid(
        $uuid
    ) {
        return $this->data->DelContentPageByUuid(
            $uuid
        );
    }
        
    public function DelContentPageByPathBySiteId(
        $path
        , $site_id
    ) {
        return $this->data->DelContentPageByPathBySiteId(
            $path
            , $site_id
        );
    }
        
    public function DelContentPageByPath(
        $path
    ) {
        return $this->data->DelContentPageByPath(
            $path
        );
    }
        
    public function GetContentPageList(
    ) {

        $results = array();
        $rows = $this->data->GetContentPageList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_page  = $this->FillContentPage($row);
                $results[] = $content_page;
            }
        }
        
        return $results;
    }
        
    public function GetContentPageListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_page  = $this->FillContentPage($row);
                $results[] = $content_page;
            }
        }
        
        return $results;
    }
        
    public function GetContentPageListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_page  = $this->FillContentPage($row);
                $results[] = $content_page;
            }
        }
        
        return $results;
    }
        
    public function GetContentPageListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_page  = $this->FillContentPage($row);
                $results[] = $content_page;
            }
        }
        
        return $results;
    }
        
    public function GetContentPageListByPath(
        $path
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListByPath(
            $path
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_page  = $this->FillContentPage($row);
                $results[] = $content_page;
            }
        }
        
        return $results;
    }
        
    public function GetContentPageListBySiteId(
        $site_id
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListBySiteId(
            $site_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_page  = $this->FillContentPage($row);
                $results[] = $content_page;
            }
        }
        
        return $results;
    }
        
    public function GetContentPageListBySiteIdByPath(
        $site_id
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListBySiteIdByPath(
            $site_id
            , $path
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $content_page  = $this->FillContentPage($row);
                $results[] = $content_page;
            }
        }
        
        return $results;
    }
        
        
    public function FillMessage($row) {
        $obj = new Message();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['profile_from_name'] != NULL) {                
            $obj->profile_from_name = $row['profile_from_name'];#dataType.FillDataString(dr, "profile_from_name");
        }
        if ($row['read'] != NULL) {                
            $obj->read = $row['read'];#dataType.FillDataBoolean(dr, "read");
        }
        if ($row['profile_from_id'] != NULL) {                
            $obj->profile_from_id = $row['profile_from_id'];#dataType.FillDataString(dr, "profile_from_id");
        }
        if ($row['profile_to_token'] != NULL) {                
            $obj->profile_to_token = $row['profile_to_token'];#dataType.FillDataString(dr, "profile_to_token");
        }
        if ($row['app_id'] != NULL) {                
            $obj->app_id = $row['app_id'];#dataType.FillDataString(dr, "app_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['subject'] != NULL) {                
            $obj->subject = $row['subject'];#dataType.FillDataString(dr, "subject");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['profile_to_id'] != NULL) {                
            $obj->profile_to_id = $row['profile_to_id'];#dataType.FillDataString(dr, "profile_to_id");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['profile_to_name'] != NULL) {                
            $obj->profile_to_name = $row['profile_to_name'];#dataType.FillDataString(dr, "profile_to_name");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['sent'] != NULL) {                
            $obj->sent = $row['sent'];#dataType.FillDataBoolean(dr, "sent");
        }

        return $obj;
    }
        
    public function CountMessage(
    ) {       
        return $this->data->CountMessage(
        );
    }
               
    public function CountMessageByUuid(
        $uuid
    ) {       
        return $this->data->CountMessageByUuid(
            $uuid
        );
    }
               
    public function BrowseMessageListByFilter($filter_obj) {
        $result = new MessageResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseMessageListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $message = $this->FillMessage($row);
                $result->data[] = $message;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetMessageByUuid($set_type, $obj) {           
        return $this->data->SetMessageByUuid($set_type, $obj);
    }
            
    public function DelMessageByUuid(
        $uuid
    ) {
        return $this->data->DelMessageByUuid(
            $uuid
        );
    }
        
    public function GetMessageList(
    ) {

        $results = array();
        $rows = $this->data->GetMessageList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $message  = $this->FillMessage($row);
                $results[] = $message;
            }
        }
        
        return $results;
    }
        
    public function GetMessageListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetMessageListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $message  = $this->FillMessage($row);
                $results[] = $message;
            }
        }
        
        return $results;
    }
        
        
    public function FillOffer($row) {
        $obj = new Offer();

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
        if ($row['url'] != NULL) {                
            $obj->url = $row['url'];#dataType.FillDataString(dr, "url");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['usage_count'] != NULL) {                
            $obj->usage_count = $row['usage_count'];#dataType.FillDataInt(dr, "usage_count");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountOffer(
    ) {       
        return $this->data->CountOffer(
        );
    }
               
    public function CountOfferByUuid(
        $uuid
    ) {       
        return $this->data->CountOfferByUuid(
            $uuid
        );
    }
               
    public function CountOfferByCode(
        $code
    ) {       
        return $this->data->CountOfferByCode(
            $code
        );
    }
               
    public function CountOfferByName(
        $name
    ) {       
        return $this->data->CountOfferByName(
            $name
        );
    }
               
    public function CountOfferByOrgId(
        $org_id
    ) {       
        return $this->data->CountOfferByOrgId(
            $org_id
        );
    }
               
    public function BrowseOfferListByFilter($filter_obj) {
        $result = new OfferResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $offer = $this->FillOffer($row);
                $result->data[] = $offer;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOfferByUuid($set_type, $obj) {           
        return $this->data->SetOfferByUuid($set_type, $obj);
    }
            
    public function DelOfferByUuid(
        $uuid
    ) {
        return $this->data->DelOfferByUuid(
            $uuid
        );
    }
        
    public function DelOfferByOrgId(
        $org_id
    ) {
        return $this->data->DelOfferByOrgId(
            $org_id
        );
    }
        
    public function GetOfferList(
    ) {

        $results = array();
        $rows = $this->data->GetOfferList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer  = $this->FillOffer($row);
                $results[] = $offer;
            }
        }
        
        return $results;
    }
        
    public function GetOfferListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer  = $this->FillOffer($row);
                $results[] = $offer;
            }
        }
        
        return $results;
    }
        
    public function GetOfferListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOfferListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer  = $this->FillOffer($row);
                $results[] = $offer;
            }
        }
        
        return $results;
    }
        
    public function GetOfferListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOfferListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer  = $this->FillOffer($row);
                $results[] = $offer;
            }
        }
        
        return $results;
    }
        
    public function GetOfferListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer  = $this->FillOffer($row);
                $results[] = $offer;
            }
        }
        
        return $results;
    }
        
        
    public function FillOfferType($row) {
        $obj = new OfferType();

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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountOfferType(
    ) {       
        return $this->data->CountOfferType(
        );
    }
               
    public function CountOfferTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountOfferTypeByUuid(
            $uuid
        );
    }
               
    public function CountOfferTypeByCode(
        $code
    ) {       
        return $this->data->CountOfferTypeByCode(
            $code
        );
    }
               
    public function CountOfferTypeByName(
        $name
    ) {       
        return $this->data->CountOfferTypeByName(
            $name
        );
    }
               
    public function BrowseOfferTypeListByFilter($filter_obj) {
        $result = new OfferTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferTypeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $offer_type = $this->FillOfferType($row);
                $result->data[] = $offer_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOfferTypeByUuid($set_type, $obj) {           
        return $this->data->SetOfferTypeByUuid($set_type, $obj);
    }
            
    public function DelOfferTypeByUuid(
        $uuid
    ) {
        return $this->data->DelOfferTypeByUuid(
            $uuid
        );
    }
        
    public function GetOfferTypeList(
    ) {

        $results = array();
        $rows = $this->data->GetOfferTypeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_type  = $this->FillOfferType($row);
                $results[] = $offer_type;
            }
        }
        
        return $results;
    }
        
    public function GetOfferTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferTypeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_type  = $this->FillOfferType($row);
                $results[] = $offer_type;
            }
        }
        
        return $results;
    }
        
    public function GetOfferTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOfferTypeListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_type  = $this->FillOfferType($row);
                $results[] = $offer_type;
            }
        }
        
        return $results;
    }
        
    public function GetOfferTypeListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOfferTypeListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_type  = $this->FillOfferType($row);
                $results[] = $offer_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillOfferLocation($row) {
        $obj = new OfferLocation();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['fax'] != NULL) {                
            $obj->fax = $row['fax'];#dataType.FillDataString(dr, "fax");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }
        if ($row['address1'] != NULL) {                
            $obj->address1 = $row['address1'];#dataType.FillDataString(dr, "address1");
        }
        if ($row['twitter'] != NULL) {                
            $obj->twitter = $row['twitter'];#dataType.FillDataString(dr, "twitter");
        }
        if ($row['phone'] != NULL) {                
            $obj->phone = $row['phone'];#dataType.FillDataString(dr, "phone");
        }
        if ($row['postal_code'] != NULL) {                
            $obj->postal_code = $row['postal_code'];#dataType.FillDataString(dr, "postal_code");
        }
        if ($row['offer_id'] != NULL) {                
            $obj->offer_id = $row['offer_id'];#dataType.FillDataString(dr, "offer_id");
        }
        if ($row['country_code'] != NULL) {                
            $obj->country_code = $row['country_code'];#dataType.FillDataString(dr, "country_code");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['state_province'] != NULL) {                
            $obj->state_province = $row['state_province'];#dataType.FillDataString(dr, "state_province");
        }
        if ($row['city'] != NULL) {                
            $obj->city = $row['city'];#dataType.FillDataString(dr, "city");
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
        if ($row['dob'] != NULL) {                
            $obj->dob = $row['dob'];#dataType.FillDataDate(dr, "dob");
        }
        if ($row['date_start'] != NULL) {                
            $obj->date_start = $row['date_start'];#dataType.FillDataDate(dr, "date_start");
        }
        if ($row['longitude'] != NULL) {                
            $obj->longitude = $row['longitude'];#dataType.FillDataVar(dr, "longitude");
        }
        if ($row['email'] != NULL) {                
            $obj->email = $row['email'];#dataType.FillDataString(dr, "email");
        }
        if ($row['date_end'] != NULL) {                
            $obj->date_end = $row['date_end'];#dataType.FillDataDate(dr, "date_end");
        }
        if ($row['latitude'] != NULL) {                
            $obj->latitude = $row['latitude'];#dataType.FillDataVar(dr, "latitude");
        }
        if ($row['facebook'] != NULL) {                
            $obj->facebook = $row['facebook'];#dataType.FillDataString(dr, "facebook");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['address2'] != NULL) {                
            $obj->address2 = $row['address2'];#dataType.FillDataString(dr, "address2");
        }

        return $obj;
    }
        
    public function CountOfferLocation(
    ) {       
        return $this->data->CountOfferLocation(
        );
    }
               
    public function CountOfferLocationByUuid(
        $uuid
    ) {       
        return $this->data->CountOfferLocationByUuid(
            $uuid
        );
    }
               
    public function CountOfferLocationByOfferId(
        $offer_id
    ) {       
        return $this->data->CountOfferLocationByOfferId(
            $offer_id
        );
    }
               
    public function CountOfferLocationByCity(
        $city
    ) {       
        return $this->data->CountOfferLocationByCity(
            $city
        );
    }
               
    public function CountOfferLocationByCountryCode(
        $country_code
    ) {       
        return $this->data->CountOfferLocationByCountryCode(
            $country_code
        );
    }
               
    public function CountOfferLocationByPostalCode(
        $postal_code
    ) {       
        return $this->data->CountOfferLocationByPostalCode(
            $postal_code
        );
    }
               
    public function BrowseOfferLocationListByFilter($filter_obj) {
        $result = new OfferLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferLocationListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $offer_location = $this->FillOfferLocation($row);
                $result->data[] = $offer_location;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOfferLocationByUuid($set_type, $obj) {           
        return $this->data->SetOfferLocationByUuid($set_type, $obj);
    }
            
    public function DelOfferLocationByUuid(
        $uuid
    ) {
        return $this->data->DelOfferLocationByUuid(
            $uuid
        );
    }
        
    public function GetOfferLocationList(
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_location  = $this->FillOfferLocation($row);
                $results[] = $offer_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferLocationListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_location  = $this->FillOfferLocation($row);
                $results[] = $offer_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferLocationListByOfferId(
        $offer_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListByOfferId(
            $offer_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_location  = $this->FillOfferLocation($row);
                $results[] = $offer_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferLocationListByCity(
        $city
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListByCity(
            $city
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_location  = $this->FillOfferLocation($row);
                $results[] = $offer_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferLocationListByCountryCode(
        $country_code
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListByCountryCode(
            $country_code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_location  = $this->FillOfferLocation($row);
                $results[] = $offer_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferLocationListByPostalCode(
        $postal_code
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListByPostalCode(
            $postal_code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_location  = $this->FillOfferLocation($row);
                $results[] = $offer_location;
            }
        }
        
        return $results;
    }
        
        
    public function FillOfferCategory($row) {
        $obj = new OfferCategory();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountOfferCategory(
    ) {       
        return $this->data->CountOfferCategory(
        );
    }
               
    public function CountOfferCategoryByUuid(
        $uuid
    ) {       
        return $this->data->CountOfferCategoryByUuid(
            $uuid
        );
    }
               
    public function CountOfferCategoryByCode(
        $code
    ) {       
        return $this->data->CountOfferCategoryByCode(
            $code
        );
    }
               
    public function CountOfferCategoryByName(
        $name
    ) {       
        return $this->data->CountOfferCategoryByName(
            $name
        );
    }
               
    public function CountOfferCategoryByOrgId(
        $org_id
    ) {       
        return $this->data->CountOfferCategoryByOrgId(
            $org_id
        );
    }
               
    public function CountOfferCategoryByTypeId(
        $type_id
    ) {       
        return $this->data->CountOfferCategoryByTypeId(
            $type_id
        );
    }
               
    public function CountOfferCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountOfferCategoryByOrgIdByTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseOfferCategoryListByFilter($filter_obj) {
        $result = new OfferCategoryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferCategoryListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $offer_category = $this->FillOfferCategory($row);
                $result->data[] = $offer_category;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOfferCategoryByUuid($set_type, $obj) {           
        return $this->data->SetOfferCategoryByUuid($set_type, $obj);
    }
            
    public function DelOfferCategoryByUuid(
        $uuid
    ) {
        return $this->data->DelOfferCategoryByUuid(
            $uuid
        );
    }
        
    public function DelOfferCategoryByCodeByOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelOfferCategoryByCodeByOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelOfferCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelOfferCategoryByCodeByOrgIdByTypeId(
            $code
            , $org_id
            , $type_id
        );
    }
        
    public function GetOfferCategoryList(
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category  = $this->FillOfferCategory($row);
                $results[] = $offer_category;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category  = $this->FillOfferCategory($row);
                $results[] = $offer_category;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category  = $this->FillOfferCategory($row);
                $results[] = $offer_category;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category  = $this->FillOfferCategory($row);
                $results[] = $offer_category;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category  = $this->FillOfferCategory($row);
                $results[] = $offer_category;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryListByTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListByTypeId(
            $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category  = $this->FillOfferCategory($row);
                $results[] = $offer_category;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListByOrgIdByTypeId(
            $org_id
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category  = $this->FillOfferCategory($row);
                $results[] = $offer_category;
            }
        }
        
        return $results;
    }
        
        
    public function FillOfferCategoryTree($row) {
        $obj = new OfferCategoryTree();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['parent_id'] != NULL) {                
            $obj->parent_id = $row['parent_id'];#dataType.FillDataString(dr, "parent_id");
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
        if ($row['category_id'] != NULL) {                
            $obj->category_id = $row['category_id'];#dataType.FillDataString(dr, "category_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountOfferCategoryTree(
    ) {       
        return $this->data->CountOfferCategoryTree(
        );
    }
               
    public function CountOfferCategoryTreeByUuid(
        $uuid
    ) {       
        return $this->data->CountOfferCategoryTreeByUuid(
            $uuid
        );
    }
               
    public function CountOfferCategoryTreeByParentId(
        $parent_id
    ) {       
        return $this->data->CountOfferCategoryTreeByParentId(
            $parent_id
        );
    }
               
    public function CountOfferCategoryTreeByCategoryId(
        $category_id
    ) {       
        return $this->data->CountOfferCategoryTreeByCategoryId(
            $category_id
        );
    }
               
    public function CountOfferCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {       
        return $this->data->CountOfferCategoryTreeByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
    }
               
    public function BrowseOfferCategoryTreeListByFilter($filter_obj) {
        $result = new OfferCategoryTreeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferCategoryTreeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $offer_category_tree = $this->FillOfferCategoryTree($row);
                $result->data[] = $offer_category_tree;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOfferCategoryTreeByUuid($set_type, $obj) {           
        return $this->data->SetOfferCategoryTreeByUuid($set_type, $obj);
    }
            
    public function DelOfferCategoryTreeByUuid(
        $uuid
    ) {
        return $this->data->DelOfferCategoryTreeByUuid(
            $uuid
        );
    }
        
    public function DelOfferCategoryTreeByParentId(
        $parent_id
    ) {
        return $this->data->DelOfferCategoryTreeByParentId(
            $parent_id
        );
    }
        
    public function DelOfferCategoryTreeByCategoryId(
        $category_id
    ) {
        return $this->data->DelOfferCategoryTreeByCategoryId(
            $category_id
        );
    }
        
    public function DelOfferCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->data->DelOfferCategoryTreeByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
    }
        
    public function GetOfferCategoryTreeList(
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_tree  = $this->FillOfferCategoryTree($row);
                $results[] = $offer_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryTreeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_tree  = $this->FillOfferCategoryTree($row);
                $results[] = $offer_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryTreeListByParentId(
        $parent_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListByParentId(
            $parent_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_tree  = $this->FillOfferCategoryTree($row);
                $results[] = $offer_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryTreeListByCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListByCategoryId(
            $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_tree  = $this->FillOfferCategoryTree($row);
                $results[] = $offer_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_tree  = $this->FillOfferCategoryTree($row);
                $results[] = $offer_category_tree;
            }
        }
        
        return $results;
    }
        
        
    public function FillOfferCategoryAssoc($row) {
        $obj = new OfferCategoryAssoc();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
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
        if ($row['offer_id'] != NULL) {                
            $obj->offer_id = $row['offer_id'];#dataType.FillDataString(dr, "offer_id");
        }
        if ($row['category_id'] != NULL) {                
            $obj->category_id = $row['category_id'];#dataType.FillDataString(dr, "category_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountOfferCategoryAssoc(
    ) {       
        return $this->data->CountOfferCategoryAssoc(
        );
    }
               
    public function CountOfferCategoryAssocByUuid(
        $uuid
    ) {       
        return $this->data->CountOfferCategoryAssocByUuid(
            $uuid
        );
    }
               
    public function CountOfferCategoryAssocByOfferId(
        $offer_id
    ) {       
        return $this->data->CountOfferCategoryAssocByOfferId(
            $offer_id
        );
    }
               
    public function CountOfferCategoryAssocByCategoryId(
        $category_id
    ) {       
        return $this->data->CountOfferCategoryAssocByCategoryId(
            $category_id
        );
    }
               
    public function CountOfferCategoryAssocByOfferIdByCategoryId(
        $offer_id
        , $category_id
    ) {       
        return $this->data->CountOfferCategoryAssocByOfferIdByCategoryId(
            $offer_id
            , $category_id
        );
    }
               
    public function BrowseOfferCategoryAssocListByFilter($filter_obj) {
        $result = new OfferCategoryAssocResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferCategoryAssocListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $offer_category_assoc = $this->FillOfferCategoryAssoc($row);
                $result->data[] = $offer_category_assoc;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOfferCategoryAssocByUuid($set_type, $obj) {           
        return $this->data->SetOfferCategoryAssocByUuid($set_type, $obj);
    }
            
    public function DelOfferCategoryAssocByUuid(
        $uuid
    ) {
        return $this->data->DelOfferCategoryAssocByUuid(
            $uuid
        );
    }
        
    public function GetOfferCategoryAssocList(
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_assoc  = $this->FillOfferCategoryAssoc($row);
                $results[] = $offer_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryAssocListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_assoc  = $this->FillOfferCategoryAssoc($row);
                $results[] = $offer_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryAssocListByOfferId(
        $offer_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListByOfferId(
            $offer_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_assoc  = $this->FillOfferCategoryAssoc($row);
                $results[] = $offer_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryAssocListByCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListByCategoryId(
            $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_assoc  = $this->FillOfferCategoryAssoc($row);
                $results[] = $offer_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetOfferCategoryAssocListByOfferIdByCategoryId(
        $offer_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListByOfferIdByCategoryId(
            $offer_id
            , $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_category_assoc  = $this->FillOfferCategoryAssoc($row);
                $results[] = $offer_category_assoc;
            }
        }
        
        return $results;
    }
        
        
    public function FillOfferGameLocation($row) {
        $obj = new OfferGameLocation();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['game_location_id'] != NULL) {                
            $obj->game_location_id = $row['game_location_id'];#dataType.FillDataString(dr, "game_location_id");
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
        if ($row['offer_id'] != NULL) {                
            $obj->offer_id = $row['offer_id'];#dataType.FillDataString(dr, "offer_id");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }

        return $obj;
    }
        
    public function CountOfferGameLocation(
    ) {       
        return $this->data->CountOfferGameLocation(
        );
    }
               
    public function CountOfferGameLocationByUuid(
        $uuid
    ) {       
        return $this->data->CountOfferGameLocationByUuid(
            $uuid
        );
    }
               
    public function CountOfferGameLocationByGameLocationId(
        $game_location_id
    ) {       
        return $this->data->CountOfferGameLocationByGameLocationId(
            $game_location_id
        );
    }
               
    public function CountOfferGameLocationByOfferId(
        $offer_id
    ) {       
        return $this->data->CountOfferGameLocationByOfferId(
            $offer_id
        );
    }
               
    public function CountOfferGameLocationByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
    ) {       
        return $this->data->CountOfferGameLocationByOfferIdByGameLocationId(
            $offer_id
            , $game_location_id
        );
    }
               
    public function BrowseOfferGameLocationListByFilter($filter_obj) {
        $result = new OfferGameLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferGameLocationListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $offer_game_location = $this->FillOfferGameLocation($row);
                $result->data[] = $offer_game_location;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOfferGameLocationByUuid($set_type, $obj) {           
        return $this->data->SetOfferGameLocationByUuid($set_type, $obj);
    }
            
    public function DelOfferGameLocationByUuid(
        $uuid
    ) {
        return $this->data->DelOfferGameLocationByUuid(
            $uuid
        );
    }
        
    public function GetOfferGameLocationList(
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_game_location  = $this->FillOfferGameLocation($row);
                $results[] = $offer_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferGameLocationListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_game_location  = $this->FillOfferGameLocation($row);
                $results[] = $offer_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferGameLocationListByGameLocationId(
        $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListByGameLocationId(
            $game_location_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_game_location  = $this->FillOfferGameLocation($row);
                $results[] = $offer_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferGameLocationListByOfferId(
        $offer_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListByOfferId(
            $offer_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_game_location  = $this->FillOfferGameLocation($row);
                $results[] = $offer_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetOfferGameLocationListByOfferIdByGameLocationId(
        $offer_id
        , $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListByOfferIdByGameLocationId(
            $offer_id
            , $game_location_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $offer_game_location  = $this->FillOfferGameLocation($row);
                $results[] = $offer_game_location;
            }
        }
        
        return $results;
    }
        
        
    public function FillEventInfo($row) {
        $obj = new EventInfo();

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
        if ($row['url'] != NULL) {                
            $obj->url = $row['url'];#dataType.FillDataString(dr, "url");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['usage_count'] != NULL) {                
            $obj->usage_count = $row['usage_count'];#dataType.FillDataInt(dr, "usage_count");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountEventInfo(
    ) {       
        return $this->data->CountEventInfo(
        );
    }
               
    public function CountEventInfoByUuid(
        $uuid
    ) {       
        return $this->data->CountEventInfoByUuid(
            $uuid
        );
    }
               
    public function CountEventInfoByCode(
        $code
    ) {       
        return $this->data->CountEventInfoByCode(
            $code
        );
    }
               
    public function CountEventInfoByName(
        $name
    ) {       
        return $this->data->CountEventInfoByName(
            $name
        );
    }
               
    public function CountEventInfoByOrgId(
        $org_id
    ) {       
        return $this->data->CountEventInfoByOrgId(
            $org_id
        );
    }
               
    public function BrowseEventInfoListByFilter($filter_obj) {
        $result = new EventInfoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventInfoListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $event_info = $this->FillEventInfo($row);
                $result->data[] = $event_info;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetEventInfoByUuid($set_type, $obj) {           
        return $this->data->SetEventInfoByUuid($set_type, $obj);
    }
            
    public function DelEventInfoByUuid(
        $uuid
    ) {
        return $this->data->DelEventInfoByUuid(
            $uuid
        );
    }
        
    public function DelEventInfoByOrgId(
        $org_id
    ) {
        return $this->data->DelEventInfoByOrgId(
            $org_id
        );
    }
        
    public function GetEventInfoList(
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_info  = $this->FillEventInfo($row);
                $results[] = $event_info;
            }
        }
        
        return $results;
    }
        
    public function GetEventInfoListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_info  = $this->FillEventInfo($row);
                $results[] = $event_info;
            }
        }
        
        return $results;
    }
        
    public function GetEventInfoListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_info  = $this->FillEventInfo($row);
                $results[] = $event_info;
            }
        }
        
        return $results;
    }
        
    public function GetEventInfoListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_info  = $this->FillEventInfo($row);
                $results[] = $event_info;
            }
        }
        
        return $results;
    }
        
    public function GetEventInfoListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_info  = $this->FillEventInfo($row);
                $results[] = $event_info;
            }
        }
        
        return $results;
    }
        
        
    public function FillEventLocation($row) {
        $obj = new EventLocation();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['fax'] != NULL) {                
            $obj->fax = $row['fax'];#dataType.FillDataString(dr, "fax");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }
        if ($row['address1'] != NULL) {                
            $obj->address1 = $row['address1'];#dataType.FillDataString(dr, "address1");
        }
        if ($row['twitter'] != NULL) {                
            $obj->twitter = $row['twitter'];#dataType.FillDataString(dr, "twitter");
        }
        if ($row['phone'] != NULL) {                
            $obj->phone = $row['phone'];#dataType.FillDataString(dr, "phone");
        }
        if ($row['postal_code'] != NULL) {                
            $obj->postal_code = $row['postal_code'];#dataType.FillDataString(dr, "postal_code");
        }
        if ($row['country_code'] != NULL) {                
            $obj->country_code = $row['country_code'];#dataType.FillDataString(dr, "country_code");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['state_province'] != NULL) {                
            $obj->state_province = $row['state_province'];#dataType.FillDataString(dr, "state_province");
        }
        if ($row['city'] != NULL) {                
            $obj->city = $row['city'];#dataType.FillDataString(dr, "city");
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
        if ($row['dob'] != NULL) {                
            $obj->dob = $row['dob'];#dataType.FillDataDate(dr, "dob");
        }
        if ($row['date_start'] != NULL) {                
            $obj->date_start = $row['date_start'];#dataType.FillDataDate(dr, "date_start");
        }
        if ($row['longitude'] != NULL) {                
            $obj->longitude = $row['longitude'];#dataType.FillDataVar(dr, "longitude");
        }
        if ($row['email'] != NULL) {                
            $obj->email = $row['email'];#dataType.FillDataString(dr, "email");
        }
        if ($row['event_id'] != NULL) {                
            $obj->event_id = $row['event_id'];#dataType.FillDataString(dr, "event_id");
        }
        if ($row['date_end'] != NULL) {                
            $obj->date_end = $row['date_end'];#dataType.FillDataDate(dr, "date_end");
        }
        if ($row['latitude'] != NULL) {                
            $obj->latitude = $row['latitude'];#dataType.FillDataVar(dr, "latitude");
        }
        if ($row['facebook'] != NULL) {                
            $obj->facebook = $row['facebook'];#dataType.FillDataString(dr, "facebook");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['address2'] != NULL) {                
            $obj->address2 = $row['address2'];#dataType.FillDataString(dr, "address2");
        }

        return $obj;
    }
        
    public function CountEventLocation(
    ) {       
        return $this->data->CountEventLocation(
        );
    }
               
    public function CountEventLocationByUuid(
        $uuid
    ) {       
        return $this->data->CountEventLocationByUuid(
            $uuid
        );
    }
               
    public function CountEventLocationByEventId(
        $event_id
    ) {       
        return $this->data->CountEventLocationByEventId(
            $event_id
        );
    }
               
    public function CountEventLocationByCity(
        $city
    ) {       
        return $this->data->CountEventLocationByCity(
            $city
        );
    }
               
    public function CountEventLocationByCountryCode(
        $country_code
    ) {       
        return $this->data->CountEventLocationByCountryCode(
            $country_code
        );
    }
               
    public function CountEventLocationByPostalCode(
        $postal_code
    ) {       
        return $this->data->CountEventLocationByPostalCode(
            $postal_code
        );
    }
               
    public function BrowseEventLocationListByFilter($filter_obj) {
        $result = new EventLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventLocationListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $event_location = $this->FillEventLocation($row);
                $result->data[] = $event_location;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetEventLocationByUuid($set_type, $obj) {           
        return $this->data->SetEventLocationByUuid($set_type, $obj);
    }
            
    public function DelEventLocationByUuid(
        $uuid
    ) {
        return $this->data->DelEventLocationByUuid(
            $uuid
        );
    }
        
    public function GetEventLocationList(
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_location  = $this->FillEventLocation($row);
                $results[] = $event_location;
            }
        }
        
        return $results;
    }
        
    public function GetEventLocationListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_location  = $this->FillEventLocation($row);
                $results[] = $event_location;
            }
        }
        
        return $results;
    }
        
    public function GetEventLocationListByEventId(
        $event_id
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListByEventId(
            $event_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_location  = $this->FillEventLocation($row);
                $results[] = $event_location;
            }
        }
        
        return $results;
    }
        
    public function GetEventLocationListByCity(
        $city
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListByCity(
            $city
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_location  = $this->FillEventLocation($row);
                $results[] = $event_location;
            }
        }
        
        return $results;
    }
        
    public function GetEventLocationListByCountryCode(
        $country_code
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListByCountryCode(
            $country_code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_location  = $this->FillEventLocation($row);
                $results[] = $event_location;
            }
        }
        
        return $results;
    }
        
    public function GetEventLocationListByPostalCode(
        $postal_code
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListByPostalCode(
            $postal_code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_location  = $this->FillEventLocation($row);
                $results[] = $event_location;
            }
        }
        
        return $results;
    }
        
        
    public function FillEventCategory($row) {
        $obj = new EventCategory();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountEventCategory(
    ) {       
        return $this->data->CountEventCategory(
        );
    }
               
    public function CountEventCategoryByUuid(
        $uuid
    ) {       
        return $this->data->CountEventCategoryByUuid(
            $uuid
        );
    }
               
    public function CountEventCategoryByCode(
        $code
    ) {       
        return $this->data->CountEventCategoryByCode(
            $code
        );
    }
               
    public function CountEventCategoryByName(
        $name
    ) {       
        return $this->data->CountEventCategoryByName(
            $name
        );
    }
               
    public function CountEventCategoryByOrgId(
        $org_id
    ) {       
        return $this->data->CountEventCategoryByOrgId(
            $org_id
        );
    }
               
    public function CountEventCategoryByTypeId(
        $type_id
    ) {       
        return $this->data->CountEventCategoryByTypeId(
            $type_id
        );
    }
               
    public function CountEventCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountEventCategoryByOrgIdByTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseEventCategoryListByFilter($filter_obj) {
        $result = new EventCategoryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventCategoryListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $event_category = $this->FillEventCategory($row);
                $result->data[] = $event_category;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetEventCategoryByUuid($set_type, $obj) {           
        return $this->data->SetEventCategoryByUuid($set_type, $obj);
    }
            
    public function DelEventCategoryByUuid(
        $uuid
    ) {
        return $this->data->DelEventCategoryByUuid(
            $uuid
        );
    }
        
    public function DelEventCategoryByCodeByOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelEventCategoryByCodeByOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelEventCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelEventCategoryByCodeByOrgIdByTypeId(
            $code
            , $org_id
            , $type_id
        );
    }
        
    public function GetEventCategoryList(
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category  = $this->FillEventCategory($row);
                $results[] = $event_category;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category  = $this->FillEventCategory($row);
                $results[] = $event_category;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category  = $this->FillEventCategory($row);
                $results[] = $event_category;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category  = $this->FillEventCategory($row);
                $results[] = $event_category;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category  = $this->FillEventCategory($row);
                $results[] = $event_category;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryListByTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListByTypeId(
            $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category  = $this->FillEventCategory($row);
                $results[] = $event_category;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListByOrgIdByTypeId(
            $org_id
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category  = $this->FillEventCategory($row);
                $results[] = $event_category;
            }
        }
        
        return $results;
    }
        
        
    public function FillEventCategoryTree($row) {
        $obj = new EventCategoryTree();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['parent_id'] != NULL) {                
            $obj->parent_id = $row['parent_id'];#dataType.FillDataString(dr, "parent_id");
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
        if ($row['category_id'] != NULL) {                
            $obj->category_id = $row['category_id'];#dataType.FillDataString(dr, "category_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountEventCategoryTree(
    ) {       
        return $this->data->CountEventCategoryTree(
        );
    }
               
    public function CountEventCategoryTreeByUuid(
        $uuid
    ) {       
        return $this->data->CountEventCategoryTreeByUuid(
            $uuid
        );
    }
               
    public function CountEventCategoryTreeByParentId(
        $parent_id
    ) {       
        return $this->data->CountEventCategoryTreeByParentId(
            $parent_id
        );
    }
               
    public function CountEventCategoryTreeByCategoryId(
        $category_id
    ) {       
        return $this->data->CountEventCategoryTreeByCategoryId(
            $category_id
        );
    }
               
    public function CountEventCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {       
        return $this->data->CountEventCategoryTreeByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
    }
               
    public function BrowseEventCategoryTreeListByFilter($filter_obj) {
        $result = new EventCategoryTreeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventCategoryTreeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $event_category_tree = $this->FillEventCategoryTree($row);
                $result->data[] = $event_category_tree;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetEventCategoryTreeByUuid($set_type, $obj) {           
        return $this->data->SetEventCategoryTreeByUuid($set_type, $obj);
    }
            
    public function DelEventCategoryTreeByUuid(
        $uuid
    ) {
        return $this->data->DelEventCategoryTreeByUuid(
            $uuid
        );
    }
        
    public function DelEventCategoryTreeByParentId(
        $parent_id
    ) {
        return $this->data->DelEventCategoryTreeByParentId(
            $parent_id
        );
    }
        
    public function DelEventCategoryTreeByCategoryId(
        $category_id
    ) {
        return $this->data->DelEventCategoryTreeByCategoryId(
            $category_id
        );
    }
        
    public function DelEventCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->data->DelEventCategoryTreeByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
    }
        
    public function GetEventCategoryTreeList(
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_tree  = $this->FillEventCategoryTree($row);
                $results[] = $event_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryTreeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_tree  = $this->FillEventCategoryTree($row);
                $results[] = $event_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryTreeListByParentId(
        $parent_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListByParentId(
            $parent_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_tree  = $this->FillEventCategoryTree($row);
                $results[] = $event_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryTreeListByCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListByCategoryId(
            $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_tree  = $this->FillEventCategoryTree($row);
                $results[] = $event_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_tree  = $this->FillEventCategoryTree($row);
                $results[] = $event_category_tree;
            }
        }
        
        return $results;
    }
        
        
    public function FillEventCategoryAssoc($row) {
        $obj = new EventCategoryAssoc();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['event_id'] != NULL) {                
            $obj->event_id = $row['event_id'];#dataType.FillDataString(dr, "event_id");
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
        if ($row['category_id'] != NULL) {                
            $obj->category_id = $row['category_id'];#dataType.FillDataString(dr, "category_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountEventCategoryAssoc(
    ) {       
        return $this->data->CountEventCategoryAssoc(
        );
    }
               
    public function CountEventCategoryAssocByUuid(
        $uuid
    ) {       
        return $this->data->CountEventCategoryAssocByUuid(
            $uuid
        );
    }
               
    public function CountEventCategoryAssocByEventId(
        $event_id
    ) {       
        return $this->data->CountEventCategoryAssocByEventId(
            $event_id
        );
    }
               
    public function CountEventCategoryAssocByCategoryId(
        $category_id
    ) {       
        return $this->data->CountEventCategoryAssocByCategoryId(
            $category_id
        );
    }
               
    public function CountEventCategoryAssocByEventIdByCategoryId(
        $event_id
        , $category_id
    ) {       
        return $this->data->CountEventCategoryAssocByEventIdByCategoryId(
            $event_id
            , $category_id
        );
    }
               
    public function BrowseEventCategoryAssocListByFilter($filter_obj) {
        $result = new EventCategoryAssocResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventCategoryAssocListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $event_category_assoc = $this->FillEventCategoryAssoc($row);
                $result->data[] = $event_category_assoc;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetEventCategoryAssocByUuid($set_type, $obj) {           
        return $this->data->SetEventCategoryAssocByUuid($set_type, $obj);
    }
            
    public function DelEventCategoryAssocByUuid(
        $uuid
    ) {
        return $this->data->DelEventCategoryAssocByUuid(
            $uuid
        );
    }
        
    public function GetEventCategoryAssocList(
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_assoc  = $this->FillEventCategoryAssoc($row);
                $results[] = $event_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryAssocListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_assoc  = $this->FillEventCategoryAssoc($row);
                $results[] = $event_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryAssocListByEventId(
        $event_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListByEventId(
            $event_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_assoc  = $this->FillEventCategoryAssoc($row);
                $results[] = $event_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryAssocListByCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListByCategoryId(
            $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_assoc  = $this->FillEventCategoryAssoc($row);
                $results[] = $event_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetEventCategoryAssocListByEventIdByCategoryId(
        $event_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListByEventIdByCategoryId(
            $event_id
            , $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $event_category_assoc  = $this->FillEventCategoryAssoc($row);
                $results[] = $event_category_assoc;
            }
        }
        
        return $results;
    }
        
        
    public function FillChannel($row) {
        $obj = new Channel();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountChannel(
    ) {       
        return $this->data->CountChannel(
        );
    }
               
    public function CountChannelByUuid(
        $uuid
    ) {       
        return $this->data->CountChannelByUuid(
            $uuid
        );
    }
               
    public function CountChannelByCode(
        $code
    ) {       
        return $this->data->CountChannelByCode(
            $code
        );
    }
               
    public function CountChannelByName(
        $name
    ) {       
        return $this->data->CountChannelByName(
            $name
        );
    }
               
    public function CountChannelByOrgId(
        $org_id
    ) {       
        return $this->data->CountChannelByOrgId(
            $org_id
        );
    }
               
    public function CountChannelByTypeId(
        $type_id
    ) {       
        return $this->data->CountChannelByTypeId(
            $type_id
        );
    }
               
    public function CountChannelByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountChannelByOrgIdByTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseChannelListByFilter($filter_obj) {
        $result = new ChannelResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseChannelListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $channel = $this->FillChannel($row);
                $result->data[] = $channel;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetChannelByUuid($set_type, $obj) {           
        return $this->data->SetChannelByUuid($set_type, $obj);
    }
            
    public function DelChannelByUuid(
        $uuid
    ) {
        return $this->data->DelChannelByUuid(
            $uuid
        );
    }
        
    public function DelChannelByCodeByOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelChannelByCodeByOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelChannelByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelChannelByCodeByOrgIdByTypeId(
            $code
            , $org_id
            , $type_id
        );
    }
        
    public function GetChannelList(
    ) {

        $results = array();
        $rows = $this->data->GetChannelList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel  = $this->FillChannel($row);
                $results[] = $channel;
            }
        }
        
        return $results;
    }
        
    public function GetChannelListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetChannelListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel  = $this->FillChannel($row);
                $results[] = $channel;
            }
        }
        
        return $results;
    }
        
    public function GetChannelListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetChannelListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel  = $this->FillChannel($row);
                $results[] = $channel;
            }
        }
        
        return $results;
    }
        
    public function GetChannelListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetChannelListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel  = $this->FillChannel($row);
                $results[] = $channel;
            }
        }
        
        return $results;
    }
        
    public function GetChannelListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetChannelListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel  = $this->FillChannel($row);
                $results[] = $channel;
            }
        }
        
        return $results;
    }
        
    public function GetChannelListByTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetChannelListByTypeId(
            $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel  = $this->FillChannel($row);
                $results[] = $channel;
            }
        }
        
        return $results;
    }
        
    public function GetChannelListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetChannelListByOrgIdByTypeId(
            $org_id
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel  = $this->FillChannel($row);
                $results[] = $channel;
            }
        }
        
        return $results;
    }
        
        
    public function FillChannelType($row) {
        $obj = new ChannelType();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountChannelType(
    ) {       
        return $this->data->CountChannelType(
        );
    }
               
    public function CountChannelTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountChannelTypeByUuid(
            $uuid
        );
    }
               
    public function CountChannelTypeByCode(
        $code
    ) {       
        return $this->data->CountChannelTypeByCode(
            $code
        );
    }
               
    public function CountChannelTypeByName(
        $name
    ) {       
        return $this->data->CountChannelTypeByName(
            $name
        );
    }
               
    public function BrowseChannelTypeListByFilter($filter_obj) {
        $result = new ChannelTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseChannelTypeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $channel_type = $this->FillChannelType($row);
                $result->data[] = $channel_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetChannelTypeByUuid($set_type, $obj) {           
        return $this->data->SetChannelTypeByUuid($set_type, $obj);
    }
            
    public function DelChannelTypeByUuid(
        $uuid
    ) {
        return $this->data->DelChannelTypeByUuid(
            $uuid
        );
    }
        
    public function GetChannelTypeList(
    ) {

        $results = array();
        $rows = $this->data->GetChannelTypeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel_type  = $this->FillChannelType($row);
                $results[] = $channel_type;
            }
        }
        
        return $results;
    }
        
    public function GetChannelTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetChannelTypeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel_type  = $this->FillChannelType($row);
                $results[] = $channel_type;
            }
        }
        
        return $results;
    }
        
    public function GetChannelTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetChannelTypeListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel_type  = $this->FillChannelType($row);
                $results[] = $channel_type;
            }
        }
        
        return $results;
    }
        
    public function GetChannelTypeListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetChannelTypeListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $channel_type  = $this->FillChannelType($row);
                $results[] = $channel_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillQuestion($row) {
        $obj = new Question();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['choices'] != NULL) {                
            $obj->choices = $row['choices'];#dataType.FillDataString(dr, "choices");
        }
        if ($row['channel_id'] != NULL) {                
            $obj->channel_id = $row['channel_id'];#dataType.FillDataString(dr, "channel_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountQuestion(
    ) {       
        return $this->data->CountQuestion(
        );
    }
               
    public function CountQuestionByUuid(
        $uuid
    ) {       
        return $this->data->CountQuestionByUuid(
            $uuid
        );
    }
               
    public function CountQuestionByCode(
        $code
    ) {       
        return $this->data->CountQuestionByCode(
            $code
        );
    }
               
    public function CountQuestionByName(
        $name
    ) {       
        return $this->data->CountQuestionByName(
            $name
        );
    }
               
    public function CountQuestionByChannelId(
        $channel_id
    ) {       
        return $this->data->CountQuestionByChannelId(
            $channel_id
        );
    }
               
    public function CountQuestionByOrgId(
        $org_id
    ) {       
        return $this->data->CountQuestionByOrgId(
            $org_id
        );
    }
               
    public function CountQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {       
        return $this->data->CountQuestionByChannelIdByOrgId(
            $channel_id
            , $org_id
        );
    }
               
    public function CountQuestionByChannelIdByCode(
        $channel_id
        , $code
    ) {       
        return $this->data->CountQuestionByChannelIdByCode(
            $channel_id
            , $code
        );
    }
               
    public function BrowseQuestionListByFilter($filter_obj) {
        $result = new QuestionResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseQuestionListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $question = $this->FillQuestion($row);
                $result->data[] = $question;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetQuestionByUuid($set_type, $obj) {           
        return $this->data->SetQuestionByUuid($set_type, $obj);
    }
            
    public function SetQuestionByChannelIdByCode($set_type, $obj) {           
        return $this->data->SetQuestionByChannelIdByCode($set_type, $obj);
    }
            
    public function DelQuestionByUuid(
        $uuid
    ) {
        return $this->data->DelQuestionByUuid(
            $uuid
        );
    }
        
    public function DelQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->data->DelQuestionByChannelIdByOrgId(
            $channel_id
            , $org_id
        );
    }
        
    public function GetQuestionList(
    ) {

        $results = array();
        $rows = $this->data->GetQuestionList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByType(
        $type
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByType(
            $type
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByChannelId(
        $channel_id
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByChannelId(
            $channel_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByChannelIdByOrgId(
            $channel_id
            , $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
    public function GetQuestionListByChannelIdByCode(
        $channel_id
        , $code
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListByChannelIdByCode(
            $channel_id
            , $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $question  = $this->FillQuestion($row);
                $results[] = $question;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileOffer($row) {
        $obj = new ProfileOffer();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['redeem_code'] != NULL) {                
            $obj->redeem_code = $row['redeem_code'];#dataType.FillDataString(dr, "redeem_code");
        }
        if ($row['offer_id'] != NULL) {                
            $obj->offer_id = $row['offer_id'];#dataType.FillDataString(dr, "offer_id");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['redeemed'] != NULL) {                
            $obj->redeemed = $row['redeemed'];#dataType.FillDataString(dr, "redeemed");
        }
        if ($row['url'] != NULL) {                
            $obj->url = $row['url'];#dataType.FillDataString(dr, "url");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountProfileOffer(
    ) {       
        return $this->data->CountProfileOffer(
        );
    }
               
    public function CountProfileOfferByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileOfferByUuid(
            $uuid
        );
    }
               
    public function CountProfileOfferByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileOfferByProfileId(
            $profile_id
        );
    }
               
    public function BrowseProfileOfferListByFilter($filter_obj) {
        $result = new ProfileOfferResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileOfferListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_offer = $this->FillProfileOffer($row);
                $result->data[] = $profile_offer;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileOfferByUuid($set_type, $obj) {           
        return $this->data->SetProfileOfferByUuid($set_type, $obj);
    }
            
    public function DelProfileOfferByUuid(
        $uuid
    ) {
        return $this->data->DelProfileOfferByUuid(
            $uuid
        );
    }
        
    public function DelProfileOfferByProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileOfferByProfileId(
            $profile_id
        );
    }
        
    public function GetProfileOfferList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileOfferList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_offer  = $this->FillProfileOffer($row);
                $results[] = $profile_offer;
            }
        }
        
        return $results;
    }
        
    public function GetProfileOfferListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileOfferListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_offer  = $this->FillProfileOffer($row);
                $results[] = $profile_offer;
            }
        }
        
        return $results;
    }
        
    public function GetProfileOfferListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileOfferListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_offer  = $this->FillProfileOffer($row);
                $results[] = $profile_offer;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileApp($row) {
        $obj = new ProfileApp();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
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
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['app_id'] != NULL) {                
            $obj->app_id = $row['app_id'];#dataType.FillDataString(dr, "app_id");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }

        return $obj;
    }
        
    public function CountProfileApp(
    ) {       
        return $this->data->CountProfileApp(
        );
    }
               
    public function CountProfileAppByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAppByUuid(
            $uuid
        );
    }
               
    public function CountProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {       
        return $this->data->CountProfileAppByProfileIdByAppId(
            $profile_id
            , $app_id
        );
    }
               
    public function BrowseProfileAppListByFilter($filter_obj) {
        $result = new ProfileAppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAppListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_app = $this->FillProfileApp($row);
                $result->data[] = $profile_app;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileAppByUuid($set_type, $obj) {           
        return $this->data->SetProfileAppByUuid($set_type, $obj);
    }
            
    public function SetProfileAppByProfileIdByAppId($set_type, $obj) {           
        return $this->data->SetProfileAppByProfileIdByAppId($set_type, $obj);
    }
            
    public function DelProfileAppByUuid(
        $uuid
    ) {
        return $this->data->DelProfileAppByUuid(
            $uuid
        );
    }
        
    public function DelProfileAppByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {
        return $this->data->DelProfileAppByProfileIdByAppId(
            $profile_id
            , $app_id
        );
    }
        
    public function GetProfileAppList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_app  = $this->FillProfileApp($row);
                $results[] = $profile_app;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAppListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_app  = $this->FillProfileApp($row);
                $results[] = $profile_app;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAppListByAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListByAppId(
            $app_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_app  = $this->FillProfileApp($row);
                $results[] = $profile_app;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAppListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_app  = $this->FillProfileApp($row);
                $results[] = $profile_app;
            }
        }
        
        return $results;
    }
        
    public function GetProfileAppListByProfileIdByAppId(
        $profile_id
        , $app_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListByProfileIdByAppId(
            $profile_id
            , $app_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_app  = $this->FillProfileApp($row);
                $results[] = $profile_app;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileOrg($row) {
        $obj = new ProfileOrg();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
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
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }

        return $obj;
    }
        
    public function CountProfileOrg(
    ) {       
        return $this->data->CountProfileOrg(
        );
    }
               
    public function CountProfileOrgByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileOrgByUuid(
            $uuid
        );
    }
               
    public function CountProfileOrgByOrgId(
        $org_id
    ) {       
        return $this->data->CountProfileOrgByOrgId(
            $org_id
        );
    }
               
    public function CountProfileOrgByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileOrgByProfileId(
            $profile_id
        );
    }
               
    public function BrowseProfileOrgListByFilter($filter_obj) {
        $result = new ProfileOrgResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileOrgListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_org = $this->FillProfileOrg($row);
                $result->data[] = $profile_org;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileOrgByUuid($set_type, $obj) {           
        return $this->data->SetProfileOrgByUuid($set_type, $obj);
    }
            
    public function DelProfileOrgByUuid(
        $uuid
    ) {
        return $this->data->DelProfileOrgByUuid(
            $uuid
        );
    }
        
    public function GetProfileOrgList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileOrgList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_org  = $this->FillProfileOrg($row);
                $results[] = $profile_org;
            }
        }
        
        return $results;
    }
        
    public function GetProfileOrgListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileOrgListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_org  = $this->FillProfileOrg($row);
                $results[] = $profile_org;
            }
        }
        
        return $results;
    }
        
    public function GetProfileOrgListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileOrgListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_org  = $this->FillProfileOrg($row);
                $results[] = $profile_org;
            }
        }
        
        return $results;
    }
        
    public function GetProfileOrgListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileOrgListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_org  = $this->FillProfileOrg($row);
                $results[] = $profile_org;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileQuestion($row) {
        $obj = new ProfileQuestion();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
        }
        if ($row['channel_id'] != NULL) {                
            $obj->channel_id = $row['channel_id'];#dataType.FillDataString(dr, "channel_id");
        }
        if ($row['answer'] != NULL) {                
            $obj->answer = $row['answer'];#dataType.FillDataString(dr, "answer");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['question_id'] != NULL) {                
            $obj->question_id = $row['question_id'];#dataType.FillDataString(dr, "question_id");
        }

        return $obj;
    }
        
    public function CountProfileQuestion(
    ) {       
        return $this->data->CountProfileQuestion(
        );
    }
               
    public function CountProfileQuestionByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileQuestionByUuid(
            $uuid
        );
    }
               
    public function CountProfileQuestionByChannelId(
        $channel_id
    ) {       
        return $this->data->CountProfileQuestionByChannelId(
            $channel_id
        );
    }
               
    public function CountProfileQuestionByOrgId(
        $org_id
    ) {       
        return $this->data->CountProfileQuestionByOrgId(
            $org_id
        );
    }
               
    public function CountProfileQuestionByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileQuestionByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileQuestionByQuestionId(
        $question_id
    ) {       
        return $this->data->CountProfileQuestionByQuestionId(
            $question_id
        );
    }
               
    public function CountProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {       
        return $this->data->CountProfileQuestionByChannelIdByOrgId(
            $channel_id
            , $org_id
        );
    }
               
    public function CountProfileQuestionByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {       
        return $this->data->CountProfileQuestionByChannelIdByProfileId(
            $channel_id
            , $profile_id
        );
    }
               
    public function CountProfileQuestionByQuestionIdByProfileId(
        $question_id
        , $profile_id
    ) {       
        return $this->data->CountProfileQuestionByQuestionIdByProfileId(
            $question_id
            , $profile_id
        );
    }
               
    public function BrowseProfileQuestionListByFilter($filter_obj) {
        $result = new ProfileQuestionResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileQuestionListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_question = $this->FillProfileQuestion($row);
                $result->data[] = $profile_question;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileQuestionByUuid($set_type, $obj) {           
        return $this->data->SetProfileQuestionByUuid($set_type, $obj);
    }
            
    public function SetProfileQuestionByChannelIdByProfileId($set_type, $obj) {           
        return $this->data->SetProfileQuestionByChannelIdByProfileId($set_type, $obj);
    }
            
    public function SetProfileQuestionByQuestionIdByProfileId($set_type, $obj) {           
        return $this->data->SetProfileQuestionByQuestionIdByProfileId($set_type, $obj);
    }
            
    public function SetProfileQuestionByChannelIdByQuestionIdByProfileId($set_type, $obj) {           
        return $this->data->SetProfileQuestionByChannelIdByQuestionIdByProfileId($set_type, $obj);
    }
            
    public function DelProfileQuestionByUuid(
        $uuid
    ) {
        return $this->data->DelProfileQuestionByUuid(
            $uuid
        );
    }
        
    public function DelProfileQuestionByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->data->DelProfileQuestionByChannelIdByOrgId(
            $channel_id
            , $org_id
        );
    }
        
    public function GetProfileQuestionList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByChannelId(
        $channel_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByChannelId(
            $channel_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByQuestionId(
        $question_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByQuestionId(
            $question_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByChannelIdByOrgId(
        $channel_id
        , $org_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByChannelIdByOrgId(
            $channel_id
            , $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByChannelIdByProfileId(
            $channel_id
            , $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
    public function GetProfileQuestionListByQuestionIdByProfileId(
        $question_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListByQuestionIdByProfileId(
            $question_id
            , $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_question  = $this->FillProfileQuestion($row);
                $results[] = $profile_question;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileChannel($row) {
        $obj = new ProfileChannel();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['channel_id'] != NULL) {                
            $obj->channel_id = $row['channel_id'];#dataType.FillDataString(dr, "channel_id");
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
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountProfileChannel(
    ) {       
        return $this->data->CountProfileChannel(
        );
    }
               
    public function CountProfileChannelByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileChannelByUuid(
            $uuid
        );
    }
               
    public function CountProfileChannelByChannelId(
        $channel_id
    ) {       
        return $this->data->CountProfileChannelByChannelId(
            $channel_id
        );
    }
               
    public function CountProfileChannelByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileChannelByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {       
        return $this->data->CountProfileChannelByChannelIdByProfileId(
            $channel_id
            , $profile_id
        );
    }
               
    public function BrowseProfileChannelListByFilter($filter_obj) {
        $result = new ProfileChannelResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileChannelListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_channel = $this->FillProfileChannel($row);
                $result->data[] = $profile_channel;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileChannelByUuid($set_type, $obj) {           
        return $this->data->SetProfileChannelByUuid($set_type, $obj);
    }
            
    public function SetProfileChannelByChannelIdByProfileId($set_type, $obj) {           
        return $this->data->SetProfileChannelByChannelIdByProfileId($set_type, $obj);
    }
            
    public function DelProfileChannelByUuid(
        $uuid
    ) {
        return $this->data->DelProfileChannelByUuid(
            $uuid
        );
    }
        
    public function DelProfileChannelByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {
        return $this->data->DelProfileChannelByChannelIdByProfileId(
            $channel_id
            , $profile_id
        );
    }
        
    public function GetProfileChannelList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_channel  = $this->FillProfileChannel($row);
                $results[] = $profile_channel;
            }
        }
        
        return $results;
    }
        
    public function GetProfileChannelListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_channel  = $this->FillProfileChannel($row);
                $results[] = $profile_channel;
            }
        }
        
        return $results;
    }
        
    public function GetProfileChannelListByChannelId(
        $channel_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListByChannelId(
            $channel_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_channel  = $this->FillProfileChannel($row);
                $results[] = $profile_channel;
            }
        }
        
        return $results;
    }
        
    public function GetProfileChannelListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_channel  = $this->FillProfileChannel($row);
                $results[] = $profile_channel;
            }
        }
        
        return $results;
    }
        
    public function GetProfileChannelListByChannelIdByProfileId(
        $channel_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListByChannelIdByProfileId(
            $channel_id
            , $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_channel  = $this->FillProfileChannel($row);
                $results[] = $profile_channel;
            }
        }
        
        return $results;
    }
        
        
    public function FillOrgSite($row) {
        $obj = new OrgSite();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
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
        if ($row['site_id'] != NULL) {                
            $obj->site_id = $row['site_id'];#dataType.FillDataString(dr, "site_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['org_id'] != NULL) {                
            $obj->org_id = $row['org_id'];#dataType.FillDataString(dr, "org_id");
        }

        return $obj;
    }
        
    public function CountOrgSite(
    ) {       
        return $this->data->CountOrgSite(
        );
    }
               
    public function CountOrgSiteByUuid(
        $uuid
    ) {       
        return $this->data->CountOrgSiteByUuid(
            $uuid
        );
    }
               
    public function CountOrgSiteByOrgId(
        $org_id
    ) {       
        return $this->data->CountOrgSiteByOrgId(
            $org_id
        );
    }
               
    public function CountOrgSiteBySiteId(
        $site_id
    ) {       
        return $this->data->CountOrgSiteBySiteId(
            $site_id
        );
    }
               
    public function CountOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {       
        return $this->data->CountOrgSiteByOrgIdBySiteId(
            $org_id
            , $site_id
        );
    }
               
    public function BrowseOrgSiteListByFilter($filter_obj) {
        $result = new OrgSiteResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOrgSiteListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $org_site = $this->FillOrgSite($row);
                $result->data[] = $org_site;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetOrgSiteByUuid($set_type, $obj) {           
        return $this->data->SetOrgSiteByUuid($set_type, $obj);
    }
            
    public function SetOrgSiteByOrgIdBySiteId($set_type, $obj) {           
        return $this->data->SetOrgSiteByOrgIdBySiteId($set_type, $obj);
    }
            
    public function DelOrgSiteByUuid(
        $uuid
    ) {
        return $this->data->DelOrgSiteByUuid(
            $uuid
        );
    }
        
    public function DelOrgSiteByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {
        return $this->data->DelOrgSiteByOrgIdBySiteId(
            $org_id
            , $site_id
        );
    }
        
    public function GetOrgSiteList(
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_site  = $this->FillOrgSite($row);
                $results[] = $org_site;
            }
        }
        
        return $results;
    }
        
    public function GetOrgSiteListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_site  = $this->FillOrgSite($row);
                $results[] = $org_site;
            }
        }
        
        return $results;
    }
        
    public function GetOrgSiteListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_site  = $this->FillOrgSite($row);
                $results[] = $org_site;
            }
        }
        
        return $results;
    }
        
    public function GetOrgSiteListBySiteId(
        $site_id
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListBySiteId(
            $site_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_site  = $this->FillOrgSite($row);
                $results[] = $org_site;
            }
        }
        
        return $results;
    }
        
    public function GetOrgSiteListByOrgIdBySiteId(
        $org_id
        , $site_id
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListByOrgIdBySiteId(
            $org_id
            , $site_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $org_site  = $this->FillOrgSite($row);
                $results[] = $org_site;
            }
        }
        
        return $results;
    }
        
        
    public function FillSiteApp($row) {
        $obj = new SiteApp();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
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
        if ($row['site_id'] != NULL) {                
            $obj->site_id = $row['site_id'];#dataType.FillDataString(dr, "site_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['app_id'] != NULL) {                
            $obj->app_id = $row['app_id'];#dataType.FillDataString(dr, "app_id");
        }

        return $obj;
    }
        
    public function CountSiteApp(
    ) {       
        return $this->data->CountSiteApp(
        );
    }
               
    public function CountSiteAppByUuid(
        $uuid
    ) {       
        return $this->data->CountSiteAppByUuid(
            $uuid
        );
    }
               
    public function CountSiteAppByAppId(
        $app_id
    ) {       
        return $this->data->CountSiteAppByAppId(
            $app_id
        );
    }
               
    public function CountSiteAppBySiteId(
        $site_id
    ) {       
        return $this->data->CountSiteAppBySiteId(
            $site_id
        );
    }
               
    public function CountSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
    ) {       
        return $this->data->CountSiteAppByAppIdBySiteId(
            $app_id
            , $site_id
        );
    }
               
    public function BrowseSiteAppListByFilter($filter_obj) {
        $result = new SiteAppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseSiteAppListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $site_app = $this->FillSiteApp($row);
                $result->data[] = $site_app;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetSiteAppByUuid($set_type, $obj) {           
        return $this->data->SetSiteAppByUuid($set_type, $obj);
    }
            
    public function SetSiteAppByAppIdBySiteId($set_type, $obj) {           
        return $this->data->SetSiteAppByAppIdBySiteId($set_type, $obj);
    }
            
    public function DelSiteAppByUuid(
        $uuid
    ) {
        return $this->data->DelSiteAppByUuid(
            $uuid
        );
    }
        
    public function DelSiteAppByAppIdBySiteId(
        $app_id
        , $site_id
    ) {
        return $this->data->DelSiteAppByAppIdBySiteId(
            $app_id
            , $site_id
        );
    }
        
    public function GetSiteAppList(
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_app  = $this->FillSiteApp($row);
                $results[] = $site_app;
            }
        }
        
        return $results;
    }
        
    public function GetSiteAppListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_app  = $this->FillSiteApp($row);
                $results[] = $site_app;
            }
        }
        
        return $results;
    }
        
    public function GetSiteAppListByAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListByAppId(
            $app_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_app  = $this->FillSiteApp($row);
                $results[] = $site_app;
            }
        }
        
        return $results;
    }
        
    public function GetSiteAppListBySiteId(
        $site_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListBySiteId(
            $site_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_app  = $this->FillSiteApp($row);
                $results[] = $site_app;
            }
        }
        
        return $results;
    }
        
    public function GetSiteAppListByAppIdBySiteId(
        $app_id
        , $site_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListByAppIdBySiteId(
            $app_id
            , $site_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $site_app  = $this->FillSiteApp($row);
                $results[] = $site_app;
            }
        }
        
        return $results;
    }
        
        
    public function FillPhoto($row) {
        $obj = new Photo();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['third_party_oembed'] != NULL) {                
            $obj->third_party_oembed = $row['third_party_oembed'];#dataType.FillDataString(dr, "third_party_oembed");
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
        if ($row['url'] != NULL) {                
            $obj->url = $row['url'];#dataType.FillDataString(dr, "url");
        }
        if ($row['third_party_data'] != NULL) {                
            $obj->third_party_data = $row['third_party_data'];#dataType.FillDataString(dr, "third_party_data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['third_party_url'] != NULL) {                
            $obj->third_party_url = $row['third_party_url'];#dataType.FillDataString(dr, "third_party_url");
        }
        if ($row['third_party_id'] != NULL) {                
            $obj->third_party_id = $row['third_party_id'];#dataType.FillDataString(dr, "third_party_id");
        }
        if ($row['content_type'] != NULL) {                
            $obj->content_type = $row['content_type'];#dataType.FillDataString(dr, "content_type");
        }
        if ($row['external_id'] != NULL) {                
            $obj->external_id = $row['external_id'];#dataType.FillDataString(dr, "external_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountPhoto(
    ) {       
        return $this->data->CountPhoto(
        );
    }
               
    public function CountPhotoByUuid(
        $uuid
    ) {       
        return $this->data->CountPhotoByUuid(
            $uuid
        );
    }
               
    public function CountPhotoByExternalId(
        $external_id
    ) {       
        return $this->data->CountPhotoByExternalId(
            $external_id
        );
    }
               
    public function CountPhotoByUrl(
        $url
    ) {       
        return $this->data->CountPhotoByUrl(
            $url
        );
    }
               
    public function CountPhotoByUrlByExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountPhotoByUrlByExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountPhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountPhotoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowsePhotoListByFilter($filter_obj) {
        $result = new PhotoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowsePhotoListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $photo = $this->FillPhoto($row);
                $result->data[] = $photo;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetPhotoByUuid($set_type, $obj) {           
        return $this->data->SetPhotoByUuid($set_type, $obj);
    }
            
    public function SetPhotoByExternalId($set_type, $obj) {           
        return $this->data->SetPhotoByExternalId($set_type, $obj);
    }
            
    public function SetPhotoByUrl($set_type, $obj) {           
        return $this->data->SetPhotoByUrl($set_type, $obj);
    }
            
    public function SetPhotoByUrlByExternalId($set_type, $obj) {           
        return $this->data->SetPhotoByUrlByExternalId($set_type, $obj);
    }
            
    public function SetPhotoByUuidByExternalId($set_type, $obj) {           
        return $this->data->SetPhotoByUuidByExternalId($set_type, $obj);
    }
            
    public function DelPhotoByUuid(
        $uuid
    ) {
        return $this->data->DelPhotoByUuid(
            $uuid
        );
    }
        
    public function DelPhotoByExternalId(
        $external_id
    ) {
        return $this->data->DelPhotoByExternalId(
            $external_id
        );
    }
        
    public function DelPhotoByUrl(
        $url
    ) {
        return $this->data->DelPhotoByUrl(
            $url
        );
    }
        
    public function DelPhotoByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelPhotoByUrlByExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelPhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelPhotoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
        
    public function GetPhotoList(
    ) {

        $results = array();
        $rows = $this->data->GetPhotoList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $photo  = $this->FillPhoto($row);
                $results[] = $photo;
            }
        }
        
        return $results;
    }
        
    public function GetPhotoListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $photo  = $this->FillPhoto($row);
                $results[] = $photo;
            }
        }
        
        return $results;
    }
        
    public function GetPhotoListByExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListByExternalId(
            $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $photo  = $this->FillPhoto($row);
                $results[] = $photo;
            }
        }
        
        return $results;
    }
        
    public function GetPhotoListByUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListByUrl(
            $url
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $photo  = $this->FillPhoto($row);
                $results[] = $photo;
            }
        }
        
        return $results;
    }
        
    public function GetPhotoListByUrlByExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListByUrlByExternalId(
            $url
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $photo  = $this->FillPhoto($row);
                $results[] = $photo;
            }
        }
        
        return $results;
    }
        
    public function GetPhotoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListByUuidByExternalId(
            $uuid
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $photo  = $this->FillPhoto($row);
                $results[] = $photo;
            }
        }
        
        return $results;
    }
        
        
    public function FillVideo($row) {
        $obj = new Video();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['third_party_oembed'] != NULL) {                
            $obj->third_party_oembed = $row['third_party_oembed'];#dataType.FillDataString(dr, "third_party_oembed");
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
        if ($row['url'] != NULL) {                
            $obj->url = $row['url'];#dataType.FillDataString(dr, "url");
        }
        if ($row['third_party_data'] != NULL) {                
            $obj->third_party_data = $row['third_party_data'];#dataType.FillDataString(dr, "third_party_data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['third_party_url'] != NULL) {                
            $obj->third_party_url = $row['third_party_url'];#dataType.FillDataString(dr, "third_party_url");
        }
        if ($row['third_party_id'] != NULL) {                
            $obj->third_party_id = $row['third_party_id'];#dataType.FillDataString(dr, "third_party_id");
        }
        if ($row['content_type'] != NULL) {                
            $obj->content_type = $row['content_type'];#dataType.FillDataString(dr, "content_type");
        }
        if ($row['external_id'] != NULL) {                
            $obj->external_id = $row['external_id'];#dataType.FillDataString(dr, "external_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountVideo(
    ) {       
        return $this->data->CountVideo(
        );
    }
               
    public function CountVideoByUuid(
        $uuid
    ) {       
        return $this->data->CountVideoByUuid(
            $uuid
        );
    }
               
    public function CountVideoByExternalId(
        $external_id
    ) {       
        return $this->data->CountVideoByExternalId(
            $external_id
        );
    }
               
    public function CountVideoByUrl(
        $url
    ) {       
        return $this->data->CountVideoByUrl(
            $url
        );
    }
               
    public function CountVideoByUrlByExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountVideoByUrlByExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountVideoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowseVideoListByFilter($filter_obj) {
        $result = new VideoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseVideoListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $video = $this->FillVideo($row);
                $result->data[] = $video;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetVideoByUuid($set_type, $obj) {           
        return $this->data->SetVideoByUuid($set_type, $obj);
    }
            
    public function SetVideoByExternalId($set_type, $obj) {           
        return $this->data->SetVideoByExternalId($set_type, $obj);
    }
            
    public function SetVideoByUrl($set_type, $obj) {           
        return $this->data->SetVideoByUrl($set_type, $obj);
    }
            
    public function SetVideoByUrlByExternalId($set_type, $obj) {           
        return $this->data->SetVideoByUrlByExternalId($set_type, $obj);
    }
            
    public function SetVideoByUuidByExternalId($set_type, $obj) {           
        return $this->data->SetVideoByUuidByExternalId($set_type, $obj);
    }
            
    public function DelVideoByUuid(
        $uuid
    ) {
        return $this->data->DelVideoByUuid(
            $uuid
        );
    }
        
    public function DelVideoByExternalId(
        $external_id
    ) {
        return $this->data->DelVideoByExternalId(
            $external_id
        );
    }
        
    public function DelVideoByUrl(
        $url
    ) {
        return $this->data->DelVideoByUrl(
            $url
        );
    }
        
    public function DelVideoByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelVideoByUrlByExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelVideoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
        
    public function GetVideoList(
    ) {

        $results = array();
        $rows = $this->data->GetVideoList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $video  = $this->FillVideo($row);
                $results[] = $video;
            }
        }
        
        return $results;
    }
        
    public function GetVideoListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetVideoListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $video  = $this->FillVideo($row);
                $results[] = $video;
            }
        }
        
        return $results;
    }
        
    public function GetVideoListByExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetVideoListByExternalId(
            $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $video  = $this->FillVideo($row);
                $results[] = $video;
            }
        }
        
        return $results;
    }
        
    public function GetVideoListByUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetVideoListByUrl(
            $url
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $video  = $this->FillVideo($row);
                $results[] = $video;
            }
        }
        
        return $results;
    }
        
    public function GetVideoListByUrlByExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetVideoListByUrlByExternalId(
            $url
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $video  = $this->FillVideo($row);
                $results[] = $video;
            }
        }
        
        return $results;
    }
        
    public function GetVideoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetVideoListByUuidByExternalId(
            $uuid
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $video  = $this->FillVideo($row);
                $results[] = $video;
            }
        }
        
        return $results;
    }
        


}

?>