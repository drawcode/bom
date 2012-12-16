-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------


-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Profile - profile

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_count
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_count_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_count_uuid
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
    FROM "profile"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_count_username_hash
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_count_username_hash
(
    in_username varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    AND lower("hash") = lower(in_hash)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_count_username
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_count_username
(
    in_username varchar (255) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Profile - profile

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_browse_filter
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "username"'
    || ', "hash"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ' FROM "profile" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "username" '
    || ', "hash" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "active" '
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
-- MODEL: Profile - profile

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_set_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_username varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
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
                    FROM  "profile"  
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
                    UPDATE "profile" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "hash" = in_hash
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
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
                    INSERT INTO "profile"
                    (
                        "status"
                        , "username"
                        , "hash"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
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
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_set_username
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_set_username
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_username varchar (255) = NULL
    , in_hash varchar (255) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
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
                    FROM  "profile"  
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
                    UPDATE "profile" 
                    SET
                        "status" = in_status
                        , "username" = in_username
                        , "hash" = in_hash
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "active" = in_active
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
                    INSERT INTO "profile"
                    (
                        "status"
                        , "username"
                        , "hash"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
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
-- MODEL: Profile - profile

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_del_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_del_username
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_del_username
(
    in_username varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile"
    WHERE 1=1                        
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Profile - profile

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_get_uuid
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "hash"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
    FROM "profile"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_get_username_hash
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_get_username_hash
(
    in_username varchar (255) = NULL
    , in_hash varchar (255) = NULL
)
RETURNS setof "profile"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "hash"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
    FROM "profile"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    AND lower("hash") = lower(in_hash)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_get_username
(
    varchar
    , varchar
    , varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_get_username
(
    in_username varchar (255) = NULL
)
RETURNS setof "profile"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "username"
        , "hash"
        , "uuid"
        , "date_modified"
        , "active"
        , "date_created"
    FROM "profile"
    WHERE 1=1
    AND lower("username") = lower(in_username)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileType - profile_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_type_count
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_type"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_type_count_uuid
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_count_uuid
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
    FROM "profile_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_type_count_type_id
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_count_type_id
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
    FROM "profile_type"
    WHERE 1=1
    AND "type_id" = in_type_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileType - profile_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_type_browse_filter
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_type"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "type_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "description"'
    || ' FROM "profile_type" WHERE 1=1 ';
    
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
-- MODEL: ProfileType - profile_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_type_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "profile_type"  
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
                    UPDATE "profile_type" 
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
                    INSERT INTO "profile_type"
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
-- MODEL: ProfileType - profile_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_type_del_uuid
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_type"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileType - profile_type

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_type_get_uuid
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_type"
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
        , "description"
    FROM "profile_type"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_type_get_code
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "profile_type"
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
        , "description"
    FROM "profile_type"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_type_get_type_id
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
);

CREATE OR REPLACE FUNCTION usp_profile_type_get_type_id
(
    in_type_id uuid = NULL
)
RETURNS setof "profile_type"
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
        , "description"
    FROM "profile_type"
    WHERE 1=1
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
-- MODEL: ProfileAttribute - profile_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_count
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_count_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_count_uuid
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
    FROM "profile_attribute"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_count_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_count_code
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
    FROM "profile_attribute"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_count_type
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_count_type
(
    in_type INTEGER = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute"
    WHERE 1=1
    AND "type" = in_type
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_count_group
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_count_group
(
    in_group INTEGER = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute"
    WHERE 1=1
    AND "group" = in_group
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_count_code_type
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_count_code_type
(
    in_code varchar (255) = NULL
    , in_type INTEGER = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    AND "type" = in_type
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_browse_filter
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_attribute"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "sort"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "uuid"'
    || ', "group"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "order"'
    || ', "description"'
    || ' FROM "profile_attribute" WHERE 1=1 ';
    
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
    || ', "uuid" '
    || ', "group" '
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
-- MODEL: ProfileAttribute - profile_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_set_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_group INTEGER = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute"  
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
                    UPDATE "profile_attribute" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "group" = in_group
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
                    INSERT INTO "profile_attribute"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "group"
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
                        , in_uuid
                        , in_group
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

DROP FUNCTION IF EXISTS usp_profile_attribute_set_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_group INTEGER = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute"  
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
                    UPDATE "profile_attribute" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "group" = in_group
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
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
                    INSERT INTO "profile_attribute"
                    (
                        "status"
                        , "sort"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "group"
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
                        , in_uuid
                        , in_group
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
-- MODEL: ProfileAttribute - profile_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_del_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_attribute_del_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_get_uuid
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_attribute"
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
        , "uuid"
        , "group"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "profile_attribute"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_get_code
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "profile_attribute"
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
        , "uuid"
        , "group"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "profile_attribute"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_get_type
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_get_type
(
    in_type INTEGER = NULL
)
RETURNS setof "profile_attribute"
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
        , "uuid"
        , "group"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "profile_attribute"
    WHERE 1=1
    AND "type" = in_type
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_get_group
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_get_group
(
    in_group INTEGER = NULL
)
RETURNS setof "profile_attribute"
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
        , "uuid"
        , "group"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "profile_attribute"
    WHERE 1=1
    AND "group" = in_group
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_get_code_type
(
    varchar
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_get_code_type
(
    in_code varchar (255) = NULL
    , in_type INTEGER = NULL
)
RETURNS setof "profile_attribute"
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
        , "uuid"
        , "group"
        , "active"
        , "date_created"
        , "type"
        , "order"
        , "description"
    FROM "profile_attribute"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    AND "type" = in_type
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_text_count
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute_text"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_text_count_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_count_uuid
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
    FROM "profile_attribute_text"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_text_count_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_count_profile_id
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
    FROM "profile_attribute_text"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_text_count_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_count_profile_id_attribute_id
(
    in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute_text"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_text_browse_filter
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_attribute_text"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "sort"'
    || ', "group"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_id"'
    || ', "attribute_id"'
    || ', "attribute_value"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "order"'
    || ' FROM "profile_attribute_text" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "sort" '
    || ', "group" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "profile_id" '
    || ', "attribute_id" '
    || ', "attribute_value" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "order" '
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
-- MODEL: ProfileAttributeText - profile_attribute_text

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_text_set_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_group INTEGER = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , in_attribute_value varchar (1000) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute_text"  
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
                    UPDATE "profile_attribute_text" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "group" = in_group
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "attribute_id" = in_attribute_id
                        , "attribute_value" = in_attribute_value
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
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
                    INSERT INTO "profile_attribute_text"
                    (
                        "status"
                        , "sort"
                        , "group"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "attribute_id"
                        , "attribute_value"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
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
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_text_set_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_set_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_group INTEGER = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , in_attribute_value varchar (1000) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute_text"  
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
                    UPDATE "profile_attribute_text" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "group" = in_group
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "attribute_id" = in_attribute_id
                        , "attribute_value" = in_attribute_value
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
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
                    INSERT INTO "profile_attribute_text"
                    (
                        "status"
                        , "sort"
                        , "group"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "attribute_id"
                        , "attribute_value"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
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
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_text_set_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_set_profile_id_attribute_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_group INTEGER = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , in_attribute_value varchar (1000) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute_text"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "attribute_id" = in_attribute_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_attribute_text" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "group" = in_group
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "attribute_id" = in_attribute_id
                        , "attribute_value" = in_attribute_value
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "attribute_id" = in_attribute_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_attribute_text"
                    (
                        "status"
                        , "sort"
                        , "group"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "attribute_id"
                        , "attribute_value"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
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
-- MODEL: ProfileAttributeText - profile_attribute_text

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_text_del_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute_text"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_attribute_text_del_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_del_profile_id
(
    in_profile_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute_text"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_attribute_text_del_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_del_profile_id_attribute_id
(
    in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute_text"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_text_get_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_attribute_text"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "group"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "attribute_id"
        , "attribute_value"
        , "active"
        , "date_created"
        , "type"
        , "order"
    FROM "profile_attribute_text"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_text_get_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_attribute_text"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "group"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "attribute_id"
        , "attribute_value"
        , "active"
        , "date_created"
        , "type"
        , "order"
    FROM "profile_attribute_text"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_text_get_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_text_get_profile_id_attribute_id
(
    in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
)
RETURNS setof "profile_attribute_text"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "group"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "attribute_id"
        , "attribute_value"
        , "active"
        , "date_created"
        , "type"
        , "order"
    FROM "profile_attribute_text"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_data_count
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute_data"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_data_count_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_count_uuid
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
    FROM "profile_attribute_data"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_data_count_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_count_profile_id
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
    FROM "profile_attribute_data"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_data_count_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_count_profile_id_attribute_id
(
    in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_attribute_data"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_data_browse_filter
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_attribute_data"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "sort"'
    || ', "group"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_id"'
    || ', "attribute_id"'
    || ', "attribute_value"'
    || ', "active"'
    || ', "date_created"'
    || ', "type"'
    || ', "order"'
    || ' FROM "profile_attribute_data" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "sort" '
    || ', "group" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "profile_id" '
    || ', "attribute_id" '
    || ', "attribute_value" '
    || ', "active" '
    || ', "date_created" '
    || ', "type" '
    || ', "order" '
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
-- MODEL: ProfileAttributeData - profile_attribute_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_data_set_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_group INTEGER = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , in_attribute_value varchar = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute_data"  
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
                    UPDATE "profile_attribute_data" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "group" = in_group
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "attribute_id" = in_attribute_id
                        , "attribute_value" = in_attribute_value
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
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
                    INSERT INTO "profile_attribute_data"
                    (
                        "status"
                        , "sort"
                        , "group"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "attribute_id"
                        , "attribute_value"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
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
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_data_set_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_set_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_group INTEGER = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , in_attribute_value varchar = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute_data"  
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
                    UPDATE "profile_attribute_data" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "group" = in_group
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "attribute_id" = in_attribute_id
                        , "attribute_value" = in_attribute_value
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
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
                    INSERT INTO "profile_attribute_data"
                    (
                        "status"
                        , "sort"
                        , "group"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "attribute_id"
                        , "attribute_value"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
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
                    _id := 1;                  
                END;
            END IF;
        END;     
        SELECT _id INTO out_id;
    END;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_data_set_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_set_profile_id_attribute_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_sort INTEGER = NULL
    , in_group INTEGER = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
    , in_attribute_value varchar = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_type INTEGER = NULL
    , in_order INTEGER = NULL
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
                    FROM  "profile_attribute_data"  
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "attribute_id" = in_attribute_id
                    ;
                END;
            END IF;
	END;

        BEGIN
            -- UPDATE
            IF (_countItems > 0 AND in_set_type != 'insertonly')
                OR (_countItems = 0 AND in_set_type = 'updateonly') THEN
                BEGIN		
                    UPDATE "profile_attribute_data" 
                    SET
                        "status" = in_status
                        , "sort" = in_sort
                        , "group" = in_group
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "attribute_id" = in_attribute_id
                        , "attribute_value" = in_attribute_value
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "type" = in_type
                        , "order" = in_order
                    WHERE 1=1
                    AND "profile_id" = in_profile_id
                    AND "attribute_id" = in_attribute_id
                    ;
                    _id := 1;
                END;
            END IF;
        END;
        BEGIN
            --INSERT
            IF (_countItems = 0 AND in_set_type != 'updateonly') THEN 			
                BEGIN			
                    INSERT INTO "profile_attribute_data"
                    (
                        "status"
                        , "sort"
                        , "group"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "attribute_id"
                        , "attribute_value"
                        , "active"
                        , "date_created"
                        , "type"
                        , "order"
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
-- MODEL: ProfileAttributeData - profile_attribute_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_data_del_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute_data"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_attribute_data_del_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_del_profile_id
(
    in_profile_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute_data"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_attribute_data_del_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_del_profile_id_attribute_id
(
    in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_attribute_data"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_attribute_data_get_uuid
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_attribute_data"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "group"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "attribute_id"
        , "attribute_value"
        , "active"
        , "date_created"
        , "type"
        , "order"
    FROM "profile_attribute_data"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_data_get_profile_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_attribute_data"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "group"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "attribute_id"
        , "attribute_value"
        , "active"
        , "date_created"
        , "type"
        , "order"
    FROM "profile_attribute_data"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_attribute_data_get_profile_id_attribute_id
(
    varchar
    , INTEGER
    , INTEGER
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , boolean
    , TIMESTAMP
    , INTEGER
    , INTEGER
);

CREATE OR REPLACE FUNCTION usp_profile_attribute_data_get_profile_id_attribute_id
(
    in_profile_id uuid = NULL
    , in_attribute_id uuid = NULL
)
RETURNS setof "profile_attribute_data"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "sort"
        , "group"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "attribute_id"
        , "attribute_value"
        , "active"
        , "date_created"
        , "type"
        , "order"
    FROM "profile_attribute_data"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND "attribute_id" = in_attribute_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_device_count
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_device"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_count_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_count_uuid
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
    FROM "profile_device"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_count_profile_id_device_id
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_count_profile_id_device_id
(
    in_profile_id uuid = NULL
    , in_device_id varchar (128) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_device"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND lower("device_id") = lower(in_device_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_count_profile_id_token
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_count_profile_id_token
(
    in_profile_id uuid = NULL
    , in_token varchar (128) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_device"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND lower("token") = lower(in_token)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_count_profile_id
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_count_profile_id
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
    FROM "profile_device"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_count_device_id
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_count_device_id
(
    in_device_id varchar (128) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_device"
    WHERE 1=1
    AND lower("device_id") = lower(in_device_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_count_token
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_count_token
(
    in_token varchar (128) = NULL
    , OUT out_count int
)
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "profile_device"
    WHERE 1=1
    AND lower("token") = lower(in_token)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_device_browse_filter
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_device"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_id"'
    || ', "token"'
    || ', "secret"'
    || ', "device_version"'
    || ', "device_type"'
    || ', "active"'
    || ', "date_created"'
    || ', "device_os"'
    || ', "device_id"'
    || ', "device_platform"'
    || ' FROM "profile_device" WHERE 1=1 ';
    
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
    || ', "profile_id" '
    || ', "token" '
    || ', "secret" '
    || ', "device_version" '
    || ', "device_type" '
    || ', "active" '
    || ', "date_created" '
    || ', "device_os" '
    || ', "device_id" '
    || ', "device_platform" '
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
-- MODEL: ProfileDevice - profile_device

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_device_set_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_token varchar (128) = NULL
    , in_secret varchar (128) = NULL
    , in_device_version varchar (128) = NULL
    , in_device_type varchar (128) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_device_os varchar (128) = NULL
    , in_device_id varchar (128) = NULL
    , in_device_platform varchar (128) = NULL
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
                    FROM  "profile_device"  
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
                    UPDATE "profile_device" 
                    SET
                        "status" = in_status
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "token" = in_token
                        , "secret" = in_secret
                        , "device_version" = in_device_version
                        , "device_type" = in_device_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "device_os" = in_device_os
                        , "device_id" = in_device_id
                        , "device_platform" = in_device_platform
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
                    INSERT INTO "profile_device"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "token"
                        , "secret"
                        , "device_version"
                        , "device_type"
                        , "active"
                        , "date_created"
                        , "device_os"
                        , "device_id"
                        , "device_platform"
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
-- MODEL: ProfileDevice - profile_device

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_device_del_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_device"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_device_del_profile_id_device_id
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_del_profile_id_device_id
(
    in_profile_id uuid = NULL
    , in_device_id varchar (128) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_device"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND lower("device_id") = lower(in_device_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_device_del_profile_id_token
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_del_profile_id_token
(
    in_profile_id uuid = NULL
    , in_token varchar (128) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_device"
    WHERE 1=1                        
    AND "profile_id" = in_profile_id
    AND lower("token") = lower(in_token)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_profile_device_del_token
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_del_token
(
    in_token varchar (128) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "profile_device"
    WHERE 1=1                        
    AND lower("token") = lower(in_token)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_profile_device_get_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "profile_device"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "token"
        , "secret"
        , "device_version"
        , "device_type"
        , "active"
        , "date_created"
        , "device_os"
        , "device_id"
        , "device_platform"
    FROM "profile_device"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_get_profile_id_device_id
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_get_profile_id_device_id
(
    in_profile_id uuid = NULL
    , in_device_id varchar (128) = NULL
)
RETURNS setof "profile_device"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "token"
        , "secret"
        , "device_version"
        , "device_type"
        , "active"
        , "date_created"
        , "device_os"
        , "device_id"
        , "device_platform"
    FROM "profile_device"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND lower("device_id") = lower(in_device_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_get_profile_id_token
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_get_profile_id_token
(
    in_profile_id uuid = NULL
    , in_token varchar (128) = NULL
)
RETURNS setof "profile_device"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "token"
        , "secret"
        , "device_version"
        , "device_type"
        , "active"
        , "date_created"
        , "device_os"
        , "device_id"
        , "device_platform"
    FROM "profile_device"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    AND lower("token") = lower(in_token)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_get_profile_id
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_get_profile_id
(
    in_profile_id uuid = NULL
)
RETURNS setof "profile_device"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "token"
        , "secret"
        , "device_version"
        , "device_type"
        , "active"
        , "date_created"
        , "device_os"
        , "device_id"
        , "device_platform"
    FROM "profile_device"
    WHERE 1=1
    AND "profile_id" = in_profile_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_get_device_id
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_get_device_id
(
    in_device_id varchar (128) = NULL
)
RETURNS setof "profile_device"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "token"
        , "secret"
        , "device_version"
        , "device_type"
        , "active"
        , "date_created"
        , "device_os"
        , "device_id"
        , "device_platform"
    FROM "profile_device"
    WHERE 1=1
    AND lower("device_id") = lower(in_device_id)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_device_get_token
(
    varchar
    , uuid
    , TIMESTAMP
    , uuid
    , varchar
    , varchar
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_profile_device_get_token
(
    in_token varchar (128) = NULL
)
RETURNS setof "profile_device"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "token"
        , "secret"
        , "device_version"
        , "device_type"
        , "active"
        , "date_created"
        , "device_os"
        , "device_id"
        , "device_platform"
    FROM "profile_device"
    WHERE 1=1
    AND lower("token") = lower(in_token)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Country - country

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_country_count
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
);

CREATE OR REPLACE FUNCTION usp_country_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "country"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_country_count_uuid
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
);

CREATE OR REPLACE FUNCTION usp_country_count_uuid
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
    FROM "country"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_country_count_code
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
);

CREATE OR REPLACE FUNCTION usp_country_count_code
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
    FROM "country"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Country - country

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_country_browse_filter
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
);

CREATE OR REPLACE FUNCTION usp_country_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "country"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "description"'
    || ' FROM "country" WHERE 1=1 ';
    
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
-- MODEL: Country - country

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_country_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_country_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "country"  
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
                    UPDATE "country" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "country"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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

DROP FUNCTION IF EXISTS usp_country_set_code
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
);

CREATE OR REPLACE FUNCTION usp_country_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "country"  
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
                    UPDATE "country" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "country"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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
-- MODEL: Country - country

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_country_del_uuid
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
);

CREATE OR REPLACE FUNCTION usp_country_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "country"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_country_del_code
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
);

CREATE OR REPLACE FUNCTION usp_country_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "country"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Country - country

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_country_get
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
);

CREATE OR REPLACE FUNCTION usp_country_get
(
)                        
RETURNS setof "country"
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
        , "description"
    FROM "country"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_country_get_uuid
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
);

CREATE OR REPLACE FUNCTION usp_country_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "country"
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
        , "description"
    FROM "country"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_country_get_code
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
);

CREATE OR REPLACE FUNCTION usp_country_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "country"
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
        , "description"
    FROM "country"
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
-- MODEL: State - state

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_state_count
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
);

CREATE OR REPLACE FUNCTION usp_state_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "state"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_state_count_uuid
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
);

CREATE OR REPLACE FUNCTION usp_state_count_uuid
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
    FROM "state"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_state_count_code
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
);

CREATE OR REPLACE FUNCTION usp_state_count_code
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
    FROM "state"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: State - state

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_state_browse_filter
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
);

CREATE OR REPLACE FUNCTION usp_state_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "state"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "description"'
    || ' FROM "state" WHERE 1=1 ';
    
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
-- MODEL: State - state

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_state_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_state_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "state"  
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
                    UPDATE "state" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "state"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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

DROP FUNCTION IF EXISTS usp_state_set_code
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
);

CREATE OR REPLACE FUNCTION usp_state_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "state"  
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
                    UPDATE "state" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "state"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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
-- MODEL: State - state

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_state_del_uuid
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
);

CREATE OR REPLACE FUNCTION usp_state_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "state"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_state_del_code
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
);

CREATE OR REPLACE FUNCTION usp_state_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "state"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: State - state

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_state_get
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
);

CREATE OR REPLACE FUNCTION usp_state_get
(
)                        
RETURNS setof "state"
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
        , "description"
    FROM "state"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_state_get_uuid
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
);

CREATE OR REPLACE FUNCTION usp_state_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "state"
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
        , "description"
    FROM "state"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_state_get_code
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
);

CREATE OR REPLACE FUNCTION usp_state_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "state"
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
        , "description"
    FROM "state"
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
-- MODEL: City - city

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_city_count
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
);

CREATE OR REPLACE FUNCTION usp_city_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "city"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_city_count_uuid
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
);

CREATE OR REPLACE FUNCTION usp_city_count_uuid
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
    FROM "city"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_city_count_code
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
);

CREATE OR REPLACE FUNCTION usp_city_count_code
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
    FROM "city"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: City - city

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_city_browse_filter
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
);

CREATE OR REPLACE FUNCTION usp_city_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "city"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "description"'
    || ' FROM "city" WHERE 1=1 ';
    
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
-- MODEL: City - city

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_city_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_city_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "city"  
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
                    UPDATE "city" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "city"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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

DROP FUNCTION IF EXISTS usp_city_set_code
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
);

CREATE OR REPLACE FUNCTION usp_city_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "city"  
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
                    UPDATE "city" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "city"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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
-- MODEL: City - city

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_city_del_uuid
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
);

CREATE OR REPLACE FUNCTION usp_city_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "city"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_city_del_code
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
);

CREATE OR REPLACE FUNCTION usp_city_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "city"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: City - city

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_city_get
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
);

CREATE OR REPLACE FUNCTION usp_city_get
(
)                        
RETURNS setof "city"
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
        , "description"
    FROM "city"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_city_get_uuid
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
);

CREATE OR REPLACE FUNCTION usp_city_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "city"
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
        , "description"
    FROM "city"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_city_get_code
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
);

CREATE OR REPLACE FUNCTION usp_city_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "city"
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
        , "description"
    FROM "city"
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
-- MODEL: PostalCode - postal_code

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_postal_code_count
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_count
(          
    OUT out_count int                                                  
)                        
RETURNS int
AS $$
DECLARE
BEGIN
    SELECT
        COUNT(*) INTO out_count
    FROM "postal_code"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_postal_code_count_uuid
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_count_uuid
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
    FROM "postal_code"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_postal_code_count_code
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_count_code
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
    FROM "postal_code"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: PostalCode - postal_code

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_postal_code_browse_filter
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "postal_code"
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
    
    _sql := 'SELECT COUNT(*) as total_rows'
    || ', "status"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
    || ', "description"'
    || ' FROM "postal_code" WHERE 1=1 ';
    
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
-- MODEL: PostalCode - postal_code

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_postal_code_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "postal_code"  
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
                    UPDATE "postal_code" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "postal_code"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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

DROP FUNCTION IF EXISTS usp_postal_code_set_code
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
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
                    FROM  "postal_code"  
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
                    UPDATE "postal_code" 
                    SET
                        "status" = in_status
                        , "code" = in_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "uuid" = in_uuid
                        , "active" = in_active
                        , "date_created" = in_date_created
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
                    INSERT INTO "postal_code"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "uuid"
                        , "active"
                        , "date_created"
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
-- MODEL: PostalCode - postal_code

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_postal_code_del_uuid
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_del_uuid
(
    in_uuid uuid = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "postal_code"
    WHERE 1=1                        
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
DROP FUNCTION IF EXISTS usp_postal_code_del_code
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_del_code
(
    in_code varchar (255) = NULL
)

RETURNS void
AS $$
DECLARE
BEGIN
    DELETE 
    FROM "postal_code"
    WHERE 1=1                        
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: PostalCode - postal_code

/*
CREATE OR REPLACE FUNCTION get_countries(country_code OUT text, country_name OUT text)
RETURNS setof record
AS $$ SELECT country_code, country_name FROM country_codes $$
LANGUAGE sql;

*/
                       
DROP FUNCTION IF EXISTS usp_postal_code_get
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_get
(
)                        
RETURNS setof "postal_code"
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
        , "description"
    FROM "postal_code"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_postal_code_get_uuid
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_get_uuid
(
    in_uuid uuid = NULL
)
RETURNS setof "postal_code"
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
        , "description"
    FROM "postal_code"
    WHERE 1=1
    AND "uuid" = in_uuid
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_postal_code_get_code
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
);

CREATE OR REPLACE FUNCTION usp_postal_code_get_code
(
    in_code varchar (255) = NULL
)
RETURNS setof "postal_code"
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
        , "description"
    FROM "postal_code"
    WHERE 1=1
    AND lower("code") = lower(in_code)
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;


