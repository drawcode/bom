-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------
-- TABLES

/*
        
DROP TABLE IF EXISTS "game" CASCADE;
    
        
DROP TABLE IF EXISTS "game_category" CASCADE;
    
        
DROP TABLE IF EXISTS "game_category_tree" CASCADE;
    
        
DROP TABLE IF EXISTS "game_category_assoc" CASCADE;
    
        
DROP TABLE IF EXISTS "game_type" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_game" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_game_network" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_game_data_attribute" CASCADE;
    
        
DROP TABLE IF EXISTS "game_session" CASCADE;
    
        
DROP TABLE IF EXISTS "game_session_data" CASCADE;
    
        
DROP TABLE IF EXISTS "game_content" CASCADE;
    
        
DROP TABLE IF EXISTS "game_profile_content" CASCADE;
    
        
DROP TABLE IF EXISTS "game_app" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_game_location" CASCADE;
    
        
DROP TABLE IF EXISTS "game_photo" CASCADE;
    
        
DROP TABLE IF EXISTS "game_video" CASCADE;
    
        
DROP TABLE IF EXISTS "game_rpg_item_weapon" CASCADE;
    
        
DROP TABLE IF EXISTS "game_rpg_item_skill" CASCADE;
    
        
DROP TABLE IF EXISTS "game_product" CASCADE;
    
        
DROP TABLE IF EXISTS "game_statistic_leaderboard" CASCADE;
    
        
DROP TABLE IF EXISTS "game_live_queue" CASCADE;
    
        
DROP TABLE IF EXISTS "game_live_recent_queue" CASCADE;
    
        
DROP TABLE IF EXISTS "game_profile_statistic" CASCADE;
    
        
DROP TABLE IF EXISTS "game_statistic_meta" CASCADE;
    
        
DROP TABLE IF EXISTS "game_profile_statistic_timestamp" CASCADE;
    
        
DROP TABLE IF EXISTS "game_key_meta" CASCADE;
    
        
DROP TABLE IF EXISTS "game_level" CASCADE;
    
        
DROP TABLE IF EXISTS "game_profile_achievement" CASCADE;
    
        
DROP TABLE IF EXISTS "game_achievement_meta" CASCADE;
    
*/

        
CREATE TABLE "game" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_date_modified DEFAULT GETDATE()
    , "org_id" uuid
    , "uuid" uuid NOT NULL
    , "app_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "game" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_category" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_category_date_modified DEFAULT GETDATE()
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_game_category_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_category_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "game_category" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_category_tree" 
(
    "status" varchar (255)
    , "parent_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_category_tree_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_category_tree_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_category_tree_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
    , "type" varchar (500)
);

ALTER TABLE "game_category_tree" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_category_assoc" 
(
    "status" varchar (255)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_category_assoc_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_category_assoc_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_category_assoc_date_created DEFAULT GETDATE()
    , "game_id" uuid NOT NULL
    , "category_id" uuid NOT NULL
    , "type" varchar (500)
);

ALTER TABLE "game_category_assoc" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_type" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_type_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_game_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_type_date_created DEFAULT GETDATE()
    , "type" varchar (50) NOT NULL
    , "description" varchar (255)
);

ALTER TABLE "game_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_game" 
(
    "status" varchar (255)
    , "type_id" uuid
    , "profile_id" uuid
    , "game_profile" varchar
    , "active" boolean
                --CONSTRAINT DF_profile_game_active_bool DEFAULT 1
    , "game_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_game_date_modified DEFAULT GETDATE()
    , "profile_version" varchar (50)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_game_date_created DEFAULT GETDATE()
    , "type" varchar (500)
);

ALTER TABLE "profile_game" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_game_network" 
(
    "status" varchar (255)
    , "hash" varchar (500)
    , "profile_id" uuid
    , "game_network_id" uuid
    , "network_username" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_profile_game_network_active_bool DEFAULT 1
    , "game_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_game_network_date_modified DEFAULT GETDATE()
    , "secret" varchar (500)
    , "token" varchar (500)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_game_network_date_created DEFAULT GETDATE()
    , "type" varchar (500)
);

ALTER TABLE "profile_game_network" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_game_data_attribute" 
(
    "code" varchar (500)
    , "uuid" uuid
    , "val" varchar
    , "profile_id" uuid
    , "otype" varchar (500)
    , "game_id" uuid
    , "type" varchar (500)
    , "name" varchar (500)
);

ALTER TABLE "profile_game_data_attribute" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_session" 
(
    "game_area" varchar (255)
    , "code" varchar (255)
    , "network_uuid" varchar (40)
    , "profile_id" uuid
    , "game_level" varchar (255)
    , "profile_network" varchar (255)
    , "profile_device" varchar (50)
    , "display_name" varchar (255)
    , "uuid" uuid NOT NULL
    , "network_external_port" INTEGER
    , "game_players_connected" INTEGER
    , "type" varchar (500)
    , "status" varchar (255)
    , "game_state" varchar (50)
    , "hash" varchar (255)
    , "description" varchar (255)
    , "network_external_ip" varchar (40)
    , "profile_username" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_game_session_active_bool DEFAULT 1
    , "game_id" uuid
    , "game_code" varchar (255)
    , "game_player_z" decimal
    , "game_player_x" decimal
    , "game_player_y" decimal
    , "network_port" INTEGER
    , "game_players_allowed" INTEGER
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_session_date_modified DEFAULT GETDATE()
    , "game_type" varchar (255)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_session_date_created DEFAULT GETDATE()
    , "network_ip" varchar (40)
    , "network_use_nat" boolean
                --CONSTRAINT DF_game_session_network_use_nat_bool DEFAULT 1
);

ALTER TABLE "game_session" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_session_data" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_session_data_date_modified DEFAULT GETDATE()
    , "data_results" varchar
    , "data" varchar
    , "uuid" uuid NOT NULL
    , "data_layer_projectile" varchar
    , "data_layer_actors" varchar
    , "active" boolean
                --CONSTRAINT DF_game_session_data_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_session_data_date_created DEFAULT GETDATE()
    , "data_layer_enemy" varchar
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "game_session_data" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_content" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "extension" varchar (50)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_content_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "game_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "filename" varchar (500)
    , "source" varchar (255)
    , "version" varchar (255)
    , "platform" varchar (255)
    , "content_type" varchar (255)
    , "path" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_game_content_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_content_date_created DEFAULT GETDATE()
    , "increment" INTEGER
    , "type" varchar (500)
    , "hash" varchar (255)
    , "description" varchar (255)
);

ALTER TABLE "game_content" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_profile_content" 
(
    "username" varchar (500)
    , "code" varchar (255)
    , "profile_id" uuid NOT NULL
    , "increment" INTEGER
    , "path" varchar (500)
    , "display_name" varchar (255)
    , "uuid" uuid NOT NULL
    , "platform" varchar (255)
    , "filename" varchar (500)
    , "source" varchar (255)
    , "version" varchar (255)
    , "game_network" varchar (500)
    , "type" varchar (500)
    , "status" varchar (255)
    , "hash" varchar (255)
    , "description" varchar (255)
    , "content_type" varchar (255)
    , "active" boolean
                --CONSTRAINT DF_game_profile_content_active_bool DEFAULT 1
    , "game_id" uuid NOT NULL
    , "data" varchar
    , "name" varchar (255)
    , "extension" varchar (50)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_profile_content_date_modified DEFAULT GETDATE()
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_profile_content_date_created DEFAULT GETDATE()
);

ALTER TABLE "game_profile_content" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_app" 
(
    "status" varchar (255)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_app_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_app_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_app_date_created DEFAULT GETDATE()
    , "game_id" uuid NOT NULL
    , "type" varchar (500)
    , "app_id" uuid NOT NULL
);

ALTER TABLE "game_app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_game_location" 
(
    "status" varchar (255)
    , "game_location_id" uuid
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_game_location_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_profile_game_location_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_game_location_date_created DEFAULT GETDATE()
    , "profile_id" uuid
    , "type" varchar (500)
);

ALTER TABLE "profile_game_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_photo" 
(
    "status" varchar (255)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_photo_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "uuid" uuid NOT NULL
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "external_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_photo_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_photo_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "game_photo" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_video" 
(
    "status" varchar (255)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_video_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "uuid" uuid NOT NULL
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "external_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_video_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_video_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "game_video" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_rpg_item_weapon" 
(
    "status" varchar (255)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "description" varchar (255)
    , "game_defense" decimal
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "type" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_game_rpg_item_weapon_active_bool DEFAULT 1
    , "game_id" uuid
    , "game_attack" decimal
    , "uuid" uuid NOT NULL
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_rpg_item_weapon_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "game_price" decimal
    , "game_type" decimal
    , "game_skill" decimal
    , "game_health" decimal
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_rpg_item_weapon_date_created DEFAULT GETDATE()
    , "game_energy" decimal
    , "game_data" varchar
);

ALTER TABLE "game_rpg_item_weapon" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_rpg_item_skill" 
(
    "status" varchar (255)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "description" varchar (255)
    , "game_defense" decimal
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "type" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_game_rpg_item_skill_active_bool DEFAULT 1
    , "game_id" uuid
    , "game_attack" decimal
    , "uuid" uuid NOT NULL
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_rpg_item_skill_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "game_price" decimal
    , "game_type" decimal
    , "game_skill" decimal
    , "game_health" decimal
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_rpg_item_skill_date_created DEFAULT GETDATE()
    , "game_energy" decimal
    , "game_data" varchar
);

ALTER TABLE "game_rpg_item_skill" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_product" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_product_date_modified DEFAULT GETDATE()
    , "url" varchar (255)
    , "uuid" uuid NOT NULL
    , "game_id" varchar (100)
    , "active" boolean
                --CONSTRAINT DF_game_product_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_product_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "game_product" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_statistic_leaderboard" 
(
    "status" varchar (255)
    , "username" varchar (500)
    , "key" uuid
    , "stat_value_formatted" varchar (500)
    , "profile_id" uuid
    , "rank" INTEGER
    , "rank_change" INTEGER
    , "game_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_statistic_leaderboard_active_bool DEFAULT 1
    , "rank_total_count" INTEGER
    , "data" varchar
    , "stat_value" decimal
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_statistic_leaderboard_date_modified DEFAULT GETDATE()
    , "level" varchar (500)
    , "timestamp" decimal
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_statistic_leaderboard_date_created DEFAULT GETDATE()
    , "type" varchar (500)
);

ALTER TABLE "game_statistic_leaderboard" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_live_queue" 
(
    "status" varchar (255)
    , "data_stat" varchar
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_live_queue_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_live_queue_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_live_queue_date_created DEFAULT GETDATE()
    , "game_id" uuid
    , "profile_id" uuid
    , "type" varchar (500)
    , "data_ad" varchar
);

ALTER TABLE "game_live_queue" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_live_recent_queue" 
(
    "status" varchar (255)
    , "username" varchar (500)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_live_recent_queue_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "profile_id" uuid
    , "uuid" uuid NOT NULL
    , "game" varchar (500)
    , "game_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_live_recent_queue_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_live_recent_queue_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "game_live_recent_queue" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_profile_statistic" 
(
    "status" varchar (255)
    , "username" varchar (500)
    , "timestamp" decimal
    , "profile_id" uuid
    , "key" varchar (50)
    , "active" boolean
                --CONSTRAINT DF_game_profile_statistic_active_bool DEFAULT 1
    , "game_id" uuid
    , "data" varchar
    , "stat_value" decimal
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_profile_statistic_date_modified DEFAULT GETDATE()
    , "level" varchar (500)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_profile_statistic_date_created DEFAULT GETDATE()
    , "type" varchar (500)
);

ALTER TABLE "game_profile_statistic" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_statistic_meta" 
(
    "status" varchar (255)
    , "sort" INTEGER
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_statistic_meta_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "uuid" uuid NOT NULL
    , "store_count" INTEGER
    , "key" varchar (50)
    , "game_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_statistic_meta_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_statistic_meta_date_created DEFAULT GETDATE()
    , "type" varchar (40)
    , "order" varchar (40)
    , "description" varchar (255)
);

ALTER TABLE "game_statistic_meta" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_profile_statistic_timestamp" 
(
    "status" varchar (255)
    , "timestamp" TIMESTAMP
                --CONSTRAINT DF_game_profile_statistic_timestamp_timestamp DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "key" varchar (50)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_profile_statistic_timestamp_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_profile_statistic_timestamp_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_profile_statistic_timestamp_date_created DEFAULT GETDATE()
    , "game_id" uuid
    , "profile_id" uuid
    , "type" varchar (500)
);

ALTER TABLE "game_profile_statistic_timestamp" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_key_meta" 
(
    "status" varchar (255)
    , "sort" INTEGER
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_key_meta_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "level" varchar (500)
    , "uuid" uuid NOT NULL
    , "key_level" varchar (50)
    , "store_count" INTEGER
    , "key" varchar (50)
    , "game_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_key_meta_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_key_meta_date_created DEFAULT GETDATE()
    , "type" varchar (40)
    , "order" varchar (40)
    , "key_stat" varchar (50)
    , "description" varchar (255)
);

ALTER TABLE "game_key_meta" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_level" 
(
    "status" varchar (255)
    , "sort" INTEGER
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_level_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "uuid" uuid NOT NULL
    , "key" varchar (50)
    , "game_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_level_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_level_date_created DEFAULT GETDATE()
    , "type" varchar (40)
    , "order" varchar (40)
    , "description" varchar (255)
);

ALTER TABLE "game_level" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_profile_achievement" 
(
    "status" varchar (255)
    , "username" varchar (500)
    , "timestamp" decimal
    , "completed" boolean
                --CONSTRAINT DF_game_profile_achievement_completed_bool DEFAULT 1
    , "profile_id" uuid
    , "key" varchar (50)
    , "active" boolean
                --CONSTRAINT DF_game_profile_achievement_active_bool DEFAULT 1
    , "game_id" uuid
    , "achievement_value" decimal
    , "data" varchar
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_profile_achievement_date_modified DEFAULT GETDATE()
    , "level" varchar (500)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_profile_achievement_date_created DEFAULT GETDATE()
    , "type" varchar (500)
);

ALTER TABLE "game_profile_achievement" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_achievement_meta" 
(
    "status" varchar (255)
    , "sort" INTEGER
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "game_stat" boolean
                --CONSTRAINT DF_game_achievement_meta_game_stat_bool DEFAULT 1
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_achievement_meta_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "level" varchar (500)
    , "uuid" uuid NOT NULL
    , "points" INTEGER
    , "key" varchar (50)
    , "game_id" uuid
    , "active" boolean
                --CONSTRAINT DF_game_achievement_meta_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_achievement_meta_date_created DEFAULT GETDATE()
    , "type" varchar (40)
    , "leaderboard" boolean
                --CONSTRAINT DF_game_achievement_meta_leaderboard_bool DEFAULT 1
    , "description" varchar (255)
);

ALTER TABLE "game_achievement_meta" ADD PRIMARY KEY ("uuid");
    


-- result / return types
/*
        
DROP type IF EXISTS "game_result" CASCADE;
    
        
DROP type IF EXISTS "game_category_result" CASCADE;
    
        
DROP type IF EXISTS "game_category_tree_result" CASCADE;
    
        
DROP type IF EXISTS "game_category_assoc_result" CASCADE;
    
        
DROP type IF EXISTS "game_type_result" CASCADE;
    
        
DROP type IF EXISTS "profile_game_result" CASCADE;
    
        
DROP type IF EXISTS "profile_game_network_result" CASCADE;
    
        
DROP type IF EXISTS "profile_game_data_attribute_result" CASCADE;
    
        
DROP type IF EXISTS "game_session_result" CASCADE;
    
        
DROP type IF EXISTS "game_session_data_result" CASCADE;
    
        
DROP type IF EXISTS "game_content_result" CASCADE;
    
        
DROP type IF EXISTS "game_profile_content_result" CASCADE;
    
        
DROP type IF EXISTS "game_app_result" CASCADE;
    
        
DROP type IF EXISTS "profile_game_location_result" CASCADE;
    
        
DROP type IF EXISTS "game_photo_result" CASCADE;
    
        
DROP type IF EXISTS "game_video_result" CASCADE;
    
        
DROP type IF EXISTS "game_rpg_item_weapon_result" CASCADE;
    
        
DROP type IF EXISTS "game_rpg_item_skill_result" CASCADE;
    
        
DROP type IF EXISTS "game_product_result" CASCADE;
    
        
DROP type IF EXISTS "game_statistic_leaderboard_result" CASCADE;
    
        
DROP type IF EXISTS "game_live_queue_result" CASCADE;
    
        
DROP type IF EXISTS "game_live_recent_queue_result" CASCADE;
    
        
DROP type IF EXISTS "game_profile_statistic_result" CASCADE;
    
        
DROP type IF EXISTS "game_statistic_meta_result" CASCADE;
    
        
DROP type IF EXISTS "game_profile_statistic_timestamp_result" CASCADE;
    
        
DROP type IF EXISTS "game_key_meta_result" CASCADE;
    
        
DROP type IF EXISTS "game_level_result" CASCADE;
    
        
DROP type IF EXISTS "game_profile_achievement_result" CASCADE;
    
        
DROP type IF EXISTS "game_achievement_meta_result" CASCADE;
    
*/

CREATE TYPE "game_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "org_id" uuid
    , "uuid" uuid
    , "app_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "game_category_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "type_id" uuid
    , "org_id" uuid
    , "uuid" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "game_category_tree_result" as
(
    total_rows bigint
    , "status" varchar
    , "parent_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "category_id" uuid
    , "type" varchar
);    
CREATE TYPE "game_category_assoc_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "game_id" uuid
    , "category_id" uuid
    , "type" varchar
);    
CREATE TYPE "game_type_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "uuid" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "profile_game_result" as
(
    total_rows bigint
    , "status" varchar
    , "type_id" uuid
    , "profile_id" uuid
    , "game_profile" varchar
    , "active" boolean
    , "game_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_version" varchar
    , "date_created" TIMESTAMP
    , "type" varchar
);    
CREATE TYPE "profile_game_network_result" as
(
    total_rows bigint
    , "status" varchar
    , "hash" varchar
    , "profile_id" uuid
    , "game_network_id" uuid
    , "network_username" varchar
    , "active" boolean
    , "game_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "secret" varchar
    , "token" varchar
    , "date_created" TIMESTAMP
    , "type" varchar
);    
CREATE TYPE "profile_game_data_attribute_result" as
(
    total_rows bigint
    , "code" varchar
    , "uuid" uuid
    , "val" varchar
    , "profile_id" uuid
    , "otype" varchar
    , "game_id" uuid
    , "type" varchar
    , "name" varchar
);    
CREATE TYPE "game_session_result" as
(
    total_rows bigint
    , "game_area" varchar
    , "code" varchar
    , "network_uuid" varchar
    , "profile_id" uuid
    , "game_level" varchar
    , "profile_network" varchar
    , "profile_device" varchar
    , "display_name" varchar
    , "uuid" uuid
    , "network_external_port" INTEGER
    , "game_players_connected" INTEGER
    , "type" varchar
    , "status" varchar
    , "game_state" varchar
    , "hash" varchar
    , "description" varchar
    , "network_external_ip" varchar
    , "profile_username" varchar
    , "active" boolean
    , "game_id" uuid
    , "game_code" varchar
    , "game_player_z" decimal
    , "game_player_x" decimal
    , "game_player_y" decimal
    , "network_port" INTEGER
    , "game_players_allowed" INTEGER
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "game_type" varchar
    , "date_created" TIMESTAMP
    , "network_ip" varchar
    , "network_use_nat" boolean
);    
CREATE TYPE "game_session_data_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "data_results" varchar
    , "data" varchar
    , "uuid" uuid
    , "data_layer_projectile" varchar
    , "data_layer_actors" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "data_layer_enemy" varchar
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "game_content_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "extension" varchar
    , "date_modified" TIMESTAMP
    , "data" varchar
    , "game_id" uuid
    , "uuid" uuid
    , "filename" varchar
    , "source" varchar
    , "version" varchar
    , "platform" varchar
    , "content_type" varchar
    , "path" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "increment" INTEGER
    , "type" varchar
    , "hash" varchar
    , "description" varchar
);    
CREATE TYPE "game_profile_content_result" as
(
    total_rows bigint
    , "username" varchar
    , "code" varchar
    , "profile_id" uuid
    , "increment" INTEGER
    , "path" varchar
    , "display_name" varchar
    , "uuid" uuid
    , "platform" varchar
    , "filename" varchar
    , "source" varchar
    , "version" varchar
    , "game_network" varchar
    , "type" varchar
    , "status" varchar
    , "hash" varchar
    , "description" varchar
    , "content_type" varchar
    , "active" boolean
    , "game_id" uuid
    , "data" varchar
    , "name" varchar
    , "extension" varchar
    , "date_modified" TIMESTAMP
    , "date_created" TIMESTAMP
);    
CREATE TYPE "game_app_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "game_id" uuid
    , "type" varchar
    , "app_id" uuid
);    
CREATE TYPE "profile_game_location_result" as
(
    total_rows bigint
    , "status" varchar
    , "game_location_id" uuid
    , "type_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "profile_id" uuid
    , "type" varchar
);    
CREATE TYPE "game_photo_result" as
(
    total_rows bigint
    , "status" varchar
    , "third_party_oembed" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "third_party_data" varchar
    , "uuid" uuid
    , "third_party_url" varchar
    , "third_party_id" varchar
    , "content_type" varchar
    , "external_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "game_video_result" as
(
    total_rows bigint
    , "status" varchar
    , "third_party_oembed" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "third_party_data" varchar
    , "uuid" uuid
    , "third_party_url" varchar
    , "third_party_id" varchar
    , "content_type" varchar
    , "external_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "game_rpg_item_weapon_result" as
(
    total_rows bigint
    , "status" varchar
    , "third_party_oembed" varchar
    , "code" varchar
    , "description" varchar
    , "game_defense" decimal
    , "third_party_url" varchar
    , "third_party_id" varchar
    , "content_type" varchar
    , "type" varchar
    , "active" boolean
    , "game_id" uuid
    , "game_attack" decimal
    , "uuid" uuid
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "third_party_data" varchar
    , "game_price" decimal
    , "game_type" decimal
    , "game_skill" decimal
    , "game_health" decimal
    , "date_created" TIMESTAMP
    , "game_energy" decimal
    , "game_data" varchar
);    
CREATE TYPE "game_rpg_item_skill_result" as
(
    total_rows bigint
    , "status" varchar
    , "third_party_oembed" varchar
    , "code" varchar
    , "description" varchar
    , "game_defense" decimal
    , "third_party_url" varchar
    , "third_party_id" varchar
    , "content_type" varchar
    , "type" varchar
    , "active" boolean
    , "game_id" uuid
    , "game_attack" decimal
    , "uuid" uuid
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "third_party_data" varchar
    , "game_price" decimal
    , "game_type" decimal
    , "game_skill" decimal
    , "game_health" decimal
    , "date_created" TIMESTAMP
    , "game_energy" decimal
    , "game_data" varchar
);    
CREATE TYPE "game_product_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "uuid" uuid
    , "game_id" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "game_statistic_leaderboard_result" as
(
    total_rows bigint
    , "status" varchar
    , "username" varchar
    , "key" uuid
    , "stat_value_formatted" varchar
    , "profile_id" uuid
    , "rank" INTEGER
    , "rank_change" INTEGER
    , "game_id" uuid
    , "active" boolean
    , "rank_total_count" INTEGER
    , "data" varchar
    , "stat_value" decimal
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "level" varchar
    , "timestamp" decimal
    , "date_created" TIMESTAMP
    , "type" varchar
);    
CREATE TYPE "game_live_queue_result" as
(
    total_rows bigint
    , "status" varchar
    , "data_stat" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "game_id" uuid
    , "profile_id" uuid
    , "type" varchar
    , "data_ad" varchar
);    
CREATE TYPE "game_live_recent_queue_result" as
(
    total_rows bigint
    , "status" varchar
    , "username" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "data" varchar
    , "profile_id" uuid
    , "uuid" uuid
    , "game" varchar
    , "game_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "game_profile_statistic_result" as
(
    total_rows bigint
    , "status" varchar
    , "username" varchar
    , "timestamp" decimal
    , "profile_id" uuid
    , "key" varchar
    , "active" boolean
    , "game_id" uuid
    , "data" varchar
    , "stat_value" decimal
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "level" varchar
    , "date_created" TIMESTAMP
    , "type" varchar
);    
CREATE TYPE "game_statistic_meta_result" as
(
    total_rows bigint
    , "status" varchar
    , "sort" INTEGER
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "data" varchar
    , "uuid" uuid
    , "store_count" INTEGER
    , "key" varchar
    , "game_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "order" varchar
    , "description" varchar
);    
CREATE TYPE "game_profile_statistic_timestamp_result" as
(
    total_rows bigint
    , "status" varchar
    , "timestamp" TIMESTAMP
    , "uuid" uuid
    , "key" varchar
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "game_id" uuid
    , "profile_id" uuid
    , "type" varchar
);    
CREATE TYPE "game_key_meta_result" as
(
    total_rows bigint
    , "status" varchar
    , "sort" INTEGER
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "data" varchar
    , "level" varchar
    , "uuid" uuid
    , "key_level" varchar
    , "store_count" INTEGER
    , "key" varchar
    , "game_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "order" varchar
    , "key_stat" varchar
    , "description" varchar
);    
CREATE TYPE "game_level_result" as
(
    total_rows bigint
    , "status" varchar
    , "sort" INTEGER
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "data" varchar
    , "uuid" uuid
    , "key" varchar
    , "game_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "order" varchar
    , "description" varchar
);    
CREATE TYPE "game_profile_achievement_result" as
(
    total_rows bigint
    , "status" varchar
    , "username" varchar
    , "timestamp" decimal
    , "completed" boolean
    , "profile_id" uuid
    , "key" varchar
    , "active" boolean
    , "game_id" uuid
    , "achievement_value" decimal
    , "data" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "level" varchar
    , "date_created" TIMESTAMP
    , "type" varchar
);    
CREATE TYPE "game_achievement_meta_result" as
(
    total_rows bigint
    , "status" varchar
    , "sort" INTEGER
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "game_stat" boolean
    , "date_modified" TIMESTAMP
    , "data" varchar
    , "level" varchar
    , "uuid" uuid
    , "points" INTEGER
    , "key" varchar
    , "game_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "leaderboard" boolean
    , "description" varchar
);    

        
-- INDEX CREATES

        
        
        
        
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_profile_game_data_attribute_uuid";
                
CREATE INDEX IX_profile_game_data_attribute_uuid ON profile_game_data_attribute 
(
                    
    "uuid" ASC
);
                
DROP INDEX IF EXISTS "IX_profile_game_data_attribute_profile_id";
                
CREATE INDEX IX_profile_game_data_attribute_profile_id ON profile_game_data_attribute 
(
                    
    "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_profile_game_data_attribute_profile_id_game_id";
                
CREATE INDEX IX_profile_game_data_attribute_profile_id_game_id ON profile_game_data_attribute 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_profile_game_data_attribute_profile_id_game_id_code";
                
CREATE INDEX IX_profile_game_data_attribute_profile_id_game_id_code ON profile_game_data_attribute 
(
                    
    "code" ASC
                    
    , "game_id" ASC
                    
    , "profile_id" ASC
);
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
        
        
        
        
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key";
                
CREATE INDEX IX_game_statistic_leaderboard_key ON game_statistic_leaderboard 
(
                    
    "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_profile_id";
                
CREATE INDEX IX_game_statistic_leaderboard_profile_id ON game_statistic_leaderboard 
(
                    
    "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_username";
                
CREATE INDEX IX_game_statistic_leaderboard_username ON game_statistic_leaderboard 
(
                    
    "username" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_game_id";
                
CREATE INDEX IX_game_statistic_leaderboard_game_id ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_game_id_level";
                
CREATE INDEX IX_game_statistic_leaderboard_key_game_id_level ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
                    
    , "key" ASC
                    
    , "level" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_profile_id_game_id";
                
CREATE INDEX IX_game_statistic_leaderboard_profile_id_game_id ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_username_game_id";
                
CREATE INDEX IX_game_statistic_leaderboard_username_game_id ON game_statistic_leaderboard 
(
                    
    "username" ASC
                    
    , "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_username";
                
CREATE INDEX IX_game_statistic_leaderboard_key_username ON game_statistic_leaderboard 
(
                    
    "username" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_username_game_id";
                
CREATE INDEX IX_game_statistic_leaderboard_key_username_game_id ON game_statistic_leaderboard 
(
                    
    "username" ASC
                    
    , "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_username_game_id_type";
                
CREATE INDEX IX_game_statistic_leaderboard_key_username_game_id_type ON game_statistic_leaderboard 
(
                    
    "username" ASC
                    
    , "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_profile_id";
                
CREATE INDEX IX_game_statistic_leaderboard_key_profile_id ON game_statistic_leaderboard 
(
                    
    "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_profile_id_game_id";
                
CREATE INDEX IX_game_statistic_leaderboard_key_profile_id_game_id ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_profile_id_game_id_type";
                
CREATE INDEX IX_game_statistic_leaderboard_key_profile_id_game_id_type ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_game_id";
                
CREATE INDEX IX_game_statistic_leaderboard_key_game_id ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_game_id_profile_id";
                
CREATE INDEX IX_game_statistic_leaderboard_key_game_id_profile_id ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_leaderboard_key_game_id_type";
                
CREATE INDEX IX_game_statistic_leaderboard_key_game_id_type ON game_statistic_leaderboard 
(
                    
    "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_live_queue_profile_id";
                
CREATE INDEX IX_game_live_queue_profile_id ON game_live_queue 
(
                    
    "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_live_queue_game_id";
                
CREATE INDEX IX_game_live_queue_game_id ON game_live_queue 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_live_queue_profile_id_game_id";
                
CREATE INDEX IX_game_live_queue_profile_id_game_id ON game_live_queue 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_live_recent_queue_profile_id";
                
CREATE INDEX IX_game_live_recent_queue_profile_id ON game_live_recent_queue 
(
                    
    "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_live_recent_queue_game_id";
                
CREATE INDEX IX_game_live_recent_queue_game_id ON game_live_recent_queue 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_live_recent_queue_profile_id_game_id";
                
CREATE INDEX IX_game_live_recent_queue_profile_id_game_id ON game_live_recent_queue 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key";
                
CREATE INDEX IX_game_profile_statistic_key ON game_profile_statistic 
(
                    
    "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_profile_id";
                
CREATE INDEX IX_game_profile_statistic_profile_id ON game_profile_statistic 
(
                    
    "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_username";
                
CREATE INDEX IX_game_profile_statistic_username ON game_profile_statistic 
(
                    
    "username" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_game_id";
                
CREATE INDEX IX_game_profile_statistic_game_id ON game_profile_statistic 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_game_id";
                
CREATE INDEX IX_game_profile_statistic_key_game_id ON game_profile_statistic 
(
                    
    "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_game_id_level";
                
CREATE INDEX IX_game_profile_statistic_key_game_id_level ON game_profile_statistic 
(
                    
    "game_id" ASC
                    
    , "key" ASC
                    
    , "level" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_profile_id_game_id";
                
CREATE INDEX IX_game_profile_statistic_profile_id_game_id ON game_profile_statistic 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_username_game_id";
                
CREATE INDEX IX_game_profile_statistic_username_game_id ON game_profile_statistic 
(
                    
    "username" ASC
                    
    , "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_username";
                
CREATE INDEX IX_game_profile_statistic_key_username ON game_profile_statistic 
(
                    
    "username" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_username_game_id";
                
CREATE INDEX IX_game_profile_statistic_key_username_game_id ON game_profile_statistic 
(
                    
    "username" ASC
                    
    , "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_username_game_id_type";
                
CREATE INDEX IX_game_profile_statistic_key_username_game_id_type ON game_profile_statistic 
(
                    
    "username" ASC
                    
    , "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_profile_id";
                
CREATE INDEX IX_game_profile_statistic_key_profile_id ON game_profile_statistic 
(
                    
    "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_profile_id_game_id";
                
CREATE INDEX IX_game_profile_statistic_key_profile_id_game_id ON game_profile_statistic 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_profile_id_game_id_type";
                
CREATE INDEX IX_game_profile_statistic_key_profile_id_game_id_type ON game_profile_statistic 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_game_id_profile_id";
                
CREATE INDEX IX_game_profile_statistic_key_game_id_profile_id ON game_profile_statistic 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_statistic_key_game_id_type";
                
CREATE INDEX IX_game_profile_statistic_key_game_id_type ON game_profile_statistic 
(
                    
    "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_statistic_meta_key";
                
CREATE INDEX IX_game_statistic_meta_key ON game_statistic_meta 
(
                    
    "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_meta_game_id";
                
CREATE INDEX IX_game_statistic_meta_game_id ON game_statistic_meta 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_meta_key_game_id";
                
CREATE INDEX IX_game_statistic_meta_key_game_id ON game_statistic_meta 
(
                    
    "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_meta_key_type";
                
CREATE INDEX IX_game_statistic_meta_key_type ON game_statistic_meta 
(
                    
    "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_meta_game_id_type";
                
CREATE INDEX IX_game_statistic_meta_game_id_type ON game_statistic_meta 
(
                    
    "game_id" ASC
                    
    , "type" ASC
);
                
DROP INDEX IF EXISTS "IX_game_statistic_meta_key_game_id_type";
                
CREATE INDEX IX_game_statistic_meta_key_game_id_type ON game_statistic_meta 
(
                    
    "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_profile_statistic_timestamp_key_profile_id_game_id_timestamp";
                
CREATE INDEX IX_game_profile_statistic_timestamp_key_profile_id_game_id_timestamp ON game_profile_statistic_timestamp 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "key" ASC
                    
    , "timestamp" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_key_meta_key";
                
CREATE INDEX IX_game_key_meta_key ON game_key_meta 
(
                    
    "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_game_id";
                
CREATE INDEX IX_game_key_meta_game_id ON game_key_meta 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_key_stat_key_level_game_id";
                
CREATE INDEX IX_game_key_meta_key_stat_key_level_game_id ON game_key_meta 
(
                    
    "game_id" ASC
                    
    , "key_level" ASC
                    
    , "key_stat" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_key_stat_key_level_game_id_level";
                
CREATE INDEX IX_game_key_meta_key_stat_key_level_game_id_level ON game_key_meta 
(
                    
    "game_id" ASC
                    
    , "key_level" ASC
                    
    , "key_stat" ASC
                    
    , "level" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_key_stat_key_level_type";
                
CREATE INDEX IX_game_key_meta_key_stat_key_level_type ON game_key_meta 
(
                    
    "key_level" ASC
                    
    , "type" ASC
                    
    , "key_stat" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_key_game_id";
                
CREATE INDEX IX_game_key_meta_key_game_id ON game_key_meta 
(
                    
    "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_key_game_id_level";
                
CREATE INDEX IX_game_key_meta_key_game_id_level ON game_key_meta 
(
                    
    "game_id" ASC
                    
    , "key" ASC
                    
    , "level" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_key_type";
                
CREATE INDEX IX_game_key_meta_key_type ON game_key_meta 
(
                    
    "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_game_id_type";
                
CREATE INDEX IX_game_key_meta_game_id_type ON game_key_meta 
(
                    
    "game_id" ASC
                    
    , "type" ASC
);
                
DROP INDEX IF EXISTS "IX_game_key_meta_key_game_id_type";
                
CREATE INDEX IX_game_key_meta_key_game_id_type ON game_key_meta 
(
                    
    "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_level_key";
                
CREATE INDEX IX_game_level_key ON game_level 
(
                    
    "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_level_key_game_id";
                
CREATE INDEX IX_game_level_key_game_id ON game_level 
(
                    
    "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_level_key_game_id_type";
                
CREATE INDEX IX_game_level_key_game_id_type ON game_level 
(
                    
    "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key";
                
CREATE INDEX IX_game_profile_achievement_key ON game_profile_achievement 
(
                    
    "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_profile_id";
                
CREATE INDEX IX_game_profile_achievement_profile_id ON game_profile_achievement 
(
                    
    "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_username";
                
CREATE INDEX IX_game_profile_achievement_username ON game_profile_achievement 
(
                    
    "username" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_game_id";
                
CREATE INDEX IX_game_profile_achievement_game_id ON game_profile_achievement 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_game_id";
                
CREATE INDEX IX_game_profile_achievement_key_game_id ON game_profile_achievement 
(
                    
    "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_game_id_level";
                
CREATE INDEX IX_game_profile_achievement_key_game_id_level ON game_profile_achievement 
(
                    
    "game_id" ASC
                    
    , "key" ASC
                    
    , "level" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_profile_id_game_id";
                
CREATE INDEX IX_game_profile_achievement_profile_id_game_id ON game_profile_achievement 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_username_game_id";
                
CREATE INDEX IX_game_profile_achievement_username_game_id ON game_profile_achievement 
(
                    
    "username" ASC
                    
    , "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_username";
                
CREATE INDEX IX_game_profile_achievement_key_username ON game_profile_achievement 
(
                    
    "username" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_username_game_id";
                
CREATE INDEX IX_game_profile_achievement_key_username_game_id ON game_profile_achievement 
(
                    
    "username" ASC
                    
    , "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_username_game_id_type";
                
CREATE INDEX IX_game_profile_achievement_key_username_game_id_type ON game_profile_achievement 
(
                    
    "username" ASC
                    
    , "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_profile_id";
                
CREATE INDEX IX_game_profile_achievement_key_profile_id ON game_profile_achievement 
(
                    
    "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_profile_id_game_id";
                
CREATE INDEX IX_game_profile_achievement_key_profile_id_game_id ON game_profile_achievement 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_profile_id_game_id_type";
                
CREATE INDEX IX_game_profile_achievement_key_profile_id_game_id_type ON game_profile_achievement 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_game_id_profile_id";
                
CREATE INDEX IX_game_profile_achievement_key_game_id_profile_id ON game_profile_achievement 
(
                    
    "game_id" ASC
                    
    , "profile_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_profile_achievement_key_game_id_type";
                
CREATE INDEX IX_game_profile_achievement_key_game_id_type ON game_profile_achievement 
(
                    
    "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);
        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_game_achievement_meta_key";
                
CREATE INDEX IX_game_achievement_meta_key ON game_achievement_meta 
(
                    
    "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_achievement_meta_game_id";
                
CREATE INDEX IX_game_achievement_meta_game_id ON game_achievement_meta 
(
                    
    "game_id" ASC
);
                
DROP INDEX IF EXISTS "IX_game_achievement_meta_key_game_id";
                
CREATE INDEX IX_game_achievement_meta_key_game_id ON game_achievement_meta 
(
                    
    "game_id" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_achievement_meta_key_game_id_level";
                
CREATE INDEX IX_game_achievement_meta_key_game_id_level ON game_achievement_meta 
(
                    
    "game_id" ASC
                    
    , "key" ASC
                    
    , "level" ASC
);
                
DROP INDEX IF EXISTS "IX_game_achievement_meta_key_type";
                
CREATE INDEX IX_game_achievement_meta_key_type ON game_achievement_meta 
(
                    
    "type" ASC
                    
    , "key" ASC
);
                
DROP INDEX IF EXISTS "IX_game_achievement_meta_game_id_type";
                
CREATE INDEX IX_game_achievement_meta_game_id_type ON game_achievement_meta 
(
                    
    "game_id" ASC
                    
    , "type" ASC
);
                
DROP INDEX IF EXISTS "IX_game_achievement_meta_key_game_id_type";
                
CREATE INDEX IX_game_achievement_meta_key_game_id_type ON game_achievement_meta 
(
                    
    "game_id" ASC
                    
    , "type" ASC
                    
    , "key" ASC
);

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Game - game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_count_code
(
    in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_count_name
(
    in_name varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_count_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_count_org_id
(
    in_org_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_count_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_count_app_id
(
    in_app_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game"
    WHERE 1=1
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_count_org_id_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_count_org_id_app_id
(
    in_org_id uuid = NULL
    , in_app_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game"
    WHERE 1=1
    AND "org_id" = in_org_id
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Game - game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "app_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "org_id" '
    || ', "uuid" '
    || ', "app_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Game - game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "app_id" = in_app_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "org_id"
                        , "uuid"
                        , "app_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_org_id
                        , in_uuid
                        , in_app_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_set_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game"  
                    WHERE 1=1
                    AND lower("code") = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "app_id" = in_app_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("code") = lower(in_code)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "org_id"
                        , "uuid"
                        , "app_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_org_id
                        , in_uuid
                        , in_app_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_set_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_set_name
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game"  
                    WHERE 1=1
                    AND lower("name") = lower(in_name)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "app_id" = in_app_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("name") = lower(in_name)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "org_id"
                        , "uuid"
                        , "app_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_org_id
                        , in_uuid
                        , in_app_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_set_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_set_org_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game"  
                    WHERE 1=1
                    AND "org_id" = in_org_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "app_id" = in_app_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "org_id" = in_org_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "org_id"
                        , "uuid"
                        , "app_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_org_id
                        , in_uuid
                        , in_app_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_set_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_set_app_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game"  
                    WHERE 1=1
                    AND "app_id" = in_app_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "app_id" = in_app_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "app_id" = in_app_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "org_id"
                        , "uuid"
                        , "app_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_org_id
                        , in_uuid
                        , in_app_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_set_org_id_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_set_org_id_app_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game"  
                    WHERE 1=1
                    AND "org_id" = in_org_id
                    AND "app_id" = in_app_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "app_id" = in_app_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "org_id" = in_org_id
                    AND "app_id" = in_app_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "org_id"
                        , "uuid"
                        , "app_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_org_id
                        , in_uuid
                        , in_app_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Game - game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_del_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_del_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_del_name
(
    in_name varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game"
    WHERE 1=1                        
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_del_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_del_org_id
(
    in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game"
    WHERE 1=1                        
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_del_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_del_app_id
(
    in_app_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game"
    WHERE 1=1                        
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_del_org_id_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_del_org_id_app_id
(
    in_org_id uuid = NULL
    , in_app_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game"
    WHERE 1=1                        
    AND "org_id" = in_org_id
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Game - game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_get
(
)                        
RETURNS setof "game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "org_id"
        , "uuid"
        , "app_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "org_id"
        , "uuid"
        , "app_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "org_id"
        , "uuid"
        , "app_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "org_id"
        , "uuid"
        , "app_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_get_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "org_id"
        , "uuid"
        , "app_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_get_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_get_app_id
(
    in_app_id uuid = NULL
)
RETURNS setof "game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "org_id"
        , "uuid"
        , "app_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game"
    WHERE 1=1
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_get_org_id_app_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_get_org_id_app_id
(
    in_org_id uuid = NULL
    , in_app_id uuid = NULL
)
RETURNS setof "game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "org_id"
        , "uuid"
        , "app_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game"
    WHERE 1=1
    AND "org_id" = in_org_id
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameCategory - game_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_count_code
(
    in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_count_name
(
    in_name varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_count_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_count_org_id
(
    in_org_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_count_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_count_type_id
(
    in_type_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_count_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_count_org_id_type_id
(
    in_org_id uuid = NULL
    , in_type_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategory - game_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_category_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "type_id"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game_category" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "type_id" '
    || ', "org_id" '
    || ', "uuid" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameCategory - game_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_category"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_category" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "type_id" = in_type_id
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_category"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "type_id"
                        , "org_id"
                        , "uuid"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_type_id
                        , in_org_id
                        , in_uuid
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameCategory - game_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_category_del_code_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_del_code_org_id
(
    in_code varchar (255) = NULL
    , in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_category_del_code_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_del_code_org_id_type_id
(
    in_code varchar (255) = NULL
    , in_org_id uuid = NULL
    , in_type_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategory - game_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_get
(
)                        
RETURNS setof "game_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_category"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_category"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "game_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_category"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "game_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_category"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_get_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "game_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_get_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_get_type_id
(
    in_type_id uuid = NULL
)
RETURNS setof "game_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_category"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_get_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_get_org_id_type_id
(
    in_org_id uuid = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "game_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_tree_count
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_tree"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_count_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_tree"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_count_parent_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_count_parent_id
(
    in_parent_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_count_category_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_count_category_id
(
    in_category_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_tree"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_count_parent_id_category_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_count_parent_id_category_id
(
    in_parent_id uuid = NULL
    , in_category_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_tree_browse_filter
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_category_tree_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "parent_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "category_id"'
    || ', "type"'
    || ' FROM "game_category_tree" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "parent_id" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "category_id" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_tree_set_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_parent_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_category_id uuid = NULL
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_category_tree"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_category_tree" 
                    SET
                        "status" = in_status
                        , "parent_id" = in_parent_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "category_id" = in_category_id
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_category_tree"
                    (
                        "status"
                        , "parent_id"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "category_id"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_parent_id
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_category_id
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_tree_del_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category_tree"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_category_tree_del_parent_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_del_parent_id
(
    in_parent_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category_tree"
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_category_tree_del_category_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_del_category_id
(
    in_category_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category_tree"
    WHERE 1=1                        
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_category_tree_del_parent_id_category_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_del_parent_id_category_id
(
    in_parent_id uuid = NULL
    , in_category_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category_tree"
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_tree_get
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_get
(
)                        
RETURNS setof "game_category_tree"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "parent_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "game_category_tree"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_get_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_category_tree"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "parent_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "game_category_tree"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_get_parent_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_get_parent_id
(
    in_parent_id uuid = NULL
)
RETURNS setof "game_category_tree"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "parent_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "game_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_get_category_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_get_category_id
(
    in_category_id uuid = NULL
)
RETURNS setof "game_category_tree"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "parent_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "game_category_tree"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_tree_get_parent_id_category_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_get_parent_id_category_id
(
    in_parent_id uuid = NULL
    , in_category_id uuid = NULL
)
RETURNS setof "game_category_tree"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "parent_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "game_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_assoc_count
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_assoc"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_count_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_assoc"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_count_game_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_assoc"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_count_category_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_count_category_id
(
    in_category_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_assoc"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_count_game_id_category_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_count_game_id_category_id
(
    in_game_id uuid = NULL
    , in_category_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_category_assoc"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_assoc_browse_filter
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_category_assoc_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "game_id"'
    || ', "category_id"'
    || ', "type"'
    || ' FROM "game_category_assoc" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "game_id" '
    || ', "category_id" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_assoc_set_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_category_id uuid = NULL
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_category_assoc"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_category_assoc" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "game_id" = in_game_id
                        , "category_id" = in_category_id
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_category_assoc"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "game_id"
                        , "category_id"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_game_id
                        , in_category_id
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_assoc_del_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_category_assoc"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_category_assoc_get
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_get
(
)                        
RETURNS setof "game_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "category_id"
        , "type"
    FROM "game_category_assoc"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_get_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "category_id"
        , "type"
    FROM "game_category_assoc"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_get_game_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "category_id"
        , "type"
    FROM "game_category_assoc"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_get_category_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_get_category_id
(
    in_category_id uuid = NULL
)
RETURNS setof "game_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "category_id"
        , "type"
    FROM "game_category_assoc"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_category_assoc_get_game_id_category_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_get_game_id_category_id
(
    in_game_id uuid = NULL
    , in_category_id uuid = NULL
)
RETURNS setof "game_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "category_id"
        , "type"
    FROM "game_category_assoc"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameType - game_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_type_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_type_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_type_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_count_code
(
    in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_type_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_count_name
(
    in_name varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_type"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameType - game_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_type_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_type_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game_type" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "uuid" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameType - game_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_type_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (50) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_type"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_type" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_type"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_uuid
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameType - game_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_type_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameType - game_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_type_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_get
(
)                        
RETURNS setof "game_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_type_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_type_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "game_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_type_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_type_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "game_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_type"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGame - profile_game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_count
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_count_uuid
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_count_game_id
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_count_profile_id
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_count_profile_id
(
    in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_count_profile_id_game_id
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_count_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGame - profile_game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_browse_filter
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_game_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "type_id"'
    || ', "profile_id"'
    || ', "game_profile"'
    || ', "active"'
    || ', "game_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_version"'
    || ', "date_created"'
    || ', "type"'
    || ' FROM "profile_game" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "type_id" '
    || ', "profile_id" '
    || ', "game_profile" '
    || ', "active" '
    || ', "game_id" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "profile_version" '
    || ', "date_created" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileGame - profile_game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_set_uuid
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_type_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_game_profile varchar = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_version varchar (50) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "profile_game"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_game" 
                    SET
                        "status" = in_status
                        , "type_id" = in_type_id
                        , "profile_id" = in_profile_id
                        , "game_profile" = in_game_profile
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_version" = in_profile_version
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_game"
                    (
                        "status"
                        , "type_id"
                        , "profile_id"
                        , "game_profile"
                        , "active"
                        , "game_id"
                        , "uuid"
                        , "date_modified"
                        , "profile_version"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_type_id
                        , in_profile_id
                        , in_game_profile
                        , in_active
                        , in_game_id
                        , in_uuid
                        , in_date_modified
                        , in_profile_version
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileGame - profile_game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_del_uuid
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_game"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGame - profile_game

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_get
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_get
(
)                        
RETURNS setof "profile_game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "profile_id"
        , "game_profile"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "profile_version"
        , "date_created"
        , "type"
    FROM "profile_game"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_get_uuid
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "profile_id"
        , "game_profile"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "profile_version"
        , "date_created"
        , "type"
    FROM "profile_game"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_get_game_id
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "profile_game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "profile_id"
        , "game_profile"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "profile_version"
        , "date_created"
        , "type"
    FROM "profile_game"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_get_profile_id
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "profile_id"
        , "game_profile"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "profile_version"
        , "date_created"
        , "type"
    FROM "profile_game"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_get_profile_id_game_id
(
    varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "profile_game"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "profile_id"
        , "game_profile"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "profile_version"
        , "date_created"
        , "type"
    FROM "profile_game"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_network_count
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_network"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_count_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_network"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_count_game_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_network"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_count_profile_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_count_profile_id
(
    in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_network"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_count_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_count_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_network"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_network_browse_filter
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_game_network_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "hash"'
    || ', "profile_id"'
    || ', "game_network_id"'
    || ', "network_username"'
    || ', "active"'
    || ', "game_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "secret"'
    || ', "token"'
    || ', "date_created"'
    || ', "type"'
    || ' FROM "profile_game_network" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "hash" '
    || ', "profile_id" '
    || ', "game_network_id" '
    || ', "network_username" '
    || ', "active" '
    || ', "game_id" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "secret" '
    || ', "token" '
    || ', "date_created" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_network_set_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_hash varchar (500) = NULL
    , in_profile_id uuid = NULL
    , in_game_network_id uuid = NULL
    , in_network_username varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_secret varchar (500) = NULL
    , in_token varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "profile_game_network"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_game_network" 
                    SET
                        "status" = in_status
                        , "hash" = in_hash
                        , "profile_id" = in_profile_id
                        , "game_network_id" = in_game_network_id
                        , "network_username" = in_network_username
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "secret" = in_secret
                        , "token" = in_token
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_game_network"
                    (
                        "status"
                        , "hash"
                        , "profile_id"
                        , "game_network_id"
                        , "network_username"
                        , "active"
                        , "game_id"
                        , "uuid"
                        , "date_modified"
                        , "secret"
                        , "token"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_hash
                        , in_profile_id
                        , in_game_network_id
                        , in_network_username
                        , in_active
                        , in_game_id
                        , in_uuid
                        , in_date_modified
                        , in_secret
                        , in_token
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_network_del_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_game_network"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_network_get
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_get
(
)                        
RETURNS setof "profile_game_network"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "hash"
        , "profile_id"
        , "game_network_id"
        , "network_username"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "secret"
        , "token"
        , "date_created"
        , "type"
    FROM "profile_game_network"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_get_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_game_network"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "hash"
        , "profile_id"
        , "game_network_id"
        , "network_username"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "secret"
        , "token"
        , "date_created"
        , "type"
    FROM "profile_game_network"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_get_game_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "profile_game_network"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "hash"
        , "profile_id"
        , "game_network_id"
        , "network_username"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "secret"
        , "token"
        , "date_created"
        , "type"
    FROM "profile_game_network"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_get_profile_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_game_network"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "hash"
        , "profile_id"
        , "game_network_id"
        , "network_username"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "secret"
        , "token"
        , "date_created"
        , "type"
    FROM "profile_game_network"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_network_get_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , varchar
    , boolean
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "profile_game_network"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "hash"
        , "profile_id"
        , "game_network_id"
        , "network_username"
        , "active"
        , "game_id"
        , "uuid"
        , "date_modified"
        , "secret"
        , "token"
        , "date_created"
        , "type"
    FROM "profile_game_network"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_count
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_data_attribute"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_count_uuid
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_data_attribute"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_count_profile_id
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_count_profile_id
(
    in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_data_attribute"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_count_profile_id_game_id_code
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_count_profile_id_game_id_code
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_code varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_data_attribute"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_browse_filter
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_game_data_attribute_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "code"'
    || ', "uuid"'
    || ', "val"'
    || ', "profile_id"'
    || ', "otype"'
    || ', "game_id"'
    || ', "type"'
    || ', "name"'
    || ' FROM "profile_game_data_attribute" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"code" '
    || ', "uuid" '
    || ', "val" '
    || ', "profile_id" '
    || ', "otype" '
    || ', "game_id" '
    || ', "type" '
    || ', "name" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_set_uuid
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_code varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_val varchar = NULL
    , in_profile_id uuid = NULL
    , in_otype varchar (500) = NULL
    , in_game_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_name varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "profile_game_data_attribute"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_game_data_attribute" 
                    SET
                        "code" = in_code
                        , "uuid" = in_uuid
                        , "val" = in_val
                        , "profile_id" = in_profile_id
                        , "otype" = in_otype
                        , "game_id" = in_game_id
                        , "type" = in_type
                        , "name" = in_name
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_game_data_attribute"
                    (
                        "code"
                        , "uuid"
                        , "val"
                        , "profile_id"
                        , "otype"
                        , "game_id"
                        , "type"
                        , "name"
                    )
                    VALUES
                    (
                        in_code
                        , in_uuid
                        , in_val
                        , in_profile_id
                        , in_otype
                        , in_game_id
                        , in_type
                        , in_name
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_set_profile_id
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_set_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_code varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_val varchar = NULL
    , in_profile_id uuid = NULL
    , in_otype varchar (500) = NULL
    , in_game_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_name varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "profile_game_data_attribute"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_game_data_attribute" 
                    SET
                        "code" = in_code
                        , "uuid" = in_uuid
                        , "val" = in_val
                        , "profile_id" = in_profile_id
                        , "otype" = in_otype
                        , "game_id" = in_game_id
                        , "type" = in_type
                        , "name" = in_name
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_game_data_attribute"
                    (
                        "code"
                        , "uuid"
                        , "val"
                        , "profile_id"
                        , "otype"
                        , "game_id"
                        , "type"
                        , "name"
                    )
                    VALUES
                    (
                        in_code
                        , in_uuid
                        , in_val
                        , in_profile_id
                        , in_otype
                        , in_game_id
                        , in_type
                        , in_name
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_set_profile_id_game_id_code
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_set_profile_id_game_id_code
(
    in_set_type varchar (50) = 'full'                        
    , in_code varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_val varchar = NULL
    , in_profile_id uuid = NULL
    , in_otype varchar (500) = NULL
    , in_game_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_name varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "profile_game_data_attribute"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND lower("code") = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_game_data_attribute" 
                    SET
                        "code" = in_code
                        , "uuid" = in_uuid
                        , "val" = in_val
                        , "profile_id" = in_profile_id
                        , "otype" = in_otype
                        , "game_id" = in_game_id
                        , "type" = in_type
                        , "name" = in_name
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND lower("code") = lower(in_code)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_game_data_attribute"
                    (
                        "code"
                        , "uuid"
                        , "val"
                        , "profile_id"
                        , "otype"
                        , "game_id"
                        , "type"
                        , "name"
                    )
                    VALUES
                    (
                        in_code
                        , in_uuid
                        , in_val
                        , in_profile_id
                        , in_otype
                        , in_game_id
                        , in_type
                        , in_name
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_del_uuid
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_game_data_attribute"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_del_profile_id
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_del_profile_id
(
    in_profile_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_game_data_attribute"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_del_profile_id_game_id_code
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_del_profile_id_game_id_code
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_code varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_game_data_attribute"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_get_uuid
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_game_data_attribute"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "code"
        , "uuid"
        , "val"
        , "profile_id"
        , "otype"
        , "game_id"
        , "type"
        , "name"
    FROM "profile_game_data_attribute"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_get_profile_id
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_game_data_attribute"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "code"
        , "uuid"
        , "val"
        , "profile_id"
        , "otype"
        , "game_id"
        , "type"
        , "name"
    FROM "profile_game_data_attribute"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_data_attribute_get_profile_id_game_id_code
(
    varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_data_attribute_get_profile_id_game_id_code
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_code varchar (500) = NULL
)
RETURNS setof "profile_game_data_attribute"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "code"
        , "uuid"
        , "val"
        , "profile_id"
        , "otype"
        , "game_id"
        , "type"
        , "name"
    FROM "profile_game_data_attribute"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameSession - game_session

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_count
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_session"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_count_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_session"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_count_game_id
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_session"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_count_profile_id
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_count_profile_id
(
    in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_session"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_count_profile_id_game_id
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_count_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_session"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameSession - game_session

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_browse_filter
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_session_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "game_area"'
    || ', "code"'
    || ', "network_uuid"'
    || ', "profile_id"'
    || ', "game_level"'
    || ', "profile_network"'
    || ', "profile_device"'
    || ', "display_name"'
    || ', "uuid"'
    || ', "network_external_port"'
    || ', "game_players_connected"'
    || ', "type"'
    || ', "status"'
    || ', "game_state"'
    || ', "hash"'
    || ', "description"'
    || ', "network_external_ip"'
    || ', "profile_username"'
    || ', "active"'
    || ', "game_id"'
    || ', "game_code"'
    || ', "game_player_z"'
    || ', "game_player_x"'
    || ', "game_player_y"'
    || ', "network_port"'
    || ', "game_players_allowed"'
    || ', "name"'
    || ', "date_modified"'
    || ', "game_type"'
    || ', "date_created"'
    || ', "network_ip"'
    || ', "network_use_nat"'
    || ' FROM "game_session" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"game_area" '
    || ', "code" '
    || ', "network_uuid" '
    || ', "profile_id" '
    || ', "game_level" '
    || ', "profile_network" '
    || ', "profile_device" '
    || ', "display_name" '
    || ', "uuid" '
    || ', "network_external_port" '
    || ', "game_players_connected" '
    || ', "type" '
    || ', "status" '
    || ', "game_state" '
    || ', "hash" '
    || ', "description" '
    || ', "network_external_ip" '
    || ', "profile_username" '
    || ', "active" '
    || ', "game_id" '
    || ', "game_code" '
    || ', "game_player_z" '
    || ', "game_player_x" '
    || ', "game_player_y" '
    || ', "network_port" '
    || ', "game_players_allowed" '
    || ', "name" '
    || ', "date_modified" '
    || ', "game_type" '
    || ', "date_created" '
    || ', "network_ip" '
    || ', "network_use_nat" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameSession - game_session

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_set_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_game_area varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_network_uuid varchar (40) = NULL
    , in_profile_id uuid = NULL
    , in_game_level varchar (255) = NULL
    , in_profile_network varchar (255) = NULL
    , in_profile_device varchar (50) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_network_external_port INTEGER = NULL
    , in_game_players_connected INTEGER = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_game_state varchar (50) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_network_external_ip varchar (40) = NULL
    , in_profile_username varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_code varchar (255) = NULL
    , in_game_player_z decimal = NULL
    , in_game_player_x decimal = NULL
    , in_game_player_y decimal = NULL
    , in_network_port INTEGER = NULL
    , in_game_players_allowed INTEGER = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_game_type varchar (255) = NULL
    , in_date_created TIMESTAMP = now()
    , in_network_ip varchar (40) = NULL
    , in_network_use_nat boolean = true
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_session"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_session" 
                    SET
                        "game_area" = in_game_area
                        , "code" = in_code
                        , "network_uuid" = in_network_uuid
                        , "profile_id" = in_profile_id
                        , "game_level" = in_game_level
                        , "profile_network" = in_profile_network
                        , "profile_device" = in_profile_device
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "network_external_port" = in_network_external_port
                        , "game_players_connected" = in_game_players_connected
                        , "type" = in_type
                        , "status" = in_status
                        , "game_state" = in_game_state
                        , "hash" = in_hash
                        , "description" = in_description
                        , "network_external_ip" = in_network_external_ip
                        , "profile_username" = in_profile_username
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_code" = in_game_code
                        , "game_player_z" = in_game_player_z
                        , "game_player_x" = in_game_player_x
                        , "game_player_y" = in_game_player_y
                        , "network_port" = in_network_port
                        , "game_players_allowed" = in_game_players_allowed
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "game_type" = in_game_type
                        , "date_created" = in_date_created
                        , "network_ip" = in_network_ip
                        , "network_use_nat" = in_network_use_nat
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_session"
                    (
                        "game_area"
                        , "code"
                        , "network_uuid"
                        , "profile_id"
                        , "game_level"
                        , "profile_network"
                        , "profile_device"
                        , "display_name"
                        , "uuid"
                        , "network_external_port"
                        , "game_players_connected"
                        , "type"
                        , "status"
                        , "game_state"
                        , "hash"
                        , "description"
                        , "network_external_ip"
                        , "profile_username"
                        , "active"
                        , "game_id"
                        , "game_code"
                        , "game_player_z"
                        , "game_player_x"
                        , "game_player_y"
                        , "network_port"
                        , "game_players_allowed"
                        , "name"
                        , "date_modified"
                        , "game_type"
                        , "date_created"
                        , "network_ip"
                        , "network_use_nat"
                    )
                    VALUES
                    (
                        in_game_area
                        , in_code
                        , in_network_uuid
                        , in_profile_id
                        , in_game_level
                        , in_profile_network
                        , in_profile_device
                        , in_display_name
                        , in_uuid
                        , in_network_external_port
                        , in_game_players_connected
                        , in_type
                        , in_status
                        , in_game_state
                        , in_hash
                        , in_description
                        , in_network_external_ip
                        , in_profile_username
                        , in_active
                        , in_game_id
                        , in_game_code
                        , in_game_player_z
                        , in_game_player_x
                        , in_game_player_y
                        , in_network_port
                        , in_game_players_allowed
                        , in_name
                        , in_date_modified
                        , in_game_type
                        , in_date_created
                        , in_network_ip
                        , in_network_use_nat
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameSession - game_session

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_del_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_session"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameSession - game_session

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_get
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_get
(
)                        
RETURNS setof "game_session"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "game_area"
        , "code"
        , "network_uuid"
        , "profile_id"
        , "game_level"
        , "profile_network"
        , "profile_device"
        , "display_name"
        , "uuid"
        , "network_external_port"
        , "game_players_connected"
        , "type"
        , "status"
        , "game_state"
        , "hash"
        , "description"
        , "network_external_ip"
        , "profile_username"
        , "active"
        , "game_id"
        , "game_code"
        , "game_player_z"
        , "game_player_x"
        , "game_player_y"
        , "network_port"
        , "game_players_allowed"
        , "name"
        , "date_modified"
        , "game_type"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
    FROM "game_session"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_get_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_session"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "game_area"
        , "code"
        , "network_uuid"
        , "profile_id"
        , "game_level"
        , "profile_network"
        , "profile_device"
        , "display_name"
        , "uuid"
        , "network_external_port"
        , "game_players_connected"
        , "type"
        , "status"
        , "game_state"
        , "hash"
        , "description"
        , "network_external_ip"
        , "profile_username"
        , "active"
        , "game_id"
        , "game_code"
        , "game_player_z"
        , "game_player_x"
        , "game_player_y"
        , "network_port"
        , "game_players_allowed"
        , "name"
        , "date_modified"
        , "game_type"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
    FROM "game_session"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_get_game_id
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_session"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "game_area"
        , "code"
        , "network_uuid"
        , "profile_id"
        , "game_level"
        , "profile_network"
        , "profile_device"
        , "display_name"
        , "uuid"
        , "network_external_port"
        , "game_players_connected"
        , "type"
        , "status"
        , "game_state"
        , "hash"
        , "description"
        , "network_external_ip"
        , "profile_username"
        , "active"
        , "game_id"
        , "game_code"
        , "game_player_z"
        , "game_player_x"
        , "game_player_y"
        , "network_port"
        , "game_players_allowed"
        , "name"
        , "date_modified"
        , "game_type"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
    FROM "game_session"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_get_profile_id
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "game_session"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "game_area"
        , "code"
        , "network_uuid"
        , "profile_id"
        , "game_level"
        , "profile_network"
        , "profile_device"
        , "display_name"
        , "uuid"
        , "network_external_port"
        , "game_players_connected"
        , "type"
        , "status"
        , "game_state"
        , "hash"
        , "description"
        , "network_external_ip"
        , "profile_username"
        , "active"
        , "game_id"
        , "game_code"
        , "game_player_z"
        , "game_player_x"
        , "game_player_y"
        , "network_port"
        , "game_players_allowed"
        , "name"
        , "date_modified"
        , "game_type"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
    FROM "game_session"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_get_profile_id_game_id
(
    varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , decimal
    , decimal
    , INTEGER
    , INTEGER
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_game_session_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_session"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "game_area"
        , "code"
        , "network_uuid"
        , "profile_id"
        , "game_level"
        , "profile_network"
        , "profile_device"
        , "display_name"
        , "uuid"
        , "network_external_port"
        , "game_players_connected"
        , "type"
        , "status"
        , "game_state"
        , "hash"
        , "description"
        , "network_external_ip"
        , "profile_username"
        , "active"
        , "game_id"
        , "game_code"
        , "game_player_z"
        , "game_player_x"
        , "game_player_y"
        , "network_port"
        , "game_players_allowed"
        , "name"
        , "date_modified"
        , "game_type"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
    FROM "game_session"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_data_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_data_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_session_data"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_data_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_data_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_session_data"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_data_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_data_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_session_data_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "data_results"'
    || ', "data"'
    || ', "uuid"'
    || ', "data_layer_projectile"'
    || ', "data_layer_actors"'
    || ', "active"'
    || ', "date_created"'
    || ', "data_layer_enemy"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game_session_data" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "data_results" '
    || ', "data" '
    || ', "uuid" '
    || ', "data_layer_projectile" '
    || ', "data_layer_actors" '
    || ', "active" '
    || ', "date_created" '
    || ', "data_layer_enemy" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_data_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_data_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data_results varchar = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_data_layer_projectile varchar = NULL
    , in_data_layer_actors varchar = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_data_layer_enemy varchar = NULL
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_session_data"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_session_data" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data_results" = in_data_results
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "data_layer_projectile" = in_data_layer_projectile
                        , "data_layer_actors" = in_data_layer_actors
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "data_layer_enemy" = in_data_layer_enemy
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_session_data"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data_results"
                        , "data"
                        , "uuid"
                        , "data_layer_projectile"
                        , "data_layer_actors"
                        , "active"
                        , "date_created"
                        , "data_layer_enemy"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data_results
                        , in_data
                        , in_uuid
                        , in_data_layer_projectile
                        , in_data_layer_actors
                        , in_active
                        , in_date_created
                        , in_data_layer_enemy
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_data_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_data_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_session_data"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_session_data_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_data_get
(
)                        
RETURNS setof "game_session_data"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data_results"
        , "data"
        , "uuid"
        , "data_layer_projectile"
        , "data_layer_actors"
        , "active"
        , "date_created"
        , "data_layer_enemy"
        , "type"
        , "description"
    FROM "game_session_data"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_session_data_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_data_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_session_data"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data_results"
        , "data"
        , "uuid"
        , "data_layer_projectile"
        , "data_layer_actors"
        , "active"
        , "date_created"
        , "data_layer_enemy"
        , "type"
        , "description"
    FROM "game_session_data"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameContent - game_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_content_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_content"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_content"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_count_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_count_game_id_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_count_game_id_path
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_count_game_id_path_version
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_count_game_id_path_version
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_count_game_id_path_version_platform_increment
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_count_game_id_path_version_platform_increment
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameContent - game_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_content_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_content_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "extension"'
    || ', "date_modified"'
    || ', "data"'
    || ', "game_id"'
    || ', "uuid"'
    || ', "filename"'
    || ', "source"'
    || ', "version"'
    || ', "platform"'
    || ', "content_type"'
    || ', "path"'
    || ', "active"'
    || ', "date_created"'
    || ', "increment"'
    || ', "type"'
    || ', "hash"'
    || ', "description"'
    || ' FROM "game_content" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "extension" '
    || ', "date_modified" '
    || ', "data" '
    || ', "game_id" '
    || ', "uuid" '
    || ', "filename" '
    || ', "source" '
    || ', "version" '
    || ', "platform" '
    || ', "content_type" '
    || ', "path" '
    || ', "active" '
    || ', "date_created" '
    || ', "increment" '
    || ', "type" '
    || ', "hash" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameContent - game_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_content_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_game_id uuid = NULL
    , in_uuid uuid = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_path varchar (500) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_increment INTEGER = NULL
    , in_type varchar (500) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_content"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_content" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "game_id" = in_game_id
                        , "uuid" = in_uuid
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "platform" = in_platform
                        , "content_type" = in_content_type
                        , "path" = in_path
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "increment" = in_increment
                        , "type" = in_type
                        , "hash" = in_hash
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_content"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "data"
                        , "game_id"
                        , "uuid"
                        , "filename"
                        , "source"
                        , "version"
                        , "platform"
                        , "content_type"
                        , "path"
                        , "active"
                        , "date_created"
                        , "increment"
                        , "type"
                        , "hash"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_data
                        , in_game_id
                        , in_uuid
                        , in_filename
                        , in_source
                        , in_version
                        , in_platform
                        , in_content_type
                        , in_path
                        , in_active
                        , in_date_created
                        , in_increment
                        , in_type
                        , in_hash
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_set_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_set_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_game_id uuid = NULL
    , in_uuid uuid = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_path varchar (500) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_increment INTEGER = NULL
    , in_type varchar (500) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_content" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "game_id" = in_game_id
                        , "uuid" = in_uuid
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "platform" = in_platform
                        , "content_type" = in_content_type
                        , "path" = in_path
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "increment" = in_increment
                        , "type" = in_type
                        , "hash" = in_hash
                        , "description" = in_description
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_content"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "data"
                        , "game_id"
                        , "uuid"
                        , "filename"
                        , "source"
                        , "version"
                        , "platform"
                        , "content_type"
                        , "path"
                        , "active"
                        , "date_created"
                        , "increment"
                        , "type"
                        , "hash"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_data
                        , in_game_id
                        , in_uuid
                        , in_filename
                        , in_source
                        , in_version
                        , in_platform
                        , in_content_type
                        , in_path
                        , in_active
                        , in_date_created
                        , in_increment
                        , in_type
                        , in_hash
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_set_game_id_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_set_game_id_path
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_game_id uuid = NULL
    , in_uuid uuid = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_path varchar (500) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_increment INTEGER = NULL
    , in_type varchar (500) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("path") = lower(in_path)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_content" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "game_id" = in_game_id
                        , "uuid" = in_uuid
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "platform" = in_platform
                        , "content_type" = in_content_type
                        , "path" = in_path
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "increment" = in_increment
                        , "type" = in_type
                        , "hash" = in_hash
                        , "description" = in_description
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("path") = lower(in_path)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_content"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "data"
                        , "game_id"
                        , "uuid"
                        , "filename"
                        , "source"
                        , "version"
                        , "platform"
                        , "content_type"
                        , "path"
                        , "active"
                        , "date_created"
                        , "increment"
                        , "type"
                        , "hash"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_data
                        , in_game_id
                        , in_uuid
                        , in_filename
                        , in_source
                        , in_version
                        , in_platform
                        , in_content_type
                        , in_path
                        , in_active
                        , in_date_created
                        , in_increment
                        , in_type
                        , in_hash
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_set_game_id_path_version
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_set_game_id_path_version
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_game_id uuid = NULL
    , in_uuid uuid = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_path varchar (500) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_increment INTEGER = NULL
    , in_type varchar (500) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_content" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "game_id" = in_game_id
                        , "uuid" = in_uuid
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "platform" = in_platform
                        , "content_type" = in_content_type
                        , "path" = in_path
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "increment" = in_increment
                        , "type" = in_type
                        , "hash" = in_hash
                        , "description" = in_description
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_content"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "data"
                        , "game_id"
                        , "uuid"
                        , "filename"
                        , "source"
                        , "version"
                        , "platform"
                        , "content_type"
                        , "path"
                        , "active"
                        , "date_created"
                        , "increment"
                        , "type"
                        , "hash"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_data
                        , in_game_id
                        , in_uuid
                        , in_filename
                        , in_source
                        , in_version
                        , in_platform
                        , in_content_type
                        , in_path
                        , in_active
                        , in_date_created
                        , in_increment
                        , in_type
                        , in_hash
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_set_game_id_path_version_platform_increment
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_set_game_id_path_version_platform_increment
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_game_id uuid = NULL
    , in_uuid uuid = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_path varchar (500) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_increment INTEGER = NULL
    , in_type varchar (500) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    AND lower("platform") = lower(in_platform)
                    AND "increment" = in_increment
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_content" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "game_id" = in_game_id
                        , "uuid" = in_uuid
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "platform" = in_platform
                        , "content_type" = in_content_type
                        , "path" = in_path
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "increment" = in_increment
                        , "type" = in_type
                        , "hash" = in_hash
                        , "description" = in_description
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    AND lower("platform") = lower(in_platform)
                    AND "increment" = in_increment
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_content"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "data"
                        , "game_id"
                        , "uuid"
                        , "filename"
                        , "source"
                        , "version"
                        , "platform"
                        , "content_type"
                        , "path"
                        , "active"
                        , "date_created"
                        , "increment"
                        , "type"
                        , "hash"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_data
                        , in_game_id
                        , in_uuid
                        , in_filename
                        , in_source
                        , in_version
                        , in_platform
                        , in_content_type
                        , in_path
                        , in_active
                        , in_date_created
                        , in_increment
                        , in_type
                        , in_hash
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameContent - game_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_content_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_content"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_content_del_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_del_game_id
(
    in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_content_del_game_id_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_del_game_id_path
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_content_del_game_id_path_version
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_del_game_id_path_version
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_content_del_game_id_path_version_platform_increment
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_del_game_id_path_version_platform_increment
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameContent - game_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_content_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_get
(
)                        
RETURNS setof "game_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "extension"
        , "date_modified"
        , "data"
        , "game_id"
        , "uuid"
        , "filename"
        , "source"
        , "version"
        , "platform"
        , "content_type"
        , "path"
        , "active"
        , "date_created"
        , "increment"
        , "type"
        , "hash"
        , "description"
    FROM "game_content"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "extension"
        , "date_modified"
        , "data"
        , "game_id"
        , "uuid"
        , "filename"
        , "source"
        , "version"
        , "platform"
        , "content_type"
        , "path"
        , "active"
        , "date_created"
        , "increment"
        , "type"
        , "hash"
        , "description"
    FROM "game_content"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_get_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "extension"
        , "date_modified"
        , "data"
        , "game_id"
        , "uuid"
        , "filename"
        , "source"
        , "version"
        , "platform"
        , "content_type"
        , "path"
        , "active"
        , "date_created"
        , "increment"
        , "type"
        , "hash"
        , "description"
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_get_game_id_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_get_game_id_path
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
)
RETURNS setof "game_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "extension"
        , "date_modified"
        , "data"
        , "game_id"
        , "uuid"
        , "filename"
        , "source"
        , "version"
        , "platform"
        , "content_type"
        , "path"
        , "active"
        , "date_created"
        , "increment"
        , "type"
        , "hash"
        , "description"
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_get_game_id_path_version
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_get_game_id_path_version
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
)
RETURNS setof "game_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "extension"
        , "date_modified"
        , "data"
        , "game_id"
        , "uuid"
        , "filename"
        , "source"
        , "version"
        , "platform"
        , "content_type"
        , "path"
        , "active"
        , "date_created"
        , "increment"
        , "type"
        , "hash"
        , "description"
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_content_get_game_id_path_version_platform_increment
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_content_get_game_id_path_version_platform_increment
(
    in_game_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
)
RETURNS setof "game_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "extension"
        , "date_modified"
        , "data"
        , "game_id"
        , "uuid"
        , "filename"
        , "source"
        , "version"
        , "platform"
        , "content_type"
        , "path"
        , "active"
        , "date_created"
        , "increment"
        , "type"
        , "hash"
        , "description"
    FROM "game_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_content_count
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_uuid
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_profile_id
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_profile_id
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_username
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_username
(
    in_username varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_profile_id_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_profile_id_path
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_profile_id_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_profile_id_path_version
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_profile_id_path_version_
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_profile_id_path_version_
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_username_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_username_path
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_username_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_username_path_version
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_count_game_id_username_path_version_pl
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_count_game_id_username_path_version_pl
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_content_browse_filter
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_profile_content_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "username"'
    || ', "code"'
    || ', "profile_id"'
    || ', "increment"'
    || ', "path"'
    || ', "display_name"'
    || ', "uuid"'
    || ', "platform"'
    || ', "filename"'
    || ', "source"'
    || ', "version"'
    || ', "game_network"'
    || ', "type"'
    || ', "status"'
    || ', "hash"'
    || ', "description"'
    || ', "content_type"'
    || ', "active"'
    || ', "game_id"'
    || ', "data"'
    || ', "name"'
    || ', "extension"'
    || ', "date_modified"'
    || ', "date_created"'
    || ' FROM "game_profile_content" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"username" '
    || ', "code" '
    || ', "profile_id" '
    || ', "increment" '
    || ', "path" '
    || ', "display_name" '
    || ', "uuid" '
    || ', "platform" '
    || ', "filename" '
    || ', "source" '
    || ', "version" '
    || ', "game_network" '
    || ', "type" '
    || ', "status" '
    || ', "hash" '
    || ', "description" '
    || ', "content_type" '
    || ', "active" '
    || ', "game_id" '
    || ', "data" '
    || ', "name" '
    || ', "extension" '
    || ', "date_modified" '
    || ', "date_created" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_content_set_uuid
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_profile_id
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_username
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_username
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND lower("username") = lower(in_username)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND lower("username") = lower(in_username)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_profile_id_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_profile_id_path
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    AND lower("path") = lower(in_path)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    AND lower("path") = lower(in_path)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_profile_id_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_profile_id_path_version
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_profile_id_path_version_pl
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_profile_id_path_version_pl
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    AND lower("platform") = lower(in_platform)
                    AND "increment" = in_increment
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND "profile_id" = in_profile_id
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    AND lower("platform") = lower(in_platform)
                    AND "increment" = in_increment
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_username_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_username_path
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    AND lower("path") = lower(in_path)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    AND lower("path") = lower(in_path)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_username_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_username_path_version
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_set_game_id_username_path_version_plat
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_set_game_id_username_path_version_plat
(
    in_set_type varchar (50) = 'full'                        
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_increment INTEGER = NULL
    , in_path varchar (500) = NULL
    , in_display_name varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
    , in_filename varchar (500) = NULL
    , in_source varchar (255) = NULL
    , in_version varchar (255) = NULL
    , in_game_network varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_status varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_content_type varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_name varchar (255) = NULL
    , in_extension varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_created TIMESTAMP = now()
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_content"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    AND lower("platform") = lower(in_platform)
                    AND "increment" = in_increment
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_content" 
                    SET
                        "username" = in_username
                        , "code" = in_code
                        , "profile_id" = in_profile_id
                        , "increment" = in_increment
                        , "path" = in_path
                        , "display_name" = in_display_name
                        , "uuid" = in_uuid
                        , "platform" = in_platform
                        , "filename" = in_filename
                        , "source" = in_source
                        , "version" = in_version
                        , "game_network" = in_game_network
                        , "type" = in_type
                        , "status" = in_status
                        , "hash" = in_hash
                        , "description" = in_description
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "name" = in_name
                        , "extension" = in_extension
                        , "date_modified" = in_date_modified
                        , "date_created" = in_date_created
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    AND lower("username") = lower(in_username)
                    AND lower("path") = lower(in_path)
                    AND lower("version") = lower(in_version)
                    AND lower("platform") = lower(in_platform)
                    AND "increment" = in_increment
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_content"
                    (
                        "username"
                        , "code"
                        , "profile_id"
                        , "increment"
                        , "path"
                        , "display_name"
                        , "uuid"
                        , "platform"
                        , "filename"
                        , "source"
                        , "version"
                        , "game_network"
                        , "type"
                        , "status"
                        , "hash"
                        , "description"
                        , "content_type"
                        , "active"
                        , "game_id"
                        , "data"
                        , "name"
                        , "extension"
                        , "date_modified"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_username
                        , in_code
                        , in_profile_id
                        , in_increment
                        , in_path
                        , in_display_name
                        , in_uuid
                        , in_platform
                        , in_filename
                        , in_source
                        , in_version
                        , in_game_network
                        , in_type
                        , in_status
                        , in_hash
                        , in_description
                        , in_content_type
                        , in_active
                        , in_game_id
                        , in_data
                        , in_name
                        , in_extension
                        , in_date_modified
                        , in_date_created
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_content_del_uuid
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_profile_id
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_profile_id
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_username
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_username
(
    in_username varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_profile_id_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_profile_id_path
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_profile_id_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_profile_id_path_version
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_profile_id_path_version_pl
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_profile_id_path_version_pl
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_username_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_username_path
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_username_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_username_path_version
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_content_del_game_id_username_path_version_plat
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_del_game_id_username_path_version_plat
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_content"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_content_get
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get
(
)                        
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_uuid
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_profile_id
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_profile_id
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_username
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_username
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_username
(
    in_username varchar (500) = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_profile_id_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_profile_id_path
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_profile_id_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_profile_id_path_version
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_profile_id_path_version_pl
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_profile_id_path_version_pl
(
    in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_username_path
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_username_path
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_username_path_version
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_username_path_version
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_content_get_game_id_username_path_version_plat
(
    varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_game_profile_content_get_game_id_username_path_version_plat
(
    in_game_id uuid = NULL
    , in_username varchar (500) = NULL
    , in_path varchar (500) = NULL
    , in_version varchar (255) = NULL
    , in_platform varchar (255) = NULL
    , in_increment INTEGER = NULL
)
RETURNS setof "game_profile_content"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "username"
        , "code"
        , "profile_id"
        , "increment"
        , "path"
        , "display_name"
        , "uuid"
        , "platform"
        , "filename"
        , "source"
        , "version"
        , "game_network"
        , "type"
        , "status"
        , "hash"
        , "description"
        , "content_type"
        , "active"
        , "game_id"
        , "data"
        , "name"
        , "extension"
        , "date_modified"
        , "date_created"
    FROM "game_profile_content"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameApp - game_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_app_count
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_count_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_count_game_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_app"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_count_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_count_app_id
(
    in_app_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_app"
    WHERE 1=1
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_count_game_id_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_count_game_id_app_id
(
    in_game_id uuid = NULL
    , in_app_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_app"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameApp - game_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_app_browse_filter
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_app_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "game_id"'
    || ', "type"'
    || ', "app_id"'
    || ' FROM "game_app" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "game_id" '
    || ', "type" '
    || ', "app_id" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameApp - game_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_app_set_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_app_id uuid = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_app"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_app" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "game_id" = in_game_id
                        , "type" = in_type
                        , "app_id" = in_app_id
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_app"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "game_id"
                        , "type"
                        , "app_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_game_id
                        , in_type
                        , in_app_id
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameApp - game_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_app_del_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_app"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameApp - game_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_app_get
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_get
(
)                        
RETURNS setof "game_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "type"
        , "app_id"
    FROM "game_app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_get_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "type"
        , "app_id"
    FROM "game_app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_get_game_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "type"
        , "app_id"
    FROM "game_app"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_get_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_get_app_id
(
    in_app_id uuid = NULL
)
RETURNS setof "game_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "type"
        , "app_id"
    FROM "game_app"
    WHERE 1=1
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_app_get_game_id_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_get_game_id_app_id
(
    in_game_id uuid = NULL
    , in_app_id uuid = NULL
)
RETURNS setof "game_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "type"
        , "app_id"
    FROM "game_app"
    WHERE 1=1
    AND "game_id" = in_game_id
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_location_count
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_count_uuid
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_count_game_location_id
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_count_game_location_id
(
    in_game_location_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_location"
    WHERE 1=1
    AND "game_location_id" = in_game_location_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_count_profile_id
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_count_profile_id
(
    in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_location"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_count_profile_id_game_location_id
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_count_profile_id_game_location_id
(
    in_profile_id uuid = NULL
    , in_game_location_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_game_location"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_location_id" = in_game_location_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_location_browse_filter
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_game_location_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "game_location_id"'
    || ', "type_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "profile_id"'
    || ', "type"'
    || ' FROM "profile_game_location" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "game_location_id" '
    || ', "type_id" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "profile_id" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_location_set_uuid
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_game_location_id uuid = NULL
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "profile_game_location"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_game_location" 
                    SET
                        "status" = in_status
                        , "game_location_id" = in_game_location_id
                        , "type_id" = in_type_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_game_location"
                    (
                        "status"
                        , "game_location_id"
                        , "type_id"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "profile_id"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_game_location_id
                        , in_type_id
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_profile_id
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_location_del_uuid
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_game_location"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_game_location_get
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_get
(
)                        
RETURNS setof "profile_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_game_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_get_uuid
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_game_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_get_game_location_id
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_get_game_location_id
(
    in_game_location_id uuid = NULL
)
RETURNS setof "profile_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_game_location"
    WHERE 1=1
    AND "game_location_id" = in_game_location_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_get_profile_id
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_game_location"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_game_location_get_profile_id_game_location_id
(
    varchar
    , uuid
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_get_profile_id_game_location_id
(
    in_profile_id uuid = NULL
    , in_game_location_id uuid = NULL
)
RETURNS setof "profile_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_game_location"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_location_id" = in_game_location_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_photo_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_photo"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_photo"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_count_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_count_external_id
(
    in_external_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_photo"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_count_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_count_url
(
    in_url varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_count_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_count_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_count_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_count_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_photo"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_photo_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_photo_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "third_party_oembed"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "url"'
    || ', "third_party_data"'
    || ', "uuid"'
    || ', "third_party_url"'
    || ', "third_party_id"'
    || ', "content_type"'
    || ', "external_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game_photo" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "third_party_oembed" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "url" '
    || ', "third_party_data" '
    || ', "uuid" '
    || ', "third_party_url" '
    || ', "third_party_id" '
    || ', "content_type" '
    || ', "external_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_photo_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_photo"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_photo" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_photo"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_set_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_set_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_photo"  
                    WHERE 1=1
                    AND "external_id" = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_photo" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "external_id" = in_external_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_photo"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_set_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_set_url
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_photo"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_photo" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_photo"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_set_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_set_url_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_photo"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "external_id" = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_photo" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "external_id" = in_external_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_photo"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_set_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_set_uuid_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_photo"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "external_id" = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_photo" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "external_id" = in_external_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_photo"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_photo_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_photo"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_photo_del_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_del_external_id
(
    in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_photo"
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_photo_del_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_del_url
(
    in_url varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_photo"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_photo_del_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_del_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_photo"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_photo_del_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_del_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_photo"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_photo_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_get
(
)                        
RETURNS setof "game_photo"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_photo"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_photo"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_photo"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_get_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_get_external_id
(
    in_external_id uuid = NULL
)
RETURNS setof "game_photo"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_photo"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_get_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_get_url
(
    in_url varchar (500) = NULL
)
RETURNS setof "game_photo"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_get_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_get_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "game_photo"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_photo_get_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_photo_get_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "game_photo"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_photo"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameVideo - game_video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_video_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_video"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_video"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_count_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_count_external_id
(
    in_external_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_video"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_count_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_count_url
(
    in_url varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_count_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_count_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_count_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_count_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_video"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameVideo - game_video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_video_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_video_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "third_party_oembed"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "url"'
    || ', "third_party_data"'
    || ', "uuid"'
    || ', "third_party_url"'
    || ', "third_party_id"'
    || ', "content_type"'
    || ', "external_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game_video" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "third_party_oembed" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "url" '
    || ', "third_party_data" '
    || ', "uuid" '
    || ', "third_party_url" '
    || ', "third_party_id" '
    || ', "content_type" '
    || ', "external_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameVideo - game_video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_video_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_video"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_video" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_video"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_set_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_set_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_video"  
                    WHERE 1=1
                    AND "external_id" = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_video" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "external_id" = in_external_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_video"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_set_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_set_url
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_video"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_video" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_video"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_set_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_set_url_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_video"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "external_id" = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_video" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "external_id" = in_external_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_video"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_set_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_set_uuid_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_external_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_video"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "external_id" = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_video" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "uuid" = in_uuid
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "external_id" = in_external_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "external_id" = in_external_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_video"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "uuid"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "external_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_uuid
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_external_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameVideo - game_video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_video_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_video"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_video_del_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_del_external_id
(
    in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_video"
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_video_del_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_del_url
(
    in_url varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_video"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_video_del_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_del_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_video"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_video_del_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_del_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_video"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameVideo - game_video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_video_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_get
(
)                        
RETURNS setof "game_video"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_video"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_video"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_video"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_get_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_get_external_id
(
    in_external_id uuid = NULL
)
RETURNS setof "game_video"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_video"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_get_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_get_url
(
    in_url varchar (500) = NULL
)
RETURNS setof "game_video"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_get_url_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_get_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "game_video"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_video_get_uuid_external_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_video_get_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "game_video"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "uuid"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_video"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_count_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_count_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_count_url
(
    in_url varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_count_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_count_url_game_id
(
    in_url varchar (500) = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_count_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_count_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_rpg_item_weapon_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "third_party_oembed"'
    || ', "code"'
    || ', "description"'
    || ', "game_defense"'
    || ', "third_party_url"'
    || ', "third_party_id"'
    || ', "content_type"'
    || ', "type"'
    || ', "active"'
    || ', "game_id"'
    || ', "game_attack"'
    || ', "uuid"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "url"'
    || ', "third_party_data"'
    || ', "game_price"'
    || ', "game_type"'
    || ', "game_skill"'
    || ', "game_health"'
    || ', "date_created"'
    || ', "game_energy"'
    || ', "game_data"'
    || ' FROM "game_rpg_item_weapon" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "third_party_oembed" '
    || ', "code" '
    || ', "description" '
    || ', "game_defense" '
    || ', "third_party_url" '
    || ', "third_party_id" '
    || ', "content_type" '
    || ', "type" '
    || ', "active" '
    || ', "game_id" '
    || ', "game_attack" '
    || ', "uuid" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "url" '
    || ', "third_party_data" '
    || ', "game_price" '
    || ', "game_type" '
    || ', "game_skill" '
    || ', "game_health" '
    || ', "date_created" '
    || ', "game_energy" '
    || ', "game_data" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_weapon"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_weapon" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_weapon"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_set_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_set_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_weapon"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_weapon" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_weapon"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_set_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_set_url
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_weapon"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_weapon" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_weapon"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_set_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_set_url_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_weapon"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_weapon" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_weapon"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_set_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_set_uuid_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_weapon"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_weapon" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_weapon"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_weapon"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_del_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_del_game_id
(
    in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_weapon"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_del_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_del_url
(
    in_url varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_weapon"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_del_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_del_url_game_id
(
    in_url varchar (500) = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_weapon"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_del_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_del_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_weapon"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_get
(
)                        
RETURNS setof "game_rpg_item_weapon"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_rpg_item_weapon"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_get_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_rpg_item_weapon"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_get_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_get_url
(
    in_url varchar (500) = NULL
)
RETURNS setof "game_rpg_item_weapon"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_get_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_get_url_game_id
(
    in_url varchar (500) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_rpg_item_weapon"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_weapon_get_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_weapon_get_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_rpg_item_weapon"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_weapon"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_skill"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_count_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_count_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_count_url
(
    in_url varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_count_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_count_url_game_id
(
    in_url varchar (500) = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_count_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_count_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_rpg_item_skill_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "third_party_oembed"'
    || ', "code"'
    || ', "description"'
    || ', "game_defense"'
    || ', "third_party_url"'
    || ', "third_party_id"'
    || ', "content_type"'
    || ', "type"'
    || ', "active"'
    || ', "game_id"'
    || ', "game_attack"'
    || ', "uuid"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "url"'
    || ', "third_party_data"'
    || ', "game_price"'
    || ', "game_type"'
    || ', "game_skill"'
    || ', "game_health"'
    || ', "date_created"'
    || ', "game_energy"'
    || ', "game_data"'
    || ' FROM "game_rpg_item_skill" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "third_party_oembed" '
    || ', "code" '
    || ', "description" '
    || ', "game_defense" '
    || ', "third_party_url" '
    || ', "third_party_id" '
    || ', "content_type" '
    || ', "type" '
    || ', "active" '
    || ', "game_id" '
    || ', "game_attack" '
    || ', "uuid" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "url" '
    || ', "third_party_data" '
    || ', "game_price" '
    || ', "game_type" '
    || ', "game_skill" '
    || ', "game_health" '
    || ', "date_created" '
    || ', "game_energy" '
    || ', "game_data" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_skill"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_skill" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_skill"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_set_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_set_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_skill"  
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_skill" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_skill"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_set_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_set_url
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_skill"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_skill" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_skill"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_set_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_set_url_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_skill"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_skill" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_skill"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_set_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_set_uuid_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_third_party_oembed varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_game_defense decimal = NULL
    , in_third_party_url varchar (500) = NULL
    , in_third_party_id varchar (500) = NULL
    , in_content_type varchar (100) = NULL
    , in_type varchar (500) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_game_attack decimal = NULL
    , in_uuid uuid = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_third_party_data varchar (500) = NULL
    , in_game_price decimal = NULL
    , in_game_type decimal = NULL
    , in_game_skill decimal = NULL
    , in_game_health decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_energy decimal = NULL
    , in_game_data varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_rpg_item_skill"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_rpg_item_skill" 
                    SET
                        "status" = in_status
                        , "third_party_oembed" = in_third_party_oembed
                        , "code" = in_code
                        , "description" = in_description
                        , "game_defense" = in_game_defense
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "type" = in_type
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "game_attack" = in_game_attack
                        , "uuid" = in_uuid
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "third_party_data" = in_third_party_data
                        , "game_price" = in_game_price
                        , "game_type" = in_game_type
                        , "game_skill" = in_game_skill
                        , "game_health" = in_game_health
                        , "date_created" = in_date_created
                        , "game_energy" = in_game_energy
                        , "game_data" = in_game_data
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_rpg_item_skill"
                    (
                        "status"
                        , "third_party_oembed"
                        , "code"
                        , "description"
                        , "game_defense"
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "type"
                        , "active"
                        , "game_id"
                        , "game_attack"
                        , "uuid"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "third_party_data"
                        , "game_price"
                        , "game_type"
                        , "game_skill"
                        , "game_health"
                        , "date_created"
                        , "game_energy"
                        , "game_data"
                    )
                    VALUES
                    (
                        in_status
                        , in_third_party_oembed
                        , in_code
                        , in_description
                        , in_game_defense
                        , in_third_party_url
                        , in_third_party_id
                        , in_content_type
                        , in_type
                        , in_active
                        , in_game_id
                        , in_game_attack
                        , in_uuid
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_third_party_data
                        , in_game_price
                        , in_game_type
                        , in_game_skill
                        , in_game_health
                        , in_date_created
                        , in_game_energy
                        , in_game_data
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_skill"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_del_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_del_game_id
(
    in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_skill"
    WHERE 1=1                        
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_del_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_del_url
(
    in_url varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_skill"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_del_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_del_url_game_id
(
    in_url varchar (500) = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_skill"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_del_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_del_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_rpg_item_skill"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_get
(
)                        
RETURNS setof "game_rpg_item_skill"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_skill"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_rpg_item_skill"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_get_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_rpg_item_skill"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_get_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_get_url
(
    in_url varchar (500) = NULL
)
RETURNS setof "game_rpg_item_skill"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_get_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_get_url_game_id
(
    in_url varchar (500) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_rpg_item_skill"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_rpg_item_skill_get_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , decimal
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , uuid
    , decimal
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , decimal
    , decimal
    , decimal
    , decimal
    , TIMESTAMP
    , decimal
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_rpg_item_skill_get_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_rpg_item_skill"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "third_party_oembed"
        , "code"
        , "description"
        , "game_defense"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "type"
        , "active"
        , "game_id"
        , "game_attack"
        , "uuid"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "third_party_data"
        , "game_price"
        , "game_type"
        , "game_skill"
        , "game_health"
        , "date_created"
        , "game_energy"
        , "game_data"
    FROM "game_rpg_item_skill"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProduct - game_product

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_product_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_product"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_product"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_count_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_count_game_id
(
    in_game_id varchar (100) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_product"
    WHERE 1=1
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_count_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_count_url
(
    in_url varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_product"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_count_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_count_url_game_id
(
    in_url varchar (255) = NULL
    , in_game_id varchar (100) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_product"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_count_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_count_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_product"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProduct - game_product

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_product_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_product_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "url"'
    || ', "uuid"'
    || ', "game_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game_product" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "url" '
    || ', "uuid" '
    || ', "game_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameProduct - game_product

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_product_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_product"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_product" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "uuid" = in_uuid
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_product"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "uuid"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_uuid
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_set_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_set_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_product"  
                    WHERE 1=1
                    AND lower("game_id") = lower(in_game_id)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_product" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "uuid" = in_uuid
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("game_id") = lower(in_game_id)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_product"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "uuid"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_uuid
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_set_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_set_url
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_product"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_product" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "uuid" = in_uuid
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_product"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "uuid"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_uuid
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_set_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_set_url_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_product"  
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND lower("game_id") = lower(in_game_id)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_product" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "uuid" = in_uuid
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("url") = lower(in_url)
                    AND lower("game_id") = lower(in_game_id)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_product"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "uuid"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_uuid
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_set_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_set_uuid_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_product"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND lower("game_id") = lower(in_game_id)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_product" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "uuid" = in_uuid
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND lower("game_id") = lower(in_game_id)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_product"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "uuid"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_url
                        , in_uuid
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameProduct - game_product

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_product_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_product"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_product_del_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_del_game_id
(
    in_game_id varchar (100) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_product"
    WHERE 1=1                        
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_product_del_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_del_url
(
    in_url varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_product"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_product_del_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_del_url_game_id
(
    in_url varchar (255) = NULL
    , in_game_id varchar (100) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_product"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_product_del_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_del_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_product"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProduct - game_product

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_product_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_get
(
)                        
RETURNS setof "game_product"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "uuid"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_product"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_product"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "uuid"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_product"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_get_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_get_game_id
(
    in_game_id varchar (100) = NULL
)
RETURNS setof "game_product"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "uuid"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_product"
    WHERE 1=1
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_get_url
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_get_url
(
    in_url varchar (255) = NULL
)
RETURNS setof "game_product"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "uuid"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_product"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_get_url_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_get_url_game_id
(
    in_url varchar (255) = NULL
    , in_game_id varchar (100) = NULL
)
RETURNS setof "game_product"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "uuid"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_product"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_product_get_uuid_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_product_get_uuid_game_id
(
    in_uuid uuid = NULL
    , in_game_id varchar (100) = NULL
)
RETURNS setof "game_product"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "url"
        , "uuid"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_product"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND lower("game_id") = lower(in_game_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count_uuid
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count_key
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count_key
(
    in_key uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count_key_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count_key_game_id
(
    in_key uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count_key_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count_key_profile_id_game_id
(
    in_key uuid = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_count_key_profile_id_game_id_tim
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_count_key_profile_id_game_id_tim
(
    in_key uuid = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_browse_filter
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_statistic_leaderboard_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "username"'
    || ', "key"'
    || ', "stat_value_formatted"'
    || ', "profile_id"'
    || ', "rank"'
    || ', "rank_change"'
    || ', "game_id"'
    || ', "active"'
    || ', "rank_total_count"'
    || ', "data"'
    || ', "stat_value"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "level"'
    || ', "timestamp"'
    || ', "date_created"'
    || ', "type"'
    || ' FROM "game_statistic_leaderboard" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "username" '
    || ', "key" '
    || ', "stat_value_formatted" '
    || ', "profile_id" '
    || ', "rank" '
    || ', "rank_change" '
    || ', "game_id" '
    || ', "active" '
    || ', "rank_total_count" '
    || ', "data" '
    || ', "stat_value" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "level" '
    || ', "timestamp" '
    || ', "date_created" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_set_uuid
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_key uuid = NULL
    , in_stat_value_formatted varchar (500) = NULL
    , in_profile_id uuid = NULL
    , in_rank INTEGER = NULL
    , in_rank_change INTEGER = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_rank_total_count INTEGER = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_leaderboard"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_leaderboard" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "key" = in_key
                        , "stat_value_formatted" = in_stat_value_formatted
                        , "profile_id" = in_profile_id
                        , "rank" = in_rank
                        , "rank_change" = in_rank_change
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "rank_total_count" = in_rank_total_count
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "timestamp" = in_timestamp
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_leaderboard"
                    (
                        "status"
                        , "username"
                        , "key"
                        , "stat_value_formatted"
                        , "profile_id"
                        , "rank"
                        , "rank_change"
                        , "game_id"
                        , "active"
                        , "rank_total_count"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "timestamp"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_stat_value_formatted
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_timestamp
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_time
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_time
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_key uuid = NULL
    , in_stat_value_formatted varchar (500) = NULL
    , in_profile_id uuid = NULL
    , in_rank INTEGER = NULL
    , in_rank_change INTEGER = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_rank_total_count INTEGER = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_leaderboard"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_leaderboard" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "key" = in_key
                        , "stat_value_formatted" = in_stat_value_formatted
                        , "profile_id" = in_profile_id
                        , "rank" = in_rank
                        , "rank_change" = in_rank_change
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "rank_total_count" = in_rank_total_count
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "timestamp" = in_timestamp
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_leaderboard"
                    (
                        "status"
                        , "username"
                        , "key"
                        , "stat_value_formatted"
                        , "profile_id"
                        , "rank"
                        , "rank_change"
                        , "game_id"
                        , "active"
                        , "rank_total_count"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "timestamp"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_stat_value_formatted
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_timestamp
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_set_profile_id_key
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_set_profile_id_key
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_key uuid = NULL
    , in_stat_value_formatted varchar (500) = NULL
    , in_profile_id uuid = NULL
    , in_rank INTEGER = NULL
    , in_rank_change INTEGER = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_rank_total_count INTEGER = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_leaderboard"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "key" = in_key
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_leaderboard" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "key" = in_key
                        , "stat_value_formatted" = in_stat_value_formatted
                        , "profile_id" = in_profile_id
                        , "rank" = in_rank
                        , "rank_change" = in_rank_change
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "rank_total_count" = in_rank_total_count
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "timestamp" = in_timestamp
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "key" = in_key
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_leaderboard"
                    (
                        "status"
                        , "username"
                        , "key"
                        , "stat_value_formatted"
                        , "profile_id"
                        , "rank"
                        , "rank_change"
                        , "game_id"
                        , "active"
                        , "rank_total_count"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "timestamp"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_stat_value_formatted
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_timestamp
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_set_profile_id_key_timestamp
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_set_profile_id_key_timestamp
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_key uuid = NULL
    , in_stat_value_formatted varchar (500) = NULL
    , in_profile_id uuid = NULL
    , in_rank INTEGER = NULL
    , in_rank_change INTEGER = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_rank_total_count INTEGER = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_leaderboard"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "key" = in_key
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_leaderboard" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "key" = in_key
                        , "stat_value_formatted" = in_stat_value_formatted
                        , "profile_id" = in_profile_id
                        , "rank" = in_rank
                        , "rank_change" = in_rank_change
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "rank_total_count" = in_rank_total_count
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "timestamp" = in_timestamp
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "key" = in_key
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_leaderboard"
                    (
                        "status"
                        , "username"
                        , "key"
                        , "stat_value_formatted"
                        , "profile_id"
                        , "rank"
                        , "rank_change"
                        , "game_id"
                        , "active"
                        , "rank_total_count"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "timestamp"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_stat_value_formatted
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_timestamp
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_set_key_profile_id_game_id_times
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_set_key_profile_id_game_id_times
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_key uuid = NULL
    , in_stat_value_formatted varchar (500) = NULL
    , in_profile_id uuid = NULL
    , in_rank INTEGER = NULL
    , in_rank_change INTEGER = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_rank_total_count INTEGER = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_leaderboard"  
                    WHERE 1=1
                    AND "key" = in_key
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_leaderboard" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "key" = in_key
                        , "stat_value_formatted" = in_stat_value_formatted
                        , "profile_id" = in_profile_id
                        , "rank" = in_rank
                        , "rank_change" = in_rank_change
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "rank_total_count" = in_rank_total_count
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "timestamp" = in_timestamp
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "key" = in_key
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_leaderboard"
                    (
                        "status"
                        , "username"
                        , "key"
                        , "stat_value_formatted"
                        , "profile_id"
                        , "rank"
                        , "rank_change"
                        , "game_id"
                        , "active"
                        , "rank_total_count"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "timestamp"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_stat_value_formatted
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_timestamp
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_set_profile_id_game_id_key
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_set_profile_id_game_id_key
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_key uuid = NULL
    , in_stat_value_formatted varchar (500) = NULL
    , in_profile_id uuid = NULL
    , in_rank INTEGER = NULL
    , in_rank_change INTEGER = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_rank_total_count INTEGER = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_leaderboard"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "key" = in_key
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_leaderboard" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "key" = in_key
                        , "stat_value_formatted" = in_stat_value_formatted
                        , "profile_id" = in_profile_id
                        , "rank" = in_rank
                        , "rank_change" = in_rank_change
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "rank_total_count" = in_rank_total_count
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "timestamp" = in_timestamp
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "key" = in_key
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_leaderboard"
                    (
                        "status"
                        , "username"
                        , "key"
                        , "stat_value_formatted"
                        , "profile_id"
                        , "rank"
                        , "rank_change"
                        , "game_id"
                        , "active"
                        , "rank_total_count"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "timestamp"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_stat_value_formatted
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_timestamp
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_del_uuid
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_statistic_leaderboard"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_del_key_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_del_key_game_id
(
    in_key uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_statistic_leaderboard"
    WHERE 1=1                        
    AND "key" = in_key
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_del_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_del_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_statistic_leaderboard"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_del_key_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_del_key_profile_id_game_id
(
    in_key uuid = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_statistic_leaderboard"
    WHERE 1=1                        
    AND "key" = in_key
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get
(
)                        
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_uuid
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_key
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_key
(
    in_key uuid = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_key_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_key_game_id
(
    in_key uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_key_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_key_profile_id_game_id
(
    in_key uuid = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_leaderboard_get_key_profile_id_game_id_times
(
    varchar
    , varchar
    , uuid
    , varchar
    , uuid
    , INTEGER
    , INTEGER
    , uuid
    , boolean
    , INTEGER
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , decimal
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_leaderboard_get_key_profile_id_game_id_times
(
    in_key uuid = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
)
RETURNS setof "game_statistic_leaderboard"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "key"
        , "stat_value_formatted"
        , "profile_id"
        , "rank"
        , "rank_change"
        , "game_id"
        , "active"
        , "rank_total_count"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "timestamp"
        , "date_created"
        , "type"
    FROM "game_statistic_leaderboard"
    WHERE 1=1
    AND "key" = in_key
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_queue_count
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_live_queue"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_queue_count_uuid
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_live_queue"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_queue_count_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_count_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_live_queue"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_queue_browse_filter
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_live_queue_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "data_stat"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "game_id"'
    || ', "profile_id"'
    || ', "type"'
    || ', "data_ad"'
    || ' FROM "game_live_queue" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "data_stat" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "game_id" '
    || ', "profile_id" '
    || ', "type" '
    || ', "data_ad" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_queue_set_uuid
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_data_stat varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_data_ad varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_live_queue"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_live_queue" 
                    SET
                        "status" = in_status
                        , "data_stat" = in_data_stat
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "game_id" = in_game_id
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                        , "data_ad" = in_data_ad
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_live_queue"
                    (
                        "status"
                        , "data_stat"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "game_id"
                        , "profile_id"
                        , "type"
                        , "data_ad"
                    )
                    VALUES
                    (
                        in_status
                        , in_data_stat
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_game_id
                        , in_profile_id
                        , in_type
                        , in_data_ad
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_queue_set_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_set_profile_id_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_data_stat varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_data_ad varchar = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_live_queue"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_live_queue" 
                    SET
                        "status" = in_status
                        , "data_stat" = in_data_stat
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "game_id" = in_game_id
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                        , "data_ad" = in_data_ad
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_live_queue"
                    (
                        "status"
                        , "data_stat"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "game_id"
                        , "profile_id"
                        , "type"
                        , "data_ad"
                    )
                    VALUES
                    (
                        in_status
                        , in_data_stat
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_game_id
                        , in_profile_id
                        , in_type
                        , in_data_ad
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_queue_del_uuid
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_live_queue"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_live_queue_del_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_del_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_live_queue"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_queue_get
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_get
(
)                        
RETURNS setof "game_live_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "data_stat"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "profile_id"
        , "type"
        , "data_ad"
    FROM "game_live_queue"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_queue_get_uuid
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_live_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "data_stat"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "profile_id"
        , "type"
        , "data_ad"
    FROM "game_live_queue"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_queue_get_game_id
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_live_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "data_stat"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "profile_id"
        , "type"
        , "data_ad"
    FROM "game_live_queue"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_queue_get_profile_id_game_id
(
    varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_queue_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_live_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "data_stat"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "profile_id"
        , "type"
        , "data_ad"
    FROM "game_live_queue"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_recent_queue_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_live_recent_queue"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_recent_queue_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_live_recent_queue"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_recent_queue_count_profile_id_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_count_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_live_recent_queue"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_recent_queue_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_live_recent_queue_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "username"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "data"'
    || ', "profile_id"'
    || ', "uuid"'
    || ', "game"'
    || ', "game_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "game_live_recent_queue" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "username" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "data" '
    || ', "profile_id" '
    || ', "uuid" '
    || ', "game" '
    || ', "game_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_recent_queue_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_profile_id uuid = NULL
    , in_uuid uuid = NULL
    , in_game varchar (500) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_live_recent_queue"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_live_recent_queue" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "profile_id" = in_profile_id
                        , "uuid" = in_uuid
                        , "game" = in_game
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_live_recent_queue"
                    (
                        "status"
                        , "username"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "profile_id"
                        , "uuid"
                        , "game"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_profile_id
                        , in_uuid
                        , in_game
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_recent_queue_set_profile_id_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_set_profile_id_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_profile_id uuid = NULL
    , in_uuid uuid = NULL
    , in_game varchar (500) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_live_recent_queue"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_live_recent_queue" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "profile_id" = in_profile_id
                        , "uuid" = in_uuid
                        , "game" = in_game
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_live_recent_queue"
                    (
                        "status"
                        , "username"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "profile_id"
                        , "uuid"
                        , "game"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_profile_id
                        , in_uuid
                        , in_game
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_recent_queue_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_live_recent_queue"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_live_recent_queue_del_profile_id_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_del_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_live_recent_queue"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_live_recent_queue_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_get
(
)                        
RETURNS setof "game_live_recent_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "profile_id"
        , "uuid"
        , "game"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_live_recent_queue"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_recent_queue_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_live_recent_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "profile_id"
        , "uuid"
        , "game"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_live_recent_queue"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_recent_queue_get_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_live_recent_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "profile_id"
        , "uuid"
        , "game"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_live_recent_queue"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_live_recent_queue_get_profile_id_game_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_live_recent_queue_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_live_recent_queue"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "profile_id"
        , "uuid"
        , "game"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "game_live_recent_queue"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_count
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_count_uuid
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_count_key
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count_key
(
    in_key varchar (50) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_count_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_count_key_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_count_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_count_key_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count_key_profile_id_game_id
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_count_key_profile_id_game_id_timesta
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_count_key_profile_id_game_id_timesta
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_browse_filter
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_profile_statistic_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "username"'
    || ', "timestamp"'
    || ', "profile_id"'
    || ', "key"'
    || ', "active"'
    || ', "game_id"'
    || ', "data"'
    || ', "stat_value"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "level"'
    || ', "date_created"'
    || ', "type"'
    || ' FROM "game_profile_statistic" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "username" '
    || ', "timestamp" '
    || ', "profile_id" '
    || ', "key" '
    || ', "active" '
    || ', "game_id" '
    || ', "data" '
    || ', "stat_value" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "level" '
    || ', "date_created" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_set_uuid
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_set_uuid_profile_id_game_id_timestam
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_set_uuid_profile_id_game_id_timestam
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_set_profile_id_key
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_set_profile_id_key
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND lower("key") = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND lower("key") = lower(in_key)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_set_profile_id_key_timestamp
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_set_profile_id_key_timestamp
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND lower("key") = lower(in_key)
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND lower("key") = lower(in_key)
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_set_key_profile_id_game_id_timestamp
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_set_key_profile_id_game_id_timestamp
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_set_profile_id_game_id_key
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_set_profile_id_game_id_key
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_data varchar = NULL
    , in_stat_value decimal = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND lower("key") = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "data" = in_data
                        , "stat_value" = in_stat_value
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND lower("key") = lower(in_key)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "data"
                        , "stat_value"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_data
                        , in_stat_value
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_del_uuid
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_statistic"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_statistic_del_key_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_del_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_statistic"
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_statistic_del_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_del_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_statistic"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_statistic_del_key_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_del_key_profile_id_game_id
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_statistic"
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_uuid
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_key
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_key
(
    in_key varchar (50) = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_key_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_profile_id_game_id_timestamp
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_profile_id_game_id_timestamp
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_key_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_key_profile_id_game_id
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_get_key_profile_id_game_id_timestamp
(
    varchar
    , varchar
    , decimal
    , uuid
    , varchar
    , boolean
    , uuid
    , varchar
    , decimal
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_get_key_profile_id_game_id_timestamp
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
)
RETURNS setof "game_profile_statistic"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "data"
        , "stat_value"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_statistic"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_meta_count
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_meta"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_count_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_meta"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_count_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_count_code
(
    in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_count_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_count_name
(
    in_name varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_count_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_count_key
(
    in_key varchar (50) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_count_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_meta"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_count_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_count_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_meta_browse_filter
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_statistic_meta_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "sort"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "data"'
    || ', "uuid"'
    || ', "store_count"'
    || ', "key"'
    || ', "game_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "order"'
    || ', "description"'
    || ' FROM "game_statistic_meta" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "sort" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "data" '
    || ', "uuid" '
    || ', "store_count" '
    || ', "key" '
    || ', "game_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "order" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_meta_set_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_store_count INTEGER = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_order varchar (40) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_meta"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_meta" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "store_count" = in_store_count
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_meta"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "uuid"
                        , "store_count"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_uuid
                        , in_store_count
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_set_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_set_key_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_store_count INTEGER = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_order varchar (40) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_statistic_meta"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_statistic_meta" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "store_count" = in_store_count
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_statistic_meta"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "uuid"
                        , "store_count"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_uuid
                        , in_store_count
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_meta_del_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_statistic_meta"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_statistic_meta_del_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_del_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_statistic_meta"
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_statistic_meta_get_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_statistic_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_statistic_meta"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_get_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "game_statistic_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_get_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "game_statistic_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_get_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_get_key
(
    in_key varchar (50) = NULL
)
RETURNS setof "game_statistic_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_get_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_statistic_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_statistic_meta"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_statistic_meta_get_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_statistic_meta_get_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_statistic_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_statistic_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_count
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic_timestamp"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_count_uuid
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic_timestamp"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_count_key_profile_id_game_
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_count_key_profile_id_game_
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp TIMESTAMP = now()
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_statistic_timestamp"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_browse_filter
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_profile_statistic_timestamp_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "timestamp"'
    || ', "uuid"'
    || ', "key"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "game_id"'
    || ', "profile_id"'
    || ', "type"'
    || ' FROM "game_profile_statistic_timestamp" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "timestamp" '
    || ', "uuid" '
    || ', "key" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "game_id" '
    || ', "profile_id" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_set_uuid
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_timestamp TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_key varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic_timestamp"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic_timestamp" 
                    SET
                        "status" = in_status
                        , "timestamp" = in_timestamp
                        , "uuid" = in_uuid
                        , "key" = in_key
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "game_id" = in_game_id
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic_timestamp"
                    (
                        "status"
                        , "timestamp"
                        , "uuid"
                        , "key"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "game_id"
                        , "profile_id"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_timestamp
                        , in_uuid
                        , in_key
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_game_id
                        , in_profile_id
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_set_key_profile_id_game_id
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_set_key_profile_id_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_timestamp TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_key varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_statistic_timestamp"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_statistic_timestamp" 
                    SET
                        "status" = in_status
                        , "timestamp" = in_timestamp
                        , "uuid" = in_uuid
                        , "key" = in_key
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "game_id" = in_game_id
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_statistic_timestamp"
                    (
                        "status"
                        , "timestamp"
                        , "uuid"
                        , "key"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "game_id"
                        , "profile_id"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_timestamp
                        , in_uuid
                        , in_key
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_game_id
                        , in_profile_id
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_del_uuid
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_statistic_timestamp"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_del_key_profile_id_game_id
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_del_key_profile_id_game_id
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp TIMESTAMP = now()
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_statistic_timestamp"
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_get_uuid
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_profile_statistic_timestamp"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "timestamp"
        , "uuid"
        , "key"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "profile_id"
        , "type"
    FROM "game_profile_statistic_timestamp"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_statistic_timestamp_get_key_profile_id_game_id
(
    varchar
    , TIMESTAMP
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_statistic_timestamp_get_key_profile_id_game_id
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp TIMESTAMP = now()
)
RETURNS setof "game_profile_statistic_timestamp"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "timestamp"
        , "uuid"
        , "key"
        , "date_modified"
        , "active"
        , "date_created"
        , "game_id"
        , "profile_id"
        , "type"
    FROM "game_profile_statistic_timestamp"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_key_meta_count
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_key_meta"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_count_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_key_meta"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_count_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_count_code
(
    in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_count_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_count_name
(
    in_name varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_count_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_count_key
(
    in_key varchar (50) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_count_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_key_meta"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_count_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_count_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_key_meta_browse_filter
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_key_meta_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "sort"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "data"'
    || ', "level"'
    || ', "uuid"'
    || ', "key_level"'
    || ', "store_count"'
    || ', "key"'
    || ', "game_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "order"'
    || ', "key_stat"'
    || ', "description"'
    || ' FROM "game_key_meta" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "sort" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "data" '
    || ', "level" '
    || ', "uuid" '
    || ', "key_level" '
    || ', "store_count" '
    || ', "key" '
    || ', "game_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "order" '
    || ', "key_stat" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_key_meta_set_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_level varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_key_level varchar (50) = NULL
    , in_store_count INTEGER = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_order varchar (40) = NULL
    , in_key_stat varchar (50) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_key_meta"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_key_meta" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "level" = in_level
                        , "uuid" = in_uuid
                        , "key_level" = in_key_level
                        , "store_count" = in_store_count
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                        , "key_stat" = in_key_stat
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_key_meta"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "level"
                        , "uuid"
                        , "key_level"
                        , "store_count"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
                        , "key_stat"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_level
                        , in_uuid
                        , in_key_level
                        , in_store_count
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
                        , in_key_stat
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_set_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_set_key_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_level varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_key_level varchar (50) = NULL
    , in_store_count INTEGER = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_order varchar (40) = NULL
    , in_key_stat varchar (50) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_key_meta"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_key_meta" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "level" = in_level
                        , "uuid" = in_uuid
                        , "key_level" = in_key_level
                        , "store_count" = in_store_count
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                        , "key_stat" = in_key_stat
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_key_meta"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "level"
                        , "uuid"
                        , "key_level"
                        , "store_count"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
                        , "key_stat"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_level
                        , in_uuid
                        , in_key_level
                        , in_store_count
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
                        , in_key_stat
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_set_key_game_id_level
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_set_key_game_id_level
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_level varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_key_level varchar (50) = NULL
    , in_store_count INTEGER = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_order varchar (40) = NULL
    , in_key_stat varchar (50) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_key_meta"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    AND lower("level") = lower(in_level)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_key_meta" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "level" = in_level
                        , "uuid" = in_uuid
                        , "key_level" = in_key_level
                        , "store_count" = in_store_count
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                        , "key_stat" = in_key_stat
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    AND lower("level") = lower(in_level)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_key_meta"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "level"
                        , "uuid"
                        , "key_level"
                        , "store_count"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
                        , "key_stat"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_level
                        , in_uuid
                        , in_key_level
                        , in_store_count
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
                        , in_key_stat
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_key_meta_del_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_key_meta"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_key_meta_del_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_del_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_key_meta"
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_key_meta_get_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_key_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "key_level"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "key_stat"
        , "description"
    FROM "game_key_meta"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_get_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "game_key_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "key_level"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "key_stat"
        , "description"
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_get_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "game_key_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "key_level"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "key_stat"
        , "description"
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_get_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_get_key
(
    in_key varchar (50) = NULL
)
RETURNS setof "game_key_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "key_level"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "key_stat"
        , "description"
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_get_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_key_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "key_level"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "key_stat"
        , "description"
    FROM "game_key_meta"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_get_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_get_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_key_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "key_level"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "key_stat"
        , "description"
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_key_meta_get_code_level
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , varchar
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_key_meta_get_code_level
(
    in_code varchar (255) = NULL
    , in_level varchar (500) = NULL
)
RETURNS setof "game_key_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "key_level"
        , "store_count"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "key_stat"
        , "description"
    FROM "game_key_meta"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    AND lower("level") = lower(in_level)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLevel - game_level

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_level_count
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_level"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_count_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_level"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_count_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_count_code
(
    in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_level"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_count_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_count_name
(
    in_name varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_level"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_count_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_count_key
(
    in_key varchar (50) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_level"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_count_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_level"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_count_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_count_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_level"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLevel - game_level

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_level_browse_filter
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_level_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "sort"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "data"'
    || ', "uuid"'
    || ', "key"'
    || ', "game_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "order"'
    || ', "description"'
    || ' FROM "game_level" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "sort" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "data" '
    || ', "uuid" '
    || ', "key" '
    || ', "game_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "order" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameLevel - game_level

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_level_set_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_order varchar (40) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_level"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_level" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_level"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "uuid"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_uuid
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_set_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_set_key_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_order varchar (40) = NULL
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_level"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_level" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_level"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "uuid"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_uuid
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameLevel - game_level

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_level_del_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_level"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_level_del_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_del_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_level"
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLevel - game_level

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_level_get_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_level"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_level"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_get_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "game_level"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_level"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_get_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "game_level"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_level"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_get_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_get_key
(
    in_key varchar (50) = NULL
)
RETURNS setof "game_level"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_level"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_get_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_level"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_level"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_level_get_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_level_get_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_level"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "game_level"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_achievement_count
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_achievement"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_count_uuid
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_achievement"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_count_profile_id_key
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_count_profile_id_key
(
    in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_achievement"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_count_username
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_count_username
(
    in_username varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_count_key_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_count_key_profile_id_game_id
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_count_key_profile_id_game_id_times
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_count_key_profile_id_game_id_times
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_achievement_browse_filter
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_profile_achievement_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "username"'
    || ', "timestamp"'
    || ', "completed"'
    || ', "profile_id"'
    || ', "key"'
    || ', "active"'
    || ', "game_id"'
    || ', "achievement_value"'
    || ', "data"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "level"'
    || ', "date_created"'
    || ', "type"'
    || ' FROM "game_profile_achievement" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "username" '
    || ', "timestamp" '
    || ', "completed" '
    || ', "profile_id" '
    || ', "key" '
    || ', "active" '
    || ', "game_id" '
    || ', "achievement_value" '
    || ', "data" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "level" '
    || ', "date_created" '
    || ', "type" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_achievement_set_uuid
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_completed boolean = true
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_achievement_value decimal = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_achievement"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_achievement" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "completed" = in_completed
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "achievement_value" = in_achievement_value
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_achievement"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "completed"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "achievement_value"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_completed
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_achievement_value
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_set_uuid_key
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_set_uuid_key
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_completed boolean = true
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_achievement_value decimal = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_achievement"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND lower("key") = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_achievement" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "completed" = in_completed
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "achievement_value" = in_achievement_value
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    AND lower("key") = lower(in_key)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_achievement"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "completed"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "achievement_value"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_completed
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_achievement_value
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_set_profile_id_key
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_set_profile_id_key
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_completed boolean = true
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_achievement_value decimal = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_achievement"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND lower("key") = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_achievement" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "completed" = in_completed
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "achievement_value" = in_achievement_value
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND lower("key") = lower(in_key)
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_achievement"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "completed"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "achievement_value"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_completed
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_achievement_value
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_set_key_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_set_key_profile_id_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_completed boolean = true
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_achievement_value decimal = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_achievement"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_achievement" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "completed" = in_completed
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "achievement_value" = in_achievement_value
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_achievement"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "completed"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "achievement_value"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_completed
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_achievement_value
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_set_key_profile_id_game_id_timesta
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_set_key_profile_id_game_id_timesta
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_username varchar (500) = NULL
    , in_timestamp decimal = NULL
    , in_completed boolean = true
    , in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
    , in_active boolean = NULL
    , in_game_id uuid = NULL
    , in_achievement_value decimal = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_level varchar (500) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_profile_achievement"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_profile_achievement" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "timestamp" = in_timestamp
                        , "completed" = in_completed
                        , "profile_id" = in_profile_id
                        , "key" = in_key
                        , "active" = in_active
                        , "game_id" = in_game_id
                        , "achievement_value" = in_achievement_value
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "level" = in_level
                        , "date_created" = in_date_created
                        , "type" = in_type
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "profile_id" = in_profile_id
                    AND "game_id" = in_game_id
                    AND "timestamp" = in_timestamp
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_profile_achievement"
                    (
                        "status"
                        , "username"
                        , "timestamp"
                        , "completed"
                        , "profile_id"
                        , "key"
                        , "active"
                        , "game_id"
                        , "achievement_value"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "level"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_timestamp
                        , in_completed
                        , in_profile_id
                        , in_key
                        , in_active
                        , in_game_id
                        , in_achievement_value
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_date_created
                        , in_type
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_achievement_del_uuid
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_achievement"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_achievement_del_profile_id_key
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_del_profile_id_key
(
    in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_achievement"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_profile_achievement_del_uuid_key
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_del_uuid_key
(
    in_uuid uuid = NULL
    , in_key varchar (50) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_profile_achievement"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_uuid
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_profile_id_key
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_profile_id_key
(
    in_profile_id uuid = NULL
    , in_key varchar (50) = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_username
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_username
(
    in_username varchar (500) = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_key
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_key
(
    in_key varchar (50) = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_game_id
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_key_game_id
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_profile_id_game_id
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_profile_id_game_id_timestamp
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_profile_id_game_id_timestamp
(
    in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_key_profile_id_game_id
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_key_profile_id_game_id
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_profile_achievement_get_key_profile_id_game_id_timesta
(
    varchar
    , varchar
    , decimal
    , boolean
    , uuid
    , varchar
    , boolean
    , uuid
    , decimal
    , varchar
    , uuid
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_profile_achievement_get_key_profile_id_game_id_timesta
(
    in_key varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_game_id uuid = NULL
    , in_timestamp decimal = NULL
)
RETURNS setof "game_profile_achievement"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "timestamp"
        , "completed"
        , "profile_id"
        , "key"
        , "active"
        , "game_id"
        , "achievement_value"
        , "data"
        , "uuid"
        , "date_modified"
        , "level"
        , "date_created"
        , "type"
    FROM "game_profile_achievement"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_achievement_meta_count
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_achievement_meta"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_count_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_count_uuid
(
    in_uuid uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_achievement_meta"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_count_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_count_code
(
    in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_count_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_count_name
(
    in_name varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_count_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_count_key
(
    in_key varchar (50) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_count_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_count_game_id
(
    in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_achievement_meta"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_count_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_count_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_achievement_meta_browse_filter
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_achievement_meta_result"
AS $$
DECLARE
    _sql VARCHAR(4000);
BEGIN

    IF (in_page = 0) THEN
        in_page := 1;
    END IF;
    IF (in_page_size = 0) THEN
        in_page_size := 10;
    END IF;
    
    _sql := 'SELECT count(*) over () as total_rows'
    || ', "status"'
    || ', "sort"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "game_stat"'
    || ', "date_modified"'
    || ', "data"'
    || ', "level"'
    || ', "uuid"'
    || ', "points"'
    || ', "key"'
    || ', "game_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "leaderboard"'
    || ', "description"'
    || ' FROM "game_achievement_meta" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "sort" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "game_stat" '
    || ', "date_modified" '
    || ', "data" '
    || ', "level" '
    || ', "uuid" '
    || ', "points" '
    || ', "key" '
    || ', "game_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "leaderboard" '
    || ', "description" '
    ;
    
    _sql := _sql 
    || ' ORDER BY '
    || in_sort
    || ' LIMIT '
    || in_page_size
    || ' OFFSET '
    || (in_page_size * in_page) - in_page_size;
    
    RAISE INFO '%', _sql;
    RETURN QUERY EXECUTE _sql;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_achievement_meta_set_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_game_stat boolean = true
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_level varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_points INTEGER = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_leaderboard boolean = true
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_achievement_meta"  
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_achievement_meta" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "game_stat" = in_game_stat
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "level" = in_level
                        , "uuid" = in_uuid
                        , "points" = in_points
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "leaderboard" = in_leaderboard
                        , "description" = in_description
                    WHERE 1=1
                    AND "uuid" = in_uuid
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_achievement_meta"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "game_stat"
                        , "date_modified"
                        , "data"
                        , "level"
                        , "uuid"
                        , "points"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "leaderboard"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_game_stat
                        , in_date_modified
                        , in_data
                        , in_level
                        , in_uuid
                        , in_points
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_leaderboard
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_set_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_set_key_game_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_game_stat boolean = true
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_level varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_points INTEGER = NULL
    , in_key varchar (50) = NULL
    , in_game_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (40) = NULL
    , in_leaderboard boolean = true
    , in_description varchar (255) = NULL
    , OUT out_id int                        
)
RETURNS int
AS $$
DECLARE
    _countItems int;
    _id int;
BEGIN
    BEGIN
        _countItems := 0;
        _id := 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                in_set_type := 'full';
            END IF;
        END;

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO _countItems
                    FROM  "game_achievement_meta"  
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "game_achievement_meta" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "game_stat" = in_game_stat
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "level" = in_level
                        , "uuid" = in_uuid
                        , "points" = in_points
                        , "key" = in_key
                        , "game_id" = in_game_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "leaderboard" = in_leaderboard
                        , "description" = in_description
                    WHERE 1=1
                    AND lower("key") = lower(in_key)
                    AND "game_id" = in_game_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "game_achievement_meta"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "game_stat"
                        , "date_modified"
                        , "data"
                        , "level"
                        , "uuid"
                        , "points"
                        , "key"
                        , "game_id"
                        , "active"
                        , "date_created"
                        , "type"
                        , "leaderboard"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_code
                        , in_display_name
                        , in_name
                        , in_game_stat
                        , in_date_modified
                        , in_data
                        , in_level
                        , in_uuid
                        , in_points
                        , in_key
                        , in_game_id
                        , in_active
                        , in_date_created
                        , in_type
                        , in_leaderboard
                        , in_description
                    )
                    ;
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_achievement_meta_del_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_achievement_meta"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_game_achievement_meta_del_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_del_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "game_achievement_meta"
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_game_achievement_meta_get_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "game_achievement_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "game_stat"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "points"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "leaderboard"
        , "description"
    FROM "game_achievement_meta"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_get_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "game_achievement_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "game_stat"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "points"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "leaderboard"
        , "description"
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_get_name
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "game_achievement_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "game_stat"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "points"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "leaderboard"
        , "description"
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_get_key
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_get_key
(
    in_key varchar (50) = NULL
)
RETURNS setof "game_achievement_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "game_stat"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "points"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "leaderboard"
        , "description"
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_get_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_get_game_id
(
    in_game_id uuid = NULL
)
RETURNS setof "game_achievement_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "game_stat"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "points"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "leaderboard"
        , "description"
    FROM "game_achievement_meta"
    WHERE 1=1
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_game_achievement_meta_get_key_game_id
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , INTEGER
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_achievement_meta_get_key_game_id
(
    in_key varchar (50) = NULL
    , in_game_id uuid = NULL
)
RETURNS setof "game_achievement_meta"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "code"
        , "display_name"
        , "name"
        , "game_stat"
        , "date_modified"
        , "data"
        , "level"
        , "uuid"
        , "points"
        , "key"
        , "game_id"
        , "active"
        , "date_created"
        , "type"
        , "leaderboard"
        , "description"
    FROM "game_achievement_meta"
    WHERE 1=1
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;


