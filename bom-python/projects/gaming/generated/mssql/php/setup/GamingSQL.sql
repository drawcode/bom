-- -----------------------------------------------------------------------------
-- SQL SETUP 
-- -----------------------------------------------------------------------------
-- TABLES

/*
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_category]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_category]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_category_tree]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_category_tree]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_category_assoc]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_category_assoc]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_type]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_type]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_game]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_game]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_game_network]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_game_network]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_game_data_attribute]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_game_data_attribute]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_session]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_session]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_session_data]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_session_data]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_content]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_content]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_profile_content]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_profile_content]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_app]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_app]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[profile_game_location]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[profile_game_location]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_photo]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_photo]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_video]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_video]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_rpg_item_weapon]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_rpg_item_weapon]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_rpg_item_skill]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_rpg_item_skill]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_product]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_product]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_statistic_leaderboard]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_statistic_leaderboard_rollup]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_live_queue]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_live_queue]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_live_recent_queue]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_live_recent_queue]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_profile_statistic]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_statistic_meta]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_statistic_meta]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_profile_statistic_timestamp]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_profile_statistic_timestamp]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_key_meta]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_level]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_level]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_profile_achievement]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[game_achievement_meta]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
DROP TABLE [dbo].[game_achievement_meta]
GO
*/


CREATE TABLE [dbo].[game] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_date_modified DEFAULT GETDATE()
    , [org_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [app_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game] ADD 
    CONSTRAINT [PK_game] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_category] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_category_date_modified DEFAULT GETDATE()
    , [type_id] uniqueidentifier NOT NULL
    , [org_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_game_category_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_category_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_category] ADD 
    CONSTRAINT [PK_game_category] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_category_tree] 
(
    [status] varchar (255)
    , [parent_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_category_tree_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_game_category_tree_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_category_tree_date_created DEFAULT GETDATE()
    , [category_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[game_category_tree] ADD 
    CONSTRAINT [PK_game_category_tree] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_category_assoc] 
(
    [status] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_category_assoc_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_game_category_assoc_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_category_assoc_date_created DEFAULT GETDATE()
    , [game_id] uniqueidentifier NOT NULL
    , [category_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[game_category_assoc] ADD 
    CONSTRAINT [PK_game_category_assoc] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_type] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_type_date_modified DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [active] bit
                CONSTRAINT DF_game_type_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_type_date_created DEFAULT GETDATE()
    , [type] varchar (50) NOT NULL
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_type] ADD 
    CONSTRAINT [PK_game_type] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_game] 
(
    [status] varchar (255)
    , [type_id] uniqueidentifier
    , [profile_id] uniqueidentifier
    , [game_profile] ntext
    , [active] bit
                CONSTRAINT DF_profile_game_active_bool DEFAULT 1
    , [game_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_game_date_modified DEFAULT GETDATE()
    , [profile_version] varchar (50)
    , [date_created] DATETIME
                CONSTRAINT DF_profile_game_date_created DEFAULT GETDATE()
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[profile_game] ADD 
    CONSTRAINT [PK_profile_game] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_game_network] 
(
    [status] varchar (255)
    , [hash] varchar (500)
    , [profile_id] uniqueidentifier
    , [game_network_id] uniqueidentifier
    , [network_username] varchar (500)
    , [active] bit
                CONSTRAINT DF_profile_game_network_active_bool DEFAULT 1
    , [game_id] uniqueidentifier
    , [data] ntext
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_game_network_date_modified DEFAULT GETDATE()
    , [secret] varchar (500)
    , [token] varchar (500)
    , [date_created] DATETIME
                CONSTRAINT DF_profile_game_network_date_created DEFAULT GETDATE()
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[profile_game_network] ADD 
    CONSTRAINT [PK_profile_game_network] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_game_data_attribute] 
(
    [code] varchar (500)
    , [uuid] uniqueidentifier
    , [val] ntext
    , [profile_id] uniqueidentifier
    , [otype] varchar (500)
    , [game_id] uniqueidentifier
    , [type] varchar (500)
    , [name] varchar (500)
)
GO
ALTER TABLE [dbo].[profile_game_data_attribute] ADD 
    CONSTRAINT [PK_profile_game_data_attribute] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_session] 
(
    [game_area] varchar (255)
    , [code] varchar (255)
    , [network_uuid] varchar (40)
    , [profile_id] uniqueidentifier
    , [game_level] varchar (255)
    , [profile_network] varchar (255)
    , [profile_device] varchar (50)
    , [display_name] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [network_external_port] int
    , [game_players_connected] int
    , [type] varchar (500)
    , [status] varchar (255)
    , [game_state] varchar (50)
    , [hash] varchar (255)
    , [description] varchar (255)
    , [network_external_ip] varchar (40)
    , [profile_username] varchar (500)
    , [active] bit
                CONSTRAINT DF_game_session_active_bool DEFAULT 1
    , [game_id] uniqueidentifier
    , [game_code] varchar (255)
    , [game_player_z] decimal
    , [game_player_x] decimal
    , [game_player_y] decimal
    , [network_port] int
    , [game_players_allowed] int
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_session_date_modified DEFAULT GETDATE()
    , [game_type] varchar (255)
    , [date_created] DATETIME
                CONSTRAINT DF_game_session_date_created DEFAULT GETDATE()
    , [network_ip] varchar (40)
    , [network_use_nat] bit
                CONSTRAINT DF_game_session_network_use_nat_bool DEFAULT 1
)
GO
ALTER TABLE [dbo].[game_session] ADD 
    CONSTRAINT [PK_game_session] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_session_data] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_session_data_date_modified DEFAULT GETDATE()
    , [data_results] ntext
    , [data] ntext
    , [uuid] uniqueidentifier NOT NULL
    , [data_layer_projectile] ntext
    , [data_layer_actors] ntext
    , [active] bit
                CONSTRAINT DF_game_session_data_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_session_data_date_created DEFAULT GETDATE()
    , [data_layer_enemy] ntext
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_session_data] ADD 
    CONSTRAINT [PK_game_session_data] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_content] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [extension] varchar (50)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_content_date_modified DEFAULT GETDATE()
    , [data] ntext
    , [game_id] uniqueidentifier NOT NULL
    , [uuid] uniqueidentifier NOT NULL
    , [filename] varchar (500)
    , [source] varchar (255)
    , [version] varchar (255)
    , [platform] varchar (255)
    , [content_type] varchar (255)
    , [path] varchar (500)
    , [active] bit
                CONSTRAINT DF_game_content_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_content_date_created DEFAULT GETDATE()
    , [increment] int
    , [type] varchar (500)
    , [hash] varchar (255)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_content] ADD 
    CONSTRAINT [PK_game_content] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_profile_content] 
(
    [username] varchar (500)
    , [code] varchar (255)
    , [profile_id] uniqueidentifier NOT NULL
    , [increment] int
    , [path] varchar (500)
    , [display_name] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [platform] varchar (255)
    , [filename] varchar (500)
    , [source] varchar (255)
    , [version] varchar (255)
    , [game_network] varchar (500)
    , [type] varchar (500)
    , [status] varchar (255)
    , [hash] varchar (255)
    , [description] varchar (255)
    , [content_type] varchar (255)
    , [active] bit
                CONSTRAINT DF_game_profile_content_active_bool DEFAULT 1
    , [game_id] uniqueidentifier NOT NULL
    , [data] ntext
    , [name] varchar (255)
    , [extension] varchar (50)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_profile_content_date_modified DEFAULT GETDATE()
    , [date_created] DATETIME
                CONSTRAINT DF_game_profile_content_date_created DEFAULT GETDATE()
)
GO
ALTER TABLE [dbo].[game_profile_content] ADD 
    CONSTRAINT [PK_game_profile_content] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_app] 
(
    [status] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_app_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_game_app_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_app_date_created DEFAULT GETDATE()
    , [game_id] uniqueidentifier NOT NULL
    , [type] varchar (500)
    , [app_id] uniqueidentifier NOT NULL
)
GO
ALTER TABLE [dbo].[game_app] ADD 
    CONSTRAINT [PK_game_app] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[profile_game_location] 
(
    [status] varchar (255)
    , [game_location_id] uniqueidentifier
    , [type_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_profile_game_location_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_profile_game_location_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_profile_game_location_date_created DEFAULT GETDATE()
    , [profile_id] uniqueidentifier
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[profile_game_location] ADD 
    CONSTRAINT [PK_profile_game_location] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_photo] 
(
    [status] varchar (255)
    , [third_party_oembed] varchar (500)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_photo_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [third_party_data] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [third_party_url] varchar (500)
    , [third_party_id] varchar (500)
    , [content_type] varchar (100)
    , [external_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_photo_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_photo_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_photo] ADD 
    CONSTRAINT [PK_game_photo] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_video] 
(
    [status] varchar (255)
    , [third_party_oembed] varchar (500)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_video_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [third_party_data] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [third_party_url] varchar (500)
    , [third_party_id] varchar (500)
    , [content_type] varchar (100)
    , [external_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_video_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_video_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_video] ADD 
    CONSTRAINT [PK_game_video] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_rpg_item_weapon] 
(
    [status] varchar (255)
    , [third_party_oembed] varchar (500)
    , [code] varchar (255)
    , [description] varchar (255)
    , [game_defense] decimal
    , [third_party_url] varchar (500)
    , [third_party_id] varchar (500)
    , [content_type] varchar (100)
    , [type] varchar (500)
    , [active] bit
                CONSTRAINT DF_game_rpg_item_weapon_active_bool DEFAULT 1
    , [game_id] uniqueidentifier
    , [game_attack] decimal
    , [uuid] uniqueidentifier NOT NULL
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_rpg_item_weapon_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [third_party_data] varchar (500)
    , [game_price] decimal
    , [game_type] decimal
    , [game_skill] decimal
    , [game_health] decimal
    , [date_created] DATETIME
                CONSTRAINT DF_game_rpg_item_weapon_date_created DEFAULT GETDATE()
    , [game_energy] decimal
    , [game_data] ntext
)
GO
ALTER TABLE [dbo].[game_rpg_item_weapon] ADD 
    CONSTRAINT [PK_game_rpg_item_weapon] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_rpg_item_skill] 
(
    [status] varchar (255)
    , [third_party_oembed] varchar (500)
    , [code] varchar (255)
    , [description] varchar (255)
    , [game_defense] decimal
    , [third_party_url] varchar (500)
    , [third_party_id] varchar (500)
    , [content_type] varchar (100)
    , [type] varchar (500)
    , [active] bit
                CONSTRAINT DF_game_rpg_item_skill_active_bool DEFAULT 1
    , [game_id] uniqueidentifier
    , [game_attack] decimal
    , [uuid] uniqueidentifier NOT NULL
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_rpg_item_skill_date_modified DEFAULT GETDATE()
    , [url] varchar (500)
    , [third_party_data] varchar (500)
    , [game_price] decimal
    , [game_type] decimal
    , [game_skill] decimal
    , [game_health] decimal
    , [date_created] DATETIME
                CONSTRAINT DF_game_rpg_item_skill_date_created DEFAULT GETDATE()
    , [game_energy] decimal
    , [game_data] ntext
)
GO
ALTER TABLE [dbo].[game_rpg_item_skill] ADD 
    CONSTRAINT [PK_game_rpg_item_skill] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_product] 
(
    [status] varchar (255)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_product_date_modified DEFAULT GETDATE()
    , [url] varchar (255)
    , [uuid] uniqueidentifier NOT NULL
    , [game_id] varchar (100)
    , [active] bit
                CONSTRAINT DF_game_product_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_product_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_product] ADD 
    CONSTRAINT [PK_game_product] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_statistic_leaderboard] 
(
    [status] varchar (255)
    , [username] varchar (500)
    , [key] uniqueidentifier
    , [timestamp] float
    , [profile_id] uniqueidentifier
    , [rank] int
    , [rank_change] int
    , [game_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_statistic_leaderboard_active_bool DEFAULT 1
    , [rank_total_count] int
    , [data] ntext
    , [stat_value] float
    , [network] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_statistic_leaderboard_date_modified DEFAULT GETDATE()
    , [level] varchar (500)
    , [stat_value_formatted] varchar (500)
    , [date_created] DATETIME
                CONSTRAINT DF_game_statistic_leaderboard_date_created DEFAULT GETDATE()
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[game_statistic_leaderboard] ADD 
    CONSTRAINT [PK_game_statistic_leaderboard] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_statistic_leaderboard_rollup] 
(
    [status] varchar (255)
    , [username] varchar (500)
    , [key] uniqueidentifier
    , [timestamp] float
    , [profile_id] uniqueidentifier
    , [rank] int
    , [rank_change] int
    , [game_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_statistic_leaderboard_rollup_active_bool DEFAULT 1
    , [rank_total_count] int
    , [data] ntext
    , [stat_value] float
    , [network] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_statistic_leaderboard_rollup_date_modified DEFAULT GETDATE()
    , [level] varchar (500)
    , [stat_value_formatted] varchar (500)
    , [date_created] DATETIME
                CONSTRAINT DF_game_statistic_leaderboard_rollup_date_created DEFAULT GETDATE()
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[game_statistic_leaderboard_rollup] ADD 
    CONSTRAINT [PK_game_statistic_leaderboard_rollup] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_live_queue] 
(
    [status] varchar (255)
    , [data_stat] ntext
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_live_queue_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_game_live_queue_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_live_queue_date_created DEFAULT GETDATE()
    , [game_id] uniqueidentifier
    , [profile_id] uniqueidentifier
    , [type] varchar (500)
    , [data_ad] ntext
)
GO
ALTER TABLE [dbo].[game_live_queue] ADD 
    CONSTRAINT [PK_game_live_queue] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_live_recent_queue] 
(
    [status] varchar (255)
    , [username] varchar (500)
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_live_recent_queue_date_modified DEFAULT GETDATE()
    , [data] ntext
    , [profile_id] uniqueidentifier
    , [uuid] uniqueidentifier NOT NULL
    , [game] varchar (500)
    , [game_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_live_recent_queue_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_live_recent_queue_date_created DEFAULT GETDATE()
    , [type] varchar (500)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_live_recent_queue] ADD 
    CONSTRAINT [PK_game_live_recent_queue] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_profile_statistic] 
(
    [status] varchar (255)
    , [username] varchar (500)
    , [timestamp] float
    , [profile_id] uniqueidentifier
    , [key] varchar (50)
    , [active] bit
                CONSTRAINT DF_game_profile_statistic_active_bool DEFAULT 1
    , [game_id] uniqueidentifier
    , [data] ntext
    , [stat_value] float
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_profile_statistic_date_modified DEFAULT GETDATE()
    , [level] varchar (500)
    , [points] float
    , [date_created] DATETIME
                CONSTRAINT DF_game_profile_statistic_date_created DEFAULT GETDATE()
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[game_profile_statistic] ADD 
    CONSTRAINT [PK_game_profile_statistic] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_statistic_meta] 
(
    [status] varchar (255)
    , [sort] int
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_statistic_meta_date_modified DEFAULT GETDATE()
    , [data] ntext
    , [uuid] uniqueidentifier NOT NULL
    , [points] float
    , [store_count] int
    , [key] varchar (50)
    , [game_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_statistic_meta_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_statistic_meta_date_created DEFAULT GETDATE()
    , [type] varchar (40)
    , [order] varchar (40)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_statistic_meta] ADD 
    CONSTRAINT [PK_game_statistic_meta] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_profile_statistic_timestamp] 
(
    [status] varchar (255)
    , [timestamp] DATETIME
                CONSTRAINT DF_game_profile_statistic_timestamp_timestamp DEFAULT GETDATE()
    , [uuid] uniqueidentifier NOT NULL
    , [key] varchar (50)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_profile_statistic_timestamp_date_modified DEFAULT GETDATE()
    , [active] bit
                CONSTRAINT DF_game_profile_statistic_timestamp_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_profile_statistic_timestamp_date_created DEFAULT GETDATE()
    , [game_id] uniqueidentifier
    , [profile_id] uniqueidentifier
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[game_profile_statistic_timestamp] ADD 
    CONSTRAINT [PK_game_profile_statistic_timestamp] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_key_meta] 
(
    [status] varchar (255)
    , [sort] int
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_key_meta_date_modified DEFAULT GETDATE()
    , [data] ntext
    , [level] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [key_level] varchar (50)
    , [store_count] int
    , [key] varchar (50)
    , [game_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_key_meta_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_key_meta_date_created DEFAULT GETDATE()
    , [type] varchar (40)
    , [order] varchar (40)
    , [key_stat] varchar (50)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_key_meta] ADD 
    CONSTRAINT [PK_game_key_meta] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_level] 
(
    [status] varchar (255)
    , [sort] int
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [date_modified] DATETIME
                CONSTRAINT DF_game_level_date_modified DEFAULT GETDATE()
    , [data] ntext
    , [uuid] uniqueidentifier NOT NULL
    , [key] varchar (50)
    , [game_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_level_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_level_date_created DEFAULT GETDATE()
    , [type] varchar (40)
    , [order] varchar (40)
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_level] ADD 
    CONSTRAINT [PK_game_level] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_profile_achievement] 
(
    [status] varchar (255)
    , [username] varchar (500)
    , [timestamp] float
    , [completed] bit
                CONSTRAINT DF_game_profile_achievement_completed_bool DEFAULT 1
    , [profile_id] uniqueidentifier
    , [key] varchar (50)
    , [active] bit
                CONSTRAINT DF_game_profile_achievement_active_bool DEFAULT 1
    , [game_id] uniqueidentifier
    , [achievement_value] decimal
    , [data] ntext
    , [uuid] uniqueidentifier NOT NULL
    , [date_modified] DATETIME
                CONSTRAINT DF_game_profile_achievement_date_modified DEFAULT GETDATE()
    , [level] varchar (500)
    , [date_created] DATETIME
                CONSTRAINT DF_game_profile_achievement_date_created DEFAULT GETDATE()
    , [type] varchar (500)
)
GO
ALTER TABLE [dbo].[game_profile_achievement] ADD 
    CONSTRAINT [PK_game_profile_achievement] PRIMARY KEY CLUSTERED 
    (
            [uuid]
    )
GO
CREATE TABLE [dbo].[game_achievement_meta] 
(
    [status] varchar (255)
    , [sort] int
    , [code] varchar (255)
    , [display_name] varchar (255)
    , [name] varchar (255)
    , [game_stat] bit
                CONSTRAINT DF_game_achievement_meta_game_stat_bool DEFAULT 1
    , [date_modified] DATETIME
                CONSTRAINT DF_game_achievement_meta_date_modified DEFAULT GETDATE()
    , [data] ntext
    , [level] varchar (500)
    , [uuid] uniqueidentifier NOT NULL
    , [points] int
    , [key] varchar (50)
    , [game_id] uniqueidentifier
    , [active] bit
                CONSTRAINT DF_game_achievement_meta_active_bool DEFAULT 1
    , [date_created] DATETIME
                CONSTRAINT DF_game_achievement_meta_date_created DEFAULT GETDATE()
    , [modifier] decimal
    , [type] varchar (40)
    , [leaderboard] bit
                CONSTRAINT DF_game_achievement_meta_leaderboard_bool DEFAULT 1
    , [description] varchar (255)
)
GO
ALTER TABLE [dbo].[game_achievement_meta] ADD 
    CONSTRAINT [PK_game_achievement_meta] PRIMARY KEY CLUSTERED 
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
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_game_data_attribute]') AND name = N'IX_profile_game_data_attribute_uuid')
DROP INDEX [IX_profile_game_data_attribute_uuid] ON [dbo].[profile_game_data_attribute]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_game_data_attribute]') AND name = N'IX_profile_game_data_attribute_profile_id')
DROP INDEX [IX_profile_game_data_attribute_profile_id] ON [dbo].[profile_game_data_attribute]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_game_data_attribute]') AND name = N'IX_profile_game_data_attribute_profile_id_game_id')
DROP INDEX [IX_profile_game_data_attribute_profile_id_game_id] ON [dbo].[profile_game_data_attribute]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[profile_game_data_attribute]') AND name = N'IX_profile_game_data_attribute_profile_id_game_id_code')
DROP INDEX [IX_profile_game_data_attribute_profile_id_game_id_code] ON [dbo].[profile_game_data_attribute]
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
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key')
DROP INDEX [IX_game_statistic_leaderboard_key] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_profile_id')
DROP INDEX [IX_game_statistic_leaderboard_profile_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_username')
DROP INDEX [IX_game_statistic_leaderboard_username] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_game_id')
DROP INDEX [IX_game_statistic_leaderboard_game_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_game_id_level')
DROP INDEX [IX_game_statistic_leaderboard_key_game_id_level] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_profile_id_game_id')
DROP INDEX [IX_game_statistic_leaderboard_profile_id_game_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_username_game_id')
DROP INDEX [IX_game_statistic_leaderboard_username_game_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_username')
DROP INDEX [IX_game_statistic_leaderboard_key_username] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_username_game_id')
DROP INDEX [IX_game_statistic_leaderboard_key_username_game_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_username_game_id_type')
DROP INDEX [IX_game_statistic_leaderboard_key_username_game_id_type] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_profile_id')
DROP INDEX [IX_game_statistic_leaderboard_key_profile_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_profile_id_game_id')
DROP INDEX [IX_game_statistic_leaderboard_key_profile_id_game_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_profile_id_game_id_type')
DROP INDEX [IX_game_statistic_leaderboard_key_profile_id_game_id_type] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_game_id')
DROP INDEX [IX_game_statistic_leaderboard_key_game_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_game_id_profile_id')
DROP INDEX [IX_game_statistic_leaderboard_key_game_id_profile_id] ON [dbo].[game_statistic_leaderboard]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard]') AND name = N'IX_game_statistic_leaderboard_key_game_id_type')
DROP INDEX [IX_game_statistic_leaderboard_key_game_id_type] ON [dbo].[game_statistic_leaderboard]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_profile_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_profile_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_username')
DROP INDEX [IX_game_statistic_leaderboard_rollup_username] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_game_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_game_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_game_id_level')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_game_id_level] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_profile_id_game_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_profile_id_game_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_username_game_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_username_game_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_username')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_username] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_username_game_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_username_game_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_username_game_id_type')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_username_game_id_type] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_profile_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_profile_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_profile_id_game_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_profile_id_game_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_profile_id_game_id_type')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_profile_id_game_id_type] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_game_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_game_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_game_id_profile_id')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_game_id_profile_id] ON [dbo].[game_statistic_leaderboard_rollup]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_leaderboard_rollup]') AND name = N'IX_game_statistic_leaderboard_rollup_key_game_id_type')
DROP INDEX [IX_game_statistic_leaderboard_rollup_key_game_id_type] ON [dbo].[game_statistic_leaderboard_rollup]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_live_queue]') AND name = N'IX_game_live_queue_profile_id')
DROP INDEX [IX_game_live_queue_profile_id] ON [dbo].[game_live_queue]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_live_queue]') AND name = N'IX_game_live_queue_game_id')
DROP INDEX [IX_game_live_queue_game_id] ON [dbo].[game_live_queue]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_live_queue]') AND name = N'IX_game_live_queue_profile_id_game_id')
DROP INDEX [IX_game_live_queue_profile_id_game_id] ON [dbo].[game_live_queue]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_live_recent_queue]') AND name = N'IX_game_live_recent_queue_profile_id')
DROP INDEX [IX_game_live_recent_queue_profile_id] ON [dbo].[game_live_recent_queue]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_live_recent_queue]') AND name = N'IX_game_live_recent_queue_game_id')
DROP INDEX [IX_game_live_recent_queue_game_id] ON [dbo].[game_live_recent_queue]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_live_recent_queue]') AND name = N'IX_game_live_recent_queue_profile_id_game_id')
DROP INDEX [IX_game_live_recent_queue_profile_id_game_id] ON [dbo].[game_live_recent_queue]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key')
DROP INDEX [IX_game_profile_statistic_key] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_profile_id')
DROP INDEX [IX_game_profile_statistic_profile_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_username')
DROP INDEX [IX_game_profile_statistic_username] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_game_id')
DROP INDEX [IX_game_profile_statistic_game_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_game_id')
DROP INDEX [IX_game_profile_statistic_key_game_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_game_id_level')
DROP INDEX [IX_game_profile_statistic_key_game_id_level] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_profile_id_game_id')
DROP INDEX [IX_game_profile_statistic_profile_id_game_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_username_game_id')
DROP INDEX [IX_game_profile_statistic_username_game_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_username')
DROP INDEX [IX_game_profile_statistic_key_username] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_username_game_id')
DROP INDEX [IX_game_profile_statistic_key_username_game_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_username_game_id_type')
DROP INDEX [IX_game_profile_statistic_key_username_game_id_type] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_profile_id')
DROP INDEX [IX_game_profile_statistic_key_profile_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_profile_id_game_id')
DROP INDEX [IX_game_profile_statistic_key_profile_id_game_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_profile_id_game_id_type')
DROP INDEX [IX_game_profile_statistic_key_profile_id_game_id_type] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_game_id_profile_id')
DROP INDEX [IX_game_profile_statistic_key_game_id_profile_id] ON [dbo].[game_profile_statistic]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic]') AND name = N'IX_game_profile_statistic_key_game_id_type')
DROP INDEX [IX_game_profile_statistic_key_game_id_type] ON [dbo].[game_profile_statistic]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_meta]') AND name = N'IX_game_statistic_meta_key')
DROP INDEX [IX_game_statistic_meta_key] ON [dbo].[game_statistic_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_meta]') AND name = N'IX_game_statistic_meta_game_id')
DROP INDEX [IX_game_statistic_meta_game_id] ON [dbo].[game_statistic_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_meta]') AND name = N'IX_game_statistic_meta_key_game_id')
DROP INDEX [IX_game_statistic_meta_key_game_id] ON [dbo].[game_statistic_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_meta]') AND name = N'IX_game_statistic_meta_key_type')
DROP INDEX [IX_game_statistic_meta_key_type] ON [dbo].[game_statistic_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_meta]') AND name = N'IX_game_statistic_meta_game_id_type')
DROP INDEX [IX_game_statistic_meta_game_id_type] ON [dbo].[game_statistic_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_statistic_meta]') AND name = N'IX_game_statistic_meta_key_game_id_type')
DROP INDEX [IX_game_statistic_meta_key_game_id_type] ON [dbo].[game_statistic_meta]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_statistic_timestamp]') AND name = N'IX_game_profile_statistic_timestamp_key_profile_id_game_id_timestamp')
DROP INDEX [IX_game_profile_statistic_timestamp_key_profile_id_game_id_timestamp] ON [dbo].[game_profile_statistic_timestamp]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key')
DROP INDEX [IX_game_key_meta_key] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_game_id')
DROP INDEX [IX_game_key_meta_game_id] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key_stat_key_level_game_id')
DROP INDEX [IX_game_key_meta_key_stat_key_level_game_id] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key_stat_key_level_game_id_level')
DROP INDEX [IX_game_key_meta_key_stat_key_level_game_id_level] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key_stat_key_level_type')
DROP INDEX [IX_game_key_meta_key_stat_key_level_type] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key_game_id')
DROP INDEX [IX_game_key_meta_key_game_id] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key_game_id_level')
DROP INDEX [IX_game_key_meta_key_game_id_level] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key_type')
DROP INDEX [IX_game_key_meta_key_type] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_game_id_type')
DROP INDEX [IX_game_key_meta_game_id_type] ON [dbo].[game_key_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_key_meta]') AND name = N'IX_game_key_meta_key_game_id_type')
DROP INDEX [IX_game_key_meta_key_game_id_type] ON [dbo].[game_key_meta]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_level]') AND name = N'IX_game_level_key')
DROP INDEX [IX_game_level_key] ON [dbo].[game_level]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_level]') AND name = N'IX_game_level_key_game_id')
DROP INDEX [IX_game_level_key_game_id] ON [dbo].[game_level]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_level]') AND name = N'IX_game_level_key_game_id_type')
DROP INDEX [IX_game_level_key_game_id_type] ON [dbo].[game_level]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key')
DROP INDEX [IX_game_profile_achievement_key] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_profile_id')
DROP INDEX [IX_game_profile_achievement_profile_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_username')
DROP INDEX [IX_game_profile_achievement_username] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_game_id')
DROP INDEX [IX_game_profile_achievement_game_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_game_id')
DROP INDEX [IX_game_profile_achievement_key_game_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_game_id_level')
DROP INDEX [IX_game_profile_achievement_key_game_id_level] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_profile_id_game_id')
DROP INDEX [IX_game_profile_achievement_profile_id_game_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_username_game_id')
DROP INDEX [IX_game_profile_achievement_username_game_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_username')
DROP INDEX [IX_game_profile_achievement_key_username] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_username_game_id')
DROP INDEX [IX_game_profile_achievement_key_username_game_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_username_game_id_type')
DROP INDEX [IX_game_profile_achievement_key_username_game_id_type] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_profile_id')
DROP INDEX [IX_game_profile_achievement_key_profile_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_profile_id_game_id')
DROP INDEX [IX_game_profile_achievement_key_profile_id_game_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_profile_id_game_id_type')
DROP INDEX [IX_game_profile_achievement_key_profile_id_game_id_type] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_game_id_profile_id')
DROP INDEX [IX_game_profile_achievement_key_game_id_profile_id] ON [dbo].[game_profile_achievement]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_profile_achievement]') AND name = N'IX_game_profile_achievement_key_game_id_type')
DROP INDEX [IX_game_profile_achievement_key_game_id_type] ON [dbo].[game_profile_achievement]
GO
   
-- -----------------------------------------------------------------------------
-- INDEXES

-- INDEX DROPS        
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_achievement_meta]') AND name = N'IX_game_achievement_meta_key')
DROP INDEX [IX_game_achievement_meta_key] ON [dbo].[game_achievement_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_achievement_meta]') AND name = N'IX_game_achievement_meta_game_id')
DROP INDEX [IX_game_achievement_meta_game_id] ON [dbo].[game_achievement_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_achievement_meta]') AND name = N'IX_game_achievement_meta_key_game_id')
DROP INDEX [IX_game_achievement_meta_key_game_id] ON [dbo].[game_achievement_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_achievement_meta]') AND name = N'IX_game_achievement_meta_key_game_id_level')
DROP INDEX [IX_game_achievement_meta_key_game_id_level] ON [dbo].[game_achievement_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_achievement_meta]') AND name = N'IX_game_achievement_meta_key_type')
DROP INDEX [IX_game_achievement_meta_key_type] ON [dbo].[game_achievement_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_achievement_meta]') AND name = N'IX_game_achievement_meta_game_id_type')
DROP INDEX [IX_game_achievement_meta_game_id_type] ON [dbo].[game_achievement_meta]
GO
-- -----------------------------------------------------------------------------                
IF  EXISTS (SELECT * FROM sys.indexes WHERE object_id = OBJECT_ID(N'[dbo].[game_achievement_meta]') AND name = N'IX_game_achievement_meta_key_game_id_type')
DROP INDEX [IX_game_achievement_meta_key_game_id_type] ON [dbo].[game_achievement_meta]
GO

        
-- INDEX CREATES

        
        
        
        
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_profile_game_data_attribute_uuid] ON [dbo].[profile_game_data_attribute] 
(
                    
    [uuid] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_game_data_attribute_profile_id] ON [dbo].[profile_game_data_attribute] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_game_data_attribute_profile_id_game_id] ON [dbo].[profile_game_data_attribute] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_profile_game_data_attribute_profile_id_game_id_code] ON [dbo].[profile_game_data_attribute] 
(
                    
    [code] ASC
                    
    , [game_id] ASC
                    
    , [profile_id] ASC
)
GO
        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
-- INDEX CREATES

        
        
-- INDEX CREATES

        
        
        
        
        
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_profile_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_username] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [username] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_game_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_game_id_level] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
                    
    , [level] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_profile_id_game_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_username_game_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_username] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [username] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_username_game_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_username_game_id_type] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_profile_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_profile_id_game_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_profile_id_game_id_type] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_game_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_game_id_profile_id] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_key_game_id_type] ON [dbo].[game_statistic_leaderboard] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_profile_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_username] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [username] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_game_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_game_id_level] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
                    
    , [level] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_profile_id_game_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_username_game_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_username] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [username] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_username_game_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_username_game_id_type] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_profile_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_profile_id_game_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_profile_id_game_id_type] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_game_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_game_id_profile_id] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_leaderboard_rollup_key_game_id_type] ON [dbo].[game_statistic_leaderboard_rollup] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_live_queue_profile_id] ON [dbo].[game_live_queue] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_live_queue_game_id] ON [dbo].[game_live_queue] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_live_queue_profile_id_game_id] ON [dbo].[game_live_queue] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_live_recent_queue_profile_id] ON [dbo].[game_live_recent_queue] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_live_recent_queue_game_id] ON [dbo].[game_live_recent_queue] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_live_recent_queue_profile_id_game_id] ON [dbo].[game_live_recent_queue] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key] ON [dbo].[game_profile_statistic] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_profile_id] ON [dbo].[game_profile_statistic] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_username] ON [dbo].[game_profile_statistic] 
(
                    
    [username] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_game_id] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_game_id] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_game_id_level] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
                    
    , [level] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_profile_id_game_id] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_username_game_id] ON [dbo].[game_profile_statistic] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_username] ON [dbo].[game_profile_statistic] 
(
                    
    [username] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_username_game_id] ON [dbo].[game_profile_statistic] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_username_game_id_type] ON [dbo].[game_profile_statistic] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_profile_id] ON [dbo].[game_profile_statistic] 
(
                    
    [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_profile_id_game_id] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_profile_id_game_id_type] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_game_id_profile_id] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_key_game_id_type] ON [dbo].[game_profile_statistic] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_statistic_meta_key] ON [dbo].[game_statistic_meta] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_meta_game_id] ON [dbo].[game_statistic_meta] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_meta_key_game_id] ON [dbo].[game_statistic_meta] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_meta_key_type] ON [dbo].[game_statistic_meta] 
(
                    
    [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_meta_game_id_type] ON [dbo].[game_statistic_meta] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_statistic_meta_key_game_id_type] ON [dbo].[game_statistic_meta] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_profile_statistic_timestamp_key_profile_id_game_id_timestamp] ON [dbo].[game_profile_statistic_timestamp] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
                    
    , [timestamp] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_key_meta_key] ON [dbo].[game_key_meta] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_game_id] ON [dbo].[game_key_meta] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_key_stat_key_level_game_id] ON [dbo].[game_key_meta] 
(
                    
    [game_id] ASC
                    
    , [key_level] ASC
                    
    , [key_stat] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_key_stat_key_level_game_id_level] ON [dbo].[game_key_meta] 
(
                    
    [game_id] ASC
                    
    , [key_level] ASC
                    
    , [key_stat] ASC
                    
    , [level] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_key_stat_key_level_type] ON [dbo].[game_key_meta] 
(
                    
    [key_level] ASC
                    
    , [type] ASC
                    
    , [key_stat] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_key_game_id] ON [dbo].[game_key_meta] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_key_game_id_level] ON [dbo].[game_key_meta] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
                    
    , [level] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_key_type] ON [dbo].[game_key_meta] 
(
                    
    [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_game_id_type] ON [dbo].[game_key_meta] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_key_meta_key_game_id_type] ON [dbo].[game_key_meta] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_level_key] ON [dbo].[game_level] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_level_key_game_id] ON [dbo].[game_level] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_level_key_game_id_type] ON [dbo].[game_level] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key] ON [dbo].[game_profile_achievement] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_profile_id] ON [dbo].[game_profile_achievement] 
(
                    
    [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_username] ON [dbo].[game_profile_achievement] 
(
                    
    [username] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_game_id] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_game_id] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_game_id_level] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
                    
    , [level] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_profile_id_game_id] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_username_game_id] ON [dbo].[game_profile_achievement] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_username] ON [dbo].[game_profile_achievement] 
(
                    
    [username] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_username_game_id] ON [dbo].[game_profile_achievement] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_username_game_id_type] ON [dbo].[game_profile_achievement] 
(
                    
    [username] ASC
                    
    , [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_profile_id] ON [dbo].[game_profile_achievement] 
(
                    
    [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_profile_id_game_id] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_profile_id_game_id_type] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_game_id_profile_id] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
                    
    , [profile_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_profile_achievement_key_game_id_type] ON [dbo].[game_profile_achievement] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO
        
-- INDEX CREATES

CREATE NONCLUSTERED INDEX [IX_game_achievement_meta_key] ON [dbo].[game_achievement_meta] 
(
                    
    [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_achievement_meta_game_id] ON [dbo].[game_achievement_meta] 
(
                    
    [game_id] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_achievement_meta_key_game_id] ON [dbo].[game_achievement_meta] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_achievement_meta_key_game_id_level] ON [dbo].[game_achievement_meta] 
(
                    
    [game_id] ASC
                    
    , [key] ASC
                    
    , [level] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_achievement_meta_key_type] ON [dbo].[game_achievement_meta] 
(
                    
    [type] ASC
                    
    , [key] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_achievement_meta_game_id_type] ON [dbo].[game_achievement_meta] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
)
GO
CREATE NONCLUSTERED INDEX [IX_game_achievement_meta_key_game_id_type] ON [dbo].[game_achievement_meta] 
(
                    
    [game_id] ASC
                    
    , [type] ASC
                    
    , [key] ASC
)
GO

-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: Game - game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_count]

GO

CREATE PROCEDURE usp_game_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_count_by_uuid]

GO

CREATE PROCEDURE usp_game_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_count_by_code]

GO

CREATE PROCEDURE usp_game_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_count_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_count_by_name]

GO

CREATE PROCEDURE usp_game_count_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_count_by_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_count_by_org_id]

GO

CREATE PROCEDURE usp_game_count_by_org_id
(
    @org_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_count_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_count_by_app_id]

GO

CREATE PROCEDURE usp_game_count_by_app_id
(
    @app_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game]
    WHERE 1=1
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_count_by_org_id_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_count_by_org_id_by_app_id]

GO

CREATE PROCEDURE usp_game_count_by_org_id_by_app_id
(
    @org_id uniqueidentifier = NULL
    , @app_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [app_id] = @app_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: Game - game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_browse_by_filter]

GO

CREATE PROCEDURE usp_game_browse_by_filter
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
    SET @sql = @sql + ', [app_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game] WHERE 1=1 '
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
-- MODEL: Game - game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_set_by_uuid]

GO

CREATE PROCEDURE usp_game_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[game]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [app_id] = @app_id
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
                INSERT INTO [dbo].[game]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [app_id]
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
                    , @app_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_set_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_set_by_code]

GO

CREATE PROCEDURE usp_game_set_by_code
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[game]  
                WHERE 1=1
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [app_id] = @app_id
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
                INSERT INTO [dbo].[game]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [app_id]
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
                    , @app_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_set_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_set_by_name]

GO

CREATE PROCEDURE usp_game_set_by_name
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[game]  
                WHERE 1=1
                AND LOWER([name]) = LOWER(@name)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [app_id] = @app_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND LOWER([name]) = LOWER(@name)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [app_id]
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
                    , @app_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_set_by_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_set_by_org_id]

GO

CREATE PROCEDURE usp_game_set_by_org_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[game]  
                WHERE 1=1
                AND [org_id] = @org_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [app_id] = @app_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [org_id] = @org_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [app_id]
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
                    , @app_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_set_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_set_by_app_id]

GO

CREATE PROCEDURE usp_game_set_by_app_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[game]  
                WHERE 1=1
                AND [app_id] = @app_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [app_id] = @app_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [app_id] = @app_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [app_id]
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
                    , @app_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_set_by_org_id_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_set_by_org_id_by_app_id]

GO

CREATE PROCEDURE usp_game_set_by_org_id_by_app_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @org_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @app_id uniqueidentifier = NULL
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
                FROM  [dbo].[game]  
                WHERE 1=1
                AND [org_id] = @org_id
                AND [app_id] = @app_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [org_id] = @org_id
                    , [uuid] = @uuid
                    , [app_id] = @app_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [org_id] = @org_id
                AND [app_id] = @app_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [org_id]
                    , [uuid]
                    , [app_id]
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
                    , @app_id
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
-- MODEL: Game - game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_del_by_uuid]

GO

CREATE PROCEDURE usp_game_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_del_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_del_by_code]

GO

CREATE PROCEDURE usp_game_del_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_del_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_del_by_name]

GO

CREATE PROCEDURE usp_game_del_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game]
    WHERE 1=1                        
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_del_by_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_del_by_org_id]

GO

CREATE PROCEDURE usp_game_del_by_org_id
(
    @org_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game]
    WHERE 1=1                        
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_del_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_del_by_app_id]

GO

CREATE PROCEDURE usp_game_del_by_app_id
(
    @app_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game]
    WHERE 1=1                        
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_del_by_org_id_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_del_by_org_id_by_app_id]

GO

CREATE PROCEDURE usp_game_del_by_org_id_by_app_id
(
    @org_id uniqueidentifier = NULL
    , @app_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game]
    WHERE 1=1                        
    AND [org_id] = @org_id
    AND [app_id] = @app_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: Game - game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_get]

GO

CREATE PROCEDURE usp_game_get
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
        , [app_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_get_by_uuid]

GO

CREATE PROCEDURE usp_game_get_by_uuid
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
        , [app_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_get_by_code]

GO

CREATE PROCEDURE usp_game_get_by_code
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
        , [app_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_get_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_get_by_name]

GO

CREATE PROCEDURE usp_game_get_by_name
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
        , [app_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_get_by_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_get_by_org_id]

GO

CREATE PROCEDURE usp_game_get_by_org_id
(
    @org_id uniqueidentifier = NULL
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
        , [app_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_get_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_get_by_app_id]

GO

CREATE PROCEDURE usp_game_get_by_app_id
(
    @app_id uniqueidentifier = NULL
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
        , [app_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game]
    WHERE 1=1
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_get_by_org_id_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_get_by_org_id_by_app_id]

GO

CREATE PROCEDURE usp_game_get_by_org_id_by_app_id
(
    @org_id uniqueidentifier = NULL
    , @app_id uniqueidentifier = NULL
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
        , [app_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameCategory - game_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_count]

GO

CREATE PROCEDURE usp_game_category_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_count_by_uuid]

GO

CREATE PROCEDURE usp_game_category_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_count_by_code]

GO

CREATE PROCEDURE usp_game_category_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_count_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_count_by_name]

GO

CREATE PROCEDURE usp_game_category_count_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_count_by_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_count_by_org_id]

GO

CREATE PROCEDURE usp_game_category_count_by_org_id
(
    @org_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_count_by_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_count_by_type_id]

GO

CREATE PROCEDURE usp_game_category_count_by_type_id
(
    @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_count_by_org_id_by_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_count_by_org_id_by_type_id]

GO

CREATE PROCEDURE usp_game_category_count_by_org_id_by_type_id
(
    @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category]
    WHERE 1=1
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategory - game_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_browse_by_filter]

GO

CREATE PROCEDURE usp_game_category_browse_by_filter
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

    SET @sql = @sql + ' FROM [dbo].[game_category] WHERE 1=1 '
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
-- MODEL: GameCategory - game_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_set_by_uuid]

GO

CREATE PROCEDURE usp_game_category_set_by_uuid
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
                FROM  [dbo].[game_category]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_category] 
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
                INSERT INTO [dbo].[game_category]
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
-- MODEL: GameCategory - game_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_del_by_uuid]

GO

CREATE PROCEDURE usp_game_category_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_del_by_code_by_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_del_by_code_by_org_id]

GO

CREATE PROCEDURE usp_game_category_del_by_code_by_org_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_del_by_code_by_org_id_by_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_del_by_code_by_org_id_by_type_id]

GO

CREATE PROCEDURE usp_game_category_del_by_code_by_org_id_by_type_id
(
    @code varchar (255) = NULL
    , @org_id uniqueidentifier 
    , @type_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category]
    WHERE 1=1                        
    AND LOWER([code]) = LOWER(@code)
    AND [org_id] = @org_id
    AND [type_id] = @type_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategory - game_category
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_get]

GO

CREATE PROCEDURE usp_game_category_get
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
    FROM [dbo].[game_category]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_get_by_uuid]

GO

CREATE PROCEDURE usp_game_category_get_by_uuid
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
    FROM [dbo].[game_category]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_get_by_code]

GO

CREATE PROCEDURE usp_game_category_get_by_code
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
    FROM [dbo].[game_category]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_get_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_get_by_name]

GO

CREATE PROCEDURE usp_game_category_get_by_name
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
    FROM [dbo].[game_category]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_get_by_org_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_get_by_org_id]

GO

CREATE PROCEDURE usp_game_category_get_by_org_id
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
    FROM [dbo].[game_category]
    WHERE 1=1
    AND [org_id] = @org_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_get_by_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_get_by_type_id]

GO

CREATE PROCEDURE usp_game_category_get_by_type_id
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
    FROM [dbo].[game_category]
    WHERE 1=1
    AND [type_id] = @type_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_get_by_org_id_by_type_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_get_by_org_id_by_type_id]

GO

CREATE PROCEDURE usp_game_category_get_by_org_id_by_type_id
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
    FROM [dbo].[game_category]
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
-- MODEL: GameCategoryTree - game_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_count]

GO

CREATE PROCEDURE usp_game_category_tree_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_tree]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_count_by_uuid]

GO

CREATE PROCEDURE usp_game_category_tree_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_tree]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_count_by_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_count_by_parent_id]

GO

CREATE PROCEDURE usp_game_category_tree_count_by_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_count_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_count_by_category_id]

GO

CREATE PROCEDURE usp_game_category_tree_count_by_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_tree]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_count_by_parent_id_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_count_by_parent_id_by_category_id]

GO

CREATE PROCEDURE usp_game_category_tree_count_by_parent_id_by_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_browse_by_filter]

GO

CREATE PROCEDURE usp_game_category_tree_browse_by_filter
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

    SET @sql = @sql + ' FROM [dbo].[game_category_tree] WHERE 1=1 '
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
-- MODEL: GameCategoryTree - game_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_set_by_uuid]

GO

CREATE PROCEDURE usp_game_category_tree_set_by_uuid
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
                FROM  [dbo].[game_category_tree]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_category_tree] 
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
                INSERT INTO [dbo].[game_category_tree]
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
-- MODEL: GameCategoryTree - game_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_del_by_uuid]

GO

CREATE PROCEDURE usp_game_category_tree_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category_tree]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_del_by_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_del_by_parent_id]

GO

CREATE PROCEDURE usp_game_category_tree_del_by_parent_id
(
    @parent_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category_tree]
    WHERE 1=1                        
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_del_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_del_by_category_id]

GO

CREATE PROCEDURE usp_game_category_tree_del_by_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category_tree]
    WHERE 1=1                        
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_del_by_parent_id_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_del_by_parent_id_by_category_id]

GO

CREATE PROCEDURE usp_game_category_tree_del_by_parent_id_by_category_id
(
    @parent_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category_tree]
    WHERE 1=1                        
    AND [parent_id] = @parent_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategoryTree - game_category_tree
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_get]

GO

CREATE PROCEDURE usp_game_category_tree_get
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
    FROM [dbo].[game_category_tree]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_get_by_uuid]

GO

CREATE PROCEDURE usp_game_category_tree_get_by_uuid
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
    FROM [dbo].[game_category_tree]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_get_by_parent_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_get_by_parent_id]

GO

CREATE PROCEDURE usp_game_category_tree_get_by_parent_id
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
    FROM [dbo].[game_category_tree]
    WHERE 1=1
    AND [parent_id] = @parent_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_get_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_get_by_category_id]

GO

CREATE PROCEDURE usp_game_category_tree_get_by_category_id
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
    FROM [dbo].[game_category_tree]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_tree_get_by_parent_id_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_tree_get_by_parent_id_by_category_id]

GO

CREATE PROCEDURE usp_game_category_tree_get_by_parent_id_by_category_id
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
    FROM [dbo].[game_category_tree]
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
-- MODEL: GameCategoryAssoc - game_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_count]

GO

CREATE PROCEDURE usp_game_category_assoc_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_count_by_uuid]

GO

CREATE PROCEDURE usp_game_category_assoc_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_count_by_game_id]

GO

CREATE PROCEDURE usp_game_category_assoc_count_by_game_id
(
    @game_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_count_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_count_by_category_id]

GO

CREATE PROCEDURE usp_game_category_assoc_count_by_category_id
(
    @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_count_by_game_id_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_count_by_game_id_by_category_id]

GO

CREATE PROCEDURE usp_game_category_assoc_count_by_game_id_by_category_id
(
    @game_id uniqueidentifier 
    , @category_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [category_id] = @category_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_browse_by_filter]

GO

CREATE PROCEDURE usp_game_category_assoc_browse_by_filter
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
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [category_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[game_category_assoc] WHERE 1=1 '
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
-- MODEL: GameCategoryAssoc - game_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_set_by_uuid]

GO

CREATE PROCEDURE usp_game_category_assoc_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @game_id uniqueidentifier 
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
                FROM  [dbo].[game_category_assoc]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_category_assoc] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_category_assoc]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [game_id]
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
                    , @game_id
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
-- MODEL: GameCategoryAssoc - game_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_del_by_uuid]

GO

CREATE PROCEDURE usp_game_category_assoc_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_category_assoc]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameCategoryAssoc - game_category_assoc
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_get]

GO

CREATE PROCEDURE usp_game_category_assoc_get
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [category_id]
        , [type]
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_get_by_uuid]

GO

CREATE PROCEDURE usp_game_category_assoc_get_by_uuid
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
        , [game_id]
        , [category_id]
        , [type]
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_get_by_game_id]

GO

CREATE PROCEDURE usp_game_category_assoc_get_by_game_id
(
    @game_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [category_id]
        , [type]
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_get_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_get_by_category_id]

GO

CREATE PROCEDURE usp_game_category_assoc_get_by_category_id
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
        , [game_id]
        , [category_id]
        , [type]
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_category_assoc_get_by_game_id_by_category_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_category_assoc_get_by_game_id_by_category_id]

GO

CREATE PROCEDURE usp_game_category_assoc_get_by_game_id_by_category_id
(
    @game_id uniqueidentifier 
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
        , [game_id]
        , [category_id]
        , [type]
    FROM [dbo].[game_category_assoc]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [category_id] = @category_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameType - game_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_count]

GO

CREATE PROCEDURE usp_game_type_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_count_by_uuid]

GO

CREATE PROCEDURE usp_game_type_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_count_by_code]

GO

CREATE PROCEDURE usp_game_type_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_count_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_count_by_name]

GO

CREATE PROCEDURE usp_game_type_count_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_type]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameType - game_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_browse_by_filter]

GO

CREATE PROCEDURE usp_game_type_browse_by_filter
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

    SET @sql = @sql + ' FROM [dbo].[game_type] WHERE 1=1 '
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
-- MODEL: GameType - game_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_set_by_uuid]

GO

CREATE PROCEDURE usp_game_type_set_by_uuid
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
                FROM  [dbo].[game_type]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_type] 
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
                INSERT INTO [dbo].[game_type]
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
-- MODEL: GameType - game_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_del_by_uuid]

GO

CREATE PROCEDURE usp_game_type_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_type]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameType - game_type
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_get]

GO

CREATE PROCEDURE usp_game_type_get
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
    FROM [dbo].[game_type]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_get_by_uuid]

GO

CREATE PROCEDURE usp_game_type_get_by_uuid
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
    FROM [dbo].[game_type]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_get_by_code]

GO

CREATE PROCEDURE usp_game_type_get_by_code
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
    FROM [dbo].[game_type]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_type_get_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_type_get_by_name]

GO

CREATE PROCEDURE usp_game_type_get_by_name
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
    FROM [dbo].[game_type]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGame - profile_game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_count]

GO

CREATE PROCEDURE usp_profile_game_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_count_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_count_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_count_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGame - profile_game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_game_browse_by_filter
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
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [game_profile]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [profile_version]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[profile_game] WHERE 1=1 '
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
-- MODEL: ProfileGame - profile_game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @type_id uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_profile ntext = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @profile_version varchar (50) = NULL
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
                FROM  [dbo].[profile_game]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_game] 
                SET
                    [status] = @status
                    , [type_id] = @type_id
                    , [profile_id] = @profile_id
                    , [game_profile] = @game_profile
                    , [active] = @active
                    , [game_id] = @game_id
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [profile_version] = @profile_version
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
                INSERT INTO [dbo].[profile_game]
                (
                    [status]
                    , [type_id]
                    , [profile_id]
                    , [game_profile]
                    , [active]
                    , [game_id]
                    , [uuid]
                    , [date_modified]
                    , [profile_version]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @type_id
                    , @profile_id
                    , @game_profile
                    , @active
                    , @game_id
                    , @uuid
                    , @date_modified
                    , @profile_version
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
-- MODEL: ProfileGame - profile_game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_game]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGame - profile_game
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_get]

GO

CREATE PROCEDURE usp_profile_game_get
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [profile_id]
        , [game_profile]
        , [active]
        , [game_id]
        , [uuid]
        , [date_modified]
        , [profile_version]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [profile_id]
        , [game_profile]
        , [active]
        , [game_id]
        , [uuid]
        , [date_modified]
        , [profile_version]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_get_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [profile_id]
        , [game_profile]
        , [active]
        , [game_id]
        , [uuid]
        , [date_modified]
        , [profile_version]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_get_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_get_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [profile_id]
        , [game_profile]
        , [active]
        , [game_id]
        , [uuid]
        , [date_modified]
        , [profile_version]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [type_id]
        , [profile_id]
        , [game_profile]
        , [active]
        , [game_id]
        , [uuid]
        , [date_modified]
        , [profile_version]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_count]

GO

CREATE PROCEDURE usp_profile_game_network_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_network]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_network_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_count_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_network_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_count_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_network_count_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_network_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_game_network_browse_by_filter
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
    SET @sql = @sql + ', [hash]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [game_network_id]'
    SET @sql = @sql + ', [network_username]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [secret]'
    SET @sql = @sql + ', [token]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[profile_game_network] WHERE 1=1 '
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
-- MODEL: ProfileGameNetwork - profile_game_network
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_network_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @hash varchar (500) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_network_id uniqueidentifier = NULL
    , @network_username varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @secret varchar (500) = NULL
    , @token varchar (500) = NULL
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
                FROM  [dbo].[profile_game_network]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_game_network] 
                SET
                    [status] = @status
                    , [hash] = @hash
                    , [profile_id] = @profile_id
                    , [game_network_id] = @game_network_id
                    , [network_username] = @network_username
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [secret] = @secret
                    , [token] = @token
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
                INSERT INTO [dbo].[profile_game_network]
                (
                    [status]
                    , [hash]
                    , [profile_id]
                    , [game_network_id]
                    , [network_username]
                    , [active]
                    , [game_id]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [secret]
                    , [token]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @hash
                    , @profile_id
                    , @game_network_id
                    , @network_username
                    , @active
                    , @game_id
                    , @data
                    , @uuid
                    , @date_modified
                    , @secret
                    , @token
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
-- MODEL: ProfileGameNetwork - profile_game_network
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_network_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_game_network]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameNetwork - profile_game_network
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_get]

GO

CREATE PROCEDURE usp_profile_game_network_get
AS
BEGIN
    SELECT
        [status]
        , [hash]
        , [profile_id]
        , [game_network_id]
        , [network_username]
        , [active]
        , [game_id]
        , [data]
        , [uuid]
        , [date_modified]
        , [secret]
        , [token]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game_network]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_network_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [hash]
        , [profile_id]
        , [game_network_id]
        , [network_username]
        , [active]
        , [game_id]
        , [data]
        , [uuid]
        , [date_modified]
        , [secret]
        , [token]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_get_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_network_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [hash]
        , [profile_id]
        , [game_network_id]
        , [network_username]
        , [active]
        , [game_id]
        , [data]
        , [uuid]
        , [date_modified]
        , [secret]
        , [token]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_get_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_network_get_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [hash]
        , [profile_id]
        , [game_network_id]
        , [network_username]
        , [active]
        , [game_id]
        , [data]
        , [uuid]
        , [date_modified]
        , [secret]
        , [token]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_network_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_network_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_profile_game_network_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [hash]
        , [profile_id]
        , [game_network_id]
        , [network_username]
        , [active]
        , [game_id]
        , [data]
        , [uuid]
        , [date_modified]
        , [secret]
        , [token]
        , [date_created]
        , [type]
    FROM [dbo].[profile_game_network]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_count]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_count_by_uuid
(
    @uuid uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_count_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_count_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_count_by_profile_id_by_game_id_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_count_by_profile_id_by_game_id_by_code]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_count_by_profile_id_by_game_id_by_code
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @code varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_browse_by_filter
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
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [val]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [otype]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [name]'

    SET @sql = @sql + ' FROM [dbo].[profile_game_data_attribute] WHERE 1=1 '
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
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @code varchar (500) = NULL
    , @uuid uniqueidentifier = NULL
    , @val ntext = NULL
    , @profile_id uniqueidentifier = NULL
    , @otype varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @name varchar (500) = NULL
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
                FROM  [dbo].[profile_game_data_attribute]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_game_data_attribute] 
                SET
                    [code] = @code
                    , [uuid] = @uuid
                    , [val] = @val
                    , [profile_id] = @profile_id
                    , [otype] = @otype
                    , [game_id] = @game_id
                    , [type] = @type
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
                INSERT INTO [dbo].[profile_game_data_attribute]
                (
                    [code]
                    , [uuid]
                    , [val]
                    , [profile_id]
                    , [otype]
                    , [game_id]
                    , [type]
                    , [name]
                )
                VALUES
                (
                    @code
                    , @uuid
                    , @val
                    , @profile_id
                    , @otype
                    , @game_id
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_set_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_set_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_set_by_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @code varchar (500) = NULL
    , @uuid uniqueidentifier = NULL
    , @val ntext = NULL
    , @profile_id uniqueidentifier = NULL
    , @otype varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @name varchar (500) = NULL
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
                FROM  [dbo].[profile_game_data_attribute]  
                WHERE 1=1
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_game_data_attribute] 
                SET
                    [code] = @code
                    , [uuid] = @uuid
                    , [val] = @val
                    , [profile_id] = @profile_id
                    , [otype] = @otype
                    , [game_id] = @game_id
                    , [type] = @type
                    , [name] = @name
                WHERE 1=1
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_game_data_attribute]
                (
                    [code]
                    , [uuid]
                    , [val]
                    , [profile_id]
                    , [otype]
                    , [game_id]
                    , [type]
                    , [name]
                )
                VALUES
                (
                    @code
                    , @uuid
                    , @val
                    , @profile_id
                    , @otype
                    , @game_id
                    , @type
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_set_by_profile_id_by_game_id_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_set_by_profile_id_by_game_id_by_code]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_set_by_profile_id_by_game_id_by_code
(
    @set_type varchar (50) = 'full'                        
    , @code varchar (500) = NULL
    , @uuid uniqueidentifier = NULL
    , @val ntext = NULL
    , @profile_id uniqueidentifier = NULL
    , @otype varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @name varchar (500) = NULL
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
                FROM  [dbo].[profile_game_data_attribute]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND LOWER([code]) = LOWER(@code)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_game_data_attribute] 
                SET
                    [code] = @code
                    , [uuid] = @uuid
                    , [val] = @val
                    , [profile_id] = @profile_id
                    , [otype] = @otype
                    , [game_id] = @game_id
                    , [type] = @type
                    , [name] = @name
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND LOWER([code]) = LOWER(@code)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[profile_game_data_attribute]
                (
                    [code]
                    , [uuid]
                    , [val]
                    , [profile_id]
                    , [otype]
                    , [game_id]
                    , [type]
                    , [name]
                )
                VALUES
                (
                    @code
                    , @uuid
                    , @val
                    , @profile_id
                    , @otype
                    , @game_id
                    , @type
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
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_del_by_uuid
(
    @uuid uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_del_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_del_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_del_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_del_by_profile_id_by_game_id_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_del_by_profile_id_by_game_id_by_code]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_del_by_profile_id_by_game_id_by_code
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @code varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND LOWER([code]) = LOWER(@code)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameDataAttribute - profile_game_data_attribute
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_get_by_uuid
(
    @uuid uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [code]
        , [uuid]
        , [val]
        , [profile_id]
        , [otype]
        , [game_id]
        , [type]
        , [name]
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_get_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_get_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [code]
        , [uuid]
        , [val]
        , [profile_id]
        , [otype]
        , [game_id]
        , [type]
        , [name]
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_data_attribute_get_by_profile_id_by_game_id_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_data_attribute_get_by_profile_id_by_game_id_by_code]

GO

CREATE PROCEDURE usp_profile_game_data_attribute_get_by_profile_id_by_game_id_by_code
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @code varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [code]
        , [uuid]
        , [val]
        , [profile_id]
        , [otype]
        , [game_id]
        , [type]
        , [name]
    FROM [dbo].[profile_game_data_attribute]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameSession - game_session
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_count]

GO

CREATE PROCEDURE usp_game_session_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_session]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_count_by_uuid]

GO

CREATE PROCEDURE usp_game_session_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_count_by_game_id]

GO

CREATE PROCEDURE usp_game_session_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_count_by_profile_id]

GO

CREATE PROCEDURE usp_game_session_count_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_session_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameSession - game_session
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_browse_by_filter]

GO

CREATE PROCEDURE usp_game_session_browse_by_filter
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
    SET @sql = @sql + ', [game_area]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [network_uuid]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [game_level]'
    SET @sql = @sql + ', [profile_network]'
    SET @sql = @sql + ', [profile_device]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [network_external_port]'
    SET @sql = @sql + ', [game_players_connected]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [game_state]'
    SET @sql = @sql + ', [hash]'
    SET @sql = @sql + ', [description]'
    SET @sql = @sql + ', [network_external_ip]'
    SET @sql = @sql + ', [profile_username]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [game_code]'
    SET @sql = @sql + ', [game_player_z]'
    SET @sql = @sql + ', [game_player_x]'
    SET @sql = @sql + ', [game_player_y]'
    SET @sql = @sql + ', [network_port]'
    SET @sql = @sql + ', [game_players_allowed]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [game_type]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [network_ip]'
    SET @sql = @sql + ', [network_use_nat]'

    SET @sql = @sql + ' FROM [dbo].[game_session] WHERE 1=1 '
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
-- MODEL: GameSession - game_session
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_set_by_uuid]

GO

CREATE PROCEDURE usp_game_session_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @game_area varchar (255) = NULL
    , @code varchar (255) = NULL
    , @network_uuid varchar (40) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_level varchar (255) = NULL
    , @profile_network varchar (255) = NULL
    , @profile_device varchar (50) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @network_external_port int = NULL
    , @game_players_connected int = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @game_state varchar (50) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @network_external_ip varchar (40) = NULL
    , @profile_username varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_code varchar (255) = NULL
    , @game_player_z decimal = NULL
    , @game_player_x decimal = NULL
    , @game_player_y decimal = NULL
    , @network_port int = NULL
    , @game_players_allowed int = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @game_type varchar (255) = NULL
    , @date_created DATETIME = GETDATE
    , @network_ip varchar (40) = NULL
    , @network_use_nat bit = 1
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
                FROM  [dbo].[game_session]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_session] 
                SET
                    [game_area] = @game_area
                    , [code] = @code
                    , [network_uuid] = @network_uuid
                    , [profile_id] = @profile_id
                    , [game_level] = @game_level
                    , [profile_network] = @profile_network
                    , [profile_device] = @profile_device
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [network_external_port] = @network_external_port
                    , [game_players_connected] = @game_players_connected
                    , [type] = @type
                    , [status] = @status
                    , [game_state] = @game_state
                    , [hash] = @hash
                    , [description] = @description
                    , [network_external_ip] = @network_external_ip
                    , [profile_username] = @profile_username
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_code] = @game_code
                    , [game_player_z] = @game_player_z
                    , [game_player_x] = @game_player_x
                    , [game_player_y] = @game_player_y
                    , [network_port] = @network_port
                    , [game_players_allowed] = @game_players_allowed
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [game_type] = @game_type
                    , [date_created] = @date_created
                    , [network_ip] = @network_ip
                    , [network_use_nat] = @network_use_nat
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_session]
                (
                    [game_area]
                    , [code]
                    , [network_uuid]
                    , [profile_id]
                    , [game_level]
                    , [profile_network]
                    , [profile_device]
                    , [display_name]
                    , [uuid]
                    , [network_external_port]
                    , [game_players_connected]
                    , [type]
                    , [status]
                    , [game_state]
                    , [hash]
                    , [description]
                    , [network_external_ip]
                    , [profile_username]
                    , [active]
                    , [game_id]
                    , [game_code]
                    , [game_player_z]
                    , [game_player_x]
                    , [game_player_y]
                    , [network_port]
                    , [game_players_allowed]
                    , [name]
                    , [date_modified]
                    , [game_type]
                    , [date_created]
                    , [network_ip]
                    , [network_use_nat]
                )
                VALUES
                (
                    @game_area
                    , @code
                    , @network_uuid
                    , @profile_id
                    , @game_level
                    , @profile_network
                    , @profile_device
                    , @display_name
                    , @uuid
                    , @network_external_port
                    , @game_players_connected
                    , @type
                    , @status
                    , @game_state
                    , @hash
                    , @description
                    , @network_external_ip
                    , @profile_username
                    , @active
                    , @game_id
                    , @game_code
                    , @game_player_z
                    , @game_player_x
                    , @game_player_y
                    , @network_port
                    , @game_players_allowed
                    , @name
                    , @date_modified
                    , @game_type
                    , @date_created
                    , @network_ip
                    , @network_use_nat
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
-- MODEL: GameSession - game_session
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_del_by_uuid]

GO

CREATE PROCEDURE usp_game_session_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_session]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameSession - game_session
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_get]

GO

CREATE PROCEDURE usp_game_session_get
AS
BEGIN
    SELECT
        [game_area]
        , [code]
        , [network_uuid]
        , [profile_id]
        , [game_level]
        , [profile_network]
        , [profile_device]
        , [display_name]
        , [uuid]
        , [network_external_port]
        , [game_players_connected]
        , [type]
        , [status]
        , [game_state]
        , [hash]
        , [description]
        , [network_external_ip]
        , [profile_username]
        , [active]
        , [game_id]
        , [game_code]
        , [game_player_z]
        , [game_player_x]
        , [game_player_y]
        , [network_port]
        , [game_players_allowed]
        , [name]
        , [date_modified]
        , [game_type]
        , [date_created]
        , [network_ip]
        , [network_use_nat]
    FROM [dbo].[game_session]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_get_by_uuid]

GO

CREATE PROCEDURE usp_game_session_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [game_area]
        , [code]
        , [network_uuid]
        , [profile_id]
        , [game_level]
        , [profile_network]
        , [profile_device]
        , [display_name]
        , [uuid]
        , [network_external_port]
        , [game_players_connected]
        , [type]
        , [status]
        , [game_state]
        , [hash]
        , [description]
        , [network_external_ip]
        , [profile_username]
        , [active]
        , [game_id]
        , [game_code]
        , [game_player_z]
        , [game_player_x]
        , [game_player_y]
        , [network_port]
        , [game_players_allowed]
        , [name]
        , [date_modified]
        , [game_type]
        , [date_created]
        , [network_ip]
        , [network_use_nat]
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_get_by_game_id]

GO

CREATE PROCEDURE usp_game_session_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [game_area]
        , [code]
        , [network_uuid]
        , [profile_id]
        , [game_level]
        , [profile_network]
        , [profile_device]
        , [display_name]
        , [uuid]
        , [network_external_port]
        , [game_players_connected]
        , [type]
        , [status]
        , [game_state]
        , [hash]
        , [description]
        , [network_external_ip]
        , [profile_username]
        , [active]
        , [game_id]
        , [game_code]
        , [game_player_z]
        , [game_player_x]
        , [game_player_y]
        , [network_port]
        , [game_players_allowed]
        , [name]
        , [date_modified]
        , [game_type]
        , [date_created]
        , [network_ip]
        , [network_use_nat]
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_get_by_profile_id]

GO

CREATE PROCEDURE usp_game_session_get_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [game_area]
        , [code]
        , [network_uuid]
        , [profile_id]
        , [game_level]
        , [profile_network]
        , [profile_device]
        , [display_name]
        , [uuid]
        , [network_external_port]
        , [game_players_connected]
        , [type]
        , [status]
        , [game_state]
        , [hash]
        , [description]
        , [network_external_ip]
        , [profile_username]
        , [active]
        , [game_id]
        , [game_code]
        , [game_player_z]
        , [game_player_x]
        , [game_player_y]
        , [network_port]
        , [game_players_allowed]
        , [name]
        , [date_modified]
        , [game_type]
        , [date_created]
        , [network_ip]
        , [network_use_nat]
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_session_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [game_area]
        , [code]
        , [network_uuid]
        , [profile_id]
        , [game_level]
        , [profile_network]
        , [profile_device]
        , [display_name]
        , [uuid]
        , [network_external_port]
        , [game_players_connected]
        , [type]
        , [status]
        , [game_state]
        , [hash]
        , [description]
        , [network_external_ip]
        , [profile_username]
        , [active]
        , [game_id]
        , [game_code]
        , [game_player_z]
        , [game_player_x]
        , [game_player_y]
        , [network_port]
        , [game_players_allowed]
        , [name]
        , [date_modified]
        , [game_type]
        , [date_created]
        , [network_ip]
        , [network_use_nat]
    FROM [dbo].[game_session]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_data_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_data_count]

GO

CREATE PROCEDURE usp_game_session_data_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_session_data]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_data_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_data_count_by_uuid]

GO

CREATE PROCEDURE usp_game_session_data_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_session_data]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_data_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_data_browse_by_filter]

GO

CREATE PROCEDURE usp_game_session_data_browse_by_filter
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
    SET @sql = @sql + ', [data_results]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [data_layer_projectile]'
    SET @sql = @sql + ', [data_layer_actors]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [data_layer_enemy]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_session_data] WHERE 1=1 '
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
-- MODEL: GameSessionData - game_session_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_data_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_data_set_by_uuid]

GO

CREATE PROCEDURE usp_game_session_data_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data_results ntext = NULL
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @data_layer_projectile ntext = NULL
    , @data_layer_actors ntext = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @data_layer_enemy ntext = NULL
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
                FROM  [dbo].[game_session_data]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_session_data] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data_results] = @data_results
                    , [data] = @data
                    , [uuid] = @uuid
                    , [data_layer_projectile] = @data_layer_projectile
                    , [data_layer_actors] = @data_layer_actors
                    , [active] = @active
                    , [date_created] = @date_created
                    , [data_layer_enemy] = @data_layer_enemy
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
                INSERT INTO [dbo].[game_session_data]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data_results]
                    , [data]
                    , [uuid]
                    , [data_layer_projectile]
                    , [data_layer_actors]
                    , [active]
                    , [date_created]
                    , [data_layer_enemy]
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
                    , @data_results
                    , @data
                    , @uuid
                    , @data_layer_projectile
                    , @data_layer_actors
                    , @active
                    , @date_created
                    , @data_layer_enemy
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
-- MODEL: GameSessionData - game_session_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_data_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_data_del_by_uuid]

GO

CREATE PROCEDURE usp_game_session_data_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_session_data]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameSessionData - game_session_data
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_data_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_data_get]

GO

CREATE PROCEDURE usp_game_session_data_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data_results]
        , [data]
        , [uuid]
        , [data_layer_projectile]
        , [data_layer_actors]
        , [active]
        , [date_created]
        , [data_layer_enemy]
        , [type]
        , [description]
    FROM [dbo].[game_session_data]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_session_data_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_session_data_get_by_uuid]

GO

CREATE PROCEDURE usp_game_session_data_get_by_uuid
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
        , [data_results]
        , [data]
        , [uuid]
        , [data_layer_projectile]
        , [data_layer_actors]
        , [active]
        , [date_created]
        , [data_layer_enemy]
        , [type]
        , [description]
    FROM [dbo].[game_session_data]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameContent - game_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_count]

GO

CREATE PROCEDURE usp_game_content_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_content]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_count_by_uuid]

GO

CREATE PROCEDURE usp_game_content_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_count_by_game_id]

GO

CREATE PROCEDURE usp_game_content_count_by_game_id
(
    @game_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_count_by_game_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_count_by_game_id_by_path]

GO

CREATE PROCEDURE usp_game_content_count_by_game_id_by_path
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_count_by_game_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_count_by_game_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_content_count_by_game_id_by_path_by_version
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_count_by_game_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_count_by_game_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_content_count_by_game_id_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameContent - game_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_browse_by_filter]

GO

CREATE PROCEDURE usp_game_content_browse_by_filter
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
    SET @sql = @sql + ', [extension]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [filename]'
    SET @sql = @sql + ', [source]'
    SET @sql = @sql + ', [version]'
    SET @sql = @sql + ', [platform]'
    SET @sql = @sql + ', [content_type]'
    SET @sql = @sql + ', [path]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [increment]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [hash]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_content] WHERE 1=1 '
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
-- MODEL: GameContent - game_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_set_by_uuid]

GO

CREATE PROCEDURE usp_game_content_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @game_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @path varchar (500) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @increment int = NULL
    , @type varchar (500) = NULL
    , @hash varchar (255) = NULL
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
                FROM  [dbo].[game_content]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_content] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [game_id] = @game_id
                    , [uuid] = @uuid
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [platform] = @platform
                    , [content_type] = @content_type
                    , [path] = @path
                    , [active] = @active
                    , [date_created] = @date_created
                    , [increment] = @increment
                    , [type] = @type
                    , [hash] = @hash
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
                INSERT INTO [dbo].[game_content]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [data]
                    , [game_id]
                    , [uuid]
                    , [filename]
                    , [source]
                    , [version]
                    , [platform]
                    , [content_type]
                    , [path]
                    , [active]
                    , [date_created]
                    , [increment]
                    , [type]
                    , [hash]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @extension
                    , @date_modified
                    , @data
                    , @game_id
                    , @uuid
                    , @filename
                    , @source
                    , @version
                    , @platform
                    , @content_type
                    , @path
                    , @active
                    , @date_created
                    , @increment
                    , @type
                    , @hash
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_set_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_set_by_game_id]

GO

CREATE PROCEDURE usp_game_content_set_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @game_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @path varchar (500) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @increment int = NULL
    , @type varchar (500) = NULL
    , @hash varchar (255) = NULL
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
                FROM  [dbo].[game_content]  
                WHERE 1=1
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_content] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [game_id] = @game_id
                    , [uuid] = @uuid
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [platform] = @platform
                    , [content_type] = @content_type
                    , [path] = @path
                    , [active] = @active
                    , [date_created] = @date_created
                    , [increment] = @increment
                    , [type] = @type
                    , [hash] = @hash
                    , [description] = @description
                WHERE 1=1
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_content]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [data]
                    , [game_id]
                    , [uuid]
                    , [filename]
                    , [source]
                    , [version]
                    , [platform]
                    , [content_type]
                    , [path]
                    , [active]
                    , [date_created]
                    , [increment]
                    , [type]
                    , [hash]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @extension
                    , @date_modified
                    , @data
                    , @game_id
                    , @uuid
                    , @filename
                    , @source
                    , @version
                    , @platform
                    , @content_type
                    , @path
                    , @active
                    , @date_created
                    , @increment
                    , @type
                    , @hash
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_set_by_game_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_set_by_game_id_by_path]

GO

CREATE PROCEDURE usp_game_content_set_by_game_id_by_path
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @game_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @path varchar (500) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @increment int = NULL
    , @type varchar (500) = NULL
    , @hash varchar (255) = NULL
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
                FROM  [dbo].[game_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([path]) = LOWER(@path)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_content] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [game_id] = @game_id
                    , [uuid] = @uuid
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [platform] = @platform
                    , [content_type] = @content_type
                    , [path] = @path
                    , [active] = @active
                    , [date_created] = @date_created
                    , [increment] = @increment
                    , [type] = @type
                    , [hash] = @hash
                    , [description] = @description
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([path]) = LOWER(@path)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_content]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [data]
                    , [game_id]
                    , [uuid]
                    , [filename]
                    , [source]
                    , [version]
                    , [platform]
                    , [content_type]
                    , [path]
                    , [active]
                    , [date_created]
                    , [increment]
                    , [type]
                    , [hash]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @extension
                    , @date_modified
                    , @data
                    , @game_id
                    , @uuid
                    , @filename
                    , @source
                    , @version
                    , @platform
                    , @content_type
                    , @path
                    , @active
                    , @date_created
                    , @increment
                    , @type
                    , @hash
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_set_by_game_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_set_by_game_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_content_set_by_game_id_by_path_by_version
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @game_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @path varchar (500) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @increment int = NULL
    , @type varchar (500) = NULL
    , @hash varchar (255) = NULL
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
                FROM  [dbo].[game_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_content] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [game_id] = @game_id
                    , [uuid] = @uuid
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [platform] = @platform
                    , [content_type] = @content_type
                    , [path] = @path
                    , [active] = @active
                    , [date_created] = @date_created
                    , [increment] = @increment
                    , [type] = @type
                    , [hash] = @hash
                    , [description] = @description
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_content]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [data]
                    , [game_id]
                    , [uuid]
                    , [filename]
                    , [source]
                    , [version]
                    , [platform]
                    , [content_type]
                    , [path]
                    , [active]
                    , [date_created]
                    , [increment]
                    , [type]
                    , [hash]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @extension
                    , @date_modified
                    , @data
                    , @game_id
                    , @uuid
                    , @filename
                    , @source
                    , @version
                    , @platform
                    , @content_type
                    , @path
                    , @active
                    , @date_created
                    , @increment
                    , @type
                    , @hash
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_set_by_game_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_set_by_game_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_content_set_by_game_id_by_path_by_version_by_platform_by_increment
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @game_id uniqueidentifier 
    , @uuid uniqueidentifier 
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @path varchar (500) = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @increment int = NULL
    , @type varchar (500) = NULL
    , @hash varchar (255) = NULL
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
                FROM  [dbo].[game_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                AND LOWER([platform]) = LOWER(@platform)
                AND [increment] = @increment
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_content] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [game_id] = @game_id
                    , [uuid] = @uuid
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [platform] = @platform
                    , [content_type] = @content_type
                    , [path] = @path
                    , [active] = @active
                    , [date_created] = @date_created
                    , [increment] = @increment
                    , [type] = @type
                    , [hash] = @hash
                    , [description] = @description
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                AND LOWER([platform]) = LOWER(@platform)
                AND [increment] = @increment
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_content]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [data]
                    , [game_id]
                    , [uuid]
                    , [filename]
                    , [source]
                    , [version]
                    , [platform]
                    , [content_type]
                    , [path]
                    , [active]
                    , [date_created]
                    , [increment]
                    , [type]
                    , [hash]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @code
                    , @display_name
                    , @name
                    , @extension
                    , @date_modified
                    , @data
                    , @game_id
                    , @uuid
                    , @filename
                    , @source
                    , @version
                    , @platform
                    , @content_type
                    , @path
                    , @active
                    , @date_created
                    , @increment
                    , @type
                    , @hash
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
-- MODEL: GameContent - game_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_del_by_uuid]

GO

CREATE PROCEDURE usp_game_content_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_content]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_del_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_del_by_game_id]

GO

CREATE PROCEDURE usp_game_content_del_by_game_id
(
    @game_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_del_by_game_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_del_by_game_id_by_path]

GO

CREATE PROCEDURE usp_game_content_del_by_game_id_by_path
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_del_by_game_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_del_by_game_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_content_del_by_game_id_by_path_by_version
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_del_by_game_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_del_by_game_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_content_del_by_game_id_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameContent - game_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_get]

GO

CREATE PROCEDURE usp_game_content_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [extension]
        , [date_modified]
        , [data]
        , [game_id]
        , [uuid]
        , [filename]
        , [source]
        , [version]
        , [platform]
        , [content_type]
        , [path]
        , [active]
        , [date_created]
        , [increment]
        , [type]
        , [hash]
        , [description]
    FROM [dbo].[game_content]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_get_by_uuid]

GO

CREATE PROCEDURE usp_game_content_get_by_uuid
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
        , [extension]
        , [date_modified]
        , [data]
        , [game_id]
        , [uuid]
        , [filename]
        , [source]
        , [version]
        , [platform]
        , [content_type]
        , [path]
        , [active]
        , [date_created]
        , [increment]
        , [type]
        , [hash]
        , [description]
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_get_by_game_id]

GO

CREATE PROCEDURE usp_game_content_get_by_game_id
(
    @game_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [extension]
        , [date_modified]
        , [data]
        , [game_id]
        , [uuid]
        , [filename]
        , [source]
        , [version]
        , [platform]
        , [content_type]
        , [path]
        , [active]
        , [date_created]
        , [increment]
        , [type]
        , [hash]
        , [description]
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_get_by_game_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_get_by_game_id_by_path]

GO

CREATE PROCEDURE usp_game_content_get_by_game_id_by_path
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [extension]
        , [date_modified]
        , [data]
        , [game_id]
        , [uuid]
        , [filename]
        , [source]
        , [version]
        , [platform]
        , [content_type]
        , [path]
        , [active]
        , [date_created]
        , [increment]
        , [type]
        , [hash]
        , [description]
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_get_by_game_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_get_by_game_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_content_get_by_game_id_by_path_by_version
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [extension]
        , [date_modified]
        , [data]
        , [game_id]
        , [uuid]
        , [filename]
        , [source]
        , [version]
        , [platform]
        , [content_type]
        , [path]
        , [active]
        , [date_created]
        , [increment]
        , [type]
        , [hash]
        , [description]
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_content_get_by_game_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_content_get_by_game_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_content_get_by_game_id_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [extension]
        , [date_modified]
        , [data]
        , [game_id]
        , [uuid]
        , [filename]
        , [source]
        , [version]
        , [platform]
        , [content_type]
        , [path]
        , [active]
        , [date_created]
        , [increment]
        , [type]
        , [hash]
        , [description]
    FROM [dbo].[game_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count]

GO

CREATE PROCEDURE usp_game_profile_content_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_profile_id]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_profile_id
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_username
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_username
(
    @username varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_profile_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_profile_id_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_profile_id_by_path
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_username_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_username_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_username_by_path
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_username_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_username_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_username_by_path_by_version
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_count_by_game_id_by_username_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_count_by_game_id_by_username_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_count_by_game_id_by_username_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_browse_by_filter]

GO

CREATE PROCEDURE usp_game_profile_content_browse_by_filter
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
    SET @sql = @sql + ', [username]'
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [increment]'
    SET @sql = @sql + ', [path]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [platform]'
    SET @sql = @sql + ', [filename]'
    SET @sql = @sql + ', [source]'
    SET @sql = @sql + ', [version]'
    SET @sql = @sql + ', [game_network]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [status]'
    SET @sql = @sql + ', [hash]'
    SET @sql = @sql + ', [description]'
    SET @sql = @sql + ', [content_type]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [extension]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [date_created]'

    SET @sql = @sql + ' FROM [dbo].[game_profile_content] WHERE 1=1 '
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
-- MODEL: GameProfileContent - game_profile_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_profile_id]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_username
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_username
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND LOWER([username]) = LOWER(@username)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND LOWER([username]) = LOWER(@username)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_profile_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_profile_id_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_profile_id_by_path
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
                AND LOWER([path]) = LOWER(@path)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
                AND LOWER([path]) = LOWER(@path)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                AND LOWER([platform]) = LOWER(@platform)
                AND [increment] = @increment
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND [profile_id] = @profile_id
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                AND LOWER([platform]) = LOWER(@platform)
                AND [increment] = @increment
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_username_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_username_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_username_by_path
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
                AND LOWER([path]) = LOWER(@path)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
                AND LOWER([path]) = LOWER(@path)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_username_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_username_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_username_by_path_by_version
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_set_by_game_id_by_username_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_set_by_game_id_by_username_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_set_by_game_id_by_username_by_path_by_version_by_platform_by_increment
(
    @set_type varchar (50) = 'full'                        
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @profile_id uniqueidentifier 
    , @increment int = NULL
    , @path varchar (500) = NULL
    , @display_name varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @platform varchar (255) = NULL
    , @filename varchar (500) = NULL
    , @source varchar (255) = NULL
    , @version varchar (255) = NULL
    , @game_network varchar (500) = NULL
    , @type varchar (500) = NULL
    , @status varchar (255) = NULL
    , @hash varchar (255) = NULL
    , @description varchar (255) = NULL
    , @content_type varchar (255) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier 
    , @data ntext = NULL
    , @name varchar (255) = NULL
    , @extension varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @date_created DATETIME = GETDATE
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
                FROM  [dbo].[game_profile_content]  
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                AND LOWER([platform]) = LOWER(@platform)
                AND [increment] = @increment
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_content] 
                SET
                    [username] = @username
                    , [code] = @code
                    , [profile_id] = @profile_id
                    , [increment] = @increment
                    , [path] = @path
                    , [display_name] = @display_name
                    , [uuid] = @uuid
                    , [platform] = @platform
                    , [filename] = @filename
                    , [source] = @source
                    , [version] = @version
                    , [game_network] = @game_network
                    , [type] = @type
                    , [status] = @status
                    , [hash] = @hash
                    , [description] = @description
                    , [content_type] = @content_type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [name] = @name
                    , [extension] = @extension
                    , [date_modified] = @date_modified
                    , [date_created] = @date_created
                WHERE 1=1
                AND [game_id] = @game_id
                AND LOWER([username]) = LOWER(@username)
                AND LOWER([path]) = LOWER(@path)
                AND LOWER([version]) = LOWER(@version)
                AND LOWER([platform]) = LOWER(@platform)
                AND [increment] = @increment
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_content]
                (
                    [username]
                    , [code]
                    , [profile_id]
                    , [increment]
                    , [path]
                    , [display_name]
                    , [uuid]
                    , [platform]
                    , [filename]
                    , [source]
                    , [version]
                    , [game_network]
                    , [type]
                    , [status]
                    , [hash]
                    , [description]
                    , [content_type]
                    , [active]
                    , [game_id]
                    , [data]
                    , [name]
                    , [extension]
                    , [date_modified]
                    , [date_created]
                )
                VALUES
                (
                    @username
                    , @code
                    , @profile_id
                    , @increment
                    , @path
                    , @display_name
                    , @uuid
                    , @platform
                    , @filename
                    , @source
                    , @version
                    , @game_network
                    , @type
                    , @status
                    , @hash
                    , @description
                    , @content_type
                    , @active
                    , @game_id
                    , @data
                    , @name
                    , @extension
                    , @date_modified
                    , @date_created
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
-- MODEL: GameProfileContent - game_profile_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_profile_id]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_profile_id
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_username
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_username
(
    @username varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_profile_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_profile_id_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_profile_id_by_path
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_username_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_username_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_username_by_path
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_username_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_username_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_username_by_path_by_version
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_del_by_game_id_by_username_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_del_by_game_id_by_username_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_del_by_game_id_by_username_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_content]
    WHERE 1=1                        
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileContent - game_profile_content
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get]

GO

CREATE PROCEDURE usp_game_profile_content_get
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_profile_id]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_profile_id
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_username
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_username]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_username
(
    @username varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_profile_id_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_profile_id_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_profile_id_by_path
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @profile_id uniqueidentifier 
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [profile_id] = @profile_id
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_username_by_path]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_username_by_path]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_username_by_path
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_username_by_path_by_version]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_username_by_path_by_version]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_username_by_path_by_version
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_content_get_by_game_id_by_username_by_path_by_version_by_platform_by_increment]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_content_get_by_game_id_by_username_by_path_by_version_by_platform_by_increment]

GO

CREATE PROCEDURE usp_game_profile_content_get_by_game_id_by_username_by_path_by_version_by_platform_by_increment
(
    @game_id uniqueidentifier 
    , @username varchar (500) = NULL
    , @path varchar (500) = NULL
    , @version varchar (255) = NULL
    , @platform varchar (255) = NULL
    , @increment int = NULL
)
AS
BEGIN
    SELECT
        [username]
        , [code]
        , [profile_id]
        , [increment]
        , [path]
        , [display_name]
        , [uuid]
        , [platform]
        , [filename]
        , [source]
        , [version]
        , [game_network]
        , [type]
        , [status]
        , [hash]
        , [description]
        , [content_type]
        , [active]
        , [game_id]
        , [data]
        , [name]
        , [extension]
        , [date_modified]
        , [date_created]
    FROM [dbo].[game_profile_content]
    WHERE 1=1
    AND [game_id] = @game_id
    AND LOWER([username]) = LOWER(@username)
    AND LOWER([path]) = LOWER(@path)
    AND LOWER([version]) = LOWER(@version)
    AND LOWER([platform]) = LOWER(@platform)
    AND [increment] = @increment
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameApp - game_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_count]

GO

CREATE PROCEDURE usp_game_app_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_count_by_uuid]

GO

CREATE PROCEDURE usp_game_app_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_count_by_game_id]

GO

CREATE PROCEDURE usp_game_app_count_by_game_id
(
    @game_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_count_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_count_by_app_id]

GO

CREATE PROCEDURE usp_game_app_count_by_app_id
(
    @app_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_count_by_game_id_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_count_by_game_id_by_app_id]

GO

CREATE PROCEDURE usp_game_app_count_by_game_id_by_app_id
(
    @game_id uniqueidentifier 
    , @app_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [app_id] = @app_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameApp - game_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_browse_by_filter]

GO

CREATE PROCEDURE usp_game_app_browse_by_filter
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
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [app_id]'

    SET @sql = @sql + ' FROM [dbo].[game_app] WHERE 1=1 '
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
-- MODEL: GameApp - game_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_set_by_uuid]

GO

CREATE PROCEDURE usp_game_app_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @game_id uniqueidentifier 
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
                FROM  [dbo].[game_app]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_app] 
                SET
                    [status] = @status
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_app]
                (
                    [status]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [game_id]
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
                    , @game_id
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
-- MODEL: GameApp - game_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_del_by_uuid]

GO

CREATE PROCEDURE usp_game_app_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_app]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameApp - game_app
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_get]

GO

CREATE PROCEDURE usp_game_app_get
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [type]
        , [app_id]
    FROM [dbo].[game_app]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_get_by_uuid]

GO

CREATE PROCEDURE usp_game_app_get_by_uuid
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
        , [game_id]
        , [type]
        , [app_id]
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_get_by_game_id]

GO

CREATE PROCEDURE usp_game_app_get_by_game_id
(
    @game_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [type]
        , [app_id]
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_get_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_get_by_app_id]

GO

CREATE PROCEDURE usp_game_app_get_by_app_id
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
        , [game_id]
        , [type]
        , [app_id]
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_app_get_by_game_id_by_app_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_app_get_by_game_id_by_app_id]

GO

CREATE PROCEDURE usp_game_app_get_by_game_id_by_app_id
(
    @game_id uniqueidentifier 
    , @app_id uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [type]
        , [app_id]
    FROM [dbo].[game_app]
    WHERE 1=1
    AND [game_id] = @game_id
    AND [app_id] = @app_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_count]

GO

CREATE PROCEDURE usp_profile_game_location_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_count_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_location_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_count_by_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_count_by_game_location_id]

GO

CREATE PROCEDURE usp_profile_game_location_count_by_game_location_id
(
    @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [game_location_id] = @game_location_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_count_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_count_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_location_count_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_count_by_profile_id_by_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_count_by_profile_id_by_game_location_id]

GO

CREATE PROCEDURE usp_profile_game_location_count_by_profile_id_by_game_location_id
(
    @profile_id uniqueidentifier = NULL
    , @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_location_id] = @game_location_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_browse_by_filter]

GO

CREATE PROCEDURE usp_profile_game_location_browse_by_filter
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
    SET @sql = @sql + ', [type_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[profile_game_location] WHERE 1=1 '
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
-- MODEL: ProfileGameLocation - profile_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_set_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_location_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @game_location_id uniqueidentifier = NULL
    , @type_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @profile_id uniqueidentifier = NULL
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
                FROM  [dbo].[profile_game_location]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[profile_game_location] 
                SET
                    [status] = @status
                    , [game_location_id] = @game_location_id
                    , [type_id] = @type_id
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
                INSERT INTO [dbo].[profile_game_location]
                (
                    [status]
                    , [game_location_id]
                    , [type_id]
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
                    , @game_location_id
                    , @type_id
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
-- MODEL: ProfileGameLocation - profile_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_del_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_location_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[profile_game_location]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: ProfileGameLocation - profile_game_location
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_get]

GO

CREATE PROCEDURE usp_profile_game_location_get
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_game_location]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_get_by_uuid]

GO

CREATE PROCEDURE usp_profile_game_location_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_get_by_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_get_by_game_location_id]

GO

CREATE PROCEDURE usp_profile_game_location_get_by_game_location_id
(
    @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [game_location_id] = @game_location_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_get_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_get_by_profile_id]

GO

CREATE PROCEDURE usp_profile_game_location_get_by_profile_id
(
    @profile_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [profile_id] = @profile_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_profile_game_location_get_by_profile_id_by_game_location_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_profile_game_location_get_by_profile_id_by_game_location_id]

GO

CREATE PROCEDURE usp_profile_game_location_get_by_profile_id_by_game_location_id
(
    @profile_id uniqueidentifier = NULL
    , @game_location_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [game_location_id]
        , [type_id]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [profile_id]
        , [type]
    FROM [dbo].[profile_game_location]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_location_id] = @game_location_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GamePhoto - game_photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_count]

GO

CREATE PROCEDURE usp_game_photo_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_photo]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_count_by_uuid]

GO

CREATE PROCEDURE usp_game_photo_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_count_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_count_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_count_by_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_count_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_count_by_url]

GO

CREATE PROCEDURE usp_game_photo_count_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_count_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_count_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_count_by_url_by_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_count_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_count_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_count_by_uuid_by_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GamePhoto - game_photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_browse_by_filter]

GO

CREATE PROCEDURE usp_game_photo_browse_by_filter
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

    SET @sql = @sql + ' FROM [dbo].[game_photo] WHERE 1=1 '
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
-- MODEL: GamePhoto - game_photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_set_by_uuid]

GO

CREATE PROCEDURE usp_game_photo_set_by_uuid
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
                FROM  [dbo].[game_photo]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_photo] 
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
                INSERT INTO [dbo].[game_photo]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_set_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_set_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_set_by_external_id
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
                FROM  [dbo].[game_photo]  
                WHERE 1=1
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_photo] 
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
                INSERT INTO [dbo].[game_photo]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_set_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_set_by_url]

GO

CREATE PROCEDURE usp_game_photo_set_by_url
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
                FROM  [dbo].[game_photo]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_photo] 
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
                INSERT INTO [dbo].[game_photo]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_set_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_set_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_set_by_url_by_external_id
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
                FROM  [dbo].[game_photo]  
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
                UPDATE [dbo].[game_photo] 
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
                INSERT INTO [dbo].[game_photo]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_set_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_set_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_set_by_uuid_by_external_id
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
                FROM  [dbo].[game_photo]  
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
                UPDATE [dbo].[game_photo] 
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
                INSERT INTO [dbo].[game_photo]
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
-- MODEL: GamePhoto - game_photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_del_by_uuid]

GO

CREATE PROCEDURE usp_game_photo_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_photo]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_del_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_del_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_del_by_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_photo]
    WHERE 1=1                        
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_del_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_del_by_url]

GO

CREATE PROCEDURE usp_game_photo_del_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_photo]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_del_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_del_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_del_by_url_by_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_photo]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_del_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_del_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_del_by_uuid_by_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_photo]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GamePhoto - game_photo
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_get]

GO

CREATE PROCEDURE usp_game_photo_get
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
    FROM [dbo].[game_photo]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_get_by_uuid]

GO

CREATE PROCEDURE usp_game_photo_get_by_uuid
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
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_get_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_get_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_get_by_external_id
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
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_get_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_get_by_url]

GO

CREATE PROCEDURE usp_game_photo_get_by_url
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
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_get_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_get_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_get_by_url_by_external_id
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
    FROM [dbo].[game_photo]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_photo_get_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_photo_get_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_photo_get_by_uuid_by_external_id
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
    FROM [dbo].[game_photo]
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
-- MODEL: GameVideo - game_video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_count]

GO

CREATE PROCEDURE usp_game_video_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_video]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_count_by_uuid]

GO

CREATE PROCEDURE usp_game_video_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_video]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_count_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_count_by_external_id]

GO

CREATE PROCEDURE usp_game_video_count_by_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_video]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_count_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_count_by_url]

GO

CREATE PROCEDURE usp_game_video_count_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_count_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_count_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_video_count_by_url_by_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_count_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_count_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_video_count_by_uuid_by_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_video]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameVideo - game_video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_browse_by_filter]

GO

CREATE PROCEDURE usp_game_video_browse_by_filter
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

    SET @sql = @sql + ' FROM [dbo].[game_video] WHERE 1=1 '
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
-- MODEL: GameVideo - game_video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_set_by_uuid]

GO

CREATE PROCEDURE usp_game_video_set_by_uuid
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
                FROM  [dbo].[game_video]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_video] 
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
                INSERT INTO [dbo].[game_video]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_set_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_set_by_external_id]

GO

CREATE PROCEDURE usp_game_video_set_by_external_id
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
                FROM  [dbo].[game_video]  
                WHERE 1=1
                AND [external_id] = @external_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_video] 
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
                INSERT INTO [dbo].[game_video]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_set_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_set_by_url]

GO

CREATE PROCEDURE usp_game_video_set_by_url
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
                FROM  [dbo].[game_video]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_video] 
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
                INSERT INTO [dbo].[game_video]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_set_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_set_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_video_set_by_url_by_external_id
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
                FROM  [dbo].[game_video]  
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
                UPDATE [dbo].[game_video] 
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
                INSERT INTO [dbo].[game_video]
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_set_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_set_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_video_set_by_uuid_by_external_id
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
                FROM  [dbo].[game_video]  
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
                UPDATE [dbo].[game_video] 
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
                INSERT INTO [dbo].[game_video]
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
-- MODEL: GameVideo - game_video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_del_by_uuid]

GO

CREATE PROCEDURE usp_game_video_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_video]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_del_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_del_by_external_id]

GO

CREATE PROCEDURE usp_game_video_del_by_external_id
(
    @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_video]
    WHERE 1=1                        
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_del_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_del_by_url]

GO

CREATE PROCEDURE usp_game_video_del_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_video]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_del_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_del_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_video_del_by_url_by_external_id
(
    @url varchar (500) = NULL
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_video]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_del_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_del_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_video_del_by_uuid_by_external_id
(
    @uuid uniqueidentifier 
    , @external_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_video]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND [external_id] = @external_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameVideo - game_video
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_get]

GO

CREATE PROCEDURE usp_game_video_get
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
    FROM [dbo].[game_video]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_get_by_uuid]

GO

CREATE PROCEDURE usp_game_video_get_by_uuid
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
    FROM [dbo].[game_video]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_get_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_get_by_external_id]

GO

CREATE PROCEDURE usp_game_video_get_by_external_id
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
    FROM [dbo].[game_video]
    WHERE 1=1
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_get_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_get_by_url]

GO

CREATE PROCEDURE usp_game_video_get_by_url
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
    FROM [dbo].[game_video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_get_by_url_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_get_by_url_by_external_id]

GO

CREATE PROCEDURE usp_game_video_get_by_url_by_external_id
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
    FROM [dbo].[game_video]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [external_id] = @external_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_video_get_by_uuid_by_external_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_video_get_by_uuid_by_external_id]

GO

CREATE PROCEDURE usp_game_video_get_by_uuid_by_external_id
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
    FROM [dbo].[game_video]
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
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_count]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_count_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_count_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_count_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_count_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_count_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_count_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_count_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_count_by_url_by_game_id
(
    @url varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_count_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_count_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_count_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_browse_by_filter]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_browse_by_filter
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
    SET @sql = @sql + ', [description]'
    SET @sql = @sql + ', [game_defense]'
    SET @sql = @sql + ', [third_party_url]'
    SET @sql = @sql + ', [third_party_id]'
    SET @sql = @sql + ', [content_type]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [game_attack]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [url]'
    SET @sql = @sql + ', [third_party_data]'
    SET @sql = @sql + ', [game_price]'
    SET @sql = @sql + ', [game_type]'
    SET @sql = @sql + ', [game_skill]'
    SET @sql = @sql + ', [game_health]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [game_energy]'
    SET @sql = @sql + ', [game_data]'

    SET @sql = @sql + ' FROM [dbo].[game_rpg_item_weapon] WHERE 1=1 '
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
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_set_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_weapon]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_weapon] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_weapon]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_set_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_set_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_set_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_weapon]  
                WHERE 1=1
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_weapon] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_weapon]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_set_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_set_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_set_by_url
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_weapon]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_weapon] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_weapon]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_set_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_set_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_set_by_url_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_weapon]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_weapon] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_weapon]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_set_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_set_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_set_by_uuid_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_weapon]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_weapon] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND [uuid] = @uuid
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_weapon]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
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
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_del_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_del_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_del_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_del_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1                        
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_del_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_del_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_del_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_del_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_del_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_del_by_url_by_game_id
(
    @url varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_del_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_del_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_del_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameRpgItemWeapon - game_rpg_item_weapon
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_get]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_get
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_get_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_get_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_get_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_get_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_get_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_get_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_get_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_get_by_url_by_game_id
(
    @url varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_weapon_get_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_weapon_get_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_weapon_get_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_weapon]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_count]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_count_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_count_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_count_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_count_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_count_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_count_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_count_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_count_by_url_by_game_id
(
    @url varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_count_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_count_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_count_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_browse_by_filter]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_browse_by_filter
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
    SET @sql = @sql + ', [description]'
    SET @sql = @sql + ', [game_defense]'
    SET @sql = @sql + ', [third_party_url]'
    SET @sql = @sql + ', [third_party_id]'
    SET @sql = @sql + ', [content_type]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [game_attack]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [url]'
    SET @sql = @sql + ', [third_party_data]'
    SET @sql = @sql + ', [game_price]'
    SET @sql = @sql + ', [game_type]'
    SET @sql = @sql + ', [game_skill]'
    SET @sql = @sql + ', [game_health]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [game_energy]'
    SET @sql = @sql + ', [game_data]'

    SET @sql = @sql + ' FROM [dbo].[game_rpg_item_skill] WHERE 1=1 '
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
-- MODEL: GameRpgItemSkill - game_rpg_item_skill
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_set_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_skill]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_skill] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_skill]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_set_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_set_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_set_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_skill]  
                WHERE 1=1
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_skill] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_skill]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_set_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_set_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_set_by_url
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_skill]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_skill] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_skill]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_set_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_set_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_set_by_url_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_skill]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_skill] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_skill]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_set_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_set_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_set_by_uuid_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @third_party_oembed varchar (500) = NULL
    , @code varchar (255) = NULL
    , @description varchar (255) = NULL
    , @game_defense decimal = NULL
    , @third_party_url varchar (500) = NULL
    , @third_party_id varchar (500) = NULL
    , @content_type varchar (100) = NULL
    , @type varchar (500) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @game_attack decimal = NULL
    , @uuid uniqueidentifier 
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (500) = NULL
    , @third_party_data varchar (500) = NULL
    , @game_price decimal = NULL
    , @game_type decimal = NULL
    , @game_skill decimal = NULL
    , @game_health decimal = NULL
    , @date_created DATETIME = GETDATE
    , @game_energy decimal = NULL
    , @game_data ntext = NULL
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
                FROM  [dbo].[game_rpg_item_skill]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_rpg_item_skill] 
                SET
                    [status] = @status
                    , [third_party_oembed] = @third_party_oembed
                    , [code] = @code
                    , [description] = @description
                    , [game_defense] = @game_defense
                    , [third_party_url] = @third_party_url
                    , [third_party_id] = @third_party_id
                    , [content_type] = @content_type
                    , [type] = @type
                    , [active] = @active
                    , [game_id] = @game_id
                    , [game_attack] = @game_attack
                    , [uuid] = @uuid
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [third_party_data] = @third_party_data
                    , [game_price] = @game_price
                    , [game_type] = @game_type
                    , [game_skill] = @game_skill
                    , [game_health] = @game_health
                    , [date_created] = @date_created
                    , [game_energy] = @game_energy
                    , [game_data] = @game_data
                WHERE 1=1
                AND [uuid] = @uuid
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_rpg_item_skill]
                (
                    [status]
                    , [third_party_oembed]
                    , [code]
                    , [description]
                    , [game_defense]
                    , [third_party_url]
                    , [third_party_id]
                    , [content_type]
                    , [type]
                    , [active]
                    , [game_id]
                    , [game_attack]
                    , [uuid]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [third_party_data]
                    , [game_price]
                    , [game_type]
                    , [game_skill]
                    , [game_health]
                    , [date_created]
                    , [game_energy]
                    , [game_data]
                )
                VALUES
                (
                    @status
                    , @third_party_oembed
                    , @code
                    , @description
                    , @game_defense
                    , @third_party_url
                    , @third_party_id
                    , @content_type
                    , @type
                    , @active
                    , @game_id
                    , @game_attack
                    , @uuid
                    , @display_name
                    , @name
                    , @date_modified
                    , @url
                    , @third_party_data
                    , @game_price
                    , @game_type
                    , @game_skill
                    , @game_health
                    , @date_created
                    , @game_energy
                    , @game_data
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
-- MODEL: GameRpgItemSkill - game_rpg_item_skill
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_del_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_del_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_del_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_del_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1                        
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_del_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_del_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_del_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_del_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_del_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_del_by_url_by_game_id
(
    @url varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_del_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_del_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_del_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameRpgItemSkill - game_rpg_item_skill
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_get]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_get
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_get_by_uuid]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_get_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_get_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_get_by_url]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_get_by_url
(
    @url varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_get_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_get_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_get_by_url_by_game_id
(
    @url varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_rpg_item_skill_get_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_rpg_item_skill_get_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_rpg_item_skill_get_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [third_party_oembed]
        , [code]
        , [description]
        , [game_defense]
        , [third_party_url]
        , [third_party_id]
        , [content_type]
        , [type]
        , [active]
        , [game_id]
        , [game_attack]
        , [uuid]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [third_party_data]
        , [game_price]
        , [game_type]
        , [game_skill]
        , [game_health]
        , [date_created]
        , [game_energy]
        , [game_data]
    FROM [dbo].[game_rpg_item_skill]
    WHERE 1=1
    AND [uuid] = @uuid
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProduct - game_product
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_count]

GO

CREATE PROCEDURE usp_game_product_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_product]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_count_by_uuid]

GO

CREATE PROCEDURE usp_game_product_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_product]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_count_by_game_id]

GO

CREATE PROCEDURE usp_game_product_count_by_game_id
(
    @game_id varchar (100) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_product]
    WHERE 1=1
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_count_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_count_by_url]

GO

CREATE PROCEDURE usp_game_product_count_by_url
(
    @url varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_product]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_count_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_count_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_product_count_by_url_by_game_id
(
    @url varchar (255) = NULL
    , @game_id varchar (100) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_product]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_count_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_count_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_product_count_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_product]
    WHERE 1=1
    AND [uuid] = @uuid
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProduct - game_product
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_browse_by_filter]

GO

CREATE PROCEDURE usp_game_product_browse_by_filter
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
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_product] WHERE 1=1 '
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
-- MODEL: GameProduct - game_product
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_set_by_uuid]

GO

CREATE PROCEDURE usp_game_product_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
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
                FROM  [dbo].[game_product]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_product] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [uuid] = @uuid
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_product]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [uuid]
                    , [game_id]
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
                    , @uuid
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_set_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_set_by_game_id]

GO

CREATE PROCEDURE usp_game_product_set_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
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
                FROM  [dbo].[game_product]  
                WHERE 1=1
                AND LOWER([game_id]) = LOWER(@game_id)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_product] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [uuid] = @uuid
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND LOWER([game_id]) = LOWER(@game_id)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_product]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [uuid]
                    , [game_id]
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
                    , @uuid
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_set_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_set_by_url]

GO

CREATE PROCEDURE usp_game_product_set_by_url
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
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
                FROM  [dbo].[game_product]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_product] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [uuid] = @uuid
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_product]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [uuid]
                    , [game_id]
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
                    , @uuid
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_set_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_set_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_product_set_by_url_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
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
                FROM  [dbo].[game_product]  
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND LOWER([game_id]) = LOWER(@game_id)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_product] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [uuid] = @uuid
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND LOWER([url]) = LOWER(@url)
                AND LOWER([game_id]) = LOWER(@game_id)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_product]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [uuid]
                    , [game_id]
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
                    , @uuid
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_set_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_set_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_product_set_by_uuid_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @url varchar (255) = NULL
    , @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
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
                FROM  [dbo].[game_product]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND LOWER([game_id]) = LOWER(@game_id)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_product] 
                SET
                    [status] = @status
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [url] = @url
                    , [uuid] = @uuid
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [uuid] = @uuid
                AND LOWER([game_id]) = LOWER(@game_id)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_product]
                (
                    [status]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [url]
                    , [uuid]
                    , [game_id]
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
                    , @uuid
                    , @game_id
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
-- MODEL: GameProduct - game_product
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_del_by_uuid]

GO

CREATE PROCEDURE usp_game_product_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_product]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_del_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_del_by_game_id]

GO

CREATE PROCEDURE usp_game_product_del_by_game_id
(
    @game_id varchar (100) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_product]
    WHERE 1=1                        
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_del_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_del_by_url]

GO

CREATE PROCEDURE usp_game_product_del_by_url
(
    @url varchar (255) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_product]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_del_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_del_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_product_del_by_url_by_game_id
(
    @url varchar (255) = NULL
    , @game_id varchar (100) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_product]
    WHERE 1=1                        
    AND LOWER([url]) = LOWER(@url)
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_del_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_del_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_product_del_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_product]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProduct - game_product
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_get]

GO

CREATE PROCEDURE usp_game_product_get
AS
BEGIN
    SELECT
        [status]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [url]
        , [uuid]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_product]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_get_by_uuid]

GO

CREATE PROCEDURE usp_game_product_get_by_uuid
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
        , [uuid]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_product]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_get_by_game_id]

GO

CREATE PROCEDURE usp_game_product_get_by_game_id
(
    @game_id varchar (100) = NULL
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
        , [uuid]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_product]
    WHERE 1=1
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_get_by_url]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_get_by_url]

GO

CREATE PROCEDURE usp_game_product_get_by_url
(
    @url varchar (255) = NULL
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
        , [uuid]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_product]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_get_by_url_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_get_by_url_by_game_id]

GO

CREATE PROCEDURE usp_game_product_get_by_url_by_game_id
(
    @url varchar (255) = NULL
    , @game_id varchar (100) = NULL
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
        , [uuid]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_product]
    WHERE 1=1
    AND LOWER([url]) = LOWER(@url)
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_product_get_by_uuid_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_product_get_by_uuid_by_game_id]

GO

CREATE PROCEDURE usp_game_product_get_by_uuid_by_game_id
(
    @uuid uniqueidentifier 
    , @game_id varchar (100) = NULL
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
        , [uuid]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_product]
    WHERE 1=1
    AND [uuid] = @uuid
    AND LOWER([game_id]) = LOWER(@game_id)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count_by_key]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count_by_key
(
    @key uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count_by_key_by_game_id
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_browse_by_filter]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_browse_by_filter
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
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [timestamp]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [rank]'
    SET @sql = @sql + ', [rank_change]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [rank_total_count]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [stat_value]'
    SET @sql = @sql + ', [network]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [level]'
    SET @sql = @sql + ', [stat_value_formatted]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[game_statistic_leaderboard] WHERE 1=1 '
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
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_set_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
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
                INSERT INTO [dbo].[game_statistic_leaderboard]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_set_by_uuid_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_set_by_uuid_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_set_by_uuid_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_set_by_key_by_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_del_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_del_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_del_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_del_by_key_by_game_id
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1                        
    AND [key] = @key
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_del_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_del_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_del_by_key_by_profile_id_by_game_id
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1                        
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_del_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_del_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_del_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticLeaderboard - game_statistic_leaderboard
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_key]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_key
(
    @key uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_key_by_game_id
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_key_by_game_id_by_network]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_key_by_game_id_by_network]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_key_by_game_id_by_network
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @network varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
    AND [game_id] = @game_id
    AND LOWER([network]) = LOWER(@network)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_get_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_get_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_get_by_profile_id_by_game_id_by_timestamp
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count_by_key]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count_by_key
(
    @key uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count_by_key_by_game_id
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_browse_by_filter]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_browse_by_filter
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
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [timestamp]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [rank]'
    SET @sql = @sql + ', [rank_change]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [rank_total_count]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [stat_value]'
    SET @sql = @sql + ', [network]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [level]'
    SET @sql = @sql + ', [stat_value_formatted]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[game_statistic_leaderboard_rollup] WHERE 1=1 '
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
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_set_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard_rollup]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard_rollup] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
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
                INSERT INTO [dbo].[game_statistic_leaderboard_rollup]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_set_by_uuid_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_set_by_uuid_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_set_by_uuid_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard_rollup]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard_rollup] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard_rollup]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard_rollup]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard_rollup] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard_rollup]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard_rollup]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard_rollup] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard_rollup]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard_rollup]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard_rollup] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard_rollup]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @key uniqueidentifier = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @rank int = NULL
    , @rank_change int = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @rank_total_count int = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @network varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @stat_value_formatted varchar (500) = NULL
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
                FROM  [dbo].[game_statistic_leaderboard_rollup]  
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_leaderboard_rollup] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [key] = @key
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [rank] = @rank
                    , [rank_change] = @rank_change
                    , [game_id] = @game_id
                    , [active] = @active
                    , [rank_total_count] = @rank_total_count
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [network] = @network
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [stat_value_formatted] = @stat_value_formatted
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [key] = @key
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_leaderboard_rollup]
                (
                    [status]
                    , [username]
                    , [key]
                    , [timestamp]
                    , [profile_id]
                    , [rank]
                    , [rank_change]
                    , [game_id]
                    , [active]
                    , [rank_total_count]
                    , [data]
                    , [stat_value]
                    , [network]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [stat_value_formatted]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @key
                    , @timestamp
                    , @profile_id
                    , @rank
                    , @rank_change
                    , @game_id
                    , @active
                    , @rank_total_count
                    , @data
                    , @stat_value
                    , @network
                    , @uuid
                    , @date_modified
                    , @level
                    , @stat_value_formatted
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
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_del_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_del_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_del_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_del_by_key_by_game_id
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1                        
    AND [key] = @key
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_del_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_del_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_del_by_key_by_profile_id_by_game_id
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1                        
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_del_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_del_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_del_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticLeaderboardRollup - game_statistic_leaderboard_rollup
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_key]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_key
(
    @key uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id_by_network]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id_by_network]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id_by_network
(
    @key uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @network varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
    AND [game_id] = @game_id
    AND LOWER([network]) = LOWER(@network)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [key] = @key
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id_by_timestamp
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [key]
        , [timestamp]
        , [profile_id]
        , [rank]
        , [rank_change]
        , [game_id]
        , [active]
        , [rank_total_count]
        , [data]
        , [stat_value]
        , [network]
        , [uuid]
        , [date_modified]
        , [level]
        , [stat_value_formatted]
        , [date_created]
        , [type]
    FROM [dbo].[game_statistic_leaderboard_rollup]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_count]

GO

CREATE PROCEDURE usp_game_live_queue_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_live_queue]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_count_by_uuid]

GO

CREATE PROCEDURE usp_game_live_queue_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_live_queue]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_queue_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_live_queue]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_browse_by_filter]

GO

CREATE PROCEDURE usp_game_live_queue_browse_by_filter
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
    SET @sql = @sql + ', [data_stat]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [data_ad]'

    SET @sql = @sql + ' FROM [dbo].[game_live_queue] WHERE 1=1 '
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
-- MODEL: GameLiveQueue - game_live_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_set_by_uuid]

GO

CREATE PROCEDURE usp_game_live_queue_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @data_stat ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @game_id uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @data_ad ntext = NULL
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
                FROM  [dbo].[game_live_queue]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_live_queue] 
                SET
                    [status] = @status
                    , [data_stat] = @data_stat
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [game_id] = @game_id
                    , [profile_id] = @profile_id
                    , [type] = @type
                    , [data_ad] = @data_ad
                WHERE 1=1
                AND [uuid] = @uuid
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_live_queue]
                (
                    [status]
                    , [data_stat]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [game_id]
                    , [profile_id]
                    , [type]
                    , [data_ad]
                )
                VALUES
                (
                    @status
                    , @data_stat
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @game_id
                    , @profile_id
                    , @type
                    , @data_ad
                )                    
                SET @id=1                    
            END
        END     
        SELECT @id as id
    END 
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_set_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_set_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_queue_set_by_profile_id_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @data_stat ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @game_id uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
    , @type varchar (500) = NULL
    , @data_ad ntext = NULL
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
                FROM  [dbo].[game_live_queue]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_live_queue] 
                SET
                    [status] = @status
                    , [data_stat] = @data_stat
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [game_id] = @game_id
                    , [profile_id] = @profile_id
                    , [type] = @type
                    , [data_ad] = @data_ad
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_live_queue]
                (
                    [status]
                    , [data_stat]
                    , [uuid]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [game_id]
                    , [profile_id]
                    , [type]
                    , [data_ad]
                )
                VALUES
                (
                    @status
                    , @data_stat
                    , @uuid
                    , @date_modified
                    , @active
                    , @date_created
                    , @game_id
                    , @profile_id
                    , @type
                    , @data_ad
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
-- MODEL: GameLiveQueue - game_live_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_del_by_uuid]

GO

CREATE PROCEDURE usp_game_live_queue_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_live_queue]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_del_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_del_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_queue_del_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_live_queue]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLiveQueue - game_live_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_get]

GO

CREATE PROCEDURE usp_game_live_queue_get
AS
BEGIN
    SELECT
        [status]
        , [data_stat]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [profile_id]
        , [type]
        , [data_ad]
    FROM [dbo].[game_live_queue]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_get_by_uuid]

GO

CREATE PROCEDURE usp_game_live_queue_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [data_stat]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [profile_id]
        , [type]
        , [data_ad]
    FROM [dbo].[game_live_queue]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_get_by_game_id]

GO

CREATE PROCEDURE usp_game_live_queue_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [data_stat]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [profile_id]
        , [type]
        , [data_ad]
    FROM [dbo].[game_live_queue]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_queue_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_queue_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_queue_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [data_stat]
        , [uuid]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [profile_id]
        , [type]
        , [data_ad]
    FROM [dbo].[game_live_queue]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_count]

GO

CREATE PROCEDURE usp_game_live_recent_queue_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_count_by_uuid]

GO

CREATE PROCEDURE usp_game_live_recent_queue_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_recent_queue_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_browse_by_filter]

GO

CREATE PROCEDURE usp_game_live_recent_queue_browse_by_filter
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
    SET @sql = @sql + ', [code]'
    SET @sql = @sql + ', [display_name]'
    SET @sql = @sql + ', [name]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [game]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_live_recent_queue] WHERE 1=1 '
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
-- MODEL: GameLiveRecentQueue - game_live_recent_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_set_by_uuid]

GO

CREATE PROCEDURE usp_game_live_recent_queue_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @profile_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @game varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
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
                FROM  [dbo].[game_live_recent_queue]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_live_recent_queue] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [profile_id] = @profile_id
                    , [uuid] = @uuid
                    , [game] = @game
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_live_recent_queue]
                (
                    [status]
                    , [username]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [profile_id]
                    , [uuid]
                    , [game]
                    , [game_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @username
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @data
                    , @profile_id
                    , @uuid
                    , @game
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_set_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_set_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_recent_queue_set_by_profile_id_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @profile_id uniqueidentifier = NULL
    , @uuid uniqueidentifier 
    , @game varchar (500) = NULL
    , @game_id uniqueidentifier = NULL
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
                FROM  [dbo].[game_live_recent_queue]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_live_recent_queue] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [profile_id] = @profile_id
                    , [uuid] = @uuid
                    , [game] = @game
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [description] = @description
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_live_recent_queue]
                (
                    [status]
                    , [username]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [profile_id]
                    , [uuid]
                    , [game]
                    , [game_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @username
                    , @code
                    , @display_name
                    , @name
                    , @date_modified
                    , @data
                    , @profile_id
                    , @uuid
                    , @game
                    , @game_id
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
-- MODEL: GameLiveRecentQueue - game_live_recent_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_del_by_uuid]

GO

CREATE PROCEDURE usp_game_live_recent_queue_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_del_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_del_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_recent_queue_del_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLiveRecentQueue - game_live_recent_queue
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_get]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_get]

GO

CREATE PROCEDURE usp_game_live_recent_queue_get
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [profile_id]
        , [uuid]
        , [game]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_get_by_uuid]

GO

CREATE PROCEDURE usp_game_live_recent_queue_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [profile_id]
        , [uuid]
        , [game]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_get_by_game_id]

GO

CREATE PROCEDURE usp_game_live_recent_queue_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [profile_id]
        , [uuid]
        , [game]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_live_recent_queue_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_live_recent_queue_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_live_recent_queue_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [code]
        , [display_name]
        , [name]
        , [date_modified]
        , [data]
        , [profile_id]
        , [uuid]
        , [game]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [description]
    FROM [dbo].[game_live_recent_queue]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count]

GO

CREATE PROCEDURE usp_game_profile_statistic_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count_by_key]

GO

CREATE PROCEDURE usp_game_profile_statistic_count_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_count_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_count_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_browse_by_filter]

GO

CREATE PROCEDURE usp_game_profile_statistic_browse_by_filter
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
    SET @sql = @sql + ', [timestamp]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [stat_value]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [level]'
    SET @sql = @sql + ', [points]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[game_profile_statistic] WHERE 1=1 '
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
-- MODEL: GameProfileStatistic - game_profile_statistic
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_set_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @points float = NULL
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
                FROM  [dbo].[game_profile_statistic]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [points] = @points
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
                INSERT INTO [dbo].[game_profile_statistic]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [data]
                    , [stat_value]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [points]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @data
                    , @stat_value
                    , @uuid
                    , @date_modified
                    , @level
                    , @points
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_set_by_uuid_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_set_by_uuid_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_set_by_uuid_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @points float = NULL
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
                FROM  [dbo].[game_profile_statistic]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [points] = @points
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_statistic]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [data]
                    , [stat_value]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [points]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @data
                    , @stat_value
                    , @uuid
                    , @date_modified
                    , @level
                    , @points
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_set_by_profile_id_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_set_by_profile_id_by_key]

GO

CREATE PROCEDURE usp_game_profile_statistic_set_by_profile_id_by_key
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @points float = NULL
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
                FROM  [dbo].[game_profile_statistic]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND LOWER([key]) = LOWER(@key)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [points] = @points
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND LOWER([key]) = LOWER(@key)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_statistic]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [data]
                    , [stat_value]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [points]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @data
                    , @stat_value
                    , @uuid
                    , @date_modified
                    , @level
                    , @points
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_set_by_profile_id_by_key_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_set_by_profile_id_by_key_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_set_by_profile_id_by_key_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @points float = NULL
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
                FROM  [dbo].[game_profile_statistic]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND LOWER([key]) = LOWER(@key)
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [points] = @points
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND LOWER([key]) = LOWER(@key)
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_statistic]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [data]
                    , [stat_value]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [points]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @data
                    , @stat_value
                    , @uuid
                    , @date_modified
                    , @level
                    , @points
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_set_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_set_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_set_by_key_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @points float = NULL
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
                FROM  [dbo].[game_profile_statistic]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [points] = @points
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_statistic]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [data]
                    , [stat_value]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [points]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @data
                    , @stat_value
                    , @uuid
                    , @date_modified
                    , @level
                    , @points
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_set_by_profile_id_by_game_id_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_set_by_profile_id_by_game_id_by_key]

GO

CREATE PROCEDURE usp_game_profile_statistic_set_by_profile_id_by_game_id_by_key
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @data ntext = NULL
    , @stat_value float = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
    , @points float = NULL
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
                FROM  [dbo].[game_profile_statistic]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND LOWER([key]) = LOWER(@key)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [data] = @data
                    , [stat_value] = @stat_value
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [points] = @points
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND LOWER([key]) = LOWER(@key)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_statistic]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [data]
                    , [stat_value]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [points]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @data
                    , @stat_value
                    , @uuid
                    , @date_modified
                    , @level
                    , @points
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
-- MODEL: GameProfileStatistic - game_profile_statistic
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_del_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_del_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_del_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_del_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1                        
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_del_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_del_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_del_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_del_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_del_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_del_by_key_by_profile_id_by_game_id
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1                        
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileStatistic - game_profile_statistic
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_key]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_profile_id_by_game_id_by_timestamp
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [data]
        , [stat_value]
        , [uuid]
        , [date_modified]
        , [level]
        , [points]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_statistic]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_count]

GO

CREATE PROCEDURE usp_game_statistic_meta_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_count_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_meta_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_count_by_code]

GO

CREATE PROCEDURE usp_game_statistic_meta_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_count_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_count_by_name]

GO

CREATE PROCEDURE usp_game_statistic_meta_count_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_count_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_count_by_key]

GO

CREATE PROCEDURE usp_game_statistic_meta_count_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_count_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_meta_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_count_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_count_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_meta_count_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_browse_by_filter]

GO

CREATE PROCEDURE usp_game_statistic_meta_browse_by_filter
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
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [points]'
    SET @sql = @sql + ', [store_count]'
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [order]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_statistic_meta] WHERE 1=1 '
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
-- MODEL: GameStatisticMeta - game_statistic_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_set_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_meta_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @points float = NULL
    , @store_count int = NULL
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (40) = NULL
    , @order varchar (40) = NULL
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
                FROM  [dbo].[game_statistic_meta]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_meta] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [uuid] = @uuid
                    , [points] = @points
                    , [store_count] = @store_count
                    , [key] = @key
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_statistic_meta]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [uuid]
                    , [points]
                    , [store_count]
                    , [key]
                    , [game_id]
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
                    , @data
                    , @uuid
                    , @points
                    , @store_count
                    , @key
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_set_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_set_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_meta_set_by_key_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @points float = NULL
    , @store_count int = NULL
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (40) = NULL
    , @order varchar (40) = NULL
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
                FROM  [dbo].[game_statistic_meta]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_statistic_meta] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [uuid] = @uuid
                    , [points] = @points
                    , [store_count] = @store_count
                    , [key] = @key
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                    , [description] = @description
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_statistic_meta]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [uuid]
                    , [points]
                    , [store_count]
                    , [key]
                    , [game_id]
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
                    , @data
                    , @uuid
                    , @points
                    , @store_count
                    , @key
                    , @game_id
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
-- MODEL: GameStatisticMeta - game_statistic_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_del_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_meta_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_del_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_del_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_meta_del_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1                        
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameStatisticMeta - game_statistic_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_get_by_uuid]

GO

CREATE PROCEDURE usp_game_statistic_meta_get_by_uuid
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
        , [data]
        , [uuid]
        , [points]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_get_by_code]

GO

CREATE PROCEDURE usp_game_statistic_meta_get_by_code
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
        , [data]
        , [uuid]
        , [points]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_get_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_get_by_name]

GO

CREATE PROCEDURE usp_game_statistic_meta_get_by_name
(
    @name varchar (255) = NULL
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
        , [data]
        , [uuid]
        , [points]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_get_by_key]

GO

CREATE PROCEDURE usp_game_statistic_meta_get_by_key
(
    @key varchar (50) = NULL
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
        , [data]
        , [uuid]
        , [points]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_get_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_meta_get_by_game_id
(
    @game_id uniqueidentifier = NULL
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
        , [data]
        , [uuid]
        , [points]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_statistic_meta_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_statistic_meta_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_statistic_meta_get_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
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
        , [data]
        , [uuid]
        , [points]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_statistic_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_count]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic_timestamp]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_count_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic_timestamp]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_count_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_count_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_count_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp DATETIME = GETDATE
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_statistic_timestamp]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_browse_by_filter]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_browse_by_filter
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
    SET @sql = @sql + ', [timestamp]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[game_profile_statistic_timestamp] WHERE 1=1 '
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
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_set_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @timestamp DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @key varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @game_id uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
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
                FROM  [dbo].[game_profile_statistic_timestamp]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic_timestamp] 
                SET
                    [status] = @status
                    , [timestamp] = @timestamp
                    , [uuid] = @uuid
                    , [key] = @key
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_profile_statistic_timestamp]
                (
                    [status]
                    , [timestamp]
                    , [uuid]
                    , [key]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [game_id]
                    , [profile_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @timestamp
                    , @uuid
                    , @key
                    , @date_modified
                    , @active
                    , @date_created
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_set_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_set_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_set_by_key_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @timestamp DATETIME = GETDATE
    , @uuid uniqueidentifier 
    , @key varchar (50) = NULL
    , @date_modified DATETIME = GETDATE
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @game_id uniqueidentifier = NULL
    , @profile_id uniqueidentifier = NULL
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
                FROM  [dbo].[game_profile_statistic_timestamp]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_statistic_timestamp] 
                SET
                    [status] = @status
                    , [timestamp] = @timestamp
                    , [uuid] = @uuid
                    , [key] = @key
                    , [date_modified] = @date_modified
                    , [active] = @active
                    , [date_created] = @date_created
                    , [game_id] = @game_id
                    , [profile_id] = @profile_id
                    , [type] = @type
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_statistic_timestamp]
                (
                    [status]
                    , [timestamp]
                    , [uuid]
                    , [key]
                    , [date_modified]
                    , [active]
                    , [date_created]
                    , [game_id]
                    , [profile_id]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @timestamp
                    , @uuid
                    , @key
                    , @date_modified
                    , @active
                    , @date_created
                    , @game_id
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
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_del_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_statistic_timestamp]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_del_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_del_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_del_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp DATETIME = GETDATE
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_statistic_timestamp]
    WHERE 1=1                        
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileStatisticTimestamp - game_profile_statistic_timestamp
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_get_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [timestamp]
        , [uuid]
        , [key]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [profile_id]
        , [type]
    FROM [dbo].[game_profile_statistic_timestamp]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_statistic_timestamp_get_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_statistic_timestamp_get_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_statistic_timestamp_get_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp DATETIME = GETDATE
)
AS
BEGIN
    SELECT
        [status]
        , [timestamp]
        , [uuid]
        , [key]
        , [date_modified]
        , [active]
        , [date_created]
        , [game_id]
        , [profile_id]
        , [type]
    FROM [dbo].[game_profile_statistic_timestamp]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_count]

GO

CREATE PROCEDURE usp_game_key_meta_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_key_meta]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_count_by_uuid]

GO

CREATE PROCEDURE usp_game_key_meta_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_count_by_code]

GO

CREATE PROCEDURE usp_game_key_meta_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_count_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_count_by_name]

GO

CREATE PROCEDURE usp_game_key_meta_count_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_count_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_count_by_key]

GO

CREATE PROCEDURE usp_game_key_meta_count_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_count_by_game_id]

GO

CREATE PROCEDURE usp_game_key_meta_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_count_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_count_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_key_meta_count_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_browse_by_filter]

GO

CREATE PROCEDURE usp_game_key_meta_browse_by_filter
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
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [level]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [key_level]'
    SET @sql = @sql + ', [store_count]'
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [order]'
    SET @sql = @sql + ', [key_stat]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_key_meta] WHERE 1=1 '
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
-- MODEL: GameKeyMeta - game_key_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_set_by_uuid]

GO

CREATE PROCEDURE usp_game_key_meta_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @level varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @key_level varchar (50) = NULL
    , @store_count int = NULL
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (40) = NULL
    , @order varchar (40) = NULL
    , @key_stat varchar (50) = NULL
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
                FROM  [dbo].[game_key_meta]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_key_meta] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [level] = @level
                    , [uuid] = @uuid
                    , [key_level] = @key_level
                    , [store_count] = @store_count
                    , [key] = @key
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                    , [key_stat] = @key_stat
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
                INSERT INTO [dbo].[game_key_meta]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [level]
                    , [uuid]
                    , [key_level]
                    , [store_count]
                    , [key]
                    , [game_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                    , [key_stat]
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
                    , @data
                    , @level
                    , @uuid
                    , @key_level
                    , @store_count
                    , @key
                    , @game_id
                    , @active
                    , @date_created
                    , @type
                    , @order
                    , @key_stat
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_set_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_set_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_key_meta_set_by_key_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @level varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @key_level varchar (50) = NULL
    , @store_count int = NULL
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (40) = NULL
    , @order varchar (40) = NULL
    , @key_stat varchar (50) = NULL
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
                FROM  [dbo].[game_key_meta]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_key_meta] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [level] = @level
                    , [uuid] = @uuid
                    , [key_level] = @key_level
                    , [store_count] = @store_count
                    , [key] = @key
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                    , [key_stat] = @key_stat
                    , [description] = @description
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_key_meta]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [level]
                    , [uuid]
                    , [key_level]
                    , [store_count]
                    , [key]
                    , [game_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                    , [key_stat]
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
                    , @data
                    , @level
                    , @uuid
                    , @key_level
                    , @store_count
                    , @key
                    , @game_id
                    , @active
                    , @date_created
                    , @type
                    , @order
                    , @key_stat
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_set_by_key_by_game_id_by_level]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_set_by_key_by_game_id_by_level]

GO

CREATE PROCEDURE usp_game_key_meta_set_by_key_by_game_id_by_level
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @level varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @key_level varchar (50) = NULL
    , @store_count int = NULL
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (40) = NULL
    , @order varchar (40) = NULL
    , @key_stat varchar (50) = NULL
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
                FROM  [dbo].[game_key_meta]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
                AND LOWER([level]) = LOWER(@level)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_key_meta] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [level] = @level
                    , [uuid] = @uuid
                    , [key_level] = @key_level
                    , [store_count] = @store_count
                    , [key] = @key
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                    , [key_stat] = @key_stat
                    , [description] = @description
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
                AND LOWER([level]) = LOWER(@level)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_key_meta]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [level]
                    , [uuid]
                    , [key_level]
                    , [store_count]
                    , [key]
                    , [game_id]
                    , [active]
                    , [date_created]
                    , [type]
                    , [order]
                    , [key_stat]
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
                    , @data
                    , @level
                    , @uuid
                    , @key_level
                    , @store_count
                    , @key
                    , @game_id
                    , @active
                    , @date_created
                    , @type
                    , @order
                    , @key_stat
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
-- MODEL: GameKeyMeta - game_key_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_del_by_uuid]

GO

CREATE PROCEDURE usp_game_key_meta_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_key_meta]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_del_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_del_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_key_meta_del_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_key_meta]
    WHERE 1=1                        
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameKeyMeta - game_key_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_get_by_uuid]

GO

CREATE PROCEDURE usp_game_key_meta_get_by_uuid
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
        , [data]
        , [level]
        , [uuid]
        , [key_level]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [key_stat]
        , [description]
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_get_by_code]

GO

CREATE PROCEDURE usp_game_key_meta_get_by_code
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
        , [data]
        , [level]
        , [uuid]
        , [key_level]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [key_stat]
        , [description]
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_get_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_get_by_name]

GO

CREATE PROCEDURE usp_game_key_meta_get_by_name
(
    @name varchar (255) = NULL
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
        , [data]
        , [level]
        , [uuid]
        , [key_level]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [key_stat]
        , [description]
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_get_by_key]

GO

CREATE PROCEDURE usp_game_key_meta_get_by_key
(
    @key varchar (50) = NULL
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
        , [data]
        , [level]
        , [uuid]
        , [key_level]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [key_stat]
        , [description]
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_get_by_game_id]

GO

CREATE PROCEDURE usp_game_key_meta_get_by_game_id
(
    @game_id uniqueidentifier = NULL
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
        , [data]
        , [level]
        , [uuid]
        , [key_level]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [key_stat]
        , [description]
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_key_meta_get_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
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
        , [data]
        , [level]
        , [uuid]
        , [key_level]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [key_stat]
        , [description]
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_key_meta_get_by_code_by_level]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_key_meta_get_by_code_by_level]

GO

CREATE PROCEDURE usp_game_key_meta_get_by_code_by_level
(
    @code varchar (255) = NULL
    , @level varchar (500) = NULL
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
        , [data]
        , [level]
        , [uuid]
        , [key_level]
        , [store_count]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [key_stat]
        , [description]
    FROM [dbo].[game_key_meta]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
    AND LOWER([level]) = LOWER(@level)
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameLevel - game_level
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_count]

GO

CREATE PROCEDURE usp_game_level_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_level]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_count_by_uuid]

GO

CREATE PROCEDURE usp_game_level_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_level]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_count_by_code]

GO

CREATE PROCEDURE usp_game_level_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_count_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_count_by_name]

GO

CREATE PROCEDURE usp_game_level_count_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_count_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_count_by_key]

GO

CREATE PROCEDURE usp_game_level_count_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_count_by_game_id]

GO

CREATE PROCEDURE usp_game_level_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_level]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_count_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_count_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_level_count_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameLevel - game_level
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_browse_by_filter]

GO

CREATE PROCEDURE usp_game_level_browse_by_filter
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
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [order]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_level] WHERE 1=1 '
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
-- MODEL: GameLevel - game_level
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_set_by_uuid]

GO

CREATE PROCEDURE usp_game_level_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (40) = NULL
    , @order varchar (40) = NULL
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
                FROM  [dbo].[game_level]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_level] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [uuid] = @uuid
                    , [key] = @key
                    , [game_id] = @game_id
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
                INSERT INTO [dbo].[game_level]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [uuid]
                    , [key]
                    , [game_id]
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
                    , @data
                    , @uuid
                    , @key
                    , @game_id
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_set_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_set_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_level_set_by_key_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @type varchar (40) = NULL
    , @order varchar (40) = NULL
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
                FROM  [dbo].[game_level]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_level] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [uuid] = @uuid
                    , [key] = @key
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [type] = @type
                    , [order] = @order
                    , [description] = @description
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_level]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [date_modified]
                    , [data]
                    , [uuid]
                    , [key]
                    , [game_id]
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
                    , @data
                    , @uuid
                    , @key
                    , @game_id
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
-- MODEL: GameLevel - game_level
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_del_by_uuid]

GO

CREATE PROCEDURE usp_game_level_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_level]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_del_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_del_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_level_del_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_level]
    WHERE 1=1                        
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameLevel - game_level
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_get_by_uuid]

GO

CREATE PROCEDURE usp_game_level_get_by_uuid
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
        , [data]
        , [uuid]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_level]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_get_by_code]

GO

CREATE PROCEDURE usp_game_level_get_by_code
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
        , [data]
        , [uuid]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_get_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_get_by_name]

GO

CREATE PROCEDURE usp_game_level_get_by_name
(
    @name varchar (255) = NULL
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
        , [data]
        , [uuid]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_get_by_key]

GO

CREATE PROCEDURE usp_game_level_get_by_key
(
    @key varchar (50) = NULL
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
        , [data]
        , [uuid]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_get_by_game_id]

GO

CREATE PROCEDURE usp_game_level_get_by_game_id
(
    @game_id uniqueidentifier = NULL
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
        , [data]
        , [uuid]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_level]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_level_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_level_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_level_get_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
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
        , [data]
        , [uuid]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [type]
        , [order]
        , [description]
    FROM [dbo].[game_level]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_count]

GO

CREATE PROCEDURE usp_game_profile_achievement_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_count_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_achievement_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_count_by_profile_id_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_count_by_profile_id_by_key]

GO

CREATE PROCEDURE usp_game_profile_achievement_count_by_profile_id_by_key
(
    @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_count_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_count_by_username]

GO

CREATE PROCEDURE usp_game_profile_achievement_count_by_username
(
    @username varchar (500) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_browse_by_filter]

GO

CREATE PROCEDURE usp_game_profile_achievement_browse_by_filter
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
    SET @sql = @sql + ', [timestamp]'
    SET @sql = @sql + ', [completed]'
    SET @sql = @sql + ', [profile_id]'
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [achievement_value]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [level]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [type]'

    SET @sql = @sql + ' FROM [dbo].[game_profile_achievement] WHERE 1=1 '
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
-- MODEL: GameProfileAchievement - game_profile_achievement
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_set_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_achievement_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @completed bit = 1
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @achievement_value decimal = NULL
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
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
                FROM  [dbo].[game_profile_achievement]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_achievement] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [completed] = @completed
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [achievement_value] = @achievement_value
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
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
                INSERT INTO [dbo].[game_profile_achievement]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [completed]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [achievement_value]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @completed
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @achievement_value
                    , @data
                    , @uuid
                    , @date_modified
                    , @level
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_set_by_uuid_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_set_by_uuid_by_key]

GO

CREATE PROCEDURE usp_game_profile_achievement_set_by_uuid_by_key
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @completed bit = 1
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @achievement_value decimal = NULL
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
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
                FROM  [dbo].[game_profile_achievement]  
                WHERE 1=1
                AND [uuid] = @uuid
                AND LOWER([key]) = LOWER(@key)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_achievement] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [completed] = @completed
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [achievement_value] = @achievement_value
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [uuid] = @uuid
                AND LOWER([key]) = LOWER(@key)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_achievement]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [completed]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [achievement_value]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @completed
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @achievement_value
                    , @data
                    , @uuid
                    , @date_modified
                    , @level
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_set_by_profile_id_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_set_by_profile_id_by_key]

GO

CREATE PROCEDURE usp_game_profile_achievement_set_by_profile_id_by_key
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @completed bit = 1
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @achievement_value decimal = NULL
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
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
                FROM  [dbo].[game_profile_achievement]  
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND LOWER([key]) = LOWER(@key)
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_achievement] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [completed] = @completed
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [achievement_value] = @achievement_value
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND [profile_id] = @profile_id
                AND LOWER([key]) = LOWER(@key)
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_achievement]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [completed]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [achievement_value]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @completed
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @achievement_value
                    , @data
                    , @uuid
                    , @date_modified
                    , @level
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @completed bit = 1
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @achievement_value decimal = NULL
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
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
                FROM  [dbo].[game_profile_achievement]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_achievement] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [completed] = @completed
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [achievement_value] = @achievement_value
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_achievement]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [completed]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [achievement_value]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @completed
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @achievement_value
                    , @data
                    , @uuid
                    , @date_modified
                    , @level
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
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id_by_timestamp
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @username varchar (500) = NULL
    , @timestamp float = NULL
    , @completed bit = 1
    , @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
    , @active bit = NULL
    , @game_id uniqueidentifier = NULL
    , @achievement_value decimal = NULL
    , @data ntext = NULL
    , @uuid uniqueidentifier 
    , @date_modified DATETIME = GETDATE
    , @level varchar (500) = NULL
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
                FROM  [dbo].[game_profile_achievement]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_profile_achievement] 
                SET
                    [status] = @status
                    , [username] = @username
                    , [timestamp] = @timestamp
                    , [completed] = @completed
                    , [profile_id] = @profile_id
                    , [key] = @key
                    , [active] = @active
                    , [game_id] = @game_id
                    , [achievement_value] = @achievement_value
                    , [data] = @data
                    , [uuid] = @uuid
                    , [date_modified] = @date_modified
                    , [level] = @level
                    , [date_created] = @date_created
                    , [type] = @type
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [profile_id] = @profile_id
                AND [game_id] = @game_id
                AND [timestamp] = @timestamp
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_profile_achievement]
                (
                    [status]
                    , [username]
                    , [timestamp]
                    , [completed]
                    , [profile_id]
                    , [key]
                    , [active]
                    , [game_id]
                    , [achievement_value]
                    , [data]
                    , [uuid]
                    , [date_modified]
                    , [level]
                    , [date_created]
                    , [type]
                )
                VALUES
                (
                    @status
                    , @username
                    , @timestamp
                    , @completed
                    , @profile_id
                    , @key
                    , @active
                    , @game_id
                    , @achievement_value
                    , @data
                    , @uuid
                    , @date_modified
                    , @level
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
-- MODEL: GameProfileAchievement - game_profile_achievement
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_del_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_achievement_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_del_by_profile_id_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_del_by_profile_id_by_key]

GO

CREATE PROCEDURE usp_game_profile_achievement_del_by_profile_id_by_key
(
    @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1                        
    AND [profile_id] = @profile_id
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_del_by_uuid_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_del_by_uuid_by_key]

GO

CREATE PROCEDURE usp_game_profile_achievement_del_by_uuid_by_key
(
    @uuid uniqueidentifier 
    , @key varchar (50) = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1                        
    AND [uuid] = @uuid
    AND LOWER([key]) = LOWER(@key)
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameProfileAchievement - game_profile_achievement
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_uuid]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_profile_id_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_profile_id_by_key]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_profile_id_by_key
(
    @profile_id uniqueidentifier = NULL
    , @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_username]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_username]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_username
(
    @username varchar (500) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([username]) = LOWER(@username)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_key]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_profile_id_by_game_id
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_profile_id_by_game_id_by_timestamp
(
    @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id_by_timestamp]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id_by_timestamp]

GO

CREATE PROCEDURE usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id_by_timestamp
(
    @key varchar (50) = NULL
    , @profile_id uniqueidentifier = NULL
    , @game_id uniqueidentifier = NULL
    , @timestamp float = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [username]
        , [timestamp]
        , [completed]
        , [profile_id]
        , [key]
        , [active]
        , [game_id]
        , [achievement_value]
        , [data]
        , [uuid]
        , [date_modified]
        , [level]
        , [date_created]
        , [type]
    FROM [dbo].[game_profile_achievement]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [profile_id] = @profile_id
    AND [game_id] = @game_id
    AND [timestamp] = @timestamp
END
GO
-- -----------------------------------------------------------------------------
-- PROCS

-- ------------------------------------
-- COUNT

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_count]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_count]

GO

CREATE PROCEDURE usp_game_achievement_meta_count
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_count_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_count_by_uuid]

GO

CREATE PROCEDURE usp_game_achievement_meta_count_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_count_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_count_by_code]

GO

CREATE PROCEDURE usp_game_achievement_meta_count_by_code
(
    @code varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_count_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_count_by_name]

GO

CREATE PROCEDURE usp_game_achievement_meta_count_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_count_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_count_by_key]

GO

CREATE PROCEDURE usp_game_achievement_meta_count_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_count_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_count_by_game_id]

GO

CREATE PROCEDURE usp_game_achievement_meta_count_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_count_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_count_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_achievement_meta_count_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        COUNT(*) as count
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- BROWSE

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_browse_by_filter]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_browse_by_filter]

GO

CREATE PROCEDURE usp_game_achievement_meta_browse_by_filter
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
    SET @sql = @sql + ', [game_stat]'
    SET @sql = @sql + ', [date_modified]'
    SET @sql = @sql + ', [data]'
    SET @sql = @sql + ', [level]'
    SET @sql = @sql + ', [uuid]'
    SET @sql = @sql + ', [points]'
    SET @sql = @sql + ', [key]'
    SET @sql = @sql + ', [game_id]'
    SET @sql = @sql + ', [active]'
    SET @sql = @sql + ', [date_created]'
    SET @sql = @sql + ', [modifier]'
    SET @sql = @sql + ', [type]'
    SET @sql = @sql + ', [leaderboard]'
    SET @sql = @sql + ', [description]'

    SET @sql = @sql + ' FROM [dbo].[game_achievement_meta] WHERE 1=1 '
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
-- MODEL: GameAchievementMeta - game_achievement_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_set_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_set_by_uuid]

GO

CREATE PROCEDURE usp_game_achievement_meta_set_by_uuid
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @game_stat bit = 1
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @level varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @points int = NULL
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @modifier decimal = NULL
    , @type varchar (40) = NULL
    , @leaderboard bit = 1
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
                FROM  [dbo].[game_achievement_meta]  
                WHERE 1=1
                AND [uuid] = @uuid
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_achievement_meta] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [game_stat] = @game_stat
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [level] = @level
                    , [uuid] = @uuid
                    , [points] = @points
                    , [key] = @key
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [modifier] = @modifier
                    , [type] = @type
                    , [leaderboard] = @leaderboard
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
                INSERT INTO [dbo].[game_achievement_meta]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [game_stat]
                    , [date_modified]
                    , [data]
                    , [level]
                    , [uuid]
                    , [points]
                    , [key]
                    , [game_id]
                    , [active]
                    , [date_created]
                    , [modifier]
                    , [type]
                    , [leaderboard]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @code
                    , @display_name
                    , @name
                    , @game_stat
                    , @date_modified
                    , @data
                    , @level
                    , @uuid
                    , @points
                    , @key
                    , @game_id
                    , @active
                    , @date_created
                    , @modifier
                    , @type
                    , @leaderboard
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
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_set_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_set_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_achievement_meta_set_by_key_by_game_id
(
    @set_type varchar (50) = 'full'                        
    , @status varchar (255) = NULL
    , @sort int = NULL
    , @code varchar (255) = NULL
    , @display_name varchar (255) = NULL
    , @name varchar (255) = NULL
    , @game_stat bit = 1
    , @date_modified DATETIME = GETDATE
    , @data ntext = NULL
    , @level varchar (500) = NULL
    , @uuid uniqueidentifier 
    , @points int = NULL
    , @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
    , @active bit = NULL
    , @date_created DATETIME = GETDATE
    , @modifier decimal = NULL
    , @type varchar (40) = NULL
    , @leaderboard bit = 1
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
                FROM  [dbo].[game_achievement_meta]  
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
	    END
	END

        BEGIN
            -- UPDATE
            IF (@CountItems > 0 AND @set_type != 'insertonly')
                OR (@CountItems = 0 AND @set_type = 'updateonly')
            BEGIN		
                UPDATE [dbo].[game_achievement_meta] 
                SET
                    [status] = @status
                    , [sort] = @sort
                    , [code] = @code
                    , [display_name] = @display_name
                    , [name] = @name
                    , [game_stat] = @game_stat
                    , [date_modified] = @date_modified
                    , [data] = @data
                    , [level] = @level
                    , [uuid] = @uuid
                    , [points] = @points
                    , [key] = @key
                    , [game_id] = @game_id
                    , [active] = @active
                    , [date_created] = @date_created
                    , [modifier] = @modifier
                    , [type] = @type
                    , [leaderboard] = @leaderboard
                    , [description] = @description
                WHERE 1=1
                AND LOWER([key]) = LOWER(@key)
                AND [game_id] = @game_id
                SET @id=1
            END
        END
        BEGIN
            --INSERT
            IF @CountItems = 0 AND @set_type != 'updateonly' 			
            BEGIN			
                INSERT INTO [dbo].[game_achievement_meta]
                (
                    [status]
                    , [sort]
                    , [code]
                    , [display_name]
                    , [name]
                    , [game_stat]
                    , [date_modified]
                    , [data]
                    , [level]
                    , [uuid]
                    , [points]
                    , [key]
                    , [game_id]
                    , [active]
                    , [date_created]
                    , [modifier]
                    , [type]
                    , [leaderboard]
                    , [description]
                )
                VALUES
                (
                    @status
                    , @sort
                    , @code
                    , @display_name
                    , @name
                    , @game_stat
                    , @date_modified
                    , @data
                    , @level
                    , @uuid
                    , @points
                    , @key
                    , @game_id
                    , @active
                    , @date_created
                    , @modifier
                    , @type
                    , @leaderboard
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
-- MODEL: GameAchievementMeta - game_achievement_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_del_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_del_by_uuid]

GO

CREATE PROCEDURE usp_game_achievement_meta_del_by_uuid
(
    @uuid uniqueidentifier 
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1                        
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_del_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_del_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_achievement_meta_del_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    DELETE 
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1                        
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
-- ------------------------------------
-- GET

-- ------------------------------------
-- MODEL: GameAchievementMeta - game_achievement_meta
                       
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_get_by_uuid]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_get_by_uuid]

GO

CREATE PROCEDURE usp_game_achievement_meta_get_by_uuid
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
        , [game_stat]
        , [date_modified]
        , [data]
        , [level]
        , [uuid]
        , [points]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [modifier]
        , [type]
        , [leaderboard]
        , [description]
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND [uuid] = @uuid
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_get_by_code]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_get_by_code]

GO

CREATE PROCEDURE usp_game_achievement_meta_get_by_code
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
        , [game_stat]
        , [date_modified]
        , [data]
        , [level]
        , [uuid]
        , [points]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [modifier]
        , [type]
        , [leaderboard]
        , [description]
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([code]) = LOWER(@code)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_get_by_name]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_get_by_name]

GO

CREATE PROCEDURE usp_game_achievement_meta_get_by_name
(
    @name varchar (255) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [game_stat]
        , [date_modified]
        , [data]
        , [level]
        , [uuid]
        , [points]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [modifier]
        , [type]
        , [leaderboard]
        , [description]
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([name]) = LOWER(@name)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_get_by_key]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_get_by_key]

GO

CREATE PROCEDURE usp_game_achievement_meta_get_by_key
(
    @key varchar (50) = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [game_stat]
        , [date_modified]
        , [data]
        , [level]
        , [uuid]
        , [points]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [modifier]
        , [type]
        , [leaderboard]
        , [description]
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_get_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_get_by_game_id]

GO

CREATE PROCEDURE usp_game_achievement_meta_get_by_game_id
(
    @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [game_stat]
        , [date_modified]
        , [data]
        , [level]
        , [uuid]
        , [points]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [modifier]
        , [type]
        , [leaderboard]
        , [description]
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND [game_id] = @game_id
END
GO
-- -----------------------------------------------------------------------------
IF EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'[dbo].[usp_game_achievement_meta_get_by_key_by_game_id]') and OBJECTPROPERTY(id, N'IsProcedure') = 1)
DROP PROCEDURE [dbo].[usp_game_achievement_meta_get_by_key_by_game_id]

GO

CREATE PROCEDURE usp_game_achievement_meta_get_by_key_by_game_id
(
    @key varchar (50) = NULL
    , @game_id uniqueidentifier = NULL
)
AS
BEGIN
    SELECT
        [status]
        , [sort]
        , [code]
        , [display_name]
        , [name]
        , [game_stat]
        , [date_modified]
        , [data]
        , [level]
        , [uuid]
        , [points]
        , [key]
        , [game_id]
        , [active]
        , [date_created]
        , [modifier]
        , [type]
        , [leaderboard]
        , [description]
    FROM [dbo].[game_achievement_meta]
    WHERE 1=1
    AND LOWER([key]) = LOWER(@key)
    AND [game_id] = @game_id
END
GO
