-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------
-- TABLES

/*
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[app]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[app]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[app_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[app_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[site]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[site]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[site_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[site_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[org]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[org]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[org_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[org_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[content_item]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[content_item]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[content_item_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[content_item_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[content_page]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[content_page]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[message]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[message]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[offer]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[offer]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[offer_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[offer_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[offer_location]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[offer_location]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[offer_category]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[offer_category]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[offer_category_tree]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[offer_category_tree]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[offer_category_assoc]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[offer_category_assoc]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[offer_game_location]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[offer_game_location]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[event_info]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[event_info]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[event_location]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[event_location]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[event_category]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[event_category]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[event_category_tree]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[event_category_tree]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[event_category_assoc]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[event_category_assoc]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[channel]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[channel]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[channel_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[channel_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[question]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[question]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_offer]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_offer]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_app]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_app]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_org]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_org]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_question]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_question]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_channel]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_channel]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[org_site]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[org_site]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[site_app]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[site_app]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[photo]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[photo]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[video]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[video]
GO
*/


CREATE TABLE [dbo].[app] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_app_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [platform] varchar (255)
    , [active] bit
                CONSTRAINT DF_app_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_app_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[app] ADD 
    CONSTRAINT [PK_app] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[app_type] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_app_type_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_app_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_app_type_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[app_type] ADD 
    CONSTRAINT [PK_app_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[site] 
(
    [status] varchar (255)
    , [domain] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_site_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_site_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_site_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[site] ADD 
    CONSTRAINT [PK_site] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[site_type] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_site_type_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_site_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_site_type_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[site_type] ADD 
    CONSTRAINT [PK_site_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[org] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_org_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_org_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_org_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[org] ADD 
    CONSTRAINT [PK_org] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[org_type] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_org_type_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_org_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_org_type_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[org_type] ADD 
    CONSTRAINT [PK_org_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[content_item] 
(
    [status] varchar (255)
    , [type_id] uniqueidentifier
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_content_item_date_modified DEFAULT GETDATE()
    , [data] ntext
    , [date_end] DATETIME
                CONSTRAINT DF_content_item_date_end DEFAULT GETDATE()
    , [date_start] DATETIME
                CONSTRAINT DF_content_item_date_start DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [path] varchar (500)
    , [active] bit
                CONSTRAINT DF_content_item_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_content_item_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[content_item] ADD 
    CONSTRAINT [PK_content_item] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[content_item_type] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_content_item_type_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_content_item_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_content_item_type_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[content_item_type] ADD 
    CONSTRAINT [PK_content_item_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[content_page] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_content_page_date_modified DEFAULT GETDATE()
    , [date_end] DATETIME
                CONSTRAINT DF_content_page_date_end DEFAULT GETDATE()
    , [date_start] DATETIME
                CONSTRAINT DF_content_page_date_start DEFAULT GETDATE()
    , [site_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [template] ntext
    , [path] varchar (500)
    , [active] bit
                CONSTRAINT DF_content_page_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_content_page_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[content_page] ADD 
    CONSTRAINT [PK_content_page] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[message] 
(
    [status] varchar (255)
    , [profile_from_name] varchar (500)
    , [read] bit
                CONSTRAINT DF_message_read_bool DEFAULT 1
    , [profile_from_id] uniqueidentifier
    , [profile_to_token] varchar (500)
    , [app_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_message_active_bool DEFAULT 1
    , [subject] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_message_date_modified DEFAULT GETDATE()
    , [profile_to_id] uniqueidentifier
    , [date_created] DATETIME
                CONSTRAINT DF_message_date_created DEFAULT GETDATE()
    , [profile_to_name] varchar (500)
    , [type] varchar (500)
    , [sent] bit
                CONSTRAINT DF_message_sent_bool DEFAULT 1
)
GO
ALTER TABLE [dbo].[message] ADD 
    CONSTRAINT [PK_message] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[offer] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_offer_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [type_id] uniqueidentifier NOT NULL
    , [org_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [usage_count] int
    , [active] bit
                CONSTRAINT DF_offer_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_offer_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[offer] ADD 
    CONSTRAINT [PK_offer] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[offer_type] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_offer_type_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_offer_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_offer_type_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[offer_type] ADD 
    CONSTRAINT [PK_offer_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[offer_location] 
(
    [status] varchar (255)
    , [fax] varchar (30)
    , [code] varchar (255)
    , [description] varchar (255)
    , [address1] varchar (1000)
    , [twitter] varchar (50)
    , [phone] varchar (30)
    , [postal_code] varchar (30)
    , [offer_id] uniqueidentifier
    , [country_code] varchar (255)
    , [date_created] DATETIME
                CONSTRAINT DF_offer_location_date_created DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_offer_location_active_bool DEFAULT 1
    , [uuid] uniqueidentifier NOT NULL
    , [state_province] varchar (255)
    , [city] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_offer_location_date_modified DEFAULT GETDATE()
    , [dob] DATETIME
                CONSTRAINT DF_offer_location_dob DEFAULT GETDATE()
    , [date_start] DATETIME
                CONSTRAINT DF_offer_location_date_start DEFAULT GETDATE()
    , [longitude] double
    , [email] varchar (255)
    , [date_end] DATETIME
                CONSTRAINT DF_offer_location_date_end DEFAULT GETDATE()
    , [latitude] double
    , [facebook] varchar (255)
    , [type] varchar (500)
    , [address2] varchar (500)
)
GO
ALTER TABLE [dbo].[offer_location] ADD 
    CONSTRAINT [PK_offer_location] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[offer_category] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_offer_category_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier NOT NULL
    , [org_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_offer_category_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_offer_category_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[offer_category] ADD 
    CONSTRAINT [PK_offer_category] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[offer_category_tree] 
(
    [status] varchar (255)
    , [parent_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_offer_category_tree_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_offer_category_tree_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_offer_category_tree_date_created DEFAULT GETDATE()
    , [category_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[offer_category_tree] ADD 
    CONSTRAINT [PK_offer_category_tree] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[offer_category_assoc] 
(
    [status] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_offer_category_assoc_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_offer_category_assoc_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_offer_category_assoc_date_created DEFAULT GETDATE()
    , [offer_id] uniqueidentifier NOT NULL
    , [category_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[offer_category_assoc] ADD 
    CONSTRAINT [PK_offer_category_assoc] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[offer_game_location] 
(
    [status] varchar (255)
    , [game_location_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_offer_game_location_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_offer_game_location_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_offer_game_location_date_created DEFAULT GETDATE()
    , [offer_id] uniqueidentifier
    , [type_id] uniqueidentifier
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[offer_game_location] ADD 
    CONSTRAINT [PK_offer_game_location] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[event_info] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_event_info_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [org_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [usage_count] int
    , [active] bit
                CONSTRAINT DF_event_info_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_event_info_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[event_info] ADD 
    CONSTRAINT [PK_event_info] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[event_location] 
(
    [status] varchar (255)
    , [fax] varchar (30)
    , [code] varchar (255)
    , [description] varchar (255)
    , [address1] varchar (1000)
    , [twitter] varchar (50)
    , [phone] varchar (30)
    , [postal_code] varchar (30)
    , [country_code] varchar (255)
    , [date_created] DATETIME
                CONSTRAINT DF_event_location_date_created DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_event_location_active_bool DEFAULT 1
    , [uuid] uniqueidentifier NOT NULL
    , [state_province] varchar (255)
    , [city] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_event_location_date_modified DEFAULT GETDATE()
    , [dob] DATETIME
                CONSTRAINT DF_event_location_dob DEFAULT GETDATE()
    , [date_start] DATETIME
                CONSTRAINT DF_event_location_date_start DEFAULT GETDATE()
    , [longitude] double
    , [email] varchar (255)
    , [event_id] uniqueidentifier
    , [date_end] DATETIME
                CONSTRAINT DF_event_location_date_end DEFAULT GETDATE()
    , [latitude] double
    , [facebook] varchar (255)
    , [type] varchar (500)
    , [address2] varchar (500)
)
GO
ALTER TABLE [dbo].[event_location] ADD 
    CONSTRAINT [PK_event_location] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[event_category] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_event_category_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier NOT NULL
    , [org_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_event_category_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_event_category_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[event_category] ADD 
    CONSTRAINT [PK_event_category] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[event_category_tree] 
(
    [status] varchar (255)
    , [parent_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_event_category_tree_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_event_category_tree_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_event_category_tree_date_created DEFAULT GETDATE()
    , [category_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[event_category_tree] ADD 
    CONSTRAINT [PK_event_category_tree] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[event_category_assoc] 
(
    [status] varchar (255)
    , [event_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_event_category_assoc_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_event_category_assoc_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_event_category_assoc_date_created DEFAULT GETDATE()
    , [category_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[event_category_assoc] ADD 
    CONSTRAINT [PK_event_category_assoc] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[channel] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_channel_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier NOT NULL
    , [org_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_channel_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_channel_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[channel] ADD 
    CONSTRAINT [PK_channel] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[channel_type] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_channel_type_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_channel_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_channel_type_date_created DEFAULT GETDATE()
    , [type] varchar (50) NOT NULL
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[channel_type] ADD 
    CONSTRAINT [PK_channel_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[question] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_question_date_modified DEFAULT GETDATE()
    , [org_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [choices] ntext
    , [channel_id] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_question_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_question_date_created DEFAULT GETDATE()
    , [type] varchar (50) NOT NULL
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[question] ADD 
    CONSTRAINT [PK_question] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_offer] 
(
    [status] varchar (255)
    , [redeem_code] varchar (128) NOT NULL
    , [offer_id] uniqueidentifier NOT NULL
    , [profile_id] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_profile_offer_active_bool DEFAULT 1
    , [uuid] uniqueidentifier NOT NULL
    , [redeemed] varchar (50) NOT NULL
    , [url] varchar (50)
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_offer_date_modified DEFAULT GETDATE()
    , [date_created] DATETIME
                CONSTRAINT DF_profile_offer_date_created DEFAULT GETDATE()
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[profile_offer] ADD 
    CONSTRAINT [PK_profile_offer] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_app] 
(
    [status] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_app_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_profile_app_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_app_date_created DEFAULT GETDATE()
    , [profile_id] uniqueidentifier
    , [type] varchar (500)
    , [app_id] uniqueidentifier
)
GO
ALTER TABLE [dbo].[profile_app] ADD 
    CONSTRAINT [PK_profile_app] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_org] 
(
    [status] varchar (255)
    , [type_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_org_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_profile_org_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_org_date_created DEFAULT GETDATE()
    , [profile_id] uniqueidentifier
    , [type] varchar (500)
    , [org_id] uniqueidentifier
)
GO
ALTER TABLE [dbo].[profile_org] ADD 
    CONSTRAINT [PK_profile_org] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_question] 
(
    [status] varchar (255)
    , [profile_id] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_profile_question_active_bool DEFAULT 1
    , [data] ntext NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_question_date_modified DEFAULT GETDATE()
    , [org_id] uniqueidentifier NOT NULL
    , [channel_id] uniqueidentifier NOT NULL
    , [answer] varchar (1000) NOT NULL
    , [date_created] DATETIME
                CONSTRAINT DF_profile_question_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [question_id] uniqueidentifier NOT NULL
)
GO
ALTER TABLE [dbo].[profile_question] ADD 
    CONSTRAINT [PK_profile_question] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_channel] 
(
    [status] varchar (255)
    , [channel_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_channel_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_profile_channel_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_channel_date_created DEFAULT GETDATE()
    , [profile_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[profile_channel] ADD 
    CONSTRAINT [PK_profile_channel] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[org_site] 
(
    [status] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_org_site_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_org_site_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_org_site_date_created DEFAULT GETDATE()
    , [site_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
    , [org_id] uniqueidentifier NOT NULL
)
GO
ALTER TABLE [dbo].[org_site] ADD 
    CONSTRAINT [PK_org_site] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[site_app] 
(
    [status] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_site_app_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_site_app_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_site_app_date_created DEFAULT GETDATE()
    , [site_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
    , [app_id] uniqueidentifier NOT NULL
)
GO
ALTER TABLE [dbo].[site_app] ADD 
    CONSTRAINT [PK_site_app] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[photo] 
(
    [status] varchar (255)
    , [third_party_oembed] varchar (500)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_photo_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [third_party_data] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [third_party_url] varchar (500)
    , [third_party_id] varchar (500)
    , [content_type] varchar (100)
    , [external_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_photo_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_photo_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[photo] ADD 
    CONSTRAINT [PK_photo] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[video] 
(
    [status] varchar (255)
    , [third_party_oembed] varchar (500)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_video_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [third_party_data] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [third_party_url] varchar (500)
    , [third_party_id] varchar (500)
    , [content_type] varchar (100)
    , [external_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_video_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_video_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[video] ADD 
    CONSTRAINT [PK_video] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
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
-- INDEXES

-- INDEX DROPS        
   
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
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[content_page]') AND name = N'IX_content_page_path')
DROP INDEX [IX_content_page_path] ON [dbo].[content_page]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[content_page]') AND name = N'IX_content_page_path_site_id')
DROP INDEX [IX_content_page_path_site_id] ON [dbo].[content_page]
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
-- INDEXES

-- INDEX DROPS        
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_content_page_path] ON [dbo].[content_page] 
(
                    
    [path] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_content_page_path_site_id] ON [dbo].[content_page] 
(
                    
    [path] ASC
                    
    , [site_id] ASC
)
GO
        
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
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_count]

GO

CREATE PROCEDURE usp_app_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_count_uuid]

GO

CREATE PROCEDURE usp_app_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_count_code]

GO

CREATE PROCEDURE usp_app_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_count_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_count_type_id]

GO

CREATE PROCEDURE usp_app_count_type_id
(
    @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_count_code_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_count_code_type_id]

GO

CREATE PROCEDURE usp_app_count_code_type_id
(
    @code varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_count_platform_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_count_platform_type_id]

GO

CREATE PROCEDURE usp_app_count_platform_type_id
(
    @platform varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([platform]) = LOWER(@platform)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_count_platform]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_count_platform]

GO

CREATE PROCEDURE usp_app_count_platform
(
    @platform varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([platform]) = LOWER(@platform)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: App - app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_browse_filter]

GO

CREATE PROCEDURE usp_app_browse_filter
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
    SET @sql = @sql + ', [platform]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[app] WHERE 1=1 '
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
-- MODEL: App - app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_set_uuid]

GO

CREATE PROCEDURE usp_app_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[app]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[app] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[app]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [uuid]
                    , [platform]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @platform
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_set_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_set_code]

GO

CREATE PROCEDURE usp_app_set_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[app]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[app] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[app]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [uuid]
                    , [platform]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @platform
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: App - app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_del_uuid]

GO

CREATE PROCEDURE usp_app_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[app]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_del_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_del_code]

GO

CREATE PROCEDURE usp_app_del_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[app]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: App - app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_get]

GO

CREATE PROCEDURE usp_app_get
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
        , [platform]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_get_uuid]

GO

CREATE PROCEDURE usp_app_get_uuid
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
        , [platform]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_get_code]

GO

CREATE PROCEDURE usp_app_get_code
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
        , [platform]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_get_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_get_type_id]

GO

CREATE PROCEDURE usp_app_get_type_id
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
        , [platform]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[app]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_get_code_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_get_code_type_id]

GO

CREATE PROCEDURE usp_app_get_code_type_id
(
    @code varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
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
        , [platform]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_get_platform_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_get_platform_type_id]

GO

CREATE PROCEDURE usp_app_get_platform_type_id
(
    @platform varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
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
        , [platform]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([platform]) = LOWER(@platform)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_get_platform]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_get_platform]

GO

CREATE PROCEDURE usp_app_get_platform
(
    @platform varchar (255) = NULL
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
        , [platform]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[app]
    WHERE 1=1
    AND LOWER([platform]) = LOWER(@platform)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: AppType - app_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_count]

GO

CREATE PROCEDURE usp_app_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_count_uuid]

GO

CREATE PROCEDURE usp_app_type_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_count_code]

GO

CREATE PROCEDURE usp_app_type_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[app_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: AppType - app_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_browse_filter]

GO

CREATE PROCEDURE usp_app_type_browse_filter
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
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[app_type] WHERE 1=1 '
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
-- MODEL: AppType - app_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_set_uuid]

GO

CREATE PROCEDURE usp_app_type_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[app_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[app_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[app_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_set_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_set_code]

GO

CREATE PROCEDURE usp_app_type_set_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[app_type]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[app_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[app_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
-- MODEL: AppType - app_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_del_uuid]

GO

CREATE PROCEDURE usp_app_type_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[app_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_del_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_del_code]

GO

CREATE PROCEDURE usp_app_type_del_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[app_type]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: AppType - app_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_get]

GO

CREATE PROCEDURE usp_app_type_get
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
        , [type]
        , [description]
    FROM [dbo].[app_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_get_uuid]

GO

CREATE PROCEDURE usp_app_type_get_uuid
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
        , [type]
        , [description]
    FROM [dbo].[app_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_app_type_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_app_type_get_code]

GO

CREATE PROCEDURE usp_app_type_get_code
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
        , [type]
        , [description]
    FROM [dbo].[app_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Site - site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_count]

GO

CREATE PROCEDURE usp_site_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_count_uuid]

GO

CREATE PROCEDURE usp_site_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_count_code]

GO

CREATE PROCEDURE usp_site_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_count_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_count_type_id]

GO

CREATE PROCEDURE usp_site_count_type_id
(
    @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_count_code_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_count_code_type_id]

GO

CREATE PROCEDURE usp_site_count_code_type_id
(
    @code varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_count_domain_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_count_domain_type_id]

GO

CREATE PROCEDURE usp_site_count_domain_type_id
(
    @domain varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([domain]) = LOWER(@domain)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_count_domain]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_count_domain]

GO

CREATE PROCEDURE usp_site_count_domain
(
    @domain varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([domain]) = LOWER(@domain)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Site - site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_browse_filter]

GO

CREATE PROCEDURE usp_site_browse_filter
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
    SET @sql = @sql + ', [domain]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [type_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[site] WHERE 1=1 '
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
-- MODEL: Site - site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_set_uuid]

GO

CREATE PROCEDURE usp_site_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @domain varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[site]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[site] 
                SET
                    [status] = @status
                    , [domain] = @domain
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[site]
                (
                    [status]
                    , [domain]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @domain
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @type_id
                    , @uuid
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_set_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_set_code]

GO

CREATE PROCEDURE usp_site_set_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @domain varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[site]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[site] 
                SET
                    [status] = @status
                    , [domain] = @domain
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[site]
                (
                    [status]
                    , [domain]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @domain
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @type_id
                    , @uuid
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: Site - site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_del_uuid]

GO

CREATE PROCEDURE usp_site_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[site]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_del_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_del_code]

GO

CREATE PROCEDURE usp_site_del_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[site]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Site - site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_get]

GO

CREATE PROCEDURE usp_site_get
AS
BEGIN
    SELECT
        [status]
        , [domain]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[site]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_get_uuid]

GO

CREATE PROCEDURE usp_site_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [domain]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[site]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_get_code]

GO

CREATE PROCEDURE usp_site_get_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [domain]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_get_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_get_type_id]

GO

CREATE PROCEDURE usp_site_get_type_id
(
    @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [domain]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[site]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_get_code_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_get_code_type_id]

GO

CREATE PROCEDURE usp_site_get_code_type_id
(
    @code varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [domain]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_get_domain_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_get_domain_type_id]

GO

CREATE PROCEDURE usp_site_get_domain_type_id
(
    @domain varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [domain]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([domain]) = LOWER(@domain)
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_get_domain]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_get_domain]

GO

CREATE PROCEDURE usp_site_get_domain
(
    @domain varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [domain]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[site]
    WHERE 1=1
    AND LOWER([domain]) = LOWER(@domain)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: SiteType - site_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_count]

GO

CREATE PROCEDURE usp_site_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_count_uuid]

GO

CREATE PROCEDURE usp_site_type_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_count_code]

GO

CREATE PROCEDURE usp_site_type_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: SiteType - site_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_browse_filter]

GO

CREATE PROCEDURE usp_site_type_browse_filter
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
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[site_type] WHERE 1=1 '
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
-- MODEL: SiteType - site_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_set_uuid]

GO

CREATE PROCEDURE usp_site_type_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[site_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[site_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[site_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_set_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_set_code]

GO

CREATE PROCEDURE usp_site_type_set_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[site_type]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[site_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[site_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
-- MODEL: SiteType - site_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_del_uuid]

GO

CREATE PROCEDURE usp_site_type_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[site_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_del_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_del_code]

GO

CREATE PROCEDURE usp_site_type_del_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[site_type]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: SiteType - site_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_get]

GO

CREATE PROCEDURE usp_site_type_get
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
        , [type]
        , [description]
    FROM [dbo].[site_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_get_uuid]

GO

CREATE PROCEDURE usp_site_type_get_uuid
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
        , [type]
        , [description]
    FROM [dbo].[site_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_type_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_type_get_code]

GO

CREATE PROCEDURE usp_site_type_get_code
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
        , [type]
        , [description]
    FROM [dbo].[site_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Org - org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_count]

GO

CREATE PROCEDURE usp_org_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_count_uuid]

GO

CREATE PROCEDURE usp_org_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_count_code]

GO

CREATE PROCEDURE usp_org_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_count_name]

GO

CREATE PROCEDURE usp_org_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Org - org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_browse_filter]

GO

CREATE PROCEDURE usp_org_browse_filter
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
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[org] WHERE 1=1 '
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
-- MODEL: Org - org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_set_uuid]

GO

CREATE PROCEDURE usp_org_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[org]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[org] 
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
                    , [type] = @type
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
                INSERT INTO [dbo].[org]
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
                    , [type]
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
                    , @type
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
-- MODEL: Org - org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_del_uuid]

GO

CREATE PROCEDURE usp_org_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[org]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Org - org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_get]

GO

CREATE PROCEDURE usp_org_get
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
        , [type]
        , [description]
    FROM [dbo].[org]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_get_uuid]

GO

CREATE PROCEDURE usp_org_get_uuid
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
        , [type]
        , [description]
    FROM [dbo].[org]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_get_code]

GO

CREATE PROCEDURE usp_org_get_code
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
        , [type]
        , [description]
    FROM [dbo].[org]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_get_name]

GO

CREATE PROCEDURE usp_org_get_name
(
    @name varchar (255) = NULL
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
        , [type]
        , [description]
    FROM [dbo].[org]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OrgType - org_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_count]

GO

CREATE PROCEDURE usp_org_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_count_uuid]

GO

CREATE PROCEDURE usp_org_type_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_count_code]

GO

CREATE PROCEDURE usp_org_type_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OrgType - org_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_browse_filter]

GO

CREATE PROCEDURE usp_org_type_browse_filter
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
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[org_type] WHERE 1=1 '
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
-- MODEL: OrgType - org_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_set_uuid]

GO

CREATE PROCEDURE usp_org_type_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[org_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[org_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[org_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_set_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_set_code]

GO

CREATE PROCEDURE usp_org_type_set_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[org_type]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[org_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[org_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
-- MODEL: OrgType - org_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_del_uuid]

GO

CREATE PROCEDURE usp_org_type_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[org_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_del_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_del_code]

GO

CREATE PROCEDURE usp_org_type_del_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[org_type]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OrgType - org_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_get]

GO

CREATE PROCEDURE usp_org_type_get
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
        , [type]
        , [description]
    FROM [dbo].[org_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_get_uuid]

GO

CREATE PROCEDURE usp_org_type_get_uuid
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
        , [type]
        , [description]
    FROM [dbo].[org_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_type_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_type_get_code]

GO

CREATE PROCEDURE usp_org_type_get_code
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
        , [type]
        , [description]
    FROM [dbo].[org_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ContentItem - content_item
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_count]

GO

CREATE PROCEDURE usp_content_item_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_count_uuid]

GO

CREATE PROCEDURE usp_content_item_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_count_code]

GO

CREATE PROCEDURE usp_content_item_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_count_name]

GO

CREATE PROCEDURE usp_content_item_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_count_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_count_path]

GO

CREATE PROCEDURE usp_content_item_count_path
(
    @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item]
    WHERE 1=1
    AND LOWER([path]) = LOWER(@path)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentItem - content_item
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_browse_filter]

GO

CREATE PROCEDURE usp_content_item_browse_filter
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
    SET @sql = @sql + ', [type_id]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [date_end]'
    SET @sql = @sql + ', [date_start]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [path]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[content_item] WHERE 1=1 '
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
-- MODEL: ContentItem - content_item
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_set_uuid]

GO

CREATE PROCEDURE usp_content_item_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @date_end DATETIME = GETDATE
    , @date_start DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @path varchar (500) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[content_item]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[content_item] 
                SET
                    [status] = @status
                    , [type_id] = @type_id
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [date_end] = @date_end
                    , [date_start] = @date_start
                    , [uuid] = @uuid
                    , [path] = @path
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[content_item]
                (
                    [status]
                    , [type_id]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [date_end]
                    , [date_start]
                    , [uuid]
                    , [path]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @type_id
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @data
                    , @date_end
                    , @date_start
                    , @uuid
                    , @path
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: ContentItem - content_item
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_del_uuid]

GO

CREATE PROCEDURE usp_content_item_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[content_item]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_del_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_del_path]

GO

CREATE PROCEDURE usp_content_item_del_path
(
    @path varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[content_item]
    WHERE 1=1                        
    AND LOWER([path]) = LOWER(@path)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentItem - content_item
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_get]

GO

CREATE PROCEDURE usp_content_item_get
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [date_end]
        , [date_start]
        , [uuid]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_item]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_get_uuid]

GO

CREATE PROCEDURE usp_content_item_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [date_end]
        , [date_start]
        , [uuid]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_item]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_get_code]

GO

CREATE PROCEDURE usp_content_item_get_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [date_end]
        , [date_start]
        , [uuid]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_item]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_get_name]

GO

CREATE PROCEDURE usp_content_item_get_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [date_end]
        , [date_start]
        , [uuid]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_item]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_get_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_get_path]

GO

CREATE PROCEDURE usp_content_item_get_path
(
    @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [date_end]
        , [date_start]
        , [uuid]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_item]
    WHERE 1=1
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_count]

GO

CREATE PROCEDURE usp_content_item_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_count_uuid]

GO

CREATE PROCEDURE usp_content_item_type_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_count_code]

GO

CREATE PROCEDURE usp_content_item_type_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_item_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_browse_filter]

GO

CREATE PROCEDURE usp_content_item_type_browse_filter
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
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[content_item_type] WHERE 1=1 '
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
-- MODEL: ContentItemType - content_item_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_set_uuid]

GO

CREATE PROCEDURE usp_content_item_type_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[content_item_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[content_item_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[content_item_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_set_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_set_code]

GO

CREATE PROCEDURE usp_content_item_type_set_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[content_item_type]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[content_item_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[content_item_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
-- MODEL: ContentItemType - content_item_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_del_uuid]

GO

CREATE PROCEDURE usp_content_item_type_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[content_item_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_del_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_del_code]

GO

CREATE PROCEDURE usp_content_item_type_del_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[content_item_type]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentItemType - content_item_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_get]

GO

CREATE PROCEDURE usp_content_item_type_get
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
        , [type]
        , [description]
    FROM [dbo].[content_item_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_get_uuid]

GO

CREATE PROCEDURE usp_content_item_type_get_uuid
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
        , [type]
        , [description]
    FROM [dbo].[content_item_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_item_type_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_item_type_get_code]

GO

CREATE PROCEDURE usp_content_item_type_get_code
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
        , [type]
        , [description]
    FROM [dbo].[content_item_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ContentPage - content_page
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_count]

GO

CREATE PROCEDURE usp_content_page_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_page]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_count_uuid]

GO

CREATE PROCEDURE usp_content_page_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_page]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_count_code]

GO

CREATE PROCEDURE usp_content_page_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_page]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_count_name]

GO

CREATE PROCEDURE usp_content_page_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_page]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_count_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_count_path]

GO

CREATE PROCEDURE usp_content_page_count_path
(
    @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[content_page]
    WHERE 1=1
    AND LOWER([path]) = LOWER(@path)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ContentPage - content_page
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_browse_filter]

GO

CREATE PROCEDURE usp_content_page_browse_filter
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
    SET @sql = @sql + ', [date_end]'
    SET @sql = @sql + ', [date_start]'
    SET @sql = @sql + ', [site_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [template]'
    SET @sql = @sql + ', [path]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[content_page] WHERE 1=1 '
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
-- MODEL: ContentPage - content_page
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_set_uuid]

GO

CREATE PROCEDURE usp_content_page_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_end DATETIME = GETDATE
    , @date_start DATETIME = GETDATE
    , @site_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @template ntext = NULL
    , @path varchar (500) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[content_page]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[content_page] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [date_end] = @date_end
                    , [date_start] = @date_start
                    , [site_id] = @site_id
                    , [uuid] = @uuid
                    , [template] = @template
                    , [path] = @path
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[content_page]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [date_end]
                    , [date_start]
                    , [site_id]
                    , [uuid]
                    , [template]
                    , [path]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @date_end
                    , @date_start
                    , @site_id
                    , @uuid
                    , @template
                    , @path
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: ContentPage - content_page
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_del_uuid]

GO

CREATE PROCEDURE usp_content_page_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[content_page]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_del_path_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_del_path_site_id]

GO

CREATE PROCEDURE usp_content_page_del_path_site_id
(
    @path varchar (500) = NULL
    , @site_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[content_page]
    WHERE 1=1                        
    AND LOWER([path]) = LOWER(@path)
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_del_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_del_path]

GO

CREATE PROCEDURE usp_content_page_del_path
(
    @path varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[content_page]
    WHERE 1=1                        
    AND LOWER([path]) = LOWER(@path)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ContentPage - content_page
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_get]

GO

CREATE PROCEDURE usp_content_page_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [date_end]
        , [date_start]
        , [site_id]
        , [uuid]
        , [template]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_page]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_get_uuid]

GO

CREATE PROCEDURE usp_content_page_get_uuid
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
        , [date_end]
        , [date_start]
        , [site_id]
        , [uuid]
        , [template]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_page]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_get_code]

GO

CREATE PROCEDURE usp_content_page_get_code
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
        , [date_end]
        , [date_start]
        , [site_id]
        , [uuid]
        , [template]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_page]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_get_name]

GO

CREATE PROCEDURE usp_content_page_get_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [date_end]
        , [date_start]
        , [site_id]
        , [uuid]
        , [template]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_page]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_get_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_get_path]

GO

CREATE PROCEDURE usp_content_page_get_path
(
    @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [date_end]
        , [date_start]
        , [site_id]
        , [uuid]
        , [template]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_page]
    WHERE 1=1
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_get_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_get_site_id]

GO

CREATE PROCEDURE usp_content_page_get_site_id
(
    @site_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [date_end]
        , [date_start]
        , [site_id]
        , [uuid]
        , [template]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_page]
    WHERE 1=1
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_content_page_get_site_id_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_content_page_get_site_id_path]

GO

CREATE PROCEDURE usp_content_page_get_site_id_path
(
    @site_id uniqueidentifier = NULL
    , @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [date_end]
        , [date_start]
        , [site_id]
        , [uuid]
        , [template]
        , [path]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[content_page]
    WHERE 1=1
    AND [site_id] = @site_id
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Message - message
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_message_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_message_count]

GO

CREATE PROCEDURE usp_message_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[message]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_message_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_message_count_uuid]

GO

CREATE PROCEDURE usp_message_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[message]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Message - message
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_message_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_message_browse_filter]

GO

CREATE PROCEDURE usp_message_browse_filter
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
    SET @sql = @sql + ', [profile_from_name]'
    SET @sql = @sql + ', [read]'
    SET @sql = @sql + ', [profile_from_id]'
    SET @sql = @sql + ', [profile_to_token]'
    SET @sql = @sql + ', [app_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [subject]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [profile_to_id]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [profile_to_name]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [sent]'

    SET @sql = @sql + ' FROM [dbo].[message] WHERE 1=1 '
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
-- MODEL: Message - message
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_message_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_message_set_uuid]

GO

CREATE PROCEDURE usp_message_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @profile_from_name varchar (500) = NULL
    , @read bit = 1
    , @profile_from_id uniqueidentifier = NULL
    , @profile_to_token varchar (500) = NULL
    , @app_id uniqueidentifier = NULL
    , @active bit = NULL
    , @subject varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_to_id uniqueidentifier = NULL
    , @date_created DATETIME = GETDATE
    , @profile_to_name varchar (500) = NULL
    , @type varchar (500) = NULL
    , @sent bit = 1
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
                FROM  [dbo].[message]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[message] 
                SET
                    [status] = @status
                    , [profile_from_name] = @profile_from_name
                    , [read] = @read
                    , [profile_from_id] = @profile_from_id
                    , [profile_to_token] = @profile_to_token
                    , [app_id] = @app_id
                    , [active] = @active
                    , [subject] = @subject
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_to_id] = @profile_to_id
                    , [date_created] = @date_created
                    , [profile_to_name] = @profile_to_name
                    , [type] = @type
                    , [sent] = @sent
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[message]
                (
                    [status]
                    , [profile_from_name]
                    , [read]
                    , [profile_from_id]
                    , [profile_to_token]
                    , [app_id]
                    , [active]
                    , [subject]
                    , [uuid]
                    , [date_modified]
                    , [profile_to_id]
                    , [date_created]
                    , [profile_to_name]
                    , [type]
                    , [sent]
                )
                VALUES
                (
                    @status
                    , @profile_from_name
                    , @read
                    , @profile_from_id
                    , @profile_to_token
                    , @app_id
                    , @active
                    , @subject
                    , @uuid
                    , @date_modified
                    , @profile_to_id
                    , @date_created
                    , @profile_to_name
                    , @type
                    , @sent
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
-- MODEL: Message - message
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_message_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_message_del_uuid]

GO

CREATE PROCEDURE usp_message_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[message]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Message - message
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_message_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_message_get]

GO

CREATE PROCEDURE usp_message_get
AS
BEGIN
    SELECT
        [status]
        , [profile_from_name]
        , [read]
        , [profile_from_id]
        , [profile_to_token]
        , [app_id]
        , [active]
        , [subject]
        , [uuid]
        , [date_modified]
        , [profile_to_id]
        , [date_created]
        , [profile_to_name]
        , [type]
        , [sent]
    FROM [dbo].[message]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_message_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_message_get_uuid]

GO

CREATE PROCEDURE usp_message_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_from_name]
        , [read]
        , [profile_from_id]
        , [profile_to_token]
        , [app_id]
        , [active]
        , [subject]
        , [uuid]
        , [date_modified]
        , [profile_to_id]
        , [date_created]
        , [profile_to_name]
        , [type]
        , [sent]
    FROM [dbo].[message]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Offer - offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_count]

GO

CREATE PROCEDURE usp_offer_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_count_uuid]

GO

CREATE PROCEDURE usp_offer_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_count_code]

GO

CREATE PROCEDURE usp_offer_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_count_name]

GO

CREATE PROCEDURE usp_offer_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_count_org_id]

GO

CREATE PROCEDURE usp_offer_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Offer - offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_browse_filter]

GO

CREATE PROCEDURE usp_offer_browse_filter
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
    SET @sql = @sql + ', [url]'
    SET @sql = @sql + ', [type_id]'
    SET @sql = @sql + ', [org_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [usage_count]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[offer] WHERE 1=1 '
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
-- MODEL: Offer - offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_set_uuid]

GO

CREATE PROCEDURE usp_offer_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @type_id uniqueidentifier 
    , @org_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @usage_count int = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[offer]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[offer] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [type_id] = @type_id
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [usage_count] = @usage_count
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[offer]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [type_id]
                    , [org_id]
                    , [uuid]
                    , [usage_count]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @type_id
                    , @org_id
                    , @uuid
                    , @usage_count
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: Offer - offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_del_uuid]

GO

CREATE PROCEDURE usp_offer_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_del_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_del_org_id]

GO

CREATE PROCEDURE usp_offer_del_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer]
    WHERE 1=1                        
    AND [org_id] = @org_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Offer - offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_get]

GO

CREATE PROCEDURE usp_offer_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [type_id]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_get_uuid]

GO

CREATE PROCEDURE usp_offer_get_uuid
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
        , [url]
        , [type_id]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_get_code]

GO

CREATE PROCEDURE usp_offer_get_code
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
        , [url]
        , [type_id]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_get_name]

GO

CREATE PROCEDURE usp_offer_get_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [type_id]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_get_org_id]

GO

CREATE PROCEDURE usp_offer_get_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [type_id]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferType - offer_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_count]

GO

CREATE PROCEDURE usp_offer_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_count_uuid]

GO

CREATE PROCEDURE usp_offer_type_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_count_code]

GO

CREATE PROCEDURE usp_offer_type_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_count_name]

GO

CREATE PROCEDURE usp_offer_type_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_type]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferType - offer_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_browse_filter]

GO

CREATE PROCEDURE usp_offer_type_browse_filter
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
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[offer_type] WHERE 1=1 '
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
-- MODEL: OfferType - offer_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_set_uuid]

GO

CREATE PROCEDURE usp_offer_type_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[offer_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[offer_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[offer_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
-- MODEL: OfferType - offer_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_del_uuid]

GO

CREATE PROCEDURE usp_offer_type_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferType - offer_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_get]

GO

CREATE PROCEDURE usp_offer_type_get
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
        , [type]
        , [description]
    FROM [dbo].[offer_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_get_uuid]

GO

CREATE PROCEDURE usp_offer_type_get_uuid
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
        , [type]
        , [description]
    FROM [dbo].[offer_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_get_code]

GO

CREATE PROCEDURE usp_offer_type_get_code
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
        , [type]
        , [description]
    FROM [dbo].[offer_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_type_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_type_get_name]

GO

CREATE PROCEDURE usp_offer_type_get_name
(
    @name varchar (255) = NULL
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
        , [type]
        , [description]
    FROM [dbo].[offer_type]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferLocation - offer_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_count]

GO

CREATE PROCEDURE usp_offer_location_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_count_uuid]

GO

CREATE PROCEDURE usp_offer_location_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_count_offer_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_count_offer_id]

GO

CREATE PROCEDURE usp_offer_location_count_offer_id
(
    @offer_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND [offer_id] = @offer_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_count_city]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_count_city]

GO

CREATE PROCEDURE usp_offer_location_count_city
(
    @city varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND LOWER([city]) = LOWER(@city)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_count_country_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_count_country_code]

GO

CREATE PROCEDURE usp_offer_location_count_country_code
(
    @country_code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND LOWER([country_code]) = LOWER(@country_code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_count_postal_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_count_postal_code]

GO

CREATE PROCEDURE usp_offer_location_count_postal_code
(
    @postal_code varchar (30) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND LOWER([postal_code]) = LOWER(@postal_code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferLocation - offer_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_browse_filter]

GO

CREATE PROCEDURE usp_offer_location_browse_filter
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
    SET @sql = @sql + ', [fax]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [description]'
    SET @sql = @sql + ', [address1]'
    SET @sql = @sql + ', [twitter]'
    SET @sql = @sql + ', [phone]'
    SET @sql = @sql + ', [postal_code]'
    SET @sql = @sql + ', [offer_id]'
    SET @sql = @sql + ', [country_code]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [state_province]'
    SET @sql = @sql + ', [city]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [dob]'
    SET @sql = @sql + ', [date_start]'
    SET @sql = @sql + ', [longitude]'
    SET @sql = @sql + ', [email]'
    SET @sql = @sql + ', [date_end]'
    SET @sql = @sql + ', [latitude]'
    SET @sql = @sql + ', [facebook]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [address2]'

    SET @sql = @sql + ' FROM [dbo].[offer_location] WHERE 1=1 '
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
-- MODEL: OfferLocation - offer_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_set_uuid]

GO

CREATE PROCEDURE usp_offer_location_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @fax varchar (30) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @address1 varchar (1000) = NULL
    , @twitter varchar (50) = NULL
    , @phone varchar (30) = NULL
    , @postal_code varchar (30) = NULL
    , @offer_id uniqueidentifier = NULL
    , @country_code varchar (255) = NULL
    , @date_created DATETIME = GETDATE
    , @active bit = NULL
    , @uuid uniqueidentifier 
    , @state_province varchar (255) = NULL
    , @city varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @dob DATETIME = GETDATE
    , @date_start DATETIME = GETDATE
    , @longitude double = NULL
    , @email varchar (255) = NULL
    , @date_end DATETIME = GETDATE
    , @latitude double = NULL
    , @facebook varchar (255) = NULL
    , @type varchar (500) = NULL
    , @address2 varchar (500) = NULL
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
                FROM  [dbo].[offer_location]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[offer_location] 
                SET
                    [status] = @status
                    , [fax] = @fax
                    , [code] = @code
                    , [description] = @description
                    , [address1] = @address1
                    , [twitter] = @twitter
                    , [phone] = @phone
                    , [postal_code] = @postal_code
                    , [offer_id] = @offer_id
                    , [country_code] = @country_code
                    , [date_created] = @date_created
                    , [active] = @active
                    , [uuid] = @uuid
                    , [state_province] = @state_province
                    , [city] = @city
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [dob] = @dob
                    , [date_start] = @date_start
                    , [longitude] = @longitude
                    , [email] = @email
                    , [date_end] = @date_end
                    , [latitude] = @latitude
                    , [facebook] = @facebook
                    , [type] = @type
                    , [address2] = @address2
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[offer_location]
                (
                    [status]
                    , [fax]
                    , [code]
                    , [description]
                    , [address1]
                    , [twitter]
                    , [phone]
                    , [postal_code]
                    , [offer_id]
                    , [country_code]
                    , [date_created]
                    , [active]
                    , [uuid]
                    , [state_province]
                    , [city]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [dob]
                    , [date_start]
                    , [longitude]
                    , [email]
                    , [date_end]
                    , [latitude]
                    , [facebook]
                    , [type]
                    , [address2]
                )
                VALUES
                (
                    @status
                    , @fax
                    , @code
                    , @description
                    , @address1
                    , @twitter
                    , @phone
                    , @postal_code
                    , @offer_id
                    , @country_code
                    , @date_created
                    , @active
                    , @uuid
                    , @state_province
                    , @city
                    , @display_name
                    , @name
                    , @date_modified
                    , @dob
                    , @date_start
                    , @longitude
                    , @email
                    , @date_end
                    , @latitude
                    , @facebook
                    , @type
                    , @address2
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
-- MODEL: OfferLocation - offer_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_del_uuid]

GO

CREATE PROCEDURE usp_offer_location_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_location]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferLocation - offer_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_get]

GO

CREATE PROCEDURE usp_offer_location_get
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [offer_id]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[offer_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_get_uuid]

GO

CREATE PROCEDURE usp_offer_location_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [offer_id]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_get_offer_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_get_offer_id]

GO

CREATE PROCEDURE usp_offer_location_get_offer_id
(
    @offer_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [offer_id]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND [offer_id] = @offer_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_get_city]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_get_city]

GO

CREATE PROCEDURE usp_offer_location_get_city
(
    @city varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [offer_id]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND LOWER([city]) = LOWER(@city)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_get_country_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_get_country_code]

GO

CREATE PROCEDURE usp_offer_location_get_country_code
(
    @country_code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [offer_id]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND LOWER([country_code]) = LOWER(@country_code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_location_get_postal_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_location_get_postal_code]

GO

CREATE PROCEDURE usp_offer_location_get_postal_code
(
    @postal_code varchar (30) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [offer_id]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[offer_location]
    WHERE 1=1
    AND LOWER([postal_code]) = LOWER(@postal_code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferCategory - offer_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_count]

GO

CREATE PROCEDURE usp_offer_category_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_count_uuid]

GO

CREATE PROCEDURE usp_offer_category_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_count_code]

GO

CREATE PROCEDURE usp_offer_category_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_count_name]

GO

CREATE PROCEDURE usp_offer_category_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_count_org_id]

GO

CREATE PROCEDURE usp_offer_category_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_count_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_count_type_id]

GO

CREATE PROCEDURE usp_offer_category_count_type_id
(
    @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_count_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_count_org_id_type_id]

GO

CREATE PROCEDURE usp_offer_category_count_org_id_type_id
(
    @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferCategory - offer_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_browse_filter]

GO

CREATE PROCEDURE usp_offer_category_browse_filter
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
    SET @sql = @sql + ', [org_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[offer_category] WHERE 1=1 '
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
-- MODEL: OfferCategory - offer_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_set_uuid]

GO

CREATE PROCEDURE usp_offer_category_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier 
    , @org_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[offer_category]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[offer_category] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[offer_category]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [org_id]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @org_id
                    , @uuid
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: OfferCategory - offer_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_del_uuid]

GO

CREATE PROCEDURE usp_offer_category_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_del_code_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_del_code_org_id]

GO

CREATE PROCEDURE usp_offer_category_del_code_org_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_del_code_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_del_code_org_id_type_id]

GO

CREATE PROCEDURE usp_offer_category_del_code_org_id_type_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferCategory - offer_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_get]

GO

CREATE PROCEDURE usp_offer_category_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer_category]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_get_uuid]

GO

CREATE PROCEDURE usp_offer_category_get_uuid
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_get_code]

GO

CREATE PROCEDURE usp_offer_category_get_code
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_get_name]

GO

CREATE PROCEDURE usp_offer_category_get_name
(
    @name varchar (255) = NULL
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_get_org_id]

GO

CREATE PROCEDURE usp_offer_category_get_org_id
(
    @org_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_get_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_get_type_id]

GO

CREATE PROCEDURE usp_offer_category_get_type_id
(
    @type_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_get_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_get_org_id_type_id]

GO

CREATE PROCEDURE usp_offer_category_get_org_id_type_id
(
    @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[offer_category]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_count]

GO

CREATE PROCEDURE usp_offer_category_tree_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_count_uuid]

GO

CREATE PROCEDURE usp_offer_category_tree_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_count_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_count_parent_id]

GO

CREATE PROCEDURE usp_offer_category_tree_count_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_count_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_count_category_id]

GO

CREATE PROCEDURE usp_offer_category_tree_count_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_count_parent_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_count_parent_id_category_id]

GO

CREATE PROCEDURE usp_offer_category_tree_count_parent_id_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_browse_filter]

GO

CREATE PROCEDURE usp_offer_category_tree_browse_filter
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
    SET @sql = @sql + ', [parent_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [category_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[offer_category_tree] WHERE 1=1 '
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
-- MODEL: OfferCategoryTree - offer_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_set_uuid]

GO

CREATE PROCEDURE usp_offer_category_tree_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @parent_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @category_id uniqueidentifier 
    , @type varchar (500) = NULL
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
                FROM  [dbo].[offer_category_tree]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[offer_category_tree] 
                SET
                    [status] = @status
                    , [parent_id] = @parent_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [category_id] = @category_id
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[offer_category_tree]
                (
                    [status]
                    , [parent_id]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [category_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @parent_id
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @category_id
                    , @type
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
-- MODEL: OfferCategoryTree - offer_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_del_uuid]

GO

CREATE PROCEDURE usp_offer_category_tree_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category_tree]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_del_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_del_parent_id]

GO

CREATE PROCEDURE usp_offer_category_tree_del_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category_tree]
    WHERE 1=1                        
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_del_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_del_category_id]

GO

CREATE PROCEDURE usp_offer_category_tree_del_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category_tree]
    WHERE 1=1                        
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_del_parent_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_del_parent_id_category_id]

GO

CREATE PROCEDURE usp_offer_category_tree_del_parent_id_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category_tree]
    WHERE 1=1                        
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferCategoryTree - offer_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_get]

GO

CREATE PROCEDURE usp_offer_category_tree_get
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_get_uuid]

GO

CREATE PROCEDURE usp_offer_category_tree_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_get_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_get_parent_id]

GO

CREATE PROCEDURE usp_offer_category_tree_get_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_get_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_get_category_id]

GO

CREATE PROCEDURE usp_offer_category_tree_get_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_tree_get_parent_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_tree_get_parent_id_category_id]

GO

CREATE PROCEDURE usp_offer_category_tree_get_parent_id_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_count]

GO

CREATE PROCEDURE usp_offer_category_assoc_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_count_uuid]

GO

CREATE PROCEDURE usp_offer_category_assoc_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_count_offer_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_count_offer_id]

GO

CREATE PROCEDURE usp_offer_category_assoc_count_offer_id
(
    @offer_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [offer_id] = @offer_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_count_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_count_category_id]

GO

CREATE PROCEDURE usp_offer_category_assoc_count_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_count_offer_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_count_offer_id_category_id]

GO

CREATE PROCEDURE usp_offer_category_assoc_count_offer_id_category_id
(
    @offer_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [offer_id] = @offer_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_browse_filter]

GO

CREATE PROCEDURE usp_offer_category_assoc_browse_filter
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
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [offer_id]'
    SET @sql = @sql + ', [category_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[offer_category_assoc] WHERE 1=1 '
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
-- MODEL: OfferCategoryAssoc - offer_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_set_uuid]

GO

CREATE PROCEDURE usp_offer_category_assoc_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @offer_id uniqueidentifier 
    , @category_id uniqueidentifier 
    , @type varchar (500) = NULL
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
                FROM  [dbo].[offer_category_assoc]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[offer_category_assoc] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [offer_id] = @offer_id
                    , [category_id] = @category_id
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[offer_category_assoc]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [offer_id]
                    , [category_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @offer_id
                    , @category_id
                    , @type
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
-- MODEL: OfferCategoryAssoc - offer_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_del_uuid]

GO

CREATE PROCEDURE usp_offer_category_assoc_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferCategoryAssoc - offer_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_get]

GO

CREATE PROCEDURE usp_offer_category_assoc_get
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_get_uuid]

GO

CREATE PROCEDURE usp_offer_category_assoc_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_get_offer_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_get_offer_id]

GO

CREATE PROCEDURE usp_offer_category_assoc_get_offer_id
(
    @offer_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [offer_id] = @offer_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_get_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_get_category_id]

GO

CREATE PROCEDURE usp_offer_category_assoc_get_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_category_assoc_get_offer_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_category_assoc_get_offer_id_category_id]

GO

CREATE PROCEDURE usp_offer_category_assoc_get_offer_id_category_id
(
    @offer_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [category_id]
        , [type]
    FROM [dbo].[offer_category_assoc]
    WHERE 1=1
    AND [offer_id] = @offer_id
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_count]

GO

CREATE PROCEDURE usp_offer_game_location_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_game_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_count_uuid]

GO

CREATE PROCEDURE usp_offer_game_location_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_count_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_count_game_location_id]

GO

CREATE PROCEDURE usp_offer_game_location_count_game_location_id
(
    @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [game_location_id] = @game_location_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_count_offer_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_count_offer_id]

GO

CREATE PROCEDURE usp_offer_game_location_count_offer_id
(
    @offer_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [offer_id] = @offer_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_count_offer_id_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_count_offer_id_game_location_id]

GO

CREATE PROCEDURE usp_offer_game_location_count_offer_id_game_location_id
(
    @offer_id uniqueidentifier = NULL
    , @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [offer_id] = @offer_id
    AND [game_location_id] = @game_location_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_browse_filter]

GO

CREATE PROCEDURE usp_offer_game_location_browse_filter
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
    SET @sql = @sql + ', [game_location_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [offer_id]'
    SET @sql = @sql + ', [type_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[offer_game_location] WHERE 1=1 '
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
-- MODEL: OfferGameLocation - offer_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_set_uuid]

GO

CREATE PROCEDURE usp_offer_game_location_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @game_location_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @offer_id uniqueidentifier = NULL
    , @type_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
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
                FROM  [dbo].[offer_game_location]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[offer_game_location] 
                SET
                    [status] = @status
                    , [game_location_id] = @game_location_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [offer_id] = @offer_id
                    , [type_id] = @type_id
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[offer_game_location]
                (
                    [status]
                    , [game_location_id]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [offer_id]
                    , [type_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @game_location_id
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @offer_id
                    , @type_id
                    , @type
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
-- MODEL: OfferGameLocation - offer_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_del_uuid]

GO

CREATE PROCEDURE usp_offer_game_location_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[offer_game_location]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OfferGameLocation - offer_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_get]

GO

CREATE PROCEDURE usp_offer_game_location_get
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [type_id]
        , [type]
    FROM [dbo].[offer_game_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_get_uuid]

GO

CREATE PROCEDURE usp_offer_game_location_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [type_id]
        , [type]
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_get_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_get_game_location_id]

GO

CREATE PROCEDURE usp_offer_game_location_get_game_location_id
(
    @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [type_id]
        , [type]
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [game_location_id] = @game_location_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_get_offer_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_get_offer_id]

GO

CREATE PROCEDURE usp_offer_game_location_get_offer_id
(
    @offer_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [type_id]
        , [type]
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [offer_id] = @offer_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_offer_game_location_get_offer_id_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_offer_game_location_get_offer_id_game_location_id]

GO

CREATE PROCEDURE usp_offer_game_location_get_offer_id_game_location_id
(
    @offer_id uniqueidentifier = NULL
    , @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [offer_id]
        , [type_id]
        , [type]
    FROM [dbo].[offer_game_location]
    WHERE 1=1
    AND [offer_id] = @offer_id
    AND [game_location_id] = @game_location_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventInfo - event_info
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_count]

GO

CREATE PROCEDURE usp_event_info_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_info]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_count_uuid]

GO

CREATE PROCEDURE usp_event_info_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_info]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_count_code]

GO

CREATE PROCEDURE usp_event_info_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_info]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_count_name]

GO

CREATE PROCEDURE usp_event_info_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_info]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_count_org_id]

GO

CREATE PROCEDURE usp_event_info_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_info]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventInfo - event_info
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_browse_filter]

GO

CREATE PROCEDURE usp_event_info_browse_filter
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
    SET @sql = @sql + ', [url]'
    SET @sql = @sql + ', [org_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [usage_count]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[event_info] WHERE 1=1 '
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
-- MODEL: EventInfo - event_info
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_set_uuid]

GO

CREATE PROCEDURE usp_event_info_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @org_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @usage_count int = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[event_info]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[event_info] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [usage_count] = @usage_count
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[event_info]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [org_id]
                    , [uuid]
                    , [usage_count]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @org_id
                    , @uuid
                    , @usage_count
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: EventInfo - event_info
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_del_uuid]

GO

CREATE PROCEDURE usp_event_info_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_info]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_del_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_del_org_id]

GO

CREATE PROCEDURE usp_event_info_del_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_info]
    WHERE 1=1                        
    AND [org_id] = @org_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventInfo - event_info
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_get]

GO

CREATE PROCEDURE usp_event_info_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_info]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_get_uuid]

GO

CREATE PROCEDURE usp_event_info_get_uuid
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
        , [url]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_info]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_get_code]

GO

CREATE PROCEDURE usp_event_info_get_code
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
        , [url]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_info]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_get_name]

GO

CREATE PROCEDURE usp_event_info_get_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_info]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_info_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_info_get_org_id]

GO

CREATE PROCEDURE usp_event_info_get_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [org_id]
        , [uuid]
        , [usage_count]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_info]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventLocation - event_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_count]

GO

CREATE PROCEDURE usp_event_location_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_count_uuid]

GO

CREATE PROCEDURE usp_event_location_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_count_event_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_count_event_id]

GO

CREATE PROCEDURE usp_event_location_count_event_id
(
    @event_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_location]
    WHERE 1=1
    AND [event_id] = @event_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_count_city]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_count_city]

GO

CREATE PROCEDURE usp_event_location_count_city
(
    @city varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_location]
    WHERE 1=1
    AND LOWER([city]) = LOWER(@city)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_count_country_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_count_country_code]

GO

CREATE PROCEDURE usp_event_location_count_country_code
(
    @country_code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_location]
    WHERE 1=1
    AND LOWER([country_code]) = LOWER(@country_code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_count_postal_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_count_postal_code]

GO

CREATE PROCEDURE usp_event_location_count_postal_code
(
    @postal_code varchar (30) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_location]
    WHERE 1=1
    AND LOWER([postal_code]) = LOWER(@postal_code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventLocation - event_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_browse_filter]

GO

CREATE PROCEDURE usp_event_location_browse_filter
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
    SET @sql = @sql + ', [fax]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [description]'
    SET @sql = @sql + ', [address1]'
    SET @sql = @sql + ', [twitter]'
    SET @sql = @sql + ', [phone]'
    SET @sql = @sql + ', [postal_code]'
    SET @sql = @sql + ', [country_code]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [state_province]'
    SET @sql = @sql + ', [city]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [dob]'
    SET @sql = @sql + ', [date_start]'
    SET @sql = @sql + ', [longitude]'
    SET @sql = @sql + ', [email]'
    SET @sql = @sql + ', [event_id]'
    SET @sql = @sql + ', [date_end]'
    SET @sql = @sql + ', [latitude]'
    SET @sql = @sql + ', [facebook]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [address2]'

    SET @sql = @sql + ' FROM [dbo].[event_location] WHERE 1=1 '
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
-- MODEL: EventLocation - event_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_set_uuid]

GO

CREATE PROCEDURE usp_event_location_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @fax varchar (30) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @address1 varchar (1000) = NULL
    , @twitter varchar (50) = NULL
    , @phone varchar (30) = NULL
    , @postal_code varchar (30) = NULL
    , @country_code varchar (255) = NULL
    , @date_created DATETIME = GETDATE
    , @active bit = NULL
    , @uuid uniqueidentifier 
    , @state_province varchar (255) = NULL
    , @city varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @dob DATETIME = GETDATE
    , @date_start DATETIME = GETDATE
    , @longitude double = NULL
    , @email varchar (255) = NULL
    , @event_id uniqueidentifier = NULL
    , @date_end DATETIME = GETDATE
    , @latitude double = NULL
    , @facebook varchar (255) = NULL
    , @type varchar (500) = NULL
    , @address2 varchar (500) = NULL
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
                FROM  [dbo].[event_location]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[event_location] 
                SET
                    [status] = @status
                    , [fax] = @fax
                    , [code] = @code
                    , [description] = @description
                    , [address1] = @address1
                    , [twitter] = @twitter
                    , [phone] = @phone
                    , [postal_code] = @postal_code
                    , [country_code] = @country_code
                    , [date_created] = @date_created
                    , [active] = @active
                    , [uuid] = @uuid
                    , [state_province] = @state_province
                    , [city] = @city
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [dob] = @dob
                    , [date_start] = @date_start
                    , [longitude] = @longitude
                    , [email] = @email
                    , [event_id] = @event_id
                    , [date_end] = @date_end
                    , [latitude] = @latitude
                    , [facebook] = @facebook
                    , [type] = @type
                    , [address2] = @address2
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[event_location]
                (
                    [status]
                    , [fax]
                    , [code]
                    , [description]
                    , [address1]
                    , [twitter]
                    , [phone]
                    , [postal_code]
                    , [country_code]
                    , [date_created]
                    , [active]
                    , [uuid]
                    , [state_province]
                    , [city]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [dob]
                    , [date_start]
                    , [longitude]
                    , [email]
                    , [event_id]
                    , [date_end]
                    , [latitude]
                    , [facebook]
                    , [type]
                    , [address2]
                )
                VALUES
                (
                    @status
                    , @fax
                    , @code
                    , @description
                    , @address1
                    , @twitter
                    , @phone
                    , @postal_code
                    , @country_code
                    , @date_created
                    , @active
                    , @uuid
                    , @state_province
                    , @city
                    , @display_name
                    , @name
                    , @date_modified
                    , @dob
                    , @date_start
                    , @longitude
                    , @email
                    , @event_id
                    , @date_end
                    , @latitude
                    , @facebook
                    , @type
                    , @address2
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
-- MODEL: EventLocation - event_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_del_uuid]

GO

CREATE PROCEDURE usp_event_location_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_location]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventLocation - event_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_get]

GO

CREATE PROCEDURE usp_event_location_get
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [event_id]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[event_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_get_uuid]

GO

CREATE PROCEDURE usp_event_location_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [event_id]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[event_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_get_event_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_get_event_id]

GO

CREATE PROCEDURE usp_event_location_get_event_id
(
    @event_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [event_id]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[event_location]
    WHERE 1=1
    AND [event_id] = @event_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_get_city]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_get_city]

GO

CREATE PROCEDURE usp_event_location_get_city
(
    @city varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [event_id]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[event_location]
    WHERE 1=1
    AND LOWER([city]) = LOWER(@city)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_get_country_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_get_country_code]

GO

CREATE PROCEDURE usp_event_location_get_country_code
(
    @country_code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [event_id]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[event_location]
    WHERE 1=1
    AND LOWER([country_code]) = LOWER(@country_code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_location_get_postal_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_location_get_postal_code]

GO

CREATE PROCEDURE usp_event_location_get_postal_code
(
    @postal_code varchar (30) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [fax]
        , [code]
        , [description]
        , [address1]
        , [twitter]
        , [phone]
        , [postal_code]
        , [country_code]
        , [date_created]
        , [active]
        , [uuid]
        , [state_province]
        , [city]
        , [display_name]
        , [name]
        , [date_modified]
        , [dob]
        , [date_start]
        , [longitude]
        , [email]
        , [event_id]
        , [date_end]
        , [latitude]
        , [facebook]
        , [type]
        , [address2]
    FROM [dbo].[event_location]
    WHERE 1=1
    AND LOWER([postal_code]) = LOWER(@postal_code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventCategory - event_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_count]

GO

CREATE PROCEDURE usp_event_category_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_count_uuid]

GO

CREATE PROCEDURE usp_event_category_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_count_code]

GO

CREATE PROCEDURE usp_event_category_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_count_name]

GO

CREATE PROCEDURE usp_event_category_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_count_org_id]

GO

CREATE PROCEDURE usp_event_category_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_count_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_count_type_id]

GO

CREATE PROCEDURE usp_event_category_count_type_id
(
    @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_count_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_count_org_id_type_id]

GO

CREATE PROCEDURE usp_event_category_count_org_id_type_id
(
    @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventCategory - event_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_browse_filter]

GO

CREATE PROCEDURE usp_event_category_browse_filter
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
    SET @sql = @sql + ', [org_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[event_category] WHERE 1=1 '
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
-- MODEL: EventCategory - event_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_set_uuid]

GO

CREATE PROCEDURE usp_event_category_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier 
    , @org_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[event_category]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[event_category] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[event_category]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [org_id]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @org_id
                    , @uuid
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: EventCategory - event_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_del_uuid]

GO

CREATE PROCEDURE usp_event_category_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_del_code_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_del_code_org_id]

GO

CREATE PROCEDURE usp_event_category_del_code_org_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_del_code_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_del_code_org_id_type_id]

GO

CREATE PROCEDURE usp_event_category_del_code_org_id_type_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventCategory - event_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_get]

GO

CREATE PROCEDURE usp_event_category_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_category]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_get_uuid]

GO

CREATE PROCEDURE usp_event_category_get_uuid
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_get_code]

GO

CREATE PROCEDURE usp_event_category_get_code
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_category]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_get_name]

GO

CREATE PROCEDURE usp_event_category_get_name
(
    @name varchar (255) = NULL
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_category]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_get_org_id]

GO

CREATE PROCEDURE usp_event_category_get_org_id
(
    @org_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_get_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_get_type_id]

GO

CREATE PROCEDURE usp_event_category_get_type_id
(
    @type_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_get_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_get_org_id_type_id]

GO

CREATE PROCEDURE usp_event_category_get_org_id_type_id
(
    @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[event_category]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_count]

GO

CREATE PROCEDURE usp_event_category_tree_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_tree]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_count_uuid]

GO

CREATE PROCEDURE usp_event_category_tree_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_count_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_count_parent_id]

GO

CREATE PROCEDURE usp_event_category_tree_count_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_count_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_count_category_id]

GO

CREATE PROCEDURE usp_event_category_tree_count_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_count_parent_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_count_parent_id_category_id]

GO

CREATE PROCEDURE usp_event_category_tree_count_parent_id_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_browse_filter]

GO

CREATE PROCEDURE usp_event_category_tree_browse_filter
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
    SET @sql = @sql + ', [parent_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [category_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[event_category_tree] WHERE 1=1 '
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
-- MODEL: EventCategoryTree - event_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_set_uuid]

GO

CREATE PROCEDURE usp_event_category_tree_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @parent_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @category_id uniqueidentifier 
    , @type varchar (500) = NULL
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
                FROM  [dbo].[event_category_tree]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[event_category_tree] 
                SET
                    [status] = @status
                    , [parent_id] = @parent_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [category_id] = @category_id
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[event_category_tree]
                (
                    [status]
                    , [parent_id]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [category_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @parent_id
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @category_id
                    , @type
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
-- MODEL: EventCategoryTree - event_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_del_uuid]

GO

CREATE PROCEDURE usp_event_category_tree_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category_tree]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_del_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_del_parent_id]

GO

CREATE PROCEDURE usp_event_category_tree_del_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category_tree]
    WHERE 1=1                        
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_del_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_del_category_id]

GO

CREATE PROCEDURE usp_event_category_tree_del_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category_tree]
    WHERE 1=1                        
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_del_parent_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_del_parent_id_category_id]

GO

CREATE PROCEDURE usp_event_category_tree_del_parent_id_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category_tree]
    WHERE 1=1                        
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventCategoryTree - event_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_get]

GO

CREATE PROCEDURE usp_event_category_tree_get
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_tree]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_get_uuid]

GO

CREATE PROCEDURE usp_event_category_tree_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_get_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_get_parent_id]

GO

CREATE PROCEDURE usp_event_category_tree_get_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_get_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_get_category_id]

GO

CREATE PROCEDURE usp_event_category_tree_get_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_tree_get_parent_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_tree_get_parent_id_category_id]

GO

CREATE PROCEDURE usp_event_category_tree_get_parent_id_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [parent_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_count]

GO

CREATE PROCEDURE usp_event_category_assoc_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_count_uuid]

GO

CREATE PROCEDURE usp_event_category_assoc_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_count_event_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_count_event_id]

GO

CREATE PROCEDURE usp_event_category_assoc_count_event_id
(
    @event_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [event_id] = @event_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_count_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_count_category_id]

GO

CREATE PROCEDURE usp_event_category_assoc_count_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_count_event_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_count_event_id_category_id]

GO

CREATE PROCEDURE usp_event_category_assoc_count_event_id_category_id
(
    @event_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [event_id] = @event_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_browse_filter]

GO

CREATE PROCEDURE usp_event_category_assoc_browse_filter
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
    SET @sql = @sql + ', [event_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [category_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[event_category_assoc] WHERE 1=1 '
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
-- MODEL: EventCategoryAssoc - event_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_set_uuid]

GO

CREATE PROCEDURE usp_event_category_assoc_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @event_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @category_id uniqueidentifier 
    , @type varchar (500) = NULL
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
                FROM  [dbo].[event_category_assoc]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[event_category_assoc] 
                SET
                    [status] = @status
                    , [event_id] = @event_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [category_id] = @category_id
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[event_category_assoc]
                (
                    [status]
                    , [event_id]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [category_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @event_id
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @category_id
                    , @type
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
-- MODEL: EventCategoryAssoc - event_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_del_uuid]

GO

CREATE PROCEDURE usp_event_category_assoc_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[event_category_assoc]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: EventCategoryAssoc - event_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_get]

GO

CREATE PROCEDURE usp_event_category_assoc_get
AS
BEGIN
    SELECT
        [status]
        , [event_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_get_uuid]

GO

CREATE PROCEDURE usp_event_category_assoc_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [event_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_get_event_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_get_event_id]

GO

CREATE PROCEDURE usp_event_category_assoc_get_event_id
(
    @event_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [event_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [event_id] = @event_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_get_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_get_category_id]

GO

CREATE PROCEDURE usp_event_category_assoc_get_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [event_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_event_category_assoc_get_event_id_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_event_category_assoc_get_event_id_category_id]

GO

CREATE PROCEDURE usp_event_category_assoc_get_event_id_category_id
(
    @event_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [event_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [category_id]
        , [type]
    FROM [dbo].[event_category_assoc]
    WHERE 1=1
    AND [event_id] = @event_id
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Channel - channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_count]

GO

CREATE PROCEDURE usp_channel_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_count_uuid]

GO

CREATE PROCEDURE usp_channel_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_count_code]

GO

CREATE PROCEDURE usp_channel_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_count_name]

GO

CREATE PROCEDURE usp_channel_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_count_org_id]

GO

CREATE PROCEDURE usp_channel_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_count_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_count_type_id]

GO

CREATE PROCEDURE usp_channel_count_type_id
(
    @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_count_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_count_org_id_type_id]

GO

CREATE PROCEDURE usp_channel_count_org_id_type_id
(
    @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Channel - channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_browse_filter]

GO

CREATE PROCEDURE usp_channel_browse_filter
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
    SET @sql = @sql + ', [org_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[channel] WHERE 1=1 '
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
-- MODEL: Channel - channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_set_uuid]

GO

CREATE PROCEDURE usp_channel_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @type_id uniqueidentifier 
    , @org_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[channel]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[channel] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [type_id] = @type_id
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[channel]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [type_id]
                    , [org_id]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @org_id
                    , @uuid
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: Channel - channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_del_uuid]

GO

CREATE PROCEDURE usp_channel_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[channel]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_del_code_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_del_code_org_id]

GO

CREATE PROCEDURE usp_channel_del_code_org_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[channel]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_del_code_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_del_code_org_id_type_id]

GO

CREATE PROCEDURE usp_channel_del_code_org_id_type_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[channel]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Channel - channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_get]

GO

CREATE PROCEDURE usp_channel_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [type_id]
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[channel]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_get_uuid]

GO

CREATE PROCEDURE usp_channel_get_uuid
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[channel]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_get_code]

GO

CREATE PROCEDURE usp_channel_get_code
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[channel]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_get_name]

GO

CREATE PROCEDURE usp_channel_get_name
(
    @name varchar (255) = NULL
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[channel]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_get_org_id]

GO

CREATE PROCEDURE usp_channel_get_org_id
(
    @org_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[channel]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_get_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_get_type_id]

GO

CREATE PROCEDURE usp_channel_get_type_id
(
    @type_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[channel]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_get_org_id_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_get_org_id_type_id]

GO

CREATE PROCEDURE usp_channel_get_org_id_type_id
(
    @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
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
        , [org_id]
        , [uuid]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[channel]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ChannelType - channel_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_count]

GO

CREATE PROCEDURE usp_channel_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_count_uuid]

GO

CREATE PROCEDURE usp_channel_type_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_count_code]

GO

CREATE PROCEDURE usp_channel_type_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_count_name]

GO

CREATE PROCEDURE usp_channel_type_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[channel_type]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ChannelType - channel_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_browse_filter]

GO

CREATE PROCEDURE usp_channel_type_browse_filter
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
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[channel_type] WHERE 1=1 '
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
-- MODEL: ChannelType - channel_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_set_uuid]

GO

CREATE PROCEDURE usp_channel_type_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (50) 
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
                FROM  [dbo].[channel_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[channel_type] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [uuid] = @uuid
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[channel_type]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [uuid]
                    , [active]
                    , [date_created]
                    , [type]
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
                    , @type
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
-- MODEL: ChannelType - channel_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_del_uuid]

GO

CREATE PROCEDURE usp_channel_type_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[channel_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ChannelType - channel_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_get]

GO

CREATE PROCEDURE usp_channel_type_get
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
        , [type]
        , [description]
    FROM [dbo].[channel_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_get_uuid]

GO

CREATE PROCEDURE usp_channel_type_get_uuid
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
        , [type]
        , [description]
    FROM [dbo].[channel_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_get_code]

GO

CREATE PROCEDURE usp_channel_type_get_code
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
        , [type]
        , [description]
    FROM [dbo].[channel_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_channel_type_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_channel_type_get_name]

GO

CREATE PROCEDURE usp_channel_type_get_name
(
    @name varchar (255) = NULL
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
        , [type]
        , [description]
    FROM [dbo].[channel_type]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Question - question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count]

GO

CREATE PROCEDURE usp_question_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count_uuid]

GO

CREATE PROCEDURE usp_question_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count_code]

GO

CREATE PROCEDURE usp_question_count_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count_name]

GO

CREATE PROCEDURE usp_question_count_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count_channel_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count_channel_id]

GO

CREATE PROCEDURE usp_question_count_channel_id
(
    @channel_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
    AND [channel_id] = @channel_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count_org_id]

GO

CREATE PROCEDURE usp_question_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count_channel_id_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count_channel_id_org_id]

GO

CREATE PROCEDURE usp_question_count_channel_id_org_id
(
    @channel_id uniqueidentifier 
    , @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_count_channel_id_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_count_channel_id_code]

GO

CREATE PROCEDURE usp_question_count_channel_id_code
(
    @channel_id uniqueidentifier 
    , @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Question - question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_browse_filter]

GO

CREATE PROCEDURE usp_question_browse_filter
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
    SET @sql = @sql + ', [org_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [choices]'
    SET @sql = @sql + ', [channel_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[question] WHERE 1=1 '
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
-- MODEL: Question - question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_set_uuid]

GO

CREATE PROCEDURE usp_question_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @choices ntext = NULL
    , @channel_id uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (50) 
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
                FROM  [dbo].[question]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[question] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [choices] = @choices
                    , [channel_id] = @channel_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[question]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [choices]
                    , [channel_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @org_id
                    , @uuid
                    , @choices
                    , @channel_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_set_channel_id_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_set_channel_id_code]

GO

CREATE PROCEDURE usp_question_set_channel_id_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @choices ntext = NULL
    , @channel_id uniqueidentifier 
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (50) 
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
                FROM  [dbo].[question]  
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[question] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [choices] = @choices
                    , [channel_id] = @channel_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND LOWER([code]) = LOWER(@code)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[question]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [choices]
                    , [channel_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @org_id
                    , @uuid
                    , @choices
                    , @channel_id
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: Question - question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_del_uuid]

GO

CREATE PROCEDURE usp_question_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[question]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_del_channel_id_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_del_channel_id_org_id]

GO

CREATE PROCEDURE usp_question_del_channel_id_org_id
(
    @channel_id uniqueidentifier 
    , @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[question]
    WHERE 1=1                        
    AND [channel_id] = @channel_id
    AND [org_id] = @org_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Question - question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get]

GO

CREATE PROCEDURE usp_question_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_uuid]

GO

CREATE PROCEDURE usp_question_get_uuid
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
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_code]

GO

CREATE PROCEDURE usp_question_get_code
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
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_name]

GO

CREATE PROCEDURE usp_question_get_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_type]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_type]

GO

CREATE PROCEDURE usp_question_get_type
(
    @type varchar (50) 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND LOWER([type]) = LOWER(@type)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_channel_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_channel_id]

GO

CREATE PROCEDURE usp_question_get_channel_id
(
    @channel_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND [channel_id] = @channel_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_org_id]

GO

CREATE PROCEDURE usp_question_get_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_channel_id_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_channel_id_org_id]

GO

CREATE PROCEDURE usp_question_get_channel_id_org_id
(
    @channel_id uniqueidentifier 
    , @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_question_get_channel_id_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_question_get_channel_id_code]

GO

CREATE PROCEDURE usp_question_get_channel_id_code
(
    @channel_id uniqueidentifier 
    , @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [org_id]
        , [uuid]
        , [choices]
        , [channel_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_count]

GO

CREATE PROCEDURE usp_profile_offer_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_offer]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_count_uuid]

GO

CREATE PROCEDURE usp_profile_offer_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_offer]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_count_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_count_profile_id]

GO

CREATE PROCEDURE usp_profile_offer_count_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_offer]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_browse_filter]

GO

CREATE PROCEDURE usp_profile_offer_browse_filter
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
    SET @sql = @sql + ', [redeem_code]'
    SET @sql = @sql + ', [offer_id]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [redeemed]'
    SET @sql = @sql + ', [url]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[profile_offer] WHERE 1=1 '
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
-- MODEL: ProfileOffer - profile_offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_set_uuid]

GO

CREATE PROCEDURE usp_profile_offer_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @redeem_code varchar (128) 
    , @offer_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @active bit = NULL
    , @uuid uniqueidentifier 
    , @redeemed varchar (50) 
    , @url varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[profile_offer]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_offer] 
                SET
                    [status] = @status
                    , [redeem_code] = @redeem_code
                    , [offer_id] = @offer_id
                    , [profile_id] = @profile_id
                    , [active] = @active
                    , [uuid] = @uuid
                    , [redeemed] = @redeemed
                    , [url] = @url
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_offer]
                (
                    [status]
                    , [redeem_code]
                    , [offer_id]
                    , [profile_id]
                    , [active]
                    , [uuid]
                    , [redeemed]
                    , [url]
                    , [date_modified]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @redeem_code
                    , @offer_id
                    , @profile_id
                    , @active
                    , @uuid
                    , @redeemed
                    , @url
                    , @date_modified
                    , @date_created
                    , @type
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
-- MODEL: ProfileOffer - profile_offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_del_uuid]

GO

CREATE PROCEDURE usp_profile_offer_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_offer]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_del_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_del_profile_id]

GO

CREATE PROCEDURE usp_profile_offer_del_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_offer]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileOffer - profile_offer
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_get]

GO

CREATE PROCEDURE usp_profile_offer_get
AS
BEGIN
    SELECT
        [status]
        , [redeem_code]
        , [offer_id]
        , [profile_id]
        , [active]
        , [uuid]
        , [redeemed]
        , [url]
        , [date_modified]
        , [date_created]
        , [type]
    FROM [dbo].[profile_offer]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_get_uuid]

GO

CREATE PROCEDURE usp_profile_offer_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [redeem_code]
        , [offer_id]
        , [profile_id]
        , [active]
        , [uuid]
        , [redeemed]
        , [url]
        , [date_modified]
        , [date_created]
        , [type]
    FROM [dbo].[profile_offer]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_offer_get_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_offer_get_profile_id]

GO

CREATE PROCEDURE usp_profile_offer_get_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [redeem_code]
        , [offer_id]
        , [profile_id]
        , [active]
        , [uuid]
        , [redeemed]
        , [url]
        , [date_modified]
        , [date_created]
        , [type]
    FROM [dbo].[profile_offer]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileApp - profile_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_count]

GO

CREATE PROCEDURE usp_profile_app_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_count_uuid]

GO

CREATE PROCEDURE usp_profile_app_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_count_profile_id_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_count_profile_id_app_id]

GO

CREATE PROCEDURE usp_profile_app_count_profile_id_app_id
(
    @profile_id uniqueidentifier = NULL
    , @app_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_app]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [app_id] = @app_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileApp - profile_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_browse_filter]

GO

CREATE PROCEDURE usp_profile_app_browse_filter
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
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [app_id]'

    SET @sql = @sql + ' FROM [dbo].[profile_app] WHERE 1=1 '
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
-- MODEL: ProfileApp - profile_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_set_uuid]

GO

CREATE PROCEDURE usp_profile_app_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[profile_app]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_app] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [profile_id] = @profile_id
                    , [type] = @type
                    , [app_id] = @app_id
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_app]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [profile_id]
                    , [type]
                    , [app_id]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @profile_id
                    , @type
                    , @app_id
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_set_profile_id_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_set_profile_id_app_id]

GO

CREATE PROCEDURE usp_profile_app_set_profile_id_app_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[profile_app]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [app_id] = @app_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_app] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [profile_id] = @profile_id
                    , [type] = @type
                    , [app_id] = @app_id
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [app_id] = @app_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_app]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [profile_id]
                    , [type]
                    , [app_id]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @profile_id
                    , @type
                    , @app_id
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
-- MODEL: ProfileApp - profile_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_del_uuid]

GO

CREATE PROCEDURE usp_profile_app_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_app]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_del_profile_id_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_del_profile_id_app_id]

GO

CREATE PROCEDURE usp_profile_app_del_profile_id_app_id
(
    @profile_id uniqueidentifier = NULL
    , @app_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_app]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [app_id] = @app_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileApp - profile_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_get]

GO

CREATE PROCEDURE usp_profile_app_get
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [app_id]
    FROM [dbo].[profile_app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_get_uuid]

GO

CREATE PROCEDURE usp_profile_app_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [app_id]
    FROM [dbo].[profile_app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_get_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_get_app_id]

GO

CREATE PROCEDURE usp_profile_app_get_app_id
(
    @app_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [app_id]
    FROM [dbo].[profile_app]
    WHERE 1=1
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_get_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_get_profile_id]

GO

CREATE PROCEDURE usp_profile_app_get_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [app_id]
    FROM [dbo].[profile_app]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_app_get_profile_id_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_app_get_profile_id_app_id]

GO

CREATE PROCEDURE usp_profile_app_get_profile_id_app_id
(
    @profile_id uniqueidentifier = NULL
    , @app_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [app_id]
    FROM [dbo].[profile_app]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_count]

GO

CREATE PROCEDURE usp_profile_org_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_org]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_count_uuid]

GO

CREATE PROCEDURE usp_profile_org_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_org]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_count_org_id]

GO

CREATE PROCEDURE usp_profile_org_count_org_id
(
    @org_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_org]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_count_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_count_profile_id]

GO

CREATE PROCEDURE usp_profile_org_count_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_org]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_browse_filter]

GO

CREATE PROCEDURE usp_profile_org_browse_filter
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
    SET @sql = @sql + ', [type_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [org_id]'

    SET @sql = @sql + ' FROM [dbo].[profile_org] WHERE 1=1 '
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
-- MODEL: ProfileOrg - profile_org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_set_uuid]

GO

CREATE PROCEDURE usp_profile_org_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @org_id uniqueidentifier = NULL
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
                FROM  [dbo].[profile_org]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_org] 
                SET
                    [status] = @status
                    , [type_id] = @type_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [profile_id] = @profile_id
                    , [type] = @type
                    , [org_id] = @org_id
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_org]
                (
                    [status]
                    , [type_id]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [profile_id]
                    , [type]
                    , [org_id]
                )
                VALUES
                (
                    @status
                    , @type_id
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @profile_id
                    , @type
                    , @org_id
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
-- MODEL: ProfileOrg - profile_org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_del_uuid]

GO

CREATE PROCEDURE usp_profile_org_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_org]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileOrg - profile_org
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_get]

GO

CREATE PROCEDURE usp_profile_org_get
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [org_id]
    FROM [dbo].[profile_org]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_get_uuid]

GO

CREATE PROCEDURE usp_profile_org_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [org_id]
    FROM [dbo].[profile_org]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_get_org_id]

GO

CREATE PROCEDURE usp_profile_org_get_org_id
(
    @org_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [org_id]
    FROM [dbo].[profile_org]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_org_get_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_org_get_profile_id]

GO

CREATE PROCEDURE usp_profile_org_get_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
        , [org_id]
    FROM [dbo].[profile_org]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count]

GO

CREATE PROCEDURE usp_profile_question_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_uuid]

GO

CREATE PROCEDURE usp_profile_question_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_channel_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_channel_id]

GO

CREATE PROCEDURE usp_profile_question_count_channel_id
(
    @channel_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [channel_id] = @channel_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_org_id]

GO

CREATE PROCEDURE usp_profile_question_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_profile_id]

GO

CREATE PROCEDURE usp_profile_question_count_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_question_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_question_id]

GO

CREATE PROCEDURE usp_profile_question_count_question_id
(
    @question_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [question_id] = @question_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_channel_id_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_channel_id_org_id]

GO

CREATE PROCEDURE usp_profile_question_count_channel_id_org_id
(
    @channel_id uniqueidentifier 
    , @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_channel_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_channel_id_profile_id]

GO

CREATE PROCEDURE usp_profile_question_count_channel_id_profile_id
(
    @channel_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_count_question_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_count_question_id_profile_id]

GO

CREATE PROCEDURE usp_profile_question_count_question_id_profile_id
(
    @question_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [question_id] = @question_id
    AND [profile_id] = @profile_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_browse_filter]

GO

CREATE PROCEDURE usp_profile_question_browse_filter
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
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [org_id]'
    SET @sql = @sql + ', [channel_id]'
    SET @sql = @sql + ', [answer]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [question_id]'

    SET @sql = @sql + ' FROM [dbo].[profile_question] WHERE 1=1 '
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
-- MODEL: ProfileQuestion - profile_question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_set_uuid]

GO

CREATE PROCEDURE usp_profile_question_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @active bit = NULL
    , @data ntext 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier 
    , @channel_id uniqueidentifier 
    , @answer varchar (1000) 
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
    , @question_id uniqueidentifier 
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
                FROM  [dbo].[profile_question]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_question] 
                SET
                    [status] = @status
                    , [profile_id] = @profile_id
                    , [active] = @active
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [channel_id] = @channel_id
                    , [answer] = @answer
                    , [date_created] = @date_created
                    , [type] = @type
                    , [question_id] = @question_id
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_question]
                (
                    [status]
                    , [profile_id]
                    , [active]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [org_id]
                    , [channel_id]
                    , [answer]
                    , [date_created]
                    , [type]
                    , [question_id]
                )
                VALUES
                (
                    @status
                    , @profile_id
                    , @active
                    , @data
                    , @uuid
                    , @date_modified
                    , @org_id
                    , @channel_id
                    , @answer
                    , @date_created
                    , @type
                    , @question_id
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_set_channel_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_set_channel_id_profile_id]

GO

CREATE PROCEDURE usp_profile_question_set_channel_id_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @active bit = NULL
    , @data ntext 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier 
    , @channel_id uniqueidentifier 
    , @answer varchar (1000) 
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
    , @question_id uniqueidentifier 
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
                FROM  [dbo].[profile_question]  
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_question] 
                SET
                    [status] = @status
                    , [profile_id] = @profile_id
                    , [active] = @active
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [channel_id] = @channel_id
                    , [answer] = @answer
                    , [date_created] = @date_created
                    , [type] = @type
                    , [question_id] = @question_id
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_question]
                (
                    [status]
                    , [profile_id]
                    , [active]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [org_id]
                    , [channel_id]
                    , [answer]
                    , [date_created]
                    , [type]
                    , [question_id]
                )
                VALUES
                (
                    @status
                    , @profile_id
                    , @active
                    , @data
                    , @uuid
                    , @date_modified
                    , @org_id
                    , @channel_id
                    , @answer
                    , @date_created
                    , @type
                    , @question_id
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_set_question_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_set_question_id_profile_id]

GO

CREATE PROCEDURE usp_profile_question_set_question_id_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @active bit = NULL
    , @data ntext 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier 
    , @channel_id uniqueidentifier 
    , @answer varchar (1000) 
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
    , @question_id uniqueidentifier 
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
                FROM  [dbo].[profile_question]  
                WHERE 1=1
                AND [question_id] = @question_id
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_question] 
                SET
                    [status] = @status
                    , [profile_id] = @profile_id
                    , [active] = @active
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [channel_id] = @channel_id
                    , [answer] = @answer
                    , [date_created] = @date_created
                    , [type] = @type
                    , [question_id] = @question_id
                WHERE 1=1
                AND [question_id] = @question_id
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_question]
                (
                    [status]
                    , [profile_id]
                    , [active]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [org_id]
                    , [channel_id]
                    , [answer]
                    , [date_created]
                    , [type]
                    , [question_id]
                )
                VALUES
                (
                    @status
                    , @profile_id
                    , @active
                    , @data
                    , @uuid
                    , @date_modified
                    , @org_id
                    , @channel_id
                    , @answer
                    , @date_created
                    , @type
                    , @question_id
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_set_channel_id_question_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_set_channel_id_question_id_profile_id]

GO

CREATE PROCEDURE usp_profile_question_set_channel_id_question_id_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @active bit = NULL
    , @data ntext 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier 
    , @channel_id uniqueidentifier 
    , @answer varchar (1000) 
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
    , @question_id uniqueidentifier 
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
                FROM  [dbo].[profile_question]  
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND [question_id] = @question_id
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_question] 
                SET
                    [status] = @status
                    , [profile_id] = @profile_id
                    , [active] = @active
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [channel_id] = @channel_id
                    , [answer] = @answer
                    , [date_created] = @date_created
                    , [type] = @type
                    , [question_id] = @question_id
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND [question_id] = @question_id
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_question]
                (
                    [status]
                    , [profile_id]
                    , [active]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [org_id]
                    , [channel_id]
                    , [answer]
                    , [date_created]
                    , [type]
                    , [question_id]
                )
                VALUES
                (
                    @status
                    , @profile_id
                    , @active
                    , @data
                    , @uuid
                    , @date_modified
                    , @org_id
                    , @channel_id
                    , @answer
                    , @date_created
                    , @type
                    , @question_id
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
-- MODEL: ProfileQuestion - profile_question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_del_uuid]

GO

CREATE PROCEDURE usp_profile_question_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_question]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_del_channel_id_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_del_channel_id_org_id]

GO

CREATE PROCEDURE usp_profile_question_del_channel_id_org_id
(
    @channel_id uniqueidentifier 
    , @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_question]
    WHERE 1=1                        
    AND [channel_id] = @channel_id
    AND [org_id] = @org_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileQuestion - profile_question
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get]

GO

CREATE PROCEDURE usp_profile_question_get
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_uuid]

GO

CREATE PROCEDURE usp_profile_question_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_channel_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_channel_id]

GO

CREATE PROCEDURE usp_profile_question_get_channel_id
(
    @channel_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [channel_id] = @channel_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_org_id]

GO

CREATE PROCEDURE usp_profile_question_get_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_profile_id]

GO

CREATE PROCEDURE usp_profile_question_get_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_question_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_question_id]

GO

CREATE PROCEDURE usp_profile_question_get_question_id
(
    @question_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [question_id] = @question_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_channel_id_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_channel_id_org_id]

GO

CREATE PROCEDURE usp_profile_question_get_channel_id_org_id
(
    @channel_id uniqueidentifier 
    , @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_channel_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_channel_id_profile_id]

GO

CREATE PROCEDURE usp_profile_question_get_channel_id_profile_id
(
    @channel_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_question_get_question_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_question_get_question_id_profile_id]

GO

CREATE PROCEDURE usp_profile_question_get_question_id_profile_id
(
    @question_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [profile_id]
        , [active]
        , [data]
        , [uuid]
        , [date_modified]
        , [org_id]
        , [channel_id]
        , [answer]
        , [date_created]
        , [type]
        , [question_id]
    FROM [dbo].[profile_question]
    WHERE 1=1
    AND [question_id] = @question_id
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_count]

GO

CREATE PROCEDURE usp_profile_channel_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_channel]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_count_uuid]

GO

CREATE PROCEDURE usp_profile_channel_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_count_channel_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_count_channel_id]

GO

CREATE PROCEDURE usp_profile_channel_count_channel_id
(
    @channel_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [channel_id] = @channel_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_count_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_count_profile_id]

GO

CREATE PROCEDURE usp_profile_channel_count_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_count_channel_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_count_channel_id_profile_id]

GO

CREATE PROCEDURE usp_profile_channel_count_channel_id_profile_id
(
    @channel_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [profile_id] = @profile_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_browse_filter]

GO

CREATE PROCEDURE usp_profile_channel_browse_filter
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
    SET @sql = @sql + ', [channel_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[profile_channel] WHERE 1=1 '
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
-- MODEL: ProfileChannel - profile_channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_set_uuid]

GO

CREATE PROCEDURE usp_profile_channel_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @channel_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @profile_id uniqueidentifier 
    , @type varchar (500) = NULL
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
                FROM  [dbo].[profile_channel]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_channel] 
                SET
                    [status] = @status
                    , [channel_id] = @channel_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [profile_id] = @profile_id
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_channel]
                (
                    [status]
                    , [channel_id]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [profile_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @channel_id
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @profile_id
                    , @type
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_set_channel_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_set_channel_id_profile_id]

GO

CREATE PROCEDURE usp_profile_channel_set_channel_id_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @channel_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @profile_id uniqueidentifier 
    , @type varchar (500) = NULL
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
                FROM  [dbo].[profile_channel]  
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_channel] 
                SET
                    [status] = @status
                    , [channel_id] = @channel_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [profile_id] = @profile_id
                    , [type] = @type
                WHERE 1=1
                AND [channel_id] = @channel_id
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_channel]
                (
                    [status]
                    , [channel_id]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [profile_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @channel_id
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @profile_id
                    , @type
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
-- MODEL: ProfileChannel - profile_channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_del_uuid]

GO

CREATE PROCEDURE usp_profile_channel_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_channel]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_del_channel_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_del_channel_id_profile_id]

GO

CREATE PROCEDURE usp_profile_channel_del_channel_id_profile_id
(
    @channel_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_channel]
    WHERE 1=1                        
    AND [channel_id] = @channel_id
    AND [profile_id] = @profile_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileChannel - profile_channel
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_get]

GO

CREATE PROCEDURE usp_profile_channel_get
AS
BEGIN
    SELECT
        [status]
        , [channel_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_channel]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_get_uuid]

GO

CREATE PROCEDURE usp_profile_channel_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [channel_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_get_channel_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_get_channel_id]

GO

CREATE PROCEDURE usp_profile_channel_get_channel_id
(
    @channel_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [channel_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [channel_id] = @channel_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_get_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_get_profile_id]

GO

CREATE PROCEDURE usp_profile_channel_get_profile_id
(
    @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [channel_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_channel_get_channel_id_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_channel_get_channel_id_profile_id]

GO

CREATE PROCEDURE usp_profile_channel_get_channel_id_profile_id
(
    @channel_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [channel_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_channel]
    WHERE 1=1
    AND [channel_id] = @channel_id
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: OrgSite - org_site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_count]

GO

CREATE PROCEDURE usp_org_site_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_site]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_count_uuid]

GO

CREATE PROCEDURE usp_org_site_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_count_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_count_org_id]

GO

CREATE PROCEDURE usp_org_site_count_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_count_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_count_site_id]

GO

CREATE PROCEDURE usp_org_site_count_site_id
(
    @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_count_org_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_count_org_id_site_id]

GO

CREATE PROCEDURE usp_org_site_count_org_id_site_id
(
    @org_id uniqueidentifier 
    , @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [site_id] = @site_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: OrgSite - org_site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_browse_filter]

GO

CREATE PROCEDURE usp_org_site_browse_filter
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
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [site_id]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [org_id]'

    SET @sql = @sql + ' FROM [dbo].[org_site] WHERE 1=1 '
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
-- MODEL: OrgSite - org_site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_set_uuid]

GO

CREATE PROCEDURE usp_org_site_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @site_id uniqueidentifier 
    , @type varchar (500) = NULL
    , @org_id uniqueidentifier 
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
                FROM  [dbo].[org_site]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[org_site] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [site_id] = @site_id
                    , [type] = @type
                    , [org_id] = @org_id
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[org_site]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [site_id]
                    , [type]
                    , [org_id]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @site_id
                    , @type
                    , @org_id
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_set_org_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_set_org_id_site_id]

GO

CREATE PROCEDURE usp_org_site_set_org_id_site_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @site_id uniqueidentifier 
    , @type varchar (500) = NULL
    , @org_id uniqueidentifier 
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
                FROM  [dbo].[org_site]  
                WHERE 1=1
                AND [org_id] = @org_id
                AND [site_id] = @site_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[org_site] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [site_id] = @site_id
                    , [type] = @type
                    , [org_id] = @org_id
                WHERE 1=1
                AND [org_id] = @org_id
                AND [site_id] = @site_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[org_site]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [site_id]
                    , [type]
                    , [org_id]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @site_id
                    , @type
                    , @org_id
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
-- MODEL: OrgSite - org_site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_del_uuid]

GO

CREATE PROCEDURE usp_org_site_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[org_site]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_del_org_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_del_org_id_site_id]

GO

CREATE PROCEDURE usp_org_site_del_org_id_site_id
(
    @org_id uniqueidentifier 
    , @site_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[org_site]
    WHERE 1=1                        
    AND [org_id] = @org_id
    AND [site_id] = @site_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: OrgSite - org_site
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_get]

GO

CREATE PROCEDURE usp_org_site_get
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [org_id]
    FROM [dbo].[org_site]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_get_uuid]

GO

CREATE PROCEDURE usp_org_site_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [org_id]
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_get_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_get_org_id]

GO

CREATE PROCEDURE usp_org_site_get_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [org_id]
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_get_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_get_site_id]

GO

CREATE PROCEDURE usp_org_site_get_site_id
(
    @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [org_id]
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_org_site_get_org_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_org_site_get_org_id_site_id]

GO

CREATE PROCEDURE usp_org_site_get_org_id_site_id
(
    @org_id uniqueidentifier 
    , @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [org_id]
    FROM [dbo].[org_site]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: SiteApp - site_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_count]

GO

CREATE PROCEDURE usp_site_app_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_count_uuid]

GO

CREATE PROCEDURE usp_site_app_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_count_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_count_app_id]

GO

CREATE PROCEDURE usp_site_app_count_app_id
(
    @app_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_count_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_count_site_id]

GO

CREATE PROCEDURE usp_site_app_count_site_id
(
    @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_count_app_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_count_app_id_site_id]

GO

CREATE PROCEDURE usp_site_app_count_app_id_site_id
(
    @app_id uniqueidentifier 
    , @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [app_id] = @app_id
    AND [site_id] = @site_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: SiteApp - site_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_browse_filter]

GO

CREATE PROCEDURE usp_site_app_browse_filter
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
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [site_id]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [app_id]'

    SET @sql = @sql + ' FROM [dbo].[site_app] WHERE 1=1 '
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
-- MODEL: SiteApp - site_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_set_uuid]

GO

CREATE PROCEDURE usp_site_app_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @site_id uniqueidentifier 
    , @type varchar (500) = NULL
    , @app_id uniqueidentifier 
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
                FROM  [dbo].[site_app]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[site_app] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [site_id] = @site_id
                    , [type] = @type
                    , [app_id] = @app_id
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[site_app]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [site_id]
                    , [type]
                    , [app_id]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @site_id
                    , @type
                    , @app_id
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_set_app_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_set_app_id_site_id]

GO

CREATE PROCEDURE usp_site_app_set_app_id_site_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @site_id uniqueidentifier 
    , @type varchar (500) = NULL
    , @app_id uniqueidentifier 
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
                FROM  [dbo].[site_app]  
                WHERE 1=1
                AND [app_id] = @app_id
                AND [site_id] = @site_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[site_app] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [site_id] = @site_id
                    , [type] = @type
                    , [app_id] = @app_id
                WHERE 1=1
                AND [app_id] = @app_id
                AND [site_id] = @site_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[site_app]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [site_id]
                    , [type]
                    , [app_id]
                )
                VALUES
                (
                    @status
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @site_id
                    , @type
                    , @app_id
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
-- MODEL: SiteApp - site_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_del_uuid]

GO

CREATE PROCEDURE usp_site_app_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[site_app]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_del_app_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_del_app_id_site_id]

GO

CREATE PROCEDURE usp_site_app_del_app_id_site_id
(
    @app_id uniqueidentifier 
    , @site_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[site_app]
    WHERE 1=1                        
    AND [app_id] = @app_id
    AND [site_id] = @site_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: SiteApp - site_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_get]

GO

CREATE PROCEDURE usp_site_app_get
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [app_id]
    FROM [dbo].[site_app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_get_uuid]

GO

CREATE PROCEDURE usp_site_app_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [app_id]
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_get_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_get_app_id]

GO

CREATE PROCEDURE usp_site_app_get_app_id
(
    @app_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [app_id]
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_get_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_get_site_id]

GO

CREATE PROCEDURE usp_site_app_get_site_id
(
    @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [app_id]
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_site_app_get_app_id_site_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_site_app_get_app_id_site_id]

GO

CREATE PROCEDURE usp_site_app_get_app_id_site_id
(
    @app_id uniqueidentifier 
    , @site_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [site_id]
        , [type]
        , [app_id]
    FROM [dbo].[site_app]
    WHERE 1=1
    AND [app_id] = @app_id
    AND [site_id] = @site_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Photo - photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_count]

GO

CREATE PROCEDURE usp_photo_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[photo]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_count_uuid]

GO

CREATE PROCEDURE usp_photo_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[photo]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_count_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_count_external_id]

GO

CREATE PROCEDURE usp_photo_count_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[photo]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_count_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_count_url]

GO

CREATE PROCEDURE usp_photo_count_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_count_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_count_url_external_id]

GO

CREATE PROCEDURE usp_photo_count_url_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_count_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_count_uuid_external_id]

GO

CREATE PROCEDURE usp_photo_count_uuid_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[photo]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Photo - photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_browse_filter]

GO

CREATE PROCEDURE usp_photo_browse_filter
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
    SET @sql = @sql + ', [third_party_oembed]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [url]'
    SET @sql = @sql + ', [third_party_data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [third_party_url]'
    SET @sql = @sql + ', [third_party_id]'
    SET @sql = @sql + ', [content_type]'
    SET @sql = @sql + ', [external_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[photo] WHERE 1=1 '
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
-- MODEL: Photo - photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_set_uuid]

GO

CREATE PROCEDURE usp_photo_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[photo]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[photo] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[photo]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_set_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_set_external_id]

GO

CREATE PROCEDURE usp_photo_set_external_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[photo]  
                WHERE 1=1
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[photo] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [external_id] = @external_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[photo]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_set_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_set_url]

GO

CREATE PROCEDURE usp_photo_set_url
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[photo]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[photo] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[photo]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_set_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_set_url_external_id]

GO

CREATE PROCEDURE usp_photo_set_url_external_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[photo]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[photo] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [external_id] = @external_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[photo]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_set_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_set_uuid_external_id]

GO

CREATE PROCEDURE usp_photo_set_uuid_external_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[photo]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[photo] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                AND [external_id] = @external_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[photo]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: Photo - photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_del_uuid]

GO

CREATE PROCEDURE usp_photo_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[photo]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_del_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_del_external_id]

GO

CREATE PROCEDURE usp_photo_del_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[photo]
    WHERE 1=1                        
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_del_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_del_url]

GO

CREATE PROCEDURE usp_photo_del_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[photo]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_del_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_del_url_external_id]

GO

CREATE PROCEDURE usp_photo_del_url_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[photo]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_del_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_del_uuid_external_id]

GO

CREATE PROCEDURE usp_photo_del_uuid_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[photo]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Photo - photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_get]

GO

CREATE PROCEDURE usp_photo_get
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[photo]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_get_uuid]

GO

CREATE PROCEDURE usp_photo_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[photo]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_get_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_get_external_id]

GO

CREATE PROCEDURE usp_photo_get_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[photo]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_get_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_get_url]

GO

CREATE PROCEDURE usp_photo_get_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_get_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_get_url_external_id]

GO

CREATE PROCEDURE usp_photo_get_url_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_photo_get_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_photo_get_uuid_external_id]

GO

CREATE PROCEDURE usp_photo_get_uuid_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[photo]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Video - video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_count]

GO

CREATE PROCEDURE usp_video_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[video]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_count_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_count_uuid]

GO

CREATE PROCEDURE usp_video_count_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[video]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_count_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_count_external_id]

GO

CREATE PROCEDURE usp_video_count_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[video]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_count_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_count_url]

GO

CREATE PROCEDURE usp_video_count_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_count_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_count_url_external_id]

GO

CREATE PROCEDURE usp_video_count_url_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_count_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_count_uuid_external_id]

GO

CREATE PROCEDURE usp_video_count_uuid_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[video]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Video - video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_browse_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_browse_filter]

GO

CREATE PROCEDURE usp_video_browse_filter
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
    SET @sql = @sql + ', [third_party_oembed]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [url]'
    SET @sql = @sql + ', [third_party_data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [third_party_url]'
    SET @sql = @sql + ', [third_party_id]'
    SET @sql = @sql + ', [content_type]'
    SET @sql = @sql + ', [external_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[video] WHERE 1=1 '
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
-- MODEL: Video - video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_set_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_set_uuid]

GO

CREATE PROCEDURE usp_video_set_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[video]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[video] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
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
                INSERT INTO [dbo].[video]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_set_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_set_external_id]

GO

CREATE PROCEDURE usp_video_set_external_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[video]  
                WHERE 1=1
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[video] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [external_id] = @external_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[video]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_set_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_set_url]

GO

CREATE PROCEDURE usp_video_set_url
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[video]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[video] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[video]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_set_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_set_url_external_id]

GO

CREATE PROCEDURE usp_video_set_url_external_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[video]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[video] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [external_id] = @external_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[video]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_set_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_set_uuid_external_id]

GO

CREATE PROCEDURE usp_video_set_uuid_external_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @external_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (500) = NULL
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
                FROM  [dbo].[video]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[video] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [uuid] = @uuid
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [external_id] = @external_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                AND [external_id] = @external_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[video]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [uuid]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [external_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @uuid
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @external_id
                    , @active
                    , @date_created
                    , @type
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
-- MODEL: Video - video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_del_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_del_uuid]

GO

CREATE PROCEDURE usp_video_del_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[video]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_del_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_del_external_id]

GO

CREATE PROCEDURE usp_video_del_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[video]
    WHERE 1=1                        
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_del_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_del_url]

GO

CREATE PROCEDURE usp_video_del_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[video]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_del_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_del_url_external_id]

GO

CREATE PROCEDURE usp_video_del_url_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[video]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_del_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_del_uuid_external_id]

GO

CREATE PROCEDURE usp_video_del_uuid_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[video]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Video - video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_get]

GO

CREATE PROCEDURE usp_video_get
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[video]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_get_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_get_uuid]

GO

CREATE PROCEDURE usp_video_get_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[video]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_get_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_get_external_id]

GO

CREATE PROCEDURE usp_video_get_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[video]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_get_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_get_url]

GO

CREATE PROCEDURE usp_video_get_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_get_url_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_get_url_external_id]

GO

CREATE PROCEDURE usp_video_get_url_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_video_get_uuid_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_video_get_uuid_external_id]

GO

CREATE PROCEDURE usp_video_get_uuid_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [uuid]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [external_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[video]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO

