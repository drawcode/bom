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
        
DROP TABLE IF EXISTS `game` CASCADE;
    
        
DROP TABLE IF EXISTS `game_category` CASCADE;
    
        
DROP TABLE IF EXISTS `game_category_tree` CASCADE;
    
        
DROP TABLE IF EXISTS `game_category_assoc` CASCADE;
    
        
DROP TABLE IF EXISTS `game_type` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_game` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_game_network` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_game_data_attribute` CASCADE;
    
        
DROP TABLE IF EXISTS `game_session` CASCADE;
    
        
DROP TABLE IF EXISTS `game_session_data` CASCADE;
    
        
DROP TABLE IF EXISTS `game_content` CASCADE;
    
        
DROP TABLE IF EXISTS `game_profile_content` CASCADE;
    
        
DROP TABLE IF EXISTS `game_app` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_game_location` CASCADE;
    
        
DROP TABLE IF EXISTS `game_photo` CASCADE;
    
        
DROP TABLE IF EXISTS `game_video` CASCADE;
    
        
DROP TABLE IF EXISTS `game_rpg_item_weapon` CASCADE;
    
        
DROP TABLE IF EXISTS `game_rpg_item_skill` CASCADE;
    
        
DROP TABLE IF EXISTS `game_product` CASCADE;
    
        
DROP TABLE IF EXISTS `game_statistic_leaderboard` CASCADE;
    
        
DROP TABLE IF EXISTS `game_statistic_leaderboard_rollup` CASCADE;
    
        
DROP TABLE IF EXISTS `game_live_queue` CASCADE;
    
        
DROP TABLE IF EXISTS `game_live_recent_queue` CASCADE;
    
        
DROP TABLE IF EXISTS `game_profile_statistic` CASCADE;
    
        
DROP TABLE IF EXISTS `game_statistic_meta` CASCADE;
    
        
DROP TABLE IF EXISTS `game_profile_statistic_timestamp` CASCADE;
    
        
DROP TABLE IF EXISTS `game_key_meta` CASCADE;
    
        
DROP TABLE IF EXISTS `game_level` CASCADE;
    
        
DROP TABLE IF EXISTS `game_profile_achievement` CASCADE;
    
        
DROP TABLE IF EXISTS `game_achievement_meta` CASCADE;
    
*/

        
CREATE TABLE `game` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `org_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `app_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_category` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
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

ALTER TABLE `game_category` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_category_tree` 
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

ALTER TABLE `game_category_tree` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_category_assoc` 
(
    `status` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `game_id` BINARY(16) 
    , `category_id` BINARY(16) 
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_category_assoc` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_type` 
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
    , `type` VARCHAR (50) 
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_game` 
(
    `status` VARCHAR (255)
    , `type_id` BINARY(16)
    , `profile_id` BINARY(16)
    , `game_profile` TEXT
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `profile_version` VARCHAR (50)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_game` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_game_network` 
(
    `status` VARCHAR (255)
    , `hash` VARCHAR (500)
    , `profile_id` BINARY(16)
    , `game_network_id` BINARY(16)
    , `network_username` VARCHAR (500)
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16)
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `secret` VARCHAR (500)
    , `token` VARCHAR (500)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_game_network` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_game_data_attribute` 
(
    `code` VARCHAR (500)
    , `uuid` BINARY(16)
    , `val` TEXT
    , `profile_id` BINARY(16)
    , `otype` VARCHAR (500)
    , `game_id` BINARY(16)
    , `type` VARCHAR (500)
    , `name` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_game_data_attribute` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_session` 
(
    `game_area` VARCHAR (255)
    , `code` VARCHAR (255)
    , `network_uuid` VARCHAR (40)
    , `profile_id` BINARY(16)
    , `game_level` VARCHAR (255)
    , `profile_network` VARCHAR (255)
    , `profile_device` VARCHAR (50)
    , `display_name` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `network_external_port` INTEGER
    , `game_players_connected` INTEGER
    , `type` VARCHAR (500)
    , `status` VARCHAR (255)
    , `game_state` VARCHAR (50)
    , `hash` VARCHAR (255)
    , `description` VARCHAR (255)
    , `network_external_ip` VARCHAR (40)
    , `profile_username` VARCHAR (500)
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16)
    , `game_code` VARCHAR (255)
    , `game_player_z` decimal
    , `game_player_x` decimal
    , `game_player_y` decimal
    , `network_port` INTEGER
    , `game_players_allowed` INTEGER
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `game_type` VARCHAR (255)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `network_ip` VARCHAR (40)
    , `network_use_nat` int
                DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_session` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_session_data` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data_results` TEXT
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `data_layer_projectile` TEXT
    , `data_layer_actors` TEXT
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `data_layer_enemy` TEXT
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_session_data` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_content` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `extension` VARCHAR (50)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `game_id` BINARY(16) 
    , `uuid` BINARY(16) 
    , `filename` VARCHAR (500)
    , `source` VARCHAR (255)
    , `version` VARCHAR (255)
    , `platform` VARCHAR (255)
    , `content_type` VARCHAR (255)
    , `path` VARCHAR (500)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `increment` INTEGER
    , `type` VARCHAR (500)
    , `hash` VARCHAR (255)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_content` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_profile_content` 
(
    `username` VARCHAR (500)
    , `code` VARCHAR (255)
    , `profile_id` BINARY(16) 
    , `increment` INTEGER
    , `path` VARCHAR (500)
    , `display_name` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `platform` VARCHAR (255)
    , `filename` VARCHAR (500)
    , `source` VARCHAR (255)
    , `version` VARCHAR (255)
    , `game_network` VARCHAR (500)
    , `type` VARCHAR (500)
    , `status` VARCHAR (255)
    , `hash` VARCHAR (255)
    , `description` VARCHAR (255)
    , `content_type` VARCHAR (255)
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16) 
    , `data` TEXT
    , `name` VARCHAR (255)
    , `extension` VARCHAR (50)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_profile_content` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_app` 
(
    `status` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `game_id` BINARY(16) 
    , `type` VARCHAR (500)
    , `app_id` BINARY(16) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_app` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_game_location` 
(
    `status` VARCHAR (255)
    , `game_location_id` BINARY(16)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_game_location` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_photo` 
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

ALTER TABLE `game_photo` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_video` 
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

ALTER TABLE `game_video` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_rpg_item_weapon` 
(
    `status` VARCHAR (255)
    , `third_party_oembed` VARCHAR (500)
    , `code` VARCHAR (255)
    , `description` VARCHAR (255)
    , `game_defense` decimal
    , `third_party_url` VARCHAR (500)
    , `third_party_id` VARCHAR (500)
    , `content_type` VARCHAR (100)
    , `type` VARCHAR (500)
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16)
    , `game_attack` decimal
    , `uuid` BINARY(16) 
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `url` VARCHAR (500)
    , `third_party_data` VARCHAR (500)
    , `game_price` decimal
    , `game_type` decimal
    , `game_skill` decimal
    , `game_health` decimal
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `game_energy` decimal
    , `game_data` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_rpg_item_weapon` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_rpg_item_skill` 
(
    `status` VARCHAR (255)
    , `third_party_oembed` VARCHAR (500)
    , `code` VARCHAR (255)
    , `description` VARCHAR (255)
    , `game_defense` decimal
    , `third_party_url` VARCHAR (500)
    , `third_party_id` VARCHAR (500)
    , `content_type` VARCHAR (100)
    , `type` VARCHAR (500)
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16)
    , `game_attack` decimal
    , `uuid` BINARY(16) 
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `url` VARCHAR (500)
    , `third_party_data` VARCHAR (500)
    , `game_price` decimal
    , `game_type` decimal
    , `game_skill` decimal
    , `game_health` decimal
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `game_energy` decimal
    , `game_data` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_rpg_item_skill` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_product` 
(
    `status` VARCHAR (255)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `url` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `game_id` VARCHAR (100)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_product` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_statistic_leaderboard` 
(
    `status` VARCHAR (255)
    , `username` VARCHAR (500)
    , `key` BINARY(16)
    , `timestamp` decimal
    , `profile_id` BINARY(16)
    , `rank` INTEGER
    , `rank_change` INTEGER
    , `game_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `rank_total_count` INTEGER
    , `data` TEXT
    , `stat_value` decimal
    , `network` VARCHAR (500)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `level` VARCHAR (500)
    , `stat_value_formatted` VARCHAR (500)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_statistic_leaderboard` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_statistic_leaderboard_rollup` 
(
    `status` VARCHAR (255)
    , `username` VARCHAR (500)
    , `key` BINARY(16)
    , `timestamp` decimal
    , `profile_id` BINARY(16)
    , `rank` INTEGER
    , `rank_change` INTEGER
    , `game_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `rank_total_count` INTEGER
    , `data` TEXT
    , `stat_value` decimal
    , `network` VARCHAR (500)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `level` VARCHAR (500)
    , `stat_value_formatted` VARCHAR (500)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_statistic_leaderboard_rollup` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_live_queue` 
(
    `status` VARCHAR (255)
    , `data_stat` TEXT
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `game_id` BINARY(16)
    , `profile_id` BINARY(16)
    , `type` VARCHAR (500)
    , `data_ad` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_live_queue` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_live_recent_queue` 
(
    `status` VARCHAR (255)
    , `username` VARCHAR (500)
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `profile_id` BINARY(16)
    , `uuid` BINARY(16) 
    , `game` VARCHAR (500)
    , `game_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_live_recent_queue` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_profile_statistic` 
(
    `status` VARCHAR (255)
    , `username` VARCHAR (500)
    , `timestamp` decimal
    , `profile_id` BINARY(16)
    , `key` VARCHAR (50)
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16)
    , `data` TEXT
    , `stat_value` decimal
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `level` VARCHAR (500)
    , `points` decimal
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_profile_statistic` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_statistic_meta` 
(
    `status` VARCHAR (255)
    , `sort` INTEGER
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `points` decimal
    , `store_count` INTEGER
    , `key` VARCHAR (50)
    , `game_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (40)
    , `order` VARCHAR (40)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_statistic_meta` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_profile_statistic_timestamp` 
(
    `status` VARCHAR (255)
    , `timestamp` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `uuid` BINARY(16) 
    , `key` VARCHAR (50)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `game_id` BINARY(16)
    , `profile_id` BINARY(16)
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_profile_statistic_timestamp` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_key_meta` 
(
    `status` VARCHAR (255)
    , `sort` INTEGER
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `level` VARCHAR (500)
    , `uuid` BINARY(16) 
    , `key_level` VARCHAR (50)
    , `store_count` INTEGER
    , `key` VARCHAR (50)
    , `game_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (40)
    , `order` VARCHAR (40)
    , `key_stat` VARCHAR (50)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_key_meta` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_level` 
(
    `status` VARCHAR (255)
    , `sort` INTEGER
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `key` VARCHAR (50)
    , `game_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (40)
    , `order` VARCHAR (40)
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_level` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_profile_achievement` 
(
    `status` VARCHAR (255)
    , `username` VARCHAR (500)
    , `timestamp` decimal
    , `completed` int
                DEFAULT 1
    , `profile_id` BINARY(16)
    , `key` VARCHAR (50)
    , `active` int
                DEFAULT 1
    , `game_id` BINARY(16)
    , `achievement_value` decimal
    , `data` TEXT
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `level` VARCHAR (500)
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` VARCHAR (500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_profile_achievement` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `game_achievement_meta` 
(
    `status` VARCHAR (255)
    , `sort` INTEGER
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `game_stat` int
                DEFAULT 1
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `data` TEXT
    , `level` VARCHAR (500)
    , `uuid` BINARY(16) 
    , `points` INTEGER
    , `key` VARCHAR (50)
    , `game_id` BINARY(16)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `modifier` decimal
    , `type` VARCHAR (40)
    , `leaderboard` int
                DEFAULT 1
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `game_achievement_meta` ADD PRIMARY KEY (`uuid`);
    

        
-- INDEX CREATES

        
        
        
        
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_profile_game_data_attribute_uuid','profile_game_data_attribute');
                
CREATE INDEX `IX_profile_game_data_attribute_uuid` ON `profile_game_data_attribute` 
(
                    
    `uuid` ASC
);
                
CALL drop_index_if_exists('IX_profile_game_data_attribute_profile_id','profile_game_data_attribute');
                
CREATE INDEX `IX_profile_game_data_attribute_profile_id` ON `profile_game_data_attribute` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_game_data_attribute_profile_id_game_id','profile_game_data_attribute');
                
CREATE INDEX `IX_profile_game_data_attribute_profile_id_game_id` ON `profile_game_data_attribute` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_game_data_attribute_profile_id_game_id_code','profile_game_data_attribute');
                
CREATE INDEX `IX_profile_game_data_attribute_profile_id_game_id_code` ON `profile_game_data_attribute` 
(
                    
    `code` ASC
                    
    , `game_id` ASC
                    
    , `profile_id` ASC
);
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
        
        
        
        
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key` ON `game_statistic_leaderboard` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_profile_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_profile_id` ON `game_statistic_leaderboard` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_username','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_username` ON `game_statistic_leaderboard` 
(
                    
    `username` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_game_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_game_id` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_game_id_level','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_game_id_level` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
                    
    , `level` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_profile_id_game_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_profile_id_game_id` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_username_game_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_username_game_id` ON `game_statistic_leaderboard` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_username','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_username` ON `game_statistic_leaderboard` 
(
                    
    `username` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_username_game_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_username_game_id` ON `game_statistic_leaderboard` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_username_game_id_type','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_username_game_id_type` ON `game_statistic_leaderboard` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_profile_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_profile_id` ON `game_statistic_leaderboard` 
(
                    
    `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_profile_id_game_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_profile_id_game_id` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_profile_id_game_id_type','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_profile_id_game_id_type` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_game_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_game_id` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_game_id_profile_id','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_game_id_profile_id` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_key_game_id_type','game_statistic_leaderboard');
                
CREATE INDEX `IX_game_statistic_leaderboard_key_game_id_type` ON `game_statistic_leaderboard` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key` ON `game_statistic_leaderboard_rollup` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_profile_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_profile_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_username','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_username` ON `game_statistic_leaderboard_rollup` 
(
                    
    `username` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_game_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_game_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_game_id_level','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_game_id_level` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
                    
    , `level` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_profile_id_game_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_profile_id_game_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_username_game_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_username_game_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_username','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_username` ON `game_statistic_leaderboard_rollup` 
(
                    
    `username` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_username_game_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_username_game_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_username_game_id_type','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_username_game_id_type` ON `game_statistic_leaderboard_rollup` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_profile_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_profile_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_profile_id_game_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_profile_id_game_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_profile_id_game_id_type','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_profile_id_game_id_type` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_game_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_game_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_game_id_profile_id','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_game_id_profile_id` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_leaderboard_rollup_key_game_id_type','game_statistic_leaderboard_rollup');
                
CREATE INDEX `IX_game_statistic_leaderboard_rollup_key_game_id_type` ON `game_statistic_leaderboard_rollup` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_live_queue_profile_id','game_live_queue');
                
CREATE INDEX `IX_game_live_queue_profile_id` ON `game_live_queue` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_live_queue_game_id','game_live_queue');
                
CREATE INDEX `IX_game_live_queue_game_id` ON `game_live_queue` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_live_queue_profile_id_game_id','game_live_queue');
                
CREATE INDEX `IX_game_live_queue_profile_id_game_id` ON `game_live_queue` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_live_recent_queue_profile_id','game_live_recent_queue');
                
CREATE INDEX `IX_game_live_recent_queue_profile_id` ON `game_live_recent_queue` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_live_recent_queue_game_id','game_live_recent_queue');
                
CREATE INDEX `IX_game_live_recent_queue_game_id` ON `game_live_recent_queue` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_live_recent_queue_profile_id_game_id','game_live_recent_queue');
                
CREATE INDEX `IX_game_live_recent_queue_profile_id_game_id` ON `game_live_recent_queue` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_profile_statistic_key','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key` ON `game_profile_statistic` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_profile_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_profile_id` ON `game_profile_statistic` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_username','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_username` ON `game_profile_statistic` 
(
                    
    `username` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_game_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_game_id` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_game_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_game_id` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_game_id_level','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_game_id_level` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
                    
    , `level` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_profile_id_game_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_profile_id_game_id` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_username_game_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_username_game_id` ON `game_profile_statistic` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_username','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_username` ON `game_profile_statistic` 
(
                    
    `username` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_username_game_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_username_game_id` ON `game_profile_statistic` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_username_game_id_type','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_username_game_id_type` ON `game_profile_statistic` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_profile_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_profile_id` ON `game_profile_statistic` 
(
                    
    `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_profile_id_game_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_profile_id_game_id` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_profile_id_game_id_type','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_profile_id_game_id_type` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_game_id_profile_id','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_game_id_profile_id` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_statistic_key_game_id_type','game_profile_statistic');
                
CREATE INDEX `IX_game_profile_statistic_key_game_id_type` ON `game_profile_statistic` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_statistic_meta_key','game_statistic_meta');
                
CREATE INDEX `IX_game_statistic_meta_key` ON `game_statistic_meta` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_meta_game_id','game_statistic_meta');
                
CREATE INDEX `IX_game_statistic_meta_game_id` ON `game_statistic_meta` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_meta_key_game_id','game_statistic_meta');
                
CREATE INDEX `IX_game_statistic_meta_key_game_id` ON `game_statistic_meta` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_meta_key_type','game_statistic_meta');
                
CREATE INDEX `IX_game_statistic_meta_key_type` ON `game_statistic_meta` 
(
                    
    `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_meta_game_id_type','game_statistic_meta');
                
CREATE INDEX `IX_game_statistic_meta_game_id_type` ON `game_statistic_meta` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
);
                
CALL drop_index_if_exists('IX_game_statistic_meta_key_game_id_type','game_statistic_meta');
                
CREATE INDEX `IX_game_statistic_meta_key_game_id_type` ON `game_statistic_meta` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_profile_statistic_timestamp_key_profile_id_game_id_timestamp','game_profile_statistic_timestamp');
                
CREATE INDEX `IX_game_profile_statistic_timestamp_key_profile_id_game_id_timestamp` ON `game_profile_statistic_timestamp` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
                    
    , `timestamp` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_key_meta_key','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key` ON `game_key_meta` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_game_id','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_game_id` ON `game_key_meta` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_key_stat_key_level_game_id','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key_stat_key_level_game_id` ON `game_key_meta` 
(
                    
    `game_id` ASC
                    
    , `key_level` ASC
                    
    , `key_stat` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_key_stat_key_level_game_id_level','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key_stat_key_level_game_id_level` ON `game_key_meta` 
(
                    
    `game_id` ASC
                    
    , `key_level` ASC
                    
    , `key_stat` ASC
                    
    , `level` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_key_stat_key_level_type','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key_stat_key_level_type` ON `game_key_meta` 
(
                    
    `key_level` ASC
                    
    , `type` ASC
                    
    , `key_stat` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_key_game_id','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key_game_id` ON `game_key_meta` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_key_game_id_level','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key_game_id_level` ON `game_key_meta` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
                    
    , `level` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_key_type','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key_type` ON `game_key_meta` 
(
                    
    `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_game_id_type','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_game_id_type` ON `game_key_meta` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
);
                
CALL drop_index_if_exists('IX_game_key_meta_key_game_id_type','game_key_meta');
                
CREATE INDEX `IX_game_key_meta_key_game_id_type` ON `game_key_meta` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_level_key','game_level');
                
CREATE INDEX `IX_game_level_key` ON `game_level` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_level_key_game_id','game_level');
                
CREATE INDEX `IX_game_level_key_game_id` ON `game_level` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_level_key_game_id_type','game_level');
                
CREATE INDEX `IX_game_level_key_game_id_type` ON `game_level` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_profile_achievement_key','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key` ON `game_profile_achievement` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_profile_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_profile_id` ON `game_profile_achievement` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_username','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_username` ON `game_profile_achievement` 
(
                    
    `username` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_game_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_game_id` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_game_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_game_id` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_game_id_level','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_game_id_level` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
                    
    , `level` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_profile_id_game_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_profile_id_game_id` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_username_game_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_username_game_id` ON `game_profile_achievement` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_username','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_username` ON `game_profile_achievement` 
(
                    
    `username` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_username_game_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_username_game_id` ON `game_profile_achievement` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_username_game_id_type','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_username_game_id_type` ON `game_profile_achievement` 
(
                    
    `username` ASC
                    
    , `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_profile_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_profile_id` ON `game_profile_achievement` 
(
                    
    `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_profile_id_game_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_profile_id_game_id` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_profile_id_game_id_type','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_profile_id_game_id_type` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_game_id_profile_id','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_game_id_profile_id` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
                    
    , `profile_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_profile_achievement_key_game_id_type','game_profile_achievement');
                
CREATE INDEX `IX_game_profile_achievement_key_game_id_type` ON `game_profile_achievement` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_game_achievement_meta_key','game_achievement_meta');
                
CREATE INDEX `IX_game_achievement_meta_key` ON `game_achievement_meta` 
(
                    
    `key` ASC
);
                
CALL drop_index_if_exists('IX_game_achievement_meta_game_id','game_achievement_meta');
                
CREATE INDEX `IX_game_achievement_meta_game_id` ON `game_achievement_meta` 
(
                    
    `game_id` ASC
);
                
CALL drop_index_if_exists('IX_game_achievement_meta_key_game_id','game_achievement_meta');
                
CREATE INDEX `IX_game_achievement_meta_key_game_id` ON `game_achievement_meta` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_achievement_meta_key_game_id_level','game_achievement_meta');
                
CREATE INDEX `IX_game_achievement_meta_key_game_id_level` ON `game_achievement_meta` 
(
                    
    `game_id` ASC
                    
    , `key` ASC
                    
    , `level` ASC
);
                
CALL drop_index_if_exists('IX_game_achievement_meta_key_type','game_achievement_meta');
                
CREATE INDEX `IX_game_achievement_meta_key_type` ON `game_achievement_meta` 
(
                    
    `type` ASC
                    
    , `key` ASC
);
                
CALL drop_index_if_exists('IX_game_achievement_meta_game_id_type','game_achievement_meta');
                
CREATE INDEX `IX_game_achievement_meta_game_id_type` ON `game_achievement_meta` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
);
                
CALL drop_index_if_exists('IX_game_achievement_meta_key_game_id_type','game_achievement_meta');
                
CREATE INDEX `IX_game_achievement_meta_key_game_id_type` ON `game_achievement_meta` 
(
                    
    `game_id` ASC
                    
    , `type` ASC
                    
    , `key` ASC
);

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Game - game

                       
DROP PROCEDURE IF EXISTS `usp_game_count`;
delimiter $$
CREATE PROCEDURE `usp_game_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_count_code`;
delimiter $$
CREATE PROCEDURE `usp_game_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_count_name`;
delimiter $$
CREATE PROCEDURE `usp_game_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_game_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_count_app_id`;
delimiter $$
CREATE PROCEDURE `usp_game_count_app_id`
(
    in_app_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game`
    WHERE 1=1
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_count_org_id_app_id`;
delimiter $$
CREATE PROCEDURE `usp_game_count_org_id_app_id`
(
    in_org_id BINARY(16) 
    , in_app_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Game - game

                       
DROP PROCEDURE IF EXISTS `usp_game_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `app_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game` WHERE 1=1 ');
    
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
-- MODEL: Game - game

                       
DROP PROCEDURE IF EXISTS `usp_game_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_app_id BINARY(16) 
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
                    FROM  `game`  
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
                    UPDATE `game` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `app_id` = in_app_id
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
                    INSERT INTO `game`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `org_id`
                        , `uuid`
                        , `app_id`
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
                        , in_org_id
                        , in_uuid
                        , in_app_id
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

DROP PROCEDURE IF EXISTS `usp_game_set_code`;
delimiter $$
CREATE PROCEDURE `usp_game_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_app_id BINARY(16) 
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
                    FROM  `game`  
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
                    UPDATE `game` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `app_id` = in_app_id
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
                    INSERT INTO `game`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `org_id`
                        , `uuid`
                        , `app_id`
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
                        , in_org_id
                        , in_uuid
                        , in_app_id
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

DROP PROCEDURE IF EXISTS `usp_game_set_name`;
delimiter $$
CREATE PROCEDURE `usp_game_set_name`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_app_id BINARY(16) 
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
                    FROM  `game`  
                    WHERE 1=1
                    AND lower(`name`) = lower(in_name)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `app_id` = in_app_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`name`) = lower(in_name)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `org_id`
                        , `uuid`
                        , `app_id`
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
                        , in_org_id
                        , in_uuid
                        , in_app_id
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

DROP PROCEDURE IF EXISTS `usp_game_set_org_id`;
delimiter $$
CREATE PROCEDURE `usp_game_set_org_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_app_id BINARY(16) 
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
                    FROM  `game`  
                    WHERE 1=1
                    AND `org_id` = in_org_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `app_id` = in_app_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `org_id` = in_org_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `org_id`
                        , `uuid`
                        , `app_id`
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
                        , in_org_id
                        , in_uuid
                        , in_app_id
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

DROP PROCEDURE IF EXISTS `usp_game_set_app_id`;
delimiter $$
CREATE PROCEDURE `usp_game_set_app_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_app_id BINARY(16) 
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
                    FROM  `game`  
                    WHERE 1=1
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
                    UPDATE `game` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `app_id` = in_app_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
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
                    INSERT INTO `game`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `org_id`
                        , `uuid`
                        , `app_id`
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
                        , in_org_id
                        , in_uuid
                        , in_app_id
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

DROP PROCEDURE IF EXISTS `usp_game_set_org_id_app_id`;
delimiter $$
CREATE PROCEDURE `usp_game_set_org_id_app_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_org_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_app_id BINARY(16) 
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
                    FROM  `game`  
                    WHERE 1=1
                    AND `org_id` = in_org_id
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
                    UPDATE `game` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `org_id` = in_org_id
                        , `uuid` = in_uuid
                        , `app_id` = in_app_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `org_id` = in_org_id
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
                    INSERT INTO `game`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `org_id`
                        , `uuid`
                        , `app_id`
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
                        , in_org_id
                        , in_uuid
                        , in_app_id
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
-- MODEL: Game - game

                       
DROP PROCEDURE IF EXISTS `usp_game_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_del_code`;

delimiter $$
CREATE PROCEDURE `usp_game_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `game`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_del_name`;

delimiter $$
CREATE PROCEDURE `usp_game_del_name`
(
    in_name VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `game`
    WHERE 1=1                        
    AND lower("name") = lower(in_name)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_del_org_id`;

delimiter $$
CREATE PROCEDURE `usp_game_del_org_id`
(
    in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game`
    WHERE 1=1                        
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_del_app_id`;

delimiter $$
CREATE PROCEDURE `usp_game_del_app_id`
(
    in_app_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game`
    WHERE 1=1                        
    AND "app_id" = in_app_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_del_org_id_app_id`;

delimiter $$
CREATE PROCEDURE `usp_game_del_org_id_app_id`
(
    in_org_id BINARY(16) 
    , in_app_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game`
    WHERE 1=1                        
    AND "org_id" = in_org_id
    AND "app_id" = in_app_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Game - game

                       
DROP PROCEDURE IF EXISTS `usp_game_get`;

delimiter $$
CREATE PROCEDURE `usp_game_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `org_id`
        , `uuid`
        , `app_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_get_uuid`
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
        , `org_id`
        , `uuid`
        , `app_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_get_code`;

delimiter $$
CREATE PROCEDURE `usp_game_get_code`
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
        , `org_id`
        , `uuid`
        , `app_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_get_name`;

delimiter $$
CREATE PROCEDURE `usp_game_get_name`
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
        , `org_id`
        , `uuid`
        , `app_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_game_get_org_id`
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
        , `org_id`
        , `uuid`
        , `app_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_get_app_id`;

delimiter $$
CREATE PROCEDURE `usp_game_get_app_id`
(
    in_app_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `org_id`
        , `uuid`
        , `app_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game`
    WHERE 1=1
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_get_org_id_app_id`;

delimiter $$
CREATE PROCEDURE `usp_game_get_org_id_app_id`
(
    in_org_id BINARY(16) 
    , in_app_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `org_id`
        , `uuid`
        , `app_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameCategory - game_category

                       
DROP PROCEDURE IF EXISTS `usp_game_category_count`;
delimiter $$
CREATE PROCEDURE `usp_game_category_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_category_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_count_code`;
delimiter $$
CREATE PROCEDURE `usp_game_category_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_count_name`;
delimiter $$
CREATE PROCEDURE `usp_game_category_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_count_org_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_count_org_id`
(
    in_org_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_count_type_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_count_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_count_org_id_type_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_count_org_id_type_id`
(
    in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategory - game_category

                       
DROP PROCEDURE IF EXISTS `usp_game_category_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_category_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `org_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_category` WHERE 1=1 ');
    
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
-- MODEL: GameCategory - game_category

                       
DROP PROCEDURE IF EXISTS `usp_game_category_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_category_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
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
                    FROM  `game_category`  
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
                    UPDATE `game_category` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
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
                    INSERT INTO `game_category`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
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
-- MODEL: GameCategory - game_category

                       
DROP PROCEDURE IF EXISTS `usp_game_category_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_category_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_category_del_code_org_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_del_code_org_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    AND "org_id" = in_org_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_category_del_code_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_del_code_org_id_type_id`
(
    in_code VARCHAR (255) 
    , in_org_id BINARY(16) 
    , in_type_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category`
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
-- MODEL: GameCategory - game_category

                       
DROP PROCEDURE IF EXISTS `usp_game_category_get`;

delimiter $$
CREATE PROCEDURE `usp_game_category_get`
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
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_category`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_category_get_uuid`
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
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_category`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_get_code`;

delimiter $$
CREATE PROCEDURE `usp_game_category_get_code`
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
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_category`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_get_name`;

delimiter $$
CREATE PROCEDURE `usp_game_category_get_name`
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
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_category`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_get_org_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_get_org_id`
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
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_category`
    WHERE 1=1
    AND `org_id` = in_org_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_get_type_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_get_type_id`
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
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_category`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_get_org_id_type_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_get_org_id_type_id`
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
        , `type_id`
        , `org_id`
        , `uuid`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_category`
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
-- MODEL: GameCategoryTree - game_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_game_category_tree_count`;
delimiter $$
CREATE PROCEDURE `usp_game_category_tree_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_tree`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_category_tree_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_tree`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_count_parent_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_tree_count_parent_id`
(
    in_parent_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_count_category_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_tree_count_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_tree`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_count_parent_id_category_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_tree_count_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_game_category_tree_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_browse_filter`
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
    
    SET @stable = CONCAT('', ' FROM `game_category_tree` WHERE 1=1 ');
    
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
-- MODEL: GameCategoryTree - game_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_game_category_tree_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_category_tree_set_uuid`
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
                    FROM  `game_category_tree`  
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
                    UPDATE `game_category_tree` 
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
                    INSERT INTO `game_category_tree`
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
-- MODEL: GameCategoryTree - game_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_game_category_tree_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category_tree`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_category_tree_del_parent_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_del_parent_id`
(
    in_parent_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category_tree`
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_category_tree_del_category_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_del_category_id`
(
    in_category_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category_tree`
    WHERE 1=1                        
    AND "category_id" = in_category_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_category_tree_del_parent_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_del_parent_id_category_id`
(
    in_parent_id BINARY(16) 
    , in_category_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category_tree`
    WHERE 1=1                        
    AND "parent_id" = in_parent_id
    AND "category_id" = in_category_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree

                       
DROP PROCEDURE IF EXISTS `usp_game_category_tree_get`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_get`
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
    FROM `game_category_tree`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_get_uuid`
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
    FROM `game_category_tree`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_get_parent_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_get_parent_id`
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
    FROM `game_category_tree`
    WHERE 1=1
    AND `parent_id` = in_parent_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_get_category_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_get_category_id`
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
    FROM `game_category_tree`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_tree_get_parent_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_tree_get_parent_id_category_id`
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
    FROM `game_category_tree`
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
-- MODEL: GameCategoryAssoc - game_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_game_category_assoc_count`;
delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_assoc`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_assoc`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_assoc`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_count_category_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_count_category_id`
(
    in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_assoc`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_count_game_id_category_id`;
delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_count_game_id_category_id`
(
    in_game_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_category_assoc`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_game_category_assoc_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `category_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `game_category_assoc` WHERE 1=1 ');
    
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
-- MODEL: GameCategoryAssoc - game_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_game_category_assoc_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_game_id BINARY(16) 
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
                    FROM  `game_category_assoc`  
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
                    UPDATE `game_category_assoc` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `game_id` = in_game_id
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
                    INSERT INTO `game_category_assoc`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `game_id`
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
                        , in_game_id
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
-- MODEL: GameCategoryAssoc - game_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_game_category_assoc_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_category_assoc`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc

                       
DROP PROCEDURE IF EXISTS `usp_game_category_assoc_get`;

delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `category_id`
        , `type`
    FROM `game_category_assoc`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_get_uuid`
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
        , `game_id`
        , `category_id`
        , `type`
    FROM `game_category_assoc`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `category_id`
        , `type`
    FROM `game_category_assoc`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_get_category_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_get_category_id`
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
        , `game_id`
        , `category_id`
        , `type`
    FROM `game_category_assoc`
    WHERE 1=1
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_category_assoc_get_game_id_category_id`;

delimiter $$
CREATE PROCEDURE `usp_game_category_assoc_get_game_id_category_id`
(
    in_game_id BINARY(16) 
    , in_category_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `category_id`
        , `type`
    FROM `game_category_assoc`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `category_id` = in_category_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameType - game_type

                       
DROP PROCEDURE IF EXISTS `usp_game_type_count`;
delimiter $$
CREATE PROCEDURE `usp_game_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_type_count_code`;
delimiter $$
CREATE PROCEDURE `usp_game_type_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_type_count_name`;
delimiter $$
CREATE PROCEDURE `usp_game_type_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_type`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameType - game_type

                       
DROP PROCEDURE IF EXISTS `usp_game_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_type_browse_filter`
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
    
    SET @stable = CONCAT('', ' FROM `game_type` WHERE 1=1 ');
    
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
-- MODEL: GameType - game_type

                       
DROP PROCEDURE IF EXISTS `usp_game_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_type_set_uuid`
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
                    FROM  `game_type`  
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
                    UPDATE `game_type` 
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
                    INSERT INTO `game_type`
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
-- MODEL: GameType - game_type

                       
DROP PROCEDURE IF EXISTS `usp_game_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameType - game_type

                       
DROP PROCEDURE IF EXISTS `usp_game_type_get`;

delimiter $$
CREATE PROCEDURE `usp_game_type_get`
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
    FROM `game_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_type_get_uuid`
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
    FROM `game_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_game_type_get_code`
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
    FROM `game_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_type_get_name`;

delimiter $$
CREATE PROCEDURE `usp_game_type_get_name`
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
    FROM `game_type`
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
-- MODEL: ProfileGame - profile_game

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGame - profile_game

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `game_profile`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `profile_version`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `profile_game` WHERE 1=1 ');
    
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
-- MODEL: ProfileGame - profile_game

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_type_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_profile TEXT 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_version VARCHAR (50) 
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
                    FROM  `profile_game`  
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
                    UPDATE `profile_game` 
                    SET
                        `status` = in_status
                        , `type_id` = in_type_id
                        , `profile_id` = in_profile_id
                        , `game_profile` = in_game_profile
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_version` = in_profile_version
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
                    INSERT INTO `profile_game`
                    (
                        `status`
                        , `type_id`
                        , `profile_id`
                        , `game_profile`
                        , `active`
                        , `game_id`
                        , `uuid`
                        , `date_modified`
                        , `profile_version`
                        , `date_created`
                        , `type`
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
-- MODEL: ProfileGame - profile_game

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_game`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGame - profile_game

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `type_id`
        , `profile_id`
        , `game_profile`
        , `active`
        , `game_id`
        , `uuid`
        , `date_modified`
        , `profile_version`
        , `date_created`
        , `type`
    FROM `profile_game`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `profile_id`
        , `game_profile`
        , `active`
        , `game_id`
        , `uuid`
        , `date_modified`
        , `profile_version`
        , `date_created`
        , `type`
    FROM `profile_game`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `profile_id`
        , `game_profile`
        , `active`
        , `game_id`
        , `uuid`
        , `date_modified`
        , `profile_version`
        , `date_created`
        , `type`
    FROM `profile_game`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `profile_id`
        , `game_profile`
        , `active`
        , `game_id`
        , `uuid`
        , `date_modified`
        , `profile_version`
        , `date_created`
        , `type`
    FROM `profile_game`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `type_id`
        , `profile_id`
        , `game_profile`
        , `active`
        , `game_id`
        , `uuid`
        , `date_modified`
        , `profile_version`
        , `date_created`
        , `type`
    FROM `profile_game`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_network_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_network_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_network`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_network_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_network`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_network_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_network`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_network_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_network`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_network_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_network`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_network_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_network_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `hash`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `game_network_id`');
    SET @sfields = CONCAT(@sfields, ', `network_username`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `secret`');
    SET @sfields = CONCAT(@sfields, ', `token`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `profile_game_network` WHERE 1=1 ');
    
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
-- MODEL: ProfileGameNetwork - profile_game_network

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_network_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_network_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (500) 
    , in_profile_id BINARY(16) 
    , in_game_network_id BINARY(16) 
    , in_network_username VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_secret VARCHAR (500) 
    , in_token VARCHAR (500) 
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
                    FROM  `profile_game_network`  
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
                    UPDATE `profile_game_network` 
                    SET
                        `status` = in_status
                        , `hash` = in_hash
                        , `profile_id` = in_profile_id
                        , `game_network_id` = in_game_network_id
                        , `network_username` = in_network_username
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `secret` = in_secret
                        , `token` = in_token
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
                    INSERT INTO `profile_game_network`
                    (
                        `status`
                        , `hash`
                        , `profile_id`
                        , `game_network_id`
                        , `network_username`
                        , `active`
                        , `game_id`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `secret`
                        , `token`
                        , `date_created`
                        , `type`
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
                        , in_data
                        , in_uuid
                        , in_date_modified
                        , in_secret
                        , in_token
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
-- MODEL: ProfileGameNetwork - profile_game_network

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_network_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_network_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_game_network`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_network_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_network_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `hash`
        , `profile_id`
        , `game_network_id`
        , `network_username`
        , `active`
        , `game_id`
        , `data`
        , `uuid`
        , `date_modified`
        , `secret`
        , `token`
        , `date_created`
        , `type`
    FROM `profile_game_network`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_network_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `hash`
        , `profile_id`
        , `game_network_id`
        , `network_username`
        , `active`
        , `game_id`
        , `data`
        , `uuid`
        , `date_modified`
        , `secret`
        , `token`
        , `date_created`
        , `type`
    FROM `profile_game_network`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_network_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `hash`
        , `profile_id`
        , `game_network_id`
        , `network_username`
        , `active`
        , `game_id`
        , `data`
        , `uuid`
        , `date_modified`
        , `secret`
        , `token`
        , `date_created`
        , `type`
    FROM `profile_game_network`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_network_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `hash`
        , `profile_id`
        , `game_network_id`
        , `network_username`
        , `active`
        , `game_id`
        , `data`
        , `uuid`
        , `date_modified`
        , `secret`
        , `token`
        , `date_created`
        , `type`
    FROM `profile_game_network`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_network_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_network_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `hash`
        , `profile_id`
        , `game_network_id`
        , `network_username`
        , `active`
        , `game_id`
        , `data`
        , `uuid`
        , `date_modified`
        , `secret`
        , `token`
        , `date_created`
        , `type`
    FROM `profile_game_network`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_data_attribute`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_data_attribute`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_data_attribute`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_count_profile_id_game_id_code`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_count_profile_id_game_id_code`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_code VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_data_attribute`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_browse_filter`
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
    
    SET @sfields = CONCAT('', '`code`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `val`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `otype`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    
    SET @stable = CONCAT('', ' FROM `profile_game_data_attribute` WHERE 1=1 ');
    
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
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_set_uuid`
(
    in_set_type varchar(50)                      
    , in_code VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_val TEXT 
    , in_profile_id BINARY(16) 
    , in_otype VARCHAR (500) 
    , in_game_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_name VARCHAR (500) 
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
                    FROM  `profile_game_data_attribute`  
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
                    UPDATE `profile_game_data_attribute` 
                    SET
                        `code` = in_code
                        , `uuid` = in_uuid
                        , `val` = in_val
                        , `profile_id` = in_profile_id
                        , `otype` = in_otype
                        , `game_id` = in_game_id
                        , `type` = in_type
                        , `name` = in_name
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
                    INSERT INTO `profile_game_data_attribute`
                    (
                        `code`
                        , `uuid`
                        , `val`
                        , `profile_id`
                        , `otype`
                        , `game_id`
                        , `type`
                        , `name`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_set_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_set_profile_id`
(
    in_set_type varchar(50)                      
    , in_code VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_val TEXT 
    , in_profile_id BINARY(16) 
    , in_otype VARCHAR (500) 
    , in_game_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_name VARCHAR (500) 
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
                    FROM  `profile_game_data_attribute`  
                    WHERE 1=1
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
                    UPDATE `profile_game_data_attribute` 
                    SET
                        `code` = in_code
                        , `uuid` = in_uuid
                        , `val` = in_val
                        , `profile_id` = in_profile_id
                        , `otype` = in_otype
                        , `game_id` = in_game_id
                        , `type` = in_type
                        , `name` = in_name
                    WHERE 1=1
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
                    INSERT INTO `profile_game_data_attribute`
                    (
                        `code`
                        , `uuid`
                        , `val`
                        , `profile_id`
                        , `otype`
                        , `game_id`
                        , `type`
                        , `name`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_set_profile_id_game_id_code`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_set_profile_id_game_id_code`
(
    in_set_type varchar(50)                      
    , in_code VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_val TEXT 
    , in_profile_id BINARY(16) 
    , in_otype VARCHAR (500) 
    , in_game_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_name VARCHAR (500) 
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
                    FROM  `profile_game_data_attribute`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
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
                    UPDATE `profile_game_data_attribute` 
                    SET
                        `code` = in_code
                        , `uuid` = in_uuid
                        , `val` = in_val
                        , `profile_id` = in_profile_id
                        , `otype` = in_otype
                        , `game_id` = in_game_id
                        , `type` = in_type
                        , `name` = in_name
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
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
                    INSERT INTO `profile_game_data_attribute`
                    (
                        `code`
                        , `uuid`
                        , `val`
                        , `profile_id`
                        , `otype`
                        , `game_id`
                        , `type`
                        , `name`
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
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_game_data_attribute`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_del_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_del_profile_id`
(
    in_profile_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_game_data_attribute`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_del_profile_id_game_id_code`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_del_profile_id_game_id_code`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_code VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `profile_game_data_attribute`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `code`
        , `uuid`
        , `val`
        , `profile_id`
        , `otype`
        , `game_id`
        , `type`
        , `name`
    FROM `profile_game_data_attribute`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `code`
        , `uuid`
        , `val`
        , `profile_id`
        , `otype`
        , `game_id`
        , `type`
        , `name`
    FROM `profile_game_data_attribute`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_data_attribute_get_profile_id_game_id_code`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_data_attribute_get_profile_id_game_id_code`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_code VARCHAR (500) 
)
BEGIN
    SELECT
        `code`
        , `uuid`
        , `val`
        , `profile_id`
        , `otype`
        , `game_id`
        , `type`
        , `name`
    FROM `profile_game_data_attribute`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameSession - game_session

                       
DROP PROCEDURE IF EXISTS `usp_game_session_count`;
delimiter $$
CREATE PROCEDURE `usp_game_session_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_session`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_session_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_session`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_session_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_session`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_game_session_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_session`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_session_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_session`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameSession - game_session

                       
DROP PROCEDURE IF EXISTS `usp_game_session_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_session_browse_filter`
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
    
    SET @sfields = CONCAT('', '`game_area`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `network_uuid`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `game_level`');
    SET @sfields = CONCAT(@sfields, ', `profile_network`');
    SET @sfields = CONCAT(@sfields, ', `profile_device`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `network_external_port`');
    SET @sfields = CONCAT(@sfields, ', `game_players_connected`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `status`');
    SET @sfields = CONCAT(@sfields, ', `game_state`');
    SET @sfields = CONCAT(@sfields, ', `hash`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    SET @sfields = CONCAT(@sfields, ', `network_external_ip`');
    SET @sfields = CONCAT(@sfields, ', `profile_username`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `game_code`');
    SET @sfields = CONCAT(@sfields, ', `game_player_z`');
    SET @sfields = CONCAT(@sfields, ', `game_player_x`');
    SET @sfields = CONCAT(@sfields, ', `game_player_y`');
    SET @sfields = CONCAT(@sfields, ', `network_port`');
    SET @sfields = CONCAT(@sfields, ', `game_players_allowed`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `game_type`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `network_ip`');
    SET @sfields = CONCAT(@sfields, ', `network_use_nat`');
    
    SET @stable = CONCAT('', ' FROM `game_session` WHERE 1=1 ');
    
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
-- MODEL: GameSession - game_session

                       
DROP PROCEDURE IF EXISTS `usp_game_session_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_session_set_uuid`
(
    in_set_type varchar(50)                      
    , in_game_area VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_network_uuid VARCHAR (40) 
    , in_profile_id BINARY(16) 
    , in_game_level VARCHAR (255) 
    , in_profile_network VARCHAR (255) 
    , in_profile_device VARCHAR (50) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_network_external_port INTEGER 
    , in_game_players_connected INTEGER 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_game_state VARCHAR (50) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_network_external_ip VARCHAR (40) 
    , in_profile_username VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_code VARCHAR (255) 
    , in_game_player_z decimal 
    , in_game_player_x decimal 
    , in_game_player_y decimal 
    , in_network_port INTEGER 
    , in_game_players_allowed INTEGER 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_game_type VARCHAR (255) 
    , in_date_created TIMESTAMP 
    , in_network_ip VARCHAR (40) 
    , in_network_use_nat int 
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
                    FROM  `game_session`  
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
                    UPDATE `game_session` 
                    SET
                        `game_area` = in_game_area
                        , `code` = in_code
                        , `network_uuid` = in_network_uuid
                        , `profile_id` = in_profile_id
                        , `game_level` = in_game_level
                        , `profile_network` = in_profile_network
                        , `profile_device` = in_profile_device
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `network_external_port` = in_network_external_port
                        , `game_players_connected` = in_game_players_connected
                        , `type` = in_type
                        , `status` = in_status
                        , `game_state` = in_game_state
                        , `hash` = in_hash
                        , `description` = in_description
                        , `network_external_ip` = in_network_external_ip
                        , `profile_username` = in_profile_username
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_code` = in_game_code
                        , `game_player_z` = in_game_player_z
                        , `game_player_x` = in_game_player_x
                        , `game_player_y` = in_game_player_y
                        , `network_port` = in_network_port
                        , `game_players_allowed` = in_game_players_allowed
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `game_type` = in_game_type
                        , `date_created` = in_date_created
                        , `network_ip` = in_network_ip
                        , `network_use_nat` = in_network_use_nat
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
                    INSERT INTO `game_session`
                    (
                        `game_area`
                        , `code`
                        , `network_uuid`
                        , `profile_id`
                        , `game_level`
                        , `profile_network`
                        , `profile_device`
                        , `display_name`
                        , `uuid`
                        , `network_external_port`
                        , `game_players_connected`
                        , `type`
                        , `status`
                        , `game_state`
                        , `hash`
                        , `description`
                        , `network_external_ip`
                        , `profile_username`
                        , `active`
                        , `game_id`
                        , `game_code`
                        , `game_player_z`
                        , `game_player_x`
                        , `game_player_y`
                        , `network_port`
                        , `game_players_allowed`
                        , `name`
                        , `date_modified`
                        , `game_type`
                        , `date_created`
                        , `network_ip`
                        , `network_use_nat`
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
-- MODEL: GameSession - game_session

                       
DROP PROCEDURE IF EXISTS `usp_game_session_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_session_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_session`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameSession - game_session

                       
DROP PROCEDURE IF EXISTS `usp_game_session_get`;

delimiter $$
CREATE PROCEDURE `usp_game_session_get`
(
)                        
BEGIN
    SELECT
        `game_area`
        , `code`
        , `network_uuid`
        , `profile_id`
        , `game_level`
        , `profile_network`
        , `profile_device`
        , `display_name`
        , `uuid`
        , `network_external_port`
        , `game_players_connected`
        , `type`
        , `status`
        , `game_state`
        , `hash`
        , `description`
        , `network_external_ip`
        , `profile_username`
        , `active`
        , `game_id`
        , `game_code`
        , `game_player_z`
        , `game_player_x`
        , `game_player_y`
        , `network_port`
        , `game_players_allowed`
        , `name`
        , `date_modified`
        , `game_type`
        , `date_created`
        , `network_ip`
        , `network_use_nat`
    FROM `game_session`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_session_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `game_area`
        , `code`
        , `network_uuid`
        , `profile_id`
        , `game_level`
        , `profile_network`
        , `profile_device`
        , `display_name`
        , `uuid`
        , `network_external_port`
        , `game_players_connected`
        , `type`
        , `status`
        , `game_state`
        , `hash`
        , `description`
        , `network_external_ip`
        , `profile_username`
        , `active`
        , `game_id`
        , `game_code`
        , `game_player_z`
        , `game_player_x`
        , `game_player_y`
        , `network_port`
        , `game_players_allowed`
        , `name`
        , `date_modified`
        , `game_type`
        , `date_created`
        , `network_ip`
        , `network_use_nat`
    FROM `game_session`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_session_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `game_area`
        , `code`
        , `network_uuid`
        , `profile_id`
        , `game_level`
        , `profile_network`
        , `profile_device`
        , `display_name`
        , `uuid`
        , `network_external_port`
        , `game_players_connected`
        , `type`
        , `status`
        , `game_state`
        , `hash`
        , `description`
        , `network_external_ip`
        , `profile_username`
        , `active`
        , `game_id`
        , `game_code`
        , `game_player_z`
        , `game_player_x`
        , `game_player_y`
        , `network_port`
        , `game_players_allowed`
        , `name`
        , `date_modified`
        , `game_type`
        , `date_created`
        , `network_ip`
        , `network_use_nat`
    FROM `game_session`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_game_session_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `game_area`
        , `code`
        , `network_uuid`
        , `profile_id`
        , `game_level`
        , `profile_network`
        , `profile_device`
        , `display_name`
        , `uuid`
        , `network_external_port`
        , `game_players_connected`
        , `type`
        , `status`
        , `game_state`
        , `hash`
        , `description`
        , `network_external_ip`
        , `profile_username`
        , `active`
        , `game_id`
        , `game_code`
        , `game_player_z`
        , `game_player_x`
        , `game_player_y`
        , `network_port`
        , `game_players_allowed`
        , `name`
        , `date_modified`
        , `game_type`
        , `date_created`
        , `network_ip`
        , `network_use_nat`
    FROM `game_session`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_session_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `game_area`
        , `code`
        , `network_uuid`
        , `profile_id`
        , `game_level`
        , `profile_network`
        , `profile_device`
        , `display_name`
        , `uuid`
        , `network_external_port`
        , `game_players_connected`
        , `type`
        , `status`
        , `game_state`
        , `hash`
        , `description`
        , `network_external_ip`
        , `profile_username`
        , `active`
        , `game_id`
        , `game_code`
        , `game_player_z`
        , `game_player_x`
        , `game_player_y`
        , `network_port`
        , `game_players_allowed`
        , `name`
        , `date_modified`
        , `game_type`
        , `date_created`
        , `network_ip`
        , `network_use_nat`
    FROM `game_session`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

                       
DROP PROCEDURE IF EXISTS `usp_game_session_data_count`;
delimiter $$
CREATE PROCEDURE `usp_game_session_data_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_session_data`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_data_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_session_data_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_session_data`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

                       
DROP PROCEDURE IF EXISTS `usp_game_session_data_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_session_data_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `data_results`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `data_layer_projectile`');
    SET @sfields = CONCAT(@sfields, ', `data_layer_actors`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `data_layer_enemy`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_session_data` WHERE 1=1 ');
    
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
-- MODEL: GameSessionData - game_session_data

                       
DROP PROCEDURE IF EXISTS `usp_game_session_data_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_session_data_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data_results TEXT 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_data_layer_projectile TEXT 
    , in_data_layer_actors TEXT 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_data_layer_enemy TEXT 
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
                    FROM  `game_session_data`  
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
                    UPDATE `game_session_data` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data_results` = in_data_results
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `data_layer_projectile` = in_data_layer_projectile
                        , `data_layer_actors` = in_data_layer_actors
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `data_layer_enemy` = in_data_layer_enemy
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
                    INSERT INTO `game_session_data`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data_results`
                        , `data`
                        , `uuid`
                        , `data_layer_projectile`
                        , `data_layer_actors`
                        , `active`
                        , `date_created`
                        , `data_layer_enemy`
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
-- MODEL: GameSessionData - game_session_data

                       
DROP PROCEDURE IF EXISTS `usp_game_session_data_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_session_data_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_session_data`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data

                       
DROP PROCEDURE IF EXISTS `usp_game_session_data_get`;

delimiter $$
CREATE PROCEDURE `usp_game_session_data_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data_results`
        , `data`
        , `uuid`
        , `data_layer_projectile`
        , `data_layer_actors`
        , `active`
        , `date_created`
        , `data_layer_enemy`
        , `type`
        , `description`
    FROM `game_session_data`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_session_data_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_session_data_get_uuid`
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
        , `data_results`
        , `data`
        , `uuid`
        , `data_layer_projectile`
        , `data_layer_actors`
        , `active`
        , `date_created`
        , `data_layer_enemy`
        , `type`
        , `description`
    FROM `game_session_data`
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
-- MODEL: GameContent - game_content

                       
DROP PROCEDURE IF EXISTS `usp_game_content_count`;
delimiter $$
CREATE PROCEDURE `usp_game_content_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_content`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_content_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_content`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_content_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_count_game_id_path`;
delimiter $$
CREATE PROCEDURE `usp_game_content_count_game_id_path`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_count_game_id_path_version`;
delimiter $$
CREATE PROCEDURE `usp_game_content_count_game_id_path_version`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_count_game_id_path_version_platform_increment`;
delimiter $$
CREATE PROCEDURE `usp_game_content_count_game_id_path_version_platform_increment`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    AND lower(`platform`) = lower(in_platform)
    AND `increment` = in_increment
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameContent - game_content

                       
DROP PROCEDURE IF EXISTS `usp_game_content_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_content_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `extension`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `filename`');
    SET @sfields = CONCAT(@sfields, ', `source`');
    SET @sfields = CONCAT(@sfields, ', `version`');
    SET @sfields = CONCAT(@sfields, ', `platform`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `path`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `increment`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `hash`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_content` WHERE 1=1 ');
    
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
-- MODEL: GameContent - game_content

                       
DROP PROCEDURE IF EXISTS `usp_game_content_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_content_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_game_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_path VARCHAR (500) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_increment INTEGER 
    , in_type VARCHAR (500) 
    , in_hash VARCHAR (255) 
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
                    FROM  `game_content`  
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
                    UPDATE `game_content` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `game_id` = in_game_id
                        , `uuid` = in_uuid
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `platform` = in_platform
                        , `content_type` = in_content_type
                        , `path` = in_path
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `increment` = in_increment
                        , `type` = in_type
                        , `hash` = in_hash
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
                    INSERT INTO `game_content`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `data`
                        , `game_id`
                        , `uuid`
                        , `filename`
                        , `source`
                        , `version`
                        , `platform`
                        , `content_type`
                        , `path`
                        , `active`
                        , `date_created`
                        , `increment`
                        , `type`
                        , `hash`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_set_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_content_set_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_game_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_path VARCHAR (500) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_increment INTEGER 
    , in_type VARCHAR (500) 
    , in_hash VARCHAR (255) 
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
                    FROM  `game_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_content` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `game_id` = in_game_id
                        , `uuid` = in_uuid
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `platform` = in_platform
                        , `content_type` = in_content_type
                        , `path` = in_path
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `increment` = in_increment
                        , `type` = in_type
                        , `hash` = in_hash
                        , `description` = in_description
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_content`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `data`
                        , `game_id`
                        , `uuid`
                        , `filename`
                        , `source`
                        , `version`
                        , `platform`
                        , `content_type`
                        , `path`
                        , `active`
                        , `date_created`
                        , `increment`
                        , `type`
                        , `hash`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_set_game_id_path`;
delimiter $$
CREATE PROCEDURE `usp_game_content_set_game_id_path`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_game_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_path VARCHAR (500) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_increment INTEGER 
    , in_type VARCHAR (500) 
    , in_hash VARCHAR (255) 
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
                    FROM  `game_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`path`) = lower(in_path)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_content` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `game_id` = in_game_id
                        , `uuid` = in_uuid
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `platform` = in_platform
                        , `content_type` = in_content_type
                        , `path` = in_path
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `increment` = in_increment
                        , `type` = in_type
                        , `hash` = in_hash
                        , `description` = in_description
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`path`) = lower(in_path)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_content`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `data`
                        , `game_id`
                        , `uuid`
                        , `filename`
                        , `source`
                        , `version`
                        , `platform`
                        , `content_type`
                        , `path`
                        , `active`
                        , `date_created`
                        , `increment`
                        , `type`
                        , `hash`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_set_game_id_path_version`;
delimiter $$
CREATE PROCEDURE `usp_game_content_set_game_id_path_version`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_game_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_path VARCHAR (500) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_increment INTEGER 
    , in_type VARCHAR (500) 
    , in_hash VARCHAR (255) 
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
                    FROM  `game_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_content` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `game_id` = in_game_id
                        , `uuid` = in_uuid
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `platform` = in_platform
                        , `content_type` = in_content_type
                        , `path` = in_path
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `increment` = in_increment
                        , `type` = in_type
                        , `hash` = in_hash
                        , `description` = in_description
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_content`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `data`
                        , `game_id`
                        , `uuid`
                        , `filename`
                        , `source`
                        , `version`
                        , `platform`
                        , `content_type`
                        , `path`
                        , `active`
                        , `date_created`
                        , `increment`
                        , `type`
                        , `hash`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_set_game_id_path_version_platform_increment`;
delimiter $$
CREATE PROCEDURE `usp_game_content_set_game_id_path_version_platform_increment`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_game_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_path VARCHAR (500) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_increment INTEGER 
    , in_type VARCHAR (500) 
    , in_hash VARCHAR (255) 
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
                    FROM  `game_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    AND lower(`platform`) = lower(in_platform)
                    AND `increment` = in_increment
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_content` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `game_id` = in_game_id
                        , `uuid` = in_uuid
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `platform` = in_platform
                        , `content_type` = in_content_type
                        , `path` = in_path
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `increment` = in_increment
                        , `type` = in_type
                        , `hash` = in_hash
                        , `description` = in_description
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    AND lower(`platform`) = lower(in_platform)
                    AND `increment` = in_increment
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_content`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `data`
                        , `game_id`
                        , `uuid`
                        , `filename`
                        , `source`
                        , `version`
                        , `platform`
                        , `content_type`
                        , `path`
                        , `active`
                        , `date_created`
                        , `increment`
                        , `type`
                        , `hash`
                        , `description`
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
-- MODEL: GameContent - game_content

                       
DROP PROCEDURE IF EXISTS `usp_game_content_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_content_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_content`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_content_del_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_content_del_game_id`
(
    in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_content_del_game_id_path`;

delimiter $$
CREATE PROCEDURE `usp_game_content_del_game_id_path`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_content_del_game_id_path_version`;

delimiter $$
CREATE PROCEDURE `usp_game_content_del_game_id_path_version`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `game_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_content_del_game_id_path_version_platform_increment`;

delimiter $$
CREATE PROCEDURE `usp_game_content_del_game_id_path_version_platform_increment`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)

BEGIN
    DELETE 
    FROM `game_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameContent - game_content

                       
DROP PROCEDURE IF EXISTS `usp_game_content_get`;

delimiter $$
CREATE PROCEDURE `usp_game_content_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `extension`
        , `date_modified`
        , `data`
        , `game_id`
        , `uuid`
        , `filename`
        , `source`
        , `version`
        , `platform`
        , `content_type`
        , `path`
        , `active`
        , `date_created`
        , `increment`
        , `type`
        , `hash`
        , `description`
    FROM `game_content`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_content_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `extension`
        , `date_modified`
        , `data`
        , `game_id`
        , `uuid`
        , `filename`
        , `source`
        , `version`
        , `platform`
        , `content_type`
        , `path`
        , `active`
        , `date_created`
        , `increment`
        , `type`
        , `hash`
        , `description`
    FROM `game_content`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_content_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `extension`
        , `date_modified`
        , `data`
        , `game_id`
        , `uuid`
        , `filename`
        , `source`
        , `version`
        , `platform`
        , `content_type`
        , `path`
        , `active`
        , `date_created`
        , `increment`
        , `type`
        , `hash`
        , `description`
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_get_game_id_path`;

delimiter $$
CREATE PROCEDURE `usp_game_content_get_game_id_path`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `extension`
        , `date_modified`
        , `data`
        , `game_id`
        , `uuid`
        , `filename`
        , `source`
        , `version`
        , `platform`
        , `content_type`
        , `path`
        , `active`
        , `date_created`
        , `increment`
        , `type`
        , `hash`
        , `description`
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_get_game_id_path_version`;

delimiter $$
CREATE PROCEDURE `usp_game_content_get_game_id_path_version`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `extension`
        , `date_modified`
        , `data`
        , `game_id`
        , `uuid`
        , `filename`
        , `source`
        , `version`
        , `platform`
        , `content_type`
        , `path`
        , `active`
        , `date_created`
        , `increment`
        , `type`
        , `hash`
        , `description`
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_content_get_game_id_path_version_platform_increment`;

delimiter $$
CREATE PROCEDURE `usp_game_content_get_game_id_path_version_platform_increment`
(
    in_game_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `extension`
        , `date_modified`
        , `data`
        , `game_id`
        , `uuid`
        , `filename`
        , `source`
        , `version`
        , `platform`
        , `content_type`
        , `path`
        , `active`
        , `date_created`
        , `increment`
        , `type`
        , `hash`
        , `description`
    FROM `game_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    AND lower(`platform`) = lower(in_platform)
    AND `increment` = in_increment
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_content_count`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_profile_id`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_username`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_username`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_username`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_username`
(
    in_username VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_profile_id_path`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_profile_id_path`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_profile_id_path_version`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_profile_id_path_version`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_profile_id_path_version_`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_profile_id_path_version_`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    AND lower(`platform`) = lower(in_platform)
    AND `increment` = in_increment
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_username_path`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_username_path`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_username_path_version`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_username_path_version`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_count_game_id_username_path_version_pl`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_count_game_id_username_path_version_pl`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    AND lower(`platform`) = lower(in_platform)
    AND `increment` = in_increment
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_content_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_browse_filter`
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
    
    SET @sfields = CONCAT('', '`username`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `increment`');
    SET @sfields = CONCAT(@sfields, ', `path`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `platform`');
    SET @sfields = CONCAT(@sfields, ', `filename`');
    SET @sfields = CONCAT(@sfields, ', `source`');
    SET @sfields = CONCAT(@sfields, ', `version`');
    SET @sfields = CONCAT(@sfields, ', `game_network`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `status`');
    SET @sfields = CONCAT(@sfields, ', `hash`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `extension`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    
    SET @stable = CONCAT('', ' FROM `game_profile_content` WHERE 1=1 ');
    
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
-- MODEL: GameProfileContent - game_profile_content

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_uuid`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
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
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
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
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_profile_id`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
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
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
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
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_username`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_username`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_username`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_username`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND lower(`username`) = lower(in_username)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND lower(`username`) = lower(in_username)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_profile_id_path`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_profile_id_path`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND `profile_id` = in_profile_id
                    AND lower(`path`) = lower(in_path)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND `profile_id` = in_profile_id
                    AND lower(`path`) = lower(in_path)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_profile_id_path_version`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_profile_id_path_version`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND `profile_id` = in_profile_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND `profile_id` = in_profile_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_profile_id_path_version_pl`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_profile_id_path_version_pl`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND `profile_id` = in_profile_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    AND lower(`platform`) = lower(in_platform)
                    AND `increment` = in_increment
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND `profile_id` = in_profile_id
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    AND lower(`platform`) = lower(in_platform)
                    AND `increment` = in_increment
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_username_path`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_username_path`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    AND lower(`path`) = lower(in_path)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    AND lower(`path`) = lower(in_path)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_username_path_version`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_username_path_version`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_set_game_id_username_path_version_plat`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_content_set_game_id_username_path_version_plat`
(
    in_set_type varchar(50)                      
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_profile_id BINARY(16) 
    , in_increment INTEGER 
    , in_path VARCHAR (500) 
    , in_display_name VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_platform VARCHAR (255) 
    , in_filename VARCHAR (500) 
    , in_source VARCHAR (255) 
    , in_version VARCHAR (255) 
    , in_game_network VARCHAR (500) 
    , in_type VARCHAR (500) 
    , in_status VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_content_type VARCHAR (255) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_name VARCHAR (255) 
    , in_extension VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_date_created TIMESTAMP 
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
                    FROM  `game_profile_content`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    AND lower(`platform`) = lower(in_platform)
                    AND `increment` = in_increment
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_content` 
                    SET
                        `username` = in_username
                        , `code` = in_code
                        , `profile_id` = in_profile_id
                        , `increment` = in_increment
                        , `path` = in_path
                        , `display_name` = in_display_name
                        , `uuid` = in_uuid
                        , `platform` = in_platform
                        , `filename` = in_filename
                        , `source` = in_source
                        , `version` = in_version
                        , `game_network` = in_game_network
                        , `type` = in_type
                        , `status` = in_status
                        , `hash` = in_hash
                        , `description` = in_description
                        , `content_type` = in_content_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `name` = in_name
                        , `extension` = in_extension
                        , `date_modified` = in_date_modified
                        , `date_created` = in_date_created
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    AND lower(`username`) = lower(in_username)
                    AND lower(`path`) = lower(in_path)
                    AND lower(`version`) = lower(in_version)
                    AND lower(`platform`) = lower(in_platform)
                    AND `increment` = in_increment
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_content`
                    (
                        `username`
                        , `code`
                        , `profile_id`
                        , `increment`
                        , `path`
                        , `display_name`
                        , `uuid`
                        , `platform`
                        , `filename`
                        , `source`
                        , `version`
                        , `game_network`
                        , `type`
                        , `status`
                        , `hash`
                        , `description`
                        , `content_type`
                        , `active`
                        , `game_id`
                        , `data`
                        , `name`
                        , `extension`
                        , `date_modified`
                        , `date_created`
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
-- MODEL: GameProfileContent - game_profile_content

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_profile_id`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_username`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_username`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_username`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_username`
(
    in_username VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND lower("username") = lower(in_username)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_profile_id_path`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_profile_id_path`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_profile_id_path_version`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_profile_id_path_version`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_profile_id_path_version_pl`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_profile_id_path_version_pl`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND "profile_id" = in_profile_id
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_username_path`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_username_path`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_username_path_version`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_username_path_version`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_content_del_game_id_username_path_version_plat`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_del_game_id_username_path_version_plat`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)

BEGIN
    DELETE 
    FROM `game_profile_content`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    AND lower("username") = lower(in_username)
    AND lower("path") = lower(in_path)
    AND lower("version") = lower(in_version)
    AND lower("platform") = lower(in_platform)
    AND "increment" = in_increment
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_content_get`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get`
(
)                        
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_profile_id`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_username`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_username`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_username`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_username`
(
    in_username VARCHAR (500) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_profile_id_path`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_profile_id_path`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_profile_id_path_version`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_profile_id_path_version`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_profile_id_path_version_pl`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_profile_id_path_version_pl`
(
    in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `profile_id` = in_profile_id
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    AND lower(`platform`) = lower(in_platform)
    AND `increment` = in_increment
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_username_path`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_username_path`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    AND lower(`path`) = lower(in_path)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_username_path_version`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_username_path_version`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_content_get_game_id_username_path_version_plat`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_content_get_game_id_username_path_version_plat`
(
    in_game_id BINARY(16) 
    , in_username VARCHAR (500) 
    , in_path VARCHAR (500) 
    , in_version VARCHAR (255) 
    , in_platform VARCHAR (255) 
    , in_increment INTEGER 
)
BEGIN
    SELECT
        `username`
        , `code`
        , `profile_id`
        , `increment`
        , `path`
        , `display_name`
        , `uuid`
        , `platform`
        , `filename`
        , `source`
        , `version`
        , `game_network`
        , `type`
        , `status`
        , `hash`
        , `description`
        , `content_type`
        , `active`
        , `game_id`
        , `data`
        , `name`
        , `extension`
        , `date_modified`
        , `date_created`
    FROM `game_profile_content`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND lower(`username`) = lower(in_username)
    AND lower(`path`) = lower(in_path)
    AND lower(`version`) = lower(in_version)
    AND lower(`platform`) = lower(in_platform)
    AND `increment` = in_increment
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameApp - game_app

                       
DROP PROCEDURE IF EXISTS `usp_game_app_count`;
delimiter $$
CREATE PROCEDURE `usp_game_app_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_app_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_app_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_app`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_count_app_id`;
delimiter $$
CREATE PROCEDURE `usp_game_app_count_app_id`
(
    in_app_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_app`
    WHERE 1=1
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_count_game_id_app_id`;
delimiter $$
CREATE PROCEDURE `usp_game_app_count_game_id_app_id`
(
    in_game_id BINARY(16) 
    , in_app_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_app`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameApp - game_app

                       
DROP PROCEDURE IF EXISTS `usp_game_app_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_app_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `app_id`');
    
    SET @stable = CONCAT('', ' FROM `game_app` WHERE 1=1 ');
    
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
-- MODEL: GameApp - game_app

                       
DROP PROCEDURE IF EXISTS `usp_game_app_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_app_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_game_id BINARY(16) 
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
                    FROM  `game_app`  
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
                    UPDATE `game_app` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `game_id` = in_game_id
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
                    INSERT INTO `game_app`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `game_id`
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
                        , in_game_id
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
-- MODEL: GameApp - game_app

                       
DROP PROCEDURE IF EXISTS `usp_game_app_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_app_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_app`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameApp - game_app

                       
DROP PROCEDURE IF EXISTS `usp_game_app_get`;

delimiter $$
CREATE PROCEDURE `usp_game_app_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `type`
        , `app_id`
    FROM `game_app`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_app_get_uuid`
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
        , `game_id`
        , `type`
        , `app_id`
    FROM `game_app`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_app_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `type`
        , `app_id`
    FROM `game_app`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_get_app_id`;

delimiter $$
CREATE PROCEDURE `usp_game_app_get_app_id`
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
        , `game_id`
        , `type`
        , `app_id`
    FROM `game_app`
    WHERE 1=1
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_app_get_game_id_app_id`;

delimiter $$
CREATE PROCEDURE `usp_game_app_get_game_id_app_id`
(
    in_game_id BINARY(16) 
    , in_app_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `type`
        , `app_id`
    FROM `game_app`
    WHERE 1=1
    AND `game_id` = in_game_id
    AND `app_id` = in_app_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_location_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_location_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_location_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_count_game_location_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_location_count_game_location_id`
(
    in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_location`
    WHERE 1=1
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_location_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_location`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_count_profile_id_game_location_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_location_count_profile_id_game_location_id`
(
    in_profile_id BINARY(16) 
    , in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_game_location`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_location_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_location_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `type_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `profile_game_location` WHERE 1=1 ');
    
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
-- MODEL: ProfileGameLocation - profile_game_location

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_location_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_game_location_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_game_location_id BINARY(16) 
    , in_type_id BINARY(16) 
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
                    FROM  `profile_game_location`  
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
                    UPDATE `profile_game_location` 
                    SET
                        `status` = in_status
                        , `game_location_id` = in_game_location_id
                        , `type_id` = in_type_id
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
                    INSERT INTO `profile_game_location`
                    (
                        `status`
                        , `game_location_id`
                        , `type_id`
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
-- MODEL: ProfileGameLocation - profile_game_location

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_location_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_location_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_game_location`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location

                       
DROP PROCEDURE IF EXISTS `usp_profile_game_location_get`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_location_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_game_location`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_location_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_game_location`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_get_game_location_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_location_get_game_location_id`
(
    in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_game_location`
    WHERE 1=1
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_location_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_game_location`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_game_location_get_profile_id_game_location_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_game_location_get_profile_id_game_location_id`
(
    in_profile_id BINARY(16) 
    , in_game_location_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `game_location_id`
        , `type_id`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `profile_id`
        , `type`
    FROM `profile_game_location`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_location_id` = in_game_location_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

                       
DROP PROCEDURE IF EXISTS `usp_game_photo_count`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_photo`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_photo`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_count_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_count_external_id`
(
    in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_photo`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_count_url`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_count_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_count_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_count_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_count_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_count_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_photo`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

                       
DROP PROCEDURE IF EXISTS `usp_game_photo_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `third_party_url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_id`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `external_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_photo` WHERE 1=1 ');
    
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
-- MODEL: GamePhoto - game_photo

                       
DROP PROCEDURE IF EXISTS `usp_game_photo_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_set_uuid`
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
                    FROM  `game_photo`  
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
                    UPDATE `game_photo` 
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
                    INSERT INTO `game_photo`
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

DROP PROCEDURE IF EXISTS `usp_game_photo_set_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_set_external_id`
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
                    FROM  `game_photo`  
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
                    UPDATE `game_photo` 
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
                    INSERT INTO `game_photo`
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

DROP PROCEDURE IF EXISTS `usp_game_photo_set_url`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_set_url`
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
                    FROM  `game_photo`  
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
                    UPDATE `game_photo` 
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
                    INSERT INTO `game_photo`
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

DROP PROCEDURE IF EXISTS `usp_game_photo_set_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_set_url_external_id`
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
                    FROM  `game_photo`  
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
                    UPDATE `game_photo` 
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
                    INSERT INTO `game_photo`
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

DROP PROCEDURE IF EXISTS `usp_game_photo_set_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_photo_set_uuid_external_id`
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
                    FROM  `game_photo`  
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
                    UPDATE `game_photo` 
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
                    INSERT INTO `game_photo`
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
-- MODEL: GamePhoto - game_photo

                       
DROP PROCEDURE IF EXISTS `usp_game_photo_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_photo`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_photo_del_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_del_external_id`
(
    in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_photo`
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_photo_del_url`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_del_url`
(
    in_url VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_photo`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_photo_del_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_del_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_photo`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_photo_del_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_del_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_photo`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GamePhoto - game_photo

                       
DROP PROCEDURE IF EXISTS `usp_game_photo_get`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_get`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_photo`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_get_uuid`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_photo`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_get_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_get_external_id`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_photo`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_get_url`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_get_url`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_get_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_get_url_external_id`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_photo`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_photo_get_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_photo_get_uuid_external_id`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_photo`
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
-- MODEL: GameVideo - game_video

                       
DROP PROCEDURE IF EXISTS `usp_game_video_count`;
delimiter $$
CREATE PROCEDURE `usp_game_video_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_video`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_video_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_video`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_count_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_video_count_external_id`
(
    in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_video`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_count_url`;
delimiter $$
CREATE PROCEDURE `usp_game_video_count_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_count_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_video_count_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_count_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_video_count_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_video`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameVideo - game_video

                       
DROP PROCEDURE IF EXISTS `usp_game_video_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_video_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `third_party_url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_id`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `external_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_video` WHERE 1=1 ');
    
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
-- MODEL: GameVideo - game_video

                       
DROP PROCEDURE IF EXISTS `usp_game_video_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_video_set_uuid`
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
                    FROM  `game_video`  
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
                    UPDATE `game_video` 
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
                    INSERT INTO `game_video`
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

DROP PROCEDURE IF EXISTS `usp_game_video_set_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_video_set_external_id`
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
                    FROM  `game_video`  
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
                    UPDATE `game_video` 
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
                    INSERT INTO `game_video`
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

DROP PROCEDURE IF EXISTS `usp_game_video_set_url`;
delimiter $$
CREATE PROCEDURE `usp_game_video_set_url`
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
                    FROM  `game_video`  
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
                    UPDATE `game_video` 
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
                    INSERT INTO `game_video`
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

DROP PROCEDURE IF EXISTS `usp_game_video_set_url_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_video_set_url_external_id`
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
                    FROM  `game_video`  
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
                    UPDATE `game_video` 
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
                    INSERT INTO `game_video`
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

DROP PROCEDURE IF EXISTS `usp_game_video_set_uuid_external_id`;
delimiter $$
CREATE PROCEDURE `usp_game_video_set_uuid_external_id`
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
                    FROM  `game_video`  
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
                    UPDATE `game_video` 
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
                    INSERT INTO `game_video`
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
-- MODEL: GameVideo - game_video

                       
DROP PROCEDURE IF EXISTS `usp_game_video_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_video_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_video`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_video_del_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_video_del_external_id`
(
    in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_video`
    WHERE 1=1                        
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_video_del_url`;

delimiter $$
CREATE PROCEDURE `usp_game_video_del_url`
(
    in_url VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_video`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_video_del_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_video_del_url_external_id`
(
    in_url VARCHAR (500) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_video`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_video_del_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_video_del_uuid_external_id`
(
    in_uuid BINARY(16) 
    , in_external_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_video`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameVideo - game_video

                       
DROP PROCEDURE IF EXISTS `usp_game_video_get`;

delimiter $$
CREATE PROCEDURE `usp_game_video_get`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_video`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_video_get_uuid`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_video`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_get_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_video_get_external_id`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_video`
    WHERE 1=1
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_get_url`;

delimiter $$
CREATE PROCEDURE `usp_game_video_get_url`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_get_url_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_video_get_url_external_id`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_video`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `external_id` = in_external_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_video_get_uuid_external_id`;

delimiter $$
CREATE PROCEDURE `usp_game_video_get_uuid_external_id`
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
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `external_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_video`
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
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_count`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_count_url`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_count_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_count_url_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_count_url_game_id`
(
    in_url VARCHAR (500) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_count_uuid_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_count_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `description`');
    SET @sfields = CONCAT(@sfields, ', `game_defense`');
    SET @sfields = CONCAT(@sfields, ', `third_party_url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_id`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `game_attack`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_data`');
    SET @sfields = CONCAT(@sfields, ', `game_price`');
    SET @sfields = CONCAT(@sfields, ', `game_type`');
    SET @sfields = CONCAT(@sfields, ', `game_skill`');
    SET @sfields = CONCAT(@sfields, ', `game_health`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `game_energy`');
    SET @sfields = CONCAT(@sfields, ', `game_data`');
    
    SET @stable = CONCAT('', ' FROM `game_rpg_item_weapon` WHERE 1=1 ');
    
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
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_weapon`  
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
                    UPDATE `game_rpg_item_weapon` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
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
                    INSERT INTO `game_rpg_item_weapon`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_set_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_set_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_weapon`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_rpg_item_weapon` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_rpg_item_weapon`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_set_url`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_set_url`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_weapon`  
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
                    UPDATE `game_rpg_item_weapon` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
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
                    INSERT INTO `game_rpg_item_weapon`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_set_url_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_set_url_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_weapon`  
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_rpg_item_weapon` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_rpg_item_weapon`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_set_uuid_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_set_uuid_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_weapon`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_rpg_item_weapon` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_rpg_item_weapon`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_weapon`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_del_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_del_game_id`
(
    in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_weapon`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_del_url`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_del_url`
(
    in_url VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_weapon`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_del_url_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_del_url_game_id`
(
    in_url VARCHAR (500) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_weapon`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_del_uuid_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_del_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_weapon`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_get`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_get_url`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_get_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_get_url_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_get_url_game_id`
(
    in_url VARCHAR (500) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_weapon_get_uuid_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_weapon_get_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_weapon`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_count`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_skill`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_count_url`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_count_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_count_url_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_count_url_game_id`
(
    in_url VARCHAR (500) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_count_uuid_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_count_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `description`');
    SET @sfields = CONCAT(@sfields, ', `game_defense`');
    SET @sfields = CONCAT(@sfields, ', `third_party_url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_id`');
    SET @sfields = CONCAT(@sfields, ', `content_type`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `game_attack`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `url`');
    SET @sfields = CONCAT(@sfields, ', `third_party_data`');
    SET @sfields = CONCAT(@sfields, ', `game_price`');
    SET @sfields = CONCAT(@sfields, ', `game_type`');
    SET @sfields = CONCAT(@sfields, ', `game_skill`');
    SET @sfields = CONCAT(@sfields, ', `game_health`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `game_energy`');
    SET @sfields = CONCAT(@sfields, ', `game_data`');
    
    SET @stable = CONCAT('', ' FROM `game_rpg_item_skill` WHERE 1=1 ');
    
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
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_skill`  
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
                    UPDATE `game_rpg_item_skill` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
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
                    INSERT INTO `game_rpg_item_skill`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_set_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_set_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_skill`  
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_rpg_item_skill` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
                    WHERE 1=1
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_rpg_item_skill`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_set_url`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_set_url`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_skill`  
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
                    UPDATE `game_rpg_item_skill` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
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
                    INSERT INTO `game_rpg_item_skill`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_set_url_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_set_url_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_skill`  
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_rpg_item_skill` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_rpg_item_skill`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_set_uuid_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_set_uuid_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_third_party_oembed VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_description VARCHAR (255) 
    , in_game_defense decimal 
    , in_third_party_url VARCHAR (500) 
    , in_third_party_id VARCHAR (500) 
    , in_content_type VARCHAR (100) 
    , in_type VARCHAR (500) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_game_attack decimal 
    , in_uuid BINARY(16) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (500) 
    , in_third_party_data VARCHAR (500) 
    , in_game_price decimal 
    , in_game_type decimal 
    , in_game_skill decimal 
    , in_game_health decimal 
    , in_date_created TIMESTAMP 
    , in_game_energy decimal 
    , in_game_data TEXT 
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
                    FROM  `game_rpg_item_skill`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_rpg_item_skill` 
                    SET
                        `status` = in_status
                        , `third_party_oembed` = in_third_party_oembed
                        , `code` = in_code
                        , `description` = in_description
                        , `game_defense` = in_game_defense
                        , `third_party_url` = in_third_party_url
                        , `third_party_id` = in_third_party_id
                        , `content_type` = in_content_type
                        , `type` = in_type
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `game_attack` = in_game_attack
                        , `uuid` = in_uuid
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `third_party_data` = in_third_party_data
                        , `game_price` = in_game_price
                        , `game_type` = in_game_type
                        , `game_skill` = in_game_skill
                        , `game_health` = in_game_health
                        , `date_created` = in_date_created
                        , `game_energy` = in_game_energy
                        , `game_data` = in_game_data
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_rpg_item_skill`
                    (
                        `status`
                        , `third_party_oembed`
                        , `code`
                        , `description`
                        , `game_defense`
                        , `third_party_url`
                        , `third_party_id`
                        , `content_type`
                        , `type`
                        , `active`
                        , `game_id`
                        , `game_attack`
                        , `uuid`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `third_party_data`
                        , `game_price`
                        , `game_type`
                        , `game_skill`
                        , `game_health`
                        , `date_created`
                        , `game_energy`
                        , `game_data`
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
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_skill`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_del_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_del_game_id`
(
    in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_skill`
    WHERE 1=1                        
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_del_url`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_del_url`
(
    in_url VARCHAR (500) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_skill`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_del_url_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_del_url_game_id`
(
    in_url VARCHAR (500) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_skill`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_del_uuid_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_del_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_rpg_item_skill`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill

                       
DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_get`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_skill`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_get_url`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_get_url`
(
    in_url VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_get_url_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_get_url_game_id`
(
    in_url VARCHAR (500) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_rpg_item_skill_get_uuid_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_rpg_item_skill_get_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `third_party_oembed`
        , `code`
        , `description`
        , `game_defense`
        , `third_party_url`
        , `third_party_id`
        , `content_type`
        , `type`
        , `active`
        , `game_id`
        , `game_attack`
        , `uuid`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `third_party_data`
        , `game_price`
        , `game_type`
        , `game_skill`
        , `game_health`
        , `date_created`
        , `game_energy`
        , `game_data`
    FROM `game_rpg_item_skill`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProduct - game_product

                       
DROP PROCEDURE IF EXISTS `usp_game_product_count`;
delimiter $$
CREATE PROCEDURE `usp_game_product_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_product`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_product_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_product`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_product_count_game_id`
(
    in_game_id VARCHAR (100) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_product`
    WHERE 1=1
    AND lower(`game_id`) = lower(in_game_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_count_url`;
delimiter $$
CREATE PROCEDURE `usp_game_product_count_url`
(
    in_url VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_product`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_count_url_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_product_count_url_game_id`
(
    in_url VARCHAR (255) 
    , in_game_id VARCHAR (100) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_product`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND lower(`game_id`) = lower(in_game_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_count_uuid_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_product_count_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_product`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND lower(`game_id`) = lower(in_game_id)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProduct - game_product

                       
DROP PROCEDURE IF EXISTS `usp_game_product_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_product_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_product` WHERE 1=1 ');
    
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
-- MODEL: GameProduct - game_product

                       
DROP PROCEDURE IF EXISTS `usp_game_product_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_product_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
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
                    FROM  `game_product`  
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
                    UPDATE `game_product` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `uuid` = in_uuid
                        , `game_id` = in_game_id
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
                    INSERT INTO `game_product`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `uuid`
                        , `game_id`
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
                        , in_uuid
                        , in_game_id
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

DROP PROCEDURE IF EXISTS `usp_game_product_set_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_product_set_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
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
                    FROM  `game_product`  
                    WHERE 1=1
                    AND lower(`game_id`) = lower(in_game_id)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_product` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `uuid` = in_uuid
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`game_id`) = lower(in_game_id)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_product`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `uuid`
                        , `game_id`
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
                        , in_uuid
                        , in_game_id
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

DROP PROCEDURE IF EXISTS `usp_game_product_set_url`;
delimiter $$
CREATE PROCEDURE `usp_game_product_set_url`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
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
                    FROM  `game_product`  
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
                    UPDATE `game_product` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `uuid` = in_uuid
                        , `game_id` = in_game_id
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
                    INSERT INTO `game_product`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `uuid`
                        , `game_id`
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
                        , in_uuid
                        , in_game_id
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

DROP PROCEDURE IF EXISTS `usp_game_product_set_url_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_product_set_url_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
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
                    FROM  `game_product`  
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND lower(`game_id`) = lower(in_game_id)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_product` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `uuid` = in_uuid
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`url`) = lower(in_url)
                    AND lower(`game_id`) = lower(in_game_id)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_product`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `uuid`
                        , `game_id`
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
                        , in_uuid
                        , in_game_id
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

DROP PROCEDURE IF EXISTS `usp_game_product_set_uuid_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_product_set_uuid_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_url VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
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
                    FROM  `game_product`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND lower(`game_id`) = lower(in_game_id)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_product` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `url` = in_url
                        , `uuid` = in_uuid
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND lower(`game_id`) = lower(in_game_id)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_product`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `url`
                        , `uuid`
                        , `game_id`
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
                        , in_uuid
                        , in_game_id
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
-- MODEL: GameProduct - game_product

                       
DROP PROCEDURE IF EXISTS `usp_game_product_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_product_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_product`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_product_del_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_product_del_game_id`
(
    in_game_id VARCHAR (100) 
)

BEGIN
    DELETE 
    FROM `game_product`
    WHERE 1=1                        
    AND lower("game_id") = lower(in_game_id)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_product_del_url`;

delimiter $$
CREATE PROCEDURE `usp_game_product_del_url`
(
    in_url VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `game_product`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_product_del_url_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_product_del_url_game_id`
(
    in_url VARCHAR (255) 
    , in_game_id VARCHAR (100) 
)

BEGIN
    DELETE 
    FROM `game_product`
    WHERE 1=1                        
    AND lower("url") = lower(in_url)
    AND lower("game_id") = lower(in_game_id)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_product_del_uuid_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_product_del_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
)

BEGIN
    DELETE 
    FROM `game_product`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND lower("game_id") = lower(in_game_id)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProduct - game_product

                       
DROP PROCEDURE IF EXISTS `usp_game_product_get`;

delimiter $$
CREATE PROCEDURE `usp_game_product_get`
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
        , `uuid`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_product`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_product_get_uuid`
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
        , `uuid`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_product`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_product_get_game_id`
(
    in_game_id VARCHAR (100) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `uuid`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_product`
    WHERE 1=1
    AND lower(`game_id`) = lower(in_game_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_get_url`;

delimiter $$
CREATE PROCEDURE `usp_game_product_get_url`
(
    in_url VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `uuid`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_product`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_get_url_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_product_get_url_game_id`
(
    in_url VARCHAR (255) 
    , in_game_id VARCHAR (100) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `uuid`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_product`
    WHERE 1=1
    AND lower(`url`) = lower(in_url)
    AND lower(`game_id`) = lower(in_game_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_product_get_uuid_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_product_get_uuid_game_id`
(
    in_uuid BINARY(16) 
    , in_game_id VARCHAR (100) 
)
BEGIN
    SELECT
        `status`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `url`
        , `uuid`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_product`
    WHERE 1=1
    AND `uuid` = in_uuid
    AND lower(`game_id`) = lower(in_game_id)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count_key`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count_key`
(
    in_key BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count_key_game_id`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count_key_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count_key_profile_id_game_id`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count_key_profile_id_game_id_tim`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count_key_profile_id_game_id_tim`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `username`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `timestamp`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `rank`');
    SET @sfields = CONCAT(@sfields, ', `rank_change`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `rank_total_count`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `stat_value`');
    SET @sfields = CONCAT(@sfields, ', `network`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `level`');
    SET @sfields = CONCAT(@sfields, ', `stat_value_formatted`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `game_statistic_leaderboard` WHERE 1=1 ');
    
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
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard`  
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
                    UPDATE `game_statistic_leaderboard` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
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
                    INSERT INTO `game_statistic_leaderboard`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_time`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_time`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_set_key_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_set_key_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard`  
                    WHERE 1=1
                    AND `key` = in_key
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
                    UPDATE `game_statistic_leaderboard` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
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
                    INSERT INTO `game_statistic_leaderboard`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_set_key_profile_id_timestamp`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_set_key_profile_id_timestamp`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard`  
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_set_key_profile_id_game_id_times`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_set_key_profile_id_game_id_times`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard`  
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_set_key_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_set_key_profile_id_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard`  
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_del_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_del_key_game_id`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard`
    WHERE 1=1                        
    AND "key" = in_key
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_del_key_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_del_key_profile_id_game_id`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard`
    WHERE 1=1                        
    AND "key" = in_key
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_del_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_del_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_key`
(
    in_key BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_key_game_id`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_key_game_id_network`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_key_game_id_network`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
    , in_network VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    AND `game_id` = in_game_id
    AND lower(`network`) = lower(in_network)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_key_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_key_profile_id_game_id`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_key_profile_id_game_id_times`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_key_profile_id_game_id_times`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count_key`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count_key`
(
    in_key BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count_key_game_id`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count_key_profile_id_game`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count_key_profile_id_game`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count_key_profile_id_game`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count_key_profile_id_game`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `username`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `timestamp`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `rank`');
    SET @sfields = CONCAT(@sfields, ', `rank_change`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `rank_total_count`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `stat_value`');
    SET @sfields = CONCAT(@sfields, ', `network`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `level`');
    SET @sfields = CONCAT(@sfields, ', `stat_value_formatted`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `game_statistic_leaderboard_rollup` WHERE 1=1 ');
    
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
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard_rollup`  
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
                    UPDATE `game_statistic_leaderboard_rollup` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
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
                    INSERT INTO `game_statistic_leaderboard_rollup`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_set_uuid_profile_id_game_`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_set_uuid_profile_id_game_`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard_rollup`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard_rollup` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard_rollup`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_set_key_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_set_key_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard_rollup`  
                    WHERE 1=1
                    AND `key` = in_key
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
                    UPDATE `game_statistic_leaderboard_rollup` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
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
                    INSERT INTO `game_statistic_leaderboard_rollup`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_set_key_profile_id_timest`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_set_key_profile_id_timest`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard_rollup`  
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard_rollup` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard_rollup`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_set_key_profile_id_game_i`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_set_key_profile_id_game_i`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard_rollup`  
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard_rollup` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard_rollup`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_set_key_profile_id_game_i`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_set_key_profile_id_game_i`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_key BINARY(16) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_rank INTEGER 
    , in_rank_change INTEGER 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_rank_total_count INTEGER 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_network VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_stat_value_formatted VARCHAR (500) 
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
                    FROM  `game_statistic_leaderboard_rollup`  
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_leaderboard_rollup` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `key` = in_key
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `rank` = in_rank
                        , `rank_change` = in_rank_change
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `rank_total_count` = in_rank_total_count
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `network` = in_network
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `stat_value_formatted` = in_stat_value_formatted
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `key` = in_key
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_leaderboard_rollup`
                    (
                        `status`
                        , `username`
                        , `key`
                        , `timestamp`
                        , `profile_id`
                        , `rank`
                        , `rank_change`
                        , `game_id`
                        , `active`
                        , `rank_total_count`
                        , `data`
                        , `stat_value`
                        , `network`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `stat_value_formatted`
                        , `date_created`
                        , `type`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_key
                        , in_timestamp
                        , in_profile_id
                        , in_rank
                        , in_rank_change
                        , in_game_id
                        , in_active
                        , in_rank_total_count
                        , in_data
                        , in_stat_value
                        , in_network
                        , in_uuid
                        , in_date_modified
                        , in_level
                        , in_stat_value_formatted
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
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_del_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_del_key_game_id`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1                        
    AND "key" = in_key
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_del_key_profile_id_game_i`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_del_key_profile_id_game_i`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1                        
    AND "key" = in_key
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_del_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_del_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_key`
(
    in_key BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_key_game_id`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_key_game_id_network`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_key_game_id_network`
(
    in_key BINARY(16) 
    , in_game_id BINARY(16) 
    , in_network VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    AND `game_id` = in_game_id
    AND lower(`network`) = lower(in_network)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_key_profile_id_game_i`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_key_profile_id_game_i`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_key_profile_id_game_i`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_key_profile_id_game_i`
(
    in_key BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `key` = in_key
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_leaderboard_rollup_get_profile_id_game_id_ti`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_leaderboard_rollup_get_profile_id_game_id_ti`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `key`
        , `timestamp`
        , `profile_id`
        , `rank`
        , `rank_change`
        , `game_id`
        , `active`
        , `rank_total_count`
        , `data`
        , `stat_value`
        , `network`
        , `uuid`
        , `date_modified`
        , `level`
        , `stat_value_formatted`
        , `date_created`
        , `type`
    FROM `game_statistic_leaderboard_rollup`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_queue_count`;
delimiter $$
CREATE PROCEDURE `usp_game_live_queue_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_live_queue`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_queue_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_live_queue_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_live_queue`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_queue_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_live_queue_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_live_queue`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_queue_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_live_queue_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `data_stat`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `data_ad`');
    
    SET @stable = CONCAT('', ' FROM `game_live_queue` WHERE 1=1 ');
    
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
-- MODEL: GameLiveQueue - game_live_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_queue_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_live_queue_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_data_stat TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_data_ad TEXT 
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
                    FROM  `game_live_queue`  
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
                    UPDATE `game_live_queue` 
                    SET
                        `status` = in_status
                        , `data_stat` = in_data_stat
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `game_id` = in_game_id
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                        , `data_ad` = in_data_ad
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
                    INSERT INTO `game_live_queue`
                    (
                        `status`
                        , `data_stat`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `game_id`
                        , `profile_id`
                        , `type`
                        , `data_ad`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_queue_set_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_live_queue_set_profile_id_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_data_stat TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_game_id BINARY(16) 
    , in_profile_id BINARY(16) 
    , in_type VARCHAR (500) 
    , in_data_ad TEXT 
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
                    FROM  `game_live_queue`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_live_queue` 
                    SET
                        `status` = in_status
                        , `data_stat` = in_data_stat
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `game_id` = in_game_id
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                        , `data_ad` = in_data_ad
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_live_queue`
                    (
                        `status`
                        , `data_stat`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `game_id`
                        , `profile_id`
                        , `type`
                        , `data_ad`
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
-- MODEL: GameLiveQueue - game_live_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_queue_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_live_queue_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_live_queue`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_live_queue_del_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_live_queue_del_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_live_queue`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_queue_get`;

delimiter $$
CREATE PROCEDURE `usp_game_live_queue_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `data_stat`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `profile_id`
        , `type`
        , `data_ad`
    FROM `game_live_queue`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_queue_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_live_queue_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `data_stat`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `profile_id`
        , `type`
        , `data_ad`
    FROM `game_live_queue`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_queue_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_live_queue_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `data_stat`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `profile_id`
        , `type`
        , `data_ad`
    FROM `game_live_queue`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_queue_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_live_queue_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `data_stat`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `profile_id`
        , `type`
        , `data_ad`
    FROM `game_live_queue`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_count`;
delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_live_recent_queue`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_live_recent_queue`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_live_recent_queue`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `username`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `game`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_live_recent_queue` WHERE 1=1 ');
    
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
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_profile_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_game VARCHAR (500) 
    , in_game_id BINARY(16) 
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
                    FROM  `game_live_recent_queue`  
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
                    UPDATE `game_live_recent_queue` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `profile_id` = in_profile_id
                        , `uuid` = in_uuid
                        , `game` = in_game
                        , `game_id` = in_game_id
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
                    INSERT INTO `game_live_recent_queue`
                    (
                        `status`
                        , `username`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `profile_id`
                        , `uuid`
                        , `game`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_set_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_set_profile_id_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_profile_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_game VARCHAR (500) 
    , in_game_id BINARY(16) 
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
                    FROM  `game_live_recent_queue`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_live_recent_queue` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `profile_id` = in_profile_id
                        , `uuid` = in_uuid
                        , `game` = in_game
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `description` = in_description
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_live_recent_queue`
                    (
                        `status`
                        , `username`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `profile_id`
                        , `uuid`
                        , `game`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `description`
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
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_live_recent_queue`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_del_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_del_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_live_recent_queue`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue

                       
DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_get`;

delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_get`
(
)                        
BEGIN
    SELECT
        `status`
        , `username`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `profile_id`
        , `uuid`
        , `game`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_live_recent_queue`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `profile_id`
        , `uuid`
        , `game`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_live_recent_queue`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `profile_id`
        , `uuid`
        , `game`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_live_recent_queue`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_live_recent_queue_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_live_recent_queue_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `profile_id`
        , `uuid`
        , `game`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `description`
    FROM `game_live_recent_queue`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count_key`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count_key_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count_key_profile_id_game_id`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_count_key_profile_id_game_id_timesta`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_count_key_profile_id_game_id_timesta`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `username`');
    SET @sfields = CONCAT(@sfields, ', `timestamp`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `stat_value`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `level`');
    SET @sfields = CONCAT(@sfields, ', `points`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `game_profile_statistic` WHERE 1=1 ');
    
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
-- MODEL: GameProfileStatistic - game_profile_statistic

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_points decimal 
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
                    FROM  `game_profile_statistic`  
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
                    UPDATE `game_profile_statistic` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `points` = in_points
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
                    INSERT INTO `game_profile_statistic`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `data`
                        , `stat_value`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `points`
                        , `date_created`
                        , `type`
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
                        , in_points
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

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_set_uuid_profile_id_game_id_timestam`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_set_uuid_profile_id_game_id_timestam`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_points decimal 
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
                    FROM  `game_profile_statistic`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_statistic` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `points` = in_points
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_statistic`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `data`
                        , `stat_value`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `points`
                        , `date_created`
                        , `type`
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
                        , in_points
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

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_set_profile_id_key`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_set_profile_id_key`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_points decimal 
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
                    FROM  `game_profile_statistic`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND lower(`key`) = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_statistic` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `points` = in_points
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND lower(`key`) = lower(in_key)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_statistic`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `data`
                        , `stat_value`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `points`
                        , `date_created`
                        , `type`
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
                        , in_points
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

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_set_profile_id_key_timestamp`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_set_profile_id_key_timestamp`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_points decimal 
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
                    FROM  `game_profile_statistic`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND lower(`key`) = lower(in_key)
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_statistic` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `points` = in_points
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND lower(`key`) = lower(in_key)
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_statistic`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `data`
                        , `stat_value`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `points`
                        , `date_created`
                        , `type`
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
                        , in_points
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

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_set_key_profile_id_game_id_timestamp`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_set_key_profile_id_game_id_timestamp`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_points decimal 
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
                    FROM  `game_profile_statistic`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_statistic` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `points` = in_points
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_statistic`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `data`
                        , `stat_value`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `points`
                        , `date_created`
                        , `type`
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
                        , in_points
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

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_set_profile_id_game_id_key`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_set_profile_id_game_id_key`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_data TEXT 
    , in_stat_value decimal 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
    , in_points decimal 
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
                    FROM  `game_profile_statistic`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND lower(`key`) = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_statistic` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `data` = in_data
                        , `stat_value` = in_stat_value
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `points` = in_points
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND lower(`key`) = lower(in_key)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_statistic`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `data`
                        , `stat_value`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `points`
                        , `date_created`
                        , `type`
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
                        , in_points
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
-- MODEL: GameProfileStatistic - game_profile_statistic

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_statistic`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_del_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_del_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_statistic`
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_del_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_del_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_statistic`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_del_key_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_del_key_profile_id_game_id`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_statistic`
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_profile_id_game_id_timestamp`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_profile_id_game_id_timestamp`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_key_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_key_profile_id_game_id`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_get_key_profile_id_game_id_timestamp`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_get_key_profile_id_game_id_timestamp`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `data`
        , `stat_value`
        , `uuid`
        , `date_modified`
        , `level`
        , `points`
        , `date_created`
        , `type`
    FROM `game_profile_statistic`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_count`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_meta`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_meta`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_count_code`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_count_name`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_count_key`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_count_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_meta`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_count_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_count_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `sort`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `points`');
    SET @sfields = CONCAT(@sfields, ', `store_count`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `order`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_statistic_meta` WHERE 1=1 ');
    
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
-- MODEL: GameStatisticMeta - game_statistic_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_points decimal 
    , in_store_count INTEGER 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (40) 
    , in_order VARCHAR (40) 
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
                    FROM  `game_statistic_meta`  
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
                    UPDATE `game_statistic_meta` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `points` = in_points
                        , `store_count` = in_store_count
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
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
                    INSERT INTO `game_statistic_meta`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `uuid`
                        , `points`
                        , `store_count`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                        , `description`
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
                        , in_points
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_set_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_set_key_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_points decimal 
    , in_store_count INTEGER 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (40) 
    , in_order VARCHAR (40) 
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
                    FROM  `game_statistic_meta`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_statistic_meta` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `points` = in_points
                        , `store_count` = in_store_count
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_statistic_meta`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `uuid`
                        , `points`
                        , `store_count`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                        , `description`
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
                        , in_points
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
-- MODEL: GameStatisticMeta - game_statistic_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_meta`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_del_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_del_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_statistic_meta`
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `points`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_statistic_meta`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_get_code`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `points`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_get_name`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `points`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_get_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `points`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `points`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_statistic_meta`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_statistic_meta_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_statistic_meta_get_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `points`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_statistic_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_count`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic_timestamp`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic_timestamp`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_count_key_profile_id_game_`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_count_key_profile_id_game_`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp TIMESTAMP 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_statistic_timestamp`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `timestamp`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `game_profile_statistic_timestamp` WHERE 1=1 ');
    
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
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_timestamp TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_key VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_game_id BINARY(16) 
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
                    FROM  `game_profile_statistic_timestamp`  
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
                    UPDATE `game_profile_statistic_timestamp` 
                    SET
                        `status` = in_status
                        , `timestamp` = in_timestamp
                        , `uuid` = in_uuid
                        , `key` = in_key
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `game_id` = in_game_id
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
                    INSERT INTO `game_profile_statistic_timestamp`
                    (
                        `status`
                        , `timestamp`
                        , `uuid`
                        , `key`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `game_id`
                        , `profile_id`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_set_key_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_set_key_profile_id_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_timestamp TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_key VARCHAR (50) 
    , in_date_modified TIMESTAMP 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_game_id BINARY(16) 
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
                    FROM  `game_profile_statistic_timestamp`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_statistic_timestamp` 
                    SET
                        `status` = in_status
                        , `timestamp` = in_timestamp
                        , `uuid` = in_uuid
                        , `key` = in_key
                        , `date_modified` = in_date_modified
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `game_id` = in_game_id
                        , `profile_id` = in_profile_id
                        , `type` = in_type
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_statistic_timestamp`
                    (
                        `status`
                        , `timestamp`
                        , `uuid`
                        , `key`
                        , `date_modified`
                        , `active`
                        , `date_created`
                        , `game_id`
                        , `profile_id`
                        , `type`
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
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_statistic_timestamp`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_del_key_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_del_key_profile_id_game_id`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp TIMESTAMP 
)

BEGIN
    DELETE 
    FROM `game_profile_statistic_timestamp`
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "profile_id" = in_profile_id
    AND "game_id" = in_game_id
    AND "timestamp" = in_timestamp
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `timestamp`
        , `uuid`
        , `key`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `profile_id`
        , `type`
    FROM `game_profile_statistic_timestamp`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_statistic_timestamp_get_key_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_statistic_timestamp_get_key_profile_id_game_id`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp TIMESTAMP 
)
BEGIN
    SELECT
        `status`
        , `timestamp`
        , `uuid`
        , `key`
        , `date_modified`
        , `active`
        , `date_created`
        , `game_id`
        , `profile_id`
        , `type`
    FROM `game_profile_statistic_timestamp`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_key_meta_count`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_key_meta`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_key_meta`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_count_code`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_count_name`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_count_key`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_count_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_key_meta`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_count_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_count_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_key_meta_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `sort`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `level`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `key_level`');
    SET @sfields = CONCAT(@sfields, ', `store_count`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `order`');
    SET @sfields = CONCAT(@sfields, ', `key_stat`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_key_meta` WHERE 1=1 ');
    
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
-- MODEL: GameKeyMeta - game_key_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_key_meta_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_level VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_key_level VARCHAR (50) 
    , in_store_count INTEGER 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (40) 
    , in_order VARCHAR (40) 
    , in_key_stat VARCHAR (50) 
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
                    FROM  `game_key_meta`  
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
                    UPDATE `game_key_meta` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `level` = in_level
                        , `uuid` = in_uuid
                        , `key_level` = in_key_level
                        , `store_count` = in_store_count
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
                        , `key_stat` = in_key_stat
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
                    INSERT INTO `game_key_meta`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `level`
                        , `uuid`
                        , `key_level`
                        , `store_count`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                        , `key_stat`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_set_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_set_key_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_level VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_key_level VARCHAR (50) 
    , in_store_count INTEGER 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (40) 
    , in_order VARCHAR (40) 
    , in_key_stat VARCHAR (50) 
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
                    FROM  `game_key_meta`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_key_meta` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `level` = in_level
                        , `uuid` = in_uuid
                        , `key_level` = in_key_level
                        , `store_count` = in_store_count
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
                        , `key_stat` = in_key_stat
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_key_meta`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `level`
                        , `uuid`
                        , `key_level`
                        , `store_count`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                        , `key_stat`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_set_key_game_id_level`;
delimiter $$
CREATE PROCEDURE `usp_game_key_meta_set_key_game_id_level`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_level VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_key_level VARCHAR (50) 
    , in_store_count INTEGER 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (40) 
    , in_order VARCHAR (40) 
    , in_key_stat VARCHAR (50) 
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
                    FROM  `game_key_meta`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    AND lower(`level`) = lower(in_level)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_key_meta` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `level` = in_level
                        , `uuid` = in_uuid
                        , `key_level` = in_key_level
                        , `store_count` = in_store_count
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
                        , `key_stat` = in_key_stat
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    AND lower(`level`) = lower(in_level)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_key_meta`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `level`
                        , `uuid`
                        , `key_level`
                        , `store_count`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                        , `key_stat`
                        , `description`
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
-- MODEL: GameKeyMeta - game_key_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_key_meta_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_key_meta`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_key_meta_del_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_del_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_key_meta`
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_key_meta_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `key_level`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `key_stat`
        , `description`
    FROM `game_key_meta`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_get_code`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `key_level`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `key_stat`
        , `description`
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_get_name`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `key_level`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `key_stat`
        , `description`
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_get_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `key_level`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `key_stat`
        , `description`
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `key_level`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `key_stat`
        , `description`
    FROM `game_key_meta`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_get_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `key_level`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `key_stat`
        , `description`
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_key_meta_get_code_level`;

delimiter $$
CREATE PROCEDURE `usp_game_key_meta_get_code_level`
(
    in_code VARCHAR (255) 
    , in_level VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `key_level`
        , `store_count`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `key_stat`
        , `description`
    FROM `game_key_meta`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    AND lower(`level`) = lower(in_level)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLevel - game_level

                       
DROP PROCEDURE IF EXISTS `usp_game_level_count`;
delimiter $$
CREATE PROCEDURE `usp_game_level_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_level`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_level_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_level`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_count_code`;
delimiter $$
CREATE PROCEDURE `usp_game_level_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_level`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_count_name`;
delimiter $$
CREATE PROCEDURE `usp_game_level_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_level`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_count_key`;
delimiter $$
CREATE PROCEDURE `usp_game_level_count_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_level`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_level_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_level`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_count_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_level_count_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_level`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLevel - game_level

                       
DROP PROCEDURE IF EXISTS `usp_game_level_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_level_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `sort`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `order`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_level` WHERE 1=1 ');
    
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
-- MODEL: GameLevel - game_level

                       
DROP PROCEDURE IF EXISTS `usp_game_level_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_level_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (40) 
    , in_order VARCHAR (40) 
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
                    FROM  `game_level`  
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
                    UPDATE `game_level` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
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
                    INSERT INTO `game_level`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `uuid`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                        , `description`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_set_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_level_set_key_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type VARCHAR (40) 
    , in_order VARCHAR (40) 
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
                    FROM  `game_level`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_level` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_level`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `data`
                        , `uuid`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                        , `description`
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
-- MODEL: GameLevel - game_level

                       
DROP PROCEDURE IF EXISTS `usp_game_level_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_level_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_level`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_level_del_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_level_del_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_level`
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLevel - game_level

                       
DROP PROCEDURE IF EXISTS `usp_game_level_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_level_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_level`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_get_code`;

delimiter $$
CREATE PROCEDURE `usp_game_level_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_level`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_get_name`;

delimiter $$
CREATE PROCEDURE `usp_game_level_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_level`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_level_get_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_level`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_level_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_level`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_level_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_level_get_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `data`
        , `uuid`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `game_level`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_count`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_achievement`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_achievement`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_count_profile_id_key`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_count_profile_id_key`
(
    in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_achievement`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_count_username`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_count_username`
(
    in_username VARCHAR (500) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_count_key_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_count_key_profile_id_game_id`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_count_key_profile_id_game_id_times`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_count_key_profile_id_game_id_times`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `username`');
    SET @sfields = CONCAT(@sfields, ', `timestamp`');
    SET @sfields = CONCAT(@sfields, ', `completed`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `achievement_value`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `level`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    
    SET @stable = CONCAT('', ' FROM `game_profile_achievement` WHERE 1=1 ');
    
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
-- MODEL: GameProfileAchievement - game_profile_achievement

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_completed int 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_achievement_value decimal 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
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
                    FROM  `game_profile_achievement`  
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
                    UPDATE `game_profile_achievement` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `completed` = in_completed
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `achievement_value` = in_achievement_value
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
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
                    INSERT INTO `game_profile_achievement`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `completed`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `achievement_value`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `date_created`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_set_uuid_key`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_set_uuid_key`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_completed int 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_achievement_value decimal 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
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
                    FROM  `game_profile_achievement`  
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND lower(`key`) = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_achievement` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `completed` = in_completed
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `achievement_value` = in_achievement_value
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `uuid` = in_uuid
                    AND lower(`key`) = lower(in_key)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_achievement`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `completed`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `achievement_value`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `date_created`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_set_profile_id_key`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_set_profile_id_key`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_completed int 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_achievement_value decimal 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
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
                    FROM  `game_profile_achievement`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND lower(`key`) = lower(in_key)
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_achievement` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `completed` = in_completed
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `achievement_value` = in_achievement_value
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND lower(`key`) = lower(in_key)
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_achievement`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `completed`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `achievement_value`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `date_created`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_set_key_profile_id_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_set_key_profile_id_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_completed int 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_achievement_value decimal 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
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
                    FROM  `game_profile_achievement`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_achievement` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `completed` = in_completed
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `achievement_value` = in_achievement_value
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_achievement`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `completed`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `achievement_value`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `date_created`
                        , `type`
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
                    SET @id = 1;                  
                END;
            END IF;
        END;     
        SELECT @id as id;
    END;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_set_key_profile_id_game_id_timesta`;
delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_set_key_profile_id_game_id_timesta`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_username VARCHAR (500) 
    , in_timestamp decimal 
    , in_completed int 
    , in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
    , in_active int 
    , in_game_id BINARY(16) 
    , in_achievement_value decimal 
    , in_data TEXT 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_level VARCHAR (500) 
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
                    FROM  `game_profile_achievement`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_profile_achievement` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `timestamp` = in_timestamp
                        , `completed` = in_completed
                        , `profile_id` = in_profile_id
                        , `key` = in_key
                        , `active` = in_active
                        , `game_id` = in_game_id
                        , `achievement_value` = in_achievement_value
                        , `data` = in_data
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `level` = in_level
                        , `date_created` = in_date_created
                        , `type` = in_type
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `profile_id` = in_profile_id
                    AND `game_id` = in_game_id
                    AND `timestamp` = in_timestamp
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_profile_achievement`
                    (
                        `status`
                        , `username`
                        , `timestamp`
                        , `completed`
                        , `profile_id`
                        , `key`
                        , `active`
                        , `game_id`
                        , `achievement_value`
                        , `data`
                        , `uuid`
                        , `date_modified`
                        , `level`
                        , `date_created`
                        , `type`
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
-- MODEL: GameProfileAchievement - game_profile_achievement

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_profile_achievement`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_del_profile_id_key`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_del_profile_id_key`
(
    in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
)

BEGIN
    DELETE 
    FROM `game_profile_achievement`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND lower("key") = lower(in_key)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_del_uuid_key`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_del_uuid_key`
(
    in_uuid BINARY(16) 
    , in_key VARCHAR (50) 
)

BEGIN
    DELETE 
    FROM `game_profile_achievement`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    AND lower("key") = lower(in_key)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement

                       
DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_profile_id_key`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_profile_id_key`
(
    in_profile_id BINARY(16) 
    , in_key VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_username`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_username`
(
    in_username VARCHAR (500) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_profile_id_game_id`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_profile_id_game_id_timestamp`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_profile_id_game_id_timestamp`
(
    in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_key_profile_id_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_key_profile_id_game_id`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_profile_achievement_get_key_profile_id_game_id_timesta`;

delimiter $$
CREATE PROCEDURE `usp_game_profile_achievement_get_key_profile_id_game_id_timesta`
(
    in_key VARCHAR (50) 
    , in_profile_id BINARY(16) 
    , in_game_id BINARY(16) 
    , in_timestamp decimal 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `timestamp`
        , `completed`
        , `profile_id`
        , `key`
        , `active`
        , `game_id`
        , `achievement_value`
        , `data`
        , `uuid`
        , `date_modified`
        , `level`
        , `date_created`
        , `type`
    FROM `game_profile_achievement`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `profile_id` = in_profile_id
    AND `game_id` = in_game_id
    AND `timestamp` = in_timestamp
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_count`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_achievement_meta`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_achievement_meta`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_count_code`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_count_name`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_count_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_count_key`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_count_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_count_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_count_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_achievement_meta`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_count_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_count_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `sort`');
    SET @sfields = CONCAT(@sfields, ', `code`');
    SET @sfields = CONCAT(@sfields, ', `display_name`');
    SET @sfields = CONCAT(@sfields, ', `name`');
    SET @sfields = CONCAT(@sfields, ', `game_stat`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `data`');
    SET @sfields = CONCAT(@sfields, ', `level`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `points`');
    SET @sfields = CONCAT(@sfields, ', `key`');
    SET @sfields = CONCAT(@sfields, ', `game_id`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `modifier`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `leaderboard`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `game_achievement_meta` WHERE 1=1 ');
    
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
-- MODEL: GameAchievementMeta - game_achievement_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_game_stat int 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_level VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_points INTEGER 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_modifier decimal 
    , in_type VARCHAR (40) 
    , in_leaderboard int 
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
                    FROM  `game_achievement_meta`  
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
                    UPDATE `game_achievement_meta` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `game_stat` = in_game_stat
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `level` = in_level
                        , `uuid` = in_uuid
                        , `points` = in_points
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `modifier` = in_modifier
                        , `type` = in_type
                        , `leaderboard` = in_leaderboard
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
                    INSERT INTO `game_achievement_meta`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `game_stat`
                        , `date_modified`
                        , `data`
                        , `level`
                        , `uuid`
                        , `points`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `modifier`
                        , `type`
                        , `leaderboard`
                        , `description`
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
                        , in_modifier
                        , in_type
                        , in_leaderboard
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

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_set_key_game_id`;
delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_set_key_game_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (255) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_game_stat int 
    , in_date_modified TIMESTAMP 
    , in_data TEXT 
    , in_level VARCHAR (500) 
    , in_uuid BINARY(16) 
    , in_points INTEGER 
    , in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_modifier decimal 
    , in_type VARCHAR (40) 
    , in_leaderboard int 
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
                    FROM  `game_achievement_meta`  
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `game_achievement_meta` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `game_stat` = in_game_stat
                        , `date_modified` = in_date_modified
                        , `data` = in_data
                        , `level` = in_level
                        , `uuid` = in_uuid
                        , `points` = in_points
                        , `key` = in_key
                        , `game_id` = in_game_id
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `modifier` = in_modifier
                        , `type` = in_type
                        , `leaderboard` = in_leaderboard
                        , `description` = in_description
                    WHERE 1=1
                    AND lower(`key`) = lower(in_key)
                    AND `game_id` = in_game_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `game_achievement_meta`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `game_stat`
                        , `date_modified`
                        , `data`
                        , `level`
                        , `uuid`
                        , `points`
                        , `key`
                        , `game_id`
                        , `active`
                        , `date_created`
                        , `modifier`
                        , `type`
                        , `leaderboard`
                        , `description`
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
                        , in_modifier
                        , in_type
                        , in_leaderboard
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
-- MODEL: GameAchievementMeta - game_achievement_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_achievement_meta`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_del_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_del_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `game_achievement_meta`
    WHERE 1=1                        
    AND lower("key") = lower(in_key)
    AND "game_id" = in_game_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta

                       
DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `game_stat`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `points`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `modifier`
        , `type`
        , `leaderboard`
        , `description`
    FROM `game_achievement_meta`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_get_code`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_get_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `game_stat`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `points`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `modifier`
        , `type`
        , `leaderboard`
        , `description`
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_get_name`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_get_name`
(
    in_name VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `game_stat`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `points`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `modifier`
        , `type`
        , `leaderboard`
        , `description`
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`name`) = lower(in_name)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_get_key`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_get_key`
(
    in_key VARCHAR (50) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `game_stat`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `points`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `modifier`
        , `type`
        , `leaderboard`
        , `description`
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_get_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_get_game_id`
(
    in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `game_stat`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `points`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `modifier`
        , `type`
        , `leaderboard`
        , `description`
    FROM `game_achievement_meta`
    WHERE 1=1
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_game_achievement_meta_get_key_game_id`;

delimiter $$
CREATE PROCEDURE `usp_game_achievement_meta_get_key_game_id`
(
    in_key VARCHAR (50) 
    , in_game_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `game_stat`
        , `date_modified`
        , `data`
        , `level`
        , `uuid`
        , `points`
        , `key`
        , `game_id`
        , `active`
        , `date_created`
        , `modifier`
        , `type`
        , `leaderboard`
        , `description`
    FROM `game_achievement_meta`
    WHERE 1=1
    AND lower(`key`) = lower(in_key)
    AND `game_id` = in_game_id
    ;
END$$
delimiter ;


