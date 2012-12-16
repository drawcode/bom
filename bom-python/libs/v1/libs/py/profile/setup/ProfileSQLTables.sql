-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------
-- TABLES

/*
        
DROP TABLE IF EXISTS "profile" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_type" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_attribute" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_attribute_text" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_attribute_data" CASCADE;
    
        
DROP TABLE IF EXISTS "profile_device" CASCADE;
    
        
DROP TABLE IF EXISTS "country" CASCADE;
    
        
DROP TABLE IF EXISTS "state" CASCADE;
    
        
DROP TABLE IF EXISTS "city" CASCADE;
    
        
DROP TABLE IF EXISTS "postal_code" CASCADE;
    
*/

        
CREATE TABLE "profile" 
(
    "status" varchar (50)
    , "username" varchar (255)
    , "hash" varchar (255)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_date_modified DEFAULT GETDATE()
    , "active" boolean
                --CONSTRAINT DF_profile_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_date_created DEFAULT GETDATE()
);

ALTER TABLE "profile" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_type" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_type_date_modified DEFAULT GETDATE()
    , "type_id" uuid
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_profile_type_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_type_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "profile_type" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_attribute" 
(
    "status" varchar (50)
    , "sort" INTEGER
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_attribute_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "group" INTEGER
    , "active" boolean
                --CONSTRAINT DF_profile_attribute_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_attribute_date_created DEFAULT GETDATE()
    , "type" INTEGER
    , "order" INTEGER
    , "description" varchar (255)
);

ALTER TABLE "profile_attribute" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_attribute_text" 
(
    "status" varchar (50)
    , "sort" INTEGER
    , "group" INTEGER
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_attribute_text_date_modified DEFAULT GETDATE()
    , "profile_id" uuid
    , "attribute_id" uuid
    , "attribute_value" varchar (1000)
    , "active" boolean
                --CONSTRAINT DF_profile_attribute_text_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_attribute_text_date_created DEFAULT GETDATE()
    , "type" INTEGER
    , "order" INTEGER
);

ALTER TABLE "profile_attribute_text" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_attribute_data" 
(
    "status" varchar (50)
    , "sort" INTEGER
    , "group" INTEGER
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_attribute_data_date_modified DEFAULT GETDATE()
    , "profile_id" uuid
    , "attribute_id" uuid
    , "attribute_value" varchar
    , "active" boolean
                --CONSTRAINT DF_profile_attribute_data_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_attribute_data_date_created DEFAULT GETDATE()
    , "type" INTEGER
    , "order" INTEGER
);

ALTER TABLE "profile_attribute_data" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "profile_device" 
(
    "status" varchar (50)
    , "uuid" uuid NOT NULL
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_profile_device_date_modified DEFAULT GETDATE()
    , "profile_id" uuid NOT NULL
    , "token" varchar (128)
    , "secret" varchar (128)
    , "device_version" varchar (128)
    , "device_type" varchar (128)
    , "active" boolean
                --CONSTRAINT DF_profile_device_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_profile_device_date_created DEFAULT GETDATE()
    , "device_os" varchar (128)
    , "device_id" varchar (128) NOT NULL
    , "device_platform" varchar (128)
);

ALTER TABLE "profile_device" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "country" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_country_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_country_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_country_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "country" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "state" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_state_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_state_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_state_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "state" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "city" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_city_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_city_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_city_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "city" ADD PRIMARY KEY ("uuid");
    
        
CREATE TABLE "postal_code" 
(
    "status" varchar (50)
    , "code" varchar (255)
    , "display_name" varchar (255)
    , "name" varchar (255)
    , "date_modified" TIMESTAMP
                --CONSTRAINT DF_postal_code_date_modified DEFAULT GETDATE()
    , "uuid" uuid NOT NULL
    , "active" boolean
                --CONSTRAINT DF_postal_code_active_bool DEFAULT 1
    , "date_created" TIMESTAMP
                --CONSTRAINT DF_postal_code_date_created DEFAULT GETDATE()
    , "description" varchar (255)
);

ALTER TABLE "postal_code" ADD PRIMARY KEY ("uuid");
    


-- result / return types
/*
        
DROP type IF EXISTS "profile_result" CASCADE;
    
        
DROP type IF EXISTS "profile_type_result" CASCADE;
    
        
DROP type IF EXISTS "profile_attribute_result" CASCADE;
    
        
DROP type IF EXISTS "profile_attribute_text_result" CASCADE;
    
        
DROP type IF EXISTS "profile_attribute_data_result" CASCADE;
    
        
DROP type IF EXISTS "profile_device_result" CASCADE;
    
        
DROP type IF EXISTS "country_result" CASCADE;
    
        
DROP type IF EXISTS "state_result" CASCADE;
    
        
DROP type IF EXISTS "city_result" CASCADE;
    
        
DROP type IF EXISTS "postal_code_result" CASCADE;
    
*/

CREATE TYPE "profile_result" as
(
    total_rows bigint
    , "status" varchar
    , "username" varchar
    , "hash" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "active" boolean
    , "date_created" TIMESTAMP
);    
CREATE TYPE "profile_type_result" as
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
CREATE TYPE "profile_attribute_result" as
(
    total_rows bigint
    , "status" varchar
    , "sort" INTEGER
    , "code" varchar
    , "display_name" varchar
    , "name" varchar
    , "date_modified" TIMESTAMP
    , "uuid" uuid
    , "group" INTEGER
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" INTEGER
    , "order" INTEGER
    , "description" varchar
);    
CREATE TYPE "profile_attribute_text_result" as
(
    total_rows bigint
    , "status" varchar
    , "sort" INTEGER
    , "group" INTEGER
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_id" uuid
    , "attribute_id" uuid
    , "attribute_value" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" INTEGER
    , "order" INTEGER
);    
CREATE TYPE "profile_attribute_data_result" as
(
    total_rows bigint
    , "status" varchar
    , "sort" INTEGER
    , "group" INTEGER
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_id" uuid
    , "attribute_id" uuid
    , "attribute_value" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "type" INTEGER
    , "order" INTEGER
);    
CREATE TYPE "profile_device_result" as
(
    total_rows bigint
    , "status" varchar
    , "uuid" uuid
    , "date_modified" TIMESTAMP
    , "profile_id" uuid
    , "token" varchar
    , "secret" varchar
    , "device_version" varchar
    , "device_type" varchar
    , "active" boolean
    , "date_created" TIMESTAMP
    , "device_os" varchar
    , "device_id" varchar
    , "device_platform" varchar
);    
CREATE TYPE "country_result" as
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
CREATE TYPE "state_result" as
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
CREATE TYPE "city_result" as
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
CREATE TYPE "postal_code_result" as
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
