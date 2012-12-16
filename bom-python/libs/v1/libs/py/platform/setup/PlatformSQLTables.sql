-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------
-- TABLES

/*
        
DROP TABLE IF EXISTS "app" CASCADE;
    
        
DROP TABLE IF EXISTS "app_type" CASCADE;
    
        
DROP TABLE IF EXISTS "site" CASCADE;
    
        
DROP TABLE IF EXISTS "site_type" CASCADE;
    
        
DROP TABLE IF EXISTS "org" CASCADE;
    
        
DROP TABLE IF EXISTS "org_type" CASCADE;
    
        
DROP TABLE IF EXISTS "content_item" CASCADE;
    
        
DROP TABLE IF EXISTS "content_item_type" CASCADE;
    
        
DROP TABLE IF EXISTS "content_page" CASCADE;
    
        
DROP TABLE IF EXISTS "message" CASCADE;
    
        
DROP TABLE IF EXISTS "game" CASCADE;
    
        
DROP TABLE IF EXISTS "game_category" CASCADE;
    
        
DROP TABLE IF EXISTS "game_category_tree" CASCADE;
    
        
DROP TABLE IF EXISTS "game_category_assoc" CASCADE;
    
        
DROP TABLE IF EXISTS "game_type" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_game" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_game_network" CASCADE;
    
        
DROP TABLE IF EXISTS "game_session" CASCADE;
    
        
DROP TABLE IF EXISTS "game_session_data" CASCADE;
    
        
DROP TABLE IF EXISTS "game_app" CASCADE;
    
        
DROP TABLE IF EXISTS "offer" CASCADE;
    
        
DROP TABLE IF EXISTS "offer_type" CASCADE;
    
        
DROP TABLE IF EXISTS "offer_location" CASCADE;
    
        
DROP TABLE IF EXISTS "offer_category" CASCADE;
    
        
DROP TABLE IF EXISTS "offer_category_tree" CASCADE;
    
        
DROP TABLE IF EXISTS "offer_category_assoc" CASCADE;
    
        
DROP TABLE IF EXISTS "offer_game_location" CASCADE;
    
        
DROP TABLE IF EXISTS "event_info" CASCADE;
    
        
DROP TABLE IF EXISTS "event_location" CASCADE;
    
        
DROP TABLE IF EXISTS "event_category" CASCADE;
    
        
DROP TABLE IF EXISTS "event_category_tree" CASCADE;
    
        
DROP TABLE IF EXISTS "event_category_assoc" CASCADE;
    
        
DROP TABLE IF EXISTS "channel" CASCADE;
    
        
DROP TABLE IF EXISTS "channel_type" CASCADE;
    
        
DROP TABLE IF EXISTS "question" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_offer" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_app" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_org" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_game_location" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_question" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_channel" CASCADE;
    
        
DROP TABLE IF EXISTS "org_site" CASCADE;
    
        
DROP TABLE IF EXISTS "site_app" CASCADE;
    
        
DROP TABLE IF EXISTS "photo" CASCADE;
    
        
DROP TABLE IF EXISTS "video" CASCADE;
    
*/

        
CREATE TABLE "app" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_app_date_modified DEFAULT GETDATE()
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "platform" varchar (255)
    , "active" boolean
                --CONSTRAINT DF_app_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_app_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "app_type" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_app_type_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_app_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_app_type_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "app_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "site" 
(
    "status" varchar (50)
    , "domain" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_site_date_modified DEFAULT GETDATE()
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_site_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_site_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "site" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "site_type" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_site_type_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_site_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_site_type_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "site_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "org" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_org_date_modified DEFAULT GETDATE()
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_org_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_org_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "org" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "org_type" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_org_type_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_org_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_org_type_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "org_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "content_item" 
(
    "status" varchar (50)
    , "type_id" uuid
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_content_item_date_modified DEFAULT GETDATE()
    , "date_end" TIMESTAMP
                --CONSTRAINT DF_content_item_date_end DEFAULT GETDATE()
    , "date_start" TIMESTAMP
                --CONSTRAINT DF_content_item_date_start DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "path" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_content_item_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_content_item_date_created DEFAULT GETDATE()
    , "data" varchar
    , "description" varchar (255)
);

ALTER TABLE "content_item" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "content_item_type" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_content_item_type_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_content_item_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_content_item_type_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "content_item_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "content_page" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_content_page_date_modified DEFAULT GETDATE()
    , "date_end" TIMESTAMP
                --CONSTRAINT DF_content_page_date_end DEFAULT GETDATE()
    , "date_start" TIMESTAMP
                --CONSTRAINT DF_content_page_date_start DEFAULT GETDATE()
    , "site_id" uuid
    , "uuid" uuid NOT NULL
    , "template" varchar
    , "path" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_content_page_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_content_page_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "content_page" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "message" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_message_date_modified DEFAULT GETDATE()
    , "read" boolean
                --CONSTRAINT DF_message_read_bool DEFAULT 1
    , "profile_from_id" uuid
    , "profile_to_token" varchar (500)
    , "app_id" uuid
    , "profile_to_id" uuid
    , "active" boolean
                --CONSTRAINT DF_message_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_message_date_created DEFAULT GETDATE()
    , "profile_to_name" varchar (500)
    , "subject" varchar (500)
    , "sent" boolean
                --CONSTRAINT DF_message_sent_bool DEFAULT 1
    , "profile_from_name" varchar (500)
);

ALTER TABLE "message" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game" 
(
    "status" varchar (50)
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
    , "description" varchar (255)
);

ALTER TABLE "game" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_category" 
(
    "status" varchar (50)
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
    , "description" varchar (255)
);

ALTER TABLE "game_category" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_category_tree" 
(
    "status" varchar (50)
    , "parent_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_category_tree_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_category_tree_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_category_tree_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
);

ALTER TABLE "game_category_tree" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_category_assoc" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_category_assoc_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_category_assoc_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_category_assoc_date_created DEFAULT GETDATE()
    , "game_id" uuid NOT NULL
    , "category_id" uuid NOT NULL
);

ALTER TABLE "game_category_assoc" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_type" 
(
    "status" varchar (50)
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
    "status" varchar (50)
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_game_date_modified DEFAULT GETDATE()
    , "profile_id" uuid
    , "game_profile" varchar
    , "game_id" uuid
    , "active" boolean
                --CONSTRAINT DF_profile_game_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_game_date_created DEFAULT GETDATE()
);

ALTER TABLE "profile_game" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_game_network" 
(
    "status" varchar (50)
    , "hash" varchar (500)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_game_network_date_modified DEFAULT GETDATE()
    , "game_id" uuid
    , "profile_id" uuid
    , "secret" varchar (500)
    , "game_network_id" uuid
    , "token" varchar (500)
    , "network_username" varchar (500)
    , "active" boolean
                --CONSTRAINT DF_profile_game_network_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_game_network_date_created DEFAULT GETDATE()
);

ALTER TABLE "profile_game_network" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_session" 
(
    "status" varchar (50)
    , "game_state" varchar
    , "code" varchar (255)
    , "network_uuid" varchar (40)
    , "description" varchar (255)
    , "network_external_ip" varchar (40)
    , "game_level" varchar (255)
    , "network_external_port" INTEGER
    , "game_id" uuid
    , "profile_id" uuid
    , "profile_username" varchar (500)
    , "game_area" varchar (255)
    , "active" boolean
                --CONSTRAINT DF_game_session_active_bool DEFAULT 1
    , "game_players_allowed" INTEGER
    , "profile_network" varchar (255)
    , "game_player_z" decimal
    , "game_player_x" decimal
    , "uuid" uuid NOT NULL
    , "network_port" INTEGER
    , "game_code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_session_date_modified DEFAULT GETDATE()
    , "game_players_connected" INTEGER
    , "game_type" varchar (255)
    , "profile_device" varchar (50)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_session_date_created DEFAULT GETDATE()
    , "network_ip" varchar (40)
    , "network_use_nat" boolean
                --CONSTRAINT DF_game_session_network_use_nat_bool DEFAULT 1
    , "hash" varchar (255)
);

ALTER TABLE "game_session" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_session_data" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_session_data_date_modified DEFAULT GETDATE()
    , "data_results" varchar
    , "uuid" uuid NOT NULL
    , "data_layer_projectile" varchar
    , "data_layer_actors" varchar
    , "active" boolean
                --CONSTRAINT DF_game_session_data_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_session_data_date_created DEFAULT GETDATE()
    , "data_layer_enemy" varchar
    , "data" varchar
    , "description" varchar (255)
);

ALTER TABLE "game_session_data" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "game_app" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_game_app_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_game_app_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_game_app_date_created DEFAULT GETDATE()
    , "game_id" uuid NOT NULL
    , "app_id" uuid NOT NULL
);

ALTER TABLE "game_app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "usage_count" INTEGER
    , "active" boolean
                --CONSTRAINT DF_offer_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "offer" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_type" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_type_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_offer_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_type_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "offer_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_location" 
(
    "status" varchar (50)
    , "fax" varchar (30)
    , "code" varchar (255)
    , "description" varchar (255)
    , "address1" varchar (1000)
    , "twitter" varchar (50)
    , "phone" varchar (30)
    , "postal_code" varchar (30)
    , "country_code" varchar (255)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_location_date_created DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_offer_location_active_bool DEFAULT 1
    , "uuid" uuid NOT NULL
    , "state_province" varchar (255)
    , "city" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_location_date_modified DEFAULT GETDATE()
    , "dob" TIMESTAMP
                --CONSTRAINT DF_offer_location_dob DEFAULT GETDATE()
    , "date_start" TIMESTAMP
                --CONSTRAINT DF_offer_location_date_start DEFAULT GETDATE()
    , "longitude" double precision
    , "email" varchar (255)
    , "date_end" TIMESTAMP
                --CONSTRAINT DF_offer_location_date_end DEFAULT GETDATE()
    , "latitude" double precision
    , "facebook" varchar (255)
    , "offer_id" uuid
    , "address2" varchar (500)
);

ALTER TABLE "offer_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_category" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_category_date_modified DEFAULT GETDATE()
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_offer_category_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_category_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "offer_category" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_category_tree" 
(
    "status" varchar (50)
    , "parent_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_category_tree_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_offer_category_tree_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_category_tree_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
);

ALTER TABLE "offer_category_tree" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_category_assoc" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_category_assoc_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_offer_category_assoc_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_category_assoc_date_created DEFAULT GETDATE()
    , "offer_id" uuid NOT NULL
    , "category_id" uuid NOT NULL
);

ALTER TABLE "offer_category_assoc" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_game_location" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_game_location_date_modified DEFAULT GETDATE()
    , "offer_id" uuid
    , "type_id" uuid
    , "game_location_id" uuid
    , "active" boolean
                --CONSTRAINT DF_offer_game_location_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_game_location_date_created DEFAULT GETDATE()
);

ALTER TABLE "offer_game_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_info" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_info_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "usage_count" INTEGER
    , "active" boolean
                --CONSTRAINT DF_event_info_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_info_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "event_info" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_location" 
(
    "status" varchar (50)
    , "fax" varchar (30)
    , "code" varchar (255)
    , "description" varchar (255)
    , "address1" varchar (1000)
    , "twitter" varchar (50)
    , "phone" varchar (30)
    , "postal_code" varchar (30)
    , "country_code" varchar (255)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_location_date_created DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_event_location_active_bool DEFAULT 1
    , "uuid" uuid NOT NULL
    , "state_province" varchar (255)
    , "city" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_location_date_modified DEFAULT GETDATE()
    , "dob" TIMESTAMP
                --CONSTRAINT DF_event_location_dob DEFAULT GETDATE()
    , "date_start" TIMESTAMP
                --CONSTRAINT DF_event_location_date_start DEFAULT GETDATE()
    , "longitude" double precision
    , "email" varchar (255)
    , "event_id" uuid
    , "date_end" TIMESTAMP
                --CONSTRAINT DF_event_location_date_end DEFAULT GETDATE()
    , "latitude" double precision
    , "facebook" varchar (255)
    , "address2" varchar (500)
);

ALTER TABLE "event_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_category" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_category_date_modified DEFAULT GETDATE()
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_event_category_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_category_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "event_category" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_category_tree" 
(
    "status" varchar (50)
    , "parent_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_category_tree_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_event_category_tree_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_category_tree_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
);

ALTER TABLE "event_category_tree" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_category_assoc" 
(
    "status" varchar (50)
    , "event_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_category_assoc_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_event_category_assoc_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_category_assoc_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
);

ALTER TABLE "event_category_assoc" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "channel" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_channel_date_modified DEFAULT GETDATE()
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_channel_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_channel_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "channel" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "channel_type" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_channel_type_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_channel_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_channel_type_date_created DEFAULT GETDATE()
    , "type" varchar (50) NOT NULL
    , "description" varchar (255)
);

ALTER TABLE "channel_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "question" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_question_date_modified DEFAULT GETDATE()
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "choices" varchar
    , "channel_id" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_question_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_question_date_created DEFAULT GETDATE()
    , "type" varchar (50) NOT NULL
    , "description" varchar (255)
);

ALTER TABLE "question" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_offer" 
(
    "status" varchar (50)
    , "profile_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_offer_date_modified DEFAULT GETDATE()
    , "url" varchar (50)
    , "offer_id" uuid NOT NULL
    , "redeem_code" varchar (128) NOT NULL
    , "redeemed" varchar (50) NOT NULL
    , "active" boolean
                --CONSTRAINT DF_profile_offer_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_offer_date_created DEFAULT GETDATE()
);

ALTER TABLE "profile_offer" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_app" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_app_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_profile_app_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_app_date_created DEFAULT GETDATE()
    , "profile_id" uuid
    , "app_id" uuid
);

ALTER TABLE "profile_app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_org" 
(
    "status" varchar (50)
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_org_date_modified DEFAULT GETDATE()
    , "profile_id" uuid
    , "org_id" uuid
    , "active" boolean
                --CONSTRAINT DF_profile_org_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_org_date_created DEFAULT GETDATE()
);

ALTER TABLE "profile_org" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_game_location" 
(
    "status" varchar (50)
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_game_location_date_modified DEFAULT GETDATE()
    , "profile_id" uuid
    , "game_location_id" uuid
    , "active" boolean
                --CONSTRAINT DF_profile_game_location_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_game_location_date_created DEFAULT GETDATE()
);

ALTER TABLE "profile_game_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_question" 
(
    "status" varchar (50)
    , "answer" varchar (1000) NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_question_date_modified DEFAULT GETDATE()
    , "profile_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "channel_id" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_profile_question_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_question_date_created DEFAULT GETDATE()
    , "data" varchar NOT NULL
    , "question_id" uuid NOT NULL
);

ALTER TABLE "profile_question" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_channel" 
(
    "status" varchar (50)
    , "channel_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_channel_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_profile_channel_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_channel_date_created DEFAULT GETDATE()
    , "profile_id" uuid NOT NULL
);

ALTER TABLE "profile_channel" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "org_site" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_org_site_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_org_site_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_org_site_date_created DEFAULT GETDATE()
    , "site_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
);

ALTER TABLE "org_site" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "site_app" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_site_app_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_site_app_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_site_app_date_created DEFAULT GETDATE()
    , "site_id" uuid NOT NULL
    , "app_id" uuid NOT NULL
);

ALTER TABLE "site_app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "photo" 
(
    "status" varchar (50)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_photo_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "uuid" uuid NOT NULL
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "active" boolean
                --CONSTRAINT DF_photo_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_photo_date_created DEFAULT GETDATE()
    , "external_id" uuid
    , "description" varchar (255)
);

ALTER TABLE "photo" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "video" 
(
    "status" varchar (50)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_video_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "uuid" uuid NOT NULL
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "active" boolean
                --CONSTRAINT DF_video_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_video_date_created DEFAULT GETDATE()
    , "external_id" uuid
    , "description" varchar (255)
);

ALTER TABLE "video" ADD PRIMARY KEY ("uuid");
    


-- result / return types
/*
        
DROP type IF EXISTS "app_result" CASCADE;
    
        
DROP type IF EXISTS "app_type_result" CASCADE;
    
        
DROP type IF EXISTS "site_result" CASCADE;
    
        
DROP type IF EXISTS "site_type_result" CASCADE;
    
        
DROP type IF EXISTS "org_result" CASCADE;
    
        
DROP type IF EXISTS "org_type_result" CASCADE;
    
        
DROP type IF EXISTS "content_item_result" CASCADE;
    
        
DROP type IF EXISTS "content_item_type_result" CASCADE;
    
        
DROP type IF EXISTS "content_page_result" CASCADE;
    
        
DROP type IF EXISTS "message_result" CASCADE;
    
        
DROP type IF EXISTS "game_result" CASCADE;
    
        
DROP type IF EXISTS "game_category_result" CASCADE;
    
        
DROP type IF EXISTS "game_category_tree_result" CASCADE;
    
        
DROP type IF EXISTS "game_category_assoc_result" CASCADE;
    
        
DROP type IF EXISTS "game_type_result" CASCADE;
    
        
DROP type IF EXISTS "profile_game_result" CASCADE;
    
        
DROP type IF EXISTS "profile_game_network_result" CASCADE;
    
        
DROP type IF EXISTS "game_session_result" CASCADE;
    
        
DROP type IF EXISTS "game_session_data_result" CASCADE;
    
        
DROP type IF EXISTS "game_app_result" CASCADE;
    
        
DROP type IF EXISTS "offer_result" CASCADE;
    
        
DROP type IF EXISTS "offer_type_result" CASCADE;
    
        
DROP type IF EXISTS "offer_location_result" CASCADE;
    
        
DROP type IF EXISTS "offer_category_result" CASCADE;
    
        
DROP type IF EXISTS "offer_category_tree_result" CASCADE;
    
        
DROP type IF EXISTS "offer_category_assoc_result" CASCADE;
    
        
DROP type IF EXISTS "offer_game_location_result" CASCADE;
    
        
DROP type IF EXISTS "event_info_result" CASCADE;
    
        
DROP type IF EXISTS "event_location_result" CASCADE;
    
        
DROP type IF EXISTS "event_category_result" CASCADE;
    
        
DROP type IF EXISTS "event_category_tree_result" CASCADE;
    
        
DROP type IF EXISTS "event_category_assoc_result" CASCADE;
    
        
DROP type IF EXISTS "channel_result" CASCADE;
    
        
DROP type IF EXISTS "channel_type_result" CASCADE;
    
        
DROP type IF EXISTS "question_result" CASCADE;
    
        
DROP type IF EXISTS "profile_offer_result" CASCADE;
    
        
DROP type IF EXISTS "profile_app_result" CASCADE;
    
        
DROP type IF EXISTS "profile_org_result" CASCADE;
    
        
DROP type IF EXISTS "profile_game_location_result" CASCADE;
    
        
DROP type IF EXISTS "profile_question_result" CASCADE;
    
        
DROP type IF EXISTS "profile_channel_result" CASCADE;
    
        
DROP type IF EXISTS "org_site_result" CASCADE;
    
        
DROP type IF EXISTS "site_app_result" CASCADE;
    
        
DROP type IF EXISTS "photo_result" CASCADE;
    
        
DROP type IF EXISTS "video_result" CASCADE;
    
*/

CREATE TYPE "app_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "type_id" uuid
    , "uuid" uuid
    , "platform" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "description" varchar
);    
CREATE TYPE "app_type_result" as
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
    , "description" varchar
);    
CREATE TYPE "site_result" as
(
    total_rows bigint
    , "status" varchar
    , "domain" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "type_id" uuid
    , "uuid" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "description" varchar
);    
CREATE TYPE "site_type_result" as
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
    , "description" varchar
);    
CREATE TYPE "org_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "type_id" uuid
    , "uuid" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "description" varchar
);    
CREATE TYPE "org_type_result" as
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
    , "description" varchar
);    
CREATE TYPE "content_item_result" as
(
    total_rows bigint
    , "status" varchar
    , "type_id" uuid
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "date_end" TIMESTAMP
    , "date_start" TIMESTAMP
    , "uuid" uuid
    , "path" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "data" varchar
    , "description" varchar
);    
CREATE TYPE "content_item_type_result" as
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
    , "description" varchar
);    
CREATE TYPE "content_page_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "date_end" TIMESTAMP
    , "date_start" TIMESTAMP
    , "site_id" uuid
    , "uuid" uuid
    , "template" varchar
    , "path" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "description" varchar
);    
CREATE TYPE "message_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "read" boolean
    , "profile_from_id" uuid
    , "profile_to_token" varchar
    , "app_id" uuid
    , "profile_to_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "profile_to_name" varchar
    , "subject" varchar
    , "sent" boolean
    , "profile_from_name" varchar
);    
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
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_id" uuid
    , "game_profile" varchar
    , "game_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
);    
CREATE TYPE "profile_game_network_result" as
(
    total_rows bigint
    , "status" varchar
    , "hash" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "game_id" uuid
    , "profile_id" uuid
    , "secret" varchar
    , "game_network_id" uuid
    , "token" varchar
    , "network_username" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
);    
CREATE TYPE "game_session_result" as
(
    total_rows bigint
    , "status" varchar
    , "game_state" varchar
    , "code" varchar
    , "network_uuid" varchar
    , "description" varchar
    , "network_external_ip" varchar
    , "game_level" varchar
    , "network_external_port" INTEGER
    , "game_id" uuid
    , "profile_id" uuid
    , "profile_username" varchar
    , "game_area" varchar
    , "active" boolean
    , "game_players_allowed" INTEGER
    , "profile_network" varchar
    , "game_player_z" decimal
    , "game_player_x" decimal
    , "uuid" uuid
    , "network_port" INTEGER
    , "game_code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "game_players_connected" INTEGER
    , "game_type" varchar
    , "profile_device" varchar
    , "date_created" TIMESTAMP
    , "network_ip" varchar
    , "network_use_nat" boolean
    , "hash" varchar
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
    , "uuid" uuid
    , "data_layer_projectile" varchar
    , "data_layer_actors" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "data_layer_enemy" varchar
    , "data" varchar
    , "description" varchar
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
    , "app_id" uuid
);    
CREATE TYPE "offer_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "type_id" uuid
    , "org_id" uuid
    , "uuid" uuid
    , "usage_count" INTEGER
    , "active" boolean
    , "date_created" TIMESTAMP
    , "description" varchar
);    
CREATE TYPE "offer_type_result" as
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
    , "description" varchar
);    
CREATE TYPE "offer_location_result" as
(
    total_rows bigint
    , "status" varchar
    , "fax" varchar
    , "code" varchar
    , "description" varchar
    , "address1" varchar
    , "twitter" varchar
    , "phone" varchar
    , "postal_code" varchar
    , "country_code" varchar
    , "date_created" TIMESTAMP
    , "active" boolean
    , "uuid" uuid
    , "state_province" varchar
    , "city" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "dob" TIMESTAMP
    , "date_start" TIMESTAMP
    , "longitude" double precision
    , "email" varchar
    , "date_end" TIMESTAMP
    , "latitude" double precision
    , "facebook" varchar
    , "offer_id" uuid
    , "address2" varchar
);    
CREATE TYPE "offer_category_result" as
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
    , "description" varchar
);    
CREATE TYPE "offer_category_tree_result" as
(
    total_rows bigint
    , "status" varchar
    , "parent_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "category_id" uuid
);    
CREATE TYPE "offer_category_assoc_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "offer_id" uuid
    , "category_id" uuid
);    
CREATE TYPE "offer_game_location_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "offer_id" uuid
    , "type_id" uuid
    , "game_location_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
);    
CREATE TYPE "event_info_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "org_id" uuid
    , "uuid" uuid
    , "usage_count" INTEGER
    , "active" boolean
    , "date_created" TIMESTAMP
    , "description" varchar
);    
CREATE TYPE "event_location_result" as
(
    total_rows bigint
    , "status" varchar
    , "fax" varchar
    , "code" varchar
    , "description" varchar
    , "address1" varchar
    , "twitter" varchar
    , "phone" varchar
    , "postal_code" varchar
    , "country_code" varchar
    , "date_created" TIMESTAMP
    , "active" boolean
    , "uuid" uuid
    , "state_province" varchar
    , "city" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "dob" TIMESTAMP
    , "date_start" TIMESTAMP
    , "longitude" double precision
    , "email" varchar
    , "event_id" uuid
    , "date_end" TIMESTAMP
    , "latitude" double precision
    , "facebook" varchar
    , "address2" varchar
);    
CREATE TYPE "event_category_result" as
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
    , "description" varchar
);    
CREATE TYPE "event_category_tree_result" as
(
    total_rows bigint
    , "status" varchar
    , "parent_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "category_id" uuid
);    
CREATE TYPE "event_category_assoc_result" as
(
    total_rows bigint
    , "status" varchar
    , "event_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "category_id" uuid
);    
CREATE TYPE "channel_result" as
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
    , "description" varchar
);    
CREATE TYPE "channel_type_result" as
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
CREATE TYPE "question_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "org_id" uuid
    , "uuid" uuid
    , "choices" varchar
    , "channel_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "profile_offer_result" as
(
    total_rows bigint
    , "status" varchar
    , "profile_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "url" varchar
    , "offer_id" uuid
    , "redeem_code" varchar
    , "redeemed" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
);    
CREATE TYPE "profile_app_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "profile_id" uuid
    , "app_id" uuid
);    
CREATE TYPE "profile_org_result" as
(
    total_rows bigint
    , "status" varchar
    , "type_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_id" uuid
    , "org_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
);    
CREATE TYPE "profile_game_location_result" as
(
    total_rows bigint
    , "status" varchar
    , "type_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_id" uuid
    , "game_location_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
);    
CREATE TYPE "profile_question_result" as
(
    total_rows bigint
    , "status" varchar
    , "answer" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_id" uuid
    , "org_id" uuid
    , "channel_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "data" varchar
    , "question_id" uuid
);    
CREATE TYPE "profile_channel_result" as
(
    total_rows bigint
    , "status" varchar
    , "channel_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "profile_id" uuid
);    
CREATE TYPE "org_site_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "site_id" uuid
    , "org_id" uuid
);    
CREATE TYPE "site_app_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "site_id" uuid
    , "app_id" uuid
);    
CREATE TYPE "photo_result" as
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
    , "active" boolean
    , "date_created" TIMESTAMP
    , "external_id" uuid
    , "description" varchar
);    
CREATE TYPE "video_result" as
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
    , "active" boolean
    , "date_created" TIMESTAMP
    , "external_id" uuid
    , "description" varchar
);    
