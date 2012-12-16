-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------


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
);

CREATE OR REPLACE FUNCTION usp_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "app"
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
    || ', "platform"'
    || ', "active"'
    || ', "date_created"'
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
);

CREATE OR REPLACE FUNCTION usp_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
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
);

CREATE OR REPLACE FUNCTION usp_app_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_platform varchar (255) = NULL
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
);

CREATE OR REPLACE FUNCTION usp_app_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "app_type"
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
);

CREATE OR REPLACE FUNCTION usp_app_type_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_app_type_set_code
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
);

CREATE OR REPLACE FUNCTION usp_site_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "site"
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
    || ', "domain"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "type_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
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
);

CREATE OR REPLACE FUNCTION usp_site_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_domain varchar (255) = NULL
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
);

CREATE OR REPLACE FUNCTION usp_site_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_domain varchar (255) = NULL
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
);

CREATE OR REPLACE FUNCTION usp_site_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "site_type"
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
);

CREATE OR REPLACE FUNCTION usp_site_type_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_site_type_set_code
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
);

CREATE OR REPLACE FUNCTION usp_org_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "org"
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
);

CREATE OR REPLACE FUNCTION usp_org_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_org_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "org_type"
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
);

CREATE OR REPLACE FUNCTION usp_org_type_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_org_type_set_code
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
RETURNS setof "content_item"
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
    || ', "type_id"'
    || ', "code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "date_end"'
    || ', "date_start"'
    || ', "uuid"'
    || ', "path"'
    || ', "active"'
    || ', "date_created"'
    || ', "data"'
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
    || ', "date_end" '
    || ', "date_start" '
    || ', "uuid" '
    || ', "path" '
    || ', "active" '
    || ', "date_created" '
    || ', "data" '
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
    , in_status varchar (50) = NULL
    , in_type_id uuid = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_end TIMESTAMP = now()
    , in_date_start TIMESTAMP = now()
    , in_uuid uuid = NULL
    , in_path varchar (500) = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_data varchar = NULL
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
                        , "date_end" = in_date_end
                        , "date_start" = in_date_start
                        , "uuid" = in_uuid
                        , "path" = in_path
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "data" = in_data
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
                        , "date_end"
                        , "date_start"
                        , "uuid"
                        , "path"
                        , "active"
                        , "date_created"
                        , "data"
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
                        , in_date_end
                        , in_date_start
                        , in_uuid
                        , in_path
                        , in_active
                        , in_date_created
                        , in_data
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
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "data"
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
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "data"
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
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "data"
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
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "data"
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
        , "date_end"
        , "date_start"
        , "uuid"
        , "path"
        , "active"
        , "date_created"
        , "data"
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
);

CREATE OR REPLACE FUNCTION usp_content_item_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "content_item_type"
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
);

CREATE OR REPLACE FUNCTION usp_content_item_type_set_uuid
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
);

CREATE OR REPLACE FUNCTION usp_content_item_type_set_code
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "content_page"
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
    || ', "date_end"'
    || ', "date_start"'
    || ', "site_id"'
    || ', "uuid"'
    || ', "template"'
    || ', "path"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "date_end" '
    || ', "date_start" '
    || ', "site_id" '
    || ', "uuid" '
    || ', "template" '
    || ', "path" '
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_content_page_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_date_end TIMESTAMP = now()
    , in_date_start TIMESTAMP = now()
    , in_site_id uuid = NULL
    , in_uuid uuid = NULL
    , in_template varchar = NULL
    , in_path varchar (500) = NULL
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
                        , "date_end" = in_date_end
                        , "date_start" = in_date_start
                        , "site_id" = in_site_id
                        , "uuid" = in_uuid
                        , "template" = in_template
                        , "path" = in_path
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
                    INSERT INTO "content_page"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "date_end"
                        , "date_start"
                        , "site_id"
                        , "uuid"
                        , "template"
                        , "path"
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
                        , in_date_end
                        , in_date_start
                        , in_site_id
                        , in_uuid
                        , in_template
                        , in_path
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "date_end"
        , "date_start"
        , "site_id"
        , "uuid"
        , "template"
        , "path"
        , "active"
        , "date_created"
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
    , uuid
    , TIMESTAMP
    , boolean
    , uuid
    , varchar
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
    , varchar
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
    , uuid
    , TIMESTAMP
    , boolean
    , uuid
    , varchar
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
    , varchar
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
    , uuid
    , TIMESTAMP
    , boolean
    , uuid
    , varchar
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_message_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "message"
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
    || ', "read"'
    || ', "profile_from_id"'
    || ', "profile_to_token"'
    || ', "app_id"'
    || ', "profile_to_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "profile_to_name"'
    || ', "subject"'
    || ', "sent"'
    || ', "profile_from_name"'
    || ' FROM "message" WHERE 1=1 ';
    
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
    || ', "read" '
    || ', "profile_from_id" '
    || ', "profile_to_token" '
    || ', "app_id" '
    || ', "profile_to_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "profile_to_name" '
    || ', "subject" '
    || ', "sent" '
    || ', "profile_from_name" '
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
    , uuid
    , TIMESTAMP
    , boolean
    , uuid
    , varchar
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_message_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_read boolean = true
    , in_profile_from_id uuid = NULL
    , in_profile_to_token varchar (500) = NULL
    , in_app_id uuid = NULL
    , in_profile_to_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_to_name varchar (500) = NULL
    , in_subject varchar (500) = NULL
    , in_sent boolean = true
    , in_profile_from_name varchar (500) = NULL
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
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "read" = in_read
                        , "profile_from_id" = in_profile_from_id
                        , "profile_to_token" = in_profile_to_token
                        , "app_id" = in_app_id
                        , "profile_to_id" = in_profile_to_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "profile_to_name" = in_profile_to_name
                        , "subject" = in_subject
                        , "sent" = in_sent
                        , "profile_from_name" = in_profile_from_name
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
                        , "uuid"
                        , "date_modified"
                        , "read"
                        , "profile_from_id"
                        , "profile_to_token"
                        , "app_id"
                        , "profile_to_id"
                        , "active"
                        , "date_created"
                        , "profile_to_name"
                        , "subject"
                        , "sent"
                        , "profile_from_name"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_read
                        , in_profile_from_id
                        , in_profile_to_token
                        , in_app_id
                        , in_profile_to_id
                        , in_active
                        , in_date_created
                        , in_profile_to_name
                        , in_subject
                        , in_sent
                        , in_profile_from_name
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
    , uuid
    , TIMESTAMP
    , boolean
    , uuid
    , varchar
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
    , varchar
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
    , uuid
    , TIMESTAMP
    , boolean
    , uuid
    , varchar
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
    , varchar
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
        , "uuid"
        , "date_modified"
        , "read"
        , "profile_from_id"
        , "profile_to_token"
        , "app_id"
        , "profile_to_id"
        , "active"
        , "date_created"
        , "profile_to_name"
        , "subject"
        , "sent"
        , "profile_from_name"
    FROM "message"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_message_get_uuid
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , uuid
    , varchar
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
    , boolean
    , varchar
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
        , "uuid"
        , "date_modified"
        , "read"
        , "profile_from_id"
        , "profile_to_token"
        , "app_id"
        , "profile_to_id"
        , "active"
        , "date_created"
        , "profile_to_name"
        , "subject"
        , "sent"
        , "profile_from_name"
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
);

CREATE OR REPLACE FUNCTION usp_game_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game"
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
    || ', "org_id"'
    || ', "uuid"'
    || ', "app_id"'
    || ', "active"'
    || ', "date_created"'
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
);

CREATE OR REPLACE FUNCTION usp_game_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_set_code
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_set_name
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_set_org_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_set_app_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_set_org_id_app_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_app_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_category_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_category"
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
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
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
);

CREATE OR REPLACE FUNCTION usp_game_category_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_org_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_category_tree"
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
    || ', "parent_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "category_id"'
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
);

CREATE OR REPLACE FUNCTION usp_game_category_tree_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_parent_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_category_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_category_assoc"
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
    || ', "active"'
    || ', "date_created"'
    || ', "game_id"'
    || ', "category_id"'
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
);

CREATE OR REPLACE FUNCTION usp_game_category_assoc_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_category_id uuid = NULL
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
RETURNS setof "game_type"
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
    , in_status varchar (50) = NULL
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_game_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_game"
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
    || ', "type_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_id"'
    || ', "game_profile"'
    || ', "game_id"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "uuid" '
    || ', "date_modified" '
    || ', "profile_id" '
    || ', "game_profile" '
    || ', "game_id" '
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_game_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_game_profile varchar = NULL
    , in_game_id uuid = NULL
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
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "game_profile" = in_game_profile
                        , "game_id" = in_game_id
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
                    INSERT INTO "profile_game"
                    (
                        "status"
                        , "type_id"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "game_profile"
                        , "game_id"
                        , "active"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_status
                        , in_type_id
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_game_profile
                        , in_game_id
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_profile"
        , "game_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_profile"
        , "game_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_profile"
        , "game_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_profile"
        , "game_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , varchar
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_profile"
        , "game_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_game_network"
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
    || ', "hash"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "game_id"'
    || ', "profile_id"'
    || ', "secret"'
    || ', "game_network_id"'
    || ', "token"'
    || ', "network_username"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "uuid" '
    || ', "date_modified" '
    || ', "game_id" '
    || ', "profile_id" '
    || ', "secret" '
    || ', "game_network_id" '
    || ', "token" '
    || ', "network_username" '
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_game_network_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_hash varchar (500) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_secret varchar (500) = NULL
    , in_game_network_id uuid = NULL
    , in_token varchar (500) = NULL
    , in_network_username varchar (500) = NULL
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
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "game_id" = in_game_id
                        , "profile_id" = in_profile_id
                        , "secret" = in_secret
                        , "game_network_id" = in_game_network_id
                        , "token" = in_token
                        , "network_username" = in_network_username
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
                    INSERT INTO "profile_game_network"
                    (
                        "status"
                        , "hash"
                        , "uuid"
                        , "date_modified"
                        , "game_id"
                        , "profile_id"
                        , "secret"
                        , "game_network_id"
                        , "token"
                        , "network_username"
                        , "active"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_status
                        , in_hash
                        , in_uuid
                        , in_date_modified
                        , in_game_id
                        , in_profile_id
                        , in_secret
                        , in_game_network_id
                        , in_token
                        , in_network_username
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "game_id"
        , "profile_id"
        , "secret"
        , "game_network_id"
        , "token"
        , "network_username"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "game_id"
        , "profile_id"
        , "secret"
        , "game_network_id"
        , "token"
        , "network_username"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "game_id"
        , "profile_id"
        , "secret"
        , "game_network_id"
        , "token"
        , "network_username"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "game_id"
        , "profile_id"
        , "secret"
        , "game_network_id"
        , "token"
        , "network_username"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "game_id"
        , "profile_id"
        , "secret"
        , "game_network_id"
        , "token"
        , "network_username"
        , "active"
        , "date_created"
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_session"
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
    || ', "game_state"'
    || ', "code"'
    || ', "network_uuid"'
    || ', "description"'
    || ', "network_external_ip"'
    || ', "game_level"'
    || ', "network_external_port"'
    || ', "game_id"'
    || ', "profile_id"'
    || ', "profile_username"'
    || ', "game_area"'
    || ', "active"'
    || ', "game_players_allowed"'
    || ', "profile_network"'
    || ', "game_player_z"'
    || ', "game_player_x"'
    || ', "uuid"'
    || ', "network_port"'
    || ', "game_code"'
    || ', "display_name"'
    || ', "name"'
    || ', "date_modified"'
    || ', "game_players_connected"'
    || ', "game_type"'
    || ', "profile_device"'
    || ', "date_created"'
    || ', "network_ip"'
    || ', "network_use_nat"'
    || ', "hash"'
    || ' FROM "game_session" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "game_state" '
    || ', "code" '
    || ', "network_uuid" '
    || ', "description" '
    || ', "network_external_ip" '
    || ', "game_level" '
    || ', "network_external_port" '
    || ', "game_id" '
    || ', "profile_id" '
    || ', "profile_username" '
    || ', "game_area" '
    || ', "active" '
    || ', "game_players_allowed" '
    || ', "profile_network" '
    || ', "game_player_z" '
    || ', "game_player_x" '
    || ', "uuid" '
    || ', "network_port" '
    || ', "game_code" '
    || ', "display_name" '
    || ', "name" '
    || ', "date_modified" '
    || ', "game_players_connected" '
    || ', "game_type" '
    || ', "profile_device" '
    || ', "date_created" '
    || ', "network_ip" '
    || ', "network_use_nat" '
    || ', "hash" '
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_game_state varchar = NULL
    , in_code varchar (255) = NULL
    , in_network_uuid varchar (40) = NULL
    , in_description varchar (255) = NULL
    , in_network_external_ip varchar (40) = NULL
    , in_game_level varchar (255) = NULL
    , in_network_external_port INTEGER = NULL
    , in_game_id uuid = NULL
    , in_profile_id uuid = NULL
    , in_profile_username varchar (500) = NULL
    , in_game_area varchar (255) = NULL
    , in_active boolean = NULL
    , in_game_players_allowed INTEGER = NULL
    , in_profile_network varchar (255) = NULL
    , in_game_player_z decimal = NULL
    , in_game_player_x decimal = NULL
    , in_uuid uuid = NULL
    , in_network_port INTEGER = NULL
    , in_game_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_game_players_connected INTEGER = NULL
    , in_game_type varchar (255) = NULL
    , in_profile_device varchar (50) = NULL
    , in_date_created TIMESTAMP = now()
    , in_network_ip varchar (40) = NULL
    , in_network_use_nat boolean = true
    , in_hash varchar (255) = NULL
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
                        "status" = in_status
                        , "game_state" = in_game_state
                        , "code" = in_code
                        , "network_uuid" = in_network_uuid
                        , "description" = in_description
                        , "network_external_ip" = in_network_external_ip
                        , "game_level" = in_game_level
                        , "network_external_port" = in_network_external_port
                        , "game_id" = in_game_id
                        , "profile_id" = in_profile_id
                        , "profile_username" = in_profile_username
                        , "game_area" = in_game_area
                        , "active" = in_active
                        , "game_players_allowed" = in_game_players_allowed
                        , "profile_network" = in_profile_network
                        , "game_player_z" = in_game_player_z
                        , "game_player_x" = in_game_player_x
                        , "uuid" = in_uuid
                        , "network_port" = in_network_port
                        , "game_code" = in_game_code
                        , "display_name" = in_display_name
                        , "name" = in_name
                        , "date_modified" = in_date_modified
                        , "game_players_connected" = in_game_players_connected
                        , "game_type" = in_game_type
                        , "profile_device" = in_profile_device
                        , "date_created" = in_date_created
                        , "network_ip" = in_network_ip
                        , "network_use_nat" = in_network_use_nat
                        , "hash" = in_hash
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
                        "status"
                        , "game_state"
                        , "code"
                        , "network_uuid"
                        , "description"
                        , "network_external_ip"
                        , "game_level"
                        , "network_external_port"
                        , "game_id"
                        , "profile_id"
                        , "profile_username"
                        , "game_area"
                        , "active"
                        , "game_players_allowed"
                        , "profile_network"
                        , "game_player_z"
                        , "game_player_x"
                        , "uuid"
                        , "network_port"
                        , "game_code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "game_players_connected"
                        , "game_type"
                        , "profile_device"
                        , "date_created"
                        , "network_ip"
                        , "network_use_nat"
                        , "hash"
                    )
                    VALUES
                    (
                        in_status
                        , in_game_state
                        , in_code
                        , in_network_uuid
                        , in_description
                        , in_network_external_ip
                        , in_game_level
                        , in_network_external_port
                        , in_game_id
                        , in_profile_id
                        , in_profile_username
                        , in_game_area
                        , in_active
                        , in_game_players_allowed
                        , in_profile_network
                        , in_game_player_z
                        , in_game_player_x
                        , in_uuid
                        , in_network_port
                        , in_game_code
                        , in_display_name
                        , in_name
                        , in_date_modified
                        , in_game_players_connected
                        , in_game_type
                        , in_profile_device
                        , in_date_created
                        , in_network_ip
                        , in_network_use_nat
                        , in_hash
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
);

CREATE OR REPLACE FUNCTION usp_game_session_get
(
)                        
RETURNS setof "game_session"
AS $$
DECLARE
BEGIN
    RETURN QUERY SELECT
        "status"
        , "game_state"
        , "code"
        , "network_uuid"
        , "description"
        , "network_external_ip"
        , "game_level"
        , "network_external_port"
        , "game_id"
        , "profile_id"
        , "profile_username"
        , "game_area"
        , "active"
        , "game_players_allowed"
        , "profile_network"
        , "game_player_z"
        , "game_player_x"
        , "uuid"
        , "network_port"
        , "game_code"
        , "display_name"
        , "name"
        , "date_modified"
        , "game_players_connected"
        , "game_type"
        , "profile_device"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
        , "hash"
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
        "status"
        , "game_state"
        , "code"
        , "network_uuid"
        , "description"
        , "network_external_ip"
        , "game_level"
        , "network_external_port"
        , "game_id"
        , "profile_id"
        , "profile_username"
        , "game_area"
        , "active"
        , "game_players_allowed"
        , "profile_network"
        , "game_player_z"
        , "game_player_x"
        , "uuid"
        , "network_port"
        , "game_code"
        , "display_name"
        , "name"
        , "date_modified"
        , "game_players_connected"
        , "game_type"
        , "profile_device"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
        , "hash"
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
        "status"
        , "game_state"
        , "code"
        , "network_uuid"
        , "description"
        , "network_external_ip"
        , "game_level"
        , "network_external_port"
        , "game_id"
        , "profile_id"
        , "profile_username"
        , "game_area"
        , "active"
        , "game_players_allowed"
        , "profile_network"
        , "game_player_z"
        , "game_player_x"
        , "uuid"
        , "network_port"
        , "game_code"
        , "display_name"
        , "name"
        , "date_modified"
        , "game_players_connected"
        , "game_type"
        , "profile_device"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
        , "hash"
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
        "status"
        , "game_state"
        , "code"
        , "network_uuid"
        , "description"
        , "network_external_ip"
        , "game_level"
        , "network_external_port"
        , "game_id"
        , "profile_id"
        , "profile_username"
        , "game_area"
        , "active"
        , "game_players_allowed"
        , "profile_network"
        , "game_player_z"
        , "game_player_x"
        , "uuid"
        , "network_port"
        , "game_code"
        , "display_name"
        , "name"
        , "date_modified"
        , "game_players_connected"
        , "game_type"
        , "profile_device"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
        , "hash"
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
    , varchar
    , varchar
    , varchar
    , varchar
    , INTEGER
    , uuid
    , uuid
    , varchar
    , varchar
    , boolean
    , INTEGER
    , varchar
    , decimal
    , decimal
    , uuid
    , INTEGER
    , varchar
    , varchar
    , varchar
    , TIMESTAMP
    , INTEGER
    , varchar
    , varchar
    , TIMESTAMP
    , varchar
    , boolean
    , varchar
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
        "status"
        , "game_state"
        , "code"
        , "network_uuid"
        , "description"
        , "network_external_ip"
        , "game_level"
        , "network_external_port"
        , "game_id"
        , "profile_id"
        , "profile_username"
        , "game_area"
        , "active"
        , "game_players_allowed"
        , "profile_network"
        , "game_player_z"
        , "game_player_x"
        , "uuid"
        , "network_port"
        , "game_code"
        , "display_name"
        , "name"
        , "date_modified"
        , "game_players_connected"
        , "game_type"
        , "profile_device"
        , "date_created"
        , "network_ip"
        , "network_use_nat"
        , "hash"
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
RETURNS setof "game_session_data"
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
    || ', "data_results"'
    || ', "uuid"'
    || ', "data_layer_projectile"'
    || ', "data_layer_actors"'
    || ', "active"'
    || ', "date_created"'
    || ', "data_layer_enemy"'
    || ', "data"'
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
    || ', "uuid" '
    || ', "data_layer_projectile" '
    || ', "data_layer_actors" '
    || ', "active" '
    || ', "date_created" '
    || ', "data_layer_enemy" '
    || ', "data" '
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
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_data_results varchar = NULL
    , in_uuid uuid = NULL
    , in_data_layer_projectile varchar = NULL
    , in_data_layer_actors varchar = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_data_layer_enemy varchar = NULL
    , in_data varchar = NULL
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
                        , "uuid" = in_uuid
                        , "data_layer_projectile" = in_data_layer_projectile
                        , "data_layer_actors" = in_data_layer_actors
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "data_layer_enemy" = in_data_layer_enemy
                        , "data" = in_data
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
                        , "uuid"
                        , "data_layer_projectile"
                        , "data_layer_actors"
                        , "active"
                        , "date_created"
                        , "data_layer_enemy"
                        , "data"
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
                        , in_uuid
                        , in_data_layer_projectile
                        , in_data_layer_actors
                        , in_active
                        , in_date_created
                        , in_data_layer_enemy
                        , in_data
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
        , "uuid"
        , "data_layer_projectile"
        , "data_layer_actors"
        , "active"
        , "date_created"
        , "data_layer_enemy"
        , "data"
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
        , "uuid"
        , "data_layer_projectile"
        , "data_layer_actors"
        , "active"
        , "date_created"
        , "data_layer_enemy"
        , "data"
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "game_app"
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
    || ', "active"'
    || ', "date_created"'
    || ', "game_id"'
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_game_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_game_id uuid = NULL
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer"
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
    || ', "url"'
    || ', "type_id"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "usage_count"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "type_id" '
    || ', "org_id" '
    || ', "uuid" '
    || ', "usage_count" '
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_type_id uuid = NULL
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_usage_count INTEGER = NULL
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
                        , "type_id" = in_type_id
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "usage_count" = in_usage_count
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
                    INSERT INTO "offer"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "type_id"
                        , "org_id"
                        , "uuid"
                        , "usage_count"
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
                        , in_url
                        , in_type_id
                        , in_org_id
                        , in_uuid
                        , in_usage_count
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
);

CREATE OR REPLACE FUNCTION usp_offer_type_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_type"
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
);

CREATE OR REPLACE FUNCTION usp_offer_type_set_uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_location"
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
    || ', "offer_id"'
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
    || ', "country_code" '
    || ', "date_created" '
    || ', "active" '
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
    || ', "offer_id" '
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_offer_id uuid = NULL
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
                        , "country_code" = in_country_code
                        , "date_created" = in_date_created
                        , "active" = in_active
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
                        , "offer_id" = in_offer_id
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
                        , "country_code"
                        , "date_created"
                        , "active"
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
                        , "offer_id"
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
                        , in_offer_id
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
        , "country_code"
        , "date_created"
        , "active"
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
        , "offer_id"
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
        , "country_code"
        , "date_created"
        , "active"
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
        , "offer_id"
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
        , "country_code"
        , "date_created"
        , "active"
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
        , "offer_id"
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
        , "country_code"
        , "date_created"
        , "active"
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
        , "offer_id"
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
        , "country_code"
        , "date_created"
        , "active"
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
        , "offer_id"
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
    , varchar
    , TIMESTAMP
    , boolean
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
    , uuid
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
        , "country_code"
        , "date_created"
        , "active"
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
        , "offer_id"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_category"
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
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "type_id" '
    || ', "org_id" '
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_offer_category_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_org_id uuid = NULL
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
                        , "type_id" = in_type_id
                        , "org_id" = in_org_id
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
                    INSERT INTO "offer_category"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
);

CREATE OR REPLACE FUNCTION usp_offer_category_tree_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_category_tree"
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
    || ', "parent_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "category_id"'
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
);

CREATE OR REPLACE FUNCTION usp_offer_category_tree_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_parent_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_category_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_category_assoc"
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
    || ', "active"'
    || ', "date_created"'
    || ', "offer_id"'
    || ', "category_id"'
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
);

CREATE OR REPLACE FUNCTION usp_offer_category_assoc_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_offer_id uuid = NULL
    , in_category_id uuid = NULL
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "offer_game_location"
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
    || ', "offer_id"'
    || ', "type_id"'
    || ', "game_location_id"'
    || ', "active"'
    || ', "date_created"'
    || ' FROM "offer_game_location" WHERE 1=1 ';
    
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
    || ', "offer_id" '
    || ', "type_id" '
    || ', "game_location_id" '
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_offer_game_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_offer_id uuid = NULL
    , in_type_id uuid = NULL
    , in_game_location_id uuid = NULL
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
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "offer_id" = in_offer_id
                        , "type_id" = in_type_id
                        , "game_location_id" = in_game_location_id
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
                    INSERT INTO "offer_game_location"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "offer_id"
                        , "type_id"
                        , "game_location_id"
                        , "active"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_offer_id
                        , in_type_id
                        , in_game_location_id
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "offer_id"
        , "type_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "offer_id"
        , "type_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "offer_id"
        , "type_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "offer_id"
        , "type_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "uuid"
        , "date_modified"
        , "offer_id"
        , "type_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_info"
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
    || ', "url"'
    || ', "org_id"'
    || ', "uuid"'
    || ', "usage_count"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "org_id" '
    || ', "uuid" '
    || ', "usage_count" '
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_info_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (500) = NULL
    , in_org_id uuid = NULL
    , in_uuid uuid = NULL
    , in_usage_count INTEGER = NULL
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
                        , "org_id" = in_org_id
                        , "uuid" = in_uuid
                        , "usage_count" = in_usage_count
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
                    INSERT INTO "event_info"
                    (
                        "status"
                        , "code"
                        , "display_name"
                        , "name"
                        , "date_modified"
                        , "url"
                        , "org_id"
                        , "uuid"
                        , "usage_count"
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
                        , in_url
                        , in_org_id
                        , in_uuid
                        , in_usage_count
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , INTEGER
    , boolean
    , TIMESTAMP
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
        , "org_id"
        , "uuid"
        , "usage_count"
        , "active"
        , "date_created"
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
);

CREATE OR REPLACE FUNCTION usp_event_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_location"
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
);

CREATE OR REPLACE FUNCTION usp_event_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_category"
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
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "type_id" '
    || ', "org_id" '
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_event_category_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_org_id uuid = NULL
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
                        , "type_id" = in_type_id
                        , "org_id" = in_org_id
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
                    INSERT INTO "event_category"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
);

CREATE OR REPLACE FUNCTION usp_event_category_tree_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_category_tree"
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
    || ', "parent_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "category_id"'
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
);

CREATE OR REPLACE FUNCTION usp_event_category_tree_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_parent_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_category_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_event_category_assoc_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "event_category_assoc"
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
    || ', "event_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "category_id"'
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
);

CREATE OR REPLACE FUNCTION usp_event_category_assoc_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_event_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_category_id uuid = NULL
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "channel"
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
    || ', "org_id"'
    || ', "uuid"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "type_id" '
    || ', "org_id" '
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
    , in_type_id uuid = NULL
    , in_org_id uuid = NULL
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
                        , "type_id" = in_type_id
                        , "org_id" = in_org_id
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
                    INSERT INTO "channel"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "org_id"
        , "uuid"
        , "active"
        , "date_created"
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
RETURNS setof "channel_type"
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
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , varchar
);

CREATE OR REPLACE FUNCTION usp_channel_type_set_uuid
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
RETURNS setof "question"
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
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
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
    , in_status varchar (50) = NULL
    , in_code varchar (255) = NULL
    , in_display_name varchar (255) = NULL
    , in_name varchar (255) = NULL
    , in_date_modified TIMESTAMP = now()
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_offer_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_offer"
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
    || ', "profile_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "url"'
    || ', "offer_id"'
    || ', "redeem_code"'
    || ', "redeemed"'
    || ', "active"'
    || ', "date_created"'
    || ' FROM "profile_offer" WHERE 1=1 ';
    
    BEGIN
        IF in_filter IS NOT NULL AND in_filter != '' THEN
            _sql := _sql || ' ' || in_filter || ' ';
        END IF;
    END;    
    
    _sql := _sql 
    || ' GROUP BY '
    || '"status" '
    || ', "profile_id" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "url" '
    || ', "offer_id" '
    || ', "redeem_code" '
    || ', "redeemed" '
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_offer_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_profile_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_url varchar (50) = NULL
    , in_offer_id uuid = NULL
    , in_redeem_code varchar (128) = NULL
    , in_redeemed varchar (50) = NULL
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
                        , "profile_id" = in_profile_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "url" = in_url
                        , "offer_id" = in_offer_id
                        , "redeem_code" = in_redeem_code
                        , "redeemed" = in_redeemed
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
                    INSERT INTO "profile_offer"
                    (
                        "status"
                        , "profile_id"
                        , "uuid"
                        , "date_modified"
                        , "url"
                        , "offer_id"
                        , "redeem_code"
                        , "redeemed"
                        , "active"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_status
                        , in_profile_id
                        , in_uuid
                        , in_date_modified
                        , in_url
                        , in_offer_id
                        , in_redeem_code
                        , in_redeemed
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "profile_id"
        , "uuid"
        , "date_modified"
        , "url"
        , "offer_id"
        , "redeem_code"
        , "redeemed"
        , "active"
        , "date_created"
    FROM "profile_offer"
    WHERE 1=1
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;

DROP FUNCTION IF EXISTS usp_profile_offer_get_uuid
(
    varchar
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "profile_id"
        , "uuid"
        , "date_modified"
        , "url"
        , "offer_id"
        , "redeem_code"
        , "redeemed"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , TIMESTAMP
    , varchar
    , uuid
    , varchar
    , varchar
    , boolean
    , TIMESTAMP
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
        , "profile_id"
        , "uuid"
        , "date_modified"
        , "url"
        , "offer_id"
        , "redeem_code"
        , "redeemed"
        , "active"
        , "date_created"
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
    , uuid
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
    , uuid
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
    , uuid
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_app"
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
    || ', "active"'
    || ', "date_created"'
    || ', "profile_id"'
    || ', "app_id"'
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
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
                    INSERT INTO "profile_app"
                    (
                        "status"
                        , "uuid"
                        , "date_modified"
                        , "active"
                        , "date_created"
                        , "profile_id"
                        , "app_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_profile_id
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

DROP FUNCTION IF EXISTS usp_profile_app_set_profile_id_app_id
(
    varchar
    , uuid
    , TIMESTAMP
    , boolean
    , TIMESTAMP
    , uuid
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_app_set_profile_id_app_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
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
                        , "app_id" = in_app_id
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
                        , "app_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_uuid
                        , in_date_modified
                        , in_active
                        , in_date_created
                        , in_profile_id
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
    , uuid
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
    , uuid
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
    , uuid
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
        , "app_id"
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
    , uuid
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
        , "app_id"
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
    , uuid
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
        , "app_id"
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
    , uuid
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
        , "app_id"
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
    , uuid
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
        , "app_id"
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_org_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_org"
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
    || ', "type_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_id"'
    || ', "org_id"'
    || ', "active"'
    || ', "date_created"'
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
    || ', "profile_id" '
    || ', "org_id" '
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_org_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_org_id uuid = NULL
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
                        , "profile_id" = in_profile_id
                        , "org_id" = in_org_id
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
                    INSERT INTO "profile_org"
                    (
                        "status"
                        , "type_id"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "org_id"
                        , "active"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_status
                        , in_type_id
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_org_id
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "profile_id"
        , "org_id"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "profile_id"
        , "org_id"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "profile_id"
        , "org_id"
        , "active"
        , "date_created"
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
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "profile_id"
        , "org_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_game_location"
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
    || ', "type_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_id"'
    || ', "game_location_id"'
    || ', "active"'
    || ', "date_created"'
    || ' FROM "profile_game_location" WHERE 1=1 ';
    
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
    || ', "profile_id" '
    || ', "game_location_id" '
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
);

CREATE OR REPLACE FUNCTION usp_profile_game_location_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_type_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_game_location_id uuid = NULL
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
                        , "type_id" = in_type_id
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "game_location_id" = in_game_location_id
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
                    INSERT INTO "profile_game_location"
                    (
                        "status"
                        , "type_id"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "game_location_id"
                        , "active"
                        , "date_created"
                    )
                    VALUES
                    (
                        in_status
                        , in_type_id
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_game_location_id
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , TIMESTAMP
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
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
        , "type_id"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "game_location_id"
        , "active"
        , "date_created"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
RETURNS setof "profile_question"
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
    || ', "answer"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "profile_id"'
    || ', "org_id"'
    || ', "channel_id"'
    || ', "active"'
    || ', "date_created"'
    || ', "data"'
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
    || ', "answer" '
    || ', "uuid" '
    || ', "date_modified" '
    || ', "profile_id" '
    || ', "org_id" '
    || ', "channel_id" '
    || ', "active" '
    || ', "date_created" '
    || ', "data" '
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_answer varchar (1000) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_data varchar = NULL
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
                        , "answer" = in_answer
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "data" = in_data
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
                        , "answer"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "org_id"
                        , "channel_id"
                        , "active"
                        , "date_created"
                        , "data"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_answer
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_org_id
                        , in_channel_id
                        , in_active
                        , in_date_created
                        , in_data
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_channel_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_answer varchar (1000) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_data varchar = NULL
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
                        , "answer" = in_answer
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "data" = in_data
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
                        , "answer"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "org_id"
                        , "channel_id"
                        , "active"
                        , "date_created"
                        , "data"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_answer
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_org_id
                        , in_channel_id
                        , in_active
                        , in_date_created
                        , in_data
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_question_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_answer varchar (1000) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_data varchar = NULL
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
                        , "answer" = in_answer
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "data" = in_data
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
                        , "answer"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "org_id"
                        , "channel_id"
                        , "active"
                        , "date_created"
                        , "data"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_answer
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_org_id
                        , in_channel_id
                        , in_active
                        , in_date_created
                        , in_data
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
    , TIMESTAMP
    , varchar
    , uuid
);

CREATE OR REPLACE FUNCTION usp_profile_question_set_channel_id_question_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_answer varchar (1000) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_profile_id uuid = NULL
    , in_org_id uuid = NULL
    , in_channel_id uuid = NULL
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_data varchar = NULL
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
                        , "answer" = in_answer
                        , "uuid" = in_uuid
                        , "date_modified" = in_date_modified
                        , "profile_id" = in_profile_id
                        , "org_id" = in_org_id
                        , "channel_id" = in_channel_id
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "data" = in_data
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
                        , "answer"
                        , "uuid"
                        , "date_modified"
                        , "profile_id"
                        , "org_id"
                        , "channel_id"
                        , "active"
                        , "date_created"
                        , "data"
                        , "question_id"
                    )
                    VALUES
                    (
                        in_status
                        , in_answer
                        , in_uuid
                        , in_date_modified
                        , in_profile_id
                        , in_org_id
                        , in_channel_id
                        , in_active
                        , in_date_created
                        , in_data
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
    , varchar
    , uuid
    , TIMESTAMP
    , uuid
    , uuid
    , uuid
    , boolean
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
        , "answer"
        , "uuid"
        , "date_modified"
        , "profile_id"
        , "org_id"
        , "channel_id"
        , "active"
        , "date_created"
        , "data"
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
);

CREATE OR REPLACE FUNCTION usp_profile_channel_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "profile_channel"
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
    || ', "channel_id"'
    || ', "uuid"'
    || ', "date_modified"'
    || ', "active"'
    || ', "date_created"'
    || ', "profile_id"'
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
);

CREATE OR REPLACE FUNCTION usp_profile_channel_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_channel_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
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
);

CREATE OR REPLACE FUNCTION usp_profile_channel_set_channel_id_profile_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_channel_id uuid = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_profile_id uuid = NULL
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_org_site_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "org_site"
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
    || ', "active"'
    || ', "date_created"'
    || ', "site_id"'
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_org_site_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_org_site_set_org_id_site_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_site_app_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "site_app"
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
    || ', "active"'
    || ', "date_created"'
    || ', "site_id"'
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_site_app_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
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
    , uuid
);

CREATE OR REPLACE FUNCTION usp_site_app_set_app_id_site_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
    , in_uuid uuid = NULL
    , in_date_modified TIMESTAMP = now()
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_site_id uuid = NULL
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "photo"
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
    || ', "active"'
    || ', "date_created"'
    || ', "external_id"'
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
    || ', "third_party_url" '
    || ', "third_party_id" '
    || ', "content_type" '
    || ', "active" '
    || ', "date_created" '
    || ', "external_id" '
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_url
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_url_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_photo_set_uuid_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_browse_filter
(
    in_page int = 1,
    in_page_size int = 10,
    in_sort VARCHAR(500) = 'date_modified ASC',
    in_filter VARCHAR(4000) = NULL
    
)
RETURNS setof "video"
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
    || ', "active"'
    || ', "date_created"'
    || ', "external_id"'
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
    || ', "third_party_url" '
    || ', "third_party_id" '
    || ', "content_type" '
    || ', "active" '
    || ', "date_created" '
    || ', "external_id" '
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_uuid
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_url
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_url_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
    , varchar
);

CREATE OR REPLACE FUNCTION usp_video_set_uuid_external_id
(
    in_set_type varchar (50) = 'full'                        
    , in_status varchar (50) = NULL
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
    , in_active boolean = NULL
    , in_date_created TIMESTAMP = now()
    , in_external_id uuid = NULL
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
                        , "third_party_url" = in_third_party_url
                        , "third_party_id" = in_third_party_id
                        , "content_type" = in_content_type
                        , "active" = in_active
                        , "date_created" = in_date_created
                        , "external_id" = in_external_id
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
                        , "third_party_url"
                        , "third_party_id"
                        , "content_type"
                        , "active"
                        , "date_created"
                        , "external_id"
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
                        , in_active
                        , in_date_created
                        , in_external_id
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
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
    , boolean
    , TIMESTAMP
    , uuid
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
        , "third_party_url"
        , "third_party_id"
        , "content_type"
        , "active"
        , "date_created"
        , "external_id"
        , "description"
    FROM "video"
    WHERE 1=1
    AND "uuid" = in_uuid
    AND "external_id" = in_external_id
    ;
    RETURN;
END;
$$ LANGUAGE plpgsql;


