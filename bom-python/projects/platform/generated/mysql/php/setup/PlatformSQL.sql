-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------

DELIMITER $$

DROP PROCEDURE IF EXISTS drop_index_if_exists $$
CREATE PROCEDURE drop_index_if_exists(in theTable varchar(128), in theIndexName varchar(128) )
BEGIN
 IF((SELECT COUNT(*) AS index_exists FROM information_schema.statistics WHERE TABLE_SCHEMA = DATABASE() and table_name =
theTable AND index_name = theIndexName) > 0) THEN
   SET @s = CONCAT('DROP INDEX `' , theIndexName , '` ON `' , theTable, '`');
   PREPARE stmt FROM @s;
   EXECUTE stmt;
 END IF;
END $$

DELIMITER ;

-- TABLES
/*
        
DROP TABLE IF EXISTS `app` CASCADE;
    
        
DROP TABLE IF EXISTS `app_type` CASCADE;
    
        
DROP TABLE IF EXISTS `site` CASCADE;
    
        
DROP TABLE IF EXISTS `site_type` CASCADE;
    
        
DROP TABLE IF EXISTS `org` CASCADE;
    
        
DROP TABLE IF EXISTS `org_type` CASCADE;
    
        
DROP TABLE IF EXISTS `content_item` CASCADE;
    
        
DROP TABLE IF EXISTS `content_item_type` CASCADE;
    
        
DROP TABLE IF EXISTS `content_page` CASCADE;
    
        
DROP TABLE IF EXISTS `message` CASCADE;
    
        
DROP TABLE IF EXISTS `offer` CASCADE;
    
        
DROP TABLE IF EXISTS `offer_type` CASCADE;
    
        
DROP TABLE IF EXISTS `offer_location` CASCADE;
    
        
DROP TABLE IF EXISTS `offer_category` CASCADE;
    
        
DROP TABLE IF EXISTS `offer_category_tree` CASCADE;
    
        
DROP TABLE IF EXISTS `offer_category_assoc` CASCADE;
    
        
DROP TABLE IF EXISTS `offer_game_location` CASCADE;
    
        
DROP TABLE IF EXISTS `event_info` CASCADE;
    
        
DROP TABLE IF EXISTS `event_location` CASCADE;
    
        
DROP TABLE IF EXISTS `event_category` CASCADE;
    
        
DROP TABLE IF EXISTS `event_category_tree` CASCADE;
    
        
DROP TABLE IF EXISTS `event_category_assoc` CASCADE;
    
        
DROP TABLE IF EXISTS `channel` CASCADE;
    
        
DROP TABLE IF EXISTS `channel_type` CASCADE;
    
        
DROP TABLE IF EXISTS `question` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_offer` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_app` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_org` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_question` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_channel` CASCADE;
    
        
DROP TABLE IF EXISTS `org_site` CASCADE;
    
        
DROP TABLE IF EXISTS `site_app` CASCADE;
    
        
DROP TABLE IF EXISTS `photo` CASCADE;
    
        
DROP TABLE IF EXISTS `video` CASCADE;
    
*/

        
CREATE TABLE `app` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `type_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `platform` VARCHAR (255)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `app` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `app_type` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `app_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `site` 
(
    `status` VARCHAR (255)
    , `domain` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `type_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `site` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `site_type` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `site_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `org` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `type_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `org` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `org_type` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `org_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `content_item` 
(
    `status` VARCHAR (255)
    , `type_id` BINARY(16)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `date_end` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `date_start` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `uuid` BINARY(16) 
    , `path` VARCHAR (500)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `content_item` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `content_item_type` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `content_item_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `content_page` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `date_end` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `date_start` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `site_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `template` TEXT
    , `path` VARCHAR (500)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `content_page` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `message` 
(
    `status` VARCHAR (255)
    , `profile_from_name` VARCHAR (500)
    , `read` int
                DEFAULT 1
    , `profile_from_id` BINARY(16)
    , `profile_to_token` VARCHAR (500)
    , `app_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `data` TEXT
    , `subject` VARCHAR (500)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `profile_to_id` BINARY(16)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `profile_to_name` VARCHAR (500)
    , `type` VARCHAR (500)
    , `sent` int
                DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `message` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `offer` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `url` VARCHAR (500)
    , `data` TEXT
    , `type_id` BINARY(16) 
    , `org_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `usage_count` INTEGER
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `offer` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `offer_type` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `offer_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `offer_location` 
(
    `status` VARCHAR (255)
    , `fax` VARCHAR (30)
    , `code` VARCHAR (255)
    , `description` VARCHAR (255)
    , `address1` VARCHAR (1000)
    , `twitter` VARCHAR (50)
    , `phone` VARCHAR (30)
    , `postal_code` VARCHAR (30)
    , `offer_id` BINARY(16)
    , `country_code` VARCHAR (255)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `active` int
                DEFAULT 1
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `state_province` VARCHAR (255)
    , `city` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `dob` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `date_start` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `longitude` double
    , `email` VARCHAR (255)
    , `date_end` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `latitude` double
    , `facebook` VARCHAR (255)
    , `type` VARCHAR (500)
    , `address2` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `offer_location` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `offer_category` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `type_id` BINARY(16) 
    , `org_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `offer_category` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `offer_category_tree` 
(
    `status` VARCHAR (255)
    , `parent_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `category_id` BINARY(16) 
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `offer_category_tree` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `offer_category_assoc` 
(
    `status` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `offer_id` BINARY(16) 
    , `category_id` BINARY(16) 
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `offer_category_assoc` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `offer_game_location` 
(
    `status` VARCHAR (255)
    , `game_location_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `offer_id` BINARY(16)
    , `type_id` BINARY(16)
    , `type` VARCHAR (500)
    , `data` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `offer_game_location` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `event_info` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `url` VARCHAR (500)
    , `data` TEXT
    , `org_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `usage_count` INTEGER
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `event_info` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `event_location` 
(
    `status` VARCHAR (255)
    , `fax` VARCHAR (30)
    , `code` VARCHAR (255)
    , `description` VARCHAR (255)
    , `address1` VARCHAR (1000)
    , `twitter` VARCHAR (50)
    , `phone` VARCHAR (30)
    , `postal_code` VARCHAR (30)
    , `country_code` VARCHAR (255)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `active` int
                DEFAULT 1
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `state_province` VARCHAR (255)
    , `city` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `dob` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `date_start` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `longitude` double
    , `email` VARCHAR (255)
    , `event_id` BINARY(16)
    , `date_end` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `latitude` double
    , `facebook` VARCHAR (255)
    , `type` VARCHAR (500)
    , `address2` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `event_location` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `event_category` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `type_id` BINARY(16) 
    , `org_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `event_category` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `event_category_tree` 
(
    `status` VARCHAR (255)
    , `parent_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `category_id` BINARY(16) 
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `event_category_tree` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `event_category_assoc` 
(
    `status` VARCHAR (255)
    , `event_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `category_id` BINARY(16) 
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `event_category_assoc` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `channel` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `type_id` BINARY(16) 
    , `org_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `channel` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `channel_type` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (50) 
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `channel_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `question` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `org_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `choices` TEXT
    , `channel_id` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (50) 
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `question` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_offer` 
(
    `status` VARCHAR (255)
    , `redeem_code` VARCHAR (128) 
    , `offer_id` BINARY(16) 
    , `profile_id` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `redeemed` VARCHAR (50) 
    , `url` VARCHAR (50)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_offer` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_app` 
(
    `status` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `profile_id` BINARY(16)
    , `type` VARCHAR (500)
    , `app_id` BINARY(16)
    , `data` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_app` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_org` 
(
    `status` VARCHAR (255)
    , `type_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `profile_id` BINARY(16)
    , `type` VARCHAR (500)
    , `org_id` BINARY(16)
    , `data` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_org` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_question` 
(
    `status` VARCHAR (255)
    , `profile_id` BINARY(16) 
    , `active` int
                DEFAULT 1
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `org_id` BINARY(16) 
    , `channel_id` BINARY(16) 
    , `answer` VARCHAR (1000) 
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `question_id` BINARY(16) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_question` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_channel` 
(
    `status` VARCHAR (255)
    , `channel_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `profile_id` BINARY(16) 
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_channel` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `org_site` 
(
    `status` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `site_id` BINARY(16) 
    , `type` VARCHAR (500)
    , `org_id` BINARY(16) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `org_site` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `site_app` 
(
    `status` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `site_id` BINARY(16) 
    , `type` VARCHAR (500)
    , `app_id` BINARY(16) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `site_app` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `photo` 
(
    `status` VARCHAR (255)
    , `third_party_oembed` VARCHAR (500)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `url` VARCHAR (500)
    , `third_party_data` VARCHAR (500)
    , `uuid` BINARY(16) 
    , `data` TEXT
    , `third_party_url` VARCHAR (500)
    , `third_party_id` VARCHAR (500)
    , `content_type` VARCHAR (100)
    , `external_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `photo` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `video` 
(
    `status` VARCHAR (255)
    , `third_party_oembed` VARCHAR (500)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `url` VARCHAR (500)
    , `third_party_data` VARCHAR (500)
    , `uuid` BINARY(16) 
    , `data` TEXT
    , `third_party_url` VARCHAR (500)
    , `third_party_id` VARCHAR (500)
    , `content_type` VARCHAR (100)
    , `external_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `video` ADD PRIMARY KEY (`uuid`);
    

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_content_page_path','content_page');
                
CREATE INDEX `IX_content_page_path` ON `content_page` 
(
                    
    `path` ASC
);
                
CALL drop_index_if_exists('IX_content_page_path_site_id','content_page');
                
CREATE INDEX `IX_content_page_path_site_id` ON `content_page` 
(
                    
    `path` ASC
                    
    , `site_id` ASC
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

                       
DROP PROCEDURE IF EXISTS `usp_app_count`;
delimiter $$
CREATE PROCEDURE `usp_app_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_app_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_count_code`;
delimiter $$
CREATE PROCEDURE `usp_app_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_count_type_id`;
delimiter $$
CREATE PROCEDURE `usp_app_count_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_count_code_type_id`;
delimiter $$
CREATE PROCEDURE `usp_app_count_code_type_id`
(
    in_code VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_count_platform_type_id`;
delimiter $$
CREATE PROCEDURE `usp_app_count_platform_type_id`
(
    in_platform VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app`
    WHERE 1=1
    AND lower(`platform`) = lower(in_platform)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_count_platform`;
delimiter $$
CREATE PROCEDURE `usp_app_count_platform`
(
    in_platform VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app`
    WHERE 1=1
    AND lower(`platform`) = lower(in_platform)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: App - app

                       
DROP PROCEDURE IF EXISTS `usp_app_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_app_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `platform`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `app` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: App - app

                       
DROP PROCEDURE IF EXISTS `usp_app_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_app_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_type_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `app`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `app` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `type_id` = in_type_id
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `app`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `type_id`
                        , `uuid`
                        , `platform`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_set_code`;
delimiter $$
CREATE PROCEDURE `usp_app_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_type_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `app`  
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `app` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `type_id` = in_type_id
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `app`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `type_id`
                        , `uuid`
                        , `platform`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: App - app

                       
DROP PROCEDURE IF EXISTS `usp_app_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_app_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `app`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_app_del_code`;

delimiter $$
CREATE PROCEDURE `usp_app_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `app`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: App - app

                       
DROP PROCEDURE IF EXISTS `usp_app_get`;

delimiter $$
CREATE PROCEDURE `usp_app_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `platform`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_app_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `platform`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_get_code`;

delimiter $$
CREATE PROCEDURE `usp_app_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `platform`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_get_type_id`;

delimiter $$
CREATE PROCEDURE `usp_app_get_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `platform`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_get_code_type_id`;

delimiter $$
CREATE PROCEDURE `usp_app_get_code_type_id`
(
    in_code VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `platform`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_get_platform_type_id`;

delimiter $$
CREATE PROCEDURE `usp_app_get_platform_type_id`
(
    in_platform VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `platform`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app`
    WHERE 1=1
    AND lower(`platform`) = lower(in_platform)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_get_platform`;

delimiter $$
CREATE PROCEDURE `usp_app_get_platform`
(
    in_platform VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `platform`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app`
    WHERE 1=1
    AND lower(`platform`) = lower(in_platform)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: AppType - app_type

                       
DROP PROCEDURE IF EXISTS `usp_app_type_count`;
delimiter $$
CREATE PROCEDURE `usp_app_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_app_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_type_count_code`;
delimiter $$
CREATE PROCEDURE `usp_app_type_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `app_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: AppType - app_type

                       
DROP PROCEDURE IF EXISTS `usp_app_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_app_type_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `app_type` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: AppType - app_type

                       
DROP PROCEDURE IF EXISTS `usp_app_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_app_type_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `app_type`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `app_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `app_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_type_set_code`;
delimiter $$
CREATE PROCEDURE `usp_app_type_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `app_type`  
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `app_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `app_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: AppType - app_type

                       
DROP PROCEDURE IF EXISTS `usp_app_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_app_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `app_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_app_type_del_code`;

delimiter $$
CREATE PROCEDURE `usp_app_type_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `app_type`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: AppType - app_type

                       
DROP PROCEDURE IF EXISTS `usp_app_type_get`;

delimiter $$
CREATE PROCEDURE `usp_app_type_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_app_type_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_app_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_app_type_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `app_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Site - site

                       
DROP PROCEDURE IF EXISTS `usp_site_count`;
delimiter $$
CREATE PROCEDURE `usp_site_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_site_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_count_code`;
delimiter $$
CREATE PROCEDURE `usp_site_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_count_type_id`;
delimiter $$
CREATE PROCEDURE `usp_site_count_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_count_code_type_id`;
delimiter $$
CREATE PROCEDURE `usp_site_count_code_type_id`
(
    in_code VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_count_domain_type_id`;
delimiter $$
CREATE PROCEDURE `usp_site_count_domain_type_id`
(
    in_domain VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site`
    WHERE 1=1
    AND lower(`domain`) = lower(in_domain)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_count_domain`;
delimiter $$
CREATE PROCEDURE `usp_site_count_domain`
(
    in_domain VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site`
    WHERE 1=1
    AND lower(`domain`) = lower(in_domain)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Site - site

                       
DROP PROCEDURE IF EXISTS `usp_site_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_site_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `domain`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `site` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Site - site

                       
DROP PROCEDURE IF EXISTS `usp_site_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_site_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_domain VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_type_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `site`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `site` 
                    SET
                        `status` = in_status
                        , `domain` = in_domain
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `type_id` = in_type_id
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `site`
                    (
                        `status`
                        , `domain`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `type_id`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_set_code`;
delimiter $$
CREATE PROCEDURE `usp_site_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_domain VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_type_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `site`  
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `site` 
                    SET
                        `status` = in_status
                        , `domain` = in_domain
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `type_id` = in_type_id
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `site`
                    (
                        `status`
                        , `domain`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `type_id`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Site - site

                       
DROP PROCEDURE IF EXISTS `usp_site_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_site_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `site`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_site_del_code`;

delimiter $$
CREATE PROCEDURE `usp_site_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `site`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Site - site

                       
DROP PROCEDURE IF EXISTS `usp_site_get`;

delimiter $$
CREATE PROCEDURE `usp_site_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `domain`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_site_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `domain`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_get_code`;

delimiter $$
CREATE PROCEDURE `usp_site_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `domain`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_get_type_id`;

delimiter $$
CREATE PROCEDURE `usp_site_get_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `domain`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_get_code_type_id`;

delimiter $$
CREATE PROCEDURE `usp_site_get_code_type_id`
(
    in_code VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `domain`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_get_domain_type_id`;

delimiter $$
CREATE PROCEDURE `usp_site_get_domain_type_id`
(
    in_domain VARCHAR (255) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `domain`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site`
    WHERE 1=1
    AND lower(`domain`) = lower(in_domain)
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_get_domain`;

delimiter $$
CREATE PROCEDURE `usp_site_get_domain`
(
    in_domain VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `domain`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site`
    WHERE 1=1
    AND lower(`domain`) = lower(in_domain)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: SiteType - site_type

                       
DROP PROCEDURE IF EXISTS `usp_site_type_count`;
delimiter $$
CREATE PROCEDURE `usp_site_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_site_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_type_count_code`;
delimiter $$
CREATE PROCEDURE `usp_site_type_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: SiteType - site_type

                       
DROP PROCEDURE IF EXISTS `usp_site_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_site_type_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `site_type` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: SiteType - site_type

                       
DROP PROCEDURE IF EXISTS `usp_site_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_site_type_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `site_type`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `site_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `site_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_type_set_code`;
delimiter $$
CREATE PROCEDURE `usp_site_type_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `site_type`  
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `site_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `site_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: SiteType - site_type

                       
DROP PROCEDURE IF EXISTS `usp_site_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_site_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `site_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_site_type_del_code`;

delimiter $$
CREATE PROCEDURE `usp_site_type_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `site_type`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: SiteType - site_type

                       
DROP PROCEDURE IF EXISTS `usp_site_type_get`;

delimiter $$
CREATE PROCEDURE `usp_site_type_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_site_type_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_site_type_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `site_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Org - org

                       
DROP PROCEDURE IF EXISTS `usp_org_count`;
delimiter $$
CREATE PROCEDURE `usp_org_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_org_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_count_code`;
delimiter $$
CREATE PROCEDURE `usp_org_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_count_name`;
delimiter $$
CREATE PROCEDURE `usp_org_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Org - org

                       
DROP PROCEDURE IF EXISTS `usp_org_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_org_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `org` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Org - org

                       
DROP PROCEDURE IF EXISTS `usp_org_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_org_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_type_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `org`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `org` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `type_id` = in_type_id
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `org`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `type_id`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Org - org

                       
DROP PROCEDURE IF EXISTS `usp_org_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_org_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `org`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Org - org

                       
DROP PROCEDURE IF EXISTS `usp_org_get`;

delimiter $$
CREATE PROCEDURE `usp_org_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `org`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_org_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `org`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_get_code`;

delimiter $$
CREATE PROCEDURE `usp_org_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `org`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_get_name`;

delimiter $$
CREATE PROCEDURE `usp_org_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `type_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `org`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OrgType - org_type

                       
DROP PROCEDURE IF EXISTS `usp_org_type_count`;
delimiter $$
CREATE PROCEDURE `usp_org_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_org_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_type_count_code`;
delimiter $$
CREATE PROCEDURE `usp_org_type_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OrgType - org_type

                       
DROP PROCEDURE IF EXISTS `usp_org_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_org_type_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `org_type` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OrgType - org_type

                       
DROP PROCEDURE IF EXISTS `usp_org_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_org_type_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `org_type`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `org_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `org_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_type_set_code`;
delimiter $$
CREATE PROCEDURE `usp_org_type_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `org_type`  
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `org_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `org_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OrgType - org_type

                       
DROP PROCEDURE IF EXISTS `usp_org_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_org_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `org_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_org_type_del_code`;

delimiter $$
CREATE PROCEDURE `usp_org_type_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `org_type`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OrgType - org_type

                       
DROP PROCEDURE IF EXISTS `usp_org_type_get`;

delimiter $$
CREATE PROCEDURE `usp_org_type_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `org_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_org_type_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `org_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_org_type_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `org_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ContentItem - content_item

                       
DROP PROCEDURE IF EXISTS `usp_content_item_count`;
delimiter $$
CREATE PROCEDURE `usp_content_item_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_content_item_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_count_code`;
delimiter $$
CREATE PROCEDURE `usp_content_item_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_count_name`;
delimiter $$
CREATE PROCEDURE `usp_content_item_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_count_path`;
delimiter $$
CREATE PROCEDURE `usp_content_item_count_path`
(
    in_path VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item`
    WHERE 1=1
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentItem - content_item

                       
DROP PROCEDURE IF EXISTS `usp_content_item_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_content_item_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `date_end`');
    SET @sfields = CONCAT(@sfields, ', `date_start`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `path`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `content_item` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ContentItem - content_item

                       
DROP PROCEDURE IF EXISTS `usp_content_item_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_content_item_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_type_id BINARY(16) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_date_end TIMESTAMP 
    , in_date_start TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_path VARCHAR (500) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `content_item`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `content_item` 
                    SET
                        `status` = in_status
                        , `type_id` = in_type_id
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `date_end` = in_date_end
                        , `date_start` = in_date_start
                        , `uuid` = in_uuid
                        , `path` = in_path
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `content_item`
                    (
                        `status`
                        , `type_id`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `date_end`
                        , `date_start`
                        , `uuid`
                        , `path`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ContentItem - content_item

                       
DROP PROCEDURE IF EXISTS `usp_content_item_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_content_item_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `content_item`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_content_item_del_path`;

delimiter $$
CREATE PROCEDURE `usp_content_item_del_path`
(
    in_path VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `content_item`
    WHERE 1=1                        
    AND lower("path") = lower(in_path)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentItem - content_item

                       
DROP PROCEDURE IF EXISTS `usp_content_item_get`;

delimiter $$
CREATE PROCEDURE `usp_content_item_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `type_id`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `uuid`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_content_item_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `uuid`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_get_code`;

delimiter $$
CREATE PROCEDURE `usp_content_item_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `uuid`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_get_name`;

delimiter $$
CREATE PROCEDURE `usp_content_item_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `uuid`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_get_path`;

delimiter $$
CREATE PROCEDURE `usp_content_item_get_path`
(
    in_path VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `uuid`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item`
    WHERE 1=1
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

                       
DROP PROCEDURE IF EXISTS `usp_content_item_type_count`;
delimiter $$
CREATE PROCEDURE `usp_content_item_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_content_item_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_type_count_code`;
delimiter $$
CREATE PROCEDURE `usp_content_item_type_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_item_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

                       
DROP PROCEDURE IF EXISTS `usp_content_item_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_content_item_type_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `content_item_type` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

                       
DROP PROCEDURE IF EXISTS `usp_content_item_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_content_item_type_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `content_item_type`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `content_item_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `content_item_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_type_set_code`;
delimiter $$
CREATE PROCEDURE `usp_content_item_type_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `content_item_type`  
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `content_item_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`code`) = lower(in_code)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `content_item_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

                       
DROP PROCEDURE IF EXISTS `usp_content_item_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_content_item_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `content_item_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_content_item_type_del_code`;

delimiter $$
CREATE PROCEDURE `usp_content_item_type_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `content_item_type`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type

                       
DROP PROCEDURE IF EXISTS `usp_content_item_type_get`;

delimiter $$
CREATE PROCEDURE `usp_content_item_type_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_content_item_type_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_item_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_content_item_type_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_item_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ContentPage - content_page

                       
DROP PROCEDURE IF EXISTS `usp_content_page_count`;
delimiter $$
CREATE PROCEDURE `usp_content_page_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_page`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_content_page_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_page`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_count_code`;
delimiter $$
CREATE PROCEDURE `usp_content_page_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_page`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_count_name`;
delimiter $$
CREATE PROCEDURE `usp_content_page_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_page`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_count_path`;
delimiter $$
CREATE PROCEDURE `usp_content_page_count_path`
(
    in_path VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `content_page`
    WHERE 1=1
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentPage - content_page

                       
DROP PROCEDURE IF EXISTS `usp_content_page_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_content_page_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `date_end`');
    SET @sfields = CONCAT(@sfields, ', `date_start`');
    SET @sfields = CONCAT(@sfields, ', `site_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `template`');
    SET @sfields = CONCAT(@sfields, ', `path`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `content_page` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ContentPage - content_page

                       
DROP PROCEDURE IF EXISTS `usp_content_page_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_content_page_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_date_end TIMESTAMP 
    , in_date_start TIMESTAMP 
    , in_site_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_template TEXT 
    , in_path VARCHAR (500) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `content_page`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `content_page` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `date_end` = in_date_end
                        , `date_start` = in_date_start
                        , `site_id` = in_site_id
                        , `uuid` = in_uuid
                        , `template` = in_template
                        , `path` = in_path
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `content_page`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `date_end`
                        , `date_start`
                        , `site_id`
                        , `uuid`
                        , `template`
                        , `path`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ContentPage - content_page

                       
DROP PROCEDURE IF EXISTS `usp_content_page_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_content_page_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `content_page`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_content_page_del_path_site_id`;

delimiter $$
CREATE PROCEDURE `usp_content_page_del_path_site_id`
(
    in_path VARCHAR (500) 
    , in_site_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `content_page`
    WHERE 1=1                        
    AND lower("path") = lower(in_path)
    AND "site_id" = in_site_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_content_page_del_path`;

delimiter $$
CREATE PROCEDURE `usp_content_page_del_path`
(
    in_path VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `content_page`
    WHERE 1=1                        
    AND lower("path") = lower(in_path)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentPage - content_page

                       
DROP PROCEDURE IF EXISTS `usp_content_page_get`;

delimiter $$
CREATE PROCEDURE `usp_content_page_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `site_id`
        , `uuid`
        , `template`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_page`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_content_page_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `site_id`
        , `uuid`
        , `template`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_page`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_get_code`;

delimiter $$
CREATE PROCEDURE `usp_content_page_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `site_id`
        , `uuid`
        , `template`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_page`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_get_name`;

delimiter $$
CREATE PROCEDURE `usp_content_page_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `site_id`
        , `uuid`
        , `template`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_page`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_get_path`;

delimiter $$
CREATE PROCEDURE `usp_content_page_get_path`
(
    in_path VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `site_id`
        , `uuid`
        , `template`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_page`
    WHERE 1=1
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_get_site_id`;

delimiter $$
CREATE PROCEDURE `usp_content_page_get_site_id`
(
    in_site_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `site_id`
        , `uuid`
        , `template`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_page`
    WHERE 1=1
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_content_page_get_site_id_path`;

delimiter $$
CREATE PROCEDURE `usp_content_page_get_site_id_path`
(
    in_site_id BINARY(16) 
    , in_path VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `date_end`
        , `date_start`
        , `site_id`
        , `uuid`
        , `template`
        , `path`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `content_page`
    WHERE 1=1
    AND `site_id` = in_site_id
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Message - message

                       
DROP PROCEDURE IF EXISTS `usp_message_count`;
delimiter $$
CREATE PROCEDURE `usp_message_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `message`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_message_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_message_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `message`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Message - message

                       
DROP PROCEDURE IF EXISTS `usp_message_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_message_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `profile_from_name`');
    SET @sfields = CONCAT(@sfields, ', `read`');
    SET @sfields = CONCAT(@sfields, ', `profile_from_id`');
    SET @sfields = CONCAT(@sfields, ', `profile_to_token`');
    SET @sfields = CONCAT(@sfields, ', `app_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `subject`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `profile_to_id`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `profile_to_name`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `sent`');
    
    SET @stable = CONCAT('', ' FROM `message` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Message - message

                       
DROP PROCEDURE IF EXISTS `usp_message_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_message_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_profile_from_name VARCHAR (500) 
    , in_read int 
    , in_profile_from_id BINARY(16) 
    , in_profile_to_token VARCHAR (500) 
    , in_app_id BINARY(16) 
    , in_active int 
    , in_data TEXT 
    , in_subject VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_to_id BINARY(16) 
    , in_date_created TIMESTAMP 
    , in_profile_to_name VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_sent int 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `message`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `message` 
                    SET
                        `status` = in_status
                        , `profile_from_name` = in_profile_from_name
                        , `read` = in_read
                        , `profile_from_id` = in_profile_from_id
                        , `profile_to_token` = in_profile_to_token
                        , `app_id` = in_app_id
                        , `active` = in_active
                        , `data` = in_data
                        , `subject` = in_subject
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_to_id` = in_profile_to_id
                        , `date_created` = in_date_created
                        , `profile_to_name` = in_profile_to_name
                        , `type` = in_type
                        , `sent` = in_sent
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `message`
                    (
                        `status`
                        , `profile_from_name`
                        , `read`
                        , `profile_from_id`
                        , `profile_to_token`
                        , `app_id`
                        , `active`
                        , `data`
                        , `subject`
                        , `uuid`
                        , `date_modified`
                        , `profile_to_id`
                        , `date_created`
                        , `profile_to_name`
                        , `type`
                        , `sent`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Message - message

                       
DROP PROCEDURE IF EXISTS `usp_message_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_message_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `message`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Message - message

                       
DROP PROCEDURE IF EXISTS `usp_message_get`;

delimiter $$
CREATE PROCEDURE `usp_message_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `profile_from_name`
        , `read`
        , `profile_from_id`
        , `profile_to_token`
        , `app_id`
        , `active`
        , `data`
        , `subject`
        , `uuid`
        , `date_modified`
        , `profile_to_id`
        , `date_created`
        , `profile_to_name`
        , `type`
        , `sent`
    FROM `message`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_message_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_message_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_from_name`
        , `read`
        , `profile_from_id`
        , `profile_to_token`
        , `app_id`
        , `active`
        , `data`
        , `subject`
        , `uuid`
        , `date_modified`
        , `profile_to_id`
        , `date_created`
        , `profile_to_name`
        , `type`
        , `sent`
    FROM `message`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Offer - offer

                       
DROP PROCEDURE IF EXISTS `usp_offer_count`;
delimiter $$
CREATE PROCEDURE `usp_offer_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_count_code`;
delimiter $$
CREATE PROCEDURE `usp_offer_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_count_name`;
delimiter $$
CREATE PROCEDURE `usp_offer_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Offer - offer

                       
DROP PROCEDURE IF EXISTS `usp_offer_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_offer_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `url`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `usage_count`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `offer` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Offer - offer

                       
DROP PROCEDURE IF EXISTS `usp_offer_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_data TEXT 
    , in_type_id BINARY(16) 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_usage_count INTEGER 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `offer`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `offer` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `data` = in_data
                        , `type_id` = in_type_id
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `usage_count` = in_usage_count
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `offer`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `data`
                        , `type_id`
                        , `org_id`
                        , `uuid`
                        , `usage_count`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Offer - offer

                       
DROP PROCEDURE IF EXISTS `usp_offer_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_offer_del_org_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_del_org_id`
(
    in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer`
    WHERE 1=1                        
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Offer - offer

                       
DROP PROCEDURE IF EXISTS `usp_offer_get`;

delimiter $$
CREATE PROCEDURE `usp_offer_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_get_code`;

delimiter $$
CREATE PROCEDURE `usp_offer_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_get_name`;

delimiter $$
CREATE PROCEDURE `usp_offer_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferType - offer_type

                       
DROP PROCEDURE IF EXISTS `usp_offer_type_count`;
delimiter $$
CREATE PROCEDURE `usp_offer_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_type_count_code`;
delimiter $$
CREATE PROCEDURE `usp_offer_type_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_type_count_name`;
delimiter $$
CREATE PROCEDURE `usp_offer_type_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_type`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferType - offer_type

                       
DROP PROCEDURE IF EXISTS `usp_offer_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_offer_type_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `offer_type` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OfferType - offer_type

                       
DROP PROCEDURE IF EXISTS `usp_offer_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_type_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `offer_type`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `offer_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `offer_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OfferType - offer_type

                       
DROP PROCEDURE IF EXISTS `usp_offer_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferType - offer_type

                       
DROP PROCEDURE IF EXISTS `usp_offer_type_get`;

delimiter $$
CREATE PROCEDURE `usp_offer_type_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_type_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_offer_type_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_type_get_name`;

delimiter $$
CREATE PROCEDURE `usp_offer_type_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_type`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferLocation - offer_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_location_count`;
delimiter $$
CREATE PROCEDURE `usp_offer_location_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_location_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_count_offer_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_location_count_offer_id`
(
    in_offer_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_location`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_count_city`;
delimiter $$
CREATE PROCEDURE `usp_offer_location_count_city`
(
    in_city VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_location`
    WHERE 1=1
    AND lower(`city`) = lower(in_city)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_count_country_code`;
delimiter $$
CREATE PROCEDURE `usp_offer_location_count_country_code`
(
    in_country_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_location`
    WHERE 1=1
    AND lower(`country_code`) = lower(in_country_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_count_postal_code`;
delimiter $$
CREATE PROCEDURE `usp_offer_location_count_postal_code`
(
    in_postal_code VARCHAR (30) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_location`
    WHERE 1=1
    AND lower(`postal_code`) = lower(in_postal_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferLocation - offer_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_location_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `fax`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    SET @sfields = CONCAT(@sfields, ', `address1`');
    SET @sfields = CONCAT(@sfields, ', `twitter`');
    SET @sfields = CONCAT(@sfields, ', `phone`');
    SET @sfields = CONCAT(@sfields, ', `postal_code`');
    SET @sfields = CONCAT(@sfields, ', `offer_id`');
    SET @sfields = CONCAT(@sfields, ', `country_code`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `state_province`');
    SET @sfields = CONCAT(@sfields, ', `city`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `dob`');
    SET @sfields = CONCAT(@sfields, ', `date_start`');
    SET @sfields = CONCAT(@sfields, ', `longitude`');
    SET @sfields = CONCAT(@sfields, ', `email`');
    SET @sfields = CONCAT(@sfields, ', `date_end`');
    SET @sfields = CONCAT(@sfields, ', `latitude`');
    SET @sfields = CONCAT(@sfields, ', `facebook`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `address2`');
    
    SET @stable = CONCAT('', ' FROM `offer_location` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OfferLocation - offer_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_location_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_location_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_fax VARCHAR (30) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_address1 VARCHAR (1000) 
    , in_twitter VARCHAR (50) 
    , in_phone VARCHAR (30) 
    , in_postal_code VARCHAR (30) 
    , in_offer_id BINARY(16) 
    , in_country_code VARCHAR (255) 
    , in_date_created TIMESTAMP 
    , in_active int 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_state_province VARCHAR (255) 
    , in_city VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_dob TIMESTAMP 
    , in_date_start TIMESTAMP 
    , in_longitude double 
    , in_email VARCHAR (255) 
    , in_date_end TIMESTAMP 
    , in_latitude double 
    , in_facebook VARCHAR (255) 
    , in_type VARCHAR (500) 
    , in_address2 VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `offer_location`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `offer_location` 
                    SET
                        `status` = in_status
                        , `fax` = in_fax
                        , `code` = in_code
                        , `description` = in_description
                        , `address1` = in_address1
                        , `twitter` = in_twitter
                        , `phone` = in_phone
                        , `postal_code` = in_postal_code
                        , `offer_id` = in_offer_id
                        , `country_code` = in_country_code
                        , `date_created` = in_date_created
                        , `active` = in_active
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `state_province` = in_state_province
                        , `city` = in_city
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `dob` = in_dob
                        , `date_start` = in_date_start
                        , `longitude` = in_longitude
                        , `email` = in_email
                        , `date_end` = in_date_end
                        , `latitude` = in_latitude
                        , `facebook` = in_facebook
                        , `type` = in_type
                        , `address2` = in_address2
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `offer_location`
                    (
                        `status`
                        , `fax`
                        , `code`
                        , `description`
                        , `address1`
                        , `twitter`
                        , `phone`
                        , `postal_code`
                        , `offer_id`
                        , `country_code`
                        , `date_created`
                        , `active`
                        , `data`
                        , `uuid`
                        , `state_province`
                        , `city`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `dob`
                        , `date_start`
                        , `longitude`
                        , `email`
                        , `date_end`
                        , `latitude`
                        , `facebook`
                        , `type`
                        , `address2`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OfferLocation - offer_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_location_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_location`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferLocation - offer_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_location_get`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `offer_id`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `offer_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `offer_id`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `offer_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_get_offer_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_get_offer_id`
(
    in_offer_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `offer_id`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `offer_location`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_get_city`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_get_city`
(
    in_city VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `offer_id`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `offer_location`
    WHERE 1=1
    AND lower(`city`) = lower(in_city)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_get_country_code`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_get_country_code`
(
    in_country_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `offer_id`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `offer_location`
    WHERE 1=1
    AND lower(`country_code`) = lower(in_country_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_location_get_postal_code`;

delimiter $$
CREATE PROCEDURE `usp_offer_location_get_postal_code`
(
    in_postal_code VARCHAR (30) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `offer_id`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `offer_location`
    WHERE 1=1
    AND lower(`postal_code`) = lower(in_postal_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferCategory - offer_category

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_count`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_count_code`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_count_name`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_count_type_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_count_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_count_org_id_type_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_count_org_id_type_id`
(
    in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferCategory - offer_category

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `offer_category` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OfferCategory - offer_category

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_type_id BINARY(16) 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `offer_category`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `offer_category` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `type_id` = in_type_id
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `offer_category`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `type_id`
                        , `org_id`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OfferCategory - offer_category

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_offer_category_del_code_org_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_del_code_org_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_offer_category_del_code_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_del_code_org_id_type_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    AND "type_id" = in_type_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferCategory - offer_category

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_get`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_category`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_category`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_get_code`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_category`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_get_name`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_category`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_get_type_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_get_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_category`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_get_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_get_org_id_type_id`
(
    in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `offer_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_count`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_tree`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_tree`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_count_parent_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_count_parent_id`
(
    in_parent_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_count_category_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_count_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_tree`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_count_parent_id_category_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_count_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `parent_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `category_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `offer_category_tree` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_parent_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_category_id BINARY(16) 
    , in_type VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `offer_category_tree`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `offer_category_tree` 
                    SET
                        `status` = in_status
                        , `parent_id` = in_parent_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `category_id` = in_category_id
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `offer_category_tree`
                    (
                        `status`
                        , `parent_id`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `category_id`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category_tree`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_del_parent_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_del_parent_id`
(
    in_parent_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category_tree`
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_del_category_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_del_category_id`
(
    in_category_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category_tree`
    WHERE 1=1                        
    AND "category_id" = in_category_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_del_parent_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_del_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category_tree`
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    AND "category_id" = in_category_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_tree_get`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `offer_category_tree`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `offer_category_tree`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_get_parent_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_get_parent_id`
(
    in_parent_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `offer_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_get_category_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_get_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `offer_category_tree`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_tree_get_parent_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_tree_get_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `offer_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_count`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_assoc`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_count_offer_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_count_offer_id`
(
    in_offer_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_count_category_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_count_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_count_offer_id_category_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_count_offer_id_category_id`
(
    in_offer_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `offer_id`');
    SET @sfields = CONCAT(@sfields, ', `category_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `offer_category_assoc` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_offer_id BINARY(16) 
    , in_category_id BINARY(16) 
    , in_type VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `offer_category_assoc`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `offer_category_assoc` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `offer_id` = in_offer_id
                        , `category_id` = in_category_id
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `offer_category_assoc`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `offer_id`
                        , `category_id`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_category_assoc`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_get`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `category_id`
        , `type`
    FROM `offer_category_assoc`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `category_id`
        , `type`
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_get_offer_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_get_offer_id`
(
    in_offer_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `category_id`
        , `type`
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_get_category_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_get_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `category_id`
        , `type`
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_category_assoc_get_offer_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_category_assoc_get_offer_id_category_id`
(
    in_offer_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `category_id`
        , `type`
    FROM `offer_category_assoc`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_game_location_count`;
delimiter $$
CREATE PROCEDURE `usp_offer_game_location_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_game_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_game_location_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_game_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_count_game_location_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_game_location_count_game_location_id`
(
    in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_game_location`
    WHERE 1=1
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_count_offer_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_game_location_count_offer_id`
(
    in_offer_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_game_location`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_count_offer_id_game_location_id`;
delimiter $$
CREATE PROCEDURE `usp_offer_game_location_count_offer_id_game_location_id`
(
    in_offer_id BINARY(16) 
    , in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `offer_game_location`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_game_location_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_offer_game_location_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `game_location_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `offer_id`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    
    SET @stable = CONCAT('', ' FROM `offer_game_location` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_game_location_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_offer_game_location_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_game_location_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_offer_id BINARY(16) 
    , in_type_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_data TEXT 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `offer_game_location`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `offer_game_location` 
                    SET
                        `status` = in_status
                        , `game_location_id` = in_game_location_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `offer_id` = in_offer_id
                        , `type_id` = in_type_id
                        , `type` = in_type
                        , `data` = in_data
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `offer_game_location`
                    (
                        `status`
                        , `game_location_id`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `offer_id`
                        , `type_id`
                        , `type`
                        , `data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_game_location_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_game_location_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `offer_game_location`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location

                       
DROP PROCEDURE IF EXISTS `usp_offer_game_location_get`;

delimiter $$
CREATE PROCEDURE `usp_offer_game_location_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `type_id`
        , `type`
        , `data`
    FROM `offer_game_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_offer_game_location_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `type_id`
        , `type`
        , `data`
    FROM `offer_game_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_get_game_location_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_game_location_get_game_location_id`
(
    in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `type_id`
        , `type`
        , `data`
    FROM `offer_game_location`
    WHERE 1=1
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_get_offer_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_game_location_get_offer_id`
(
    in_offer_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `type_id`
        , `type`
        , `data`
    FROM `offer_game_location`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_offer_game_location_get_offer_id_game_location_id`;

delimiter $$
CREATE PROCEDURE `usp_offer_game_location_get_offer_id_game_location_id`
(
    in_offer_id BINARY(16) 
    , in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `offer_id`
        , `type_id`
        , `type`
        , `data`
    FROM `offer_game_location`
    WHERE 1=1
    AND `offer_id` = in_offer_id
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventInfo - event_info

                       
DROP PROCEDURE IF EXISTS `usp_event_info_count`;
delimiter $$
CREATE PROCEDURE `usp_event_info_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_info`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_info_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_info`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_count_code`;
delimiter $$
CREATE PROCEDURE `usp_event_info_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_info`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_count_name`;
delimiter $$
CREATE PROCEDURE `usp_event_info_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_info`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_event_info_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_info`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventInfo - event_info

                       
DROP PROCEDURE IF EXISTS `usp_event_info_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_event_info_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `url`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `usage_count`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `event_info` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: EventInfo - event_info

                       
DROP PROCEDURE IF EXISTS `usp_event_info_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_info_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_data TEXT 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_usage_count INTEGER 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `event_info`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `event_info` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `data` = in_data
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `usage_count` = in_usage_count
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `event_info`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `data`
                        , `org_id`
                        , `uuid`
                        , `usage_count`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: EventInfo - event_info

                       
DROP PROCEDURE IF EXISTS `usp_event_info_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_info_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_info`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_event_info_del_org_id`;

delimiter $$
CREATE PROCEDURE `usp_event_info_del_org_id`
(
    in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_info`
    WHERE 1=1                        
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventInfo - event_info

                       
DROP PROCEDURE IF EXISTS `usp_event_info_get`;

delimiter $$
CREATE PROCEDURE `usp_event_info_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_info`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_info_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_info`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_get_code`;

delimiter $$
CREATE PROCEDURE `usp_event_info_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_info`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_get_name`;

delimiter $$
CREATE PROCEDURE `usp_event_info_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_info`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_info_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_event_info_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `data`
        , `org_id`
        , `uuid`
        , `usage_count`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_info`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventLocation - event_location

                       
DROP PROCEDURE IF EXISTS `usp_event_location_count`;
delimiter $$
CREATE PROCEDURE `usp_event_location_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_location_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_count_event_id`;
delimiter $$
CREATE PROCEDURE `usp_event_location_count_event_id`
(
    in_event_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_location`
    WHERE 1=1
    AND `event_id` = in_event_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_count_city`;
delimiter $$
CREATE PROCEDURE `usp_event_location_count_city`
(
    in_city VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_location`
    WHERE 1=1
    AND lower(`city`) = lower(in_city)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_count_country_code`;
delimiter $$
CREATE PROCEDURE `usp_event_location_count_country_code`
(
    in_country_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_location`
    WHERE 1=1
    AND lower(`country_code`) = lower(in_country_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_count_postal_code`;
delimiter $$
CREATE PROCEDURE `usp_event_location_count_postal_code`
(
    in_postal_code VARCHAR (30) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_location`
    WHERE 1=1
    AND lower(`postal_code`) = lower(in_postal_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventLocation - event_location

                       
DROP PROCEDURE IF EXISTS `usp_event_location_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_event_location_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `fax`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    SET @sfields = CONCAT(@sfields, ', `address1`');
    SET @sfields = CONCAT(@sfields, ', `twitter`');
    SET @sfields = CONCAT(@sfields, ', `phone`');
    SET @sfields = CONCAT(@sfields, ', `postal_code`');
    SET @sfields = CONCAT(@sfields, ', `country_code`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `state_province`');
    SET @sfields = CONCAT(@sfields, ', `city`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `dob`');
    SET @sfields = CONCAT(@sfields, ', `date_start`');
    SET @sfields = CONCAT(@sfields, ', `longitude`');
    SET @sfields = CONCAT(@sfields, ', `email`');
    SET @sfields = CONCAT(@sfields, ', `event_id`');
    SET @sfields = CONCAT(@sfields, ', `date_end`');
    SET @sfields = CONCAT(@sfields, ', `latitude`');
    SET @sfields = CONCAT(@sfields, ', `facebook`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `address2`');
    
    SET @stable = CONCAT('', ' FROM `event_location` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: EventLocation - event_location

                       
DROP PROCEDURE IF EXISTS `usp_event_location_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_location_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_fax VARCHAR (30) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_address1 VARCHAR (1000) 
    , in_twitter VARCHAR (50) 
    , in_phone VARCHAR (30) 
    , in_postal_code VARCHAR (30) 
    , in_country_code VARCHAR (255) 
    , in_date_created TIMESTAMP 
    , in_active int 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_state_province VARCHAR (255) 
    , in_city VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_dob TIMESTAMP 
    , in_date_start TIMESTAMP 
    , in_longitude double 
    , in_email VARCHAR (255) 
    , in_event_id BINARY(16) 
    , in_date_end TIMESTAMP 
    , in_latitude double 
    , in_facebook VARCHAR (255) 
    , in_type VARCHAR (500) 
    , in_address2 VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `event_location`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `event_location` 
                    SET
                        `status` = in_status
                        , `fax` = in_fax
                        , `code` = in_code
                        , `description` = in_description
                        , `address1` = in_address1
                        , `twitter` = in_twitter
                        , `phone` = in_phone
                        , `postal_code` = in_postal_code
                        , `country_code` = in_country_code
                        , `date_created` = in_date_created
                        , `active` = in_active
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `state_province` = in_state_province
                        , `city` = in_city
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `dob` = in_dob
                        , `date_start` = in_date_start
                        , `longitude` = in_longitude
                        , `email` = in_email
                        , `event_id` = in_event_id
                        , `date_end` = in_date_end
                        , `latitude` = in_latitude
                        , `facebook` = in_facebook
                        , `type` = in_type
                        , `address2` = in_address2
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `event_location`
                    (
                        `status`
                        , `fax`
                        , `code`
                        , `description`
                        , `address1`
                        , `twitter`
                        , `phone`
                        , `postal_code`
                        , `country_code`
                        , `date_created`
                        , `active`
                        , `data`
                        , `uuid`
                        , `state_province`
                        , `city`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `dob`
                        , `date_start`
                        , `longitude`
                        , `email`
                        , `event_id`
                        , `date_end`
                        , `latitude`
                        , `facebook`
                        , `type`
                        , `address2`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: EventLocation - event_location

                       
DROP PROCEDURE IF EXISTS `usp_event_location_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_location_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_location`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventLocation - event_location

                       
DROP PROCEDURE IF EXISTS `usp_event_location_get`;

delimiter $$
CREATE PROCEDURE `usp_event_location_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `event_id`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `event_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_location_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `event_id`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `event_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_get_event_id`;

delimiter $$
CREATE PROCEDURE `usp_event_location_get_event_id`
(
    in_event_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `event_id`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `event_location`
    WHERE 1=1
    AND `event_id` = in_event_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_get_city`;

delimiter $$
CREATE PROCEDURE `usp_event_location_get_city`
(
    in_city VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `event_id`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `event_location`
    WHERE 1=1
    AND lower(`city`) = lower(in_city)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_get_country_code`;

delimiter $$
CREATE PROCEDURE `usp_event_location_get_country_code`
(
    in_country_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `event_id`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `event_location`
    WHERE 1=1
    AND lower(`country_code`) = lower(in_country_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_location_get_postal_code`;

delimiter $$
CREATE PROCEDURE `usp_event_location_get_postal_code`
(
    in_postal_code VARCHAR (30) 
)
BEGIN
    SELECT
        `status`
        , `fax`
        , `code`
        , `description`
        , `address1`
        , `twitter`
        , `phone`
        , `postal_code`
        , `country_code`
        , `date_created`
        , `active`
        , `data`
        , `uuid`
        , `state_province`
        , `city`
        , `display_name`
        , `name`
        , `date_modified`
        , `dob`
        , `date_start`
        , `longitude`
        , `email`
        , `event_id`
        , `date_end`
        , `latitude`
        , `facebook`
        , `type`
        , `address2`
    FROM `event_location`
    WHERE 1=1
    AND lower(`postal_code`) = lower(in_postal_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventCategory - event_category

                       
DROP PROCEDURE IF EXISTS `usp_event_category_count`;
delimiter $$
CREATE PROCEDURE `usp_event_category_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_category_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_count_code`;
delimiter $$
CREATE PROCEDURE `usp_event_category_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_count_name`;
delimiter $$
CREATE PROCEDURE `usp_event_category_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_count_type_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_count_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_count_org_id_type_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_count_org_id_type_id`
(
    in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventCategory - event_category

                       
DROP PROCEDURE IF EXISTS `usp_event_category_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_event_category_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `event_category` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: EventCategory - event_category

                       
DROP PROCEDURE IF EXISTS `usp_event_category_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_category_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_type_id BINARY(16) 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `event_category`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `event_category` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `type_id` = in_type_id
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `event_category`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `type_id`
                        , `org_id`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: EventCategory - event_category

                       
DROP PROCEDURE IF EXISTS `usp_event_category_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_category_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_event_category_del_code_org_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_del_code_org_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_event_category_del_code_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_del_code_org_id_type_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    AND "type_id" = in_type_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventCategory - event_category

                       
DROP PROCEDURE IF EXISTS `usp_event_category_get`;

delimiter $$
CREATE PROCEDURE `usp_event_category_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_category`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_category_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_category`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_get_code`;

delimiter $$
CREATE PROCEDURE `usp_event_category_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_category`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_get_name`;

delimiter $$
CREATE PROCEDURE `usp_event_category_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_category`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_get_type_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_get_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_category`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_get_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_get_org_id_type_id`
(
    in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `event_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_event_category_tree_count`;
delimiter $$
CREATE PROCEDURE `usp_event_category_tree_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_tree`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_category_tree_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_tree`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_count_parent_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_tree_count_parent_id`
(
    in_parent_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_count_category_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_tree_count_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_tree`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_count_parent_id_category_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_tree_count_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_event_category_tree_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `parent_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `category_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `event_category_tree` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_event_category_tree_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_category_tree_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_parent_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_category_id BINARY(16) 
    , in_type VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `event_category_tree`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `event_category_tree` 
                    SET
                        `status` = in_status
                        , `parent_id` = in_parent_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `category_id` = in_category_id
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `event_category_tree`
                    (
                        `status`
                        , `parent_id`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `category_id`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_event_category_tree_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category_tree`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_event_category_tree_del_parent_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_del_parent_id`
(
    in_parent_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category_tree`
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_event_category_tree_del_category_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_del_category_id`
(
    in_category_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category_tree`
    WHERE 1=1                        
    AND "category_id" = in_category_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_event_category_tree_del_parent_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_del_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category_tree`
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    AND "category_id" = in_category_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_event_category_tree_get`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_tree`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_tree`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_get_parent_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_get_parent_id`
(
    in_parent_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_get_category_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_get_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_tree`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_tree_get_parent_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_tree_get_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `parent_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_event_category_assoc_count`;
delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_assoc`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_assoc`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_count_event_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_count_event_id`
(
    in_event_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_assoc`
    WHERE 1=1
    AND `event_id` = in_event_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_count_category_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_count_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_assoc`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_count_event_id_category_id`;
delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_count_event_id_category_id`
(
    in_event_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `event_category_assoc`
    WHERE 1=1
    AND `event_id` = in_event_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_event_category_assoc_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `event_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `category_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `event_category_assoc` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_event_category_assoc_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_event_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_category_id BINARY(16) 
    , in_type VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `event_category_assoc`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `event_category_assoc` 
                    SET
                        `status` = in_status
                        , `event_id` = in_event_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `category_id` = in_category_id
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `event_category_assoc`
                    (
                        `status`
                        , `event_id`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `category_id`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_event_category_assoc_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `event_category_assoc`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_event_category_assoc_get`;

delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `event_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_assoc`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `event_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_assoc`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_get_event_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_get_event_id`
(
    in_event_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `event_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_assoc`
    WHERE 1=1
    AND `event_id` = in_event_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_get_category_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_get_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `event_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_assoc`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_event_category_assoc_get_event_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_event_category_assoc_get_event_id_category_id`
(
    in_event_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `event_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `category_id`
        , `type`
    FROM `event_category_assoc`
    WHERE 1=1
    AND `event_id` = in_event_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Channel - channel

                       
DROP PROCEDURE IF EXISTS `usp_channel_count`;
delimiter $$
CREATE PROCEDURE `usp_channel_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_channel_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_count_code`;
delimiter $$
CREATE PROCEDURE `usp_channel_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_count_name`;
delimiter $$
CREATE PROCEDURE `usp_channel_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_channel_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_count_type_id`;
delimiter $$
CREATE PROCEDURE `usp_channel_count_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_count_org_id_type_id`;
delimiter $$
CREATE PROCEDURE `usp_channel_count_org_id_type_id`
(
    in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Channel - channel

                       
DROP PROCEDURE IF EXISTS `usp_channel_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_channel_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `channel` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Channel - channel

                       
DROP PROCEDURE IF EXISTS `usp_channel_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_channel_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_type_id BINARY(16) 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `channel`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `channel` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `type_id` = in_type_id
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `channel`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `type_id`
                        , `org_id`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Channel - channel

                       
DROP PROCEDURE IF EXISTS `usp_channel_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_channel_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `channel`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_channel_del_code_org_id`;

delimiter $$
CREATE PROCEDURE `usp_channel_del_code_org_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `channel`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_channel_del_code_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_channel_del_code_org_id_type_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `channel`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    AND "type_id" = in_type_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Channel - channel

                       
DROP PROCEDURE IF EXISTS `usp_channel_get`;

delimiter $$
CREATE PROCEDURE `usp_channel_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_channel_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_get_code`;

delimiter $$
CREATE PROCEDURE `usp_channel_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_get_name`;

delimiter $$
CREATE PROCEDURE `usp_channel_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_channel_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_get_type_id`;

delimiter $$
CREATE PROCEDURE `usp_channel_get_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_get_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_channel_get_org_id_type_id`
(
    in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ChannelType - channel_type

                       
DROP PROCEDURE IF EXISTS `usp_channel_type_count`;
delimiter $$
CREATE PROCEDURE `usp_channel_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_channel_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_type_count_code`;
delimiter $$
CREATE PROCEDURE `usp_channel_type_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_type_count_name`;
delimiter $$
CREATE PROCEDURE `usp_channel_type_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `channel_type`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ChannelType - channel_type

                       
DROP PROCEDURE IF EXISTS `usp_channel_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_channel_type_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `channel_type` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ChannelType - channel_type

                       
DROP PROCEDURE IF EXISTS `usp_channel_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_channel_type_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (50) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `channel_type`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `channel_type` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `channel_type`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `uuid`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ChannelType - channel_type

                       
DROP PROCEDURE IF EXISTS `usp_channel_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_channel_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `channel_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ChannelType - channel_type

                       
DROP PROCEDURE IF EXISTS `usp_channel_type_get`;

delimiter $$
CREATE PROCEDURE `usp_channel_type_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_channel_type_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_channel_type_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_channel_type_get_name`;

delimiter $$
CREATE PROCEDURE `usp_channel_type_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `channel_type`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Question - question

                       
DROP PROCEDURE IF EXISTS `usp_question_count`;
delimiter $$
CREATE PROCEDURE `usp_question_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_question_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_count_code`;
delimiter $$
CREATE PROCEDURE `usp_question_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_count_name`;
delimiter $$
CREATE PROCEDURE `usp_question_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_count_channel_id`;
delimiter $$
CREATE PROCEDURE `usp_question_count_channel_id`
(
    in_channel_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_question_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_count_channel_id_org_id`;
delimiter $$
CREATE PROCEDURE `usp_question_count_channel_id_org_id`
(
    in_channel_id BINARY(16) 
    , in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_count_channel_id_code`;
delimiter $$
CREATE PROCEDURE `usp_question_count_channel_id_code`
(
    in_channel_id BINARY(16) 
    , in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Question - question

                       
DROP PROCEDURE IF EXISTS `usp_question_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_question_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `choices`');
    SET @sfields = CONCAT(@sfields, ', `channel_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `question` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Question - question

                       
DROP PROCEDURE IF EXISTS `usp_question_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_question_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_choices TEXT 
    , in_channel_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (50) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `question`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `question` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `choices` = in_choices
                        , `channel_id` = in_channel_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `question`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `org_id`
                        , `uuid`
                        , `choices`
                        , `channel_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_set_channel_id_code`;
delimiter $$
CREATE PROCEDURE `usp_question_set_channel_id_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_choices TEXT 
    , in_channel_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (50) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `question`  
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND lower(`code`) = lower(in_code)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `question` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `choices` = in_choices
                        , `channel_id` = in_channel_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND lower(`code`) = lower(in_code)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `question`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `org_id`
                        , `uuid`
                        , `choices`
                        , `channel_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Question - question

                       
DROP PROCEDURE IF EXISTS `usp_question_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_question_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `question`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_question_del_channel_id_org_id`;

delimiter $$
CREATE PROCEDURE `usp_question_del_channel_id_org_id`
(
    in_channel_id BINARY(16) 
    , in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `question`
    WHERE 1=1                        
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Question - question

                       
DROP PROCEDURE IF EXISTS `usp_question_get`;

delimiter $$
CREATE PROCEDURE `usp_question_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_question_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_code`;

delimiter $$
CREATE PROCEDURE `usp_question_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_name`;

delimiter $$
CREATE PROCEDURE `usp_question_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_type`;

delimiter $$
CREATE PROCEDURE `usp_question_get_type`
(
    in_type VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND lower(`type`) = lower(in_type)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_channel_id`;

delimiter $$
CREATE PROCEDURE `usp_question_get_channel_id`
(
    in_channel_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_question_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_channel_id_org_id`;

delimiter $$
CREATE PROCEDURE `usp_question_get_channel_id_org_id`
(
    in_channel_id BINARY(16) 
    , in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_question_get_channel_id_code`;

delimiter $$
CREATE PROCEDURE `usp_question_get_channel_id_code`
(
    in_channel_id BINARY(16) 
    , in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `org_id`
        , `uuid`
        , `choices`
        , `channel_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer

                       
DROP PROCEDURE IF EXISTS `usp_profile_offer_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_offer_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_offer`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_offer_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_offer_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_offer`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_offer_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_offer_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_offer`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer

                       
DROP PROCEDURE IF EXISTS `usp_profile_offer_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_offer_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `redeem_code`');
    SET @sfields = CONCAT(@sfields, ', `offer_id`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `redeemed`');
    SET @sfields = CONCAT(@sfields, ', `url`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `profile_offer` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer

                       
DROP PROCEDURE IF EXISTS `usp_profile_offer_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_offer_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_redeem_code VARCHAR (128) 
    , in_offer_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_active int 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_redeemed VARCHAR (50) 
    , in_url VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_offer`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_offer` 
                    SET
                        `status` = in_status
                        , `redeem_code` = in_redeem_code
                        , `offer_id` = in_offer_id
                        , `profile_id` = in_profile_id
                        , `active` = in_active
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `redeemed` = in_redeemed
                        , `url` = in_url
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_offer`
                    (
                        `status`
                        , `redeem_code`
                        , `offer_id`
                        , `profile_id`
                        , `active`
                        , `data`
                        , `uuid`
                        , `redeemed`
                        , `url`
                        , `date_modified`
                        , `date_created`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer

                       
DROP PROCEDURE IF EXISTS `usp_profile_offer_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_offer_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_offer`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_offer_del_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_offer_del_profile_id`
(
    in_profile_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_offer`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer

                       
DROP PROCEDURE IF EXISTS `usp_profile_offer_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_offer_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `redeem_code`
        , `offer_id`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `redeemed`
        , `url`
        , `date_modified`
        , `date_created`
        , `type`
    FROM `profile_offer`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_offer_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_offer_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `redeem_code`
        , `offer_id`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `redeemed`
        , `url`
        , `date_modified`
        , `date_created`
        , `type`
    FROM `profile_offer`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_offer_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_offer_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `redeem_code`
        , `offer_id`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `redeemed`
        , `url`
        , `date_modified`
        , `date_created`
        , `type`
    FROM `profile_offer`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

                       
DROP PROCEDURE IF EXISTS `usp_profile_app_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_app_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_app_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_app_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_app_count_profile_id_app_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_app_count_profile_id_app_id`
(
    in_profile_id BINARY(16) 
    , in_app_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_app`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

                       
DROP PROCEDURE IF EXISTS `usp_profile_app_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `app_id`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    
    SET @stable = CONCAT('', ' FROM `profile_app` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

                       
DROP PROCEDURE IF EXISTS `usp_profile_app_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_app_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_app_id BINARY(16) 
    , in_data TEXT 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_app`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_app` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                        , `app_id` = in_app_id
                        , `data` = in_data
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_app`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `profile_id`
                        , `type`
                        , `app_id`
                        , `data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_app_set_profile_id_app_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_app_set_profile_id_app_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_app_id BINARY(16) 
    , in_data TEXT 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_app`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `app_id` = in_app_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_app` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                        , `app_id` = in_app_id
                        , `data` = in_data
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `app_id` = in_app_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_app`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `profile_id`
                        , `type`
                        , `app_id`
                        , `data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

                       
DROP PROCEDURE IF EXISTS `usp_profile_app_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_app`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_app_del_profile_id_app_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_del_profile_id_app_id`
(
    in_profile_id BINARY(16) 
    , in_app_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_app`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "app_id" = in_app_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileApp - profile_app

                       
DROP PROCEDURE IF EXISTS `usp_profile_app_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `app_id`
        , `data`
    FROM `profile_app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_app_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `app_id`
        , `data`
    FROM `profile_app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_app_get_app_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_get_app_id`
(
    in_app_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `app_id`
        , `data`
    FROM `profile_app`
    WHERE 1=1
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_app_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `app_id`
        , `data`
    FROM `profile_app`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_app_get_profile_id_app_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_app_get_profile_id_app_id`
(
    in_profile_id BINARY(16) 
    , in_app_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `app_id`
        , `data`
    FROM `profile_app`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org

                       
DROP PROCEDURE IF EXISTS `usp_profile_org_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_org_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_org`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_org_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_org_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_org`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_org_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_org_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_org`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_org_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_org_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_org`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org

                       
DROP PROCEDURE IF EXISTS `usp_profile_org_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_org_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    
    SET @stable = CONCAT('', ' FROM `profile_org` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org

                       
DROP PROCEDURE IF EXISTS `usp_profile_org_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_org_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_type_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_org_id BINARY(16) 
    , in_data TEXT 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_org`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_org` 
                    SET
                        `status` = in_status
                        , `type_id` = in_type_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                        , `org_id` = in_org_id
                        , `data` = in_data
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_org`
                    (
                        `status`
                        , `type_id`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `profile_id`
                        , `type`
                        , `org_id`
                        , `data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org

                       
DROP PROCEDURE IF EXISTS `usp_profile_org_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_org_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_org`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org

                       
DROP PROCEDURE IF EXISTS `usp_profile_org_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_org_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `org_id`
        , `data`
    FROM `profile_org`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_org_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_org_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `org_id`
        , `data`
    FROM `profile_org`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_org_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_org_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `org_id`
        , `data`
    FROM `profile_org`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_org_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_org_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
        , `org_id`
        , `data`
    FROM `profile_org`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

                       
DROP PROCEDURE IF EXISTS `usp_profile_question_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_channel_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_channel_id`
(
    in_channel_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_question_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_question_id`
(
    in_question_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `question_id` = in_question_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_channel_id_org_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_channel_id_org_id`
(
    in_channel_id BINARY(16) 
    , in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_channel_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_channel_id_profile_id`
(
    in_channel_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_count_question_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_count_question_id_profile_id`
(
    in_question_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_question`
    WHERE 1=1
    AND `question_id` = in_question_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

                       
DROP PROCEDURE IF EXISTS `usp_profile_question_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `channel_id`');
    SET @sfields = CONCAT(@sfields, ', `answer`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `question_id`');
    
    SET @stable = CONCAT('', ' FROM `profile_question` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

                       
DROP PROCEDURE IF EXISTS `usp_profile_question_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_active int 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_channel_id BINARY(16) 
    , in_answer VARCHAR (1000) 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_question_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_question`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_question` 
                    SET
                        `status` = in_status
                        , `profile_id` = in_profile_id
                        , `active` = in_active
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `channel_id` = in_channel_id
                        , `answer` = in_answer
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `question_id` = in_question_id
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_question`
                    (
                        `status`
                        , `profile_id`
                        , `active`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `org_id`
                        , `channel_id`
                        , `answer`
                        , `date_created`
                        , `type`
                        , `question_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_set_channel_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_set_channel_id_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_active int 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_channel_id BINARY(16) 
    , in_answer VARCHAR (1000) 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_question_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_question`  
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND `profile_id` = in_profile_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_question` 
                    SET
                        `status` = in_status
                        , `profile_id` = in_profile_id
                        , `active` = in_active
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `channel_id` = in_channel_id
                        , `answer` = in_answer
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `question_id` = in_question_id
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND `profile_id` = in_profile_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_question`
                    (
                        `status`
                        , `profile_id`
                        , `active`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `org_id`
                        , `channel_id`
                        , `answer`
                        , `date_created`
                        , `type`
                        , `question_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_set_question_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_set_question_id_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_active int 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_channel_id BINARY(16) 
    , in_answer VARCHAR (1000) 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_question_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_question`  
                    WHERE 1=1
                    AND `question_id` = in_question_id
                    AND `profile_id` = in_profile_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_question` 
                    SET
                        `status` = in_status
                        , `profile_id` = in_profile_id
                        , `active` = in_active
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `channel_id` = in_channel_id
                        , `answer` = in_answer
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `question_id` = in_question_id
                    WHERE 1=1
                    AND `question_id` = in_question_id
                    AND `profile_id` = in_profile_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_question`
                    (
                        `status`
                        , `profile_id`
                        , `active`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `org_id`
                        , `channel_id`
                        , `answer`
                        , `date_created`
                        , `type`
                        , `question_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_set_channel_id_question_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_question_set_channel_id_question_id_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_active int 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_channel_id BINARY(16) 
    , in_answer VARCHAR (1000) 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_question_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_question`  
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND `question_id` = in_question_id
                    AND `profile_id` = in_profile_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_question` 
                    SET
                        `status` = in_status
                        , `profile_id` = in_profile_id
                        , `active` = in_active
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `channel_id` = in_channel_id
                        , `answer` = in_answer
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `question_id` = in_question_id
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND `question_id` = in_question_id
                    AND `profile_id` = in_profile_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_question`
                    (
                        `status`
                        , `profile_id`
                        , `active`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `org_id`
                        , `channel_id`
                        , `answer`
                        , `date_created`
                        , `type`
                        , `question_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

                       
DROP PROCEDURE IF EXISTS `usp_profile_question_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_question`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_question_del_channel_id_org_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_del_channel_id_org_id`
(
    in_channel_id BINARY(16) 
    , in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_question`
    WHERE 1=1                        
    AND "channel_id" = in_channel_id
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question

                       
DROP PROCEDURE IF EXISTS `usp_profile_question_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_channel_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_channel_id`
(
    in_channel_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_question_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_question_id`
(
    in_question_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `question_id` = in_question_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_channel_id_org_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_channel_id_org_id`
(
    in_channel_id BINARY(16) 
    , in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_channel_id_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_channel_id_profile_id`
(
    in_channel_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_question_get_question_id_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_question_get_question_id_profile_id`
(
    in_question_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `profile_id`
        , `active`
        , `data`
        , `uuid`
        , `date_modified`
        , `org_id`
        , `channel_id`
        , `answer`
        , `date_created`
        , `type`
        , `question_id`
    FROM `profile_question`
    WHERE 1=1
    AND `question_id` = in_question_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

                       
DROP PROCEDURE IF EXISTS `usp_profile_channel_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_channel_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_channel`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_channel_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_channel`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_count_channel_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_channel_count_channel_id`
(
    in_channel_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_channel`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_channel_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_channel`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_count_channel_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_channel_count_channel_id_profile_id`
(
    in_channel_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_channel`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

                       
DROP PROCEDURE IF EXISTS `usp_profile_channel_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `channel_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `profile_channel` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

                       
DROP PROCEDURE IF EXISTS `usp_profile_channel_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_channel_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_channel_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_type VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_channel`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_channel` 
                    SET
                        `status` = in_status
                        , `channel_id` = in_channel_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_channel`
                    (
                        `status`
                        , `channel_id`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `profile_id`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_set_channel_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_channel_set_channel_id_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_channel_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_type VARCHAR (500) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `profile_channel`  
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND `profile_id` = in_profile_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_channel` 
                    SET
                        `status` = in_status
                        , `channel_id` = in_channel_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                    WHERE 1=1
                    AND `channel_id` = in_channel_id
                    AND `profile_id` = in_profile_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_channel`
                    (
                        `status`
                        , `channel_id`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `profile_id`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

                       
DROP PROCEDURE IF EXISTS `usp_profile_channel_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_channel`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_channel_del_channel_id_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_del_channel_id_profile_id`
(
    in_channel_id BINARY(16) 
    , in_profile_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_channel`
    WHERE 1=1                        
    AND "channel_id" = in_channel_id
    AND "profile_id" = in_profile_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel

                       
DROP PROCEDURE IF EXISTS `usp_profile_channel_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `channel_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_channel`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `channel_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_channel`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_get_channel_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_get_channel_id`
(
    in_channel_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `channel_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_channel`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `channel_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_channel`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_channel_get_channel_id_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_channel_get_channel_id_profile_id`
(
    in_channel_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `channel_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_channel`
    WHERE 1=1
    AND `channel_id` = in_channel_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OrgSite - org_site

                       
DROP PROCEDURE IF EXISTS `usp_org_site_count`;
delimiter $$
CREATE PROCEDURE `usp_org_site_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_site`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_org_site_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_site`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_org_site_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_site`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_count_site_id`;
delimiter $$
CREATE PROCEDURE `usp_org_site_count_site_id`
(
    in_site_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_site`
    WHERE 1=1
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_count_org_id_site_id`;
delimiter $$
CREATE PROCEDURE `usp_org_site_count_org_id_site_id`
(
    in_org_id BINARY(16) 
    , in_site_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `org_site`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OrgSite - org_site

                       
DROP PROCEDURE IF EXISTS `usp_org_site_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_org_site_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `site_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    
    SET @stable = CONCAT('', ' FROM `org_site` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: OrgSite - org_site

                       
DROP PROCEDURE IF EXISTS `usp_org_site_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_org_site_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_site_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_org_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `org_site`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `org_site` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `site_id` = in_site_id
                        , `type` = in_type
                        , `org_id` = in_org_id
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `org_site`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `site_id`
                        , `type`
                        , `org_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_set_org_id_site_id`;
delimiter $$
CREATE PROCEDURE `usp_org_site_set_org_id_site_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_site_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_org_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `org_site`  
                    WHERE 1=1
                    AND `org_id` = in_org_id
                    AND `site_id` = in_site_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `org_site` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `site_id` = in_site_id
                        , `type` = in_type
                        , `org_id` = in_org_id
                    WHERE 1=1
                    AND `org_id` = in_org_id
                    AND `site_id` = in_site_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `org_site`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `site_id`
                        , `type`
                        , `org_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: OrgSite - org_site

                       
DROP PROCEDURE IF EXISTS `usp_org_site_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_org_site_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `org_site`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_org_site_del_org_id_site_id`;

delimiter $$
CREATE PROCEDURE `usp_org_site_del_org_id_site_id`
(
    in_org_id BINARY(16) 
    , in_site_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `org_site`
    WHERE 1=1                        
    AND "org_id" = in_org_id
    AND "site_id" = in_site_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OrgSite - org_site

                       
DROP PROCEDURE IF EXISTS `usp_org_site_get`;

delimiter $$
CREATE PROCEDURE `usp_org_site_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `org_id`
    FROM `org_site`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_org_site_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `org_id`
    FROM `org_site`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_org_site_get_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `org_id`
    FROM `org_site`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_get_site_id`;

delimiter $$
CREATE PROCEDURE `usp_org_site_get_site_id`
(
    in_site_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `org_id`
    FROM `org_site`
    WHERE 1=1
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_org_site_get_org_id_site_id`;

delimiter $$
CREATE PROCEDURE `usp_org_site_get_org_id_site_id`
(
    in_org_id BINARY(16) 
    , in_site_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `org_id`
    FROM `org_site`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: SiteApp - site_app

                       
DROP PROCEDURE IF EXISTS `usp_site_app_count`;
delimiter $$
CREATE PROCEDURE `usp_site_app_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_site_app_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_count_app_id`;
delimiter $$
CREATE PROCEDURE `usp_site_app_count_app_id`
(
    in_app_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_app`
    WHERE 1=1
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_count_site_id`;
delimiter $$
CREATE PROCEDURE `usp_site_app_count_site_id`
(
    in_site_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_app`
    WHERE 1=1
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_count_app_id_site_id`;
delimiter $$
CREATE PROCEDURE `usp_site_app_count_app_id_site_id`
(
    in_app_id BINARY(16) 
    , in_site_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `site_app`
    WHERE 1=1
    AND `app_id` = in_app_id
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: SiteApp - site_app

                       
DROP PROCEDURE IF EXISTS `usp_site_app_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_site_app_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `site_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `app_id`');
    
    SET @stable = CONCAT('', ' FROM `site_app` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: SiteApp - site_app

                       
DROP PROCEDURE IF EXISTS `usp_site_app_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_site_app_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_site_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_app_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `site_app`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `site_app` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `site_id` = in_site_id
                        , `type` = in_type
                        , `app_id` = in_app_id
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `site_app`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `site_id`
                        , `type`
                        , `app_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_set_app_id_site_id`;
delimiter $$
CREATE PROCEDURE `usp_site_app_set_app_id_site_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_site_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_app_id BINARY(16) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `site_app`  
                    WHERE 1=1
                    AND `app_id` = in_app_id
                    AND `site_id` = in_site_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `site_app` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `site_id` = in_site_id
                        , `type` = in_type
                        , `app_id` = in_app_id
                    WHERE 1=1
                    AND `app_id` = in_app_id
                    AND `site_id` = in_site_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `site_app`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `site_id`
                        , `type`
                        , `app_id`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: SiteApp - site_app

                       
DROP PROCEDURE IF EXISTS `usp_site_app_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_site_app_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `site_app`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_site_app_del_app_id_site_id`;

delimiter $$
CREATE PROCEDURE `usp_site_app_del_app_id_site_id`
(
    in_app_id BINARY(16) 
    , in_site_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `site_app`
    WHERE 1=1                        
    AND "app_id" = in_app_id
    AND "site_id" = in_site_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: SiteApp - site_app

                       
DROP PROCEDURE IF EXISTS `usp_site_app_get`;

delimiter $$
CREATE PROCEDURE `usp_site_app_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `app_id`
    FROM `site_app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_site_app_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `app_id`
    FROM `site_app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_get_app_id`;

delimiter $$
CREATE PROCEDURE `usp_site_app_get_app_id`
(
    in_app_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `app_id`
    FROM `site_app`
    WHERE 1=1
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_get_site_id`;

delimiter $$
CREATE PROCEDURE `usp_site_app_get_site_id`
(
    in_site_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `app_id`
    FROM `site_app`
    WHERE 1=1
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_site_app_get_app_id_site_id`;

delimiter $$
CREATE PROCEDURE `usp_site_app_get_app_id_site_id`
(
    in_app_id BINARY(16) 
    , in_site_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `site_id`
        , `type`
        , `app_id`
    FROM `site_app`
    WHERE 1=1
    AND `app_id` = in_app_id
    AND `site_id` = in_site_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Photo - photo

                       
DROP PROCEDURE IF EXISTS `usp_photo_count`;
delimiter $$
CREATE PROCEDURE `usp_photo_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `photo`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_photo_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `photo`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_count_external_id`;
delimiter $$
CREATE PROCEDURE `usp_photo_count_external_id`
(
    in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `photo`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_count_url`;
delimiter $$
CREATE PROCEDURE `usp_photo_count_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_count_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_photo_count_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_count_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_photo_count_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `photo`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Photo - photo

                       
DROP PROCEDURE IF EXISTS `usp_photo_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_photo_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `third_party_oembed`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `third_party_url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_id`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `external_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `photo` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Photo - photo

                       
DROP PROCEDURE IF EXISTS `usp_photo_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_photo_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `photo`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `photo` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `photo`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_set_external_id`;
delimiter $$
CREATE PROCEDURE `usp_photo_set_external_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `photo`  
                    WHERE 1=1
                    AND `external_id` = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `photo` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `external_id` = in_external_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `photo`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_set_url`;
delimiter $$
CREATE PROCEDURE `usp_photo_set_url`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `photo`  
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `photo` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `photo`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_set_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_photo_set_url_external_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `photo`  
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `external_id` = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `photo` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `external_id` = in_external_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `photo`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_set_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_photo_set_uuid_external_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `photo`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `external_id` = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `photo` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `external_id` = in_external_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `photo`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Photo - photo

                       
DROP PROCEDURE IF EXISTS `usp_photo_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_photo_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `photo`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_photo_del_external_id`;

delimiter $$
CREATE PROCEDURE `usp_photo_del_external_id`
(
    in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `photo`
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_photo_del_url`;

delimiter $$
CREATE PROCEDURE `usp_photo_del_url`
(
    in_url VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `photo`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_photo_del_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_photo_del_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `photo`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_photo_del_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_photo_del_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `photo`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Photo - photo

                       
DROP PROCEDURE IF EXISTS `usp_photo_get`;

delimiter $$
CREATE PROCEDURE `usp_photo_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `photo`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_photo_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `photo`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_get_external_id`;

delimiter $$
CREATE PROCEDURE `usp_photo_get_external_id`
(
    in_external_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `photo`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_get_url`;

delimiter $$
CREATE PROCEDURE `usp_photo_get_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_get_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_photo_get_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_photo_get_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_photo_get_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `photo`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Video - video

                       
DROP PROCEDURE IF EXISTS `usp_video_count`;
delimiter $$
CREATE PROCEDURE `usp_video_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `video`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_video_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `video`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_count_external_id`;
delimiter $$
CREATE PROCEDURE `usp_video_count_external_id`
(
    in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `video`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_count_url`;
delimiter $$
CREATE PROCEDURE `usp_video_count_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_count_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_video_count_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_count_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_video_count_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `video`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Video - video

                       
DROP PROCEDURE IF EXISTS `usp_video_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_video_browse_filter`
(
    in_page int,
    in_page_size int,
    in_sort VARCHAR(500),
    in_filter VARCHAR(4000)
    
)
BEGIN
    DECLARE total_rows int;
    SET total_rows = 0;
        
    IF (in_page = 0) THEN
        SET in_page = 1;
    END IF;    
    
    IF (in_page_size = 0) THEN
       SET in_page_size = 10;
    END IF;
    
    IF (in_sort = NULL || in_sort = '') THEN
       SET in_sort = ' date_modified ASC ';
    END IF;
    
    SET @sfields = CONCAT('', '`status`');
    SET @sfields = CONCAT(@sfields, ', `third_party_oembed`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `third_party_url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_id`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `external_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `video` WHERE 1=1 ');
    
    SET @s = CONCAT(' ', @stable);
    SET @s = CONCAT(@s, ' ', in_filter);    
    
    SET @scount = CONCAT('SELECT COUNT(*) as `total_rows` ', @s, ' INTO @total_rows');
    
    PREPARE stmtcount FROM @scount;
    EXECUTE stmtcount;
    #SELECT @total_rows;
    SET total_rows = @total_rows;

    SET @sfields = CONCAT(total_rows, ' as `total_rows`, ', @sfields);
    SET @s = CONCAT('SELECT ', @sfields, @s);
    SET @s = CONCAT(@s, ' ORDER BY ', in_sort);
    SET @s = CONCAT(@s, ' LIMIT ', in_page);
    SET @s = CONCAT(@s, ',', in_page_size);    

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    
END$$
delimiter ;
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Video - video

                       
DROP PROCEDURE IF EXISTS `usp_video_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_video_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `video`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `video` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `video`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_set_external_id`;
delimiter $$
CREATE PROCEDURE `usp_video_set_external_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `video`  
                    WHERE 1=1
                    AND `external_id` = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `video` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `external_id` = in_external_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `video`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_set_url`;
delimiter $$
CREATE PROCEDURE `usp_video_set_url`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `video`  
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `video` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `video`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_set_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_video_set_url_external_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `video`  
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `external_id` = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `video` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `external_id` = in_external_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `video`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_set_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_video_set_uuid_external_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_data TEXT 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_external_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (500) 
    , in_description VARCHAR (255) 
)
BEGIN
    BEGIN
        SET @countItems = 0;
        SET @id = 0;
        
        BEGIN
            IF (in_set_type != 'full' AND in_set_type != 'insertonly' AND in_set_type != 'updateonly') THEN
                SET in_set_type = 'full';
            END IF;
        END;

	# IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	# GET COUNT TO CHECK
	BEGIN
	    IF (in_set_type = 'full') THEN
                BEGIN
                    -- CHECK COUNT
                    SELECT COUNT(*) INTO @countItems
                    FROM  `video`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `external_id` = in_external_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `video` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `uuid` = in_uuid
                        , `data` = in_data
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `external_id` = in_external_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `external_id` = in_external_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `video`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `uuid`
                        , `data`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `external_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Video - video

                       
DROP PROCEDURE IF EXISTS `usp_video_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_video_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `video`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_video_del_external_id`;

delimiter $$
CREATE PROCEDURE `usp_video_del_external_id`
(
    in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `video`
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_video_del_url`;

delimiter $$
CREATE PROCEDURE `usp_video_del_url`
(
    in_url VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `video`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_video_del_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_video_del_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `video`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_video_del_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_video_del_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `video`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Video - video

                       
DROP PROCEDURE IF EXISTS `usp_video_get`;

delimiter $$
CREATE PROCEDURE `usp_video_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `video`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_video_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `video`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_get_external_id`;

delimiter $$
CREATE PROCEDURE `usp_video_get_external_id`
(
    in_external_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `video`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_get_url`;

delimiter $$
CREATE PROCEDURE `usp_video_get_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_get_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_video_get_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_video_get_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_video_get_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `uuid`
        , `data`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `video`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;


