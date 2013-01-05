-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------
-- TABLES

/*
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_attribute]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_attribute]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_attribute_text]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_attribute_text]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_attribute_data]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_attribute_data]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_device]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_device]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[country]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[country]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[state]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[state]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[city]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[city]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[postal_code]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[postal_code]
GO
*/


CREATE TABLE [dbo].[profile] 
(
    [status] varchar (50)
    , [username] varchar (255)
    , [first_name] varchar (255)
    , [last_name] varchar (255)
    , [hash] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_profile_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_date_created DEFAULT GETDATE()
    , [email] varchar (255)
    , [name] varchar (255)
)
GO
ALTER TABLE [dbo].[profile] ADD 
    CONSTRAINT [PK_profile] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_type] 
(
    [status] varchar (50)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_type_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_profile_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_type_date_created DEFAULT GETDATE()
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[profile_type] ADD 
    CONSTRAINT [PK_profile_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_attribute] 
(
    [status] varchar (50)
    , [sort] int
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_attribute_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [group] int
    , [active] bit
                CONSTRAINT DF_profile_attribute_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_attribute_date_created DEFAULT GETDATE()
    , [type] int
    , [order] int
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[profile_attribute] ADD 
    CONSTRAINT [PK_profile_attribute] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_attribute_text] 
(
    [status] varchar (50)
    , [sort] int
    , [group] int
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_attribute_text_date_modified DEFAULT GETDATE()
    , [profile_id] uniqueidentifier
    , [attribute_id] uniqueidentifier
    , [attribute_value] varchar (1000)
    , [active] bit
                CONSTRAINT DF_profile_attribute_text_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_attribute_text_date_created DEFAULT GETDATE()
    , [type] int
    , [order] int
)
GO
ALTER TABLE [dbo].[profile_attribute_text] ADD 
    CONSTRAINT [PK_profile_attribute_text] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_attribute_data] 
(
    [status] varchar (50)
    , [sort] int
    , [group] int
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_attribute_data_date_modified DEFAULT GETDATE()
    , [profile_id] uniqueidentifier
    , [attribute_id] uniqueidentifier
    , [attribute_value] ntext
    , [active] bit
                CONSTRAINT DF_profile_attribute_data_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_attribute_data_date_created DEFAULT GETDATE()
    , [type] int
    , [order] int
)
GO
ALTER TABLE [dbo].[profile_attribute_data] ADD 
    CONSTRAINT [PK_profile_attribute_data] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_device] 
(
    [status] varchar (50)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_device_date_modified DEFAULT GETDATE()
    , [profile_id] uniqueidentifier NOT NULL
    , [token] varchar (128)
    , [secret] varchar (128)
    , [device_version] varchar (128)
    , [device_type] varchar (128)
    , [active] bit
                CONSTRAINT DF_profile_device_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_device_date_created DEFAULT GETDATE()
    , [device_os] varchar (128)
    , [device_id] varchar (128) NOT NULL
    , [device_platform] varchar (128)
)
GO
ALTER TABLE [dbo].[profile_device] ADD 
    CONSTRAINT [PK_profile_device] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[country] 
(
    [status] varchar (50)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_country_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_country_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_country_date_created DEFAULT GETDATE()
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[country] ADD 
    CONSTRAINT [PK_country] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[state] 
(
    [status] varchar (50)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_state_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_state_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_state_date_created DEFAULT GETDATE()
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[state] ADD 
    CONSTRAINT [PK_state] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[city] 
(
    [status] varchar (50)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_city_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_city_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_city_date_created DEFAULT GETDATE()
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[city] ADD 
    CONSTRAINT [PK_city] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[postal_code] 
(
    [status] varchar (50)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_postal_code_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_postal_code_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_postal_code_date_created DEFAULT GETDATE()
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[postal_code] ADD 
    CONSTRAINT [PK_postal_code] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO

   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile]') AND name = N'IX_profile_username_hash')
DROP INDEX [IX_profile_username_hash] ON [dbo].[profile]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_text]') AND name = N'IX_profile_attribute_text_profile_id')
DROP INDEX [IX_profile_attribute_text_profile_id] ON [dbo].[profile_attribute_text]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_text]') AND name = N'IX_profile_attribute_text_attribute_id')
DROP INDEX [IX_profile_attribute_text_attribute_id] ON [dbo].[profile_attribute_text]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_text]') AND name = N'IX_profile_attribute_text_profile_id_attribute_id')
DROP INDEX [IX_profile_attribute_text_profile_id_attribute_id] ON [dbo].[profile_attribute_text]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_text]') AND name = N'IX_profile_attribute_text_profile_id_attribute_id_sort')
DROP INDEX [IX_profile_attribute_text_profile_id_attribute_id_sort] ON [dbo].[profile_attribute_text]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_data]') AND name = N'IX_profile_attribute_data_profile_id')
DROP INDEX [IX_profile_attribute_data_profile_id] ON [dbo].[profile_attribute_data]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_data]') AND name = N'IX_profile_attribute_data_attribute_id')
DROP INDEX [IX_profile_attribute_data_attribute_id] ON [dbo].[profile_attribute_data]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_data]') AND name = N'IX_profile_attribute_data_profile_id_attribute_id')
DROP INDEX [IX_profile_attribute_data_profile_id_attribute_id] ON [dbo].[profile_attribute_data]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_attribute_data]') AND name = N'IX_profile_attribute_data_profile_id_attribute_id_sort')
DROP INDEX [IX_profile_attribute_data_profile_id_attribute_id_sort] ON [dbo].[profile_attribute_data]
GO

        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_profile_username_hash] ON [dbo].[profile] 
(
                    
    [username] ASC
                    
    , [hash] ASC
)
GO
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_profile_attribute_text_profile_id] ON [dbo].[profile_attribute_text] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_attribute_text_attribute_id] ON [dbo].[profile_attribute_text] 
(
                    
    [attribute_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_attribute_text_profile_id_attribute_id] ON [dbo].[profile_attribute_text] 
(
                    
    [profile_id] ASC
                    
    , [attribute_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_attribute_text_profile_id_attribute_id_sort] ON [dbo].[profile_attribute_text] 
(
                    
    [sort] ASC
                    
    , [profile_id] ASC
                    
    , [attribute_id] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_profile_attribute_data_profile_id] ON [dbo].[profile_attribute_data] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_attribute_data_attribute_id] ON [dbo].[profile_attribute_data] 
(
                    
    [attribute_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_attribute_data_profile_id_attribute_id] ON [dbo].[profile_attribute_data] 
(
                    
    [profile_id] ASC
                    
    , [attribute_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_attribute_data_profile_id_attribute_id_sort] ON [dbo].[profile_attribute_data] 
(
                    
    [sort] ASC
                    
    , [profile_id] ASC
                    
    , [attribute_id] ASC
)
GO
        
        
        
        
        

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Profile - profile
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_count]

GO

CREATE PROCEDURE usp_profile_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_count_by_username_by_hash]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_count_by_username_by_hash]

GO

CREATE PROCEDURE usp_profile_count_by_username_by_hash
(
    @username varchar (255) = NULL
    , @hash varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([hash]) = LOWER(@hash)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_count_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_count_by_username]

GO

CREATE PROCEDURE usp_profile_count_by_username
(
    @username varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Profile - profile
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [username]'
    SET @sql = @sql + ', [first_name]'
    SET @sql = @sql + ', [last_name]'
    SET @sql = @sql + ', [hash]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [email]'
    SET @sql = @sql + ', [name]'

    SET @sql = @sql + ' FROM [dbo].[profile] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Profile - profile
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @username varchar (255) = NULL
    , @first_name varchar (255) = NULL
    , @last_name varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @email varchar (255) = NULL
    , @name varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [first_name] = @first_name
                    , [last_name] = @last_name
                    , [hash] = @hash
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [email] = @email
                    , [name] = @name
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile]
                (
                    [status]
                    , [username]
                    , [first_name]
                    , [last_name]
                    , [hash]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [email]
                    , [name]
                )
                VALUES
                (
                    @status
                    , @username
                    , @first_name
                    , @last_name
                    , @hash
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @email
                    , @name
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_set_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_set_by_username]

GO

CREATE PROCEDURE usp_profile_set_by_username
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @username varchar (255) = NULL
    , @first_name varchar (255) = NULL
    , @last_name varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @email varchar (255) = NULL
    , @name varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile]  
                WHERE 1=1
                AND LOWER([username]) = LOWER(@username)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [first_name] = @first_name
                    , [last_name] = @last_name
                    , [hash] = @hash
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [email] = @email
                    , [name] = @name
                WHERE 1=1
                AND LOWER([username]) = LOWER(@username)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile]
                (
                    [status]
                    , [username]
                    , [first_name]
                    , [last_name]
                    , [hash]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [email]
                    , [name]
                )
                VALUES
                (
                    @status
                    , @username
                    , @first_name
                    , @last_name
                    , @hash
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @email
                    , @name
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Profile - profile
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_del_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_del_by_username]

GO

CREATE PROCEDURE usp_profile_del_by_username
(
    @username varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile]
    WHERE 1=1                        
    AND LOWER([username]) = LOWER(@username)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Profile - profile
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [first_name]
        , [last_name]
        , [hash]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [email]
        , [name]
    FROM [dbo].[profile]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_get_by_username_by_hash]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_get_by_username_by_hash]

GO

CREATE PROCEDURE usp_profile_get_by_username_by_hash
(
    @username varchar (255) = NULL
    , @hash varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [first_name]
        , [last_name]
        , [hash]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [email]
        , [name]
    FROM [dbo].[profile]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([hash]) = LOWER(@hash)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_get_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_get_by_username]

GO

CREATE PROCEDURE usp_profile_get_by_username
(
    @username varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [first_name]
        , [last_name]
        , [hash]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [email]
        , [name]
    FROM [dbo].[profile]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileType - profile_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_count]

GO

CREATE PROCEDURE usp_profile_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_type_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_count_by_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_count_by_type_id]

GO

CREATE PROCEDURE usp_profile_type_count_by_type_id
(
    @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_type]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileType - profile_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_type_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [type_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[profile_type] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileType - profile_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_type_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @type_id
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileType - profile_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_type_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileType - profile_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_type_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[profile_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_get_by_code]

GO

CREATE PROCEDURE usp_profile_type_get_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[profile_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_type_get_by_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_type_get_by_type_id]

GO

CREATE PROCEDURE usp_profile_type_get_by_type_id
(
    @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[profile_type]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_count]

GO

CREATE PROCEDURE usp_profile_attribute_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_count_by_code]

GO

CREATE PROCEDURE usp_profile_attribute_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_count_by_type]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_count_by_type]

GO

CREATE PROCEDURE usp_profile_attribute_count_by_type
(
    @type int = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND [type] = @type
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_count_by_group]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_count_by_group]

GO

CREATE PROCEDURE usp_profile_attribute_count_by_group
(
    @group int = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND [group] = @group
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_count_by_code_by_type]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_count_by_code_by_type]

GO

CREATE PROCEDURE usp_profile_attribute_count_by_code_by_type
(
    @code varchar (255) = NULL
    , @type int = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
    AND [type] = @type
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_attribute_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [sort]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [group]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [order]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[profile_attribute] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @group int = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [group] = @group
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [group]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @group
                    , @active
                    , @date_created
                    , @type
                    , @order
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_set_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_set_by_code]

GO

CREATE PROCEDURE usp_profile_attribute_set_by_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @group int = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [group] = @group
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                    , [description] = @description
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [group]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @group
                    , @active
                    , @date_created
                    , @type
                    , @order
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_del_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_del_by_code]

GO

CREATE PROCEDURE usp_profile_attribute_del_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttribute - profile_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [group]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_get_by_code]

GO

CREATE PROCEDURE usp_profile_attribute_get_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [group]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_get_by_type]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_get_by_type]

GO

CREATE PROCEDURE usp_profile_attribute_get_by_type
(
    @type int = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [group]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND [type] = @type
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_get_by_group]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_get_by_group]

GO

CREATE PROCEDURE usp_profile_attribute_get_by_group
(
    @group int = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [group]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND [group] = @group
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_get_by_code_by_type]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_get_by_code_by_type]

GO

CREATE PROCEDURE usp_profile_attribute_get_by_code_by_type
(
    @code varchar (255) = NULL
    , @type int = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [group]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[profile_attribute]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
    AND [type] = @type
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_count]

GO

CREATE PROCEDURE usp_profile_attribute_text_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_text_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_count_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_count_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_count_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_count_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_count_by_profile_id_by_attribute_id
(
    @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [attribute_id] = @attribute_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_attribute_text_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [sort]'
    SET @sql = @sql + ', [group]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [attribute_id]'
    SET @sql = @sql + ', [attribute_value]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [order]'

    SET @sql = @sql + ' FROM [dbo].[profile_attribute_text] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_text_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @group int = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
    , @attribute_value varchar (1000) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute_text]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute_text] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [group] = @group
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_id] = @profile_id
                    , [attribute_id] = @attribute_id
                    , [attribute_value] = @attribute_value
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute_text]
                (
                    [status]
                    , [sort]
                    , [group]
                    , [uuid]
                    , [date_modified]
                    , [profile_id]
                    , [attribute_id]
                    , [attribute_value]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @group
                    , @uuid
                    , @date_modified
                    , @profile_id
                    , @attribute_id
                    , @attribute_value
                    , @active
                    , @date_created
                    , @type
                    , @order
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_set_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_set_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_set_by_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @group int = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
    , @attribute_value varchar (1000) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute_text]  
                WHERE 1=1
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute_text] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [group] = @group
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_id] = @profile_id
                    , [attribute_id] = @attribute_id
                    , [attribute_value] = @attribute_value
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                WHERE 1=1
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute_text]
                (
                    [status]
                    , [sort]
                    , [group]
                    , [uuid]
                    , [date_modified]
                    , [profile_id]
                    , [attribute_id]
                    , [attribute_value]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @group
                    , @uuid
                    , @date_modified
                    , @profile_id
                    , @attribute_id
                    , @attribute_value
                    , @active
                    , @date_created
                    , @type
                    , @order
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_set_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_set_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_set_by_profile_id_by_attribute_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @group int = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
    , @attribute_value varchar (1000) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute_text]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [attribute_id] = @attribute_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute_text] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [group] = @group
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_id] = @profile_id
                    , [attribute_id] = @attribute_id
                    , [attribute_value] = @attribute_value
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [attribute_id] = @attribute_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute_text]
                (
                    [status]
                    , [sort]
                    , [group]
                    , [uuid]
                    , [date_modified]
                    , [profile_id]
                    , [attribute_id]
                    , [attribute_value]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @group
                    , @uuid
                    , @date_modified
                    , @profile_id
                    , @attribute_id
                    , @attribute_value
                    , @active
                    , @date_created
                    , @type
                    , @order
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_text_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_del_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_del_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_del_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_del_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_del_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_del_by_profile_id_by_attribute_id
(
    @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [attribute_id] = @attribute_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttributeText - profile_attribute_text
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_text_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [group]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [attribute_id]
        , [attribute_value]
        , [active]
        , [date_created]
        , [type]
        , [order]
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_get_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_get_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [group]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [attribute_id]
        , [attribute_value]
        , [active]
        , [date_created]
        , [type]
        , [order]
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_text_get_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_text_get_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_text_get_by_profile_id_by_attribute_id
(
    @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [group]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [attribute_id]
        , [attribute_value]
        , [active]
        , [date_created]
        , [type]
        , [order]
    FROM [dbo].[profile_attribute_text]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [attribute_id] = @attribute_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_count]

GO

CREATE PROCEDURE usp_profile_attribute_data_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_data_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_count_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_count_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_count_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_count_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_count_by_profile_id_by_attribute_id
(
    @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [attribute_id] = @attribute_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_attribute_data_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [sort]'
    SET @sql = @sql + ', [group]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [attribute_id]'
    SET @sql = @sql + ', [attribute_value]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [order]'

    SET @sql = @sql + ' FROM [dbo].[profile_attribute_data] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_data_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @group int = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
    , @attribute_value ntext = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute_data]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute_data] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [group] = @group
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_id] = @profile_id
                    , [attribute_id] = @attribute_id
                    , [attribute_value] = @attribute_value
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute_data]
                (
                    [status]
                    , [sort]
                    , [group]
                    , [uuid]
                    , [date_modified]
                    , [profile_id]
                    , [attribute_id]
                    , [attribute_value]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @group
                    , @uuid
                    , @date_modified
                    , @profile_id
                    , @attribute_id
                    , @attribute_value
                    , @active
                    , @date_created
                    , @type
                    , @order
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_set_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_set_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_set_by_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @group int = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
    , @attribute_value ntext = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute_data]  
                WHERE 1=1
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute_data] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [group] = @group
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_id] = @profile_id
                    , [attribute_id] = @attribute_id
                    , [attribute_value] = @attribute_value
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                WHERE 1=1
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute_data]
                (
                    [status]
                    , [sort]
                    , [group]
                    , [uuid]
                    , [date_modified]
                    , [profile_id]
                    , [attribute_id]
                    , [attribute_value]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @group
                    , @uuid
                    , @date_modified
                    , @profile_id
                    , @attribute_id
                    , @attribute_value
                    , @active
                    , @date_created
                    , @type
                    , @order
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_set_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_set_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_set_by_profile_id_by_attribute_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @sort int = NULL
    , @group int = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
    , @attribute_value ntext = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type int = NULL
    , @order int = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_attribute_data]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [attribute_id] = @attribute_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_attribute_data] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [group] = @group
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_id] = @profile_id
                    , [attribute_id] = @attribute_id
                    , [attribute_value] = @attribute_value
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [attribute_id] = @attribute_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_attribute_data]
                (
                    [status]
                    , [sort]
                    , [group]
                    , [uuid]
                    , [date_modified]
                    , [profile_id]
                    , [attribute_id]
                    , [attribute_value]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @group
                    , @uuid
                    , @date_modified
                    , @profile_id
                    , @attribute_id
                    , @attribute_value
                    , @active
                    , @date_created
                    , @type
                    , @order
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_data_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_del_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_del_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_del_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_del_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_del_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_del_by_profile_id_by_attribute_id
(
    @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [attribute_id] = @attribute_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileAttributeData - profile_attribute_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_attribute_data_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [group]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [attribute_id]
        , [attribute_value]
        , [active]
        , [date_created]
        , [type]
        , [order]
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_get_by_profile_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_get_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [group]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [attribute_id]
        , [attribute_value]
        , [active]
        , [date_created]
        , [type]
        , [order]
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_attribute_data_get_by_profile_id_by_attribute_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_attribute_data_get_by_profile_id_by_attribute_id]

GO

CREATE PROCEDURE usp_profile_attribute_data_get_by_profile_id_by_attribute_id
(
    @profile_id uniqueidentifier = NULL
    , @attribute_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [group]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [attribute_id]
        , [attribute_value]
        , [active]
        , [date_created]
        , [type]
        , [order]
    FROM [dbo].[profile_attribute_data]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [attribute_id] = @attribute_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_count]

GO

CREATE PROCEDURE usp_profile_device_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_device]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_device_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_count_by_profile_id_by_device_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_count_by_profile_id_by_device_id]

GO

CREATE PROCEDURE usp_profile_device_count_by_profile_id_by_device_id
(
    @profile_id uniqueidentifier 
    , @device_id varchar (128) 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND LOWER([device_id]) = LOWER(@device_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_count_by_profile_id_by_token]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_count_by_profile_id_by_token]

GO

CREATE PROCEDURE usp_profile_device_count_by_profile_id_by_token
(
    @profile_id uniqueidentifier 
    , @token varchar (128) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND LOWER([token]) = LOWER(@token)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_count_by_profile_id]

GO

CREATE PROCEDURE usp_profile_device_count_by_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_count_by_device_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_count_by_device_id]

GO

CREATE PROCEDURE usp_profile_device_count_by_device_id
(
    @device_id varchar (128) 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND LOWER([device_id]) = LOWER(@device_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_count_by_token]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_count_by_token]

GO

CREATE PROCEDURE usp_profile_device_count_by_token
(
    @token varchar (128) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND LOWER([token]) = LOWER(@token)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_device_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [token]'
    SET @sql = @sql + ', [secret]'
    SET @sql = @sql + ', [device_version]'
    SET @sql = @sql + ', [device_type]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [device_os]'
    SET @sql = @sql + ', [device_id]'
    SET @sql = @sql + ', [device_platform]'

    SET @sql = @sql + ' FROM [dbo].[profile_device] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_device_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_id uniqueidentifier 
    , @token varchar (128) = NULL
    , @secret varchar (128) = NULL
    , @device_version varchar (128) = NULL
    , @device_type varchar (128) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @device_os varchar (128) = NULL
    , @device_id varchar (128) 
    , @device_platform varchar (128) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[profile_device]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_device] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_id] = @profile_id
                    , [token] = @token
                    , [secret] = @secret
                    , [device_version] = @device_version
                    , [device_type] = @device_type
                    , [active] = @active
                    , [date_created] = @date_created
                    , [device_os] = @device_os
                    , [device_id] = @device_id
                    , [device_platform] = @device_platform
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_device]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [profile_id]
                    , [token]
                    , [secret]
                    , [device_version]
                    , [device_type]
                    , [active]
                    , [date_created]
                    , [device_os]
                    , [device_id]
                    , [device_platform]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @profile_id
                    , @token
                    , @secret
                    , @device_version
                    , @device_type
                    , @active
                    , @date_created
                    , @device_os
                    , @device_id
                    , @device_platform
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_device_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_device]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_del_by_profile_id_by_device_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_del_by_profile_id_by_device_id]

GO

CREATE PROCEDURE usp_profile_device_del_by_profile_id_by_device_id
(
    @profile_id uniqueidentifier 
    , @device_id varchar (128) 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_device]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND LOWER([device_id]) = LOWER(@device_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_del_by_profile_id_by_token]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_del_by_profile_id_by_token]

GO

CREATE PROCEDURE usp_profile_device_del_by_profile_id_by_token
(
    @profile_id uniqueidentifier 
    , @token varchar (128) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_device]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND LOWER([token]) = LOWER(@token)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_del_by_token]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_del_by_token]

GO

CREATE PROCEDURE usp_profile_device_del_by_token
(
    @token varchar (128) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_device]
    WHERE 1=1                        
    AND LOWER([token]) = LOWER(@token)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileDevice - profile_device
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_device_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [token]
        , [secret]
        , [device_version]
        , [device_type]
        , [active]
        , [date_created]
        , [device_os]
        , [device_id]
        , [device_platform]
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_get_by_profile_id_by_device_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_get_by_profile_id_by_device_id]

GO

CREATE PROCEDURE usp_profile_device_get_by_profile_id_by_device_id
(
    @profile_id uniqueidentifier 
    , @device_id varchar (128) 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [token]
        , [secret]
        , [device_version]
        , [device_type]
        , [active]
        , [date_created]
        , [device_os]
        , [device_id]
        , [device_platform]
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND LOWER([device_id]) = LOWER(@device_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_get_by_profile_id_by_token]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_get_by_profile_id_by_token]

GO

CREATE PROCEDURE usp_profile_device_get_by_profile_id_by_token
(
    @profile_id uniqueidentifier 
    , @token varchar (128) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [token]
        , [secret]
        , [device_version]
        , [device_type]
        , [active]
        , [date_created]
        , [device_os]
        , [device_id]
        , [device_platform]
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND LOWER([token]) = LOWER(@token)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_get_by_profile_id]

GO

CREATE PROCEDURE usp_profile_device_get_by_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [token]
        , [secret]
        , [device_version]
        , [device_type]
        , [active]
        , [date_created]
        , [device_os]
        , [device_id]
        , [device_platform]
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_get_by_device_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_get_by_device_id]

GO

CREATE PROCEDURE usp_profile_device_get_by_device_id
(
    @device_id varchar (128) 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [token]
        , [secret]
        , [device_version]
        , [device_type]
        , [active]
        , [date_created]
        , [device_os]
        , [device_id]
        , [device_platform]
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND LOWER([device_id]) = LOWER(@device_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_device_get_by_token]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_device_get_by_token]

GO

CREATE PROCEDURE usp_profile_device_get_by_token
(
    @token varchar (128) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [profile_id]
        , [token]
        , [secret]
        , [device_version]
        , [device_type]
        , [active]
        , [date_created]
        , [device_os]
        , [device_id]
        , [device_platform]
    FROM [dbo].[profile_device]
    WHERE 1=1
    AND LOWER([token]) = LOWER(@token)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Country - country
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_count]

GO

CREATE PROCEDURE usp_country_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[country]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_count_by_uuid]

GO

CREATE PROCEDURE usp_country_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[country]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_count_by_code]

GO

CREATE PROCEDURE usp_country_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[country]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Country - country
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_browse_by_filter]

GO

CREATE PROCEDURE usp_country_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[country] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: Country - country
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_set_by_uuid]

GO

CREATE PROCEDURE usp_country_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[country]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[country] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[country]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_set_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_set_by_code]

GO

CREATE PROCEDURE usp_country_set_by_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[country]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[country] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[country]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: Country - country
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_del_by_uuid]

GO

CREATE PROCEDURE usp_country_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[country]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_del_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_del_by_code]

GO

CREATE PROCEDURE usp_country_del_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[country]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Country - country
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_get]

GO

CREATE PROCEDURE usp_country_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[country]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_get_by_uuid]

GO

CREATE PROCEDURE usp_country_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[country]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_country_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_country_get_by_code]

GO

CREATE PROCEDURE usp_country_get_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[country]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: State - state
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_count]

GO

CREATE PROCEDURE usp_state_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[state]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_count_by_uuid]

GO

CREATE PROCEDURE usp_state_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[state]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_count_by_code]

GO

CREATE PROCEDURE usp_state_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[state]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: State - state
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_browse_by_filter]

GO

CREATE PROCEDURE usp_state_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[state] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: State - state
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_set_by_uuid]

GO

CREATE PROCEDURE usp_state_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[state]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[state] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[state]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_set_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_set_by_code]

GO

CREATE PROCEDURE usp_state_set_by_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[state]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[state] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[state]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: State - state
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_del_by_uuid]

GO

CREATE PROCEDURE usp_state_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[state]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_del_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_del_by_code]

GO

CREATE PROCEDURE usp_state_del_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[state]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: State - state
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_get]

GO

CREATE PROCEDURE usp_state_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[state]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_get_by_uuid]

GO

CREATE PROCEDURE usp_state_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[state]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_state_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_state_get_by_code]

GO

CREATE PROCEDURE usp_state_get_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[state]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: City - city
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_count]

GO

CREATE PROCEDURE usp_city_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[city]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_count_by_uuid]

GO

CREATE PROCEDURE usp_city_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[city]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_count_by_code]

GO

CREATE PROCEDURE usp_city_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[city]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: City - city
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_browse_by_filter]

GO

CREATE PROCEDURE usp_city_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[city] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: City - city
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_set_by_uuid]

GO

CREATE PROCEDURE usp_city_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[city]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[city] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[city]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_set_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_set_by_code]

GO

CREATE PROCEDURE usp_city_set_by_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[city]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[city] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[city]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: City - city
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_del_by_uuid]

GO

CREATE PROCEDURE usp_city_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[city]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_del_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_del_by_code]

GO

CREATE PROCEDURE usp_city_del_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[city]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: City - city
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_get]

GO

CREATE PROCEDURE usp_city_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[city]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_get_by_uuid]

GO

CREATE PROCEDURE usp_city_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[city]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_city_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_city_get_by_code]

GO

CREATE PROCEDURE usp_city_get_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[city]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: PostalCode - postal_code
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_count]

GO

CREATE PROCEDURE usp_postal_code_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[postal_code]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_count_by_uuid]

GO

CREATE PROCEDURE usp_postal_code_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[postal_code]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_count_by_code]

GO

CREATE PROCEDURE usp_postal_code_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[postal_code]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: PostalCode - postal_code
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_browse_by_filter]

GO

CREATE PROCEDURE usp_postal_code_browse_by_filter
(
    @page int = 1,
    @page_size int = 10,
    @sort VARCHAR(500) = 'date_modified ASC',
    @filter nvarchar(4000) = NULL
    
)
AS
BEGIN
    DECLARE @sql NVARCHAR(4000)
    SET NOCOUNT ON	

    IF @page = 0
            SET @page = 1
    IF @page_size = 0
            SET @page_size = 10
    
    SET @sql = 'WITH pagedtable AS'
    SET @sql = @sql + '(
                           SELECT ROW_NUMBER()
                           OVER(
                           ORDER BY '
    SET @sql = @sql + @sort
    SET @sql = @sql + ') AS row_num , COUNT(*) OVER(PARTITION BY 1) as total_rows'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[postal_code] WHERE 1=1 '
    BEGIN
        IF @filter IS NOT NULL AND @filter != ''
        SET @sql = @sql + ' ' + @filter + ' '			
    END
    SET @sql = @sql + ')'    
    
    SET @sql = @sql + ' SELECT * '
    SET @sql = @sql + ' FROM pagedtable '
    SET @sql = @sql + ' WHERE row_num BETWEEN ('
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' - 1) * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' + 1 AND '
    SET @sql = @sql + convert(varchar,@page)
    SET @sql = @sql + ' * '
    SET @sql = @sql + convert(varchar,@page_size)
    SET @sql = @sql + ' ORDER BY '
    SET @sql = @sql + @sort
    
    PRINT @sql
    PRINT @@rowcount
    EXECUTE sp_executesql @sql 
    

END
GO
-- ------------------------------------
-- SET

-- ------------------------------------
-- MODEL: PostalCode - postal_code
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_set_by_uuid]

GO

CREATE PROCEDURE usp_postal_code_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[postal_code]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[postal_code] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[postal_code]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_set_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_set_by_code]

GO

CREATE PROCEDURE usp_postal_code_set_by_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (50) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @description varchar (255) = NULL
)
AS
BEGIN
    BEGIN
        DECLARE @CountItems int
        SET @CountItems = 0
        
        DECLARE @id bit
        
        BEGIN
            IF @set_type != 'full' AND @set_type != 'insertonly' AND @set_type != 'updateonly'
                SET @set_type = 'full'
        END

	-- IF TYPE IS FULL SET (COUNT CHECK, UPDATE, INSERT)
	-- GET COUNT TO CHECK
	BEGIN
	    IF @set_type = 'full'
	    BEGIN
		-- CHECK COUNT
                SELECT @CountItems =  COUNT(*)
                FROM  [dbo].[postal_code]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[postal_code] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [description] = @description
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[postal_code]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @uuid
                    , @active
                    , @date_created
                    , @description
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- ------------------------------------
-- DEL

-- ------------------------------------
-- MODEL: PostalCode - postal_code
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_del_by_uuid]

GO

CREATE PROCEDURE usp_postal_code_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[postal_code]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_del_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_del_by_code]

GO

CREATE PROCEDURE usp_postal_code_del_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[postal_code]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: PostalCode - postal_code
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_get]

GO

CREATE PROCEDURE usp_postal_code_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[postal_code]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_get_by_uuid]

GO

CREATE PROCEDURE usp_postal_code_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[postal_code]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_postal_code_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_postal_code_get_by_code]

GO

CREATE PROCEDURE usp_postal_code_get_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [uuid]
        , [active]
        , [date_created]
        , [description]
    FROM [dbo].[postal_code]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO

