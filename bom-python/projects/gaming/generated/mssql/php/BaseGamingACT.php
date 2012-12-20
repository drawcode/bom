<?php // namespace Gaming;

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
require_once('ent/ProfileGameLocation.php');
require_once('ent/GamePhoto.php');
require_once('ent/GameVideo.php');
require_once('ent/GameRpgItemWeapon.php');
require_once('ent/GameRpgItemSkill.php');
require_once('ent/GameProduct.php');
require_once('ent/GameStatisticLeaderboard.php');
require_once('ent/GameStatisticLeaderboardRollup.php');
require_once('ent/GameLiveQueue.php');
require_once('ent/GameLiveRecentQueue.php');
require_once('ent/GameProfileStatistic.php');
require_once('ent/GameStatisticMeta.php');
require_once('ent/GameProfileStatisticTimestamp.php');
require_once('ent/GameKeyMeta.php');
require_once('ent/GameLevel.php');
require_once('ent/GameProfileAchievement.php');
require_once('ent/GameAchievementMeta.php');

require_once('BaseGamingData.php');

class BaseGamingACT {

    public $data;
    
    public function __construct() {
        $this->data = new BaseGamingData();
    }
    
    public function __destruct() {
        
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
        if ($row['data'] != NULL) {                
            $obj->data = $row['data'];#dataType.FillDataString(dr, "data");
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

        if ($row['game_area'] != NULL) {                
            $obj->game_area = $row['game_area'];#dataType.FillDataString(dr, "game_area");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['network_uuid'] != NULL) {                
            $obj->network_uuid = $row['network_uuid'];#dataType.FillDataString(dr, "network_uuid");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['game_level'] != NULL) {                
            $obj->game_level = $row['game_level'];#dataType.FillDataString(dr, "game_level");
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
        if ($row['game_player_y'] != NULL) {                
            $obj->game_player_y = $row['game_player_y'];#dataType.FillDataFloat(dr, "game_player_y");
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
        
        
    public function FillGamePhoto($row) {
        $obj = new GamePhoto();

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
        
    public function CountGamePhoto(
    ) {       
        return $this->data->CountGamePhoto(
        );
    }
               
    public function CountGamePhotoByUuid(
        $uuid
    ) {       
        return $this->data->CountGamePhotoByUuid(
            $uuid
        );
    }
               
    public function CountGamePhotoByExternalId(
        $external_id
    ) {       
        return $this->data->CountGamePhotoByExternalId(
            $external_id
        );
    }
               
    public function CountGamePhotoByUrl(
        $url
    ) {       
        return $this->data->CountGamePhotoByUrl(
            $url
        );
    }
               
    public function CountGamePhotoByUrlByExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountGamePhotoByUrlByExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountGamePhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountGamePhotoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowseGamePhotoListByFilter($filter_obj) {
        $result = new GamePhotoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGamePhotoListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_photo = $this->FillGamePhoto($row);
                $result->data[] = $game_photo;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGamePhotoByUuid($set_type, $obj) {           
        return $this->data->SetGamePhotoByUuid($set_type, $obj);
    }
            
    public function SetGamePhotoByExternalId($set_type, $obj) {           
        return $this->data->SetGamePhotoByExternalId($set_type, $obj);
    }
            
    public function SetGamePhotoByUrl($set_type, $obj) {           
        return $this->data->SetGamePhotoByUrl($set_type, $obj);
    }
            
    public function SetGamePhotoByUrlByExternalId($set_type, $obj) {           
        return $this->data->SetGamePhotoByUrlByExternalId($set_type, $obj);
    }
            
    public function SetGamePhotoByUuidByExternalId($set_type, $obj) {           
        return $this->data->SetGamePhotoByUuidByExternalId($set_type, $obj);
    }
            
    public function DelGamePhotoByUuid(
        $uuid
    ) {
        return $this->data->DelGamePhotoByUuid(
            $uuid
        );
    }
        
    public function DelGamePhotoByExternalId(
        $external_id
    ) {
        return $this->data->DelGamePhotoByExternalId(
            $external_id
        );
    }
        
    public function DelGamePhotoByUrl(
        $url
    ) {
        return $this->data->DelGamePhotoByUrl(
            $url
        );
    }
        
    public function DelGamePhotoByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelGamePhotoByUrlByExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelGamePhotoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelGamePhotoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
        
    public function GetGamePhotoList(
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_photo  = $this->FillGamePhoto($row);
                $results[] = $game_photo;
            }
        }
        
        return $results;
    }
        
    public function GetGamePhotoListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_photo  = $this->FillGamePhoto($row);
                $results[] = $game_photo;
            }
        }
        
        return $results;
    }
        
    public function GetGamePhotoListByExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListByExternalId(
            $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_photo  = $this->FillGamePhoto($row);
                $results[] = $game_photo;
            }
        }
        
        return $results;
    }
        
    public function GetGamePhotoListByUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListByUrl(
            $url
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_photo  = $this->FillGamePhoto($row);
                $results[] = $game_photo;
            }
        }
        
        return $results;
    }
        
    public function GetGamePhotoListByUrlByExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListByUrlByExternalId(
            $url
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_photo  = $this->FillGamePhoto($row);
                $results[] = $game_photo;
            }
        }
        
        return $results;
    }
        
    public function GetGamePhotoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListByUuidByExternalId(
            $uuid
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_photo  = $this->FillGamePhoto($row);
                $results[] = $game_photo;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameVideo($row) {
        $obj = new GameVideo();

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
        
    public function CountGameVideo(
    ) {       
        return $this->data->CountGameVideo(
        );
    }
               
    public function CountGameVideoByUuid(
        $uuid
    ) {       
        return $this->data->CountGameVideoByUuid(
            $uuid
        );
    }
               
    public function CountGameVideoByExternalId(
        $external_id
    ) {       
        return $this->data->CountGameVideoByExternalId(
            $external_id
        );
    }
               
    public function CountGameVideoByUrl(
        $url
    ) {       
        return $this->data->CountGameVideoByUrl(
            $url
        );
    }
               
    public function CountGameVideoByUrlByExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountGameVideoByUrlByExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountGameVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountGameVideoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowseGameVideoListByFilter($filter_obj) {
        $result = new GameVideoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameVideoListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_video = $this->FillGameVideo($row);
                $result->data[] = $game_video;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameVideoByUuid($set_type, $obj) {           
        return $this->data->SetGameVideoByUuid($set_type, $obj);
    }
            
    public function SetGameVideoByExternalId($set_type, $obj) {           
        return $this->data->SetGameVideoByExternalId($set_type, $obj);
    }
            
    public function SetGameVideoByUrl($set_type, $obj) {           
        return $this->data->SetGameVideoByUrl($set_type, $obj);
    }
            
    public function SetGameVideoByUrlByExternalId($set_type, $obj) {           
        return $this->data->SetGameVideoByUrlByExternalId($set_type, $obj);
    }
            
    public function SetGameVideoByUuidByExternalId($set_type, $obj) {           
        return $this->data->SetGameVideoByUuidByExternalId($set_type, $obj);
    }
            
    public function DelGameVideoByUuid(
        $uuid
    ) {
        return $this->data->DelGameVideoByUuid(
            $uuid
        );
    }
        
    public function DelGameVideoByExternalId(
        $external_id
    ) {
        return $this->data->DelGameVideoByExternalId(
            $external_id
        );
    }
        
    public function DelGameVideoByUrl(
        $url
    ) {
        return $this->data->DelGameVideoByUrl(
            $url
        );
    }
        
    public function DelGameVideoByUrlByExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelGameVideoByUrlByExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelGameVideoByUuidByExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelGameVideoByUuidByExternalId(
            $uuid
            , $external_id
        );
    }
        
    public function GetGameVideoList(
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_video  = $this->FillGameVideo($row);
                $results[] = $game_video;
            }
        }
        
        return $results;
    }
        
    public function GetGameVideoListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_video  = $this->FillGameVideo($row);
                $results[] = $game_video;
            }
        }
        
        return $results;
    }
        
    public function GetGameVideoListByExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListByExternalId(
            $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_video  = $this->FillGameVideo($row);
                $results[] = $game_video;
            }
        }
        
        return $results;
    }
        
    public function GetGameVideoListByUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListByUrl(
            $url
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_video  = $this->FillGameVideo($row);
                $results[] = $game_video;
            }
        }
        
        return $results;
    }
        
    public function GetGameVideoListByUrlByExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListByUrlByExternalId(
            $url
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_video  = $this->FillGameVideo($row);
                $results[] = $game_video;
            }
        }
        
        return $results;
    }
        
    public function GetGameVideoListByUuidByExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListByUuidByExternalId(
            $uuid
            , $external_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_video  = $this->FillGameVideo($row);
                $results[] = $game_video;
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
        if ($row['timestamp'] != NULL) {                
            $obj->timestamp = $row['timestamp'];#dataType.FillDataFloat(dr, "timestamp");
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
        if ($row['network'] != NULL) {                
            $obj->network = $row['network'];#dataType.FillDataString(dr, "network");
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
        if ($row['stat_value_formatted'] != NULL) {                
            $obj->stat_value_formatted = $row['stat_value_formatted'];#dataType.FillDataString(dr, "stat_value_formatted");
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
               
    public function CountGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardByProfileIdByGameId(
            $profile_id
            , $game_id
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
            
    public function SetGameStatisticLeaderboardByKeyByProfileId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByKeyByProfileId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByKeyByProfileIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByKeyByProfileIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardByKeyByProfileIdByGameId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardByKeyByProfileIdByGameId($set_type, $obj);
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
        
    public function DelGameStatisticLeaderboardByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardByProfileIdByGameId(
            $profile_id
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
        
    public function GetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
            $key
            , $game_id
            , $network
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
        
        
    public function FillGameStatisticLeaderboardRollup($row) {
        $obj = new GameStatisticLeaderboardRollup();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['key'] != NULL) {                
            $obj->key = $row['key'];#dataType.FillDataString(dr, "key");
        }
        if ($row['timestamp'] != NULL) {                
            $obj->timestamp = $row['timestamp'];#dataType.FillDataFloat(dr, "timestamp");
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
        if ($row['network'] != NULL) {                
            $obj->network = $row['network'];#dataType.FillDataString(dr, "network");
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
        if ($row['stat_value_formatted'] != NULL) {                
            $obj->stat_value_formatted = $row['stat_value_formatted'];#dataType.FillDataString(dr, "stat_value_formatted");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountGameStatisticLeaderboardRollup(
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollup(
        );
    }
               
    public function CountGameStatisticLeaderboardRollupByUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupByUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticLeaderboardRollupByKey(
        $key
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupByKey(
            $key
        );
    }
               
    public function CountGameStatisticLeaderboardRollupByGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupByGameId(
            $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardRollupByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function CountGameStatisticLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameStatisticLeaderboardRollupListByFilter($filter_obj) {
        $result = new GameStatisticLeaderboardRollupResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticLeaderboardRollupListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup = $this->FillGameStatisticLeaderboardRollup($row);
                $result->data[] = $game_statistic_leaderboard_rollup;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameStatisticLeaderboardRollupByUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupByUuid($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupByKeyByProfileId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupByKeyByProfileId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupByKeyByProfileIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameId($set_type, $obj);
    }
            
    public function DelGameStatisticLeaderboardRollupByUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupByUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticLeaderboardRollupByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function DelGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
        
    public function DelGameStatisticLeaderboardRollupByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function GetGameStatisticLeaderboardRollupList(
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
        $key
        , $game_id
        , $network
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
            $key
            , $game_id
            , $network
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
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
        
        
    public function FillGameProfileStatistic($row) {
        $obj = new GameProfileStatistic();

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
        if ($row['points'] != NULL) {                
            $obj->points = $row['points'];#dataType.FillDataFloat(dr, "points");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountGameProfileStatistic(
    ) {       
        return $this->data->CountGameProfileStatistic(
        );
    }
               
    public function CountGameProfileStatisticByUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileStatisticByUuid(
            $uuid
        );
    }
               
    public function CountGameProfileStatisticByKey(
        $key
    ) {       
        return $this->data->CountGameProfileStatisticByKey(
            $key
        );
    }
               
    public function CountGameProfileStatisticByGameId(
        $game_id
    ) {       
        return $this->data->CountGameProfileStatisticByGameId(
            $game_id
        );
    }
               
    public function CountGameProfileStatisticByKeyByGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticByKeyByGameId(
            $key
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameProfileStatisticListByFilter($filter_obj) {
        $result = new GameProfileStatisticResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileStatisticListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_profile_statistic = $this->FillGameProfileStatistic($row);
                $result->data[] = $game_profile_statistic;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameProfileStatisticByUuid($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticByUuid($set_type, $obj);
    }
            
    public function SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticByProfileIdByKey($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticByProfileIdByKey($set_type, $obj);
    }
            
    public function SetGameProfileStatisticByProfileIdByKeyByTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticByProfileIdByKeyByTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticByProfileIdByGameIdByKey($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticByProfileIdByGameIdByKey($set_type, $obj);
    }
            
    public function DelGameProfileStatisticByUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileStatisticByUuid(
            $uuid
        );
    }
        
    public function DelGameProfileStatisticByKeyByGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticByKeyByGameId(
            $key
            , $game_id
        );
    }
        
    public function DelGameProfileStatisticByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticByProfileIdByGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function DelGameProfileStatisticByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
        
    public function GetGameProfileStatisticListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
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
        if ($row['points'] != NULL) {                
            $obj->points = $row['points'];#dataType.FillDataFloat(dr, "points");
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
        
        
    public function FillGameProfileStatisticTimestamp($row) {
        $obj = new GameProfileStatisticTimestamp();

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
        
    public function CountGameProfileStatisticTimestamp(
    ) {       
        return $this->data->CountGameProfileStatisticTimestamp(
        );
    }
               
    public function CountGameProfileStatisticTimestampByUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileStatisticTimestampByUuid(
            $uuid
        );
    }
               
    public function CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameProfileStatisticTimestampListByFilter($filter_obj) {
        $result = new GameProfileStatisticTimestampResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileStatisticTimestampListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_profile_statistic_timestamp = $this->FillGameProfileStatisticTimestamp($row);
                $result->data[] = $game_profile_statistic_timestamp;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameProfileStatisticTimestampByUuid($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticTimestampByUuid($set_type, $obj);
    }
            
    public function SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function DelGameProfileStatisticTimestampByUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileStatisticTimestampByUuid(
            $uuid
        );
    }
        
    public function DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {
        return $this->data->DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
        
    public function GetGameProfileStatisticTimestampListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticTimestampListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_timestamp  = $this->FillGameProfileStatisticTimestamp($row);
                $results[] = $game_profile_statistic_timestamp;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_timestamp  = $this->FillGameProfileStatisticTimestamp($row);
                $results[] = $game_profile_statistic_timestamp;
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
        
        
    public function FillGameProfileAchievement($row) {
        $obj = new GameProfileAchievement();

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
        
    public function CountGameProfileAchievement(
    ) {       
        return $this->data->CountGameProfileAchievement(
        );
    }
               
    public function CountGameProfileAchievementByUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileAchievementByUuid(
            $uuid
        );
    }
               
    public function CountGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {       
        return $this->data->CountGameProfileAchievementByProfileIdByKey(
            $profile_id
            , $key
        );
    }
               
    public function CountGameProfileAchievementByUsername(
        $username
    ) {       
        return $this->data->CountGameProfileAchievementByUsername(
            $username
        );
    }
               
    public function CountGameProfileAchievementByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileAchievementByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameProfileAchievementListByFilter($filter_obj) {
        $result = new GameProfileAchievementResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileAchievementListByFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_profile_achievement = $this->FillGameProfileAchievement($row);
                $result->data[] = $game_profile_achievement;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameProfileAchievementByUuid($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementByUuid($set_type, $obj);
    }
            
    public function SetGameProfileAchievementByUuidByKey($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementByUuidByKey($set_type, $obj);
    }
            
    public function SetGameProfileAchievementByProfileIdByKey($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementByProfileIdByKey($set_type, $obj);
    }
            
    public function SetGameProfileAchievementByKeyByProfileIdByGameId($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementByKeyByProfileIdByGameId($set_type, $obj);
    }
            
    public function SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp($set_type, $obj);
    }
            
    public function DelGameProfileAchievementByUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileAchievementByUuid(
            $uuid
        );
    }
        
    public function DelGameProfileAchievementByProfileIdByKey(
        $profile_id
        , $key
    ) {
        return $this->data->DelGameProfileAchievementByProfileIdByKey(
            $profile_id
            , $key
        );
    }
        
    public function DelGameProfileAchievementByUuidByKey(
        $uuid
        , $key
    ) {
        return $this->data->DelGameProfileAchievementByUuidByKey(
            $uuid
            , $key
        );
    }
        
    public function GetGameProfileAchievementListByUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByProfileIdByKey(
        $profile_id
        , $key
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByProfileIdByKey(
            $profile_id
            , $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByUsername(
        $username
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByUsername(
            $username
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByKey(
            $key
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByKeyByGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByKeyByGameId(
            $key
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByProfileIdByGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByProfileIdByGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByKeyByProfileIdByGameId(
        $key
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByKeyByProfileIdByGameId(
            $key
            , $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
        $key
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
            $key
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
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
        if ($row['modifier'] != NULL) {                
            $obj->modifier = $row['modifier'];#dataType.FillDataFloat(dr, "modifier");
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