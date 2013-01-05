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
    
        
DROP TABLE IF EXISTS "profile_question" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_channel" CASCADE;
    
        
DROP TABLE IF EXISTS "org_site" CASCADE;
    
        
DROP TABLE IF EXISTS "site_app" CASCADE;
    
        
DROP TABLE IF EXISTS "photo" CASCADE;
    
        
DROP TABLE IF EXISTS "video" CASCADE;
    
*/

        
CREATE TABLE "app" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "app_type" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "app_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "site" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "site" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "site_type" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "site_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "org" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "org" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "org_type" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "org_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "content_item" 
(
    "status" varchar (255)
    , "type_id" uuid
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_content_item_date_modified DEFAULT GETDATE()
    , "data" varchar
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "content_item" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "content_item_type" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "content_item_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "content_page" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_content_page_date_modified DEFAULT GETDATE()
    , "data" varchar
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "content_page" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "message" 
(
    "status" varchar (255)
    , "profile_from_name" varchar (500)
    , "read" boolean
                --CONSTRAINT DF_message_read_bool DEFAULT 1
    , "profile_from_id" uuid
    , "profile_to_token" varchar (500)
    , "app_id" uuid
    , "active" boolean
                --CONSTRAINT DF_message_active_bool DEFAULT 1
    , "data" varchar
    , "subject" varchar (500)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_message_date_modified DEFAULT GETDATE()
    , "profile_to_id" uuid
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_message_date_created DEFAULT GETDATE()
    , "profile_to_name" varchar (500)
    , "type" varchar (500)
    , "sent" boolean
                --CONSTRAINT DF_message_sent_bool DEFAULT 1
);

ALTER TABLE "message" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "data" varchar
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "usage_count" INTEGER
    , "active" boolean
                --CONSTRAINT DF_offer_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "offer" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_type" 
(
    "status" varchar (255)
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
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "offer_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_location" 
(
    "status" varchar (255)
    , "fax" varchar (30)
    , "code" varchar (255)
    , "description" varchar (255)
    , "address1" varchar (1000)
    , "twitter" varchar (50)
    , "phone" varchar (30)
    , "postal_code" varchar (30)
    , "offer_id" uuid
    , "country_code" varchar (255)
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_location_date_created DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_offer_location_active_bool DEFAULT 1
    , "data" varchar
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
    , "type" varchar (500)
    , "address2" varchar (500)
);

ALTER TABLE "offer_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_category" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_category_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_offer_category_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_category_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "offer_category" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_category_tree" 
(
    "status" varchar (255)
    , "parent_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_category_tree_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_offer_category_tree_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_category_tree_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
    , "type" varchar (500)
);

ALTER TABLE "offer_category_tree" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_category_assoc" 
(
    "status" varchar (255)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_category_assoc_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_offer_category_assoc_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_category_assoc_date_created DEFAULT GETDATE()
    , "offer_id" uuid NOT NULL
    , "category_id" uuid NOT NULL
    , "type" varchar (500)
);

ALTER TABLE "offer_category_assoc" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "offer_game_location" 
(
    "status" varchar (255)
    , "game_location_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_offer_game_location_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_offer_game_location_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_offer_game_location_date_created DEFAULT GETDATE()
    , "offer_id" uuid
    , "type_id" uuid
    , "type" varchar (500)
    , "data" varchar
);

ALTER TABLE "offer_game_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_info" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_info_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "data" varchar
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "usage_count" INTEGER
    , "active" boolean
                --CONSTRAINT DF_event_info_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_info_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "event_info" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_location" 
(
    "status" varchar (255)
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
    , "data" varchar
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
    , "type" varchar (500)
    , "address2" varchar (500)
);

ALTER TABLE "event_location" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_category" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_category_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_event_category_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_category_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "event_category" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_category_tree" 
(
    "status" varchar (255)
    , "parent_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_category_tree_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_event_category_tree_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_category_tree_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
    , "type" varchar (500)
);

ALTER TABLE "event_category_tree" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "event_category_assoc" 
(
    "status" varchar (255)
    , "event_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_event_category_assoc_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_event_category_assoc_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_event_category_assoc_date_created DEFAULT GETDATE()
    , "category_id" uuid NOT NULL
    , "type" varchar (500)
);

ALTER TABLE "event_category_assoc" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "channel" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_channel_date_modified DEFAULT GETDATE()
    , "data" varchar
    , "type_id" uuid NOT NULL
    , "org_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_channel_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_channel_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "channel" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "channel_type" 
(
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_channel_type_date_modified DEFAULT GETDATE()
    , "data" varchar
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
    "status" varchar (255)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_question_date_modified DEFAULT GETDATE()
    , "data" varchar
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
    "status" varchar (255)
    , "redeem_code" varchar (128) NOT NULL
    , "offer_id" uuid NOT NULL
    , "profile_id" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_profile_offer_active_bool DEFAULT 1
    , "data" varchar
    , "uuid" uuid NOT NULL
    , "redeemed" varchar (50) NOT NULL
    , "url" varchar (50)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_offer_date_modified DEFAULT GETDATE()
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_offer_date_created DEFAULT GETDATE()
    , "type" varchar (500)
);

ALTER TABLE "profile_offer" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_app" 
(
    "status" varchar (255)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_app_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_profile_app_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_app_date_created DEFAULT GETDATE()
    , "profile_id" uuid
    , "type" varchar (500)
    , "app_id" uuid
    , "data" varchar
);

ALTER TABLE "profile_app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_org" 
(
    "status" varchar (255)
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_org_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_profile_org_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_org_date_created DEFAULT GETDATE()
    , "profile_id" uuid
    , "type" varchar (500)
    , "org_id" uuid
    , "data" varchar
);

ALTER TABLE "profile_org" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_question" 
(
    "status" varchar (255)
    , "profile_id" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_profile_question_active_bool DEFAULT 1
    , "data" varchar
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_question_date_modified DEFAULT GETDATE()
    , "org_id" uuid NOT NULL
    , "channel_id" uuid NOT NULL
    , "answer" varchar (1000) NOT NULL
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_question_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "question_id" uuid NOT NULL
);

ALTER TABLE "profile_question" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_channel" 
(
    "status" varchar (255)
    , "channel_id" uuid NOT NULL
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_channel_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_profile_channel_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_channel_date_created DEFAULT GETDATE()
    , "profile_id" uuid NOT NULL
    , "type" varchar (500)
);

ALTER TABLE "profile_channel" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "org_site" 
(
    "status" varchar (255)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_org_site_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_org_site_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_org_site_date_created DEFAULT GETDATE()
    , "site_id" uuid NOT NULL
    , "type" varchar (500)
    , "org_id" uuid NOT NULL
);

ALTER TABLE "org_site" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "site_app" 
(
    "status" varchar (255)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_site_app_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_site_app_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_site_app_date_created DEFAULT GETDATE()
    , "site_id" uuid NOT NULL
    , "type" varchar (500)
    , "app_id" uuid NOT NULL
);

ALTER TABLE "site_app" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "photo" 
(
    "status" varchar (255)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_photo_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "uuid" uuid NOT NULL
    , "data" varchar
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "external_id" uuid
    , "active" boolean
                --CONSTRAINT DF_photo_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_photo_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "photo" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "video" 
(
    "status" varchar (255)
    , "third_party_oembed" varchar (500)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_video_date_modified DEFAULT GETDATE()
    , "url" varchar (500)
    , "third_party_data" varchar (500)
    , "uuid" uuid NOT NULL
    , "data" varchar
    , "third_party_url" varchar (500)
    , "third_party_id" varchar (500)
    , "content_type" varchar (100)
    , "external_id" uuid
    , "active" boolean
                --CONSTRAINT DF_video_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_video_date_created DEFAULT GETDATE()
    , "type" varchar (500)
    , "description" varchar (255)
);

ALTER TABLE "video" ADD PRIMARY KEY ("uuid");
    


-- result / return types

        
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
    
        
DROP type IF EXISTS "profile_question_result" CASCADE;
    
        
DROP type IF EXISTS "profile_channel_result" CASCADE;
    
        
DROP type IF EXISTS "org_site_result" CASCADE;
    
        
DROP type IF EXISTS "site_app_result" CASCADE;
    
        
DROP type IF EXISTS "photo_result" CASCADE;
    
        
DROP type IF EXISTS "video_result" CASCADE;
    

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
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
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
    , "data" varchar
    , "date_end" TIMESTAMP
    , "date_start" TIMESTAMP
    , "uuid" uuid
    , "path" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "type" varchar
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
    , "data" varchar
    , "date_end" TIMESTAMP
    , "date_start" TIMESTAMP
    , "site_id" uuid
    , "uuid" uuid
    , "template" varchar
    , "path" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    
CREATE TYPE "message_result" as
(
    total_rows bigint
    , "status" varchar
    , "profile_from_name" varchar
    , "read" boolean
    , "profile_from_id" uuid
    , "profile_to_token" varchar
    , "app_id" uuid
    , "active" boolean
    , "data" varchar
    , "subject" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_to_id" uuid
    , "date_created" TIMESTAMP
    , "profile_to_name" varchar
    , "type" varchar
    , "sent" boolean
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
    , "data" varchar
    , "type_id" uuid
    , "org_id" uuid
    , "uuid" uuid
    , "usage_count" INTEGER
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "type" varchar
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
    , "offer_id" uuid
    , "country_code" varchar
    , "date_created" TIMESTAMP
    , "active" boolean
    , "data" varchar
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
    , "type" varchar
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
    , "data" varchar
    , "type_id" uuid
    , "org_id" uuid
    , "uuid" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
);    
CREATE TYPE "offer_game_location_result" as
(
    total_rows bigint
    , "status" varchar
    , "game_location_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "offer_id" uuid
    , "type_id" uuid
    , "type" varchar
    , "data" varchar
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
    , "data" varchar
    , "org_id" uuid
    , "uuid" uuid
    , "usage_count" INTEGER
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "data" varchar
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
    , "type" varchar
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
    , "data" varchar
    , "type_id" uuid
    , "org_id" uuid
    , "uuid" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
);    
CREATE TYPE "channel_result" as
(
    total_rows bigint
    , "status" varchar
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "data" varchar
    , "type_id" uuid
    , "org_id" uuid
    , "uuid" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "data" varchar
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
    , "data" varchar
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
    , "redeem_code" varchar
    , "offer_id" uuid
    , "profile_id" uuid
    , "active" boolean
    , "data" varchar
    , "uuid" uuid
    , "redeemed" varchar
    , "url" varchar
    , "date_modified" TIMESTAMP
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "type" varchar
    , "app_id" uuid
    , "data" varchar
);    
CREATE TYPE "profile_org_result" as
(
    total_rows bigint
    , "status" varchar
    , "type_id" uuid
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
    , "profile_id" uuid
    , "type" varchar
    , "org_id" uuid
    , "data" varchar
);    
CREATE TYPE "profile_question_result" as
(
    total_rows bigint
    , "status" varchar
    , "profile_id" uuid
    , "active" boolean
    , "data" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "org_id" uuid
    , "channel_id" uuid
    , "answer" varchar
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
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
    , "type" varchar
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
    , "data" varchar
    , "third_party_url" varchar
    , "third_party_id" varchar
    , "content_type" varchar
    , "external_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
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
    , "data" varchar
    , "third_party_url" varchar
    , "third_party_id" varchar
    , "content_type" varchar
    , "external_id" uuid
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" varchar
    , "description" varchar
);    

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
-- INDEX CREATES

                
DROP INDEX IF EXISTS "IX_content_page_path";
                
CREATE INDEX IX_content_page_path ON content_page 
(
                    
    "path" ASC
);
                
DROP INDEX IF EXISTS "IX_content_page_path_site_id";
                
CREATE INDEX IX_content_page_path_site_id ON content_page 
(
                    
    "path" ASC
                    
    , "site_id" ASC
);
        
-- INDEX CREATES

        
        
        
-- INDEX CREATES

        
        
        
        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
        
        
        
        
        
        
        
-- INDEX CREATES

        
-- INDEX CREATES

        
        
        
        
        
        

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: App - app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_count_uuid
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
    FROM "app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_count_code
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
    FROM "app"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_count_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_count_type_id
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
    FROM "app"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_count_code_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_count_code_type_id
(
    in_code varchar (255) = NULL
    , in_type_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "app"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_count_platform_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_count_platform_type_id
(
    in_platform varchar (255) = NULL
    , in_type_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "app"
    WHERE 1=1
    AND lower("platform") = lower(in_platform)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_count_platform
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_count_platform
(
    in_platform varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "app"
    WHERE 1=1
    AND lower("platform") = lower(in_platform)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: App - app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "app_result"
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
    || ', "uuid"'
    || ', "platform"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "app" WHERE 1=1 ';
    
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
    || ', "uuid" '
    || ', "platform" '
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
-- MODEL: App - app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
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
                    FROM  "app"  
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
                    UPDATE "app" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "type_id" = in_type_id
                        , "uuid" = in_uuid
                        , "platform" = in_platform
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
                    INSERT INTO "app"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "type_id"
                        , "uuid"
                        , "platform"
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
                        , in_uuid
                        , in_platform
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

DROP FUNCTION IF EXISTS usp_app_set_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
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
                    FROM  "app"  
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
                    UPDATE "app" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "type_id" = in_type_id
                        , "uuid" = in_uuid
                        , "platform" = in_platform
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
                    INSERT INTO "app"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "type_id"
                        , "uuid"
                        , "platform"
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
                        , in_uuid
                        , in_platform
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
-- MODEL: App - app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "app"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_app_del_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "app"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: App - app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_get
(
)                        
RETURNS setof "app"
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
        , "uuid"
        , "platform"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "app"
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
        , "uuid"
        , "platform"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "app"
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
        , "uuid"
        , "platform"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "app"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_get_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_get_type_id
(
    in_type_id uuid = NULL
)
RETURNS setof "app"
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
        , "uuid"
        , "platform"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "app"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_get_code_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_get_code_type_id
(
    in_code varchar (255) = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "app"
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
        , "uuid"
        , "platform"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "app"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_get_platform_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_get_platform_type_id
(
    in_platform varchar (255) = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "app"
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
        , "uuid"
        , "platform"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "app"
    WHERE 1=1
    AND lower("platform") = lower(in_platform)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_get_platform
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_app_get_platform
(
    in_platform varchar (255) = NULL
)
RETURNS setof "app"
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
        , "uuid"
        , "platform"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "app"
    WHERE 1=1
    AND lower("platform") = lower(in_platform)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: AppType - app_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_type_count
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

CREATE OR REPLACE FUNCTION usp_app_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "app_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_type_count_uuid
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

CREATE OR REPLACE FUNCTION usp_app_type_count_uuid
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
    FROM "app_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_type_count_code
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

CREATE OR REPLACE FUNCTION usp_app_type_count_code
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
    FROM "app_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: AppType - app_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_type_browse_filter
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

CREATE OR REPLACE FUNCTION usp_app_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "app_type_result"
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
    || ' FROM "app_type" WHERE 1=1 ';
    
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
-- MODEL: AppType - app_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_type_set_uuid
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

CREATE OR REPLACE FUNCTION usp_app_type_set_uuid
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
                    FROM  "app_type"  
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
                    UPDATE "app_type" 
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
                    INSERT INTO "app_type"
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

DROP FUNCTION IF EXISTS usp_app_type_set_code
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

CREATE OR REPLACE FUNCTION usp_app_type_set_code
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
                    FROM  "app_type"  
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
                    UPDATE "app_type" 
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
                    INSERT INTO "app_type"
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
-- MODEL: AppType - app_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_type_del_uuid
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

CREATE OR REPLACE FUNCTION usp_app_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "app_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_app_type_del_code
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

CREATE OR REPLACE FUNCTION usp_app_type_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "app_type"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: AppType - app_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_app_type_get
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

CREATE OR REPLACE FUNCTION usp_app_type_get
(
)                        
RETURNS setof "app_type"
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
    FROM "app_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_type_get_uuid
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

CREATE OR REPLACE FUNCTION usp_app_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "app_type"
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
    FROM "app_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_app_type_get_code
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

CREATE OR REPLACE FUNCTION usp_app_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "app_type"
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
    FROM "app_type"
    WHERE 1=1
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
-- MODEL: Site - site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_count_uuid
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
    FROM "site"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_count_code
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
    FROM "site"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_count_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_count_type_id
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
    FROM "site"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_count_code_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_count_code_type_id
(
    in_code varchar (255) = NULL
    , in_type_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_count_domain_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_count_domain_type_id
(
    in_domain varchar (255) = NULL
    , in_type_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site"
    WHERE 1=1
    AND lower("domain") = lower(in_domain)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_count_domain
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_count_domain
(
    in_domain varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site"
    WHERE 1=1
    AND lower("domain") = lower(in_domain)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Site - site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "site_result"
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
    || ', "domain"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "type_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "site" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "domain" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "type_id" '
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
-- MODEL: Site - site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_domain varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
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
                    FROM  "site"  
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
                    UPDATE "site" 
                    SET
                        "status" = in_status
                        , "domain" = in_domain
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "type_id" = in_type_id
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
                    INSERT INTO "site"
                    (
                        "status"
                        , "domain"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "type_id"
                        , "uuid"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_domain
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_type_id
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

DROP FUNCTION IF EXISTS usp_site_set_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_domain varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
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
                    FROM  "site"  
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
                    UPDATE "site" 
                    SET
                        "status" = in_status
                        , "domain" = in_domain
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "type_id" = in_type_id
                        , "uuid" = in_uuid
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
                    INSERT INTO "site"
                    (
                        "status"
                        , "domain"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "type_id"
                        , "uuid"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_domain
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_type_id
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
-- MODEL: Site - site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "site"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_site_del_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "site"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Site - site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_get
(
)                        
RETURNS setof "site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "domain"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "site"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "domain"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "site"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "domain"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "site"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_get_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_get_type_id
(
    in_type_id uuid = NULL
)
RETURNS setof "site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "domain"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "site"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_get_code_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_get_code_type_id
(
    in_code varchar (255) = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "domain"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "site"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_get_domain_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_get_domain_type_id
(
    in_domain varchar (255) = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "domain"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "site"
    WHERE 1=1
    AND lower("domain") = lower(in_domain)
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_get_domain
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_site_get_domain
(
    in_domain varchar (255) = NULL
)
RETURNS setof "site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "domain"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "type_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "site"
    WHERE 1=1
    AND lower("domain") = lower(in_domain)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: SiteType - site_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_type_count
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

CREATE OR REPLACE FUNCTION usp_site_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_type_count_uuid
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

CREATE OR REPLACE FUNCTION usp_site_type_count_uuid
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
    FROM "site_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_type_count_code
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

CREATE OR REPLACE FUNCTION usp_site_type_count_code
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
    FROM "site_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: SiteType - site_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_type_browse_filter
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

CREATE OR REPLACE FUNCTION usp_site_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "site_type_result"
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
    || ' FROM "site_type" WHERE 1=1 ';
    
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
-- MODEL: SiteType - site_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_type_set_uuid
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

CREATE OR REPLACE FUNCTION usp_site_type_set_uuid
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
                    FROM  "site_type"  
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
                    UPDATE "site_type" 
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
                    INSERT INTO "site_type"
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

DROP FUNCTION IF EXISTS usp_site_type_set_code
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

CREATE OR REPLACE FUNCTION usp_site_type_set_code
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
                    FROM  "site_type"  
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
                    UPDATE "site_type" 
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
                    INSERT INTO "site_type"
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
-- MODEL: SiteType - site_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_type_del_uuid
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

CREATE OR REPLACE FUNCTION usp_site_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "site_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_site_type_del_code
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

CREATE OR REPLACE FUNCTION usp_site_type_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "site_type"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: SiteType - site_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_type_get
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

CREATE OR REPLACE FUNCTION usp_site_type_get
(
)                        
RETURNS setof "site_type"
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
    FROM "site_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_type_get_uuid
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

CREATE OR REPLACE FUNCTION usp_site_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "site_type"
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
    FROM "site_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_type_get_code
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

CREATE OR REPLACE FUNCTION usp_site_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "site_type"
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
    FROM "site_type"
    WHERE 1=1
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
-- MODEL: Org - org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "org"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_count_uuid
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
    FROM "org"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_count_code
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
    FROM "org"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_count_name
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
    FROM "org"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Org - org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "org_result"
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
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "org" WHERE 1=1 ';
    
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
-- MODEL: Org - org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
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
                    FROM  "org"  
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
                    UPDATE "org" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "type_id" = in_type_id
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
                    INSERT INTO "org"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "type_id"
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
-- MODEL: Org - org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "org"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Org - org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_get
(
)                        
RETURNS setof "org"
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
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "org"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "org"
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
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "org"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "org"
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
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "org"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_org_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "org"
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
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "org"
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
-- MODEL: OrgType - org_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_type_count
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

CREATE OR REPLACE FUNCTION usp_org_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "org_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_type_count_uuid
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

CREATE OR REPLACE FUNCTION usp_org_type_count_uuid
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
    FROM "org_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_type_count_code
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

CREATE OR REPLACE FUNCTION usp_org_type_count_code
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
    FROM "org_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OrgType - org_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_type_browse_filter
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

CREATE OR REPLACE FUNCTION usp_org_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "org_type_result"
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
    || ' FROM "org_type" WHERE 1=1 ';
    
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
-- MODEL: OrgType - org_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_type_set_uuid
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

CREATE OR REPLACE FUNCTION usp_org_type_set_uuid
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
                    FROM  "org_type"  
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
                    UPDATE "org_type" 
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
                    INSERT INTO "org_type"
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

DROP FUNCTION IF EXISTS usp_org_type_set_code
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

CREATE OR REPLACE FUNCTION usp_org_type_set_code
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
                    FROM  "org_type"  
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
                    UPDATE "org_type" 
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
                    INSERT INTO "org_type"
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
-- MODEL: OrgType - org_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_type_del_uuid
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

CREATE OR REPLACE FUNCTION usp_org_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "org_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_org_type_del_code
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

CREATE OR REPLACE FUNCTION usp_org_type_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "org_type"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OrgType - org_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_type_get
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

CREATE OR REPLACE FUNCTION usp_org_type_get
(
)                        
RETURNS setof "org_type"
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
    FROM "org_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_type_get_uuid
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

CREATE OR REPLACE FUNCTION usp_org_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "org_type"
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
    FROM "org_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_type_get_code
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

CREATE OR REPLACE FUNCTION usp_org_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "org_type"
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
    FROM "org_type"
    WHERE 1=1
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
-- MODEL: ContentItem - content_item

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_count
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "content_item"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_count_uuid
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_count_uuid
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
    FROM "content_item"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_count_code
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_count_code
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
    FROM "content_item"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_count_name
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_count_name
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
    FROM "content_item"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_count_path
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_count_path
(
    in_path varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "content_item"
    WHERE 1=1
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentItem - content_item

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_browse_filter
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "content_item_result"
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
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "data"'
    || ', "date_end"'
    || ', "date_start"'
    || ', "uuid"'
    || ', "path"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "content_item" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "type_id" '
    || ', "code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "data" '
    || ', "date_end" '
    || ', "date_start" '
    || ', "uuid" '
    || ', "path" '
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
-- MODEL: ContentItem - content_item

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_set_uuid
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_type_id uuid = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_date_end TIMESTAMP = now()
    , in_date_start TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_path varchar (500) = NULL
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
                    FROM  "content_item"  
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
                    UPDATE "content_item" 
                    SET
                        "status" = in_status
                        , "type_id" = in_type_id
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "date_end" = in_date_end
                        , "date_start" = in_date_start
                        , "uuid" = in_uuid
                        , "path" = in_path
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
                    INSERT INTO "content_item"
                    (
                        "status"
                        , "type_id"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "date_end"
                        , "date_start"
                        , "uuid"
                        , "path"
                        , "active"
                        , "date_created"
                        , "type"
                        , "description"
                    )
                    VALUES
                    (
                        in_status
                        , in_type_id
                        , in_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_data
                        , in_date_end
                        , in_date_start
                        , in_uuid
                        , in_path
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
-- MODEL: ContentItem - content_item

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_del_uuid
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "content_item"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_content_item_del_path
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_del_path
(
    in_path varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "content_item"
    WHERE 1=1                        
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentItem - content_item

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_get
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_get
(
)                        
RETURNS setof "content_item"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_item"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_get_uuid
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "content_item"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_item"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_get_code
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "content_item"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_item"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_get_name
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "content_item"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_item"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_get_path
(
    varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_item_get_path
(
    in_path varchar (500) = NULL
)
RETURNS setof "content_item"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_item"
    WHERE 1=1
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_type_count
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

CREATE OR REPLACE FUNCTION usp_content_item_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "content_item_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_type_count_uuid
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

CREATE OR REPLACE FUNCTION usp_content_item_type_count_uuid
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
    FROM "content_item_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_type_count_code
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

CREATE OR REPLACE FUNCTION usp_content_item_type_count_code
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
    FROM "content_item_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_type_browse_filter
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

CREATE OR REPLACE FUNCTION usp_content_item_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "content_item_type_result"
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
    || ' FROM "content_item_type" WHERE 1=1 ';
    
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
-- MODEL: ContentItemType - content_item_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_type_set_uuid
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

CREATE OR REPLACE FUNCTION usp_content_item_type_set_uuid
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
                    FROM  "content_item_type"  
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
                    UPDATE "content_item_type" 
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
                    INSERT INTO "content_item_type"
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

DROP FUNCTION IF EXISTS usp_content_item_type_set_code
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

CREATE OR REPLACE FUNCTION usp_content_item_type_set_code
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
                    FROM  "content_item_type"  
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
                    UPDATE "content_item_type" 
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
                    INSERT INTO "content_item_type"
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
-- MODEL: ContentItemType - content_item_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_type_del_uuid
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

CREATE OR REPLACE FUNCTION usp_content_item_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "content_item_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_content_item_type_del_code
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

CREATE OR REPLACE FUNCTION usp_content_item_type_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "content_item_type"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_item_type_get
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

CREATE OR REPLACE FUNCTION usp_content_item_type_get
(
)                        
RETURNS setof "content_item_type"
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
    FROM "content_item_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_type_get_uuid
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

CREATE OR REPLACE FUNCTION usp_content_item_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "content_item_type"
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
    FROM "content_item_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_item_type_get_code
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

CREATE OR REPLACE FUNCTION usp_content_item_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "content_item_type"
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
    FROM "content_item_type"
    WHERE 1=1
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
-- MODEL: ContentPage - content_page

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_page_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "content_page"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_count_uuid
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
    FROM "content_page"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_count_code
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
    FROM "content_page"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_count_name
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
    FROM "content_page"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_count_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_count_path
(
    in_path varchar (500) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "content_page"
    WHERE 1=1
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentPage - content_page

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_page_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "content_page_result"
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
    || ', "data"'
    || ', "date_end"'
    || ', "date_start"'
    || ', "site_id"'
    || ', "uuid"'
    || ', "template"'
    || ', "path"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "content_page" WHERE 1=1 ';
    
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
    || ', "data" '
    || ', "date_end" '
    || ', "date_start" '
    || ', "site_id" '
    || ', "uuid" '
    || ', "template" '
    || ', "path" '
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
-- MODEL: ContentPage - content_page

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_page_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_date_end TIMESTAMP = now()
    , in_date_start TIMESTAMP = now()
    , in_site_id uuid = NULL
    , in_uuid uuid = NULL
    , in_template varchar = NULL
    , in_path varchar (500) = NULL
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
                    FROM  "content_page"  
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
                    UPDATE "content_page" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "date_end" = in_date_end
                        , "date_start" = in_date_start
                        , "site_id" = in_site_id
                        , "uuid" = in_uuid
                        , "template" = in_template
                        , "path" = in_path
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
                    INSERT INTO "content_page"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "date_end"
                        , "date_start"
                        , "site_id"
                        , "uuid"
                        , "template"
                        , "path"
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
                        , in_data
                        , in_date_end
                        , in_date_start
                        , in_site_id
                        , in_uuid
                        , in_template
                        , in_path
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
-- MODEL: ContentPage - content_page

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_page_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "content_page"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_content_page_del_path_site_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_del_path_site_id
(
    in_path varchar (500) = NULL
    , in_site_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "content_page"
    WHERE 1=1                        
    AND lower("path") = lower(in_path)
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_content_page_del_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_del_path
(
    in_path varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "content_page"
    WHERE 1=1                        
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentPage - content_page

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_content_page_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_get
(
)                        
RETURNS setof "content_page"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_page"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "content_page"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_page"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "content_page"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_page"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "content_page"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_page"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_get_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_get_path
(
    in_path varchar (500) = NULL
)
RETURNS setof "content_page"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_page"
    WHERE 1=1
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_get_site_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_get_site_id
(
    in_site_id uuid = NULL
)
RETURNS setof "content_page"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_page"
    WHERE 1=1
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_content_page_get_site_id_path
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_get_site_id_path
(
    in_site_id uuid = NULL
    , in_path varchar (500) = NULL
)
RETURNS setof "content_page"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "content_page"
    WHERE 1=1
    AND "site_id" = in_site_id
    AND lower("path") = lower(in_path)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Message - message

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_message_count
(
    varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , uuid
    , boolean
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_message_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "message"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_message_count_uuid
(
    varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , uuid
    , boolean
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_message_count_uuid
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
    FROM "message"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Message - message

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_message_browse_filter
(
    varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , uuid
    , boolean
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_message_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "message_result"
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
    || ', "profile_from_name"'
    || ', "read"'
    || ', "profile_from_id"'
    || ', "profile_to_token"'
    || ', "app_id"'
    || ', "active"'
    || ', "data"'
    || ', "subject"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_to_id"'
    || ', "date_created"'
    || ', "profile_to_name"'
    || ', "type"'
    || ', "sent"'
    || ' FROM "message" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "profile_from_name" '
    || ', "read" '
    || ', "profile_from_id" '
    || ', "profile_to_token" '
    || ', "app_id" '
    || ', "active" '
    || ', "data" '
    || ', "subject" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "profile_to_id" '
    || ', "date_created" '
    || ', "profile_to_name" '
    || ', "type" '
    || ', "sent" '
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
-- MODEL: Message - message

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_message_set_uuid
(
    varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , uuid
    , boolean
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_message_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_profile_from_name varchar (500) = NULL
    , in_read boolean = true
    , in_profile_from_id uuid = NULL
    , in_profile_to_token varchar (500) = NULL
    , in_app_id uuid = NULL
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_subject varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_to_id uuid = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_to_name varchar (500) = NULL
    , in_type varchar (500) = NULL
    , in_sent boolean = true
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
                    FROM  "message"  
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
                    UPDATE "message" 
                    SET
                        "status" = in_status
                        , "profile_from_name" = in_profile_from_name
                        , "read" = in_read
                        , "profile_from_id" = in_profile_from_id
                        , "profile_to_token" = in_profile_to_token
                        , "app_id" = in_app_id
                        , "active" = in_active
                        , "data" = in_data
                        , "subject" = in_subject
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_to_id" = in_profile_to_id
                        , "date_created" = in_date_created
                        , "profile_to_name" = in_profile_to_name
                        , "type" = in_type
                        , "sent" = in_sent
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
                    INSERT INTO "message"
                    (
                        "status"
                        , "profile_from_name"
                        , "read"
                        , "profile_from_id"
                        , "profile_to_token"
                        , "app_id"
                        , "active"
                        , "data"
                        , "subject"
                        , "uuid"
                        , "date_modified"
                        , "profile_to_id"
                        , "date_created"
                        , "profile_to_name"
                        , "type"
                        , "sent"
                    )
                    VALUES
                    (
                        in_status
                        , in_profile_from_name
                        , in_read
                        , in_profile_from_id
                        , in_profile_to_token
                        , in_app_id
                        , in_active
                        , in_data
                        , in_subject
                        , in_uuid
                        , in_date_modified
                        , in_profile_to_id
                        , in_date_created
                        , in_profile_to_name
                        , in_type
                        , in_sent
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
-- MODEL: Message - message

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_message_del_uuid
(
    varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , uuid
    , boolean
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_message_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "message"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Message - message

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_message_get
(
    varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , uuid
    , boolean
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_message_get
(
)                        
RETURNS setof "message"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_from_name"
        , "read"
        , "profile_from_id"
        , "profile_to_token"
        , "app_id"
        , "active"
        , "data"
        , "subject"
        , "uuid"
        , "date_modified"
        , "profile_to_id"
        , "date_created"
        , "profile_to_name"
        , "type"
        , "sent"
    FROM "message"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_message_get_uuid
(
    varchar
    , varchar
    , boolean
    , uuid
    , varchar
    , uuid
    , boolean
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
);

CREATE OR REPLACE FUNCTION usp_message_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "message"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_from_name"
        , "read"
        , "profile_from_id"
        , "profile_to_token"
        , "app_id"
        , "active"
        , "data"
        , "subject"
        , "uuid"
        , "date_modified"
        , "profile_to_id"
        , "date_created"
        , "profile_to_name"
        , "type"
        , "sent"
    FROM "message"
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
-- MODEL: Offer - offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_count_uuid
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
    FROM "offer"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_count_code
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
    FROM "offer"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_count_name
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
    FROM "offer"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_count_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_count_org_id
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
    FROM "offer"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Offer - offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_result"
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
    || ', "data"'
    || ', "type_id"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "usage_count"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "offer" WHERE 1=1 ';
    
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
    || ', "data" '
    || ', "type_id" '
    || ', "org_id" '
    || ', "uuid" '
    || ', "usage_count" '
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
-- MODEL: Offer - offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_data varchar = NULL
    , in_type_id uuid = NULL
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_usage_count INTEGER = NULL
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
                    FROM  "offer"  
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
                    UPDATE "offer" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "data" = in_data
                        , "type_id" = in_type_id
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "usage_count" = in_usage_count
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
                    INSERT INTO "offer"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "data"
                        , "type_id"
                        , "org_id"
                        , "uuid"
                        , "usage_count"
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
                        , in_data
                        , in_type_id
                        , in_org_id
                        , in_uuid
                        , in_usage_count
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
-- MODEL: Offer - offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_offer_del_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_del_org_id
(
    in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer"
    WHERE 1=1                        
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Offer - offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_get
(
)                        
RETURNS setof "offer"
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
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "offer"
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
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "offer"
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
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "offer"
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
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_get_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "offer"
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
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferType - offer_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_type_count
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

CREATE OR REPLACE FUNCTION usp_offer_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_type_count_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_type_count_uuid
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
    FROM "offer_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_type_count_code
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

CREATE OR REPLACE FUNCTION usp_offer_type_count_code
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
    FROM "offer_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_type_count_name
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

CREATE OR REPLACE FUNCTION usp_offer_type_count_name
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
    FROM "offer_type"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferType - offer_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_type_browse_filter
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

CREATE OR REPLACE FUNCTION usp_offer_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_type_result"
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
    || ' FROM "offer_type" WHERE 1=1 ';
    
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
-- MODEL: OfferType - offer_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_type_set_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_type_set_uuid
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
                    FROM  "offer_type"  
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
                    UPDATE "offer_type" 
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
                    INSERT INTO "offer_type"
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
-- MODEL: OfferType - offer_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_type_del_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferType - offer_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_type_get
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

CREATE OR REPLACE FUNCTION usp_offer_type_get
(
)                        
RETURNS setof "offer_type"
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
    FROM "offer_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_type_get_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "offer_type"
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
    FROM "offer_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_type_get_code
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

CREATE OR REPLACE FUNCTION usp_offer_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "offer_type"
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
    FROM "offer_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_type_get_name
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

CREATE OR REPLACE FUNCTION usp_offer_type_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "offer_type"
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
    FROM "offer_type"
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
-- MODEL: OfferLocation - offer_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_location_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_count_uuid
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
    FROM "offer_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_count_offer_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_count_offer_id
(
    in_offer_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_location"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_count_city
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_count_city
(
    in_city varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_location"
    WHERE 1=1
    AND lower("city") = lower(in_city)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_count_country_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_count_country_code
(
    in_country_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_location"
    WHERE 1=1
    AND lower("country_code") = lower(in_country_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_count_postal_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_count_postal_code
(
    in_postal_code varchar (30) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_location"
    WHERE 1=1
    AND lower("postal_code") = lower(in_postal_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferLocation - offer_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_location_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_location_result"
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
    || ', "fax"'
    || ', "code"'
    || ', "description"'
    || ', "address1"'
    || ', "twitter"'
    || ', "phone"'
    || ', "postal_code"'
    || ', "offer_id"'
    || ', "country_code"'
    || ', "date_created"'
    || ', "active"'
    || ', "data"'
    || ', "uuid"'
    || ', "state_province"'
    || ', "city"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "dob"'
    || ', "date_start"'
    || ', "longitude"'
    || ', "email"'
    || ', "date_end"'
    || ', "latitude"'
    || ', "facebook"'
    || ', "type"'
    || ', "address2"'
    || ' FROM "offer_location" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "fax" '
    || ', "code" '
    || ', "description" '
    || ', "address1" '
    || ', "twitter" '
    || ', "phone" '
    || ', "postal_code" '
    || ', "offer_id" '
    || ', "country_code" '
    || ', "date_created" '
    || ', "active" '
    || ', "data" '
    || ', "uuid" '
    || ', "state_province" '
    || ', "city" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "dob" '
    || ', "date_start" '
    || ', "longitude" '
    || ', "email" '
    || ', "date_end" '
    || ', "latitude" '
    || ', "facebook" '
    || ', "type" '
    || ', "address2" '
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
-- MODEL: OfferLocation - offer_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_location_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_fax varchar (30) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_address1 varchar (1000) = NULL
    , in_twitter varchar (50) = NULL
    , in_phone varchar (30) = NULL
    , in_postal_code varchar (30) = NULL
    , in_offer_id uuid = NULL
    , in_country_code varchar (255) = NULL
    , in_date_created TIMESTAMP = now()
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_state_province varchar (255) = NULL
    , in_city varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_dob TIMESTAMP = now()
    , in_date_start TIMESTAMP = now()
    , in_longitude double precision = NULL
    , in_email varchar (255) = NULL
    , in_date_end TIMESTAMP = now()
    , in_latitude double precision = NULL
    , in_facebook varchar (255) = NULL
    , in_type varchar (500) = NULL
    , in_address2 varchar (500) = NULL
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
                    FROM  "offer_location"  
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
                    UPDATE "offer_location" 
                    SET
                        "status" = in_status
                        , "fax" = in_fax
                        , "code" = in_code
                        , "description" = in_description
                        , "address1" = in_address1
                        , "twitter" = in_twitter
                        , "phone" = in_phone
                        , "postal_code" = in_postal_code
                        , "offer_id" = in_offer_id
                        , "country_code" = in_country_code
                        , "date_created" = in_date_created
                        , "active" = in_active
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "state_province" = in_state_province
                        , "city" = in_city
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "dob" = in_dob
                        , "date_start" = in_date_start
                        , "longitude" = in_longitude
                        , "email" = in_email
                        , "date_end" = in_date_end
                        , "latitude" = in_latitude
                        , "facebook" = in_facebook
                        , "type" = in_type
                        , "address2" = in_address2
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
                    INSERT INTO "offer_location"
                    (
                        "status"
                        , "fax"
                        , "code"
                        , "description"
                        , "address1"
                        , "twitter"
                        , "phone"
                        , "postal_code"
                        , "offer_id"
                        , "country_code"
                        , "date_created"
                        , "active"
                        , "data"
                        , "uuid"
                        , "state_province"
                        , "city"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "dob"
                        , "date_start"
                        , "longitude"
                        , "email"
                        , "date_end"
                        , "latitude"
                        , "facebook"
                        , "type"
                        , "address2"
                    )
                    VALUES
                    (
                        in_status
                        , in_fax
                        , in_code
                        , in_description
                        , in_address1
                        , in_twitter
                        , in_phone
                        , in_postal_code
                        , in_offer_id
                        , in_country_code
                        , in_date_created
                        , in_active
                        , in_data
                        , in_uuid
                        , in_state_province
                        , in_city
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_dob
                        , in_date_start
                        , in_longitude
                        , in_email
                        , in_date_end
                        , in_latitude
                        , in_facebook
                        , in_type
                        , in_address2
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
-- MODEL: OfferLocation - offer_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_location_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_location"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferLocation - offer_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_location_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_get
(
)                        
RETURNS setof "offer_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "offer_id"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "offer_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "offer_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "offer_id"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "offer_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_get_offer_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_get_offer_id
(
    in_offer_id uuid = NULL
)
RETURNS setof "offer_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "offer_id"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "offer_location"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_get_city
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_get_city
(
    in_city varchar (255) = NULL
)
RETURNS setof "offer_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "offer_id"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "offer_location"
    WHERE 1=1
    AND lower("city") = lower(in_city)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_get_country_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_get_country_code
(
    in_country_code varchar (255) = NULL
)
RETURNS setof "offer_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "offer_id"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "offer_location"
    WHERE 1=1
    AND lower("country_code") = lower(in_country_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_location_get_postal_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , uuid
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_get_postal_code
(
    in_postal_code varchar (30) = NULL
)
RETURNS setof "offer_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "offer_id"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "offer_location"
    WHERE 1=1
    AND lower("postal_code") = lower(in_postal_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferCategory - offer_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_category"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_count_uuid
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
    FROM "offer_category"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_count_code
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
    FROM "offer_category"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_count_name
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
    FROM "offer_category"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_count_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_count_org_id
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
    FROM "offer_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_count_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_count_type_id
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
    FROM "offer_category"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_count_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_count_org_id_type_id
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
    FROM "offer_category"
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
-- MODEL: OfferCategory - offer_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_category_result"
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
    || ', "data"'
    || ', "type_id"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "offer_category" WHERE 1=1 ';
    
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
    || ', "data" '
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
-- MODEL: OfferCategory - offer_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
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
                    FROM  "offer_category"  
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
                    UPDATE "offer_category" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
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
                    INSERT INTO "offer_category"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
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
                        , in_data
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
-- MODEL: OfferCategory - offer_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_category"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_offer_category_del_code_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_del_code_org_id
(
    in_code varchar (255) = NULL
    , in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_category"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_offer_category_del_code_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_del_code_org_id_type_id
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
    FROM "offer_category"
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
-- MODEL: OfferCategory - offer_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_get
(
)                        
RETURNS setof "offer_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer_category"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "offer_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer_category"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "offer_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer_category"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "offer_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer_category"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_get_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "offer_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_get_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_get_type_id
(
    in_type_id uuid = NULL
)
RETURNS setof "offer_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer_category"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_get_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_get_org_id_type_id
(
    in_org_id uuid = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "offer_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "offer_category"
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
-- MODEL: OfferCategoryTree - offer_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_tree_count
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_category_tree"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_count_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_count_uuid
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
    FROM "offer_category_tree"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_count_parent_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_count_parent_id
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
    FROM "offer_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_count_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_count_category_id
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
    FROM "offer_category_tree"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_count_parent_id_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_count_parent_id_category_id
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
    FROM "offer_category_tree"
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
-- MODEL: OfferCategoryTree - offer_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_tree_browse_filter
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_category_tree_result"
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
    || ' FROM "offer_category_tree" WHERE 1=1 ';
    
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
-- MODEL: OfferCategoryTree - offer_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_tree_set_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_set_uuid
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
                    FROM  "offer_category_tree"  
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
                    UPDATE "offer_category_tree" 
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
                    INSERT INTO "offer_category_tree"
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
-- MODEL: OfferCategoryTree - offer_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_tree_del_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_category_tree"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_offer_category_tree_del_parent_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_del_parent_id
(
    in_parent_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_category_tree"
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_offer_category_tree_del_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_del_category_id
(
    in_category_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_category_tree"
    WHERE 1=1                        
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_offer_category_tree_del_parent_id_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_del_parent_id_category_id
(
    in_parent_id uuid = NULL
    , in_category_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_category_tree"
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
-- MODEL: OfferCategoryTree - offer_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_tree_get
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_get
(
)                        
RETURNS setof "offer_category_tree"
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
    FROM "offer_category_tree"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_get_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "offer_category_tree"
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
    FROM "offer_category_tree"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_get_parent_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_get_parent_id
(
    in_parent_id uuid = NULL
)
RETURNS setof "offer_category_tree"
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
    FROM "offer_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_get_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_get_category_id
(
    in_category_id uuid = NULL
)
RETURNS setof "offer_category_tree"
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
    FROM "offer_category_tree"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_tree_get_parent_id_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_tree_get_parent_id_category_id
(
    in_parent_id uuid = NULL
    , in_category_id uuid = NULL
)
RETURNS setof "offer_category_tree"
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
    FROM "offer_category_tree"
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
-- MODEL: OfferCategoryAssoc - offer_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_assoc_count
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_category_assoc"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_count_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_count_uuid
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
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_count_offer_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_count_offer_id
(
    in_offer_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_count_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_count_category_id
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
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_count_offer_id_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_count_offer_id_category_id
(
    in_offer_id uuid = NULL
    , in_category_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_assoc_browse_filter
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_category_assoc_result"
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
    || ', "offer_id"'
    || ', "category_id"'
    || ', "type"'
    || ' FROM "offer_category_assoc" WHERE 1=1 ';
    
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
    || ', "offer_id" '
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
-- MODEL: OfferCategoryAssoc - offer_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_assoc_set_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_offer_id uuid = NULL
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
                    FROM  "offer_category_assoc"  
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
                    UPDATE "offer_category_assoc" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "offer_id" = in_offer_id
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
                    INSERT INTO "offer_category_assoc"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "offer_id"
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
                        , in_offer_id
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
-- MODEL: OfferCategoryAssoc - offer_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_assoc_del_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_category_assoc"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_category_assoc_get
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_get
(
)                        
RETURNS setof "offer_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "category_id"
        , "type"
    FROM "offer_category_assoc"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_get_uuid
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "offer_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "category_id"
        , "type"
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_get_offer_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_get_offer_id
(
    in_offer_id uuid = NULL
)
RETURNS setof "offer_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "category_id"
        , "type"
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_get_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_get_category_id
(
    in_category_id uuid = NULL
)
RETURNS setof "offer_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "category_id"
        , "type"
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_category_assoc_get_offer_id_category_id
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

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_get_offer_id_category_id
(
    in_offer_id uuid = NULL
    , in_category_id uuid = NULL
)
RETURNS setof "offer_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "category_id"
        , "type"
    FROM "offer_category_assoc"
    WHERE 1=1
    AND "offer_id" = in_offer_id
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
-- MODEL: OfferGameLocation - offer_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_game_location_count
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_game_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_count_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_count_uuid
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
    FROM "offer_game_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_count_game_location_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_count_game_location_id
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
    FROM "offer_game_location"
    WHERE 1=1
    AND "game_location_id" = in_game_location_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_count_offer_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_count_offer_id
(
    in_offer_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_game_location"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_count_offer_id_game_location_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_count_offer_id_game_location_id
(
    in_offer_id uuid = NULL
    , in_game_location_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "offer_game_location"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    AND "game_location_id" = in_game_location_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_game_location_browse_filter
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_game_location_result"
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
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "offer_id"'
    || ', "type_id"'
    || ', "type"'
    || ', "data"'
    || ' FROM "offer_game_location" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "game_location_id" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "offer_id" '
    || ', "type_id" '
    || ', "type" '
    || ', "data" '
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
-- MODEL: OfferGameLocation - offer_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_game_location_set_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_game_location_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_offer_id uuid = NULL
    , in_type_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_data varchar = NULL
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
                    FROM  "offer_game_location"  
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
                    UPDATE "offer_game_location" 
                    SET
                        "status" = in_status
                        , "game_location_id" = in_game_location_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "offer_id" = in_offer_id
                        , "type_id" = in_type_id
                        , "type" = in_type
                        , "data" = in_data
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
                    INSERT INTO "offer_game_location"
                    (
                        "status"
                        , "game_location_id"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "offer_id"
                        , "type_id"
                        , "type"
                        , "data"
                    )
                    VALUES
                    (
                        in_status
                        , in_game_location_id
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_offer_id
                        , in_type_id
                        , in_type
                        , in_data
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
-- MODEL: OfferGameLocation - offer_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_game_location_del_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "offer_game_location"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_offer_game_location_get
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_get
(
)                        
RETURNS setof "offer_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "type_id"
        , "type"
        , "data"
    FROM "offer_game_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_get_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "offer_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "type_id"
        , "type"
        , "data"
    FROM "offer_game_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_get_game_location_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_get_game_location_id
(
    in_game_location_id uuid = NULL
)
RETURNS setof "offer_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "type_id"
        , "type"
        , "data"
    FROM "offer_game_location"
    WHERE 1=1
    AND "game_location_id" = in_game_location_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_get_offer_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_get_offer_id
(
    in_offer_id uuid = NULL
)
RETURNS setof "offer_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "type_id"
        , "type"
        , "data"
    FROM "offer_game_location"
    WHERE 1=1
    AND "offer_id" = in_offer_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_offer_game_location_get_offer_id_game_location_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_get_offer_id_game_location_id
(
    in_offer_id uuid = NULL
    , in_game_location_id uuid = NULL
)
RETURNS setof "offer_game_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_location_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "offer_id"
        , "type_id"
        , "type"
        , "data"
    FROM "offer_game_location"
    WHERE 1=1
    AND "offer_id" = in_offer_id
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
-- MODEL: EventInfo - event_info

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_info_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_info"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_count_uuid
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
    FROM "event_info"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_count_code
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
    FROM "event_info"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_count_name
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
    FROM "event_info"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_count_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_count_org_id
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
    FROM "event_info"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventInfo - event_info

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_info_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_info_result"
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
    || ', "data"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "usage_count"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "event_info" WHERE 1=1 ';
    
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
    || ', "data" '
    || ', "org_id" '
    || ', "uuid" '
    || ', "usage_count" '
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
-- MODEL: EventInfo - event_info

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_info_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_data varchar = NULL
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_usage_count INTEGER = NULL
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
                    FROM  "event_info"  
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
                    UPDATE "event_info" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "data" = in_data
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "usage_count" = in_usage_count
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
                    INSERT INTO "event_info"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "data"
                        , "org_id"
                        , "uuid"
                        , "usage_count"
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
                        , in_data
                        , in_org_id
                        , in_uuid
                        , in_usage_count
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
-- MODEL: EventInfo - event_info

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_info_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_info"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_event_info_del_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_del_org_id
(
    in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_info"
    WHERE 1=1                        
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventInfo - event_info

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_info_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_get
(
)                        
RETURNS setof "event_info"
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
        , "data"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_info"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "event_info"
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
        , "data"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_info"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "event_info"
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
        , "data"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_info"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "event_info"
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
        , "data"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_info"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_info_get_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , varchar
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "event_info"
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
        , "data"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_info"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventLocation - event_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_location_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_count_uuid
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
    FROM "event_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_count_event_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_count_event_id
(
    in_event_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_location"
    WHERE 1=1
    AND "event_id" = in_event_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_count_city
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_count_city
(
    in_city varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_location"
    WHERE 1=1
    AND lower("city") = lower(in_city)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_count_country_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_count_country_code
(
    in_country_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_location"
    WHERE 1=1
    AND lower("country_code") = lower(in_country_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_count_postal_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_count_postal_code
(
    in_postal_code varchar (30) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_location"
    WHERE 1=1
    AND lower("postal_code") = lower(in_postal_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventLocation - event_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_location_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_location_result"
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
    || ', "fax"'
    || ', "code"'
    || ', "description"'
    || ', "address1"'
    || ', "twitter"'
    || ', "phone"'
    || ', "postal_code"'
    || ', "country_code"'
    || ', "date_created"'
    || ', "active"'
    || ', "data"'
    || ', "uuid"'
    || ', "state_province"'
    || ', "city"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "dob"'
    || ', "date_start"'
    || ', "longitude"'
    || ', "email"'
    || ', "event_id"'
    || ', "date_end"'
    || ', "latitude"'
    || ', "facebook"'
    || ', "type"'
    || ', "address2"'
    || ' FROM "event_location" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "fax" '
    || ', "code" '
    || ', "description" '
    || ', "address1" '
    || ', "twitter" '
    || ', "phone" '
    || ', "postal_code" '
    || ', "country_code" '
    || ', "date_created" '
    || ', "active" '
    || ', "data" '
    || ', "uuid" '
    || ', "state_province" '
    || ', "city" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "dob" '
    || ', "date_start" '
    || ', "longitude" '
    || ', "email" '
    || ', "event_id" '
    || ', "date_end" '
    || ', "latitude" '
    || ', "facebook" '
    || ', "type" '
    || ', "address2" '
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
-- MODEL: EventLocation - event_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_location_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_fax varchar (30) = NULL
    , in_code varchar (255) = NULL
    , in_description varchar (255) = NULL
    , in_address1 varchar (1000) = NULL
    , in_twitter varchar (50) = NULL
    , in_phone varchar (30) = NULL
    , in_postal_code varchar (30) = NULL
    , in_country_code varchar (255) = NULL
    , in_date_created TIMESTAMP = now()
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_state_province varchar (255) = NULL
    , in_city varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_dob TIMESTAMP = now()
    , in_date_start TIMESTAMP = now()
    , in_longitude double precision = NULL
    , in_email varchar (255) = NULL
    , in_event_id uuid = NULL
    , in_date_end TIMESTAMP = now()
    , in_latitude double precision = NULL
    , in_facebook varchar (255) = NULL
    , in_type varchar (500) = NULL
    , in_address2 varchar (500) = NULL
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
                    FROM  "event_location"  
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
                    UPDATE "event_location" 
                    SET
                        "status" = in_status
                        , "fax" = in_fax
                        , "code" = in_code
                        , "description" = in_description
                        , "address1" = in_address1
                        , "twitter" = in_twitter
                        , "phone" = in_phone
                        , "postal_code" = in_postal_code
                        , "country_code" = in_country_code
                        , "date_created" = in_date_created
                        , "active" = in_active
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "state_province" = in_state_province
                        , "city" = in_city
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "dob" = in_dob
                        , "date_start" = in_date_start
                        , "longitude" = in_longitude
                        , "email" = in_email
                        , "event_id" = in_event_id
                        , "date_end" = in_date_end
                        , "latitude" = in_latitude
                        , "facebook" = in_facebook
                        , "type" = in_type
                        , "address2" = in_address2
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
                    INSERT INTO "event_location"
                    (
                        "status"
                        , "fax"
                        , "code"
                        , "description"
                        , "address1"
                        , "twitter"
                        , "phone"
                        , "postal_code"
                        , "country_code"
                        , "date_created"
                        , "active"
                        , "data"
                        , "uuid"
                        , "state_province"
                        , "city"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "dob"
                        , "date_start"
                        , "longitude"
                        , "email"
                        , "event_id"
                        , "date_end"
                        , "latitude"
                        , "facebook"
                        , "type"
                        , "address2"
                    )
                    VALUES
                    (
                        in_status
                        , in_fax
                        , in_code
                        , in_description
                        , in_address1
                        , in_twitter
                        , in_phone
                        , in_postal_code
                        , in_country_code
                        , in_date_created
                        , in_active
                        , in_data
                        , in_uuid
                        , in_state_province
                        , in_city
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_dob
                        , in_date_start
                        , in_longitude
                        , in_email
                        , in_event_id
                        , in_date_end
                        , in_latitude
                        , in_facebook
                        , in_type
                        , in_address2
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
-- MODEL: EventLocation - event_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_location_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_location"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventLocation - event_location

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_location_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_get
(
)                        
RETURNS setof "event_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "event_id"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "event_location"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "event_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "event_id"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "event_location"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_get_event_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_get_event_id
(
    in_event_id uuid = NULL
)
RETURNS setof "event_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "event_id"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "event_location"
    WHERE 1=1
    AND "event_id" = in_event_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_get_city
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_get_city
(
    in_city varchar (255) = NULL
)
RETURNS setof "event_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "event_id"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "event_location"
    WHERE 1=1
    AND lower("city") = lower(in_city)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_get_country_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_get_country_code
(
    in_country_code varchar (255) = NULL
)
RETURNS setof "event_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "event_id"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "event_location"
    WHERE 1=1
    AND lower("country_code") = lower(in_country_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_location_get_postal_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , TIMESTAMP
    , double precision
    , varchar
    , uuid
    , TIMESTAMP
    , double precision
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_location_get_postal_code
(
    in_postal_code varchar (30) = NULL
)
RETURNS setof "event_location"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "fax"
        , "code"
        , "description"
        , "address1"
        , "twitter"
        , "phone"
        , "postal_code"
        , "country_code"
        , "date_created"
        , "active"
        , "data"
        , "uuid"
        , "state_province"
        , "city"
        , "display_name"
        , "name"
        , "date_modified"
        , "dob"
        , "date_start"
        , "longitude"
        , "email"
        , "event_id"
        , "date_end"
        , "latitude"
        , "facebook"
        , "type"
        , "address2"
    FROM "event_location"
    WHERE 1=1
    AND lower("postal_code") = lower(in_postal_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventCategory - event_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_category"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_count_uuid
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
    FROM "event_category"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_count_code
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
    FROM "event_category"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_count_name
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
    FROM "event_category"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_count_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_count_org_id
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
    FROM "event_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_count_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_count_type_id
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
    FROM "event_category"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_count_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_count_org_id_type_id
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
    FROM "event_category"
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
-- MODEL: EventCategory - event_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_category_result"
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
    || ', "data"'
    || ', "type_id"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "event_category" WHERE 1=1 ';
    
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
    || ', "data" '
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
-- MODEL: EventCategory - event_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
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
                    FROM  "event_category"  
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
                    UPDATE "event_category" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
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
                    INSERT INTO "event_category"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
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
                        , in_data
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
-- MODEL: EventCategory - event_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_category"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_event_category_del_code_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_del_code_org_id
(
    in_code varchar (255) = NULL
    , in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_category"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_event_category_del_code_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_del_code_org_id_type_id
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
    FROM "event_category"
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
-- MODEL: EventCategory - event_category

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_get
(
)                        
RETURNS setof "event_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_category"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "event_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_category"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "event_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_category"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "event_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_category"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_get_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "event_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_category"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_get_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_get_type_id
(
    in_type_id uuid = NULL
)
RETURNS setof "event_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_category"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_get_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_get_org_id_type_id
(
    in_org_id uuid = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "event_category"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "event_category"
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
-- MODEL: EventCategoryTree - event_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_tree_count
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_category_tree"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_count_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_count_uuid
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
    FROM "event_category_tree"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_count_parent_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_count_parent_id
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
    FROM "event_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_count_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_count_category_id
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
    FROM "event_category_tree"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_count_parent_id_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_count_parent_id_category_id
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
    FROM "event_category_tree"
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
-- MODEL: EventCategoryTree - event_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_tree_browse_filter
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_category_tree_result"
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
    || ' FROM "event_category_tree" WHERE 1=1 ';
    
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
-- MODEL: EventCategoryTree - event_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_tree_set_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_set_uuid
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
                    FROM  "event_category_tree"  
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
                    UPDATE "event_category_tree" 
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
                    INSERT INTO "event_category_tree"
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
-- MODEL: EventCategoryTree - event_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_tree_del_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_category_tree"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_event_category_tree_del_parent_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_del_parent_id
(
    in_parent_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_category_tree"
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_event_category_tree_del_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_del_category_id
(
    in_category_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_category_tree"
    WHERE 1=1                        
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_event_category_tree_del_parent_id_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_del_parent_id_category_id
(
    in_parent_id uuid = NULL
    , in_category_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_category_tree"
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
-- MODEL: EventCategoryTree - event_category_tree

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_tree_get
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_get
(
)                        
RETURNS setof "event_category_tree"
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
    FROM "event_category_tree"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_get_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "event_category_tree"
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
    FROM "event_category_tree"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_get_parent_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_get_parent_id
(
    in_parent_id uuid = NULL
)
RETURNS setof "event_category_tree"
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
    FROM "event_category_tree"
    WHERE 1=1
    AND "parent_id" = in_parent_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_get_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_get_category_id
(
    in_category_id uuid = NULL
)
RETURNS setof "event_category_tree"
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
    FROM "event_category_tree"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_tree_get_parent_id_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_tree_get_parent_id_category_id
(
    in_parent_id uuid = NULL
    , in_category_id uuid = NULL
)
RETURNS setof "event_category_tree"
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
    FROM "event_category_tree"
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
-- MODEL: EventCategoryAssoc - event_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_assoc_count
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_category_assoc"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_count_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_count_uuid
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
    FROM "event_category_assoc"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_count_event_id
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_count_event_id
(
    in_event_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_category_assoc"
    WHERE 1=1
    AND "event_id" = in_event_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_count_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_count_category_id
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
    FROM "event_category_assoc"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_count_event_id_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_count_event_id_category_id
(
    in_event_id uuid = NULL
    , in_category_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "event_category_assoc"
    WHERE 1=1
    AND "event_id" = in_event_id
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_assoc_browse_filter
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_category_assoc_result"
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
    || ', "event_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "category_id"'
    || ', "type"'
    || ' FROM "event_category_assoc" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "event_id" '
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
-- MODEL: EventCategoryAssoc - event_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_assoc_set_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_event_id uuid = NULL
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
                    FROM  "event_category_assoc"  
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
                    UPDATE "event_category_assoc" 
                    SET
                        "status" = in_status
                        , "event_id" = in_event_id
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
                    INSERT INTO "event_category_assoc"
                    (
                        "status"
                        , "event_id"
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
                        , in_event_id
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
-- MODEL: EventCategoryAssoc - event_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_assoc_del_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "event_category_assoc"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_event_category_assoc_get
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_get
(
)                        
RETURNS setof "event_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "event_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "event_category_assoc"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_get_uuid
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "event_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "event_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "event_category_assoc"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_get_event_id
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_get_event_id
(
    in_event_id uuid = NULL
)
RETURNS setof "event_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "event_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "event_category_assoc"
    WHERE 1=1
    AND "event_id" = in_event_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_get_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_get_category_id
(
    in_category_id uuid = NULL
)
RETURNS setof "event_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "event_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "event_category_assoc"
    WHERE 1=1
    AND "category_id" = in_category_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_event_category_assoc_get_event_id_category_id
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

CREATE OR REPLACE FUNCTION usp_event_category_assoc_get_event_id_category_id
(
    in_event_id uuid = NULL
    , in_category_id uuid = NULL
)
RETURNS setof "event_category_assoc"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "event_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "category_id"
        , "type"
    FROM "event_category_assoc"
    WHERE 1=1
    AND "event_id" = in_event_id
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
-- MODEL: Channel - channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "channel"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_count_uuid
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
    FROM "channel"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_count_code
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
    FROM "channel"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_count_name
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
    FROM "channel"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_count_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_count_org_id
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
    FROM "channel"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_count_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_count_type_id
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
    FROM "channel"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_count_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_count_org_id_type_id
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
    FROM "channel"
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
-- MODEL: Channel - channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "channel_result"
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
    || ', "data"'
    || ', "type_id"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "channel" WHERE 1=1 ';
    
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
    || ', "data" '
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
-- MODEL: Channel - channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
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
                    FROM  "channel"  
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
                    UPDATE "channel" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
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
                    INSERT INTO "channel"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
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
                        , in_data
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
-- MODEL: Channel - channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "channel"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_channel_del_code_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_del_code_org_id
(
    in_code varchar (255) = NULL
    , in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "channel"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_channel_del_code_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_del_code_org_id_type_id
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
    FROM "channel"
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
-- MODEL: Channel - channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_get
(
)                        
RETURNS setof "channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_get_org_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_get_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_get_type_id
(
    in_type_id uuid = NULL
)
RETURNS setof "channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_get_org_id_type_id
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_get_org_id_type_id
(
    in_org_id uuid = NULL
    , in_type_id uuid = NULL
)
RETURNS setof "channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel"
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
-- MODEL: ChannelType - channel_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_type_count
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "channel_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_type_count_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_count_uuid
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
    FROM "channel_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_type_count_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_count_code
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
    FROM "channel_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_type_count_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_count_name
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
    FROM "channel_type"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ChannelType - channel_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_type_browse_filter
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "channel_type_result"
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
    || ', "data"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "channel_type" WHERE 1=1 ';
    
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
    || ', "data" '
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
-- MODEL: ChannelType - channel_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_type_set_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
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
                    FROM  "channel_type"  
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
                    UPDATE "channel_type" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
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
                    INSERT INTO "channel_type"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
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
                        , in_data
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
-- MODEL: ChannelType - channel_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_type_del_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "channel_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ChannelType - channel_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_channel_type_get
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_get
(
)                        
RETURNS setof "channel_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_type_get_uuid
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "channel_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_type_get_code
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "channel_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_channel_type_get_name
(
    varchar
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "channel_type"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "uuid"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "channel_type"
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
-- MODEL: Question - question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_question_count
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "question"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_count_uuid
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count_uuid
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
    FROM "question"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_count_code
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count_code
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
    FROM "question"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_count_name
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count_name
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
    FROM "question"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_count_channel_id
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count_channel_id
(
    in_channel_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_count_org_id
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count_org_id
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
    FROM "question"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_count_channel_id_org_id
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count_channel_id_org_id
(
    in_channel_id uuid = NULL
    , in_org_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_count_channel_id_code
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_count_channel_id_code
(
    in_channel_id uuid = NULL
    , in_code varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Question - question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_question_browse_filter
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "question_result"
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
    || ', "data"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "choices"'
    || ', "channel_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "question" WHERE 1=1 ';
    
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
    || ', "data" '
    || ', "org_id" '
    || ', "uuid" '
    || ', "choices" '
    || ', "channel_id" '
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
-- MODEL: Question - question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_question_set_uuid
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_choices varchar = NULL
    , in_channel_id uuid = NULL
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
                    FROM  "question"  
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
                    UPDATE "question" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "choices" = in_choices
                        , "channel_id" = in_channel_id
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
                    INSERT INTO "question"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "org_id"
                        , "uuid"
                        , "choices"
                        , "channel_id"
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
                        , in_data
                        , in_org_id
                        , in_uuid
                        , in_choices
                        , in_channel_id
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

DROP FUNCTION IF EXISTS usp_question_set_channel_id_code
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_set_channel_id_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data varchar = NULL
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_choices varchar = NULL
    , in_channel_id uuid = NULL
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
                    FROM  "question"  
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
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
                    UPDATE "question" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "data" = in_data
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "choices" = in_choices
                        , "channel_id" = in_channel_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "description" = in_description
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
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
                    INSERT INTO "question"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "data"
                        , "org_id"
                        , "uuid"
                        , "choices"
                        , "channel_id"
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
                        , in_data
                        , in_org_id
                        , in_uuid
                        , in_choices
                        , in_channel_id
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
-- MODEL: Question - question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_question_del_uuid
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "question"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_question_del_channel_id_org_id
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_del_channel_id_org_id
(
    in_channel_id uuid = NULL
    , in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "question"
    WHERE 1=1                        
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Question - question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_question_get
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get
(
)                        
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_uuid
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_code
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_name
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_name
(
    in_name varchar (255) = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND lower("name") = lower(in_name)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_type
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_type
(
    in_type varchar (50) = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND lower("type") = lower(in_type)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_channel_id
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_channel_id
(
    in_channel_id uuid = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_org_id
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_channel_id_org_id
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_channel_id_org_id
(
    in_channel_id uuid = NULL
    , in_org_id uuid = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_question_get_channel_id_code
(
    varchar
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

CREATE OR REPLACE FUNCTION usp_question_get_channel_id_code
(
    in_channel_id uuid = NULL
    , in_code varchar (255) = NULL
)
RETURNS setof "question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "code"
        , "display_name"
        , "name"
        , "date_modified"
        , "data"
        , "org_id"
        , "uuid"
        , "choices"
        , "channel_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
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
-- MODEL: ProfileOffer - profile_offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_offer_count
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_offer"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_offer_count_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_count_uuid
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
    FROM "profile_offer"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_offer_count_profile_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_count_profile_id
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
    FROM "profile_offer"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_offer_browse_filter
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_offer_result"
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
    || ', "redeem_code"'
    || ', "offer_id"'
    || ', "profile_id"'
    || ', "active"'
    || ', "data"'
    || ', "uuid"'
    || ', "redeemed"'
    || ', "url"'
    || ', "date_modified"'
    || ', "date_created"'
    || ', "type"'
    || ' FROM "profile_offer" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "redeem_code" '
    || ', "offer_id" '
    || ', "profile_id" '
    || ', "active" '
    || ', "data" '
    || ', "uuid" '
    || ', "redeemed" '
    || ', "url" '
    || ', "date_modified" '
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
-- MODEL: ProfileOffer - profile_offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_offer_set_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_redeem_code varchar (128) = NULL
    , in_offer_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_redeemed varchar (50) = NULL
    , in_url varchar (50) = NULL
    , in_date_modified TIMESTAMP = now()
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
                    FROM  "profile_offer"  
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
                    UPDATE "profile_offer" 
                    SET
                        "status" = in_status
                        , "redeem_code" = in_redeem_code
                        , "offer_id" = in_offer_id
                        , "profile_id" = in_profile_id
                        , "active" = in_active
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "redeemed" = in_redeemed
                        , "url" = in_url
                        , "date_modified" = in_date_modified
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
                    INSERT INTO "profile_offer"
                    (
                        "status"
                        , "redeem_code"
                        , "offer_id"
                        , "profile_id"
                        , "active"
                        , "data"
                        , "uuid"
                        , "redeemed"
                        , "url"
                        , "date_modified"
                        , "date_created"
                        , "type"
                    )
                    VALUES
                    (
                        in_status
                        , in_redeem_code
                        , in_offer_id
                        , in_profile_id
                        , in_active
                        , in_data
                        , in_uuid
                        , in_redeemed
                        , in_url
                        , in_date_modified
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
-- MODEL: ProfileOffer - profile_offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_offer_del_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_offer"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_offer_del_profile_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_del_profile_id
(
    in_profile_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_offer"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_offer_get
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_get
(
)                        
RETURNS setof "profile_offer"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "redeem_code"
        , "offer_id"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "redeemed"
        , "url"
        , "date_modified"
        , "date_created"
        , "type"
    FROM "profile_offer"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_offer_get_uuid
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_offer"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "redeem_code"
        , "offer_id"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "redeemed"
        , "url"
        , "date_modified"
        , "date_created"
        , "type"
    FROM "profile_offer"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_offer_get_profile_id
(
    varchar
    , varchar
    , uuid
    , uuid
    , boolean
    , varchar
    , uuid
    , varchar
    , varchar
    , TIMESTAMP
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_offer_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_offer"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "redeem_code"
        , "offer_id"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "redeemed"
        , "url"
        , "date_modified"
        , "date_created"
        , "type"
    FROM "profile_offer"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_app_count
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_app_count_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_count_uuid
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
    FROM "profile_app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_app_count_profile_id_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_count_profile_id_app_id
(
    in_profile_id uuid = NULL
    , in_app_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_app"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_app_browse_filter
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_app_result"
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
    || ', "profile_id"'
    || ', "type"'
    || ', "app_id"'
    || ', "data"'
    || ' FROM "profile_app" WHERE 1=1 ';
    
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
    || ', "profile_id" '
    || ', "type" '
    || ', "app_id" '
    || ', "data" '
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
-- MODEL: ProfileApp - profile_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_app_set_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_app_id uuid = NULL
    , in_data varchar = NULL
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
                    FROM  "profile_app"  
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
                    UPDATE "profile_app" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                        , "app_id" = in_app_id
                        , "data" = in_data
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
                    INSERT INTO "profile_app"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "profile_id"
                        , "type"
                        , "app_id"
                        , "data"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_profile_id
                        , in_type
                        , in_app_id
                        , in_data
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

DROP FUNCTION IF EXISTS usp_profile_app_set_profile_id_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_set_profile_id_app_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_app_id uuid = NULL
    , in_data varchar = NULL
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
                    FROM  "profile_app"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
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
                    UPDATE "profile_app" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                        , "app_id" = in_app_id
                        , "data" = in_data
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
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
                    INSERT INTO "profile_app"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "profile_id"
                        , "type"
                        , "app_id"
                        , "data"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_profile_id
                        , in_type
                        , in_app_id
                        , in_data
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
-- MODEL: ProfileApp - profile_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_app_del_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_app"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_app_del_profile_id_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_del_profile_id_app_id
(
    in_profile_id uuid = NULL
    , in_app_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_app"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_app_get
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_get
(
)                        
RETURNS setof "profile_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "app_id"
        , "data"
    FROM "profile_app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_app_get_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "app_id"
        , "data"
    FROM "profile_app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_app_get_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_get_app_id
(
    in_app_id uuid = NULL
)
RETURNS setof "profile_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "app_id"
        , "data"
    FROM "profile_app"
    WHERE 1=1
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_app_get_profile_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "app_id"
        , "data"
    FROM "profile_app"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_app_get_profile_id_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_app_get_profile_id_app_id
(
    in_profile_id uuid = NULL
    , in_app_id uuid = NULL
)
RETURNS setof "profile_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "app_id"
        , "data"
    FROM "profile_app"
    WHERE 1=1
    AND "profile_id" = in_profile_id
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
-- MODEL: ProfileOrg - profile_org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_org_count
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_org"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_org_count_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_count_uuid
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
    FROM "profile_org"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_org_count_org_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_count_org_id
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
    FROM "profile_org"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_org_count_profile_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_count_profile_id
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
    FROM "profile_org"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_org_browse_filter
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_org_result"
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
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "profile_id"'
    || ', "type"'
    || ', "org_id"'
    || ', "data"'
    || ' FROM "profile_org" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "type_id" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
    || ', "date_created" '
    || ', "profile_id" '
    || ', "type" '
    || ', "org_id" '
    || ', "data" '
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
-- MODEL: ProfileOrg - profile_org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_org_set_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_org_id uuid = NULL
    , in_data varchar = NULL
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
                    FROM  "profile_org"  
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
                    UPDATE "profile_org" 
                    SET
                        "status" = in_status
                        , "type_id" = in_type_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                        , "org_id" = in_org_id
                        , "data" = in_data
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
                    INSERT INTO "profile_org"
                    (
                        "status"
                        , "type_id"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "profile_id"
                        , "type"
                        , "org_id"
                        , "data"
                    )
                    VALUES
                    (
                        in_status
                        , in_type_id
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_profile_id
                        , in_type
                        , in_org_id
                        , in_data
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
-- MODEL: ProfileOrg - profile_org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_org_del_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_org"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_org_get
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_get
(
)                        
RETURNS setof "profile_org"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "org_id"
        , "data"
    FROM "profile_org"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_org_get_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_org"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "org_id"
        , "data"
    FROM "profile_org"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_org_get_org_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "profile_org"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "org_id"
        , "data"
    FROM "profile_org"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_org_get_profile_id
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_org_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_org"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "type_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
        , "org_id"
        , "data"
    FROM "profile_org"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_question_count
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_question"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_uuid
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_uuid
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
    FROM "profile_question"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_channel_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_channel_id
(
    in_channel_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_org_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_org_id
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
    FROM "profile_question"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_profile_id
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
    FROM "profile_question"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_question_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_question_id
(
    in_question_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_question"
    WHERE 1=1
    AND "question_id" = in_question_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_channel_id_org_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_channel_id_org_id
(
    in_channel_id uuid = NULL
    , in_org_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_channel_id_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_channel_id_profile_id
(
    in_channel_id uuid = NULL
    , in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_count_question_id_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_count_question_id_profile_id
(
    in_question_id uuid = NULL
    , in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_question"
    WHERE 1=1
    AND "question_id" = in_question_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_question_browse_filter
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_question_result"
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
    || ', "profile_id"'
    || ', "active"'
    || ', "data"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "org_id"'
    || ', "channel_id"'
    || ', "answer"'
    || ', "date_created"'
    || ', "type"'
    || ', "question_id"'
    || ' FROM "profile_question" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "profile_id" '
    || ', "active" '
    || ', "data" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "org_id" '
    || ', "channel_id" '
    || ', "answer" '
    || ', "date_created" '
    || ', "type" '
    || ', "question_id" '
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
-- MODEL: ProfileQuestion - profile_question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_question_set_uuid
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_answer varchar (1000) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_question_id uuid = NULL
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
                    FROM  "profile_question"  
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
                    UPDATE "profile_question" 
                    SET
                        "status" = in_status
                        , "profile_id" = in_profile_id
                        , "active" = in_active
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "answer" = in_answer
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "question_id" = in_question_id
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
                    INSERT INTO "profile_question"
                    (
                        "status"
                        , "profile_id"
                        , "active"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "org_id"
                        , "channel_id"
                        , "answer"
                        , "date_created"
                        , "type"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_profile_id
                        , in_active
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_org_id
                        , in_channel_id
                        , in_answer
                        , in_date_created
                        , in_type
                        , in_question_id
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

DROP FUNCTION IF EXISTS usp_profile_question_set_channel_id_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_channel_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_answer varchar (1000) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_question_id uuid = NULL
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
                    FROM  "profile_question"  
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
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
                    UPDATE "profile_question" 
                    SET
                        "status" = in_status
                        , "profile_id" = in_profile_id
                        , "active" = in_active
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "answer" = in_answer
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "question_id" = in_question_id
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
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
                    INSERT INTO "profile_question"
                    (
                        "status"
                        , "profile_id"
                        , "active"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "org_id"
                        , "channel_id"
                        , "answer"
                        , "date_created"
                        , "type"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_profile_id
                        , in_active
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_org_id
                        , in_channel_id
                        , in_answer
                        , in_date_created
                        , in_type
                        , in_question_id
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

DROP FUNCTION IF EXISTS usp_profile_question_set_question_id_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_question_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_answer varchar (1000) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_question_id uuid = NULL
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
                    FROM  "profile_question"  
                    WHERE 1=1
                    AND "question_id" = in_question_id
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
                    UPDATE "profile_question" 
                    SET
                        "status" = in_status
                        , "profile_id" = in_profile_id
                        , "active" = in_active
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "answer" = in_answer
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "question_id" = in_question_id
                    WHERE 1=1
                    AND "question_id" = in_question_id
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
                    INSERT INTO "profile_question"
                    (
                        "status"
                        , "profile_id"
                        , "active"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "org_id"
                        , "channel_id"
                        , "answer"
                        , "date_created"
                        , "type"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_profile_id
                        , in_active
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_org_id
                        , in_channel_id
                        , in_answer
                        , in_date_created
                        , in_type
                        , in_question_id
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

DROP FUNCTION IF EXISTS usp_profile_question_set_channel_id_question_id_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_channel_id_question_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_profile_id uuid = NULL
    , in_active boolean = NULL
    , in_data varchar = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_answer varchar (1000) = NULL
    , in_date_created TIMESTAMP = now()
    , in_type varchar (500) = NULL
    , in_question_id uuid = NULL
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
                    FROM  "profile_question"  
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
                    AND "question_id" = in_question_id
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
                    UPDATE "profile_question" 
                    SET
                        "status" = in_status
                        , "profile_id" = in_profile_id
                        , "active" = in_active
                        , "data" = in_data
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "answer" = in_answer
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "question_id" = in_question_id
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
                    AND "question_id" = in_question_id
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
                    INSERT INTO "profile_question"
                    (
                        "status"
                        , "profile_id"
                        , "active"
                        , "data"
                        , "uuid"
                        , "date_modified"
                        , "org_id"
                        , "channel_id"
                        , "answer"
                        , "date_created"
                        , "type"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_profile_id
                        , in_active
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_org_id
                        , in_channel_id
                        , in_answer
                        , in_date_created
                        , in_type
                        , in_question_id
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
-- MODEL: ProfileQuestion - profile_question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_question_del_uuid
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_question"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_question_del_channel_id_org_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_del_channel_id_org_id
(
    in_channel_id uuid = NULL
    , in_org_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_question"
    WHERE 1=1                        
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_question_get
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get
(
)                        
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_uuid
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_channel_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_channel_id
(
    in_channel_id uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_org_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_question_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_question_id
(
    in_question_id uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "question_id" = in_question_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_channel_id_org_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_channel_id_org_id
(
    in_channel_id uuid = NULL
    , in_org_id uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_channel_id_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_channel_id_profile_id
(
    in_channel_id uuid = NULL
    , in_profile_id uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_question_get_question_id_profile_id
(
    varchar
    , uuid
    , boolean
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_get_question_id_profile_id
(
    in_question_id uuid = NULL
    , in_profile_id uuid = NULL
)
RETURNS setof "profile_question"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "profile_id"
        , "active"
        , "data"
        , "uuid"
        , "date_modified"
        , "org_id"
        , "channel_id"
        , "answer"
        , "date_created"
        , "type"
        , "question_id"
    FROM "profile_question"
    WHERE 1=1
    AND "question_id" = in_question_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_channel_count
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

CREATE OR REPLACE FUNCTION usp_profile_channel_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_channel"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_count_uuid
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

CREATE OR REPLACE FUNCTION usp_profile_channel_count_uuid
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
    FROM "profile_channel"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_count_channel_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_count_channel_id
(
    in_channel_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_channel"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_count_profile_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_count_profile_id
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
    FROM "profile_channel"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_count_channel_id_profile_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_count_channel_id_profile_id
(
    in_channel_id uuid = NULL
    , in_profile_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_channel"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_channel_browse_filter
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

CREATE OR REPLACE FUNCTION usp_profile_channel_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_channel_result"
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
    || ', "channel_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "profile_id"'
    || ', "type"'
    || ' FROM "profile_channel" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "channel_id" '
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
-- MODEL: ProfileChannel - profile_channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_channel_set_uuid
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

CREATE OR REPLACE FUNCTION usp_profile_channel_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_channel_id uuid = NULL
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
                    FROM  "profile_channel"  
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
                    UPDATE "profile_channel" 
                    SET
                        "status" = in_status
                        , "channel_id" = in_channel_id
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
                    INSERT INTO "profile_channel"
                    (
                        "status"
                        , "channel_id"
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
                        , in_channel_id
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

DROP FUNCTION IF EXISTS usp_profile_channel_set_channel_id_profile_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_set_channel_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_channel_id uuid = NULL
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
                    FROM  "profile_channel"  
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
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
                    UPDATE "profile_channel" 
                    SET
                        "status" = in_status
                        , "channel_id" = in_channel_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "profile_id" = in_profile_id
                        , "type" = in_type
                    WHERE 1=1
                    AND "channel_id" = in_channel_id
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
                    INSERT INTO "profile_channel"
                    (
                        "status"
                        , "channel_id"
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
                        , in_channel_id
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
-- MODEL: ProfileChannel - profile_channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_channel_del_uuid
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

CREATE OR REPLACE FUNCTION usp_profile_channel_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_channel"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_channel_del_channel_id_profile_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_del_channel_id_profile_id
(
    in_channel_id uuid = NULL
    , in_profile_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_channel"
    WHERE 1=1                        
    AND "channel_id" = in_channel_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_channel_get
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

CREATE OR REPLACE FUNCTION usp_profile_channel_get
(
)                        
RETURNS setof "profile_channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "channel_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_channel"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_get_uuid
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

CREATE OR REPLACE FUNCTION usp_profile_channel_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "channel_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_channel"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_get_channel_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_get_channel_id
(
    in_channel_id uuid = NULL
)
RETURNS setof "profile_channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "channel_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_channel"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_get_profile_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "channel_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_channel"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_channel_get_channel_id_profile_id
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

CREATE OR REPLACE FUNCTION usp_profile_channel_get_channel_id_profile_id
(
    in_channel_id uuid = NULL
    , in_profile_id uuid = NULL
)
RETURNS setof "profile_channel"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "channel_id"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "profile_id"
        , "type"
    FROM "profile_channel"
    WHERE 1=1
    AND "channel_id" = in_channel_id
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OrgSite - org_site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_site_count
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

CREATE OR REPLACE FUNCTION usp_org_site_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "org_site"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_count_uuid
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

CREATE OR REPLACE FUNCTION usp_org_site_count_uuid
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
    FROM "org_site"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_count_org_id
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

CREATE OR REPLACE FUNCTION usp_org_site_count_org_id
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
    FROM "org_site"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_count_site_id
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

CREATE OR REPLACE FUNCTION usp_org_site_count_site_id
(
    in_site_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "org_site"
    WHERE 1=1
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_count_org_id_site_id
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

CREATE OR REPLACE FUNCTION usp_org_site_count_org_id_site_id
(
    in_org_id uuid = NULL
    , in_site_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "org_site"
    WHERE 1=1
    AND "org_id" = in_org_id
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OrgSite - org_site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_site_browse_filter
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

CREATE OR REPLACE FUNCTION usp_org_site_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "org_site_result"
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
    || ', "site_id"'
    || ', "type"'
    || ', "org_id"'
    || ' FROM "org_site" WHERE 1=1 ';
    
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
    || ', "site_id" '
    || ', "type" '
    || ', "org_id" '
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
-- MODEL: OrgSite - org_site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_site_set_uuid
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

CREATE OR REPLACE FUNCTION usp_org_site_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_org_id uuid = NULL
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
                    FROM  "org_site"  
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
                    UPDATE "org_site" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "site_id" = in_site_id
                        , "type" = in_type
                        , "org_id" = in_org_id
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
                    INSERT INTO "org_site"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "site_id"
                        , "type"
                        , "org_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_site_id
                        , in_type
                        , in_org_id
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

DROP FUNCTION IF EXISTS usp_org_site_set_org_id_site_id
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

CREATE OR REPLACE FUNCTION usp_org_site_set_org_id_site_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
    , in_type varchar (500) = NULL
    , in_org_id uuid = NULL
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
                    FROM  "org_site"  
                    WHERE 1=1
                    AND "org_id" = in_org_id
                    AND "site_id" = in_site_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "org_site" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "site_id" = in_site_id
                        , "type" = in_type
                        , "org_id" = in_org_id
                    WHERE 1=1
                    AND "org_id" = in_org_id
                    AND "site_id" = in_site_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "org_site"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "site_id"
                        , "type"
                        , "org_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_site_id
                        , in_type
                        , in_org_id
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
-- MODEL: OrgSite - org_site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_site_del_uuid
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

CREATE OR REPLACE FUNCTION usp_org_site_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "org_site"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_org_site_del_org_id_site_id
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

CREATE OR REPLACE FUNCTION usp_org_site_del_org_id_site_id
(
    in_org_id uuid = NULL
    , in_site_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "org_site"
    WHERE 1=1                        
    AND "org_id" = in_org_id
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OrgSite - org_site

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_org_site_get
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

CREATE OR REPLACE FUNCTION usp_org_site_get
(
)                        
RETURNS setof "org_site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "org_id"
    FROM "org_site"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_get_uuid
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

CREATE OR REPLACE FUNCTION usp_org_site_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "org_site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "org_id"
    FROM "org_site"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_get_org_id
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

CREATE OR REPLACE FUNCTION usp_org_site_get_org_id
(
    in_org_id uuid = NULL
)
RETURNS setof "org_site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "org_id"
    FROM "org_site"
    WHERE 1=1
    AND "org_id" = in_org_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_get_site_id
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

CREATE OR REPLACE FUNCTION usp_org_site_get_site_id
(
    in_site_id uuid = NULL
)
RETURNS setof "org_site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "org_id"
    FROM "org_site"
    WHERE 1=1
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_org_site_get_org_id_site_id
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

CREATE OR REPLACE FUNCTION usp_org_site_get_org_id_site_id
(
    in_org_id uuid = NULL
    , in_site_id uuid = NULL
)
RETURNS setof "org_site"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "org_id"
    FROM "org_site"
    WHERE 1=1
    AND "org_id" = in_org_id
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: SiteApp - site_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_app_count
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

CREATE OR REPLACE FUNCTION usp_site_app_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site_app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_count_uuid
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

CREATE OR REPLACE FUNCTION usp_site_app_count_uuid
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
    FROM "site_app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_count_app_id
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

CREATE OR REPLACE FUNCTION usp_site_app_count_app_id
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
    FROM "site_app"
    WHERE 1=1
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_count_site_id
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

CREATE OR REPLACE FUNCTION usp_site_app_count_site_id
(
    in_site_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site_app"
    WHERE 1=1
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_count_app_id_site_id
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

CREATE OR REPLACE FUNCTION usp_site_app_count_app_id_site_id
(
    in_app_id uuid = NULL
    , in_site_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "site_app"
    WHERE 1=1
    AND "app_id" = in_app_id
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: SiteApp - site_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_app_browse_filter
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

CREATE OR REPLACE FUNCTION usp_site_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "site_app_result"
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
    || ', "site_id"'
    || ', "type"'
    || ', "app_id"'
    || ' FROM "site_app" WHERE 1=1 ';
    
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
    || ', "site_id" '
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
-- MODEL: SiteApp - site_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_app_set_uuid
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

CREATE OR REPLACE FUNCTION usp_site_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
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
                    FROM  "site_app"  
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
                    UPDATE "site_app" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "site_id" = in_site_id
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
                    INSERT INTO "site_app"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "site_id"
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
                        , in_site_id
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

DROP FUNCTION IF EXISTS usp_site_app_set_app_id_site_id
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

CREATE OR REPLACE FUNCTION usp_site_app_set_app_id_site_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
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
                    FROM  "site_app"  
                    WHERE 1=1
                    AND "app_id" = in_app_id
                    AND "site_id" = in_site_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "site_app" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "site_id" = in_site_id
                        , "type" = in_type
                        , "app_id" = in_app_id
                    WHERE 1=1
                    AND "app_id" = in_app_id
                    AND "site_id" = in_site_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "site_app"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "site_id"
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
                        , in_site_id
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
-- MODEL: SiteApp - site_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_app_del_uuid
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

CREATE OR REPLACE FUNCTION usp_site_app_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "site_app"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_site_app_del_app_id_site_id
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

CREATE OR REPLACE FUNCTION usp_site_app_del_app_id_site_id
(
    in_app_id uuid = NULL
    , in_site_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "site_app"
    WHERE 1=1                        
    AND "app_id" = in_app_id
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: SiteApp - site_app

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_site_app_get
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

CREATE OR REPLACE FUNCTION usp_site_app_get
(
)                        
RETURNS setof "site_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "app_id"
    FROM "site_app"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_get_uuid
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

CREATE OR REPLACE FUNCTION usp_site_app_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "site_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "app_id"
    FROM "site_app"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_get_app_id
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

CREATE OR REPLACE FUNCTION usp_site_app_get_app_id
(
    in_app_id uuid = NULL
)
RETURNS setof "site_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "app_id"
    FROM "site_app"
    WHERE 1=1
    AND "app_id" = in_app_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_get_site_id
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

CREATE OR REPLACE FUNCTION usp_site_app_get_site_id
(
    in_site_id uuid = NULL
)
RETURNS setof "site_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "app_id"
    FROM "site_app"
    WHERE 1=1
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_site_app_get_app_id_site_id
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

CREATE OR REPLACE FUNCTION usp_site_app_get_app_id_site_id
(
    in_app_id uuid = NULL
    , in_site_id uuid = NULL
)
RETURNS setof "site_app"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
        , "site_id"
        , "type"
        , "app_id"
    FROM "site_app"
    WHERE 1=1
    AND "app_id" = in_app_id
    AND "site_id" = in_site_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Photo - photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_photo_count
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "photo"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_count_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_count_uuid
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
    FROM "photo"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_count_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_count_external_id
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
    FROM "photo"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_count_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_count_url
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
    FROM "photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_count_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_count_url_external_id
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
    FROM "photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_count_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_count_uuid_external_id
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
    FROM "photo"
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
-- MODEL: Photo - photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_photo_browse_filter
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "photo_result"
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
    || ', "data"'
    || ', "third_party_url"'
    || ', "third_party_id"'
    || ', "content_type"'
    || ', "external_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "photo" WHERE 1=1 ';
    
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
    || ', "data" '
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
-- MODEL: Photo - photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_photo_set_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_uuid
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
    , in_data varchar = NULL
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
                    FROM  "photo"  
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
                    UPDATE "photo" 
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
                        , "data" = in_data
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
                    INSERT INTO "photo"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_photo_set_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_external_id
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
    , in_data varchar = NULL
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
                    FROM  "photo"  
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
                    UPDATE "photo" 
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
                        , "data" = in_data
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
                    INSERT INTO "photo"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_photo_set_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_url
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
    , in_data varchar = NULL
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
                    FROM  "photo"  
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
                    UPDATE "photo" 
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
                        , "data" = in_data
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
                    INSERT INTO "photo"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_photo_set_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_url_external_id
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
    , in_data varchar = NULL
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
                    FROM  "photo"  
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
                    UPDATE "photo" 
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
                        , "data" = in_data
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
                    INSERT INTO "photo"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_photo_set_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_uuid_external_id
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
    , in_data varchar = NULL
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
                    FROM  "photo"  
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
                    UPDATE "photo" 
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
                        , "data" = in_data
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
                    INSERT INTO "photo"
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
                        , "data"
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
                        , in_data
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
-- MODEL: Photo - photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_photo_del_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "photo"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_photo_del_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_del_external_id
(
    in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "photo"
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_photo_del_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_del_url
(
    in_url varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "photo"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_photo_del_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_del_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "photo"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_photo_del_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_del_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "photo"
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
-- MODEL: Photo - photo

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_photo_get
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_get
(
)                        
RETURNS setof "photo"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "photo"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_get_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "photo"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "photo"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_get_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_get_external_id
(
    in_external_id uuid = NULL
)
RETURNS setof "photo"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "photo"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_get_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_get_url
(
    in_url varchar (500) = NULL
)
RETURNS setof "photo"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_get_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_get_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "photo"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "photo"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_photo_get_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_get_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "photo"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "photo"
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
-- MODEL: Video - video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_video_count
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "video"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_count_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_count_uuid
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
    FROM "video"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_count_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_count_external_id
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
    FROM "video"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_count_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_count_url
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
    FROM "video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_count_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_count_url_external_id
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
    FROM "video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_count_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_count_uuid_external_id
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
    FROM "video"
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
-- MODEL: Video - video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_video_browse_filter
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "video_result"
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
    || ', "data"'
    || ', "third_party_url"'
    || ', "third_party_id"'
    || ', "content_type"'
    || ', "external_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "description"'
    || ' FROM "video" WHERE 1=1 ';
    
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
    || ', "data" '
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
-- MODEL: Video - video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_video_set_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_uuid
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
    , in_data varchar = NULL
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
                    FROM  "video"  
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
                    UPDATE "video" 
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
                        , "data" = in_data
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
                    INSERT INTO "video"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_video_set_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_external_id
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
    , in_data varchar = NULL
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
                    FROM  "video"  
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
                    UPDATE "video" 
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
                        , "data" = in_data
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
                    INSERT INTO "video"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_video_set_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_url
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
    , in_data varchar = NULL
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
                    FROM  "video"  
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
                    UPDATE "video" 
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
                        , "data" = in_data
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
                    INSERT INTO "video"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_video_set_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_url_external_id
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
    , in_data varchar = NULL
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
                    FROM  "video"  
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
                    UPDATE "video" 
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
                        , "data" = in_data
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
                    INSERT INTO "video"
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
                        , "data"
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
                        , in_data
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

DROP FUNCTION IF EXISTS usp_video_set_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_uuid_external_id
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
    , in_data varchar = NULL
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
                    FROM  "video"  
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
                    UPDATE "video" 
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
                        , "data" = in_data
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
                    INSERT INTO "video"
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
                        , "data"
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
                        , in_data
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
-- MODEL: Video - video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_video_del_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "video"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_video_del_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_del_external_id
(
    in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "video"
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_video_del_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_del_url
(
    in_url varchar (500) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "video"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_video_del_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_del_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "video"
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_video_del_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_del_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "video"
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
-- MODEL: Video - video

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_video_get
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_get
(
)                        
RETURNS setof "video"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "video"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_get_uuid
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "video"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "video"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_get_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_get_external_id
(
    in_external_id uuid = NULL
)
RETURNS setof "video"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "video"
    WHERE 1=1
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_get_url
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_get_url
(
    in_url varchar (500) = NULL
)
RETURNS setof "video"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_get_url_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_get_url_external_id
(
    in_url varchar (500) = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "video"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "video"
    WHERE 1=1
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_video_get_uuid_external_id
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
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_get_uuid_external_id
(
    in_uuid uuid = NULL
    , in_external_id uuid = NULL
)
RETURNS setof "video"
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
        , "data"
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "external_id"
        , "active"
        , "date_created"
        , "type"
        , "description"
    FROM "video"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;


