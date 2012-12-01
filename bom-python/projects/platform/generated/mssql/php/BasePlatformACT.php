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
require_once('ent/Game.php');
require_once('ent/GameCategory.php');
require_once('ent/GameCategoryTree.php');
require_once('ent/GameCategoryAssoc.php');
require_once('ent/GameType.php');
require_once('ent/ProfileGame.php');
require_once('ent/ProfileGameNetwork.php');
require_once('ent/ProfileGameDataAttribute.php');
require_once('ent/GameSession.php');
require_once('ent/GameSessionData.php');
require_once('ent/GameContent.php');
require_once('ent/GameProfileContent.php');
require_once('ent/GameApp.php');
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
require_once('ent/ProfileGameLocation.php');
require_once('ent/ProfileQuestion.php');
require_once('ent/ProfileChannel.php');
require_once('ent/OrgSite.php');
require_once('ent/SiteApp.php');
require_once('ent/Photo.php');
require_once('ent/Video.php');
require_once('ent/GameRpgItemWeapon.php');
require_once('ent/GameRpgItemSkill.php');
require_once('ent/GameProduct.php');
require_once('ent/GameStatisticLeaderboard.php');
require_once('ent/GameLiveQueue.php');
require_once('ent/GameLiveRecentQueue.php');
require_once('ent/GameStatistic.php');
require_once('ent/GameStatisticMeta.php');
require_once('ent/GameStatisticTimestamp.php');
require_once('ent/GameKeyMeta.php');
require_once('ent/GameLevel.php');
require_once('ent/GameAchievement.php');
require_once('ent/GameAchievementMeta.php');

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
        
        
    public function FillGame($row) {
        $obj = new Game();

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
        if ($row['app_id'] != NULL) {                
            $obj->app_id = $row['app_id'];#dataType.FillDataString(dr, "app_id");
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
        
    public function CountGame(
    ) {       
        return $this->data->CountGame(
        );
    }
               
    public function CountGameByUuid(
        $uuid
    ) {       
        return $this->data->CountGameByUuid(
            $uuid
        );
    }
               
    public function CountGameByCode(
        $code
    ) {       
        return $this->data->CountGameByCode(
            $code
        );
    }
               
    public function CountGameByName(
        $name
    ) {       
        return $this->data->CountGameByName(
            $name
        );
    }
               
    public function CountGameByOrgId(
        $org_id
    ) {       
        return $this->data->CountGameByOrgId(
            $org_id
        );
    }
               
    public function CountGameByAppId(
        $app_id
    ) {       
        return $this->data->CountGameByAppId(
            $app_id
        );
    }
               
    public function CountGameByOrgIdByAppId(
        $org_id
        , $app_id
    ) {       
        return $this->data->CountGameByOrgIdByAppId(
            $org_id
            , $app_id
        );
    }
               
    public function BrowseGameListByFilter($filter_obj) {
        $result = new GameResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game = $this->FillGame($row);
                $result->data[] = $game;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameByUuid($set_type, $obj) {           
        return $this->data->SetGameByUuid($set_type, $obj);
    }
            
    public function SetGameByCode($set_type, $obj) {           
        return $this->data->SetGameByCode($set_type, $obj);
    }
            
    public function SetGameByName($set_type, $obj) {           
        return $this->data->SetGameByName($set_type, $obj);
    }
            
    public function SetGameByOrgId($set_type, $obj) {           
        return $this->data->SetGameByOrgId($set_type, $obj);
    }
            
    public function SetGameByAppId($set_type, $obj) {           
        return $this->data->SetGameByAppId($set_type, $obj);
    }
            
    public function SetGameByOrgIdByAppId($set_type, $obj) {           
        return $this->data->SetGameByOrgIdByAppId($set_type, $obj);
    }
            
    public function DelGameByUuid(
        $uuid
    ) {
        return $this->data->DelGameByUuid(
            $uuid
        );
    }
        
    public function DelGameByCode(
        $code
    ) {
        return $this->data->DelGameByCode(
            $code
        );
    }
        
    public function DelGameByName(
        $name
    ) {
        return $this->data->DelGameByName(
            $name
        );
    }
        
    public function DelGameByOrgId(
        $org_id
    ) {
        return $this->data->DelGameByOrgId(
            $org_id
        );
    }
        
    public function DelGameByAppId(
        $app_id
    ) {
        return $this->data->DelGameByAppId(
            $app_id
        );
    }
        
    public function DelGameByOrgIdByAppId(
        $org_id
        , $app_id
    ) {
        return $this->data->DelGameByOrgIdByAppId(
            $org_id
            , $app_id
        );
    }
        
    public function GetGameList(
    ) {

        $results = array();
        $rows = $this->data->GetGameList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game  = $this->FillGame($row);
                $results[] = $game;
            }
        }
        
        return $results;
    }
        
    public function GetGameListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game  = $this->FillGame($row);
                $results[] = $game;
            }
        }
        
        return $results;
    }
        
    public function GetGameListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game  = $this->FillGame($row);
                $results[] = $game;
            }
        }
        
        return $results;
    }
        
    public function GetGameListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game  = $this->FillGame($row);
                $results[] = $game;
            }
        }
        
        return $results;
    }
        
    public function GetGameListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetGameListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game  = $this->FillGame($row);
                $results[] = $game;
            }
        }
        
        return $results;
    }
        
    public function GetGameListByAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameListByAppId(
            $app_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game  = $this->FillGame($row);
                $results[] = $game;
            }
        }
        
        return $results;
    }
        
    public function GetGameListByOrgIdByAppId(
        $org_id
        , $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameListByOrgIdByAppId(
            $org_id
            , $app_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game  = $this->FillGame($row);
                $results[] = $game;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameCategory($row) {
        $obj = new GameCategory();

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
        
    public function CountGameCategory(
    ) {       
        return $this->data->CountGameCategory(
        );
    }
               
    public function CountGameCategoryByUuid(
        $uuid
    ) {       
        return $this->data->CountGameCategoryByUuid(
            $uuid
        );
    }
               
    public function CountGameCategoryByCode(
        $code
    ) {       
        return $this->data->CountGameCategoryByCode(
            $code
        );
    }
               
    public function CountGameCategoryByName(
        $name
    ) {       
        return $this->data->CountGameCategoryByName(
            $name
        );
    }
               
    public function CountGameCategoryByOrgId(
        $org_id
    ) {       
        return $this->data->CountGameCategoryByOrgId(
            $org_id
        );
    }
               
    public function CountGameCategoryByTypeId(
        $type_id
    ) {       
        return $this->data->CountGameCategoryByTypeId(
            $type_id
        );
    }
               
    public function CountGameCategoryByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountGameCategoryByOrgIdByTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseGameCategoryListByFilter($filter_obj) {
        $result = new GameCategoryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameCategoryListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_category = $this->FillGameCategory($row);
                $result->data[] = $game_category;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameCategoryByUuid($set_type, $obj) {           
        return $this->data->SetGameCategoryByUuid($set_type, $obj);
    }
            
    public function DelGameCategoryByUuid(
        $uuid
    ) {
        return $this->data->DelGameCategoryByUuid(
            $uuid
        );
    }
        
    public function DelGameCategoryByCodeByOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelGameCategoryByCodeByOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelGameCategoryByCodeByOrgIdByTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelGameCategoryByCodeByOrgIdByTypeId(
            $code
            , $org_id
            , $type_id
        );
    }
        
    public function GetGameCategoryList(
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category  = $this->FillGameCategory($row);
                $results[] = $game_category;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category  = $this->FillGameCategory($row);
                $results[] = $game_category;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category  = $this->FillGameCategory($row);
                $results[] = $game_category;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category  = $this->FillGameCategory($row);
                $results[] = $game_category;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryListByOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListByOrgId(
            $org_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category  = $this->FillGameCategory($row);
                $results[] = $game_category;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryListByTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListByTypeId(
            $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category  = $this->FillGameCategory($row);
                $results[] = $game_category;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryListByOrgIdByTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListByOrgIdByTypeId(
            $org_id
            , $type_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category  = $this->FillGameCategory($row);
                $results[] = $game_category;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameCategoryTree($row) {
        $obj = new GameCategoryTree();

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
        
    public function CountGameCategoryTree(
    ) {       
        return $this->data->CountGameCategoryTree(
        );
    }
               
    public function CountGameCategoryTreeByUuid(
        $uuid
    ) {       
        return $this->data->CountGameCategoryTreeByUuid(
            $uuid
        );
    }
               
    public function CountGameCategoryTreeByParentId(
        $parent_id
    ) {       
        return $this->data->CountGameCategoryTreeByParentId(
            $parent_id
        );
    }
               
    public function CountGameCategoryTreeByCategoryId(
        $category_id
    ) {       
        return $this->data->CountGameCategoryTreeByCategoryId(
            $category_id
        );
    }
               
    public function CountGameCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {       
        return $this->data->CountGameCategoryTreeByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
    }
               
    public function BrowseGameCategoryTreeListByFilter($filter_obj) {
        $result = new GameCategoryTreeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameCategoryTreeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_category_tree = $this->FillGameCategoryTree($row);
                $result->data[] = $game_category_tree;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameCategoryTreeByUuid($set_type, $obj) {           
        return $this->data->SetGameCategoryTreeByUuid($set_type, $obj);
    }
            
    public function DelGameCategoryTreeByUuid(
        $uuid
    ) {
        return $this->data->DelGameCategoryTreeByUuid(
            $uuid
        );
    }
        
    public function DelGameCategoryTreeByParentId(
        $parent_id
    ) {
        return $this->data->DelGameCategoryTreeByParentId(
            $parent_id
        );
    }
        
    public function DelGameCategoryTreeByCategoryId(
        $category_id
    ) {
        return $this->data->DelGameCategoryTreeByCategoryId(
            $category_id
        );
    }
        
    public function DelGameCategoryTreeByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->data->DelGameCategoryTreeByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
    }
        
    public function GetGameCategoryTreeList(
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_tree  = $this->FillGameCategoryTree($row);
                $results[] = $game_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryTreeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_tree  = $this->FillGameCategoryTree($row);
                $results[] = $game_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryTreeListByParentId(
        $parent_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListByParentId(
            $parent_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_tree  = $this->FillGameCategoryTree($row);
                $results[] = $game_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryTreeListByCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListByCategoryId(
            $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_tree  = $this->FillGameCategoryTree($row);
                $results[] = $game_category_tree;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryTreeListByParentIdByCategoryId(
        $parent_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListByParentIdByCategoryId(
            $parent_id
            , $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_tree  = $this->FillGameCategoryTree($row);
                $results[] = $game_category_tree;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameCategoryAssoc($row) {
        $obj = new GameCategoryAssoc();

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
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['category_id'] != NULL) {                
            $obj->category_id = $row['category_id'];#dataType.FillDataString(dr, "category_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountGameCategoryAssoc(
    ) {       
        return $this->data->CountGameCategoryAssoc(
        );
    }
               
    public function CountGameCategoryAssocByUuid(
        $uuid
    ) {       
        return $this->data->CountGameCategoryAssocByUuid(
            $uuid
        );
    }
               
    public function CountGameCategoryAssocByGameId(
        $game_id
    ) {       
        return $this->data->CountGameCategoryAssocByGameId(
            $game_id
        );
    }
               
    public function CountGameCategoryAssocByCategoryId(
        $category_id
    ) {       
        return $this->data->CountGameCategoryAssocByCategoryId(
            $category_id
        );
    }
               
    public function CountGameCategoryAssocByGameIdByCategoryId(
        $game_id
        , $category_id
    ) {       
        return $this->data->CountGameCategoryAssocByGameIdByCategoryId(
            $game_id
            , $category_id
        );
    }
               
    public function BrowseGameCategoryAssocListByFilter($filter_obj) {
        $result = new GameCategoryAssocResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameCategoryAssocListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_category_assoc = $this->FillGameCategoryAssoc($row);
                $result->data[] = $game_category_assoc;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameCategoryAssocByUuid($set_type, $obj) {           
        return $this->data->SetGameCategoryAssocByUuid($set_type, $obj);
    }
            
    public function DelGameCategoryAssocByUuid(
        $uuid
    ) {
        return $this->data->DelGameCategoryAssocByUuid(
            $uuid
        );
    }
        
    public function GetGameCategoryAssocList(
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_assoc  = $this->FillGameCategoryAssoc($row);
                $results[] = $game_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryAssocListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_assoc  = $this->FillGameCategoryAssoc($row);
                $results[] = $game_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryAssocListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_assoc  = $this->FillGameCategoryAssoc($row);
                $results[] = $game_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryAssocListByCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListByCategoryId(
            $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_assoc  = $this->FillGameCategoryAssoc($row);
                $results[] = $game_category_assoc;
            }
        }
        
        return $results;
    }
        
    public function GetGameCategoryAssocListByGameIdByCategoryId(
        $game_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListByGameIdByCategoryId(
            $game_id
            , $category_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_category_assoc  = $this->FillGameCategoryAssoc($row);
                $results[] = $game_category_assoc;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameType($row) {
        $obj = new GameType();

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
        
    public function CountGameType(
    ) {       
        return $this->data->CountGameType(
        );
    }
               
    public function CountGameTypeByUuid(
        $uuid
    ) {       
        return $this->data->CountGameTypeByUuid(
            $uuid
        );
    }
               
    public function CountGameTypeByCode(
        $code
    ) {       
        return $this->data->CountGameTypeByCode(
            $code
        );
    }
               
    public function CountGameTypeByName(
        $name
    ) {       
        return $this->data->CountGameTypeByName(
            $name
        );
    }
               
    public function BrowseGameTypeListByFilter($filter_obj) {
        $result = new GameTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameTypeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_type = $this->FillGameType($row);
                $result->data[] = $game_type;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameTypeByUuid($set_type, $obj) {           
        return $this->data->SetGameTypeByUuid($set_type, $obj);
    }
            
    public function DelGameTypeByUuid(
        $uuid
    ) {
        return $this->data->DelGameTypeByUuid(
            $uuid
        );
    }
        
    public function GetGameTypeList(
    ) {

        $results = array();
        $rows = $this->data->GetGameTypeList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_type  = $this->FillGameType($row);
                $results[] = $game_type;
            }
        }
        
        return $results;
    }
        
    public function GetGameTypeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameTypeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_type  = $this->FillGameType($row);
                $results[] = $game_type;
            }
        }
        
        return $results;
    }
        
    public function GetGameTypeListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameTypeListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_type  = $this->FillGameType($row);
                $results[] = $game_type;
            }
        }
        
        return $results;
    }
        
    public function GetGameTypeListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameTypeListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_type  = $this->FillGameType($row);
                $results[] = $game_type;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileGame($row) {
        $obj = new ProfileGame();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['type_id'] != NULL) {                
            $obj->type_id = $row['type_id'];#dataType.FillDataString(dr, "type_id");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['game_profile'] != NULL) {                
            $obj->game_profile = $row['game_profile'];#dataType.FillDataString(dr, "game_profile");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['profile_version'] != NULL) {                
            $obj->profile_version = $row['profile_version'];#dataType.FillDataString(dr, "profile_version");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountProfileGame(
    ) {       
        return $this->data->CountProfileGame(
        );
    }
               
    public function CountProfileGameByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameByUuid(
            $uuid
        );
    }
               
    public function CountProfileGameByGameId(
        $game_id
    ) {       
        return $this->data->CountProfileGameByGameId(
            $game_id
        );
    }
               
    public function CountProfileGameByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountProfileGameByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseProfileGameListByFilter($filter_obj) {
        $result = new ProfileGameResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_game = $this->FillProfileGame($row);
                $result->data[] = $profile_game;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileGameByUuid($set_type, $obj) {           
        return $this->data->SetProfileGameByUuid($set_type, $obj);
    }
            
    public function DelProfileGameByUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameByUuid(
            $uuid
        );
    }
        
    public function GetProfileGameList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game  = $this->FillProfileGame($row);
                $results[] = $profile_game;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game  = $this->FillProfileGame($row);
                $results[] = $profile_game;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game  = $this->FillProfileGame($row);
                $results[] = $profile_game;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game  = $this->FillProfileGame($row);
                $results[] = $profile_game;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game  = $this->FillProfileGame($row);
                $results[] = $profile_game;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileGameNetwork($row) {
        $obj = new ProfileGameNetwork();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['hash'] != NULL) {                
            $obj->hash = $row['hash'];#dataType.FillDataString(dr, "hash");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['game_network_id'] != NULL) {                
            $obj->game_network_id = $row['game_network_id'];#dataType.FillDataString(dr, "game_network_id");
        }
        if ($row['network_username'] != NULL) {                
            $obj->network_username = $row['network_username'];#dataType.FillDataString(dr, "network_username");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['secret'] != NULL) {                
            $obj->secret = $row['secret'];#dataType.FillDataString(dr, "secret");
        }
        if ($row['token'] != NULL) {                
            $obj->token = $row['token'];#dataType.FillDataString(dr, "token");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountProfileGameNetwork(
    ) {       
        return $this->data->CountProfileGameNetwork(
        );
    }
               
    public function CountProfileGameNetworkByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameNetworkByUuid(
            $uuid
        );
    }
               
    public function CountProfileGameNetworkByGameId(
        $game_id
    ) {       
        return $this->data->CountProfileGameNetworkByGameId(
            $game_id
        );
    }
               
    public function CountProfileGameNetworkByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameNetworkByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameNetworkByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountProfileGameNetworkByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseProfileGameNetworkListByFilter($filter_obj) {
        $result = new ProfileGameNetworkResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameNetworkListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_game_network = $this->FillProfileGameNetwork($row);
                $result->data[] = $profile_game_network;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileGameNetworkByUuid($set_type, $obj) {           
        return $this->data->SetProfileGameNetworkByUuid($set_type, $obj);
    }
            
    public function DelProfileGameNetworkByUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameNetworkByUuid(
            $uuid
        );
    }
        
    public function GetProfileGameNetworkList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_network  = $this->FillProfileGameNetwork($row);
                $results[] = $profile_game_network;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameNetworkListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_network  = $this->FillProfileGameNetwork($row);
                $results[] = $profile_game_network;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameNetworkListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_network  = $this->FillProfileGameNetwork($row);
                $results[] = $profile_game_network;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameNetworkListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_network  = $this->FillProfileGameNetwork($row);
                $results[] = $profile_game_network;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameNetworkListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_network  = $this->FillProfileGameNetwork($row);
                $results[] = $profile_game_network;
            }
        }
        
        return $results;
    }
        
        
    public function FillProfileGameDataAttribute($row) {
        $obj = new ProfileGameDataAttribute();

        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['val'] != NULL) {                
            $obj->val = $row['val'];#dataType.FillDataString(dr, "val");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['otype'] != NULL) {                
            $obj->otype = $row['otype'];#dataType.FillDataString(dr, "otype");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }

        return $obj;
    }
        
    public function CountProfileGameDataAttribute(
    ) {       
        return $this->data->CountProfileGameDataAttribute(
        );
    }
               
    public function CountProfileGameDataAttributeByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameDataAttributeByUuid(
            $uuid
        );
    }
               
    public function CountProfileGameDataAttributeByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameDataAttributeByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameDataAttributeByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
    ) {       
        return $this->data->CountProfileGameDataAttributeByProfileIdByGameIdByCode(
            $profile_id
            , $game_id
            , $code
        );
    }
               
    public function BrowseProfileGameDataAttributeListByFilter($filter_obj) {
        $result = new ProfileGameDataAttributeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameDataAttributeListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_game_data_attribute = $this->FillProfileGameDataAttribute($row);
                $result->data[] = $profile_game_data_attribute;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileGameDataAttributeByUuid($set_type, $obj) {           
        return $this->data->SetProfileGameDataAttributeByUuid($set_type, $obj);
    }
            
    public function SetProfileGameDataAttributeByProfileId($set_type, $obj) {           
        return $this->data->SetProfileGameDataAttributeByProfileId($set_type, $obj);
    }
            
    public function SetProfileGameDataAttributeByProfileIdByGameIdByCode($set_type, $obj) {           
        return $this->data->SetProfileGameDataAttributeByProfileIdByGameIdByCode($set_type, $obj);
    }
            
    public function DelProfileGameDataAttributeByUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameDataAttributeByUuid(
            $uuid
        );
    }
        
    public function DelProfileGameDataAttributeByProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileGameDataAttributeByProfileId(
            $profile_id
        );
    }
        
    public function DelProfileGameDataAttributeByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
    ) {
        return $this->data->DelProfileGameDataAttributeByProfileIdByGameIdByCode(
            $profile_id
            , $game_id
            , $code
        );
    }
        
    public function GetProfileGameDataAttributeListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameDataAttributeListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_data_attribute  = $this->FillProfileGameDataAttribute($row);
                $results[] = $profile_game_data_attribute;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameDataAttributeListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameDataAttributeListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_data_attribute  = $this->FillProfileGameDataAttribute($row);
                $results[] = $profile_game_data_attribute;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
        $profile_id
        , $game_id
        , $code
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            $profile_id
            , $game_id
            , $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_data_attribute  = $this->FillProfileGameDataAttribute($row);
                $results[] = $profile_game_data_attribute;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameSession($row) {
        $obj = new GameSession();

        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['network_uuid'] != NULL) {                
            $obj->network_uuid = $row['network_uuid'];#dataType.FillDataString(dr, "network_uuid");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['game_area'] != NULL) {                
            $obj->game_area = $row['game_area'];#dataType.FillDataString(dr, "game_area");
        }
        if ($row['profile_network'] != NULL) {                
            $obj->profile_network = $row['profile_network'];#dataType.FillDataString(dr, "profile_network");
        }
        if ($row['profile_device'] != NULL) {                
            $obj->profile_device = $row['profile_device'];#dataType.FillDataString(dr, "profile_device");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['network_external_port'] != NULL) {                
            $obj->network_external_port = $row['network_external_port'];#dataType.FillDataInt(dr, "network_external_port");
        }
        if ($row['game_players_connected'] != NULL) {                
            $obj->game_players_connected = $row['game_players_connected'];#dataType.FillDataInt(dr, "game_players_connected");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['game_state'] != NULL) {                
            $obj->game_state = $row['game_state'];#dataType.FillDataString(dr, "game_state");
        }
        if ($row['hash'] != NULL) {                
            $obj->hash = $row['hash'];#dataType.FillDataString(dr, "hash");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }
        if ($row['network_external_ip'] != NULL) {                
            $obj->network_external_ip = $row['network_external_ip'];#dataType.FillDataString(dr, "network_external_ip");
        }
        if ($row['game_level'] != NULL) {                
            $obj->game_level = $row['game_level'];#dataType.FillDataString(dr, "game_level");
        }
        if ($row['profile_username'] != NULL) {                
            $obj->profile_username = $row['profile_username'];#dataType.FillDataString(dr, "profile_username");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['game_code'] != NULL) {                
            $obj->game_code = $row['game_code'];#dataType.FillDataString(dr, "game_code");
        }
        if ($row['game_player_z'] != NULL) {                
            $obj->game_player_z = $row['game_player_z'];#dataType.FillDataFloat(dr, "game_player_z");
        }
        if ($row['game_player_x'] != NULL) {                
            $obj->game_player_x = $row['game_player_x'];#dataType.FillDataFloat(dr, "game_player_x");
        }
        if ($row['network_port'] != NULL) {                
            $obj->network_port = $row['network_port'];#dataType.FillDataInt(dr, "network_port");
        }
        if ($row['game_players_allowed'] != NULL) {                
            $obj->game_players_allowed = $row['game_players_allowed'];#dataType.FillDataInt(dr, "game_players_allowed");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['game_type'] != NULL) {                
            $obj->game_type = $row['game_type'];#dataType.FillDataString(dr, "game_type");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['network_ip'] != NULL) {                
            $obj->network_ip = $row['network_ip'];#dataType.FillDataString(dr, "network_ip");
        }
        if ($row['network_use_nat'] != NULL) {                
            $obj->network_use_nat = $row['network_use_nat'];#dataType.FillDataBoolean(dr, "network_use_nat");
        }

        return $obj;
    }
        
    public function CountGameSession(
    ) {       
        return $this->data->CountGameSession(
        );
    }
               
    public function CountGameSessionByUuid(
        $uuid
    ) {       
        return $this->data->CountGameSessionByUuid(
            $uuid
        );
    }
               
    public function CountGameSessionByGameId(
        $game_id
    ) {       
        return $this->data->CountGameSessionByGameId(
            $game_id
        );
    }
               
    public function CountGameSessionByProfileId(
        $profile_id
    ) {       
        return $this->data->CountGameSessionByProfileId(
            $profile_id
        );
    }
               
    public function CountGameSessionByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameSessionByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameSessionListByFilter($filter_obj) {
        $result = new GameSessionResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameSessionListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_session = $this->FillGameSession($row);
                $result->data[] = $game_session;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameSessionByUuid($set_type, $obj) {           
        return $this->data->SetGameSessionByUuid($set_type, $obj);
    }
            
    public function DelGameSessionByUuid(
        $uuid
    ) {
        return $this->data->DelGameSessionByUuid(
            $uuid
        );
    }
        
    public function GetGameSessionList(
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_session  = $this->FillGameSession($row);
                $results[] = $game_session;
            }
        }
        
        return $results;
    }
        
    public function GetGameSessionListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_session  = $this->FillGameSession($row);
                $results[] = $game_session;
            }
        }
        
        return $results;
    }
        
    public function GetGameSessionListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_session  = $this->FillGameSession($row);
                $results[] = $game_session;
            }
        }
        
        return $results;
    }
        
    public function GetGameSessionListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_session  = $this->FillGameSession($row);
                $results[] = $game_session;
            }
        }
        
        return $results;
    }
        
    public function GetGameSessionListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_session  = $this->FillGameSession($row);
                $results[] = $game_session;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameSessionData($row) {
        $obj = new GameSessionData();

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
        if ($row['data_results'] != NULL) {                
            $obj->data_results = $row['data_results'];#dataType.FillDataString(dr, "data_results");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['data_layer_projectile'] != NULL) {                
            $obj->data_layer_projectile = $row['data_layer_projectile'];#dataType.FillDataString(dr, "data_layer_projectile");
        }
        if ($row['data_layer_actors'] != NULL) {                
            $obj->data_layer_actors = $row['data_layer_actors'];#dataType.FillDataString(dr, "data_layer_actors");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['data_layer_enemy'] != NULL) {                
            $obj->data_layer_enemy = $row['data_layer_enemy'];#dataType.FillDataString(dr, "data_layer_enemy");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountGameSessionData(
    ) {       
        return $this->data->CountGameSessionData(
        );
    }
               
    public function CountGameSessionDataByUuid(
        $uuid
    ) {       
        return $this->data->CountGameSessionDataByUuid(
            $uuid
        );
    }
               
    public function BrowseGameSessionDataListByFilter($filter_obj) {
        $result = new GameSessionDataResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameSessionDataListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_session_data = $this->FillGameSessionData($row);
                $result->data[] = $game_session_data;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameSessionDataByUuid($set_type, $obj) {           
        return $this->data->SetGameSessionDataByUuid($set_type, $obj);
    }
            
    public function DelGameSessionDataByUuid(
        $uuid
    ) {
        return $this->data->DelGameSessionDataByUuid(
            $uuid
        );
    }
        
    public function GetGameSessionDataList(
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionDataList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_session_data  = $this->FillGameSessionData($row);
                $results[] = $game_session_data;
            }
        }
        
        return $results;
    }
        
    public function GetGameSessionDataListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionDataListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_session_data  = $this->FillGameSessionData($row);
                $results[] = $game_session_data;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameContent($row) {
        $obj = new GameContent();

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
        if ($row['extension'] != NULL) {                
            $obj->extension = $row['extension'];#dataType.FillDataString(dr, "extension");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['filename'] != NULL) {                
            $obj->filename = $row['filename'];#dataType.FillDataString(dr, "filename");
        }
        if ($row['source'] != NULL) {                
            $obj->source = $row['source'];#dataType.FillDataString(dr, "source");
        }
        if ($row['version'] != NULL) {                
            $obj->version = $row['version'];#dataType.FillDataString(dr, "version");
        }
        if ($row['platform'] != NULL) {                
            $obj->platform = $row['platform'];#dataType.FillDataString(dr, "platform");
        }
        if ($row['content_type'] != NULL) {                
            $obj->content_type = $row['content_type'];#dataType.FillDataString(dr, "content_type");
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
        if ($row['increment'] != NULL) {                
            $obj->increment = $row['increment'];#dataType.FillDataInt(dr, "increment");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['hash'] != NULL) {                
            $obj->hash = $row['hash'];#dataType.FillDataString(dr, "hash");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountGameContent(
    ) {       
        return $this->data->CountGameContent(
        );
    }
               
    public function CountGameContentByUuid(
        $uuid
    ) {       
        return $this->data->CountGameContentByUuid(
            $uuid
        );
    }
               
    public function CountGameContentByGameId(
        $game_id
    ) {       
        return $this->data->CountGameContentByGameId(
            $game_id
        );
    }
               
    public function CountGameContentByGameIdByPath(
        $game_id
        , $path
    ) {       
        return $this->data->CountGameContentByGameIdByPath(
            $game_id
            , $path
        );
    }
               
    public function CountGameContentByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
    ) {       
        return $this->data->CountGameContentByGameIdByPathByVersion(
            $game_id
            , $path
            , $version
        );
    }
               
    public function CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {       
        return $this->data->CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
            $game_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
               
    public function BrowseGameContentListByFilter($filter_obj) {
        $result = new GameContentResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameContentListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_content = $this->FillGameContent($row);
                $result->data[] = $game_content;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameContentByUuid($set_type, $obj) {           
        return $this->data->SetGameContentByUuid($set_type, $obj);
    }
            
    public function SetGameContentByGameId($set_type, $obj) {           
        return $this->data->SetGameContentByGameId($set_type, $obj);
    }
            
    public function SetGameContentByGameIdByPath($set_type, $obj) {           
        return $this->data->SetGameContentByGameIdByPath($set_type, $obj);
    }
            
    public function SetGameContentByGameIdByPathByVersion($set_type, $obj) {           
        return $this->data->SetGameContentByGameIdByPathByVersion($set_type, $obj);
    }
            
    public function SetGameContentByGameIdByPathByVersionByPlatformByIncrement($set_type, $obj) {           
        return $this->data->SetGameContentByGameIdByPathByVersionByPlatformByIncrement($set_type, $obj);
    }
            
    public function DelGameContentByUuid(
        $uuid
    ) {
        return $this->data->DelGameContentByUuid(
            $uuid
        );
    }
        
    public function DelGameContentByGameId(
        $game_id
    ) {
        return $this->data->DelGameContentByGameId(
            $game_id
        );
    }
        
    public function DelGameContentByGameIdByPath(
        $game_id
        , $path
    ) {
        return $this->data->DelGameContentByGameIdByPath(
            $game_id
            , $path
        );
    }
        
    public function DelGameContentByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
    ) {
        return $this->data->DelGameContentByGameIdByPathByVersion(
            $game_id
            , $path
            , $version
        );
    }
        
    public function DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->data->DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
            $game_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
        
    public function GetGameContentList(
    ) {

        $results = array();
        $rows = $this->data->GetGameContentList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_content  = $this->FillGameContent($row);
                $results[] = $game_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameContentListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_content  = $this->FillGameContent($row);
                $results[] = $game_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameContentListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_content  = $this->FillGameContent($row);
                $results[] = $game_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameContentListByGameIdByPath(
        $game_id
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListByGameIdByPath(
            $game_id
            , $path
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_content  = $this->FillGameContent($row);
                $results[] = $game_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameContentListByGameIdByPathByVersion(
        $game_id
        , $path
        , $version
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListByGameIdByPathByVersion(
            $game_id
            , $path
            , $version
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_content  = $this->FillGameContent($row);
                $results[] = $game_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            $game_id
            , $path
            , $version
            , $platform
            , $increment
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_content  = $this->FillGameContent($row);
                $results[] = $game_content;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameProfileContent($row) {
        $obj = new GameProfileContent();

        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['increment'] != NULL) {                
            $obj->increment = $row['increment'];#dataType.FillDataInt(dr, "increment");
        }
        if ($row['path'] != NULL) {                
            $obj->path = $row['path'];#dataType.FillDataString(dr, "path");
        }
        if ($row['display_name'] != NULL) {                
            $obj->display_name = $row['display_name'];#dataType.FillDataString(dr, "display_name");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['platform'] != NULL) {                
            $obj->platform = $row['platform'];#dataType.FillDataString(dr, "platform");
        }
        if ($row['filename'] != NULL) {                
            $obj->filename = $row['filename'];#dataType.FillDataString(dr, "filename");
        }
        if ($row['source'] != NULL) {                
            $obj->source = $row['source'];#dataType.FillDataString(dr, "source");
        }
        if ($row['version'] != NULL) {                
            $obj->version = $row['version'];#dataType.FillDataString(dr, "version");
        }
        if ($row['game_network'] != NULL) {                
            $obj->game_network = $row['game_network'];#dataType.FillDataString(dr, "game_network");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['hash'] != NULL) {                
            $obj->hash = $row['hash'];#dataType.FillDataString(dr, "hash");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }
        if ($row['content_type'] != NULL) {                
            $obj->content_type = $row['content_type'];#dataType.FillDataString(dr, "content_type");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['extension'] != NULL) {                
            $obj->extension = $row['extension'];#dataType.FillDataString(dr, "extension");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }

        return $obj;
    }
        
    public function CountGameProfileContent(
    ) {       
        return $this->data->CountGameProfileContent(
        );
    }
               
    public function CountGameProfileContentByUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileContentByUuid(
            $uuid
        );
    }
               
    public function CountGameProfileContentByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {       
        return $this->data->CountGameProfileContentByGameIdByProfileId(
            $game_id
            , $profile_id
        );
    }
               
    public function CountGameProfileContentByGameIdByUsername(
        $game_id
        , $username
    ) {       
        return $this->data->CountGameProfileContentByGameIdByUsername(
            $game_id
            , $username
        );
    }
               
    public function CountGameProfileContentByUsername(
        $username
    ) {       
        return $this->data->CountGameProfileContentByUsername(
            $username
        );
    }
               
    public function CountGameProfileContentByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
    ) {       
        return $this->data->CountGameProfileContentByGameIdByProfileIdByPath(
            $game_id
            , $profile_id
            , $path
        );
    }
               
    public function CountGameProfileContentByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {       
        return $this->data->CountGameProfileContentByGameIdByProfileIdByPathByVersion(
            $game_id
            , $profile_id
            , $path
            , $version
        );
    }
               
    public function CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {       
        return $this->data->CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            $game_id
            , $profile_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
               
    public function CountGameProfileContentByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
    ) {       
        return $this->data->CountGameProfileContentByGameIdByUsernameByPath(
            $game_id
            , $username
            , $path
        );
    }
               
    public function CountGameProfileContentByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {       
        return $this->data->CountGameProfileContentByGameIdByUsernameByPathByVersion(
            $game_id
            , $username
            , $path
            , $version
        );
    }
               
    public function CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {       
        return $this->data->CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            $game_id
            , $username
            , $path
            , $version
            , $platform
            , $increment
        );
    }
               
    public function BrowseGameProfileContentListByFilter($filter_obj) {
        $result = new GameProfileContentResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileContentListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_profile_content = $this->FillGameProfileContent($row);
                $result->data[] = $game_profile_content;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameProfileContentByUuid($set_type, $obj) {           
        return $this->data->SetGameProfileContentByUuid($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByProfileId($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByProfileId($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByUsername($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByUsername($set_type, $obj);
    }
            
    public function SetGameProfileContentByUsername($set_type, $obj) {           
        return $this->data->SetGameProfileContentByUsername($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByProfileIdByPath($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByProfileIdByPath($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersion($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByProfileIdByPathByVersion($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByUsernameByPath($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByUsernameByPath($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByUsernameByPathByVersion($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByUsernameByPathByVersion($set_type, $obj);
    }
            
    public function SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement($set_type, $obj) {           
        return $this->data->SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement($set_type, $obj);
    }
            
    public function DelGameProfileContentByUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileContentByUuid(
            $uuid
        );
    }
        
    public function DelGameProfileContentByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {
        return $this->data->DelGameProfileContentByGameIdByProfileId(
            $game_id
            , $profile_id
        );
    }
        
    public function DelGameProfileContentByGameIdByUsername(
        $game_id
        , $username
    ) {
        return $this->data->DelGameProfileContentByGameIdByUsername(
            $game_id
            , $username
        );
    }
        
    public function DelGameProfileContentByUsername(
        $username
    ) {
        return $this->data->DelGameProfileContentByUsername(
            $username
        );
    }
        
    public function DelGameProfileContentByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
    ) {
        return $this->data->DelGameProfileContentByGameIdByProfileIdByPath(
            $game_id
            , $profile_id
            , $path
        );
    }
        
    public function DelGameProfileContentByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        return $this->data->DelGameProfileContentByGameIdByProfileIdByPathByVersion(
            $game_id
            , $profile_id
            , $path
            , $version
        );
    }
        
    public function DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->data->DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            $game_id
            , $profile_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
        
    public function DelGameProfileContentByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
    ) {
        return $this->data->DelGameProfileContentByGameIdByUsernameByPath(
            $game_id
            , $username
            , $path
        );
    }
        
    public function DelGameProfileContentByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        return $this->data->DelGameProfileContentByGameIdByUsernameByPathByVersion(
            $game_id
            , $username
            , $path
            , $version
        );
    }
        
    public function DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->data->DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            $game_id
            , $username
            , $path
            , $version
            , $platform
            , $increment
        );
    }
        
    public function GetGameProfileContentList(
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByProfileId(
        $game_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByProfileId(
            $game_id
            , $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByUsername(
        $game_id
        , $username
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByUsername(
            $game_id
            , $username
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByUsername(
        $username
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByUsername(
            $username
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByProfileIdByPath(
        $game_id
        , $profile_id
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByProfileIdByPath(
            $game_id
            , $profile_id
            , $path
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            $game_id
            , $profile_id
            , $path
            , $version
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            $game_id
            , $profile_id
            , $path
            , $version
            , $platform
            , $increment
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByUsernameByPath(
        $game_id
        , $username
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByUsernameByPath(
            $game_id
            , $username
            , $path
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByUsernameByPathByVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByUsernameByPathByVersion(
            $game_id
            , $username
            , $path
            , $version
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            $game_id
            , $username
            , $path
            , $version
            , $platform
            , $increment
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_content  = $this->FillGameProfileContent($row);
                $results[] = $game_profile_content;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameApp($row) {
        $obj = new GameApp();

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
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['app_id'] != NULL) {                
            $obj->app_id = $row['app_id'];#dataType.FillDataString(dr, "app_id");
        }

        return $obj;
    }
        
    public function CountGameApp(
    ) {       
        return $this->data->CountGameApp(
        );
    }
               
    public function CountGameAppByUuid(
        $uuid
    ) {       
        return $this->data->CountGameAppByUuid(
            $uuid
        );
    }
               
    public function CountGameAppByGameId(
        $game_id
    ) {       
        return $this->data->CountGameAppByGameId(
            $game_id
        );
    }
               
    public function CountGameAppByAppId(
        $app_id
    ) {       
        return $this->data->CountGameAppByAppId(
            $app_id
        );
    }
               
    public function CountGameAppByGameIdByAppId(
        $game_id
        , $app_id
    ) {       
        return $this->data->CountGameAppByGameIdByAppId(
            $game_id
            , $app_id
        );
    }
               
    public function BrowseGameAppListByFilter($filter_obj) {
        $result = new GameAppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameAppListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_app = $this->FillGameApp($row);
                $result->data[] = $game_app;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameAppByUuid($set_type, $obj) {           
        return $this->data->SetGameAppByUuid($set_type, $obj);
    }
            
    public function DelGameAppByUuid(
        $uuid
    ) {
        return $this->data->DelGameAppByUuid(
            $uuid
        );
    }
        
    public function GetGameAppList(
    ) {

        $results = array();
        $rows = $this->data->GetGameAppList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_app  = $this->FillGameApp($row);
                $results[] = $game_app;
            }
        }
        
        return $results;
    }
        
    public function GetGameAppListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_app  = $this->FillGameApp($row);
                $results[] = $game_app;
            }
        }
        
        return $results;
    }
        
    public function GetGameAppListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_app  = $this->FillGameApp($row);
                $results[] = $game_app;
            }
        }
        
        return $results;
    }
        
    public function GetGameAppListByAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListByAppId(
            $app_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_app  = $this->FillGameApp($row);
                $results[] = $game_app;
            }
        }
        
        return $results;
    }
        
    public function GetGameAppListByGameIdByAppId(
        $game_id
        , $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListByGameIdByAppId(
            $game_id
            , $app_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_app  = $this->FillGameApp($row);
                $results[] = $game_app;
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
        
        
    public function FillProfileGameLocation($row) {
        $obj = new ProfileGameLocation();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['game_location_id'] != NULL) {                
            $obj->game_location_id = $row['game_location_id'];#dataType.FillDataString(dr, "game_location_id");
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

        return $obj;
    }
        
    public function CountProfileGameLocation(
    ) {       
        return $this->data->CountProfileGameLocation(
        );
    }
               
    public function CountProfileGameLocationByUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameLocationByUuid(
            $uuid
        );
    }
               
    public function CountProfileGameLocationByGameLocationId(
        $game_location_id
    ) {       
        return $this->data->CountProfileGameLocationByGameLocationId(
            $game_location_id
        );
    }
               
    public function CountProfileGameLocationByProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameLocationByProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameLocationByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
    ) {       
        return $this->data->CountProfileGameLocationByProfileIdByGameLocationId(
            $profile_id
            , $game_location_id
        );
    }
               
    public function BrowseProfileGameLocationListByFilter($filter_obj) {
        $result = new ProfileGameLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameLocationListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $profile_game_location = $this->FillProfileGameLocation($row);
                $result->data[] = $profile_game_location;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetProfileGameLocationByUuid($set_type, $obj) {           
        return $this->data->SetProfileGameLocationByUuid($set_type, $obj);
    }
            
    public function DelProfileGameLocationByUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameLocationByUuid(
            $uuid
        );
    }
        
    public function GetProfileGameLocationList(
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_location  = $this->FillProfileGameLocation($row);
                $results[] = $profile_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameLocationListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_location  = $this->FillProfileGameLocation($row);
                $results[] = $profile_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameLocationListByGameLocationId(
        $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListByGameLocationId(
            $game_location_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_location  = $this->FillProfileGameLocation($row);
                $results[] = $profile_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameLocationListByProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListByProfileId(
            $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_location  = $this->FillProfileGameLocation($row);
                $results[] = $profile_game_location;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameLocationListByProfileIdByGameLocationId(
        $profile_id
        , $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListByProfileIdByGameLocationId(
            $profile_id
            , $game_location_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_location  = $this->FillProfileGameLocation($row);
                $results[] = $profile_game_location;
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
        
        
    public function FillGameRpgItemWeapon($row) {
        $obj = new GameRpgItemWeapon();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['third_party_oembed'] != NULL) {                
            $obj->third_party_oembed = $row['third_party_oembed'];#dataType.FillDataString(dr, "third_party_oembed");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }
        if ($row['game_defense'] != NULL) {                
            $obj->game_defense = $row['game_defense'];#dataType.FillDataFloat(dr, "game_defense");
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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['game_attack'] != NULL) {                
            $obj->game_attack = $row['game_attack'];#dataType.FillDataFloat(dr, "game_attack");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
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
        if ($row['game_price'] != NULL) {                
            $obj->game_price = $row['game_price'];#dataType.FillDataFloat(dr, "game_price");
        }
        if ($row['game_type'] != NULL) {                
            $obj->game_type = $row['game_type'];#dataType.FillDataFloat(dr, "game_type");
        }
        if ($row['game_skill'] != NULL) {                
            $obj->game_skill = $row['game_skill'];#dataType.FillDataFloat(dr, "game_skill");
        }
        if ($row['game_health'] != NULL) {                
            $obj->game_health = $row['game_health'];#dataType.FillDataFloat(dr, "game_health");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['game_energy'] != NULL) {                
            $obj->game_energy = $row['game_energy'];#dataType.FillDataFloat(dr, "game_energy");
        }
        if ($row['game_data'] != NULL) {                
            $obj->game_data = $row['game_data'];#dataType.FillDataString(dr, "game_data");
        }

        return $obj;
    }
        
    public function CountGameRpgItemWeapon(
    ) {       
        return $this->data->CountGameRpgItemWeapon(
        );
    }
               
    public function CountGameRpgItemWeaponByUuid(
        $uuid
    ) {       
        return $this->data->CountGameRpgItemWeaponByUuid(
            $uuid
        );
    }
               
    public function CountGameRpgItemWeaponByGameId(
        $game_id
    ) {       
        return $this->data->CountGameRpgItemWeaponByGameId(
            $game_id
        );
    }
               
    public function CountGameRpgItemWeaponByUrl(
        $url
    ) {       
        return $this->data->CountGameRpgItemWeaponByUrl(
            $url
        );
    }
               
    public function CountGameRpgItemWeaponByUrlByGameId(
        $url
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemWeaponByUrlByGameId(
            $url
            , $game_id
        );
    }
               
    public function CountGameRpgItemWeaponByUuidByGameId(
        $uuid
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemWeaponByUuidByGameId(
            $uuid
            , $game_id
        );
    }
               
    public function BrowseGameRpgItemWeaponListByFilter($filter_obj) {
        $result = new GameRpgItemWeaponResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameRpgItemWeaponListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_rpg_item_weapon = $this->FillGameRpgItemWeapon($row);
                $result->data[] = $game_rpg_item_weapon;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameRpgItemWeaponByUuid($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponByUuid($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponByGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponByGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponByUrl($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponByUrl($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponByUrlByGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponByUrlByGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponByUuidByGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponByUuidByGameId($set_type, $obj);
    }
            
    public function DelGameRpgItemWeaponByUuid(
        $uuid
    ) {
        return $this->data->DelGameRpgItemWeaponByUuid(
            $uuid
        );
    }
        
    public function DelGameRpgItemWeaponByGameId(
        $game_id
    ) {
        return $this->data->DelGameRpgItemWeaponByGameId(
            $game_id
        );
    }
        
    public function DelGameRpgItemWeaponByUrl(
        $url
    ) {
        return $this->data->DelGameRpgItemWeaponByUrl(
            $url
        );
    }
        
    public function DelGameRpgItemWeaponByUrlByGameId(
        $url
        , $game_id
    ) {
        return $this->data->DelGameRpgItemWeaponByUrlByGameId(
            $url
            , $game_id
        );
    }
        
    public function DelGameRpgItemWeaponByUuidByGameId(
        $uuid
        , $game_id
    ) {
        return $this->data->DelGameRpgItemWeaponByUuidByGameId(
            $uuid
            , $game_id
        );
    }
        
    public function GetGameRpgItemWeaponList(
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_weapon  = $this->FillGameRpgItemWeapon($row);
                $results[] = $game_rpg_item_weapon;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemWeaponListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_weapon  = $this->FillGameRpgItemWeapon($row);
                $results[] = $game_rpg_item_weapon;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemWeaponListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_weapon  = $this->FillGameRpgItemWeapon($row);
                $results[] = $game_rpg_item_weapon;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemWeaponListByUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListByUrl(
            $url
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_weapon  = $this->FillGameRpgItemWeapon($row);
                $results[] = $game_rpg_item_weapon;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemWeaponListByUrlByGameId(
        $url
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListByUrlByGameId(
            $url
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_weapon  = $this->FillGameRpgItemWeapon($row);
                $results[] = $game_rpg_item_weapon;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemWeaponListByUuidByGameId(
        $uuid
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListByUuidByGameId(
            $uuid
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_weapon  = $this->FillGameRpgItemWeapon($row);
                $results[] = $game_rpg_item_weapon;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameRpgItemSkill($row) {
        $obj = new GameRpgItemSkill();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['third_party_oembed'] != NULL) {                
            $obj->third_party_oembed = $row['third_party_oembed'];#dataType.FillDataString(dr, "third_party_oembed");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }
        if ($row['game_defense'] != NULL) {                
            $obj->game_defense = $row['game_defense'];#dataType.FillDataFloat(dr, "game_defense");
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
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['game_attack'] != NULL) {                
            $obj->game_attack = $row['game_attack'];#dataType.FillDataFloat(dr, "game_attack");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
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
        if ($row['game_price'] != NULL) {                
            $obj->game_price = $row['game_price'];#dataType.FillDataFloat(dr, "game_price");
        }
        if ($row['game_type'] != NULL) {                
            $obj->game_type = $row['game_type'];#dataType.FillDataFloat(dr, "game_type");
        }
        if ($row['game_skill'] != NULL) {                
            $obj->game_skill = $row['game_skill'];#dataType.FillDataFloat(dr, "game_skill");
        }
        if ($row['game_health'] != NULL) {                
            $obj->game_health = $row['game_health'];#dataType.FillDataFloat(dr, "game_health");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['game_energy'] != NULL) {                
            $obj->game_energy = $row['game_energy'];#dataType.FillDataFloat(dr, "game_energy");
        }
        if ($row['game_data'] != NULL) {                
            $obj->game_data = $row['game_data'];#dataType.FillDataString(dr, "game_data");
        }

        return $obj;
    }
        
    public function CountGameRpgItemSkill(
    ) {       
        return $this->data->CountGameRpgItemSkill(
        );
    }
               
    public function CountGameRpgItemSkillByUuid(
        $uuid
    ) {       
        return $this->data->CountGameRpgItemSkillByUuid(
            $uuid
        );
    }
               
    public function CountGameRpgItemSkillByGameId(
        $game_id
    ) {       
        return $this->data->CountGameRpgItemSkillByGameId(
            $game_id
        );
    }
               
    public function CountGameRpgItemSkillByUrl(
        $url
    ) {       
        return $this->data->CountGameRpgItemSkillByUrl(
            $url
        );
    }
               
    public function CountGameRpgItemSkillByUrlByGameId(
        $url
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemSkillByUrlByGameId(
            $url
            , $game_id
        );
    }
               
    public function CountGameRpgItemSkillByUuidByGameId(
        $uuid
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemSkillByUuidByGameId(
            $uuid
            , $game_id
        );
    }
               
    public function BrowseGameRpgItemSkillListByFilter($filter_obj) {
        $result = new GameRpgItemSkillResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameRpgItemSkillListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_rpg_item_skill = $this->FillGameRpgItemSkill($row);
                $result->data[] = $game_rpg_item_skill;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameRpgItemSkillByUuid($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillByUuid($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillByGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillByGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillByUrl($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillByUrl($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillByUrlByGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillByUrlByGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillByUuidByGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillByUuidByGameId($set_type, $obj);
    }
            
    public function DelGameRpgItemSkillByUuid(
        $uuid
    ) {
        return $this->data->DelGameRpgItemSkillByUuid(
            $uuid
        );
    }
        
    public function DelGameRpgItemSkillByGameId(
        $game_id
    ) {
        return $this->data->DelGameRpgItemSkillByGameId(
            $game_id
        );
    }
        
    public function DelGameRpgItemSkillByUrl(
        $url
    ) {
        return $this->data->DelGameRpgItemSkillByUrl(
            $url
        );
    }
        
    public function DelGameRpgItemSkillByUrlByGameId(
        $url
        , $game_id
    ) {
        return $this->data->DelGameRpgItemSkillByUrlByGameId(
            $url
            , $game_id
        );
    }
        
    public function DelGameRpgItemSkillByUuidByGameId(
        $uuid
        , $game_id
    ) {
        return $this->data->DelGameRpgItemSkillByUuidByGameId(
            $uuid
            , $game_id
        );
    }
        
    public function GetGameRpgItemSkillList(
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_skill  = $this->FillGameRpgItemSkill($row);
                $results[] = $game_rpg_item_skill;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemSkillListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_skill  = $this->FillGameRpgItemSkill($row);
                $results[] = $game_rpg_item_skill;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemSkillListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_skill  = $this->FillGameRpgItemSkill($row);
                $results[] = $game_rpg_item_skill;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemSkillListByUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListByUrl(
            $url
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_skill  = $this->FillGameRpgItemSkill($row);
                $results[] = $game_rpg_item_skill;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemSkillListByUrlByGameId(
        $url
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListByUrlByGameId(
            $url
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_skill  = $this->FillGameRpgItemSkill($row);
                $results[] = $game_rpg_item_skill;
            }
        }
        
        return $results;
    }
        
    public function GetGameRpgItemSkillListByUuidByGameId(
        $uuid
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListByUuidByGameId(
            $uuid
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_rpg_item_skill  = $this->FillGameRpgItemSkill($row);
                $results[] = $game_rpg_item_skill;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameProduct($row) {
        $obj = new GameProduct();

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
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
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
        
    public function CountGameProduct(
    ) {       
        return $this->data->CountGameProduct(
        );
    }
               
    public function CountGameProductByUuid(
        $uuid
    ) {       
        return $this->data->CountGameProductByUuid(
            $uuid
        );
    }
               
    public function CountGameProductByGameId(
        $game_id
    ) {       
        return $this->data->CountGameProductByGameId(
            $game_id
        );
    }
               
    public function CountGameProductByUrl(
        $url
    ) {       
        return $this->data->CountGameProductByUrl(
            $url
        );
    }
               
    public function CountGameProductByUrlByGameId(
        $url
        , $game_id
    ) {       
        return $this->data->CountGameProductByUrlByGameId(
            $url
            , $game_id
        );
    }
               
    public function CountGameProductByUuidByGameId(
        $uuid
        , $game_id
    ) {       
        return $this->data->CountGameProductByUuidByGameId(
            $uuid
            , $game_id
        );
    }
               
    public function BrowseGameProductListByFilter($filter_obj) {
        $result = new GameProductResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProductListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_product = $this->FillGameProduct($row);
                $result->data[] = $game_product;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameProductByUuid($set_type, $obj) {           
        return $this->data->SetGameProductByUuid($set_type, $obj);
    }
            
    public function SetGameProductByGameId($set_type, $obj) {           
        return $this->data->SetGameProductByGameId($set_type, $obj);
    }
            
    public function SetGameProductByUrl($set_type, $obj) {           
        return $this->data->SetGameProductByUrl($set_type, $obj);
    }
            
    public function SetGameProductByUrlByGameId($set_type, $obj) {           
        return $this->data->SetGameProductByUrlByGameId($set_type, $obj);
    }
            
    public function SetGameProductByUuidByGameId($set_type, $obj) {           
        return $this->data->SetGameProductByUuidByGameId($set_type, $obj);
    }
            
    public function DelGameProductByUuid(
        $uuid
    ) {
        return $this->data->DelGameProductByUuid(
            $uuid
        );
    }
        
    public function DelGameProductByGameId(
        $game_id
    ) {
        return $this->data->DelGameProductByGameId(
            $game_id
        );
    }
        
    public function DelGameProductByUrl(
        $url
    ) {
        return $this->data->DelGameProductByUrl(
            $url
        );
    }
        
    public function DelGameProductByUrlByGameId(
        $url
        , $game_id
    ) {
        return $this->data->DelGameProductByUrlByGameId(
            $url
            , $game_id
        );
    }
        
    public function DelGameProductByUuidByGameId(
        $uuid
        , $game_id
    ) {
        return $this->data->DelGameProductByUuidByGameId(
            $uuid
            , $game_id
        );
    }
        
    public function GetGameProductList(
    ) {

        $results = array();
        $rows = $this->data->GetGameProductList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_product  = $this->FillGameProduct($row);
                $results[] = $game_product;
            }
        }
        
        return $results;
    }
        
    public function GetGameProductListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_product  = $this->FillGameProduct($row);
                $results[] = $game_product;
            }
        }
        
        return $results;
    }
        
    public function GetGameProductListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_product  = $this->FillGameProduct($row);
                $results[] = $game_product;
            }
        }
        
        return $results;
    }
        
    public function GetGameProductListByUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListByUrl(
            $url
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_product  = $this->FillGameProduct($row);
                $results[] = $game_product;
            }
        }
        
        return $results;
    }
        
    public function GetGameProductListByUrlByGameId(
        $url
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListByUrlByGameId(
            $url
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_product  = $this->FillGameProduct($row);
                $results[] = $game_product;
            }
        }
        
        return $results;
    }
        
    public function GetGameProductListByUuidByGameId(
        $uuid
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListByUuidByGameId(
            $uuid
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_product  = $this->FillGameProduct($row);
                $results[] = $game_product;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameStatisticLeaderboard($row) {
        $obj = new GameStatisticLeaderboard();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['stat_value_formatted'] != NULL) {                
            $obj->stat_value_formatted = $row['stat_value_formatted'];#dataType.FillDataString(dr, "stat_value_formatted");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['rank'] != NULL) {                
            $obj->rank = $row['rank'];#dataType.FillDataInt(dr, "rank");
        }
        if ($row['rank_change'] != NULL) {                
            $obj->rank_change = $row['rank_change'];#dataType.FillDataInt(dr, "rank_change");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['rank_total_count'] != NULL) {                
            $obj->rank_total_count = $row['rank_total_count'];#dataType.FillDataInt(dr, "rank_total_count");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['stat_value'] != NULL) {                
            $obj->stat_value = $row['stat_value'];#dataType.FillDataFloat(dr, "stat_value");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['level'] != NULL) {                
            $obj->level = $row['level'];#dataType.FillDataString(dr, "level");
        }
        if ($row['timestamp'] != NULL) {                
            $obj->timestamp = $row['timestamp'];#dataType.FillDataFloat(dr, "timestamp");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountGameStatisticLeaderboard(
    ) {       
        return $this->data->CountGameStatisticLeaderboard(
        );
    }
               
    public function CountGameStatisticLeaderboardByUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticLeaderboardByUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticLeaderboardByKey(
        $key
    ) {       
        return $this->data->CountGameStatisticLeaderboardByKey(
            $key
        );
    }
               
    public function CountGameStatisticLeaderboardByGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardByGameId(
            $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameStatisticLeaderboardListByFilter($filter_obj) {
        $result = new GameStatisticLeaderboardResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticLeaderboardListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard = $this->FillGameStatisticLeaderboard($row);
                $result->data[] = $game_statistic_leaderboard;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameStatisticLeaderboardByUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByUuid($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByProfileIdByKey($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByProfileIdByKey($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByProfileIdByGameIdByKey($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByProfileIdByGameIdByKey($set_type, $obj);
    }
            
    public function DelGameStatisticLeaderboardByUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticLeaderboardByUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticLeaderboardByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function DelGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
        
    public function GetGameStatisticLeaderboardList(
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameLiveQueue($row) {
        $obj = new GameLiveQueue();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['data_stat'] != NULL) {                
            $obj->data_stat = $row['data_stat'];#dataType.FillDataString(dr, "data_stat");
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
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['data_ad'] != NULL) {                
            $obj->data_ad = $row['data_ad'];#dataType.FillDataString(dr, "data_ad");
        }

        return $obj;
    }
        
    public function CountGameLiveQueue(
    ) {       
        return $this->data->CountGameLiveQueue(
        );
    }
               
    public function CountGameLiveQueueByUuid(
        $uuid
    ) {       
        return $this->data->CountGameLiveQueueByUuid(
            $uuid
        );
    }
               
    public function CountGameLiveQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameLiveQueueByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameLiveQueueListByFilter($filter_obj) {
        $result = new GameLiveQueueResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameLiveQueueListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_live_queue = $this->FillGameLiveQueue($row);
                $result->data[] = $game_live_queue;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameLiveQueueByUuid($set_type, $obj) {           
        return $this->data->SetGameLiveQueueByUuid($set_type, $obj);
    }
            
    public function SetGameLiveQueueByProfileIdByGameId($set_type, $obj) {           
        return $this->data->SetGameLiveQueueByProfileIdByGameId($set_type, $obj);
    }
            
    public function DelGameLiveQueueByUuid(
        $uuid
    ) {
        return $this->data->DelGameLiveQueueByUuid(
            $uuid
        );
    }
        
    public function DelGameLiveQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameLiveQueueByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function GetGameLiveQueueList(
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveQueueList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_queue  = $this->FillGameLiveQueue($row);
                $results[] = $game_live_queue;
            }
        }
        
        return $results;
    }
        
    public function GetGameLiveQueueListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveQueueListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_queue  = $this->FillGameLiveQueue($row);
                $results[] = $game_live_queue;
            }
        }
        
        return $results;
    }
        
    public function GetGameLiveQueueListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveQueueListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_queue  = $this->FillGameLiveQueue($row);
                $results[] = $game_live_queue;
            }
        }
        
        return $results;
    }
        
    public function GetGameLiveQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveQueueListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_queue  = $this->FillGameLiveQueue($row);
                $results[] = $game_live_queue;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameLiveRecentQueue($row) {
        $obj = new GameLiveRecentQueue();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
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
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['game'] != NULL) {                
            $obj->game = $row['game'];#dataType.FillDataString(dr, "game");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
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
        
    public function CountGameLiveRecentQueue(
    ) {       
        return $this->data->CountGameLiveRecentQueue(
        );
    }
               
    public function CountGameLiveRecentQueueByUuid(
        $uuid
    ) {       
        return $this->data->CountGameLiveRecentQueueByUuid(
            $uuid
        );
    }
               
    public function CountGameLiveRecentQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameLiveRecentQueueByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameLiveRecentQueueListByFilter($filter_obj) {
        $result = new GameLiveRecentQueueResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameLiveRecentQueueListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_live_recent_queue = $this->FillGameLiveRecentQueue($row);
                $result->data[] = $game_live_recent_queue;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameLiveRecentQueueByUuid($set_type, $obj) {           
        return $this->data->SetGameLiveRecentQueueByUuid($set_type, $obj);
    }
            
    public function SetGameLiveRecentQueueByProfileIdByGameId($set_type, $obj) {           
        return $this->data->SetGameLiveRecentQueueByProfileIdByGameId($set_type, $obj);
    }
            
    public function DelGameLiveRecentQueueByUuid(
        $uuid
    ) {
        return $this->data->DelGameLiveRecentQueueByUuid(
            $uuid
        );
    }
        
    public function DelGameLiveRecentQueueByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameLiveRecentQueueByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function GetGameLiveRecentQueueList(
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveRecentQueueList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_recent_queue  = $this->FillGameLiveRecentQueue($row);
                $results[] = $game_live_recent_queue;
            }
        }
        
        return $results;
    }
        
    public function GetGameLiveRecentQueueListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveRecentQueueListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_recent_queue  = $this->FillGameLiveRecentQueue($row);
                $results[] = $game_live_recent_queue;
            }
        }
        
        return $results;
    }
        
    public function GetGameLiveRecentQueueListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveRecentQueueListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_recent_queue  = $this->FillGameLiveRecentQueue($row);
                $results[] = $game_live_recent_queue;
            }
        }
        
        return $results;
    }
        
    public function GetGameLiveRecentQueueListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveRecentQueueListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_live_recent_queue  = $this->FillGameLiveRecentQueue($row);
                $results[] = $game_live_recent_queue;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameStatistic($row) {
        $obj = new GameStatistic();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['timestamp'] != NULL) {                
            $obj->timestamp = $row['timestamp'];#dataType.FillDataFloat(dr, "timestamp");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['stat_value'] != NULL) {                
            $obj->stat_value = $row['stat_value'];#dataType.FillDataFloat(dr, "stat_value");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['level'] != NULL) {                
            $obj->level = $row['level'];#dataType.FillDataString(dr, "level");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountGameStatistic(
    ) {       
        return $this->data->CountGameStatistic(
        );
    }
               
    public function CountGameStatisticByUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticByUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticByKey(
        $key
    ) {       
        return $this->data->CountGameStatisticByKey(
            $key
        );
    }
               
    public function CountGameStatisticByGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticByGameId(
            $game_id
        );
    }
               
    public function CountGameStatisticByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameStatisticByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function CountGameStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function CountGameStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameStatisticListByFilter($filter_obj) {
        $result = new GameStatisticResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_statistic = $this->FillGameStatistic($row);
                $result->data[] = $game_statistic;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameStatisticByUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticByUuid($set_type, $obj);
    }
            
    public function SetGameStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticByProfileIdByKey($set_type, $obj) {           
        return $this->data->SetGameStatisticByProfileIdByKey($set_type, $obj);
    }
            
    public function SetGameStatisticByProfileIdByKeyByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticByProfileIdByKeyByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticByProfileIdByGameIdByKey($set_type, $obj) {           
        return $this->data->SetGameStatisticByProfileIdByGameIdByKey($set_type, $obj);
    }
            
    public function DelGameStatisticByUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticByUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameStatisticByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function DelGameStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function DelGameStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
        
    public function GetGameStatisticListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByProfileIdByGameIdByTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic  = $this->FillGameStatistic($row);
                $results[] = $game_statistic;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameStatisticMeta($row) {
        $obj = new GameStatisticMeta();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['store_count'] != NULL) {                
            $obj->store_count = $row['store_count'];#dataType.FillDataInt(dr, "store_count");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
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
        if ($row['order'] != NULL) {                
            $obj->order = $row['order'];#dataType.FillDataString(dr, "order");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountGameStatisticMeta(
    ) {       
        return $this->data->CountGameStatisticMeta(
        );
    }
               
    public function CountGameStatisticMetaByUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticMetaByUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticMetaByCode(
        $code
    ) {       
        return $this->data->CountGameStatisticMetaByCode(
            $code
        );
    }
               
    public function CountGameStatisticMetaByName(
        $name
    ) {       
        return $this->data->CountGameStatisticMetaByName(
            $name
        );
    }
               
    public function CountGameStatisticMetaByKey(
        $key
    ) {       
        return $this->data->CountGameStatisticMetaByKey(
            $key
        );
    }
               
    public function CountGameStatisticMetaByGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticMetaByGameId(
            $game_id
        );
    }
               
    public function CountGameStatisticMetaByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameStatisticMetaByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function BrowseGameStatisticMetaListByFilter($filter_obj) {
        $result = new GameStatisticMetaResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticMetaListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_statistic_meta = $this->FillGameStatisticMeta($row);
                $result->data[] = $game_statistic_meta;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameStatisticMetaByUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticMetaByUuid($set_type, $obj);
    }
            
    public function SetGameStatisticMetaByKeyByGameId($set_type, $obj) {           
        return $this->data->SetGameStatisticMetaByKeyByGameId($set_type, $obj);
    }
            
    public function DelGameStatisticMetaByUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticMetaByUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticMetaByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameStatisticMetaByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function GetGameStatisticMetaListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_meta  = $this->FillGameStatisticMeta($row);
                $results[] = $game_statistic_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticMetaListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_meta  = $this->FillGameStatisticMeta($row);
                $results[] = $game_statistic_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticMetaListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_meta  = $this->FillGameStatisticMeta($row);
                $results[] = $game_statistic_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticMetaListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_meta  = $this->FillGameStatisticMeta($row);
                $results[] = $game_statistic_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticMetaListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_meta  = $this->FillGameStatisticMeta($row);
                $results[] = $game_statistic_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticMetaListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_meta  = $this->FillGameStatisticMeta($row);
                $results[] = $game_statistic_meta;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameStatisticTimestamp($row) {
        $obj = new GameStatisticTimestamp();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['timestamp'] != NULL) {                
            $obj->timestamp = $row['timestamp'];#dataType.FillDataDate(dr, "timestamp");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
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
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountGameStatisticTimestamp(
    ) {       
        return $this->data->CountGameStatisticTimestamp(
        );
    }
               
    public function CountGameStatisticTimestampByUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticTimestampByUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameStatisticTimestampListByFilter($filter_obj) {
        $result = new GameStatisticTimestampResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticTimestampListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_statistic_timestamp = $this->FillGameStatisticTimestamp($row);
                $result->data[] = $game_statistic_timestamp;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameStatisticTimestampByUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticTimestampByUuid($set_type, $obj);
    }
            
    public function SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function DelGameStatisticTimestampByUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticTimestampByUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->data->DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
        
    public function GetGameStatisticTimestampListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticTimestampListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_timestamp  = $this->FillGameStatisticTimestamp($row);
                $results[] = $game_statistic_timestamp;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_timestamp  = $this->FillGameStatisticTimestamp($row);
                $results[] = $game_statistic_timestamp;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameKeyMeta($row) {
        $obj = new GameKeyMeta();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['level'] != NULL) {                
            $obj->level = $row['level'];#dataType.FillDataString(dr, "level");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['key_level'] != NULL) {                
            $obj->key_level = $row['key_level'];#dataType.FillDataString(dr, "key_level");
        }
        if ($row['store_count'] != NULL) {                
            $obj->store_count = $row['store_count'];#dataType.FillDataInt(dr, "store_count");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
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
        if ($row['order'] != NULL) {                
            $obj->order = $row['order'];#dataType.FillDataString(dr, "order");
        }
        if ($row['key_stat'] != NULL) {                
            $obj->key_stat = $row['key_stat'];#dataType.FillDataString(dr, "key_stat");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountGameKeyMeta(
    ) {       
        return $this->data->CountGameKeyMeta(
        );
    }
               
    public function CountGameKeyMetaByUuid(
        $uuid
    ) {       
        return $this->data->CountGameKeyMetaByUuid(
            $uuid
        );
    }
               
    public function CountGameKeyMetaByCode(
        $code
    ) {       
        return $this->data->CountGameKeyMetaByCode(
            $code
        );
    }
               
    public function CountGameKeyMetaByName(
        $name
    ) {       
        return $this->data->CountGameKeyMetaByName(
            $name
        );
    }
               
    public function CountGameKeyMetaByKey(
        $key
    ) {       
        return $this->data->CountGameKeyMetaByKey(
            $key
        );
    }
               
    public function CountGameKeyMetaByGameId(
        $game_id
    ) {       
        return $this->data->CountGameKeyMetaByGameId(
            $game_id
        );
    }
               
    public function CountGameKeyMetaByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameKeyMetaByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function BrowseGameKeyMetaListByFilter($filter_obj) {
        $result = new GameKeyMetaResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameKeyMetaListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_key_meta = $this->FillGameKeyMeta($row);
                $result->data[] = $game_key_meta;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameKeyMetaByUuid($set_type, $obj) {           
        return $this->data->SetGameKeyMetaByUuid($set_type, $obj);
    }
            
    public function SetGameKeyMetaByKeyByGameId($set_type, $obj) {           
        return $this->data->SetGameKeyMetaByKeyByGameId($set_type, $obj);
    }
            
    public function SetGameKeyMetaByKeyByGameIdByLevel($set_type, $obj) {           
        return $this->data->SetGameKeyMetaByKeyByGameIdByLevel($set_type, $obj);
    }
            
    public function DelGameKeyMetaByUuid(
        $uuid
    ) {
        return $this->data->DelGameKeyMetaByUuid(
            $uuid
        );
    }
        
    public function DelGameKeyMetaByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameKeyMetaByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function GetGameKeyMetaListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_key_meta  = $this->FillGameKeyMeta($row);
                $results[] = $game_key_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameKeyMetaListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_key_meta  = $this->FillGameKeyMeta($row);
                $results[] = $game_key_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameKeyMetaListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_key_meta  = $this->FillGameKeyMeta($row);
                $results[] = $game_key_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameKeyMetaListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_key_meta  = $this->FillGameKeyMeta($row);
                $results[] = $game_key_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameKeyMetaListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_key_meta  = $this->FillGameKeyMeta($row);
                $results[] = $game_key_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameKeyMetaListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_key_meta  = $this->FillGameKeyMeta($row);
                $results[] = $game_key_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameKeyMetaListByCodeByLevel(
        $code
        , $level
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListByCodeByLevel(
            $code
            , $level
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_key_meta  = $this->FillGameKeyMeta($row);
                $results[] = $game_key_meta;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameLevel($row) {
        $obj = new GameLevel();

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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
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
        if ($row['order'] != NULL) {                
            $obj->order = $row['order'];#dataType.FillDataString(dr, "order");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountGameLevel(
    ) {       
        return $this->data->CountGameLevel(
        );
    }
               
    public function CountGameLevelByUuid(
        $uuid
    ) {       
        return $this->data->CountGameLevelByUuid(
            $uuid
        );
    }
               
    public function CountGameLevelByCode(
        $code
    ) {       
        return $this->data->CountGameLevelByCode(
            $code
        );
    }
               
    public function CountGameLevelByName(
        $name
    ) {       
        return $this->data->CountGameLevelByName(
            $name
        );
    }
               
    public function CountGameLevelByKey(
        $key
    ) {       
        return $this->data->CountGameLevelByKey(
            $key
        );
    }
               
    public function CountGameLevelByGameId(
        $game_id
    ) {       
        return $this->data->CountGameLevelByGameId(
            $game_id
        );
    }
               
    public function CountGameLevelByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameLevelByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function BrowseGameLevelListByFilter($filter_obj) {
        $result = new GameLevelResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameLevelListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_level = $this->FillGameLevel($row);
                $result->data[] = $game_level;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameLevelByUuid($set_type, $obj) {           
        return $this->data->SetGameLevelByUuid($set_type, $obj);
    }
            
    public function SetGameLevelByKeyByGameId($set_type, $obj) {           
        return $this->data->SetGameLevelByKeyByGameId($set_type, $obj);
    }
            
    public function DelGameLevelByUuid(
        $uuid
    ) {
        return $this->data->DelGameLevelByUuid(
            $uuid
        );
    }
        
    public function DelGameLevelByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameLevelByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function GetGameLevelListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_level  = $this->FillGameLevel($row);
                $results[] = $game_level;
            }
        }
        
        return $results;
    }
        
    public function GetGameLevelListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_level  = $this->FillGameLevel($row);
                $results[] = $game_level;
            }
        }
        
        return $results;
    }
        
    public function GetGameLevelListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_level  = $this->FillGameLevel($row);
                $results[] = $game_level;
            }
        }
        
        return $results;
    }
        
    public function GetGameLevelListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_level  = $this->FillGameLevel($row);
                $results[] = $game_level;
            }
        }
        
        return $results;
    }
        
    public function GetGameLevelListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_level  = $this->FillGameLevel($row);
                $results[] = $game_level;
            }
        }
        
        return $results;
    }
        
    public function GetGameLevelListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_level  = $this->FillGameLevel($row);
                $results[] = $game_level;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameAchievement($row) {
        $obj = new GameAchievement();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['timestamp'] != NULL) {                
            $obj->timestamp = $row['timestamp'];#dataType.FillDataFloat(dr, "timestamp");
        }
        if ($row['completed'] != NULL) {                
            $obj->completed = $row['completed'];#dataType.FillDataBoolean(dr, "completed");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['achievement_value'] != NULL) {                
            $obj->achievement_value = $row['achievement_value'];#dataType.FillDataFloat(dr, "achievement_value");
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
        if ($row['level'] != NULL) {                
            $obj->level = $row['level'];#dataType.FillDataString(dr, "level");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountGameAchievement(
    ) {       
        return $this->data->CountGameAchievement(
        );
    }
               
    public function CountGameAchievementByUuid(
        $uuid
    ) {       
        return $this->data->CountGameAchievementByUuid(
            $uuid
        );
    }
               
    public function CountGameAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {       
        return $this->data->CountGameAchievementByProfileIdByKey(
            $profile_id
            , $key
        );
    }
               
    public function CountGameAchievementByUsername(
        $username
    ) {       
        return $this->data->CountGameAchievementByUsername(
            $username
        );
    }
               
    public function CountGameAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameAchievementByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameAchievementListByFilter($filter_obj) {
        $result = new GameAchievementResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameAchievementListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_achievement = $this->FillGameAchievement($row);
                $result->data[] = $game_achievement;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameAchievementByUuid($set_type, $obj) {           
        return $this->data->SetGameAchievementByUuid($set_type, $obj);
    }
            
    public function SetGameAchievementByUuidByKey($set_type, $obj) {           
        return $this->data->SetGameAchievementByUuidByKey($set_type, $obj);
    }
            
    public function SetGameAchievementByProfileIdByKey($set_type, $obj) {           
        return $this->data->SetGameAchievementByProfileIdByKey($set_type, $obj);
    }
            
    public function SetGameAchievementByKeyByProfileIdByGameId($set_type, $obj) {           
        return $this->data->SetGameAchievementByKeyByProfileIdByGameId($set_type, $obj);
    }
            
    public function SetGameAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function DelGameAchievementByUuid(
        $uuid
    ) {
        return $this->data->DelGameAchievementByUuid(
            $uuid
        );
    }
        
    public function DelGameAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {
        return $this->data->DelGameAchievementByProfileIdByKey(
            $profile_id
            , $key
        );
    }
        
    public function DelGameAchievementByUuidByKey(
        $uuid
        , $key
    ) {
        return $this->data->DelGameAchievementByUuidByKey(
            $uuid
            , $key
        );
    }
        
    public function GetGameAchievementListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByProfileIdByKey(
        $profile_id
        , $key
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByProfileIdByKey(
            $profile_id
            , $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByUsername(
        $username
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByUsername(
            $username
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByProfileIdByGameIdByTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement  = $this->FillGameAchievement($row);
                $results[] = $game_achievement;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameAchievementMeta($row) {
        $obj = new GameAchievementMeta();

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
        if ($row['game_stat'] != NULL) {                
            $obj->game_stat = $row['game_stat'];#dataType.FillDataBoolean(dr, "game_stat");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
        }
        if ($row['level'] != NULL) {                
            $obj->level = $row['level'];#dataType.FillDataString(dr, "level");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['points'] != NULL) {                
            $obj->points = $row['points'];#dataType.FillDataInt(dr, "points");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
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
        if ($row['leaderboard'] != NULL) {                
            $obj->leaderboard = $row['leaderboard'];#dataType.FillDataBoolean(dr, "leaderboard");
        }
        if ($row['description'] != NULL) {                
            $obj->description = $row['description'];#dataType.FillDataString(dr, "description");
        }

        return $obj;
    }
        
    public function CountGameAchievementMeta(
    ) {       
        return $this->data->CountGameAchievementMeta(
        );
    }
               
    public function CountGameAchievementMetaByUuid(
        $uuid
    ) {       
        return $this->data->CountGameAchievementMetaByUuid(
            $uuid
        );
    }
               
    public function CountGameAchievementMetaByCode(
        $code
    ) {       
        return $this->data->CountGameAchievementMetaByCode(
            $code
        );
    }
               
    public function CountGameAchievementMetaByName(
        $name
    ) {       
        return $this->data->CountGameAchievementMetaByName(
            $name
        );
    }
               
    public function CountGameAchievementMetaByKey(
        $key
    ) {       
        return $this->data->CountGameAchievementMetaByKey(
            $key
        );
    }
               
    public function CountGameAchievementMetaByGameId(
        $game_id
    ) {       
        return $this->data->CountGameAchievementMetaByGameId(
            $game_id
        );
    }
               
    public function CountGameAchievementMetaByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameAchievementMetaByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function BrowseGameAchievementMetaListByFilter($filter_obj) {
        $result = new GameAchievementMetaResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameAchievementMetaListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_achievement_meta = $this->FillGameAchievementMeta($row);
                $result->data[] = $game_achievement_meta;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameAchievementMetaByUuid($set_type, $obj) {           
        return $this->data->SetGameAchievementMetaByUuid($set_type, $obj);
    }
            
    public function SetGameAchievementMetaByKeyByGameId($set_type, $obj) {           
        return $this->data->SetGameAchievementMetaByKeyByGameId($set_type, $obj);
    }
            
    public function DelGameAchievementMetaByUuid(
        $uuid
    ) {
        return $this->data->DelGameAchievementMetaByUuid(
            $uuid
        );
    }
        
    public function DelGameAchievementMetaByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameAchievementMetaByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function GetGameAchievementMetaListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement_meta  = $this->FillGameAchievementMeta($row);
                $results[] = $game_achievement_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementMetaListByCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListByCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement_meta  = $this->FillGameAchievementMeta($row);
                $results[] = $game_achievement_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementMetaListByName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListByName(
            $name
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement_meta  = $this->FillGameAchievementMeta($row);
                $results[] = $game_achievement_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementMetaListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement_meta  = $this->FillGameAchievementMeta($row);
                $results[] = $game_achievement_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementMetaListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement_meta  = $this->FillGameAchievementMeta($row);
                $results[] = $game_achievement_meta;
            }
        }
        
        return $results;
    }
        
    public function GetGameAchievementMetaListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_achievement_meta  = $this->FillGameAchievementMeta($row);
                $results[] = $game_achievement_meta;
            }
        }
        
        return $results;
    }
        


}

?>