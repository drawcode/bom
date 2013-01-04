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
               
    public function CountAppUuid(
        $uuid
    ) {       
        return $this->data->CountAppUuid(
            $uuid
        );
    }
               
    public function CountAppCode(
        $code
    ) {       
        return $this->data->CountAppCode(
            $code
        );
    }
               
    public function CountAppTypeId(
        $type_id
    ) {       
        return $this->data->CountAppTypeId(
            $type_id
        );
    }
               
    public function CountAppCodeTypeId(
        $code
        , $type_id
    ) {       
        return $this->data->CountAppCodeTypeId(
            $code
            , $type_id
        );
    }
               
    public function CountAppPlatformTypeId(
        $platform
        , $type_id
    ) {       
        return $this->data->CountAppPlatformTypeId(
            $platform
            , $type_id
        );
    }
               
    public function CountAppPlatform(
        $platform
    ) {       
        return $this->data->CountAppPlatform(
            $platform
        );
    }
               
    public function BrowseAppListFilter($filter_obj) {
        $result = new AppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseAppListFilter(filter_obj);
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

    public function SetAppUuid($set_type, $obj) {           
        return $this->data->SetAppUuid($set_type, $obj);
    }
            
    public function SetAppCode($set_type, $obj) {           
        return $this->data->SetAppCode($set_type, $obj);
    }
            
    public function DelAppUuid(
        $uuid
    ) {
        return $this->data->DelAppUuid(
            $uuid
        );
    }
        
    public function DelAppCode(
        $code
    ) {
        return $this->data->DelAppCode(
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
        
    public function GetAppListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetAppListUuid(
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
        
    public function GetAppListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetAppListCode(
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
        
    public function GetAppListTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetAppListTypeId(
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
        
    public function GetAppListCodeTypeId(
        $code
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetAppListCodeTypeId(
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
        
    public function GetAppListPlatformTypeId(
        $platform
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetAppListPlatformTypeId(
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
        
    public function GetAppListPlatform(
        $platform
    ) {

        $results = array();
        $rows = $this->data->GetAppListPlatform(
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
               
    public function CountAppTypeUuid(
        $uuid
    ) {       
        return $this->data->CountAppTypeUuid(
            $uuid
        );
    }
               
    public function CountAppTypeCode(
        $code
    ) {       
        return $this->data->CountAppTypeCode(
            $code
        );
    }
               
    public function BrowseAppTypeListFilter($filter_obj) {
        $result = new AppTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseAppTypeListFilter(filter_obj);
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

    public function SetAppTypeUuid($set_type, $obj) {           
        return $this->data->SetAppTypeUuid($set_type, $obj);
    }
            
    public function SetAppTypeCode($set_type, $obj) {           
        return $this->data->SetAppTypeCode($set_type, $obj);
    }
            
    public function DelAppTypeUuid(
        $uuid
    ) {
        return $this->data->DelAppTypeUuid(
            $uuid
        );
    }
        
    public function DelAppTypeCode(
        $code
    ) {
        return $this->data->DelAppTypeCode(
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
        
    public function GetAppTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetAppTypeListUuid(
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
        
    public function GetAppTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetAppTypeListCode(
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
               
    public function CountSiteUuid(
        $uuid
    ) {       
        return $this->data->CountSiteUuid(
            $uuid
        );
    }
               
    public function CountSiteCode(
        $code
    ) {       
        return $this->data->CountSiteCode(
            $code
        );
    }
               
    public function CountSiteTypeId(
        $type_id
    ) {       
        return $this->data->CountSiteTypeId(
            $type_id
        );
    }
               
    public function CountSiteCodeTypeId(
        $code
        , $type_id
    ) {       
        return $this->data->CountSiteCodeTypeId(
            $code
            , $type_id
        );
    }
               
    public function CountSiteDomainTypeId(
        $domain
        , $type_id
    ) {       
        return $this->data->CountSiteDomainTypeId(
            $domain
            , $type_id
        );
    }
               
    public function CountSiteDomain(
        $domain
    ) {       
        return $this->data->CountSiteDomain(
            $domain
        );
    }
               
    public function BrowseSiteListFilter($filter_obj) {
        $result = new SiteResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseSiteListFilter(filter_obj);
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

    public function SetSiteUuid($set_type, $obj) {           
        return $this->data->SetSiteUuid($set_type, $obj);
    }
            
    public function SetSiteCode($set_type, $obj) {           
        return $this->data->SetSiteCode($set_type, $obj);
    }
            
    public function DelSiteUuid(
        $uuid
    ) {
        return $this->data->DelSiteUuid(
            $uuid
        );
    }
        
    public function DelSiteCode(
        $code
    ) {
        return $this->data->DelSiteCode(
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
        
    public function GetSiteListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetSiteListUuid(
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
        
    public function GetSiteListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetSiteListCode(
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
        
    public function GetSiteListTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteListTypeId(
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
        
    public function GetSiteListCodeTypeId(
        $code
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteListCodeTypeId(
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
        
    public function GetSiteListDomainTypeId(
        $domain
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteListDomainTypeId(
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
        
    public function GetSiteListDomain(
        $domain
    ) {

        $results = array();
        $rows = $this->data->GetSiteListDomain(
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
               
    public function CountSiteTypeUuid(
        $uuid
    ) {       
        return $this->data->CountSiteTypeUuid(
            $uuid
        );
    }
               
    public function CountSiteTypeCode(
        $code
    ) {       
        return $this->data->CountSiteTypeCode(
            $code
        );
    }
               
    public function BrowseSiteTypeListFilter($filter_obj) {
        $result = new SiteTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseSiteTypeListFilter(filter_obj);
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

    public function SetSiteTypeUuid($set_type, $obj) {           
        return $this->data->SetSiteTypeUuid($set_type, $obj);
    }
            
    public function SetSiteTypeCode($set_type, $obj) {           
        return $this->data->SetSiteTypeCode($set_type, $obj);
    }
            
    public function DelSiteTypeUuid(
        $uuid
    ) {
        return $this->data->DelSiteTypeUuid(
            $uuid
        );
    }
        
    public function DelSiteTypeCode(
        $code
    ) {
        return $this->data->DelSiteTypeCode(
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
        
    public function GetSiteTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetSiteTypeListUuid(
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
        
    public function GetSiteTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetSiteTypeListCode(
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
               
    public function CountOrgUuid(
        $uuid
    ) {       
        return $this->data->CountOrgUuid(
            $uuid
        );
    }
               
    public function CountOrgCode(
        $code
    ) {       
        return $this->data->CountOrgCode(
            $code
        );
    }
               
    public function CountOrgName(
        $name
    ) {       
        return $this->data->CountOrgName(
            $name
        );
    }
               
    public function BrowseOrgListFilter($filter_obj) {
        $result = new OrgResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOrgListFilter(filter_obj);
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

    public function SetOrgUuid($set_type, $obj) {           
        return $this->data->SetOrgUuid($set_type, $obj);
    }
            
    public function DelOrgUuid(
        $uuid
    ) {
        return $this->data->DelOrgUuid(
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
        
    public function GetOrgListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOrgListUuid(
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
        
    public function GetOrgListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOrgListCode(
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
        
    public function GetOrgListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOrgListName(
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
               
    public function CountOrgTypeUuid(
        $uuid
    ) {       
        return $this->data->CountOrgTypeUuid(
            $uuid
        );
    }
               
    public function CountOrgTypeCode(
        $code
    ) {       
        return $this->data->CountOrgTypeCode(
            $code
        );
    }
               
    public function BrowseOrgTypeListFilter($filter_obj) {
        $result = new OrgTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOrgTypeListFilter(filter_obj);
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

    public function SetOrgTypeUuid($set_type, $obj) {           
        return $this->data->SetOrgTypeUuid($set_type, $obj);
    }
            
    public function SetOrgTypeCode($set_type, $obj) {           
        return $this->data->SetOrgTypeCode($set_type, $obj);
    }
            
    public function DelOrgTypeUuid(
        $uuid
    ) {
        return $this->data->DelOrgTypeUuid(
            $uuid
        );
    }
        
    public function DelOrgTypeCode(
        $code
    ) {
        return $this->data->DelOrgTypeCode(
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
        
    public function GetOrgTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOrgTypeListUuid(
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
        
    public function GetOrgTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOrgTypeListCode(
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
               
    public function CountContentItemUuid(
        $uuid
    ) {       
        return $this->data->CountContentItemUuid(
            $uuid
        );
    }
               
    public function CountContentItemCode(
        $code
    ) {       
        return $this->data->CountContentItemCode(
            $code
        );
    }
               
    public function CountContentItemName(
        $name
    ) {       
        return $this->data->CountContentItemName(
            $name
        );
    }
               
    public function CountContentItemPath(
        $path
    ) {       
        return $this->data->CountContentItemPath(
            $path
        );
    }
               
    public function BrowseContentItemListFilter($filter_obj) {
        $result = new ContentItemResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseContentItemListFilter(filter_obj);
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

    public function SetContentItemUuid($set_type, $obj) {           
        return $this->data->SetContentItemUuid($set_type, $obj);
    }
            
    public function DelContentItemUuid(
        $uuid
    ) {
        return $this->data->DelContentItemUuid(
            $uuid
        );
    }
        
    public function DelContentItemPath(
        $path
    ) {
        return $this->data->DelContentItemPath(
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
        
    public function GetContentItemListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListUuid(
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
        
    public function GetContentItemListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListCode(
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
        
    public function GetContentItemListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListName(
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
        
    public function GetContentItemListPath(
        $path
    ) {

        $results = array();
        $rows = $this->data->GetContentItemListPath(
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
               
    public function CountContentItemTypeUuid(
        $uuid
    ) {       
        return $this->data->CountContentItemTypeUuid(
            $uuid
        );
    }
               
    public function CountContentItemTypeCode(
        $code
    ) {       
        return $this->data->CountContentItemTypeCode(
            $code
        );
    }
               
    public function BrowseContentItemTypeListFilter($filter_obj) {
        $result = new ContentItemTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseContentItemTypeListFilter(filter_obj);
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

    public function SetContentItemTypeUuid($set_type, $obj) {           
        return $this->data->SetContentItemTypeUuid($set_type, $obj);
    }
            
    public function SetContentItemTypeCode($set_type, $obj) {           
        return $this->data->SetContentItemTypeCode($set_type, $obj);
    }
            
    public function DelContentItemTypeUuid(
        $uuid
    ) {
        return $this->data->DelContentItemTypeUuid(
            $uuid
        );
    }
        
    public function DelContentItemTypeCode(
        $code
    ) {
        return $this->data->DelContentItemTypeCode(
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
        
    public function GetContentItemTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetContentItemTypeListUuid(
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
        
    public function GetContentItemTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetContentItemTypeListCode(
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
               
    public function CountContentPageUuid(
        $uuid
    ) {       
        return $this->data->CountContentPageUuid(
            $uuid
        );
    }
               
    public function CountContentPageCode(
        $code
    ) {       
        return $this->data->CountContentPageCode(
            $code
        );
    }
               
    public function CountContentPageName(
        $name
    ) {       
        return $this->data->CountContentPageName(
            $name
        );
    }
               
    public function CountContentPagePath(
        $path
    ) {       
        return $this->data->CountContentPagePath(
            $path
        );
    }
               
    public function BrowseContentPageListFilter($filter_obj) {
        $result = new ContentPageResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseContentPageListFilter(filter_obj);
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

    public function SetContentPageUuid($set_type, $obj) {           
        return $this->data->SetContentPageUuid($set_type, $obj);
    }
            
    public function DelContentPageUuid(
        $uuid
    ) {
        return $this->data->DelContentPageUuid(
            $uuid
        );
    }
        
    public function DelContentPagePathSiteId(
        $path
        , $site_id
    ) {
        return $this->data->DelContentPagePathSiteId(
            $path
            , $site_id
        );
    }
        
    public function DelContentPagePath(
        $path
    ) {
        return $this->data->DelContentPagePath(
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
        
    public function GetContentPageListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListUuid(
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
        
    public function GetContentPageListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListCode(
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
        
    public function GetContentPageListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListName(
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
        
    public function GetContentPageListPath(
        $path
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListPath(
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
        
    public function GetContentPageListSiteId(
        $site_id
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListSiteId(
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
        
    public function GetContentPageListSiteIdPath(
        $site_id
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetContentPageListSiteIdPath(
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
               
    public function CountMessageUuid(
        $uuid
    ) {       
        return $this->data->CountMessageUuid(
            $uuid
        );
    }
               
    public function BrowseMessageListFilter($filter_obj) {
        $result = new MessageResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseMessageListFilter(filter_obj);
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

    public function SetMessageUuid($set_type, $obj) {           
        return $this->data->SetMessageUuid($set_type, $obj);
    }
            
    public function DelMessageUuid(
        $uuid
    ) {
        return $this->data->DelMessageUuid(
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
        
    public function GetMessageListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetMessageListUuid(
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
               
    public function CountOfferUuid(
        $uuid
    ) {       
        return $this->data->CountOfferUuid(
            $uuid
        );
    }
               
    public function CountOfferCode(
        $code
    ) {       
        return $this->data->CountOfferCode(
            $code
        );
    }
               
    public function CountOfferName(
        $name
    ) {       
        return $this->data->CountOfferName(
            $name
        );
    }
               
    public function CountOfferOrgId(
        $org_id
    ) {       
        return $this->data->CountOfferOrgId(
            $org_id
        );
    }
               
    public function BrowseOfferListFilter($filter_obj) {
        $result = new OfferResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferListFilter(filter_obj);
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

    public function SetOfferUuid($set_type, $obj) {           
        return $this->data->SetOfferUuid($set_type, $obj);
    }
            
    public function DelOfferUuid(
        $uuid
    ) {
        return $this->data->DelOfferUuid(
            $uuid
        );
    }
        
    public function DelOfferOrgId(
        $org_id
    ) {
        return $this->data->DelOfferOrgId(
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
        
    public function GetOfferListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferListUuid(
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
        
    public function GetOfferListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOfferListCode(
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
        
    public function GetOfferListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOfferListName(
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
        
    public function GetOfferListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferListOrgId(
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
               
    public function CountOfferTypeUuid(
        $uuid
    ) {       
        return $this->data->CountOfferTypeUuid(
            $uuid
        );
    }
               
    public function CountOfferTypeCode(
        $code
    ) {       
        return $this->data->CountOfferTypeCode(
            $code
        );
    }
               
    public function CountOfferTypeName(
        $name
    ) {       
        return $this->data->CountOfferTypeName(
            $name
        );
    }
               
    public function BrowseOfferTypeListFilter($filter_obj) {
        $result = new OfferTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferTypeListFilter(filter_obj);
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

    public function SetOfferTypeUuid($set_type, $obj) {           
        return $this->data->SetOfferTypeUuid($set_type, $obj);
    }
            
    public function DelOfferTypeUuid(
        $uuid
    ) {
        return $this->data->DelOfferTypeUuid(
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
        
    public function GetOfferTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferTypeListUuid(
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
        
    public function GetOfferTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOfferTypeListCode(
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
        
    public function GetOfferTypeListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOfferTypeListName(
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
               
    public function CountOfferLocationUuid(
        $uuid
    ) {       
        return $this->data->CountOfferLocationUuid(
            $uuid
        );
    }
               
    public function CountOfferLocationOfferId(
        $offer_id
    ) {       
        return $this->data->CountOfferLocationOfferId(
            $offer_id
        );
    }
               
    public function CountOfferLocationCity(
        $city
    ) {       
        return $this->data->CountOfferLocationCity(
            $city
        );
    }
               
    public function CountOfferLocationCountryCode(
        $country_code
    ) {       
        return $this->data->CountOfferLocationCountryCode(
            $country_code
        );
    }
               
    public function CountOfferLocationPostalCode(
        $postal_code
    ) {       
        return $this->data->CountOfferLocationPostalCode(
            $postal_code
        );
    }
               
    public function BrowseOfferLocationListFilter($filter_obj) {
        $result = new OfferLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferLocationListFilter(filter_obj);
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

    public function SetOfferLocationUuid($set_type, $obj) {           
        return $this->data->SetOfferLocationUuid($set_type, $obj);
    }
            
    public function DelOfferLocationUuid(
        $uuid
    ) {
        return $this->data->DelOfferLocationUuid(
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
        
    public function GetOfferLocationListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListUuid(
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
        
    public function GetOfferLocationListOfferId(
        $offer_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListOfferId(
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
        
    public function GetOfferLocationListCity(
        $city
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListCity(
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
        
    public function GetOfferLocationListCountryCode(
        $country_code
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListCountryCode(
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
        
    public function GetOfferLocationListPostalCode(
        $postal_code
    ) {

        $results = array();
        $rows = $this->data->GetOfferLocationListPostalCode(
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
               
    public function CountOfferCategoryUuid(
        $uuid
    ) {       
        return $this->data->CountOfferCategoryUuid(
            $uuid
        );
    }
               
    public function CountOfferCategoryCode(
        $code
    ) {       
        return $this->data->CountOfferCategoryCode(
            $code
        );
    }
               
    public function CountOfferCategoryName(
        $name
    ) {       
        return $this->data->CountOfferCategoryName(
            $name
        );
    }
               
    public function CountOfferCategoryOrgId(
        $org_id
    ) {       
        return $this->data->CountOfferCategoryOrgId(
            $org_id
        );
    }
               
    public function CountOfferCategoryTypeId(
        $type_id
    ) {       
        return $this->data->CountOfferCategoryTypeId(
            $type_id
        );
    }
               
    public function CountOfferCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountOfferCategoryOrgIdTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseOfferCategoryListFilter($filter_obj) {
        $result = new OfferCategoryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferCategoryListFilter(filter_obj);
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

    public function SetOfferCategoryUuid($set_type, $obj) {           
        return $this->data->SetOfferCategoryUuid($set_type, $obj);
    }
            
    public function DelOfferCategoryUuid(
        $uuid
    ) {
        return $this->data->DelOfferCategoryUuid(
            $uuid
        );
    }
        
    public function DelOfferCategoryCodeOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelOfferCategoryCodeOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelOfferCategoryCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelOfferCategoryCodeOrgIdTypeId(
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
        
    public function GetOfferCategoryListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListUuid(
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
        
    public function GetOfferCategoryListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListCode(
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
        
    public function GetOfferCategoryListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListName(
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
        
    public function GetOfferCategoryListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListOrgId(
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
        
    public function GetOfferCategoryListTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListTypeId(
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
        
    public function GetOfferCategoryListOrgIdTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryListOrgIdTypeId(
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
               
    public function CountOfferCategoryTreeUuid(
        $uuid
    ) {       
        return $this->data->CountOfferCategoryTreeUuid(
            $uuid
        );
    }
               
    public function CountOfferCategoryTreeParentId(
        $parent_id
    ) {       
        return $this->data->CountOfferCategoryTreeParentId(
            $parent_id
        );
    }
               
    public function CountOfferCategoryTreeCategoryId(
        $category_id
    ) {       
        return $this->data->CountOfferCategoryTreeCategoryId(
            $category_id
        );
    }
               
    public function CountOfferCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {       
        return $this->data->CountOfferCategoryTreeParentIdCategoryId(
            $parent_id
            , $category_id
        );
    }
               
    public function BrowseOfferCategoryTreeListFilter($filter_obj) {
        $result = new OfferCategoryTreeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferCategoryTreeListFilter(filter_obj);
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

    public function SetOfferCategoryTreeUuid($set_type, $obj) {           
        return $this->data->SetOfferCategoryTreeUuid($set_type, $obj);
    }
            
    public function DelOfferCategoryTreeUuid(
        $uuid
    ) {
        return $this->data->DelOfferCategoryTreeUuid(
            $uuid
        );
    }
        
    public function DelOfferCategoryTreeParentId(
        $parent_id
    ) {
        return $this->data->DelOfferCategoryTreeParentId(
            $parent_id
        );
    }
        
    public function DelOfferCategoryTreeCategoryId(
        $category_id
    ) {
        return $this->data->DelOfferCategoryTreeCategoryId(
            $category_id
        );
    }
        
    public function DelOfferCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->data->DelOfferCategoryTreeParentIdCategoryId(
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
        
    public function GetOfferCategoryTreeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListUuid(
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
        
    public function GetOfferCategoryTreeListParentId(
        $parent_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListParentId(
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
        
    public function GetOfferCategoryTreeListCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListCategoryId(
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
        
    public function GetOfferCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryTreeListParentIdCategoryId(
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
               
    public function CountOfferCategoryAssocUuid(
        $uuid
    ) {       
        return $this->data->CountOfferCategoryAssocUuid(
            $uuid
        );
    }
               
    public function CountOfferCategoryAssocOfferId(
        $offer_id
    ) {       
        return $this->data->CountOfferCategoryAssocOfferId(
            $offer_id
        );
    }
               
    public function CountOfferCategoryAssocCategoryId(
        $category_id
    ) {       
        return $this->data->CountOfferCategoryAssocCategoryId(
            $category_id
        );
    }
               
    public function CountOfferCategoryAssocOfferIdCategoryId(
        $offer_id
        , $category_id
    ) {       
        return $this->data->CountOfferCategoryAssocOfferIdCategoryId(
            $offer_id
            , $category_id
        );
    }
               
    public function BrowseOfferCategoryAssocListFilter($filter_obj) {
        $result = new OfferCategoryAssocResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferCategoryAssocListFilter(filter_obj);
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

    public function SetOfferCategoryAssocUuid($set_type, $obj) {           
        return $this->data->SetOfferCategoryAssocUuid($set_type, $obj);
    }
            
    public function DelOfferCategoryAssocUuid(
        $uuid
    ) {
        return $this->data->DelOfferCategoryAssocUuid(
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
        
    public function GetOfferCategoryAssocListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListUuid(
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
        
    public function GetOfferCategoryAssocListOfferId(
        $offer_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListOfferId(
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
        
    public function GetOfferCategoryAssocListCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListCategoryId(
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
        
    public function GetOfferCategoryAssocListOfferIdCategoryId(
        $offer_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferCategoryAssocListOfferIdCategoryId(
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

        return $obj;
    }
        
    public function CountOfferGameLocation(
    ) {       
        return $this->data->CountOfferGameLocation(
        );
    }
               
    public function CountOfferGameLocationUuid(
        $uuid
    ) {       
        return $this->data->CountOfferGameLocationUuid(
            $uuid
        );
    }
               
    public function CountOfferGameLocationGameLocationId(
        $game_location_id
    ) {       
        return $this->data->CountOfferGameLocationGameLocationId(
            $game_location_id
        );
    }
               
    public function CountOfferGameLocationOfferId(
        $offer_id
    ) {       
        return $this->data->CountOfferGameLocationOfferId(
            $offer_id
        );
    }
               
    public function CountOfferGameLocationOfferIdGameLocationId(
        $offer_id
        , $game_location_id
    ) {       
        return $this->data->CountOfferGameLocationOfferIdGameLocationId(
            $offer_id
            , $game_location_id
        );
    }
               
    public function BrowseOfferGameLocationListFilter($filter_obj) {
        $result = new OfferGameLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOfferGameLocationListFilter(filter_obj);
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

    public function SetOfferGameLocationUuid($set_type, $obj) {           
        return $this->data->SetOfferGameLocationUuid($set_type, $obj);
    }
            
    public function DelOfferGameLocationUuid(
        $uuid
    ) {
        return $this->data->DelOfferGameLocationUuid(
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
        
    public function GetOfferGameLocationListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListUuid(
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
        
    public function GetOfferGameLocationListGameLocationId(
        $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListGameLocationId(
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
        
    public function GetOfferGameLocationListOfferId(
        $offer_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListOfferId(
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
        
    public function GetOfferGameLocationListOfferIdGameLocationId(
        $offer_id
        , $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetOfferGameLocationListOfferIdGameLocationId(
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
               
    public function CountEventInfoUuid(
        $uuid
    ) {       
        return $this->data->CountEventInfoUuid(
            $uuid
        );
    }
               
    public function CountEventInfoCode(
        $code
    ) {       
        return $this->data->CountEventInfoCode(
            $code
        );
    }
               
    public function CountEventInfoName(
        $name
    ) {       
        return $this->data->CountEventInfoName(
            $name
        );
    }
               
    public function CountEventInfoOrgId(
        $org_id
    ) {       
        return $this->data->CountEventInfoOrgId(
            $org_id
        );
    }
               
    public function BrowseEventInfoListFilter($filter_obj) {
        $result = new EventInfoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventInfoListFilter(filter_obj);
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

    public function SetEventInfoUuid($set_type, $obj) {           
        return $this->data->SetEventInfoUuid($set_type, $obj);
    }
            
    public function DelEventInfoUuid(
        $uuid
    ) {
        return $this->data->DelEventInfoUuid(
            $uuid
        );
    }
        
    public function DelEventInfoOrgId(
        $org_id
    ) {
        return $this->data->DelEventInfoOrgId(
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
        
    public function GetEventInfoListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListUuid(
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
        
    public function GetEventInfoListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListCode(
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
        
    public function GetEventInfoListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListName(
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
        
    public function GetEventInfoListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetEventInfoListOrgId(
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
               
    public function CountEventLocationUuid(
        $uuid
    ) {       
        return $this->data->CountEventLocationUuid(
            $uuid
        );
    }
               
    public function CountEventLocationEventId(
        $event_id
    ) {       
        return $this->data->CountEventLocationEventId(
            $event_id
        );
    }
               
    public function CountEventLocationCity(
        $city
    ) {       
        return $this->data->CountEventLocationCity(
            $city
        );
    }
               
    public function CountEventLocationCountryCode(
        $country_code
    ) {       
        return $this->data->CountEventLocationCountryCode(
            $country_code
        );
    }
               
    public function CountEventLocationPostalCode(
        $postal_code
    ) {       
        return $this->data->CountEventLocationPostalCode(
            $postal_code
        );
    }
               
    public function BrowseEventLocationListFilter($filter_obj) {
        $result = new EventLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventLocationListFilter(filter_obj);
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

    public function SetEventLocationUuid($set_type, $obj) {           
        return $this->data->SetEventLocationUuid($set_type, $obj);
    }
            
    public function DelEventLocationUuid(
        $uuid
    ) {
        return $this->data->DelEventLocationUuid(
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
        
    public function GetEventLocationListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListUuid(
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
        
    public function GetEventLocationListEventId(
        $event_id
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListEventId(
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
        
    public function GetEventLocationListCity(
        $city
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListCity(
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
        
    public function GetEventLocationListCountryCode(
        $country_code
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListCountryCode(
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
        
    public function GetEventLocationListPostalCode(
        $postal_code
    ) {

        $results = array();
        $rows = $this->data->GetEventLocationListPostalCode(
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
               
    public function CountEventCategoryUuid(
        $uuid
    ) {       
        return $this->data->CountEventCategoryUuid(
            $uuid
        );
    }
               
    public function CountEventCategoryCode(
        $code
    ) {       
        return $this->data->CountEventCategoryCode(
            $code
        );
    }
               
    public function CountEventCategoryName(
        $name
    ) {       
        return $this->data->CountEventCategoryName(
            $name
        );
    }
               
    public function CountEventCategoryOrgId(
        $org_id
    ) {       
        return $this->data->CountEventCategoryOrgId(
            $org_id
        );
    }
               
    public function CountEventCategoryTypeId(
        $type_id
    ) {       
        return $this->data->CountEventCategoryTypeId(
            $type_id
        );
    }
               
    public function CountEventCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountEventCategoryOrgIdTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseEventCategoryListFilter($filter_obj) {
        $result = new EventCategoryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventCategoryListFilter(filter_obj);
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

    public function SetEventCategoryUuid($set_type, $obj) {           
        return $this->data->SetEventCategoryUuid($set_type, $obj);
    }
            
    public function DelEventCategoryUuid(
        $uuid
    ) {
        return $this->data->DelEventCategoryUuid(
            $uuid
        );
    }
        
    public function DelEventCategoryCodeOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelEventCategoryCodeOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelEventCategoryCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelEventCategoryCodeOrgIdTypeId(
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
        
    public function GetEventCategoryListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListUuid(
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
        
    public function GetEventCategoryListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListCode(
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
        
    public function GetEventCategoryListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListName(
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
        
    public function GetEventCategoryListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListOrgId(
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
        
    public function GetEventCategoryListTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListTypeId(
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
        
    public function GetEventCategoryListOrgIdTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryListOrgIdTypeId(
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
               
    public function CountEventCategoryTreeUuid(
        $uuid
    ) {       
        return $this->data->CountEventCategoryTreeUuid(
            $uuid
        );
    }
               
    public function CountEventCategoryTreeParentId(
        $parent_id
    ) {       
        return $this->data->CountEventCategoryTreeParentId(
            $parent_id
        );
    }
               
    public function CountEventCategoryTreeCategoryId(
        $category_id
    ) {       
        return $this->data->CountEventCategoryTreeCategoryId(
            $category_id
        );
    }
               
    public function CountEventCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {       
        return $this->data->CountEventCategoryTreeParentIdCategoryId(
            $parent_id
            , $category_id
        );
    }
               
    public function BrowseEventCategoryTreeListFilter($filter_obj) {
        $result = new EventCategoryTreeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventCategoryTreeListFilter(filter_obj);
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

    public function SetEventCategoryTreeUuid($set_type, $obj) {           
        return $this->data->SetEventCategoryTreeUuid($set_type, $obj);
    }
            
    public function DelEventCategoryTreeUuid(
        $uuid
    ) {
        return $this->data->DelEventCategoryTreeUuid(
            $uuid
        );
    }
        
    public function DelEventCategoryTreeParentId(
        $parent_id
    ) {
        return $this->data->DelEventCategoryTreeParentId(
            $parent_id
        );
    }
        
    public function DelEventCategoryTreeCategoryId(
        $category_id
    ) {
        return $this->data->DelEventCategoryTreeCategoryId(
            $category_id
        );
    }
        
    public function DelEventCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->data->DelEventCategoryTreeParentIdCategoryId(
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
        
    public function GetEventCategoryTreeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListUuid(
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
        
    public function GetEventCategoryTreeListParentId(
        $parent_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListParentId(
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
        
    public function GetEventCategoryTreeListCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListCategoryId(
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
        
    public function GetEventCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryTreeListParentIdCategoryId(
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
               
    public function CountEventCategoryAssocUuid(
        $uuid
    ) {       
        return $this->data->CountEventCategoryAssocUuid(
            $uuid
        );
    }
               
    public function CountEventCategoryAssocEventId(
        $event_id
    ) {       
        return $this->data->CountEventCategoryAssocEventId(
            $event_id
        );
    }
               
    public function CountEventCategoryAssocCategoryId(
        $category_id
    ) {       
        return $this->data->CountEventCategoryAssocCategoryId(
            $category_id
        );
    }
               
    public function CountEventCategoryAssocEventIdCategoryId(
        $event_id
        , $category_id
    ) {       
        return $this->data->CountEventCategoryAssocEventIdCategoryId(
            $event_id
            , $category_id
        );
    }
               
    public function BrowseEventCategoryAssocListFilter($filter_obj) {
        $result = new EventCategoryAssocResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseEventCategoryAssocListFilter(filter_obj);
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

    public function SetEventCategoryAssocUuid($set_type, $obj) {           
        return $this->data->SetEventCategoryAssocUuid($set_type, $obj);
    }
            
    public function DelEventCategoryAssocUuid(
        $uuid
    ) {
        return $this->data->DelEventCategoryAssocUuid(
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
        
    public function GetEventCategoryAssocListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListUuid(
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
        
    public function GetEventCategoryAssocListEventId(
        $event_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListEventId(
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
        
    public function GetEventCategoryAssocListCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListCategoryId(
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
        
    public function GetEventCategoryAssocListEventIdCategoryId(
        $event_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetEventCategoryAssocListEventIdCategoryId(
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
               
    public function CountChannelUuid(
        $uuid
    ) {       
        return $this->data->CountChannelUuid(
            $uuid
        );
    }
               
    public function CountChannelCode(
        $code
    ) {       
        return $this->data->CountChannelCode(
            $code
        );
    }
               
    public function CountChannelName(
        $name
    ) {       
        return $this->data->CountChannelName(
            $name
        );
    }
               
    public function CountChannelOrgId(
        $org_id
    ) {       
        return $this->data->CountChannelOrgId(
            $org_id
        );
    }
               
    public function CountChannelTypeId(
        $type_id
    ) {       
        return $this->data->CountChannelTypeId(
            $type_id
        );
    }
               
    public function CountChannelOrgIdTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountChannelOrgIdTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseChannelListFilter($filter_obj) {
        $result = new ChannelResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseChannelListFilter(filter_obj);
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

    public function SetChannelUuid($set_type, $obj) {           
        return $this->data->SetChannelUuid($set_type, $obj);
    }
            
    public function DelChannelUuid(
        $uuid
    ) {
        return $this->data->DelChannelUuid(
            $uuid
        );
    }
        
    public function DelChannelCodeOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelChannelCodeOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelChannelCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelChannelCodeOrgIdTypeId(
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
        
    public function GetChannelListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetChannelListUuid(
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
        
    public function GetChannelListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetChannelListCode(
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
        
    public function GetChannelListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetChannelListName(
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
        
    public function GetChannelListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetChannelListOrgId(
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
        
    public function GetChannelListTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetChannelListTypeId(
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
        
    public function GetChannelListOrgIdTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetChannelListOrgIdTypeId(
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
               
    public function CountChannelTypeUuid(
        $uuid
    ) {       
        return $this->data->CountChannelTypeUuid(
            $uuid
        );
    }
               
    public function CountChannelTypeCode(
        $code
    ) {       
        return $this->data->CountChannelTypeCode(
            $code
        );
    }
               
    public function CountChannelTypeName(
        $name
    ) {       
        return $this->data->CountChannelTypeName(
            $name
        );
    }
               
    public function BrowseChannelTypeListFilter($filter_obj) {
        $result = new ChannelTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseChannelTypeListFilter(filter_obj);
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

    public function SetChannelTypeUuid($set_type, $obj) {           
        return $this->data->SetChannelTypeUuid($set_type, $obj);
    }
            
    public function DelChannelTypeUuid(
        $uuid
    ) {
        return $this->data->DelChannelTypeUuid(
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
        
    public function GetChannelTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetChannelTypeListUuid(
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
        
    public function GetChannelTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetChannelTypeListCode(
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
        
    public function GetChannelTypeListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetChannelTypeListName(
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
               
    public function CountQuestionUuid(
        $uuid
    ) {       
        return $this->data->CountQuestionUuid(
            $uuid
        );
    }
               
    public function CountQuestionCode(
        $code
    ) {       
        return $this->data->CountQuestionCode(
            $code
        );
    }
               
    public function CountQuestionName(
        $name
    ) {       
        return $this->data->CountQuestionName(
            $name
        );
    }
               
    public function CountQuestionChannelId(
        $channel_id
    ) {       
        return $this->data->CountQuestionChannelId(
            $channel_id
        );
    }
               
    public function CountQuestionOrgId(
        $org_id
    ) {       
        return $this->data->CountQuestionOrgId(
            $org_id
        );
    }
               
    public function CountQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {       
        return $this->data->CountQuestionChannelIdOrgId(
            $channel_id
            , $org_id
        );
    }
               
    public function CountQuestionChannelIdCode(
        $channel_id
        , $code
    ) {       
        return $this->data->CountQuestionChannelIdCode(
            $channel_id
            , $code
        );
    }
               
    public function BrowseQuestionListFilter($filter_obj) {
        $result = new QuestionResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseQuestionListFilter(filter_obj);
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

    public function SetQuestionUuid($set_type, $obj) {           
        return $this->data->SetQuestionUuid($set_type, $obj);
    }
            
    public function SetQuestionChannelIdCode($set_type, $obj) {           
        return $this->data->SetQuestionChannelIdCode($set_type, $obj);
    }
            
    public function DelQuestionUuid(
        $uuid
    ) {
        return $this->data->DelQuestionUuid(
            $uuid
        );
    }
        
    public function DelQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->data->DelQuestionChannelIdOrgId(
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
        
    public function GetQuestionListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListUuid(
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
        
    public function GetQuestionListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListCode(
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
        
    public function GetQuestionListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListName(
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
        
    public function GetQuestionListType(
        $type
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListType(
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
        
    public function GetQuestionListChannelId(
        $channel_id
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListChannelId(
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
        
    public function GetQuestionListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListOrgId(
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
        
    public function GetQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListChannelIdOrgId(
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
        
    public function GetQuestionListChannelIdCode(
        $channel_id
        , $code
    ) {

        $results = array();
        $rows = $this->data->GetQuestionListChannelIdCode(
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
               
    public function CountProfileOfferUuid(
        $uuid
    ) {       
        return $this->data->CountProfileOfferUuid(
            $uuid
        );
    }
               
    public function CountProfileOfferProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileOfferProfileId(
            $profile_id
        );
    }
               
    public function BrowseProfileOfferListFilter($filter_obj) {
        $result = new ProfileOfferResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileOfferListFilter(filter_obj);
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

    public function SetProfileOfferUuid($set_type, $obj) {           
        return $this->data->SetProfileOfferUuid($set_type, $obj);
    }
            
    public function DelProfileOfferUuid(
        $uuid
    ) {
        return $this->data->DelProfileOfferUuid(
            $uuid
        );
    }
        
    public function DelProfileOfferProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileOfferProfileId(
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
        
    public function GetProfileOfferListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileOfferListUuid(
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
        
    public function GetProfileOfferListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileOfferListProfileId(
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

        return $obj;
    }
        
    public function CountProfileApp(
    ) {       
        return $this->data->CountProfileApp(
        );
    }
               
    public function CountProfileAppUuid(
        $uuid
    ) {       
        return $this->data->CountProfileAppUuid(
            $uuid
        );
    }
               
    public function CountProfileAppProfileIdAppId(
        $profile_id
        , $app_id
    ) {       
        return $this->data->CountProfileAppProfileIdAppId(
            $profile_id
            , $app_id
        );
    }
               
    public function BrowseProfileAppListFilter($filter_obj) {
        $result = new ProfileAppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileAppListFilter(filter_obj);
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

    public function SetProfileAppUuid($set_type, $obj) {           
        return $this->data->SetProfileAppUuid($set_type, $obj);
    }
            
    public function SetProfileAppProfileIdAppId($set_type, $obj) {           
        return $this->data->SetProfileAppProfileIdAppId($set_type, $obj);
    }
            
    public function DelProfileAppUuid(
        $uuid
    ) {
        return $this->data->DelProfileAppUuid(
            $uuid
        );
    }
        
    public function DelProfileAppProfileIdAppId(
        $profile_id
        , $app_id
    ) {
        return $this->data->DelProfileAppProfileIdAppId(
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
        
    public function GetProfileAppListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListUuid(
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
        
    public function GetProfileAppListAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListAppId(
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
        
    public function GetProfileAppListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListProfileId(
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
        
    public function GetProfileAppListProfileIdAppId(
        $profile_id
        , $app_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileAppListProfileIdAppId(
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

        return $obj;
    }
        
    public function CountProfileOrg(
    ) {       
        return $this->data->CountProfileOrg(
        );
    }
               
    public function CountProfileOrgUuid(
        $uuid
    ) {       
        return $this->data->CountProfileOrgUuid(
            $uuid
        );
    }
               
    public function CountProfileOrgOrgId(
        $org_id
    ) {       
        return $this->data->CountProfileOrgOrgId(
            $org_id
        );
    }
               
    public function CountProfileOrgProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileOrgProfileId(
            $profile_id
        );
    }
               
    public function BrowseProfileOrgListFilter($filter_obj) {
        $result = new ProfileOrgResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileOrgListFilter(filter_obj);
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

    public function SetProfileOrgUuid($set_type, $obj) {           
        return $this->data->SetProfileOrgUuid($set_type, $obj);
    }
            
    public function DelProfileOrgUuid(
        $uuid
    ) {
        return $this->data->DelProfileOrgUuid(
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
        
    public function GetProfileOrgListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileOrgListUuid(
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
        
    public function GetProfileOrgListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileOrgListOrgId(
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
        
    public function GetProfileOrgListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileOrgListProfileId(
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
               
    public function CountProfileQuestionUuid(
        $uuid
    ) {       
        return $this->data->CountProfileQuestionUuid(
            $uuid
        );
    }
               
    public function CountProfileQuestionChannelId(
        $channel_id
    ) {       
        return $this->data->CountProfileQuestionChannelId(
            $channel_id
        );
    }
               
    public function CountProfileQuestionOrgId(
        $org_id
    ) {       
        return $this->data->CountProfileQuestionOrgId(
            $org_id
        );
    }
               
    public function CountProfileQuestionProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileQuestionProfileId(
            $profile_id
        );
    }
               
    public function CountProfileQuestionQuestionId(
        $question_id
    ) {       
        return $this->data->CountProfileQuestionQuestionId(
            $question_id
        );
    }
               
    public function CountProfileQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {       
        return $this->data->CountProfileQuestionChannelIdOrgId(
            $channel_id
            , $org_id
        );
    }
               
    public function CountProfileQuestionChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {       
        return $this->data->CountProfileQuestionChannelIdProfileId(
            $channel_id
            , $profile_id
        );
    }
               
    public function CountProfileQuestionQuestionIdProfileId(
        $question_id
        , $profile_id
    ) {       
        return $this->data->CountProfileQuestionQuestionIdProfileId(
            $question_id
            , $profile_id
        );
    }
               
    public function BrowseProfileQuestionListFilter($filter_obj) {
        $result = new ProfileQuestionResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileQuestionListFilter(filter_obj);
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

    public function SetProfileQuestionUuid($set_type, $obj) {           
        return $this->data->SetProfileQuestionUuid($set_type, $obj);
    }
            
    public function SetProfileQuestionChannelIdProfileId($set_type, $obj) {           
        return $this->data->SetProfileQuestionChannelIdProfileId($set_type, $obj);
    }
            
    public function SetProfileQuestionQuestionIdProfileId($set_type, $obj) {           
        return $this->data->SetProfileQuestionQuestionIdProfileId($set_type, $obj);
    }
            
    public function SetProfileQuestionChannelIdQuestionIdProfileId($set_type, $obj) {           
        return $this->data->SetProfileQuestionChannelIdQuestionIdProfileId($set_type, $obj);
    }
            
    public function DelProfileQuestionUuid(
        $uuid
    ) {
        return $this->data->DelProfileQuestionUuid(
            $uuid
        );
    }
        
    public function DelProfileQuestionChannelIdOrgId(
        $channel_id
        , $org_id
    ) {
        return $this->data->DelProfileQuestionChannelIdOrgId(
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
        
    public function GetProfileQuestionListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListUuid(
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
        
    public function GetProfileQuestionListChannelId(
        $channel_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListChannelId(
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
        
    public function GetProfileQuestionListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListOrgId(
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
        
    public function GetProfileQuestionListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListProfileId(
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
        
    public function GetProfileQuestionListQuestionId(
        $question_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListQuestionId(
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
        
    public function GetProfileQuestionListChannelIdOrgId(
        $channel_id
        , $org_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListChannelIdOrgId(
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
        
    public function GetProfileQuestionListChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListChannelIdProfileId(
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
        
    public function GetProfileQuestionListQuestionIdProfileId(
        $question_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileQuestionListQuestionIdProfileId(
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
               
    public function CountProfileChannelUuid(
        $uuid
    ) {       
        return $this->data->CountProfileChannelUuid(
            $uuid
        );
    }
               
    public function CountProfileChannelChannelId(
        $channel_id
    ) {       
        return $this->data->CountProfileChannelChannelId(
            $channel_id
        );
    }
               
    public function CountProfileChannelProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileChannelProfileId(
            $profile_id
        );
    }
               
    public function CountProfileChannelChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {       
        return $this->data->CountProfileChannelChannelIdProfileId(
            $channel_id
            , $profile_id
        );
    }
               
    public function BrowseProfileChannelListFilter($filter_obj) {
        $result = new ProfileChannelResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileChannelListFilter(filter_obj);
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

    public function SetProfileChannelUuid($set_type, $obj) {           
        return $this->data->SetProfileChannelUuid($set_type, $obj);
    }
            
    public function SetProfileChannelChannelIdProfileId($set_type, $obj) {           
        return $this->data->SetProfileChannelChannelIdProfileId($set_type, $obj);
    }
            
    public function DelProfileChannelUuid(
        $uuid
    ) {
        return $this->data->DelProfileChannelUuid(
            $uuid
        );
    }
        
    public function DelProfileChannelChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {
        return $this->data->DelProfileChannelChannelIdProfileId(
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
        
    public function GetProfileChannelListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListUuid(
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
        
    public function GetProfileChannelListChannelId(
        $channel_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListChannelId(
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
        
    public function GetProfileChannelListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListProfileId(
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
        
    public function GetProfileChannelListChannelIdProfileId(
        $channel_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileChannelListChannelIdProfileId(
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
               
    public function CountOrgSiteUuid(
        $uuid
    ) {       
        return $this->data->CountOrgSiteUuid(
            $uuid
        );
    }
               
    public function CountOrgSiteOrgId(
        $org_id
    ) {       
        return $this->data->CountOrgSiteOrgId(
            $org_id
        );
    }
               
    public function CountOrgSiteSiteId(
        $site_id
    ) {       
        return $this->data->CountOrgSiteSiteId(
            $site_id
        );
    }
               
    public function CountOrgSiteOrgIdSiteId(
        $org_id
        , $site_id
    ) {       
        return $this->data->CountOrgSiteOrgIdSiteId(
            $org_id
            , $site_id
        );
    }
               
    public function BrowseOrgSiteListFilter($filter_obj) {
        $result = new OrgSiteResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseOrgSiteListFilter(filter_obj);
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

    public function SetOrgSiteUuid($set_type, $obj) {           
        return $this->data->SetOrgSiteUuid($set_type, $obj);
    }
            
    public function SetOrgSiteOrgIdSiteId($set_type, $obj) {           
        return $this->data->SetOrgSiteOrgIdSiteId($set_type, $obj);
    }
            
    public function DelOrgSiteUuid(
        $uuid
    ) {
        return $this->data->DelOrgSiteUuid(
            $uuid
        );
    }
        
    public function DelOrgSiteOrgIdSiteId(
        $org_id
        , $site_id
    ) {
        return $this->data->DelOrgSiteOrgIdSiteId(
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
        
    public function GetOrgSiteListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListUuid(
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
        
    public function GetOrgSiteListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListOrgId(
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
        
    public function GetOrgSiteListSiteId(
        $site_id
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListSiteId(
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
        
    public function GetOrgSiteListOrgIdSiteId(
        $org_id
        , $site_id
    ) {

        $results = array();
        $rows = $this->data->GetOrgSiteListOrgIdSiteId(
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
               
    public function CountSiteAppUuid(
        $uuid
    ) {       
        return $this->data->CountSiteAppUuid(
            $uuid
        );
    }
               
    public function CountSiteAppAppId(
        $app_id
    ) {       
        return $this->data->CountSiteAppAppId(
            $app_id
        );
    }
               
    public function CountSiteAppSiteId(
        $site_id
    ) {       
        return $this->data->CountSiteAppSiteId(
            $site_id
        );
    }
               
    public function CountSiteAppAppIdSiteId(
        $app_id
        , $site_id
    ) {       
        return $this->data->CountSiteAppAppIdSiteId(
            $app_id
            , $site_id
        );
    }
               
    public function BrowseSiteAppListFilter($filter_obj) {
        $result = new SiteAppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseSiteAppListFilter(filter_obj);
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

    public function SetSiteAppUuid($set_type, $obj) {           
        return $this->data->SetSiteAppUuid($set_type, $obj);
    }
            
    public function SetSiteAppAppIdSiteId($set_type, $obj) {           
        return $this->data->SetSiteAppAppIdSiteId($set_type, $obj);
    }
            
    public function DelSiteAppUuid(
        $uuid
    ) {
        return $this->data->DelSiteAppUuid(
            $uuid
        );
    }
        
    public function DelSiteAppAppIdSiteId(
        $app_id
        , $site_id
    ) {
        return $this->data->DelSiteAppAppIdSiteId(
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
        
    public function GetSiteAppListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListUuid(
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
        
    public function GetSiteAppListAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListAppId(
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
        
    public function GetSiteAppListSiteId(
        $site_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListSiteId(
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
        
    public function GetSiteAppListAppIdSiteId(
        $app_id
        , $site_id
    ) {

        $results = array();
        $rows = $this->data->GetSiteAppListAppIdSiteId(
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
               
    public function CountPhotoUuid(
        $uuid
    ) {       
        return $this->data->CountPhotoUuid(
            $uuid
        );
    }
               
    public function CountPhotoExternalId(
        $external_id
    ) {       
        return $this->data->CountPhotoExternalId(
            $external_id
        );
    }
               
    public function CountPhotoUrl(
        $url
    ) {       
        return $this->data->CountPhotoUrl(
            $url
        );
    }
               
    public function CountPhotoUrlExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountPhotoUrlExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountPhotoUuidExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountPhotoUuidExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowsePhotoListFilter($filter_obj) {
        $result = new PhotoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowsePhotoListFilter(filter_obj);
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

    public function SetPhotoUuid($set_type, $obj) {           
        return $this->data->SetPhotoUuid($set_type, $obj);
    }
            
    public function SetPhotoExternalId($set_type, $obj) {           
        return $this->data->SetPhotoExternalId($set_type, $obj);
    }
            
    public function SetPhotoUrl($set_type, $obj) {           
        return $this->data->SetPhotoUrl($set_type, $obj);
    }
            
    public function SetPhotoUrlExternalId($set_type, $obj) {           
        return $this->data->SetPhotoUrlExternalId($set_type, $obj);
    }
            
    public function SetPhotoUuidExternalId($set_type, $obj) {           
        return $this->data->SetPhotoUuidExternalId($set_type, $obj);
    }
            
    public function DelPhotoUuid(
        $uuid
    ) {
        return $this->data->DelPhotoUuid(
            $uuid
        );
    }
        
    public function DelPhotoExternalId(
        $external_id
    ) {
        return $this->data->DelPhotoExternalId(
            $external_id
        );
    }
        
    public function DelPhotoUrl(
        $url
    ) {
        return $this->data->DelPhotoUrl(
            $url
        );
    }
        
    public function DelPhotoUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelPhotoUrlExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelPhotoUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelPhotoUuidExternalId(
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
        
    public function GetPhotoListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListUuid(
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
        
    public function GetPhotoListExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListExternalId(
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
        
    public function GetPhotoListUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListUrl(
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
        
    public function GetPhotoListUrlExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListUrlExternalId(
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
        
    public function GetPhotoListUuidExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetPhotoListUuidExternalId(
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
               
    public function CountVideoUuid(
        $uuid
    ) {       
        return $this->data->CountVideoUuid(
            $uuid
        );
    }
               
    public function CountVideoExternalId(
        $external_id
    ) {       
        return $this->data->CountVideoExternalId(
            $external_id
        );
    }
               
    public function CountVideoUrl(
        $url
    ) {       
        return $this->data->CountVideoUrl(
            $url
        );
    }
               
    public function CountVideoUrlExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountVideoUrlExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountVideoUuidExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountVideoUuidExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowseVideoListFilter($filter_obj) {
        $result = new VideoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseVideoListFilter(filter_obj);
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

    public function SetVideoUuid($set_type, $obj) {           
        return $this->data->SetVideoUuid($set_type, $obj);
    }
            
    public function SetVideoExternalId($set_type, $obj) {           
        return $this->data->SetVideoExternalId($set_type, $obj);
    }
            
    public function SetVideoUrl($set_type, $obj) {           
        return $this->data->SetVideoUrl($set_type, $obj);
    }
            
    public function SetVideoUrlExternalId($set_type, $obj) {           
        return $this->data->SetVideoUrlExternalId($set_type, $obj);
    }
            
    public function SetVideoUuidExternalId($set_type, $obj) {           
        return $this->data->SetVideoUuidExternalId($set_type, $obj);
    }
            
    public function DelVideoUuid(
        $uuid
    ) {
        return $this->data->DelVideoUuid(
            $uuid
        );
    }
        
    public function DelVideoExternalId(
        $external_id
    ) {
        return $this->data->DelVideoExternalId(
            $external_id
        );
    }
        
    public function DelVideoUrl(
        $url
    ) {
        return $this->data->DelVideoUrl(
            $url
        );
    }
        
    public function DelVideoUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelVideoUrlExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelVideoUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelVideoUuidExternalId(
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
        
    public function GetVideoListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetVideoListUuid(
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
        
    public function GetVideoListExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetVideoListExternalId(
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
        
    public function GetVideoListUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetVideoListUrl(
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
        
    public function GetVideoListUrlExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetVideoListUrlExternalId(
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
        
    public function GetVideoListUuidExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetVideoListUuidExternalId(
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