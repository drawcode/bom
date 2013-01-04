<?php // namespace Gaming;

require_once('ent/Game.php');
require_once('ent/GameCategory.php');
require_once('ent/GameCategoryTree.php');
require_once('ent/GameCategoryAssoc.php');
require_once('ent/GameType.php');
require_once('ent/ProfileGame.php');
require_once('ent/GameNetwork.php');
require_once('ent/GameNetworkAuth.php');
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
require_once('ent/GameStatisticLeaderboardItem.php');
require_once('ent/GameStatisticLeaderboardRollup.php');
require_once('ent/GameLiveQueue.php');
require_once('ent/GameLiveRecentQueue.php');
require_once('ent/GameProfileStatistic.php');
require_once('ent/GameStatisticMeta.php');
require_once('ent/GameProfileStatisticItem.php');
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
               
    public function CountGameUuid(
        $uuid
    ) {       
        return $this->data->CountGameUuid(
            $uuid
        );
    }
               
    public function CountGameCode(
        $code
    ) {       
        return $this->data->CountGameCode(
            $code
        );
    }
               
    public function CountGameName(
        $name
    ) {       
        return $this->data->CountGameName(
            $name
        );
    }
               
    public function CountGameOrgId(
        $org_id
    ) {       
        return $this->data->CountGameOrgId(
            $org_id
        );
    }
               
    public function CountGameAppId(
        $app_id
    ) {       
        return $this->data->CountGameAppId(
            $app_id
        );
    }
               
    public function CountGameOrgIdAppId(
        $org_id
        , $app_id
    ) {       
        return $this->data->CountGameOrgIdAppId(
            $org_id
            , $app_id
        );
    }
               
    public function BrowseGameListFilter($filter_obj) {
        $result = new GameResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameListFilter(filter_obj);
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

    public function SetGameUuid($set_type, $obj) {           
        return $this->data->SetGameUuid($set_type, $obj);
    }
            
    public function SetGameCode($set_type, $obj) {           
        return $this->data->SetGameCode($set_type, $obj);
    }
            
    public function SetGameName($set_type, $obj) {           
        return $this->data->SetGameName($set_type, $obj);
    }
            
    public function SetGameOrgId($set_type, $obj) {           
        return $this->data->SetGameOrgId($set_type, $obj);
    }
            
    public function SetGameAppId($set_type, $obj) {           
        return $this->data->SetGameAppId($set_type, $obj);
    }
            
    public function SetGameOrgIdAppId($set_type, $obj) {           
        return $this->data->SetGameOrgIdAppId($set_type, $obj);
    }
            
    public function DelGameUuid(
        $uuid
    ) {
        return $this->data->DelGameUuid(
            $uuid
        );
    }
        
    public function DelGameCode(
        $code
    ) {
        return $this->data->DelGameCode(
            $code
        );
    }
        
    public function DelGameName(
        $name
    ) {
        return $this->data->DelGameName(
            $name
        );
    }
        
    public function DelGameOrgId(
        $org_id
    ) {
        return $this->data->DelGameOrgId(
            $org_id
        );
    }
        
    public function DelGameAppId(
        $app_id
    ) {
        return $this->data->DelGameAppId(
            $app_id
        );
    }
        
    public function DelGameOrgIdAppId(
        $org_id
        , $app_id
    ) {
        return $this->data->DelGameOrgIdAppId(
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
        
    public function GetGameListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameListUuid(
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
        
    public function GetGameListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameListCode(
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
        
    public function GetGameListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameListName(
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
        
    public function GetGameListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetGameListOrgId(
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
        
    public function GetGameListAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameListAppId(
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
        
    public function GetGameListOrgIdAppId(
        $org_id
        , $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameListOrgIdAppId(
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
               
    public function CountGameCategoryUuid(
        $uuid
    ) {       
        return $this->data->CountGameCategoryUuid(
            $uuid
        );
    }
               
    public function CountGameCategoryCode(
        $code
    ) {       
        return $this->data->CountGameCategoryCode(
            $code
        );
    }
               
    public function CountGameCategoryName(
        $name
    ) {       
        return $this->data->CountGameCategoryName(
            $name
        );
    }
               
    public function CountGameCategoryOrgId(
        $org_id
    ) {       
        return $this->data->CountGameCategoryOrgId(
            $org_id
        );
    }
               
    public function CountGameCategoryTypeId(
        $type_id
    ) {       
        return $this->data->CountGameCategoryTypeId(
            $type_id
        );
    }
               
    public function CountGameCategoryOrgIdTypeId(
        $org_id
        , $type_id
    ) {       
        return $this->data->CountGameCategoryOrgIdTypeId(
            $org_id
            , $type_id
        );
    }
               
    public function BrowseGameCategoryListFilter($filter_obj) {
        $result = new GameCategoryResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameCategoryListFilter(filter_obj);
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

    public function SetGameCategoryUuid($set_type, $obj) {           
        return $this->data->SetGameCategoryUuid($set_type, $obj);
    }
            
    public function DelGameCategoryUuid(
        $uuid
    ) {
        return $this->data->DelGameCategoryUuid(
            $uuid
        );
    }
        
    public function DelGameCategoryCodeOrgId(
        $code
        , $org_id
    ) {
        return $this->data->DelGameCategoryCodeOrgId(
            $code
            , $org_id
        );
    }
        
    public function DelGameCategoryCodeOrgIdTypeId(
        $code
        , $org_id
        , $type_id
    ) {
        return $this->data->DelGameCategoryCodeOrgIdTypeId(
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
        
    public function GetGameCategoryListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListUuid(
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
        
    public function GetGameCategoryListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListCode(
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
        
    public function GetGameCategoryListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListName(
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
        
    public function GetGameCategoryListOrgId(
        $org_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListOrgId(
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
        
    public function GetGameCategoryListTypeId(
        $type_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListTypeId(
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
        
    public function GetGameCategoryListOrgIdTypeId(
        $org_id
        , $type_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryListOrgIdTypeId(
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
               
    public function CountGameCategoryTreeUuid(
        $uuid
    ) {       
        return $this->data->CountGameCategoryTreeUuid(
            $uuid
        );
    }
               
    public function CountGameCategoryTreeParentId(
        $parent_id
    ) {       
        return $this->data->CountGameCategoryTreeParentId(
            $parent_id
        );
    }
               
    public function CountGameCategoryTreeCategoryId(
        $category_id
    ) {       
        return $this->data->CountGameCategoryTreeCategoryId(
            $category_id
        );
    }
               
    public function CountGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {       
        return $this->data->CountGameCategoryTreeParentIdCategoryId(
            $parent_id
            , $category_id
        );
    }
               
    public function BrowseGameCategoryTreeListFilter($filter_obj) {
        $result = new GameCategoryTreeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameCategoryTreeListFilter(filter_obj);
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

    public function SetGameCategoryTreeUuid($set_type, $obj) {           
        return $this->data->SetGameCategoryTreeUuid($set_type, $obj);
    }
            
    public function DelGameCategoryTreeUuid(
        $uuid
    ) {
        return $this->data->DelGameCategoryTreeUuid(
            $uuid
        );
    }
        
    public function DelGameCategoryTreeParentId(
        $parent_id
    ) {
        return $this->data->DelGameCategoryTreeParentId(
            $parent_id
        );
    }
        
    public function DelGameCategoryTreeCategoryId(
        $category_id
    ) {
        return $this->data->DelGameCategoryTreeCategoryId(
            $category_id
        );
    }
        
    public function DelGameCategoryTreeParentIdCategoryId(
        $parent_id
        , $category_id
    ) {
        return $this->data->DelGameCategoryTreeParentIdCategoryId(
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
        
    public function GetGameCategoryTreeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListUuid(
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
        
    public function GetGameCategoryTreeListParentId(
        $parent_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListParentId(
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
        
    public function GetGameCategoryTreeListCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListCategoryId(
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
        
    public function GetGameCategoryTreeListParentIdCategoryId(
        $parent_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryTreeListParentIdCategoryId(
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
               
    public function CountGameCategoryAssocUuid(
        $uuid
    ) {       
        return $this->data->CountGameCategoryAssocUuid(
            $uuid
        );
    }
               
    public function CountGameCategoryAssocGameId(
        $game_id
    ) {       
        return $this->data->CountGameCategoryAssocGameId(
            $game_id
        );
    }
               
    public function CountGameCategoryAssocCategoryId(
        $category_id
    ) {       
        return $this->data->CountGameCategoryAssocCategoryId(
            $category_id
        );
    }
               
    public function CountGameCategoryAssocGameIdCategoryId(
        $game_id
        , $category_id
    ) {       
        return $this->data->CountGameCategoryAssocGameIdCategoryId(
            $game_id
            , $category_id
        );
    }
               
    public function BrowseGameCategoryAssocListFilter($filter_obj) {
        $result = new GameCategoryAssocResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameCategoryAssocListFilter(filter_obj);
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

    public function SetGameCategoryAssocUuid($set_type, $obj) {           
        return $this->data->SetGameCategoryAssocUuid($set_type, $obj);
    }
            
    public function DelGameCategoryAssocUuid(
        $uuid
    ) {
        return $this->data->DelGameCategoryAssocUuid(
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
        
    public function GetGameCategoryAssocListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListUuid(
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
        
    public function GetGameCategoryAssocListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListGameId(
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
        
    public function GetGameCategoryAssocListCategoryId(
        $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListCategoryId(
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
        
    public function GetGameCategoryAssocListGameIdCategoryId(
        $game_id
        , $category_id
    ) {

        $results = array();
        $rows = $this->data->GetGameCategoryAssocListGameIdCategoryId(
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
               
    public function CountGameTypeUuid(
        $uuid
    ) {       
        return $this->data->CountGameTypeUuid(
            $uuid
        );
    }
               
    public function CountGameTypeCode(
        $code
    ) {       
        return $this->data->CountGameTypeCode(
            $code
        );
    }
               
    public function CountGameTypeName(
        $name
    ) {       
        return $this->data->CountGameTypeName(
            $name
        );
    }
               
    public function BrowseGameTypeListFilter($filter_obj) {
        $result = new GameTypeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameTypeListFilter(filter_obj);
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

    public function SetGameTypeUuid($set_type, $obj) {           
        return $this->data->SetGameTypeUuid($set_type, $obj);
    }
            
    public function DelGameTypeUuid(
        $uuid
    ) {
        return $this->data->DelGameTypeUuid(
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
        
    public function GetGameTypeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameTypeListUuid(
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
        
    public function GetGameTypeListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameTypeListCode(
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
        
    public function GetGameTypeListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameTypeListName(
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
               
    public function CountProfileGameUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameUuid(
            $uuid
        );
    }
               
    public function CountProfileGameGameId(
        $game_id
    ) {       
        return $this->data->CountProfileGameGameId(
            $game_id
        );
    }
               
    public function CountProfileGameProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountProfileGameProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseProfileGameListFilter($filter_obj) {
        $result = new ProfileGameResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameListFilter(filter_obj);
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

    public function SetProfileGameUuid($set_type, $obj) {           
        return $this->data->SetProfileGameUuid($set_type, $obj);
    }
            
    public function DelProfileGameUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameUuid(
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
        
    public function GetProfileGameListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListUuid(
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
        
    public function GetProfileGameListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListGameId(
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
        
    public function GetProfileGameListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListProfileId(
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
        
    public function GetProfileGameListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameListProfileIdGameId(
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
        
        
    public function FillGameNetwork($row) {
        $obj = new GameNetwork();

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
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['secret'] != NULL) {                
            $obj->secret = $row['secret'];#dataType.FillDataString(dr, "secret");
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
        
    public function CountGameNetwork(
    ) {       
        return $this->data->CountGameNetwork(
        );
    }
               
    public function CountGameNetworkUuid(
        $uuid
    ) {       
        return $this->data->CountGameNetworkUuid(
            $uuid
        );
    }
               
    public function CountGameNetworkCode(
        $code
    ) {       
        return $this->data->CountGameNetworkCode(
            $code
        );
    }
               
    public function CountGameNetworkUuidType(
        $uuid
        , $type
    ) {       
        return $this->data->CountGameNetworkUuidType(
            $uuid
            , $type
        );
    }
               
    public function BrowseGameNetworkListFilter($filter_obj) {
        $result = new GameNetworkResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameNetworkListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_network = $this->FillGameNetwork($row);
                $result->data[] = $game_network;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameNetworkUuid($set_type, $obj) {           
        return $this->data->SetGameNetworkUuid($set_type, $obj);
    }
            
    public function SetGameNetworkCode($set_type, $obj) {           
        return $this->data->SetGameNetworkCode($set_type, $obj);
    }
            
    public function DelGameNetworkUuid(
        $uuid
    ) {
        return $this->data->DelGameNetworkUuid(
            $uuid
        );
    }
        
    public function GetGameNetworkList(
    ) {

        $results = array();
        $rows = $this->data->GetGameNetworkList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_network  = $this->FillGameNetwork($row);
                $results[] = $game_network;
            }
        }
        
        return $results;
    }
        
    public function GetGameNetworkListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameNetworkListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_network  = $this->FillGameNetwork($row);
                $results[] = $game_network;
            }
        }
        
        return $results;
    }
        
    public function GetGameNetworkListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameNetworkListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_network  = $this->FillGameNetwork($row);
                $results[] = $game_network;
            }
        }
        
        return $results;
    }
        
    public function GetGameNetworkListUuidType(
        $uuid
        , $type
    ) {

        $results = array();
        $rows = $this->data->GetGameNetworkListUuidType(
            $uuid
            , $type
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_network  = $this->FillGameNetwork($row);
                $results[] = $game_network;
            }
        }
        
        return $results;
    }
        
        
    public function FillGameNetworkAuth($row) {
        $obj = new GameNetworkAuth();

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
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['app_id'] != NULL) {                
            $obj->app_id = $row['app_id'];#dataType.FillDataString(dr, "app_id");
        }
        if ($row['game_network_id'] != NULL) {                
            $obj->game_network_id = $row['game_network_id'];#dataType.FillDataString(dr, "game_network_id");
        }
        if ($row['secret'] != NULL) {                
            $obj->secret = $row['secret'];#dataType.FillDataString(dr, "secret");
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
        
    public function CountGameNetworkAuth(
    ) {       
        return $this->data->CountGameNetworkAuth(
        );
    }
               
    public function CountGameNetworkAuthUuid(
        $uuid
    ) {       
        return $this->data->CountGameNetworkAuthUuid(
            $uuid
        );
    }
               
    public function CountGameNetworkAuthGameIdGameNetworkId(
        $game_id
        , $game_network_id
    ) {       
        return $this->data->CountGameNetworkAuthGameIdGameNetworkId(
            $game_id
            , $game_network_id
        );
    }
               
    public function BrowseGameNetworkAuthListFilter($filter_obj) {
        $result = new GameNetworkAuthResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameNetworkAuthListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_network_auth = $this->FillGameNetworkAuth($row);
                $result->data[] = $game_network_auth;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameNetworkAuthUuid($set_type, $obj) {           
        return $this->data->SetGameNetworkAuthUuid($set_type, $obj);
    }
            
    public function SetGameNetworkAuthGameIdGameNetworkId($set_type, $obj) {           
        return $this->data->SetGameNetworkAuthGameIdGameNetworkId($set_type, $obj);
    }
            
    public function DelGameNetworkAuthUuid(
        $uuid
    ) {
        return $this->data->DelGameNetworkAuthUuid(
            $uuid
        );
    }
        
    public function GetGameNetworkAuthList(
    ) {

        $results = array();
        $rows = $this->data->GetGameNetworkAuthList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_network_auth  = $this->FillGameNetworkAuth($row);
                $results[] = $game_network_auth;
            }
        }
        
        return $results;
    }
        
    public function GetGameNetworkAuthListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameNetworkAuthListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_network_auth  = $this->FillGameNetworkAuth($row);
                $results[] = $game_network_auth;
            }
        }
        
        return $results;
    }
        
    public function GetGameNetworkAuthListGameIdGameNetworkId(
        $game_id
        , $game_network_id
    ) {

        $results = array();
        $rows = $this->data->GetGameNetworkAuthListGameIdGameNetworkId(
            $game_id
            , $game_network_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_network_auth  = $this->FillGameNetworkAuth($row);
                $results[] = $game_network_auth;
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
        if ($row['network_fullname'] != NULL) {                
            $obj->network_fullname = $row['network_fullname'];#dataType.FillDataString(dr, "network_fullname");
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
        if ($row['network_auth'] != NULL) {                
            $obj->network_auth = $row['network_auth'];#dataType.FillDataString(dr, "network_auth");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }
        if ($row['network_user_id'] != NULL) {                
            $obj->network_user_id = $row['network_user_id'];#dataType.FillDataString(dr, "network_user_id");
        }

        return $obj;
    }
        
    public function CountProfileGameNetwork(
    ) {       
        return $this->data->CountProfileGameNetwork(
        );
    }
               
    public function CountProfileGameNetworkUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameNetworkUuid(
            $uuid
        );
    }
               
    public function CountProfileGameNetworkGameId(
        $game_id
    ) {       
        return $this->data->CountProfileGameNetworkGameId(
            $game_id
        );
    }
               
    public function CountProfileGameNetworkProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameNetworkProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountProfileGameNetworkProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function CountProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountProfileGameNetworkProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function CountProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {       
        return $this->data->CountProfileGameNetworkProfileIdGameIdGameNetworkId(
            $profile_id
            , $game_id
            , $game_network_id
        );
    }
               
    public function CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {       
        return $this->data->CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            $network_username
            , $game_id
            , $game_network_id
        );
    }
               
    public function BrowseProfileGameNetworkListFilter($filter_obj) {
        $result = new ProfileGameNetworkResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameNetworkListFilter(filter_obj);
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

    public function SetProfileGameNetworkUuid($set_type, $obj) {           
        return $this->data->SetProfileGameNetworkUuid($set_type, $obj);
    }
            
    public function SetProfileGameNetworkProfileIdGameId($set_type, $obj) {           
        return $this->data->SetProfileGameNetworkProfileIdGameId($set_type, $obj);
    }
            
    public function SetProfileGameNetworkProfileIdGameIdGameNetworkId($set_type, $obj) {           
        return $this->data->SetProfileGameNetworkProfileIdGameIdGameNetworkId($set_type, $obj);
    }
            
    public function SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId($set_type, $obj) {           
        return $this->data->SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId($set_type, $obj);
    }
            
    public function DelProfileGameNetworkUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameNetworkUuid(
            $uuid
        );
    }
        
    public function DelProfileGameNetworkProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelProfileGameNetworkProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function DelProfileGameNetworkProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {
        return $this->data->DelProfileGameNetworkProfileIdGameIdGameNetworkId(
            $profile_id
            , $game_id
            , $game_network_id
        );
    }
        
    public function DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {
        return $this->data->DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            $network_username
            , $game_id
            , $game_network_id
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
        
    public function GetProfileGameNetworkListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListUuid(
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
        
    public function GetProfileGameNetworkListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListGameId(
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
        
    public function GetProfileGameNetworkListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListProfileId(
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
        
    public function GetProfileGameNetworkListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListProfileIdGameId(
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
        
    public function GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
        $profile_id
        , $game_id
        , $game_network_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            $profile_id
            , $game_id
            , $game_network_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $profile_game_network  = $this->FillProfileGameNetwork($row);
                $results[] = $profile_game_network;
            }
        }
        
        return $results;
    }
        
    public function GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
        $network_username
        , $game_id
        , $game_network_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            $network_username
            , $game_id
            , $game_network_id
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

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
        }
        if ($row['active'] != NULL) {                
            $obj->active = $row['active'];#dataType.FillDataBoolean(dr, "active");
        }
        if ($row['game_id'] != NULL) {                
            $obj->game_id = $row['game_id'];#dataType.FillDataString(dr, "game_id");
        }
        if ($row['name'] != NULL) {                
            $obj->name = $row['name'];#dataType.FillDataString(dr, "name");
        }
        if ($row['uuid'] != NULL) {                
            $obj->uuid = $row['uuid'];#dataType.FillDataString(dr, "uuid");
        }
        if ($row['val'] != NULL) {                
            $obj->val = $row['val'];#dataType.FillDataString(dr, "val");
        }
        if ($row['date_modified'] != NULL) {                
            $obj->date_modified = $row['date_modified'];#dataType.FillDataDate(dr, "date_modified");
        }
        if ($row['otype'] != NULL) {                
            $obj->otype = $row['otype'];#dataType.FillDataString(dr, "otype");
        }
        if ($row['date_created'] != NULL) {                
            $obj->date_created = $row['date_created'];#dataType.FillDataDate(dr, "date_created");
        }
        if ($row['type'] != NULL) {                
            $obj->type = $row['type'];#dataType.FillDataString(dr, "type");
        }

        return $obj;
    }
        
    public function CountProfileGameDataAttribute(
    ) {       
        return $this->data->CountProfileGameDataAttribute(
        );
    }
               
    public function CountProfileGameDataAttributeUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameDataAttributeUuid(
            $uuid
        );
    }
               
    public function CountProfileGameDataAttributeProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameDataAttributeProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {       
        return $this->data->CountProfileGameDataAttributeProfileIdGameIdCode(
            $profile_id
            , $game_id
            , $code
        );
    }
               
    public function BrowseProfileGameDataAttributeListFilter($filter_obj) {
        $result = new ProfileGameDataAttributeResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameDataAttributeListFilter(filter_obj);
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

    public function SetProfileGameDataAttributeUuid($set_type, $obj) {           
        return $this->data->SetProfileGameDataAttributeUuid($set_type, $obj);
    }
            
    public function SetProfileGameDataAttributeProfileId($set_type, $obj) {           
        return $this->data->SetProfileGameDataAttributeProfileId($set_type, $obj);
    }
            
    public function SetProfileGameDataAttributeProfileIdGameIdCode($set_type, $obj) {           
        return $this->data->SetProfileGameDataAttributeProfileIdGameIdCode($set_type, $obj);
    }
            
    public function DelProfileGameDataAttributeUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameDataAttributeUuid(
            $uuid
        );
    }
        
    public function DelProfileGameDataAttributeProfileId(
        $profile_id
    ) {
        return $this->data->DelProfileGameDataAttributeProfileId(
            $profile_id
        );
    }
        
    public function DelProfileGameDataAttributeProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {
        return $this->data->DelProfileGameDataAttributeProfileIdGameIdCode(
            $profile_id
            , $game_id
            , $code
        );
    }
        
    public function GetProfileGameDataAttributeListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameDataAttributeListUuid(
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
        
    public function GetProfileGameDataAttributeListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameDataAttributeListProfileId(
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
        
    public function GetProfileGameDataAttributeListProfileIdGameIdCode(
        $profile_id
        , $game_id
        , $code
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameDataAttributeListProfileIdGameIdCode(
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
               
    public function CountGameSessionUuid(
        $uuid
    ) {       
        return $this->data->CountGameSessionUuid(
            $uuid
        );
    }
               
    public function CountGameSessionGameId(
        $game_id
    ) {       
        return $this->data->CountGameSessionGameId(
            $game_id
        );
    }
               
    public function CountGameSessionProfileId(
        $profile_id
    ) {       
        return $this->data->CountGameSessionProfileId(
            $profile_id
        );
    }
               
    public function CountGameSessionProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameSessionProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameSessionListFilter($filter_obj) {
        $result = new GameSessionResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameSessionListFilter(filter_obj);
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

    public function SetGameSessionUuid($set_type, $obj) {           
        return $this->data->SetGameSessionUuid($set_type, $obj);
    }
            
    public function DelGameSessionUuid(
        $uuid
    ) {
        return $this->data->DelGameSessionUuid(
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
        
    public function GetGameSessionListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListUuid(
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
        
    public function GetGameSessionListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListGameId(
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
        
    public function GetGameSessionListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListProfileId(
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
        
    public function GetGameSessionListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionListProfileIdGameId(
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
               
    public function CountGameSessionDataUuid(
        $uuid
    ) {       
        return $this->data->CountGameSessionDataUuid(
            $uuid
        );
    }
               
    public function BrowseGameSessionDataListFilter($filter_obj) {
        $result = new GameSessionDataResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameSessionDataListFilter(filter_obj);
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

    public function SetGameSessionDataUuid($set_type, $obj) {           
        return $this->data->SetGameSessionDataUuid($set_type, $obj);
    }
            
    public function DelGameSessionDataUuid(
        $uuid
    ) {
        return $this->data->DelGameSessionDataUuid(
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
        
    public function GetGameSessionDataListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameSessionDataListUuid(
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
               
    public function CountGameContentUuid(
        $uuid
    ) {       
        return $this->data->CountGameContentUuid(
            $uuid
        );
    }
               
    public function CountGameContentGameId(
        $game_id
    ) {       
        return $this->data->CountGameContentGameId(
            $game_id
        );
    }
               
    public function CountGameContentGameIdPath(
        $game_id
        , $path
    ) {       
        return $this->data->CountGameContentGameIdPath(
            $game_id
            , $path
        );
    }
               
    public function CountGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {       
        return $this->data->CountGameContentGameIdPathVersion(
            $game_id
            , $path
            , $version
        );
    }
               
    public function CountGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {       
        return $this->data->CountGameContentGameIdPathVersionPlatformIncrement(
            $game_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
               
    public function BrowseGameContentListFilter($filter_obj) {
        $result = new GameContentResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameContentListFilter(filter_obj);
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

    public function SetGameContentUuid($set_type, $obj) {           
        return $this->data->SetGameContentUuid($set_type, $obj);
    }
            
    public function SetGameContentGameId($set_type, $obj) {           
        return $this->data->SetGameContentGameId($set_type, $obj);
    }
            
    public function SetGameContentGameIdPath($set_type, $obj) {           
        return $this->data->SetGameContentGameIdPath($set_type, $obj);
    }
            
    public function SetGameContentGameIdPathVersion($set_type, $obj) {           
        return $this->data->SetGameContentGameIdPathVersion($set_type, $obj);
    }
            
    public function SetGameContentGameIdPathVersionPlatformIncrement($set_type, $obj) {           
        return $this->data->SetGameContentGameIdPathVersionPlatformIncrement($set_type, $obj);
    }
            
    public function DelGameContentUuid(
        $uuid
    ) {
        return $this->data->DelGameContentUuid(
            $uuid
        );
    }
        
    public function DelGameContentGameId(
        $game_id
    ) {
        return $this->data->DelGameContentGameId(
            $game_id
        );
    }
        
    public function DelGameContentGameIdPath(
        $game_id
        , $path
    ) {
        return $this->data->DelGameContentGameIdPath(
            $game_id
            , $path
        );
    }
        
    public function DelGameContentGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {
        return $this->data->DelGameContentGameIdPathVersion(
            $game_id
            , $path
            , $version
        );
    }
        
    public function DelGameContentGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->data->DelGameContentGameIdPathVersionPlatformIncrement(
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
        
    public function GetGameContentListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListUuid(
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
        
    public function GetGameContentListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListGameId(
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
        
    public function GetGameContentListGameIdPath(
        $game_id
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListGameIdPath(
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
        
    public function GetGameContentListGameIdPathVersion(
        $game_id
        , $path
        , $version
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListGameIdPathVersion(
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
        
    public function GetGameContentListGameIdPathVersionPlatformIncrement(
        $game_id
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $results = array();
        $rows = $this->data->GetGameContentListGameIdPathVersionPlatformIncrement(
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
               
    public function CountGameProfileContentUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileContentUuid(
            $uuid
        );
    }
               
    public function CountGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
    ) {       
        return $this->data->CountGameProfileContentGameIdProfileId(
            $game_id
            , $profile_id
        );
    }
               
    public function CountGameProfileContentGameIdUsername(
        $game_id
        , $username
    ) {       
        return $this->data->CountGameProfileContentGameIdUsername(
            $game_id
            , $username
        );
    }
               
    public function CountGameProfileContentUsername(
        $username
    ) {       
        return $this->data->CountGameProfileContentUsername(
            $username
        );
    }
               
    public function CountGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {       
        return $this->data->CountGameProfileContentGameIdProfileIdPath(
            $game_id
            , $profile_id
            , $path
        );
    }
               
    public function CountGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {       
        return $this->data->CountGameProfileContentGameIdProfileIdPathVersion(
            $game_id
            , $profile_id
            , $path
            , $version
        );
    }
               
    public function CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {       
        return $this->data->CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            $game_id
            , $profile_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
               
    public function CountGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {       
        return $this->data->CountGameProfileContentGameIdUsernamePath(
            $game_id
            , $username
            , $path
        );
    }
               
    public function CountGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {       
        return $this->data->CountGameProfileContentGameIdUsernamePathVersion(
            $game_id
            , $username
            , $path
            , $version
        );
    }
               
    public function CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {       
        return $this->data->CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            $game_id
            , $username
            , $path
            , $version
            , $platform
            , $increment
        );
    }
               
    public function BrowseGameProfileContentListFilter($filter_obj) {
        $result = new GameProfileContentResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileContentListFilter(filter_obj);
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

    public function SetGameProfileContentUuid($set_type, $obj) {           
        return $this->data->SetGameProfileContentUuid($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdProfileId($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdProfileId($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdUsername($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdUsername($set_type, $obj);
    }
            
    public function SetGameProfileContentUsername($set_type, $obj) {           
        return $this->data->SetGameProfileContentUsername($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdProfileIdPath($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdProfileIdPath($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdProfileIdPathVersion($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdProfileIdPathVersion($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdUsernamePath($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdUsernamePath($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdUsernamePathVersion($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdUsernamePathVersion($set_type, $obj);
    }
            
    public function SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement($set_type, $obj) {           
        return $this->data->SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement($set_type, $obj);
    }
            
    public function DelGameProfileContentUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileContentUuid(
            $uuid
        );
    }
        
    public function DelGameProfileContentGameIdProfileId(
        $game_id
        , $profile_id
    ) {
        return $this->data->DelGameProfileContentGameIdProfileId(
            $game_id
            , $profile_id
        );
    }
        
    public function DelGameProfileContentGameIdUsername(
        $game_id
        , $username
    ) {
        return $this->data->DelGameProfileContentGameIdUsername(
            $game_id
            , $username
        );
    }
        
    public function DelGameProfileContentUsername(
        $username
    ) {
        return $this->data->DelGameProfileContentUsername(
            $username
        );
    }
        
    public function DelGameProfileContentGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {
        return $this->data->DelGameProfileContentGameIdProfileIdPath(
            $game_id
            , $profile_id
            , $path
        );
    }
        
    public function DelGameProfileContentGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {
        return $this->data->DelGameProfileContentGameIdProfileIdPathVersion(
            $game_id
            , $profile_id
            , $path
            , $version
        );
    }
        
    public function DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->data->DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            $game_id
            , $profile_id
            , $path
            , $version
            , $platform
            , $increment
        );
    }
        
    public function DelGameProfileContentGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {
        return $this->data->DelGameProfileContentGameIdUsernamePath(
            $game_id
            , $username
            , $path
        );
    }
        
    public function DelGameProfileContentGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {
        return $this->data->DelGameProfileContentGameIdUsernamePathVersion(
            $game_id
            , $username
            , $path
            , $version
        );
    }
        
    public function DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {
        return $this->data->DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
        
    public function GetGameProfileContentListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListUuid(
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
        
    public function GetGameProfileContentListGameIdProfileId(
        $game_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdProfileId(
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
        
    public function GetGameProfileContentListGameIdUsername(
        $game_id
        , $username
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdUsername(
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
        
    public function GetGameProfileContentListUsername(
        $username
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListUsername(
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
        
    public function GetGameProfileContentListGameIdProfileIdPath(
        $game_id
        , $profile_id
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdProfileIdPath(
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
        
    public function GetGameProfileContentListGameIdProfileIdPathVersion(
        $game_id
        , $profile_id
        , $path
        , $version
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdProfileIdPathVersion(
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
        
    public function GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
        $game_id
        , $profile_id
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
        
    public function GetGameProfileContentListGameIdUsernamePath(
        $game_id
        , $username
        , $path
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdUsernamePath(
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
        
    public function GetGameProfileContentListGameIdUsernamePathVersion(
        $game_id
        , $username
        , $path
        , $version
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdUsernamePathVersion(
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
        
    public function GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
        $game_id
        , $username
        , $path
        , $version
        , $platform
        , $increment
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
               
    public function CountGameAppUuid(
        $uuid
    ) {       
        return $this->data->CountGameAppUuid(
            $uuid
        );
    }
               
    public function CountGameAppGameId(
        $game_id
    ) {       
        return $this->data->CountGameAppGameId(
            $game_id
        );
    }
               
    public function CountGameAppAppId(
        $app_id
    ) {       
        return $this->data->CountGameAppAppId(
            $app_id
        );
    }
               
    public function CountGameAppGameIdAppId(
        $game_id
        , $app_id
    ) {       
        return $this->data->CountGameAppGameIdAppId(
            $game_id
            , $app_id
        );
    }
               
    public function BrowseGameAppListFilter($filter_obj) {
        $result = new GameAppResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameAppListFilter(filter_obj);
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

    public function SetGameAppUuid($set_type, $obj) {           
        return $this->data->SetGameAppUuid($set_type, $obj);
    }
            
    public function DelGameAppUuid(
        $uuid
    ) {
        return $this->data->DelGameAppUuid(
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
        
    public function GetGameAppListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListUuid(
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
        
    public function GetGameAppListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListGameId(
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
        
    public function GetGameAppListAppId(
        $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListAppId(
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
        
    public function GetGameAppListGameIdAppId(
        $game_id
        , $app_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAppListGameIdAppId(
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
               
    public function CountProfileGameLocationUuid(
        $uuid
    ) {       
        return $this->data->CountProfileGameLocationUuid(
            $uuid
        );
    }
               
    public function CountProfileGameLocationGameLocationId(
        $game_location_id
    ) {       
        return $this->data->CountProfileGameLocationGameLocationId(
            $game_location_id
        );
    }
               
    public function CountProfileGameLocationProfileId(
        $profile_id
    ) {       
        return $this->data->CountProfileGameLocationProfileId(
            $profile_id
        );
    }
               
    public function CountProfileGameLocationProfileIdGameLocationId(
        $profile_id
        , $game_location_id
    ) {       
        return $this->data->CountProfileGameLocationProfileIdGameLocationId(
            $profile_id
            , $game_location_id
        );
    }
               
    public function BrowseProfileGameLocationListFilter($filter_obj) {
        $result = new ProfileGameLocationResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseProfileGameLocationListFilter(filter_obj);
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

    public function SetProfileGameLocationUuid($set_type, $obj) {           
        return $this->data->SetProfileGameLocationUuid($set_type, $obj);
    }
            
    public function DelProfileGameLocationUuid(
        $uuid
    ) {
        return $this->data->DelProfileGameLocationUuid(
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
        
    public function GetProfileGameLocationListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListUuid(
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
        
    public function GetProfileGameLocationListGameLocationId(
        $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListGameLocationId(
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
        
    public function GetProfileGameLocationListProfileId(
        $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListProfileId(
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
        
    public function GetProfileGameLocationListProfileIdGameLocationId(
        $profile_id
        , $game_location_id
    ) {

        $results = array();
        $rows = $this->data->GetProfileGameLocationListProfileIdGameLocationId(
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
               
    public function CountGamePhotoUuid(
        $uuid
    ) {       
        return $this->data->CountGamePhotoUuid(
            $uuid
        );
    }
               
    public function CountGamePhotoExternalId(
        $external_id
    ) {       
        return $this->data->CountGamePhotoExternalId(
            $external_id
        );
    }
               
    public function CountGamePhotoUrl(
        $url
    ) {       
        return $this->data->CountGamePhotoUrl(
            $url
        );
    }
               
    public function CountGamePhotoUrlExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountGamePhotoUrlExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountGamePhotoUuidExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountGamePhotoUuidExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowseGamePhotoListFilter($filter_obj) {
        $result = new GamePhotoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGamePhotoListFilter(filter_obj);
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

    public function SetGamePhotoUuid($set_type, $obj) {           
        return $this->data->SetGamePhotoUuid($set_type, $obj);
    }
            
    public function SetGamePhotoExternalId($set_type, $obj) {           
        return $this->data->SetGamePhotoExternalId($set_type, $obj);
    }
            
    public function SetGamePhotoUrl($set_type, $obj) {           
        return $this->data->SetGamePhotoUrl($set_type, $obj);
    }
            
    public function SetGamePhotoUrlExternalId($set_type, $obj) {           
        return $this->data->SetGamePhotoUrlExternalId($set_type, $obj);
    }
            
    public function SetGamePhotoUuidExternalId($set_type, $obj) {           
        return $this->data->SetGamePhotoUuidExternalId($set_type, $obj);
    }
            
    public function DelGamePhotoUuid(
        $uuid
    ) {
        return $this->data->DelGamePhotoUuid(
            $uuid
        );
    }
        
    public function DelGamePhotoExternalId(
        $external_id
    ) {
        return $this->data->DelGamePhotoExternalId(
            $external_id
        );
    }
        
    public function DelGamePhotoUrl(
        $url
    ) {
        return $this->data->DelGamePhotoUrl(
            $url
        );
    }
        
    public function DelGamePhotoUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelGamePhotoUrlExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelGamePhotoUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelGamePhotoUuidExternalId(
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
        
    public function GetGamePhotoListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListUuid(
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
        
    public function GetGamePhotoListExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListExternalId(
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
        
    public function GetGamePhotoListUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListUrl(
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
        
    public function GetGamePhotoListUrlExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListUrlExternalId(
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
        
    public function GetGamePhotoListUuidExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGamePhotoListUuidExternalId(
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
               
    public function CountGameVideoUuid(
        $uuid
    ) {       
        return $this->data->CountGameVideoUuid(
            $uuid
        );
    }
               
    public function CountGameVideoExternalId(
        $external_id
    ) {       
        return $this->data->CountGameVideoExternalId(
            $external_id
        );
    }
               
    public function CountGameVideoUrl(
        $url
    ) {       
        return $this->data->CountGameVideoUrl(
            $url
        );
    }
               
    public function CountGameVideoUrlExternalId(
        $url
        , $external_id
    ) {       
        return $this->data->CountGameVideoUrlExternalId(
            $url
            , $external_id
        );
    }
               
    public function CountGameVideoUuidExternalId(
        $uuid
        , $external_id
    ) {       
        return $this->data->CountGameVideoUuidExternalId(
            $uuid
            , $external_id
        );
    }
               
    public function BrowseGameVideoListFilter($filter_obj) {
        $result = new GameVideoResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameVideoListFilter(filter_obj);
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

    public function SetGameVideoUuid($set_type, $obj) {           
        return $this->data->SetGameVideoUuid($set_type, $obj);
    }
            
    public function SetGameVideoExternalId($set_type, $obj) {           
        return $this->data->SetGameVideoExternalId($set_type, $obj);
    }
            
    public function SetGameVideoUrl($set_type, $obj) {           
        return $this->data->SetGameVideoUrl($set_type, $obj);
    }
            
    public function SetGameVideoUrlExternalId($set_type, $obj) {           
        return $this->data->SetGameVideoUrlExternalId($set_type, $obj);
    }
            
    public function SetGameVideoUuidExternalId($set_type, $obj) {           
        return $this->data->SetGameVideoUuidExternalId($set_type, $obj);
    }
            
    public function DelGameVideoUuid(
        $uuid
    ) {
        return $this->data->DelGameVideoUuid(
            $uuid
        );
    }
        
    public function DelGameVideoExternalId(
        $external_id
    ) {
        return $this->data->DelGameVideoExternalId(
            $external_id
        );
    }
        
    public function DelGameVideoUrl(
        $url
    ) {
        return $this->data->DelGameVideoUrl(
            $url
        );
    }
        
    public function DelGameVideoUrlExternalId(
        $url
        , $external_id
    ) {
        return $this->data->DelGameVideoUrlExternalId(
            $url
            , $external_id
        );
    }
        
    public function DelGameVideoUuidExternalId(
        $uuid
        , $external_id
    ) {
        return $this->data->DelGameVideoUuidExternalId(
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
        
    public function GetGameVideoListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListUuid(
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
        
    public function GetGameVideoListExternalId(
        $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListExternalId(
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
        
    public function GetGameVideoListUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListUrl(
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
        
    public function GetGameVideoListUrlExternalId(
        $url
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListUrlExternalId(
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
        
    public function GetGameVideoListUuidExternalId(
        $uuid
        , $external_id
    ) {

        $results = array();
        $rows = $this->data->GetGameVideoListUuidExternalId(
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
               
    public function CountGameRpgItemWeaponUuid(
        $uuid
    ) {       
        return $this->data->CountGameRpgItemWeaponUuid(
            $uuid
        );
    }
               
    public function CountGameRpgItemWeaponGameId(
        $game_id
    ) {       
        return $this->data->CountGameRpgItemWeaponGameId(
            $game_id
        );
    }
               
    public function CountGameRpgItemWeaponUrl(
        $url
    ) {       
        return $this->data->CountGameRpgItemWeaponUrl(
            $url
        );
    }
               
    public function CountGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemWeaponUrlGameId(
            $url
            , $game_id
        );
    }
               
    public function CountGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemWeaponUuidGameId(
            $uuid
            , $game_id
        );
    }
               
    public function BrowseGameRpgItemWeaponListFilter($filter_obj) {
        $result = new GameRpgItemWeaponResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameRpgItemWeaponListFilter(filter_obj);
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

    public function SetGameRpgItemWeaponUuid($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponUuid($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponUrl($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponUrl($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponUrlGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponUrlGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemWeaponUuidGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemWeaponUuidGameId($set_type, $obj);
    }
            
    public function DelGameRpgItemWeaponUuid(
        $uuid
    ) {
        return $this->data->DelGameRpgItemWeaponUuid(
            $uuid
        );
    }
        
    public function DelGameRpgItemWeaponGameId(
        $game_id
    ) {
        return $this->data->DelGameRpgItemWeaponGameId(
            $game_id
        );
    }
        
    public function DelGameRpgItemWeaponUrl(
        $url
    ) {
        return $this->data->DelGameRpgItemWeaponUrl(
            $url
        );
    }
        
    public function DelGameRpgItemWeaponUrlGameId(
        $url
        , $game_id
    ) {
        return $this->data->DelGameRpgItemWeaponUrlGameId(
            $url
            , $game_id
        );
    }
        
    public function DelGameRpgItemWeaponUuidGameId(
        $uuid
        , $game_id
    ) {
        return $this->data->DelGameRpgItemWeaponUuidGameId(
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
        
    public function GetGameRpgItemWeaponListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListUuid(
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
        
    public function GetGameRpgItemWeaponListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListGameId(
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
        
    public function GetGameRpgItemWeaponListUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListUrl(
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
        
    public function GetGameRpgItemWeaponListUrlGameId(
        $url
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListUrlGameId(
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
        
    public function GetGameRpgItemWeaponListUuidGameId(
        $uuid
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemWeaponListUuidGameId(
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
               
    public function CountGameRpgItemSkillUuid(
        $uuid
    ) {       
        return $this->data->CountGameRpgItemSkillUuid(
            $uuid
        );
    }
               
    public function CountGameRpgItemSkillGameId(
        $game_id
    ) {       
        return $this->data->CountGameRpgItemSkillGameId(
            $game_id
        );
    }
               
    public function CountGameRpgItemSkillUrl(
        $url
    ) {       
        return $this->data->CountGameRpgItemSkillUrl(
            $url
        );
    }
               
    public function CountGameRpgItemSkillUrlGameId(
        $url
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemSkillUrlGameId(
            $url
            , $game_id
        );
    }
               
    public function CountGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
    ) {       
        return $this->data->CountGameRpgItemSkillUuidGameId(
            $uuid
            , $game_id
        );
    }
               
    public function BrowseGameRpgItemSkillListFilter($filter_obj) {
        $result = new GameRpgItemSkillResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameRpgItemSkillListFilter(filter_obj);
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

    public function SetGameRpgItemSkillUuid($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillUuid($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillUrl($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillUrl($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillUrlGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillUrlGameId($set_type, $obj);
    }
            
    public function SetGameRpgItemSkillUuidGameId($set_type, $obj) {           
        return $this->data->SetGameRpgItemSkillUuidGameId($set_type, $obj);
    }
            
    public function DelGameRpgItemSkillUuid(
        $uuid
    ) {
        return $this->data->DelGameRpgItemSkillUuid(
            $uuid
        );
    }
        
    public function DelGameRpgItemSkillGameId(
        $game_id
    ) {
        return $this->data->DelGameRpgItemSkillGameId(
            $game_id
        );
    }
        
    public function DelGameRpgItemSkillUrl(
        $url
    ) {
        return $this->data->DelGameRpgItemSkillUrl(
            $url
        );
    }
        
    public function DelGameRpgItemSkillUrlGameId(
        $url
        , $game_id
    ) {
        return $this->data->DelGameRpgItemSkillUrlGameId(
            $url
            , $game_id
        );
    }
        
    public function DelGameRpgItemSkillUuidGameId(
        $uuid
        , $game_id
    ) {
        return $this->data->DelGameRpgItemSkillUuidGameId(
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
        
    public function GetGameRpgItemSkillListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListUuid(
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
        
    public function GetGameRpgItemSkillListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListGameId(
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
        
    public function GetGameRpgItemSkillListUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListUrl(
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
        
    public function GetGameRpgItemSkillListUrlGameId(
        $url
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListUrlGameId(
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
        
    public function GetGameRpgItemSkillListUuidGameId(
        $uuid
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameRpgItemSkillListUuidGameId(
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
               
    public function CountGameProductUuid(
        $uuid
    ) {       
        return $this->data->CountGameProductUuid(
            $uuid
        );
    }
               
    public function CountGameProductGameId(
        $game_id
    ) {       
        return $this->data->CountGameProductGameId(
            $game_id
        );
    }
               
    public function CountGameProductUrl(
        $url
    ) {       
        return $this->data->CountGameProductUrl(
            $url
        );
    }
               
    public function CountGameProductUrlGameId(
        $url
        , $game_id
    ) {       
        return $this->data->CountGameProductUrlGameId(
            $url
            , $game_id
        );
    }
               
    public function CountGameProductUuidGameId(
        $uuid
        , $game_id
    ) {       
        return $this->data->CountGameProductUuidGameId(
            $uuid
            , $game_id
        );
    }
               
    public function BrowseGameProductListFilter($filter_obj) {
        $result = new GameProductResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProductListFilter(filter_obj);
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

    public function SetGameProductUuid($set_type, $obj) {           
        return $this->data->SetGameProductUuid($set_type, $obj);
    }
            
    public function SetGameProductGameId($set_type, $obj) {           
        return $this->data->SetGameProductGameId($set_type, $obj);
    }
            
    public function SetGameProductUrl($set_type, $obj) {           
        return $this->data->SetGameProductUrl($set_type, $obj);
    }
            
    public function SetGameProductUrlGameId($set_type, $obj) {           
        return $this->data->SetGameProductUrlGameId($set_type, $obj);
    }
            
    public function SetGameProductUuidGameId($set_type, $obj) {           
        return $this->data->SetGameProductUuidGameId($set_type, $obj);
    }
            
    public function DelGameProductUuid(
        $uuid
    ) {
        return $this->data->DelGameProductUuid(
            $uuid
        );
    }
        
    public function DelGameProductGameId(
        $game_id
    ) {
        return $this->data->DelGameProductGameId(
            $game_id
        );
    }
        
    public function DelGameProductUrl(
        $url
    ) {
        return $this->data->DelGameProductUrl(
            $url
        );
    }
        
    public function DelGameProductUrlGameId(
        $url
        , $game_id
    ) {
        return $this->data->DelGameProductUrlGameId(
            $url
            , $game_id
        );
    }
        
    public function DelGameProductUuidGameId(
        $uuid
        , $game_id
    ) {
        return $this->data->DelGameProductUuidGameId(
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
        
    public function GetGameProductListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListUuid(
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
        
    public function GetGameProductListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListGameId(
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
        
    public function GetGameProductListUrl(
        $url
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListUrl(
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
        
    public function GetGameProductListUrlGameId(
        $url
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListUrlGameId(
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
        
    public function GetGameProductListUuidGameId(
        $uuid
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProductListUuidGameId(
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
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
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
        if ($row['absolute_value'] != NULL) {                
            $obj->absolute_value = $row['absolute_value'];#dataType.FillDataFloat(dr, "absolute_value");
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
               
    public function CountGameStatisticLeaderboardUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticLeaderboardUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticLeaderboardGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardGameId(
            $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardCode(
        $code
    ) {       
        return $this->data->CountGameStatisticLeaderboardCode(
            $code
        );
    }
               
    public function CountGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
    }
               
    public function CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {       
        return $this->data->CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
               
    public function CountGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameStatisticLeaderboardListFilter($filter_obj) {
        $result = new GameStatisticLeaderboardResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticLeaderboardListFilter(filter_obj);
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

    public function SetGameStatisticLeaderboardUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardUuid($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardCode($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardCode($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardCodeGameId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardCodeGameId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardCodeGameIdProfileId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardCodeGameIdProfileId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp($set_type, $obj);
    }
            
    public function DelGameStatisticLeaderboardUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticLeaderboardUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticLeaderboardCode(
        $code
    ) {
        return $this->data->DelGameStatisticLeaderboardCode(
            $code
        );
    }
        
    public function DelGameStatisticLeaderboardCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function DelGameStatisticLeaderboardCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->data->DelGameStatisticLeaderboardCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
    }
        
    public function DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->data->DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
        
    public function DelGameStatisticLeaderboardProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardProfileIdGameId(
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
        
    public function GetGameStatisticLeaderboardListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListUuid(
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
        
    public function GetGameStatisticLeaderboardListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListGameId(
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
        
    public function GetGameStatisticLeaderboardListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListCodeGameId(
            $code
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
        
    public function GetGameStatisticLeaderboardListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard  = $this->FillGameStatisticLeaderboard($row);
                $results[] = $game_statistic_leaderboard;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
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
        
    public function GetGameStatisticLeaderboardListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListProfileIdGameId(
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
        
    public function GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
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
        
        
    public function FillGameStatisticLeaderboardItem($row) {
        $obj = new GameStatisticLeaderboardItem();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
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
        if ($row['absolute_value'] != NULL) {                
            $obj->absolute_value = $row['absolute_value'];#dataType.FillDataFloat(dr, "absolute_value");
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
        
    public function CountGameStatisticLeaderboardItem(
    ) {       
        return $this->data->CountGameStatisticLeaderboardItem(
        );
    }
               
    public function CountGameStatisticLeaderboardItemUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticLeaderboardItemUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticLeaderboardItemGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardItemGameId(
            $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardItemCode(
        $code
    ) {       
        return $this->data->CountGameStatisticLeaderboardItemCode(
            $code
        );
    }
               
    public function CountGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardItemCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardItemCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
    }
               
    public function CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {       
        return $this->data->CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
               
    public function CountGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardItemProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameStatisticLeaderboardItemListFilter($filter_obj) {
        $result = new GameStatisticLeaderboardItemResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticLeaderboardItemListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item = $this->FillGameStatisticLeaderboardItem($row);
                $result->data[] = $game_statistic_leaderboard_item;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameStatisticLeaderboardItemUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardItemUuid($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardItemCode($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardItemCode($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardItemCodeGameId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardItemCodeGameId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardItemCodeGameIdProfileId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp($set_type, $obj);
    }
            
    public function DelGameStatisticLeaderboardItemUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticLeaderboardItemUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticLeaderboardItemCode(
        $code
    ) {
        return $this->data->DelGameStatisticLeaderboardItemCode(
            $code
        );
    }
        
    public function DelGameStatisticLeaderboardItemCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardItemCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function DelGameStatisticLeaderboardItemCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->data->DelGameStatisticLeaderboardItemCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
    }
        
    public function DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->data->DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
        
    public function DelGameStatisticLeaderboardItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardItemProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function GetGameStatisticLeaderboardItemList(
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemList(
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListCodeGameId(
            $code
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListProfileIdGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_item  = $this->FillGameStatisticLeaderboardItem($row);
                $results[] = $game_statistic_leaderboard_item;
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
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
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
        if ($row['absolute_value'] != NULL) {                
            $obj->absolute_value = $row['absolute_value'];#dataType.FillDataFloat(dr, "absolute_value");
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
               
    public function CountGameStatisticLeaderboardRollupUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticLeaderboardRollupGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupGameId(
            $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardRollupCode(
        $code
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupCode(
            $code
        );
    }
               
    public function CountGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
    }
               
    public function CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
               
    public function CountGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameStatisticLeaderboardRollupProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameStatisticLeaderboardRollupListFilter($filter_obj) {
        $result = new GameStatisticLeaderboardRollupResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticLeaderboardRollupListFilter(filter_obj);
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

    public function SetGameStatisticLeaderboardRollupUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupUuid($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupCode($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupCode($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupCodeGameId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupCodeGameId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileId($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupCodeGameIdProfileId($set_type, $obj);
    }
            
    public function SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp($set_type, $obj);
    }
            
    public function DelGameStatisticLeaderboardRollupUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticLeaderboardRollupCode(
        $code
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupCode(
            $code
        );
    }
        
    public function DelGameStatisticLeaderboardRollupCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
    }
        
    public function DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
            , $timestamp
        );
    }
        
    public function DelGameStatisticLeaderboardRollupProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameStatisticLeaderboardRollupProfileIdGameId(
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
        
    public function GetGameStatisticLeaderboardRollupListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListUuid(
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
        
    public function GetGameStatisticLeaderboardRollupListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListGameId(
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
        
    public function GetGameStatisticLeaderboardRollupListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListCodeGameId(
            $code
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
        
    public function GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
        $code
        , $game_id
        , $profile_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            $code
            , $game_id
            , $profile_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_statistic_leaderboard_rollup  = $this->FillGameStatisticLeaderboardRollup($row);
                $results[] = $game_statistic_leaderboard_rollup;
            }
        }
        
        return $results;
    }
        
    public function GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
        $code
        , $game_id
        , $profile_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            $code
            , $game_id
            , $profile_id
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
        
    public function GetGameStatisticLeaderboardRollupListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListProfileIdGameId(
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
        
    public function GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
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
               
    public function CountGameLiveQueueUuid(
        $uuid
    ) {       
        return $this->data->CountGameLiveQueueUuid(
            $uuid
        );
    }
               
    public function CountGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameLiveQueueProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameLiveQueueListFilter($filter_obj) {
        $result = new GameLiveQueueResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameLiveQueueListFilter(filter_obj);
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

    public function SetGameLiveQueueUuid($set_type, $obj) {           
        return $this->data->SetGameLiveQueueUuid($set_type, $obj);
    }
            
    public function SetGameLiveQueueProfileIdGameId($set_type, $obj) {           
        return $this->data->SetGameLiveQueueProfileIdGameId($set_type, $obj);
    }
            
    public function DelGameLiveQueueUuid(
        $uuid
    ) {
        return $this->data->DelGameLiveQueueUuid(
            $uuid
        );
    }
        
    public function DelGameLiveQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameLiveQueueProfileIdGameId(
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
        
    public function GetGameLiveQueueListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveQueueListUuid(
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
        
    public function GetGameLiveQueueListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveQueueListGameId(
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
        
    public function GetGameLiveQueueListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveQueueListProfileIdGameId(
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
               
    public function CountGameLiveRecentQueueUuid(
        $uuid
    ) {       
        return $this->data->CountGameLiveRecentQueueUuid(
            $uuid
        );
    }
               
    public function CountGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameLiveRecentQueueProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function BrowseGameLiveRecentQueueListFilter($filter_obj) {
        $result = new GameLiveRecentQueueResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameLiveRecentQueueListFilter(filter_obj);
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

    public function SetGameLiveRecentQueueUuid($set_type, $obj) {           
        return $this->data->SetGameLiveRecentQueueUuid($set_type, $obj);
    }
            
    public function SetGameLiveRecentQueueProfileIdGameId($set_type, $obj) {           
        return $this->data->SetGameLiveRecentQueueProfileIdGameId($set_type, $obj);
    }
            
    public function DelGameLiveRecentQueueUuid(
        $uuid
    ) {
        return $this->data->DelGameLiveRecentQueueUuid(
            $uuid
        );
    }
        
    public function DelGameLiveRecentQueueProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameLiveRecentQueueProfileIdGameId(
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
        
    public function GetGameLiveRecentQueueListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveRecentQueueListUuid(
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
        
    public function GetGameLiveRecentQueueListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveRecentQueueListGameId(
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
        
    public function GetGameLiveRecentQueueListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLiveRecentQueueListProfileIdGameId(
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
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['stat_value_formatted'] != NULL) {                
            $obj->stat_value_formatted = $row['stat_value_formatted'];#dataType.FillDataString(dr, "stat_value_formatted");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
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
        
    public function CountGameProfileStatistic(
    ) {       
        return $this->data->CountGameProfileStatistic(
        );
    }
               
    public function CountGameProfileStatisticUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileStatisticUuid(
            $uuid
        );
    }
               
    public function CountGameProfileStatisticCode(
        $code
    ) {       
        return $this->data->CountGameProfileStatisticCode(
            $code
        );
    }
               
    public function CountGameProfileStatisticGameId(
        $game_id
    ) {       
        return $this->data->CountGameProfileStatisticGameId(
            $game_id
        );
    }
               
    public function CountGameProfileStatisticCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticCodeProfileIdGameId(
            $code
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
            $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameProfileStatisticListFilter($filter_obj) {
        $result = new GameProfileStatisticResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileStatisticListFilter(filter_obj);
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

    public function SetGameProfileStatisticUuid($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticUuid($set_type, $obj);
    }
            
    public function SetGameProfileStatisticUuidProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticProfileIdCode($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticProfileIdCode($set_type, $obj);
    }
            
    public function SetGameProfileStatisticProfileIdCodeTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticProfileIdCodeTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticCodeProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticCodeProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticCodeProfileIdGameId($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticCodeProfileIdGameId($set_type, $obj);
    }
            
    public function DelGameProfileStatisticUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileStatisticUuid(
            $uuid
        );
    }
        
    public function DelGameProfileStatisticCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function DelGameProfileStatisticProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function DelGameProfileStatisticCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticCodeProfileIdGameId(
            $code
            , $profile_id
            , $game_id
        );
    }
        
    public function GetGameProfileStatisticListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListUuid(
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
        
    public function GetGameProfileStatisticListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic  = $this->FillGameProfileStatistic($row);
                $results[] = $game_profile_statistic;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListGameId(
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
        
    public function GetGameProfileStatisticListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListCodeGameId(
            $code
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
        
    public function GetGameProfileStatisticListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListProfileIdGameId(
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
        
    public function GetGameProfileStatisticListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListProfileIdGameIdTimestamp(
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
        
    public function GetGameProfileStatisticListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListCodeProfileIdGameId(
            $code
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
        
    public function GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            $code
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
               
    public function CountGameStatisticMetaUuid(
        $uuid
    ) {       
        return $this->data->CountGameStatisticMetaUuid(
            $uuid
        );
    }
               
    public function CountGameStatisticMetaCode(
        $code
    ) {       
        return $this->data->CountGameStatisticMetaCode(
            $code
        );
    }
               
    public function CountGameStatisticMetaCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameStatisticMetaCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameStatisticMetaName(
        $name
    ) {       
        return $this->data->CountGameStatisticMetaName(
            $name
        );
    }
               
    public function CountGameStatisticMetaGameId(
        $game_id
    ) {       
        return $this->data->CountGameStatisticMetaGameId(
            $game_id
        );
    }
               
    public function BrowseGameStatisticMetaListFilter($filter_obj) {
        $result = new GameStatisticMetaResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameStatisticMetaListFilter(filter_obj);
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

    public function SetGameStatisticMetaUuid($set_type, $obj) {           
        return $this->data->SetGameStatisticMetaUuid($set_type, $obj);
    }
            
    public function SetGameStatisticMetaCodeGameId($set_type, $obj) {           
        return $this->data->SetGameStatisticMetaCodeGameId($set_type, $obj);
    }
            
    public function DelGameStatisticMetaUuid(
        $uuid
    ) {
        return $this->data->DelGameStatisticMetaUuid(
            $uuid
        );
    }
        
    public function DelGameStatisticMetaCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameStatisticMetaCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function GetGameStatisticMetaListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListUuid(
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
        
    public function GetGameStatisticMetaListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListCode(
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
        
    public function GetGameStatisticMetaListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListName(
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
        
    public function GetGameStatisticMetaListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListGameId(
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
        
    public function GetGameStatisticMetaListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameStatisticMetaListCodeGameId(
            $code
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
        
        
    public function FillGameProfileStatisticItem($row) {
        $obj = new GameProfileStatisticItem();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
        }
        if ($row['stat_value_formatted'] != NULL) {                
            $obj->stat_value_formatted = $row['stat_value_formatted'];#dataType.FillDataString(dr, "stat_value_formatted");
        }
        if ($row['profile_id'] != NULL) {                
            $obj->profile_id = $row['profile_id'];#dataType.FillDataString(dr, "profile_id");
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
        
    public function CountGameProfileStatisticItem(
    ) {       
        return $this->data->CountGameProfileStatisticItem(
        );
    }
               
    public function CountGameProfileStatisticItemUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileStatisticItemUuid(
            $uuid
        );
    }
               
    public function CountGameProfileStatisticItemCode(
        $code
    ) {       
        return $this->data->CountGameProfileStatisticItemCode(
            $code
        );
    }
               
    public function CountGameProfileStatisticItemGameId(
        $game_id
    ) {       
        return $this->data->CountGameProfileStatisticItemGameId(
            $game_id
        );
    }
               
    public function CountGameProfileStatisticItemCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticItemCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticItemProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticItemCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileStatisticItemCodeProfileIdGameId(
            $code
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
            $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameProfileStatisticItemListFilter($filter_obj) {
        $result = new GameProfileStatisticItemResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileStatisticItemListFilter(filter_obj);
        if($rows != None) {
            foreach ($rows as $row) {
                $game_profile_statistic_item = $this->FillGameProfileStatisticItem($row);
                $result->data[] = $game_profile_statistic_item;
                if($row["total_rows"] != NULL) {
                    $result->total_rows = $row["total_rows"];
                }
            }
        }
        
        return $result;
    }

    public function SetGameProfileStatisticItemUuid($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticItemUuid($set_type, $obj);
    }
            
    public function SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticItemProfileIdCode($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticItemProfileIdCode($set_type, $obj);
    }
            
    public function SetGameProfileStatisticItemProfileIdCodeTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticItemProfileIdCodeTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function SetGameProfileStatisticItemCodeProfileIdGameId($set_type, $obj) {           
        return $this->data->SetGameProfileStatisticItemCodeProfileIdGameId($set_type, $obj);
    }
            
    public function DelGameProfileStatisticItemUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileStatisticItemUuid(
            $uuid
        );
    }
        
    public function DelGameProfileStatisticItemCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticItemCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function DelGameProfileStatisticItemProfileIdGameId(
        $profile_id
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticItemProfileIdGameId(
            $profile_id
            , $game_id
        );
    }
        
    public function DelGameProfileStatisticItemCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {
        return $this->data->DelGameProfileStatisticItemCodeProfileIdGameId(
            $code
            , $profile_id
            , $game_id
        );
    }
        
    public function GetGameProfileStatisticItemListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListUuid(
            $uuid
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticItemListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticItemListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListGameId(
            $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticItemListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListCodeGameId(
            $code
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticItemListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListProfileIdGameId(
            $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticItemListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListCodeProfileIdGameId(
            $code
            , $profile_id
            , $game_id
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            $code
            , $profile_id
            , $game_id
            , $timestamp
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_statistic_item  = $this->FillGameProfileStatisticItem($row);
                $results[] = $game_profile_statistic_item;
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
               
    public function CountGameKeyMetaUuid(
        $uuid
    ) {       
        return $this->data->CountGameKeyMetaUuid(
            $uuid
        );
    }
               
    public function CountGameKeyMetaCode(
        $code
    ) {       
        return $this->data->CountGameKeyMetaCode(
            $code
        );
    }
               
    public function CountGameKeyMetaCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameKeyMetaCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameKeyMetaName(
        $name
    ) {       
        return $this->data->CountGameKeyMetaName(
            $name
        );
    }
               
    public function CountGameKeyMetaKey(
        $key
    ) {       
        return $this->data->CountGameKeyMetaKey(
            $key
        );
    }
               
    public function CountGameKeyMetaGameId(
        $game_id
    ) {       
        return $this->data->CountGameKeyMetaGameId(
            $game_id
        );
    }
               
    public function CountGameKeyMetaKeyGameId(
        $key
        , $game_id
    ) {       
        return $this->data->CountGameKeyMetaKeyGameId(
            $key
            , $game_id
        );
    }
               
    public function BrowseGameKeyMetaListFilter($filter_obj) {
        $result = new GameKeyMetaResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameKeyMetaListFilter(filter_obj);
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

    public function SetGameKeyMetaUuid($set_type, $obj) {           
        return $this->data->SetGameKeyMetaUuid($set_type, $obj);
    }
            
    public function SetGameKeyMetaCodeGameId($set_type, $obj) {           
        return $this->data->SetGameKeyMetaCodeGameId($set_type, $obj);
    }
            
    public function SetGameKeyMetaKeyGameId($set_type, $obj) {           
        return $this->data->SetGameKeyMetaKeyGameId($set_type, $obj);
    }
            
    public function SetGameKeyMetaKeyGameIdLevel($set_type, $obj) {           
        return $this->data->SetGameKeyMetaKeyGameIdLevel($set_type, $obj);
    }
            
    public function DelGameKeyMetaUuid(
        $uuid
    ) {
        return $this->data->DelGameKeyMetaUuid(
            $uuid
        );
    }
        
    public function DelGameKeyMetaCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameKeyMetaCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function DelGameKeyMetaKeyGameId(
        $key
        , $game_id
    ) {
        return $this->data->DelGameKeyMetaKeyGameId(
            $key
            , $game_id
        );
    }
        
    public function GetGameKeyMetaListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListUuid(
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
        
    public function GetGameKeyMetaListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListCode(
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
        
    public function GetGameKeyMetaListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListCodeGameId(
            $code
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
        
    public function GetGameKeyMetaListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListName(
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
        
    public function GetGameKeyMetaListKey(
        $key
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListKey(
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
        
    public function GetGameKeyMetaListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListGameId(
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
        
    public function GetGameKeyMetaListKeyGameId(
        $key
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListKeyGameId(
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
        
    public function GetGameKeyMetaListCodeLevel(
        $code
        , $level
    ) {

        $results = array();
        $rows = $this->data->GetGameKeyMetaListCodeLevel(
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
               
    public function CountGameLevelUuid(
        $uuid
    ) {       
        return $this->data->CountGameLevelUuid(
            $uuid
        );
    }
               
    public function CountGameLevelCode(
        $code
    ) {       
        return $this->data->CountGameLevelCode(
            $code
        );
    }
               
    public function CountGameLevelCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameLevelCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameLevelName(
        $name
    ) {       
        return $this->data->CountGameLevelName(
            $name
        );
    }
               
    public function CountGameLevelGameId(
        $game_id
    ) {       
        return $this->data->CountGameLevelGameId(
            $game_id
        );
    }
               
    public function BrowseGameLevelListFilter($filter_obj) {
        $result = new GameLevelResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameLevelListFilter(filter_obj);
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

    public function SetGameLevelUuid($set_type, $obj) {           
        return $this->data->SetGameLevelUuid($set_type, $obj);
    }
            
    public function SetGameLevelCodeGameId($set_type, $obj) {           
        return $this->data->SetGameLevelCodeGameId($set_type, $obj);
    }
            
    public function DelGameLevelUuid(
        $uuid
    ) {
        return $this->data->DelGameLevelUuid(
            $uuid
        );
    }
        
    public function DelGameLevelCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameLevelCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function GetGameLevelListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListUuid(
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
        
    public function GetGameLevelListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListCode(
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
        
    public function GetGameLevelListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListCodeGameId(
            $code
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
        
    public function GetGameLevelListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListName(
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
        
    public function GetGameLevelListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameLevelListGameId(
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
        
        
    public function FillGameProfileAchievement($row) {
        $obj = new GameProfileAchievement();

        if ($row['status'] != NULL) {                
            $obj->status = $row['status'];#dataType.FillDataString(dr, "status");
        }
        if ($row['username'] != NULL) {                
            $obj->username = $row['username'];#dataType.FillDataString(dr, "username");
        }
        if ($row['code'] != NULL) {                
            $obj->code = $row['code'];#dataType.FillDataString(dr, "code");
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
               
    public function CountGameProfileAchievementUuid(
        $uuid
    ) {       
        return $this->data->CountGameProfileAchievementUuid(
            $uuid
        );
    }
               
    public function CountGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
    ) {       
        return $this->data->CountGameProfileAchievementProfileIdCode(
            $profile_id
            , $code
        );
    }
               
    public function CountGameProfileAchievementUsername(
        $username
    ) {       
        return $this->data->CountGameProfileAchievementUsername(
            $username
        );
    }
               
    public function CountGameProfileAchievementCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {       
        return $this->data->CountGameProfileAchievementCodeProfileIdGameId(
            $code
            , $profile_id
            , $game_id
        );
    }
               
    public function CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {       
        return $this->data->CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
            $code
            , $profile_id
            , $game_id
            , $timestamp
        );
    }
               
    public function BrowseGameProfileAchievementListFilter($filter_obj) {
        $result = new GameProfileAchievementResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameProfileAchievementListFilter(filter_obj);
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

    public function SetGameProfileAchievementUuid($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementUuid($set_type, $obj);
    }
            
    public function SetGameProfileAchievementUuidCode($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementUuidCode($set_type, $obj);
    }
            
    public function SetGameProfileAchievementProfileIdCode($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementProfileIdCode($set_type, $obj);
    }
            
    public function SetGameProfileAchievementCodeProfileIdGameId($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementCodeProfileIdGameId($set_type, $obj);
    }
            
    public function SetGameProfileAchievementCodeProfileIdGameIdTimestamp($set_type, $obj) {           
        return $this->data->SetGameProfileAchievementCodeProfileIdGameIdTimestamp($set_type, $obj);
    }
            
    public function DelGameProfileAchievementUuid(
        $uuid
    ) {
        return $this->data->DelGameProfileAchievementUuid(
            $uuid
        );
    }
        
    public function DelGameProfileAchievementProfileIdCode(
        $profile_id
        , $code
    ) {
        return $this->data->DelGameProfileAchievementProfileIdCode(
            $profile_id
            , $code
        );
    }
        
    public function DelGameProfileAchievementUuidCode(
        $uuid
        , $code
    ) {
        return $this->data->DelGameProfileAchievementUuidCode(
            $uuid
            , $code
        );
    }
        
    public function GetGameProfileAchievementListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListUuid(
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
        
    public function GetGameProfileAchievementListProfileIdCode(
        $profile_id
        , $code
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListProfileIdCode(
            $profile_id
            , $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListUsername(
        $username
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListUsername(
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
        
    public function GetGameProfileAchievementListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListCode(
            $code
        );
        
        if($rows != NULL) {
            foreach ($rows as $row) {
                $game_profile_achievement  = $this->FillGameProfileAchievement($row);
                $results[] = $game_profile_achievement;
            }
        }
        
        return $results;
    }
        
    public function GetGameProfileAchievementListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListGameId(
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
        
    public function GetGameProfileAchievementListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListCodeGameId(
            $code
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
        
    public function GetGameProfileAchievementListProfileIdGameId(
        $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListProfileIdGameId(
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
        
    public function GetGameProfileAchievementListProfileIdGameIdTimestamp(
        $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListProfileIdGameIdTimestamp(
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
        
    public function GetGameProfileAchievementListCodeProfileIdGameId(
        $code
        , $profile_id
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListCodeProfileIdGameId(
            $code
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
        
    public function GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
        $code
        , $profile_id
        , $game_id
        , $timestamp
    ) {

        $results = array();
        $rows = $this->data->GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            $code
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
               
    public function CountGameAchievementMetaUuid(
        $uuid
    ) {       
        return $this->data->CountGameAchievementMetaUuid(
            $uuid
        );
    }
               
    public function CountGameAchievementMetaCode(
        $code
    ) {       
        return $this->data->CountGameAchievementMetaCode(
            $code
        );
    }
               
    public function CountGameAchievementMetaCodeGameId(
        $code
        , $game_id
    ) {       
        return $this->data->CountGameAchievementMetaCodeGameId(
            $code
            , $game_id
        );
    }
               
    public function CountGameAchievementMetaName(
        $name
    ) {       
        return $this->data->CountGameAchievementMetaName(
            $name
        );
    }
               
    public function CountGameAchievementMetaGameId(
        $game_id
    ) {       
        return $this->data->CountGameAchievementMetaGameId(
            $game_id
        );
    }
               
    public function BrowseGameAchievementMetaListFilter($filter_obj) {
        $result = new GameAchievementMetaResult();
        $result->page = $filter_obj->page;
        $result->page_size = $filter_obj->page_size;
        $result->data = array();
        
        $rows = array();
        $rows = $this->data->BrowseGameAchievementMetaListFilter(filter_obj);
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

    public function SetGameAchievementMetaUuid($set_type, $obj) {           
        return $this->data->SetGameAchievementMetaUuid($set_type, $obj);
    }
            
    public function SetGameAchievementMetaCodeGameId($set_type, $obj) {           
        return $this->data->SetGameAchievementMetaCodeGameId($set_type, $obj);
    }
            
    public function DelGameAchievementMetaUuid(
        $uuid
    ) {
        return $this->data->DelGameAchievementMetaUuid(
            $uuid
        );
    }
        
    public function DelGameAchievementMetaCodeGameId(
        $code
        , $game_id
    ) {
        return $this->data->DelGameAchievementMetaCodeGameId(
            $code
            , $game_id
        );
    }
        
    public function GetGameAchievementMetaListUuid(
        $uuid
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListUuid(
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
        
    public function GetGameAchievementMetaListCode(
        $code
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListCode(
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
        
    public function GetGameAchievementMetaListCodeGameId(
        $code
        , $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListCodeGameId(
            $code
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
        
    public function GetGameAchievementMetaListName(
        $name
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListName(
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
        
    public function GetGameAchievementMetaListGameId(
        $game_id
    ) {

        $results = array();
        $rows = $this->data->GetGameAchievementMetaListGameId(
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
        


}

?>