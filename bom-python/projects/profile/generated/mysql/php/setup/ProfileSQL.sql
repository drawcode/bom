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
        
DROP TABLE IF EXISTS `profile` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_type` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_attribute` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_attribute_text` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_attribute_data` CASCADE;
    
        
DROP TABLE IF EXISTS `profile_device` CASCADE;
    
        
DROP TABLE IF EXISTS `country` CASCADE;
    
        
DROP TABLE IF EXISTS `state` CASCADE;
    
        
DROP TABLE IF EXISTS `city` CASCADE;
    
        
DROP TABLE IF EXISTS `postal_code` CASCADE;
    
*/

        
CREATE TABLE `profile` 
(
    `status` VARCHAR (50)
    , `username` VARCHAR (255)
    , `hash` VARCHAR (255)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_type` 
(
    `status` VARCHAR (50)
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
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_type` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_attribute` 
(
    `status` VARCHAR (50)
    , `sort` INTEGER
    , `code` VARCHAR (255)
    , `display_name` VARCHAR (255)
    , `name` VARCHAR (255)
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `uuid` BINARY(16) 
    , `group` INTEGER
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` INTEGER
    , `order` INTEGER
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_attribute` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_attribute_text` 
(
    `status` VARCHAR (50)
    , `sort` INTEGER
    , `group` INTEGER
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `profile_id` BINARY(16)
    , `attribute_id` BINARY(16)
    , `attribute_value` VARCHAR (1000)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` INTEGER
    , `order` INTEGER
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_attribute_text` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_attribute_data` 
(
    `status` VARCHAR (50)
    , `sort` INTEGER
    , `group` INTEGER
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `profile_id` BINARY(16)
    , `attribute_id` BINARY(16)
    , `attribute_value` TEXT
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `type` INTEGER
    , `order` INTEGER
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_attribute_data` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `profile_device` 
(
    `status` VARCHAR (50)
    , `uuid` BINARY(16) 
    , `date_modified` TIMESTAMP
                    DEFAULT NOW()
    , `profile_id` BINARY(16) 
    , `token` VARCHAR (128)
    , `secret` VARCHAR (128)
    , `device_version` VARCHAR (128)
    , `device_type` VARCHAR (128)
    , `active` int
                DEFAULT 1
    , `date_created` TIMESTAMP
                    DEFAULT '0000-00-00 00:00:00'
    , `device_os` VARCHAR (128)
    , `device_id` VARCHAR (128) 
    , `device_platform` VARCHAR (128)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `profile_device` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `country` 
(
    `status` VARCHAR (50)
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
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `country` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `state` 
(
    `status` VARCHAR (50)
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
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `state` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `city` 
(
    `status` VARCHAR (50)
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
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `city` ADD PRIMARY KEY (`uuid`);
    
        
CREATE TABLE `postal_code` 
(
    `status` VARCHAR (50)
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
    , `description` VARCHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `postal_code` ADD PRIMARY KEY (`uuid`);
    

        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_profile_username_hash','profile');
                
CREATE INDEX `IX_profile_username_hash` ON `profile` 
(
                    
    `username` ASC
                    
    , `hash` ASC
);
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_profile_attribute_text_profile_id','profile_attribute_text');
                
CREATE INDEX `IX_profile_attribute_text_profile_id` ON `profile_attribute_text` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_attribute_text_attribute_id','profile_attribute_text');
                
CREATE INDEX `IX_profile_attribute_text_attribute_id` ON `profile_attribute_text` 
(
                    
    `attribute_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_attribute_text_profile_id_attribute_id','profile_attribute_text');
                
CREATE INDEX `IX_profile_attribute_text_profile_id_attribute_id` ON `profile_attribute_text` 
(
                    
    `profile_id` ASC
                    
    , `attribute_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_attribute_text_profile_id_attribute_id_sort','profile_attribute_text');
                
CREATE INDEX `IX_profile_attribute_text_profile_id_attribute_id_sort` ON `profile_attribute_text` 
(
                    
    `sort` ASC
                    
    , `profile_id` ASC
                    
    , `attribute_id` ASC
);
        
-- INDEX CREATES

                
CALL drop_index_if_exists('IX_profile_attribute_data_profile_id','profile_attribute_data');
                
CREATE INDEX `IX_profile_attribute_data_profile_id` ON `profile_attribute_data` 
(
                    
    `profile_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_attribute_data_attribute_id','profile_attribute_data');
                
CREATE INDEX `IX_profile_attribute_data_attribute_id` ON `profile_attribute_data` 
(
                    
    `attribute_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_attribute_data_profile_id_attribute_id','profile_attribute_data');
                
CREATE INDEX `IX_profile_attribute_data_profile_id_attribute_id` ON `profile_attribute_data` 
(
                    
    `profile_id` ASC
                    
    , `attribute_id` ASC
);
                
CALL drop_index_if_exists('IX_profile_attribute_data_profile_id_attribute_id_sort','profile_attribute_data');
                
CREATE INDEX `IX_profile_attribute_data_profile_id_attribute_id_sort` ON `profile_attribute_data` 
(
                    
    `sort` ASC
                    
    , `profile_id` ASC
                    
    , `attribute_id` ASC
);
        
        
        
        
        

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Profile - profile

                       
DROP PROCEDURE IF EXISTS `usp_profile_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_count_username_hash`;
delimiter $$
CREATE PROCEDURE `usp_profile_count_username_hash`
(
    in_username VARCHAR (255) 
    , in_hash VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    AND lower(`hash`) = lower(in_hash)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_count_username`;
delimiter $$
CREATE PROCEDURE `usp_profile_count_username`
(
    in_username VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Profile - profile

                       
DROP PROCEDURE IF EXISTS `usp_profile_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `hash`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    
    SET @stable = CONCAT('', ' FROM `profile` WHERE 1=1 ');
    
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
-- MODEL: Profile - profile

                       
DROP PROCEDURE IF EXISTS `usp_profile_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_username VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
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
                    FROM  `profile`  
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
                    UPDATE `profile` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `hash` = in_hash
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
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
                    INSERT INTO `profile`
                    (
                        `status`
                        , `username`
                        , `hash`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_hash
                        , in_uuid
                        , in_date_modified
                        , in_active
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

DROP PROCEDURE IF EXISTS `usp_profile_set_username`;
delimiter $$
CREATE PROCEDURE `usp_profile_set_username`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_username VARCHAR (255) 
    , in_hash VARCHAR (255) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_active int 
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
                    FROM  `profile`  
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
                    UPDATE `profile` 
                    SET
                        `status` = in_status
                        , `username` = in_username
                        , `hash` = in_hash
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `active` = in_active
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
                    INSERT INTO `profile`
                    (
                        `status`
                        , `username`
                        , `hash`
                        , `uuid`
                        , `date_modified`
                        , `active`
                        , `date_created`
                    )
                    VALUES
                    (
                        in_status
                        , in_username
                        , in_hash
                        , in_uuid
                        , in_date_modified
                        , in_active
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
-- MODEL: Profile - profile

                       
DROP PROCEDURE IF EXISTS `usp_profile_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_del_username`;

delimiter $$
CREATE PROCEDURE `usp_profile_del_username`
(
    in_username VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `profile`
    WHERE 1=1                        
    AND lower("username") = lower(in_username)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Profile - profile

                       
DROP PROCEDURE IF EXISTS `usp_profile_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `hash`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
    FROM `profile`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_get_username_hash`;

delimiter $$
CREATE PROCEDURE `usp_profile_get_username_hash`
(
    in_username VARCHAR (255) 
    , in_hash VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `hash`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
    FROM `profile`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    AND lower(`hash`) = lower(in_hash)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_get_username`;

delimiter $$
CREATE PROCEDURE `usp_profile_get_username`
(
    in_username VARCHAR (255) 
)
BEGIN
    SELECT
        `status`
        , `username`
        , `hash`
        , `uuid`
        , `date_modified`
        , `active`
        , `date_created`
    FROM `profile`
    WHERE 1=1
    AND lower(`username`) = lower(in_username)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileType - profile_type

                       
DROP PROCEDURE IF EXISTS `usp_profile_type_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_type_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_type`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_type_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_type_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_type_count_type_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_type_count_type_id`
(
    in_type_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_type`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileType - profile_type

                       
DROP PROCEDURE IF EXISTS `usp_profile_type_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_type_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `profile_type` WHERE 1=1 ');
    
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
-- MODEL: ProfileType - profile_type

                       
DROP PROCEDURE IF EXISTS `usp_profile_type_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_type_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_type_id BINARY(16) 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `profile_type`  
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
                    UPDATE `profile_type` 
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
                    INSERT INTO `profile_type`
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
-- MODEL: ProfileType - profile_type

                       
DROP PROCEDURE IF EXISTS `usp_profile_type_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_type_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_type`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileType - profile_type

                       
DROP PROCEDURE IF EXISTS `usp_profile_type_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_type_get_uuid`
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
        , `description`
    FROM `profile_type`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_type_get_code`;

delimiter $$
CREATE PROCEDURE `usp_profile_type_get_code`
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
        , `description`
    FROM `profile_type`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_type_get_type_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_type_get_type_id`
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
        , `active`
        , `date_created`
        , `description`
    FROM `profile_type`
    WHERE 1=1
    AND `type_id` = in_type_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_count_code`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_count_type`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_count_type`
(
    in_type INTEGER 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute`
    WHERE 1=1
    AND `type` = in_type
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_count_group`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_count_group`
(
    in_group INTEGER 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute`
    WHERE 1=1
    AND `group` = in_group
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_count_code_type`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_count_code_type`
(
    in_code VARCHAR (255) 
    , in_type INTEGER 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    AND `type` = in_type
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `group`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `order`');
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `profile_attribute` WHERE 1=1 ');
    
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
-- MODEL: ProfileAttribute - profile_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_group INTEGER 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute`  
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
                    UPDATE `profile_attribute` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `group` = in_group
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
                    INSERT INTO `profile_attribute`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `group`
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
                        , in_uuid
                        , in_group
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

DROP PROCEDURE IF EXISTS `usp_profile_attribute_set_code`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_group INTEGER 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute`  
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
                    UPDATE `profile_attribute` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `group` = in_group
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
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
                    INSERT INTO `profile_attribute`
                    (
                        `status`
                        , `sort`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `group`
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
                        , in_uuid
                        , in_group
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
-- MODEL: ProfileAttribute - profile_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_attribute`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_attribute_del_code`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `profile_attribute`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_get_uuid`
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
        , `uuid`
        , `group`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `profile_attribute`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_get_code`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_get_code`
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
        , `uuid`
        , `group`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `profile_attribute`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_get_type`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_get_type`
(
    in_type INTEGER 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `group`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `profile_attribute`
    WHERE 1=1
    AND `type` = in_type
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_get_group`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_get_group`
(
    in_group INTEGER 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `group`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `profile_attribute`
    WHERE 1=1
    AND `group` = in_group
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_get_code_type`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_get_code_type`
(
    in_code VARCHAR (255) 
    , in_type INTEGER 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `code`
        , `display_name`
        , `name`
        , `date_modified`
        , `uuid`
        , `group`
        , `active`
        , `date_created`
        , `type`
        , `order`
        , `description`
    FROM `profile_attribute`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    AND `type` = in_type
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_text`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_text`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_text`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_count_profile_id_attribute_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_count_profile_id_attribute_id`
(
    in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_text`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `attribute_id` = in_attribute_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `group`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `attribute_id`');
    SET @sfields = CONCAT(@sfields, ', `attribute_value`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `order`');
    
    SET @stable = CONCAT('', ' FROM `profile_attribute_text` WHERE 1=1 ');
    
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
-- MODEL: ProfileAttributeText - profile_attribute_text

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_group INTEGER 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
    , in_attribute_value VARCHAR (1000) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute_text`  
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
                    UPDATE `profile_attribute_text` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `group` = in_group
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_id` = in_profile_id
                        , `attribute_id` = in_attribute_id
                        , `attribute_value` = in_attribute_value
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
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
                    INSERT INTO `profile_attribute_text`
                    (
                        `status`
                        , `sort`
                        , `group`
                        , `uuid`
                        , `date_modified`
                        , `profile_id`
                        , `attribute_id`
                        , `attribute_value`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_group
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_attribute_id
                        , in_attribute_value
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
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

DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_set_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_set_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_group INTEGER 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
    , in_attribute_value VARCHAR (1000) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute_text`  
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
                    UPDATE `profile_attribute_text` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `group` = in_group
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_id` = in_profile_id
                        , `attribute_id` = in_attribute_id
                        , `attribute_value` = in_attribute_value
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
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
                    INSERT INTO `profile_attribute_text`
                    (
                        `status`
                        , `sort`
                        , `group`
                        , `uuid`
                        , `date_modified`
                        , `profile_id`
                        , `attribute_id`
                        , `attribute_value`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_group
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_attribute_id
                        , in_attribute_value
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
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

DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_set_profile_id_attribute_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_set_profile_id_attribute_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_group INTEGER 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
    , in_attribute_value VARCHAR (1000) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute_text`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `attribute_id` = in_attribute_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_attribute_text` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `group` = in_group
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_id` = in_profile_id
                        , `attribute_id` = in_attribute_id
                        , `attribute_value` = in_attribute_value
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `attribute_id` = in_attribute_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_attribute_text`
                    (
                        `status`
                        , `sort`
                        , `group`
                        , `uuid`
                        , `date_modified`
                        , `profile_id`
                        , `attribute_id`
                        , `attribute_value`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_group
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_attribute_id
                        , in_attribute_value
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
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
-- MODEL: ProfileAttributeText - profile_attribute_text

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_attribute_text`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_del_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_del_profile_id`
(
    in_profile_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_attribute_text`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_del_profile_id_attribute_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_del_profile_id_attribute_id`
(
    in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_attribute_text`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `group`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `attribute_id`
        , `attribute_value`
        , `active`
        , `date_created`
        , `type`
        , `order`
    FROM `profile_attribute_text`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `group`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `attribute_id`
        , `attribute_value`
        , `active`
        , `date_created`
        , `type`
        , `order`
    FROM `profile_attribute_text`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_text_get_profile_id_attribute_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_text_get_profile_id_attribute_id`
(
    in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `group`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `attribute_id`
        , `attribute_value`
        , `active`
        , `date_created`
        , `type`
        , `order`
    FROM `profile_attribute_text`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `attribute_id` = in_attribute_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_data`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_data`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_data`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_count_profile_id_attribute_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_count_profile_id_attribute_id`
(
    in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_attribute_data`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `attribute_id` = in_attribute_id
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `group`');
    SET @sfields = CONCAT(@sfields, ', `uuid`');
    SET @sfields = CONCAT(@sfields, ', `date_modified`');
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `attribute_id`');
    SET @sfields = CONCAT(@sfields, ', `attribute_value`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `type`');
    SET @sfields = CONCAT(@sfields, ', `order`');
    
    SET @stable = CONCAT('', ' FROM `profile_attribute_data` WHERE 1=1 ');
    
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
-- MODEL: ProfileAttributeData - profile_attribute_data

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_group INTEGER 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
    , in_attribute_value TEXT 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute_data`  
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
                    UPDATE `profile_attribute_data` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `group` = in_group
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_id` = in_profile_id
                        , `attribute_id` = in_attribute_id
                        , `attribute_value` = in_attribute_value
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
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
                    INSERT INTO `profile_attribute_data`
                    (
                        `status`
                        , `sort`
                        , `group`
                        , `uuid`
                        , `date_modified`
                        , `profile_id`
                        , `attribute_id`
                        , `attribute_value`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_group
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_attribute_id
                        , in_attribute_value
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
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

DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_set_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_set_profile_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_group INTEGER 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
    , in_attribute_value TEXT 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute_data`  
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
                    UPDATE `profile_attribute_data` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `group` = in_group
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_id` = in_profile_id
                        , `attribute_id` = in_attribute_id
                        , `attribute_value` = in_attribute_value
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
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
                    INSERT INTO `profile_attribute_data`
                    (
                        `status`
                        , `sort`
                        , `group`
                        , `uuid`
                        , `date_modified`
                        , `profile_id`
                        , `attribute_id`
                        , `attribute_value`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_group
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_attribute_id
                        , in_attribute_value
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
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

DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_set_profile_id_attribute_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_set_profile_id_attribute_id`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_sort INTEGER 
    , in_group INTEGER 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
    , in_attribute_value TEXT 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_type INTEGER 
    , in_order INTEGER 
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
                    FROM  `profile_attribute_data`  
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `attribute_id` = in_attribute_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            # UPDATE
            IF (@countItems > 0 AND in_set_type != 'insertonly')
                OR (@countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE `profile_attribute_data` 
                    SET
                        `status` = in_status
                        , `sort` = in_sort
                        , `group` = in_group
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_id` = in_profile_id
                        , `attribute_id` = in_attribute_id
                        , `attribute_value` = in_attribute_value
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `type` = in_type
                        , `order` = in_order
                    WHERE 1=1
                    AND `profile_id` = in_profile_id
                    AND `attribute_id` = in_attribute_id
                    ;
                    SET @id = 1;
                END;
            END IF;
        END;
        BEGIN
            # INSERT
            IF (@countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO `profile_attribute_data`
                    (
                        `status`
                        , `sort`
                        , `group`
                        , `uuid`
                        , `date_modified`
                        , `profile_id`
                        , `attribute_id`
                        , `attribute_value`
                        , `active`
                        , `date_created`
                        , `type`
                        , `order`
                    )
                    VALUES
                    (
                        in_status
                        , in_sort
                        , in_group
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_attribute_id
                        , in_attribute_value
                        , in_active
                        , in_date_created
                        , in_type
                        , in_order
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
-- MODEL: ProfileAttributeData - profile_attribute_data

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_attribute_data`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_del_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_del_profile_id`
(
    in_profile_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_attribute_data`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_del_profile_id_attribute_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_del_profile_id_attribute_id`
(
    in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_attribute_data`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data

                       
DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `group`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `attribute_id`
        , `attribute_value`
        , `active`
        , `date_created`
        , `type`
        , `order`
    FROM `profile_attribute_data`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `group`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `attribute_id`
        , `attribute_value`
        , `active`
        , `date_created`
        , `type`
        , `order`
    FROM `profile_attribute_data`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_attribute_data_get_profile_id_attribute_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_attribute_data_get_profile_id_attribute_id`
(
    in_profile_id BINARY(16) 
    , in_attribute_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `sort`
        , `group`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `attribute_id`
        , `attribute_value`
        , `active`
        , `date_created`
        , `type`
        , `order`
    FROM `profile_attribute_data`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND `attribute_id` = in_attribute_id
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device

                       
DROP PROCEDURE IF EXISTS `usp_profile_device_count`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_device`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_device`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_count_profile_id_device_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_count_profile_id_device_id`
(
    in_profile_id BINARY(16) 
    , in_device_id VARCHAR (128) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_device`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND lower(`device_id`) = lower(in_device_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_count_profile_id_token`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_count_profile_id_token`
(
    in_profile_id BINARY(16) 
    , in_token VARCHAR (128) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_device`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND lower(`token`) = lower(in_token)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_count_profile_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_count_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_device`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_count_device_id`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_count_device_id`
(
    in_device_id VARCHAR (128) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_device`
    WHERE 1=1
    AND lower(`device_id`) = lower(in_device_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_count_token`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_count_token`
(
    in_token VARCHAR (128) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `profile_device`
    WHERE 1=1
    AND lower(`token`) = lower(in_token)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device

                       
DROP PROCEDURE IF EXISTS `usp_profile_device_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `profile_id`');
    SET @sfields = CONCAT(@sfields, ', `token`');
    SET @sfields = CONCAT(@sfields, ', `secret`');
    SET @sfields = CONCAT(@sfields, ', `device_version`');
    SET @sfields = CONCAT(@sfields, ', `device_type`');
    SET @sfields = CONCAT(@sfields, ', `active`');
    SET @sfields = CONCAT(@sfields, ', `date_created`');
    SET @sfields = CONCAT(@sfields, ', `device_os`');
    SET @sfields = CONCAT(@sfields, ', `device_id`');
    SET @sfields = CONCAT(@sfields, ', `device_platform`');
    
    SET @stable = CONCAT('', ' FROM `profile_device` WHERE 1=1 ');
    
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
-- MODEL: ProfileDevice - profile_device

                       
DROP PROCEDURE IF EXISTS `usp_profile_device_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_profile_device_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_uuid BINARY(16) 
    , in_date_modified TIMESTAMP 
    , in_profile_id BINARY(16) 
    , in_token VARCHAR (128) 
    , in_secret VARCHAR (128) 
    , in_device_version VARCHAR (128) 
    , in_device_type VARCHAR (128) 
    , in_active int 
    , in_date_created TIMESTAMP 
    , in_device_os VARCHAR (128) 
    , in_device_id VARCHAR (128) 
    , in_device_platform VARCHAR (128) 
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
                    FROM  `profile_device`  
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
                    UPDATE `profile_device` 
                    SET
                        `status` = in_status
                        , `uuid` = in_uuid
                        , `date_modified` = in_date_modified
                        , `profile_id` = in_profile_id
                        , `token` = in_token
                        , `secret` = in_secret
                        , `device_version` = in_device_version
                        , `device_type` = in_device_type
                        , `active` = in_active
                        , `date_created` = in_date_created
                        , `device_os` = in_device_os
                        , `device_id` = in_device_id
                        , `device_platform` = in_device_platform
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
                    INSERT INTO `profile_device`
                    (
                        `status`
                        , `uuid`
                        , `date_modified`
                        , `profile_id`
                        , `token`
                        , `secret`
                        , `device_version`
                        , `device_type`
                        , `active`
                        , `date_created`
                        , `device_os`
                        , `device_id`
                        , `device_platform`
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_token
                        , in_secret
                        , in_device_version
                        , in_device_type
                        , in_active
                        , in_date_created
                        , in_device_os
                        , in_device_id
                        , in_device_platform
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
-- MODEL: ProfileDevice - profile_device

                       
DROP PROCEDURE IF EXISTS `usp_profile_device_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `profile_device`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_device_del_profile_id_device_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_del_profile_id_device_id`
(
    in_profile_id BINARY(16) 
    , in_device_id VARCHAR (128) 
)

BEGIN
    DELETE 
    FROM `profile_device`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND lower("device_id") = lower(in_device_id)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_device_del_profile_id_token`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_del_profile_id_token`
(
    in_profile_id BINARY(16) 
    , in_token VARCHAR (128) 
)

BEGIN
    DELETE 
    FROM `profile_device`
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND lower("token") = lower(in_token)
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_profile_device_del_token`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_del_token`
(
    in_token VARCHAR (128) 
)

BEGIN
    DELETE 
    FROM `profile_device`
    WHERE 1=1                        
    AND lower("token") = lower(in_token)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device

                       
DROP PROCEDURE IF EXISTS `usp_profile_device_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_get_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `token`
        , `secret`
        , `device_version`
        , `device_type`
        , `active`
        , `date_created`
        , `device_os`
        , `device_id`
        , `device_platform`
    FROM `profile_device`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_get_profile_id_device_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_get_profile_id_device_id`
(
    in_profile_id BINARY(16) 
    , in_device_id VARCHAR (128) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `token`
        , `secret`
        , `device_version`
        , `device_type`
        , `active`
        , `date_created`
        , `device_os`
        , `device_id`
        , `device_platform`
    FROM `profile_device`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND lower(`device_id`) = lower(in_device_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_get_profile_id_token`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_get_profile_id_token`
(
    in_profile_id BINARY(16) 
    , in_token VARCHAR (128) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `token`
        , `secret`
        , `device_version`
        , `device_type`
        , `active`
        , `date_created`
        , `device_os`
        , `device_id`
        , `device_platform`
    FROM `profile_device`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    AND lower(`token`) = lower(in_token)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_get_profile_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_get_profile_id`
(
    in_profile_id BINARY(16) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `token`
        , `secret`
        , `device_version`
        , `device_type`
        , `active`
        , `date_created`
        , `device_os`
        , `device_id`
        , `device_platform`
    FROM `profile_device`
    WHERE 1=1
    AND `profile_id` = in_profile_id
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_get_device_id`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_get_device_id`
(
    in_device_id VARCHAR (128) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `token`
        , `secret`
        , `device_version`
        , `device_type`
        , `active`
        , `date_created`
        , `device_os`
        , `device_id`
        , `device_platform`
    FROM `profile_device`
    WHERE 1=1
    AND lower(`device_id`) = lower(in_device_id)
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_profile_device_get_token`;

delimiter $$
CREATE PROCEDURE `usp_profile_device_get_token`
(
    in_token VARCHAR (128) 
)
BEGIN
    SELECT
        `status`
        , `uuid`
        , `date_modified`
        , `profile_id`
        , `token`
        , `secret`
        , `device_version`
        , `device_type`
        , `active`
        , `date_created`
        , `device_os`
        , `device_id`
        , `device_platform`
    FROM `profile_device`
    WHERE 1=1
    AND lower(`token`) = lower(in_token)
    ;
END$$
delimiter ;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Country - country

                       
DROP PROCEDURE IF EXISTS `usp_country_count`;
delimiter $$
CREATE PROCEDURE `usp_country_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `country`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_country_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_country_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `country`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_country_count_code`;
delimiter $$
CREATE PROCEDURE `usp_country_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `country`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Country - country

                       
DROP PROCEDURE IF EXISTS `usp_country_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_country_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `country` WHERE 1=1 ');
    
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
-- MODEL: Country - country

                       
DROP PROCEDURE IF EXISTS `usp_country_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_country_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `country`  
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
                    UPDATE `country` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `country`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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

DROP PROCEDURE IF EXISTS `usp_country_set_code`;
delimiter $$
CREATE PROCEDURE `usp_country_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `country`  
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
                    UPDATE `country` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `country`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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
-- MODEL: Country - country

                       
DROP PROCEDURE IF EXISTS `usp_country_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_country_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `country`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_country_del_code`;

delimiter $$
CREATE PROCEDURE `usp_country_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `country`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Country - country

                       
DROP PROCEDURE IF EXISTS `usp_country_get`;

delimiter $$
CREATE PROCEDURE `usp_country_get`
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
        , `description`
    FROM `country`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_country_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_country_get_uuid`
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
        , `description`
    FROM `country`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_country_get_code`;

delimiter $$
CREATE PROCEDURE `usp_country_get_code`
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
        , `description`
    FROM `country`
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
-- MODEL: State - state

                       
DROP PROCEDURE IF EXISTS `usp_state_count`;
delimiter $$
CREATE PROCEDURE `usp_state_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `state`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_state_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_state_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `state`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_state_count_code`;
delimiter $$
CREATE PROCEDURE `usp_state_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `state`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: State - state

                       
DROP PROCEDURE IF EXISTS `usp_state_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_state_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `state` WHERE 1=1 ');
    
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
-- MODEL: State - state

                       
DROP PROCEDURE IF EXISTS `usp_state_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_state_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `state`  
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
                    UPDATE `state` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `state`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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

DROP PROCEDURE IF EXISTS `usp_state_set_code`;
delimiter $$
CREATE PROCEDURE `usp_state_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `state`  
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
                    UPDATE `state` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `state`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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
-- MODEL: State - state

                       
DROP PROCEDURE IF EXISTS `usp_state_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_state_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `state`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_state_del_code`;

delimiter $$
CREATE PROCEDURE `usp_state_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `state`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: State - state

                       
DROP PROCEDURE IF EXISTS `usp_state_get`;

delimiter $$
CREATE PROCEDURE `usp_state_get`
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
        , `description`
    FROM `state`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_state_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_state_get_uuid`
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
        , `description`
    FROM `state`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_state_get_code`;

delimiter $$
CREATE PROCEDURE `usp_state_get_code`
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
        , `description`
    FROM `state`
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
-- MODEL: City - city

                       
DROP PROCEDURE IF EXISTS `usp_city_count`;
delimiter $$
CREATE PROCEDURE `usp_city_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `city`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_city_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_city_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `city`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_city_count_code`;
delimiter $$
CREATE PROCEDURE `usp_city_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `city`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: City - city

                       
DROP PROCEDURE IF EXISTS `usp_city_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_city_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `city` WHERE 1=1 ');
    
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
-- MODEL: City - city

                       
DROP PROCEDURE IF EXISTS `usp_city_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_city_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `city`  
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
                    UPDATE `city` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `city`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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

DROP PROCEDURE IF EXISTS `usp_city_set_code`;
delimiter $$
CREATE PROCEDURE `usp_city_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `city`  
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
                    UPDATE `city` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `city`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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
-- MODEL: City - city

                       
DROP PROCEDURE IF EXISTS `usp_city_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_city_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `city`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_city_del_code`;

delimiter $$
CREATE PROCEDURE `usp_city_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `city`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: City - city

                       
DROP PROCEDURE IF EXISTS `usp_city_get`;

delimiter $$
CREATE PROCEDURE `usp_city_get`
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
        , `description`
    FROM `city`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_city_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_city_get_uuid`
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
        , `description`
    FROM `city`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_city_get_code`;

delimiter $$
CREATE PROCEDURE `usp_city_get_code`
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
        , `description`
    FROM `city`
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
-- MODEL: PostalCode - postal_code

                       
DROP PROCEDURE IF EXISTS `usp_postal_code_count`;
delimiter $$
CREATE PROCEDURE `usp_postal_code_count`
BEGIN
    SELECT
        COUNT(*) as count
    FROM `postal_code`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_postal_code_count_uuid`;
delimiter $$
CREATE PROCEDURE `usp_postal_code_count_uuid`
(
    in_uuid BINARY(16) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `postal_code`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_postal_code_count_code`;
delimiter $$
CREATE PROCEDURE `usp_postal_code_count_code`
(
    in_code VARCHAR (255) 
)
BEGIN
    SELECT
        COUNT(*) as count
    FROM `postal_code`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: PostalCode - postal_code

                       
DROP PROCEDURE IF EXISTS `usp_postal_code_browse_filter`;

delimiter $$
CREATE PROCEDURE `usp_postal_code_browse_filter`
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
    SET @sfields = CONCAT(@sfields, ', `description`');
    
    SET @stable = CONCAT('', ' FROM `postal_code` WHERE 1=1 ');
    
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
-- MODEL: PostalCode - postal_code

                       
DROP PROCEDURE IF EXISTS `usp_postal_code_set_uuid`;
delimiter $$
CREATE PROCEDURE `usp_postal_code_set_uuid`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `postal_code`  
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
                    UPDATE `postal_code` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `postal_code`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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

DROP PROCEDURE IF EXISTS `usp_postal_code_set_code`;
delimiter $$
CREATE PROCEDURE `usp_postal_code_set_code`
(
    in_set_type varchar(50)                      
    , in_status VARCHAR (50) 
    , in_code VARCHAR (255) 
    , in_display_name VARCHAR (255) 
    , in_name VARCHAR (255) 
    , in_date_modified TIMESTAMP 
    , in_uuid BINARY(16) 
    , in_active int 
    , in_date_created TIMESTAMP 
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
                    FROM  `postal_code`  
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
                    UPDATE `postal_code` 
                    SET
                        `status` = in_status
                        , `code` = in_code
                        , `display_name` = in_display_name
                        , `name` = in_name
                        , `date_modified` = in_date_modified
                        , `uuid` = in_uuid
                        , `active` = in_active
                        , `date_created` = in_date_created
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
                    INSERT INTO `postal_code`
                    (
                        `status`
                        , `code`
                        , `display_name`
                        , `name`
                        , `date_modified`
                        , `uuid`
                        , `active`
                        , `date_created`
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
-- MODEL: PostalCode - postal_code

                       
DROP PROCEDURE IF EXISTS `usp_postal_code_del_uuid`;

delimiter $$
CREATE PROCEDURE `usp_postal_code_del_uuid`
(
    in_uuid BINARY(16) 
)

BEGIN
    DELETE 
    FROM `postal_code`
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
END$$
delimiter ;
DROP PROCEDURE IF EXISTS `usp_postal_code_del_code`;

delimiter $$
CREATE PROCEDURE `usp_postal_code_del_code`
(
    in_code VARCHAR (255) 
)

BEGIN
    DELETE 
    FROM `postal_code`
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
END$$
delimiter ;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: PostalCode - postal_code

                       
DROP PROCEDURE IF EXISTS `usp_postal_code_get`;

delimiter $$
CREATE PROCEDURE `usp_postal_code_get`
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
        , `description`
    FROM `postal_code`
    WHERE 1=1
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_postal_code_get_uuid`;

delimiter $$
CREATE PROCEDURE `usp_postal_code_get_uuid`
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
        , `description`
    FROM `postal_code`
    WHERE 1=1
    AND `uuid` = in_uuid
    ;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `usp_postal_code_get_code`;

delimiter $$
CREATE PROCEDURE `usp_postal_code_get_code`
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
        , `description`
    FROM `postal_code`
    WHERE 1=1
    AND lower(`code`) = lower(in_code)
    ;
END$$
delimiter ;


