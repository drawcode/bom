
var return_platform_obj = None;

//-------------------------------------------------
if (!window.platform)
    window.platform = {};
    
if (!window.platform)
    window.platform = {};
    
if (!window.platform.base_entity)
    window.platform.base_entity = {};
   
if (!window.platform.base_meta)
    window.platform.base_meta = {};
   
if (!window.platform.base_location)
    window.platform.base_location = {};
   
if (!window.platform.app)
    window.platform.app = {};
   
if (!window.platform.app_type)
    window.platform.app_type = {};
   
if (!window.platform.site)
    window.platform.site = {};
   
if (!window.platform.site_type)
    window.platform.site_type = {};
   
if (!window.platform.org)
    window.platform.org = {};
   
if (!window.platform.org_type)
    window.platform.org_type = {};
   
if (!window.platform.content_item)
    window.platform.content_item = {};
   
if (!window.platform.content_item_type)
    window.platform.content_item_type = {};
   
if (!window.platform.content_page)
    window.platform.content_page = {};
   
if (!window.platform.message)
    window.platform.message = {};
   
if (!window.platform.offer)
    window.platform.offer = {};
   
if (!window.platform.offer_type)
    window.platform.offer_type = {};
   
if (!window.platform.offer_location)
    window.platform.offer_location = {};
   
if (!window.platform.offer_category)
    window.platform.offer_category = {};
   
if (!window.platform.offer_category_tree)
    window.platform.offer_category_tree = {};
   
if (!window.platform.offer_category_assoc)
    window.platform.offer_category_assoc = {};
   
if (!window.platform.offer_game_location)
    window.platform.offer_game_location = {};
   
if (!window.platform.event_info)
    window.platform.event_info = {};
   
if (!window.platform.event_location)
    window.platform.event_location = {};
   
if (!window.platform.event_category)
    window.platform.event_category = {};
   
if (!window.platform.event_category_tree)
    window.platform.event_category_tree = {};
   
if (!window.platform.event_category_assoc)
    window.platform.event_category_assoc = {};
   
if (!window.platform.channel)
    window.platform.channel = {};
   
if (!window.platform.channel_type)
    window.platform.channel_type = {};
   
if (!window.platform.question)
    window.platform.question = {};
   
if (!window.platform.profile_offer)
    window.platform.profile_offer = {};
   
if (!window.platform.profile_app)
    window.platform.profile_app = {};
   
if (!window.platform.profile_org)
    window.platform.profile_org = {};
   
if (!window.platform.profile_question)
    window.platform.profile_question = {};
   
if (!window.platform.profile_channel)
    window.platform.profile_channel = {};
   
if (!window.platform.org_site)
    window.platform.org_site = {};
   
if (!window.platform.site_app)
    window.platform.site_app = {};
   
if (!window.platform.photo)
    window.platform.photo = {};
   
if (!window.platform.video)
    window.platform.video = {};
   

//-------------------------------------------------
platform.platform.global = function() {

    this.url = document.location;
    this.service_base = '/api/v1/';
    this.base_entity_service = this.service_base + 'base_entity/';
    this.base_meta_service = this.service_base + 'base_meta/';
    this.base_location_service = this.service_base + 'base_location/';
    this.app_service = this.service_base + 'app/';
    this.app_type_service = this.service_base + 'app_type/';
    this.site_service = this.service_base + 'site/';
    this.site_type_service = this.service_base + 'site_type/';
    this.org_service = this.service_base + 'org/';
    this.org_type_service = this.service_base + 'org_type/';
    this.content_item_service = this.service_base + 'content_item/';
    this.content_item_type_service = this.service_base + 'content_item_type/';
    this.content_page_service = this.service_base + 'content_page/';
    this.message_service = this.service_base + 'message/';
    this.offer_service = this.service_base + 'offer/';
    this.offer_type_service = this.service_base + 'offer_type/';
    this.offer_location_service = this.service_base + 'offer_location/';
    this.offer_category_service = this.service_base + 'offer_category/';
    this.offer_category_tree_service = this.service_base + 'offer_category_tree/';
    this.offer_category_assoc_service = this.service_base + 'offer_category_assoc/';
    this.offer_game_location_service = this.service_base + 'offer_game_location/';
    this.event_info_service = this.service_base + 'event_info/';
    this.event_location_service = this.service_base + 'event_location/';
    this.event_category_service = this.service_base + 'event_category/';
    this.event_category_tree_service = this.service_base + 'event_category_tree/';
    this.event_category_assoc_service = this.service_base + 'event_category_assoc/';
    this.channel_service = this.service_base + 'channel/';
    this.channel_type_service = this.service_base + 'channel_type/';
    this.question_service = this.service_base + 'question/';
    this.profile_offer_service = this.service_base + 'profile_offer/';
    this.profile_app_service = this.service_base + 'profile_app/';
    this.profile_org_service = this.service_base + 'profile_org/';
    this.profile_question_service = this.service_base + 'profile_question/';
    this.profile_channel_service = this.service_base + 'profile_channel/';
    this.org_site_service = this.service_base + 'org_site/';
    this.site_app_service = this.service_base + 'site_app/';
    this.photo_service = this.service_base + 'photo/';
    this.video_service = this.service_base + 'video/';
}

var platform_platform_global = new platform.platform.global();
       
//-------------------------------------------------
platform.base_entity = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.base_entity.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
}
//-------------------------------------------------
platform.base_meta = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.base_meta.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
}
//-------------------------------------------------
platform.base_location = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.base_location.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
}
//-------------------------------------------------
platform.app = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.app.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_app: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_count_app_callback", true);
            // call a method that can be inline callback
            try {error_count_app(data);} catch(e) { _log("Error calling: error_count_app: " + e);}
        }
        else {
            _log("SUCCESS::app_count_app_callback", false);
            // call a method that can be inline callback
            try {handle_count_app(data);} catch(e) { _log("Error calling: handle_count_app: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_count_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_app_uuid(data);} catch(e) { _log("Error calling: error_count_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_count_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_uuid(data);} catch(e) { _log("Error calling: handle_count_app_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_count_app_code_callback", true);
            // call a method that can be inline callback
            try {error_count_app_code(data);} catch(e) { _log("Error calling: error_count_app_code: " + e);}
        }
        else {
            _log("SUCCESS::app_count_app_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_code(data);} catch(e) { _log("Error calling: handle_count_app_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'count'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_count_app_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_app_type_id(data);} catch(e) { _log("Error calling: error_count_app_type_id: " + e);}
        }
        else {
            _log("SUCCESS::app_count_app_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_type_id(data);} catch(e) { _log("Error calling: handle_count_app_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_code_type_id: function
    (
        code,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'count'
                + "/by-code/by-type-id"
                + "/@code/" + code            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_code_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_count_app_code_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_app_code_type_id(data);} catch(e) { _log("Error calling: error_count_app_code_type_id: " + e);}
        }
        else {
            _log("SUCCESS::app_count_app_code_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_code_type_id(data);} catch(e) { _log("Error calling: handle_count_app_code_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_platform_type_id: function
    (
        platform,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'count'
                + "/by-platform/by-type-id"
                + "/@platform/" + platform            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_platform_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_count_app_platform_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_app_platform_type_id(data);} catch(e) { _log("Error calling: error_count_app_platform_type_id: " + e);}
        }
        else {
            _log("SUCCESS::app_count_app_platform_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_platform_type_id(data);} catch(e) { _log("Error calling: handle_count_app_platform_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_platform: function
    (
        platform,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'count'
                + "/by-platform"
                + "/@platform/" + platform            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_platform_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_count_app_platform_callback", true);
            // call a method that can be inline callback
            try {error_count_app_platform(data);} catch(e) { _log("Error calling: error_count_app_platform: " + e);}
        }
        else {
            _log("SUCCESS::app_count_app_platform_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_platform(data);} catch(e) { _log("Error calling: handle_count_app_platform: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_app_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_app_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_browse_app_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_app_filter(data);} catch(e) { _log("Error calling: error_browse_app_filter: " + e);}
        }
        else {
            _log("SUCCESS::app_browse_app_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_app_filter(data);} catch(e) { _log("Error calling: handle_browse_app_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_app_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        uuid,
        platform,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@uuid": uuid
            , "@platform": platform
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_set_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_app_uuid(data);} catch(e) { _log("Error calling: error_set_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_set_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_app_uuid(data);} catch(e) { _log("Error calling: handle_set_app_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_app_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        uuid,
        platform,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'set'
                + "/by-code"
                + "/@code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@uuid": uuid
            , "@platform": platform
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_app_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_set_app_code_callback", true);
            // call a method that can be inline callback
            try {error_set_app_code(data);} catch(e) { _log("Error calling: error_set_app_code: " + e);}
        }
        else {
            _log("SUCCESS::app_set_app_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_app_code(data);} catch(e) { _log("Error calling: handle_set_app_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_del_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_app_uuid(data);} catch(e) { _log("Error calling: error_del_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_del_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_app_uuid(data);} catch(e) { _log("Error calling: handle_del_app_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_app_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'del'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_app_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_del_app_code_callback", true);
            // call a method that can be inline callback
            try {error_del_app_code(data);} catch(e) { _log("Error calling: error_del_app_code: " + e);}
        }
        else {
            _log("SUCCESS::app_del_app_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_app_code(data);} catch(e) { _log("Error calling: handle_del_app_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_get_app_callback", true);
            // call a method that can be inline callback
            try {error_get_app(data);} catch(e) { _log("Error calling: error_get_app: " + e);}
        }
        else {
            _log("SUCCESS::app_get_app_callback", false);
            // call a method that can be inline callback
            try {handle_get_app(data);} catch(e) { _log("Error calling: handle_get_app: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_get_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_app_uuid(data);} catch(e) { _log("Error calling: error_get_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_get_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_uuid(data);} catch(e) { _log("Error calling: handle_get_app_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_get_app_code_callback", true);
            // call a method that can be inline callback
            try {error_get_app_code(data);} catch(e) { _log("Error calling: error_get_app_code: " + e);}
        }
        else {
            _log("SUCCESS::app_get_app_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_code(data);} catch(e) { _log("Error calling: handle_get_app_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'get'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_get_app_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_app_type_id(data);} catch(e) { _log("Error calling: error_get_app_type_id: " + e);}
        }
        else {
            _log("SUCCESS::app_get_app_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_type_id(data);} catch(e) { _log("Error calling: handle_get_app_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_code_type_id: function
    (
        code,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'get'
                + "/by-code/by-type-id"
                + "/@code/" + code            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_code_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_get_app_code_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_app_code_type_id(data);} catch(e) { _log("Error calling: error_get_app_code_type_id: " + e);}
        }
        else {
            _log("SUCCESS::app_get_app_code_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_code_type_id(data);} catch(e) { _log("Error calling: handle_get_app_code_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_platform_type_id: function
    (
        platform,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'get'
                + "/by-platform/by-type-id"
                + "/@platform/" + platform            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_platform_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_get_app_platform_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_app_platform_type_id(data);} catch(e) { _log("Error calling: error_get_app_platform_type_id: " + e);}
        }
        else {
            _log("SUCCESS::app_get_app_platform_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_platform_type_id(data);} catch(e) { _log("Error calling: handle_get_app_platform_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_platform: function
    (
        platform,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_service + 'get'
                + "/by-platform"
                + "/@platform/" + platform            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_platform_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_get_app_platform_callback", true);
            // call a method that can be inline callback
            try {error_get_app_platform(data);} catch(e) { _log("Error calling: error_get_app_platform: " + e);}
        }
        else {
            _log("SUCCESS::app_get_app_platform_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_platform(data);} catch(e) { _log("Error calling: handle_get_app_platform: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.app_type = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.app_type.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_app_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_count_app_type_callback", true);
            // call a method that can be inline callback
            try {error_count_app_type(data);} catch(e) { _log("Error calling: error_count_app_type: " + e);}
        }
        else {
            _log("SUCCESS::app_type_count_app_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_type(data);} catch(e) { _log("Error calling: handle_count_app_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_count_app_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_app_type_uuid(data);} catch(e) { _log("Error calling: error_count_app_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_type_count_app_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_type_uuid(data);} catch(e) { _log("Error calling: handle_count_app_type_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_app_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_app_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_count_app_type_code_callback", true);
            // call a method that can be inline callback
            try {error_count_app_type_code(data);} catch(e) { _log("Error calling: error_count_app_type_code: " + e);}
        }
        else {
            _log("SUCCESS::app_type_count_app_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_app_type_code(data);} catch(e) { _log("Error calling: handle_count_app_type_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_app_type_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_app_type_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_browse_app_type_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_app_type_filter(data);} catch(e) { _log("Error calling: error_browse_app_type_filter: " + e);}
        }
        else {
            _log("SUCCESS::app_type_browse_app_type_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_app_type_filter(data);} catch(e) { _log("Error calling: handle_browse_app_type_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_app_type_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_app_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_set_app_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_app_type_uuid(data);} catch(e) { _log("Error calling: error_set_app_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_type_set_app_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_app_type_uuid(data);} catch(e) { _log("Error calling: handle_set_app_type_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_app_type_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'set'
                + "/by-code"
                + "/@code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_app_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_set_app_type_code_callback", true);
            // call a method that can be inline callback
            try {error_set_app_type_code(data);} catch(e) { _log("Error calling: error_set_app_type_code: " + e);}
        }
        else {
            _log("SUCCESS::app_type_set_app_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_app_type_code(data);} catch(e) { _log("Error calling: handle_set_app_type_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_app_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_app_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_del_app_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_app_type_uuid(data);} catch(e) { _log("Error calling: error_del_app_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_type_del_app_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_app_type_uuid(data);} catch(e) { _log("Error calling: handle_del_app_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_app_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'del'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_app_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_del_app_type_code_callback", true);
            // call a method that can be inline callback
            try {error_del_app_type_code(data);} catch(e) { _log("Error calling: error_del_app_type_code: " + e);}
        }
        else {
            _log("SUCCESS::app_type_del_app_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_app_type_code(data);} catch(e) { _log("Error calling: handle_del_app_type_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_get_app_type_callback", true);
            // call a method that can be inline callback
            try {error_get_app_type(data);} catch(e) { _log("Error calling: error_get_app_type: " + e);}
        }
        else {
            _log("SUCCESS::app_type_get_app_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_type(data);} catch(e) { _log("Error calling: handle_get_app_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_get_app_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_app_type_uuid(data);} catch(e) { _log("Error calling: error_get_app_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::app_type_get_app_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_type_uuid(data);} catch(e) { _log("Error calling: handle_get_app_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_app_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.app_type_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_app_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::app_type_get_app_type_code_callback", true);
            // call a method that can be inline callback
            try {error_get_app_type_code(data);} catch(e) { _log("Error calling: error_get_app_type_code: " + e);}
        }
        else {
            _log("SUCCESS::app_type_get_app_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_app_type_code(data);} catch(e) { _log("Error calling: handle_get_app_type_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.site = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.site.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_site: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_count_site_callback", true);
            // call a method that can be inline callback
            try {error_count_site(data);} catch(e) { _log("Error calling: error_count_site: " + e);}
        }
        else {
            _log("SUCCESS::site_count_site_callback", false);
            // call a method that can be inline callback
            try {handle_count_site(data);} catch(e) { _log("Error calling: handle_count_site: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_count_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_site_uuid(data);} catch(e) { _log("Error calling: error_count_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_count_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_uuid(data);} catch(e) { _log("Error calling: handle_count_site_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_count_site_code_callback", true);
            // call a method that can be inline callback
            try {error_count_site_code(data);} catch(e) { _log("Error calling: error_count_site_code: " + e);}
        }
        else {
            _log("SUCCESS::site_count_site_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_code(data);} catch(e) { _log("Error calling: handle_count_site_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'count'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_count_site_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_site_type_id(data);} catch(e) { _log("Error calling: error_count_site_type_id: " + e);}
        }
        else {
            _log("SUCCESS::site_count_site_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_type_id(data);} catch(e) { _log("Error calling: handle_count_site_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_code_type_id: function
    (
        code,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'count'
                + "/by-code/by-type-id"
                + "/@code/" + code            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_code_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_count_site_code_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_site_code_type_id(data);} catch(e) { _log("Error calling: error_count_site_code_type_id: " + e);}
        }
        else {
            _log("SUCCESS::site_count_site_code_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_code_type_id(data);} catch(e) { _log("Error calling: handle_count_site_code_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_domain_type_id: function
    (
        domain,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'count'
                + "/by-domain/by-type-id"
                + "/@domain/" + domain            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_domain_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_count_site_domain_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_site_domain_type_id(data);} catch(e) { _log("Error calling: error_count_site_domain_type_id: " + e);}
        }
        else {
            _log("SUCCESS::site_count_site_domain_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_domain_type_id(data);} catch(e) { _log("Error calling: handle_count_site_domain_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_domain: function
    (
        domain,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'count'
                + "/by-domain"
                + "/@domain/" + domain            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_domain_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_count_site_domain_callback", true);
            // call a method that can be inline callback
            try {error_count_site_domain(data);} catch(e) { _log("Error calling: error_count_site_domain: " + e);}
        }
        else {
            _log("SUCCESS::site_count_site_domain_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_domain(data);} catch(e) { _log("Error calling: handle_count_site_domain: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_site_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_site_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_browse_site_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_site_filter(data);} catch(e) { _log("Error calling: error_browse_site_filter: " + e);}
        }
        else {
            _log("SUCCESS::site_browse_site_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_site_filter(data);} catch(e) { _log("Error calling: handle_browse_site_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_site_uuid: function
    (
        status,
        domain,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@domain": domain
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_set_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_site_uuid(data);} catch(e) { _log("Error calling: error_set_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_set_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_site_uuid(data);} catch(e) { _log("Error calling: handle_set_site_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_site_code: function
    (
        status,
        domain,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'set'
                + "/by-code"
                + "/@code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@domain": domain
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_site_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_set_site_code_callback", true);
            // call a method that can be inline callback
            try {error_set_site_code(data);} catch(e) { _log("Error calling: error_set_site_code: " + e);}
        }
        else {
            _log("SUCCESS::site_set_site_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_site_code(data);} catch(e) { _log("Error calling: handle_set_site_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_site_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_del_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_site_uuid(data);} catch(e) { _log("Error calling: error_del_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_del_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_site_uuid(data);} catch(e) { _log("Error calling: handle_del_site_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_site_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'del'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_site_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_del_site_code_callback", true);
            // call a method that can be inline callback
            try {error_del_site_code(data);} catch(e) { _log("Error calling: error_del_site_code: " + e);}
        }
        else {
            _log("SUCCESS::site_del_site_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_site_code(data);} catch(e) { _log("Error calling: handle_del_site_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_get_site_callback", true);
            // call a method that can be inline callback
            try {error_get_site(data);} catch(e) { _log("Error calling: error_get_site: " + e);}
        }
        else {
            _log("SUCCESS::site_get_site_callback", false);
            // call a method that can be inline callback
            try {handle_get_site(data);} catch(e) { _log("Error calling: handle_get_site: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_get_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_site_uuid(data);} catch(e) { _log("Error calling: error_get_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_get_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_uuid(data);} catch(e) { _log("Error calling: handle_get_site_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_get_site_code_callback", true);
            // call a method that can be inline callback
            try {error_get_site_code(data);} catch(e) { _log("Error calling: error_get_site_code: " + e);}
        }
        else {
            _log("SUCCESS::site_get_site_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_code(data);} catch(e) { _log("Error calling: handle_get_site_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'get'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_get_site_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_site_type_id(data);} catch(e) { _log("Error calling: error_get_site_type_id: " + e);}
        }
        else {
            _log("SUCCESS::site_get_site_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_type_id(data);} catch(e) { _log("Error calling: handle_get_site_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_code_type_id: function
    (
        code,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'get'
                + "/by-code/by-type-id"
                + "/@code/" + code            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_code_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_get_site_code_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_site_code_type_id(data);} catch(e) { _log("Error calling: error_get_site_code_type_id: " + e);}
        }
        else {
            _log("SUCCESS::site_get_site_code_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_code_type_id(data);} catch(e) { _log("Error calling: handle_get_site_code_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_domain_type_id: function
    (
        domain,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'get'
                + "/by-domain/by-type-id"
                + "/@domain/" + domain            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_domain_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_get_site_domain_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_site_domain_type_id(data);} catch(e) { _log("Error calling: error_get_site_domain_type_id: " + e);}
        }
        else {
            _log("SUCCESS::site_get_site_domain_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_domain_type_id(data);} catch(e) { _log("Error calling: handle_get_site_domain_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_domain: function
    (
        domain,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_service + 'get'
                + "/by-domain"
                + "/@domain/" + domain            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_domain_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_get_site_domain_callback", true);
            // call a method that can be inline callback
            try {error_get_site_domain(data);} catch(e) { _log("Error calling: error_get_site_domain: " + e);}
        }
        else {
            _log("SUCCESS::site_get_site_domain_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_domain(data);} catch(e) { _log("Error calling: handle_get_site_domain: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.site_type = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.site_type.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_site_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_count_site_type_callback", true);
            // call a method that can be inline callback
            try {error_count_site_type(data);} catch(e) { _log("Error calling: error_count_site_type: " + e);}
        }
        else {
            _log("SUCCESS::site_type_count_site_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_type(data);} catch(e) { _log("Error calling: handle_count_site_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_count_site_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_site_type_uuid(data);} catch(e) { _log("Error calling: error_count_site_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_type_count_site_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_type_uuid(data);} catch(e) { _log("Error calling: handle_count_site_type_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_count_site_type_code_callback", true);
            // call a method that can be inline callback
            try {error_count_site_type_code(data);} catch(e) { _log("Error calling: error_count_site_type_code: " + e);}
        }
        else {
            _log("SUCCESS::site_type_count_site_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_type_code(data);} catch(e) { _log("Error calling: handle_count_site_type_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_site_type_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_site_type_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_browse_site_type_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_site_type_filter(data);} catch(e) { _log("Error calling: error_browse_site_type_filter: " + e);}
        }
        else {
            _log("SUCCESS::site_type_browse_site_type_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_site_type_filter(data);} catch(e) { _log("Error calling: handle_browse_site_type_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_site_type_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_site_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_set_site_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_site_type_uuid(data);} catch(e) { _log("Error calling: error_set_site_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_type_set_site_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_site_type_uuid(data);} catch(e) { _log("Error calling: handle_set_site_type_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_site_type_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'set'
                + "/by-code"
                + "/@code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_site_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_set_site_type_code_callback", true);
            // call a method that can be inline callback
            try {error_set_site_type_code(data);} catch(e) { _log("Error calling: error_set_site_type_code: " + e);}
        }
        else {
            _log("SUCCESS::site_type_set_site_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_site_type_code(data);} catch(e) { _log("Error calling: handle_set_site_type_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_site_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_site_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_del_site_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_site_type_uuid(data);} catch(e) { _log("Error calling: error_del_site_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_type_del_site_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_site_type_uuid(data);} catch(e) { _log("Error calling: handle_del_site_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_site_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'del'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_site_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_del_site_type_code_callback", true);
            // call a method that can be inline callback
            try {error_del_site_type_code(data);} catch(e) { _log("Error calling: error_del_site_type_code: " + e);}
        }
        else {
            _log("SUCCESS::site_type_del_site_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_site_type_code(data);} catch(e) { _log("Error calling: handle_del_site_type_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_get_site_type_callback", true);
            // call a method that can be inline callback
            try {error_get_site_type(data);} catch(e) { _log("Error calling: error_get_site_type: " + e);}
        }
        else {
            _log("SUCCESS::site_type_get_site_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_type(data);} catch(e) { _log("Error calling: handle_get_site_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_get_site_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_site_type_uuid(data);} catch(e) { _log("Error calling: error_get_site_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_type_get_site_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_type_uuid(data);} catch(e) { _log("Error calling: handle_get_site_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_type_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_type_get_site_type_code_callback", true);
            // call a method that can be inline callback
            try {error_get_site_type_code(data);} catch(e) { _log("Error calling: error_get_site_type_code: " + e);}
        }
        else {
            _log("SUCCESS::site_type_get_site_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_type_code(data);} catch(e) { _log("Error calling: handle_get_site_type_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.org = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.org.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_org: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_count_org_callback", true);
            // call a method that can be inline callback
            try {error_count_org(data);} catch(e) { _log("Error calling: error_count_org: " + e);}
        }
        else {
            _log("SUCCESS::org_count_org_callback", false);
            // call a method that can be inline callback
            try {handle_count_org(data);} catch(e) { _log("Error calling: handle_count_org: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_count_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_org_uuid(data);} catch(e) { _log("Error calling: error_count_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_count_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_uuid(data);} catch(e) { _log("Error calling: handle_count_org_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_count_org_code_callback", true);
            // call a method that can be inline callback
            try {error_count_org_code(data);} catch(e) { _log("Error calling: error_count_org_code: " + e);}
        }
        else {
            _log("SUCCESS::org_count_org_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_code(data);} catch(e) { _log("Error calling: handle_count_org_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_count_org_name_callback", true);
            // call a method that can be inline callback
            try {error_count_org_name(data);} catch(e) { _log("Error calling: error_count_org_name: " + e);}
        }
        else {
            _log("SUCCESS::org_count_org_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_name(data);} catch(e) { _log("Error calling: handle_count_org_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_org_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_org_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_browse_org_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_org_filter(data);} catch(e) { _log("Error calling: error_browse_org_filter: " + e);}
        }
        else {
            _log("SUCCESS::org_browse_org_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_org_filter(data);} catch(e) { _log("Error calling: handle_browse_org_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_org_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_set_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_org_uuid(data);} catch(e) { _log("Error calling: error_set_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_set_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_org_uuid(data);} catch(e) { _log("Error calling: handle_set_org_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_org_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_del_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_org_uuid(data);} catch(e) { _log("Error calling: error_del_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_del_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_org_uuid(data);} catch(e) { _log("Error calling: handle_del_org_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_get_org_callback", true);
            // call a method that can be inline callback
            try {error_get_org(data);} catch(e) { _log("Error calling: error_get_org: " + e);}
        }
        else {
            _log("SUCCESS::org_get_org_callback", false);
            // call a method that can be inline callback
            try {handle_get_org(data);} catch(e) { _log("Error calling: handle_get_org: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_get_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_org_uuid(data);} catch(e) { _log("Error calling: error_get_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_get_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_uuid(data);} catch(e) { _log("Error calling: handle_get_org_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_get_org_code_callback", true);
            // call a method that can be inline callback
            try {error_get_org_code(data);} catch(e) { _log("Error calling: error_get_org_code: " + e);}
        }
        else {
            _log("SUCCESS::org_get_org_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_code(data);} catch(e) { _log("Error calling: handle_get_org_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_get_org_name_callback", true);
            // call a method that can be inline callback
            try {error_get_org_name(data);} catch(e) { _log("Error calling: error_get_org_name: " + e);}
        }
        else {
            _log("SUCCESS::org_get_org_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_name(data);} catch(e) { _log("Error calling: handle_get_org_name: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.org_type = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.org_type.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_org_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_count_org_type_callback", true);
            // call a method that can be inline callback
            try {error_count_org_type(data);} catch(e) { _log("Error calling: error_count_org_type: " + e);}
        }
        else {
            _log("SUCCESS::org_type_count_org_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_type(data);} catch(e) { _log("Error calling: handle_count_org_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_count_org_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_org_type_uuid(data);} catch(e) { _log("Error calling: error_count_org_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_type_count_org_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_type_uuid(data);} catch(e) { _log("Error calling: handle_count_org_type_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_count_org_type_code_callback", true);
            // call a method that can be inline callback
            try {error_count_org_type_code(data);} catch(e) { _log("Error calling: error_count_org_type_code: " + e);}
        }
        else {
            _log("SUCCESS::org_type_count_org_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_type_code(data);} catch(e) { _log("Error calling: handle_count_org_type_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_org_type_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_org_type_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_browse_org_type_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_org_type_filter(data);} catch(e) { _log("Error calling: error_browse_org_type_filter: " + e);}
        }
        else {
            _log("SUCCESS::org_type_browse_org_type_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_org_type_filter(data);} catch(e) { _log("Error calling: handle_browse_org_type_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_org_type_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_org_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_set_org_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_org_type_uuid(data);} catch(e) { _log("Error calling: error_set_org_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_type_set_org_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_org_type_uuid(data);} catch(e) { _log("Error calling: handle_set_org_type_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_org_type_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'set'
                + "/by-code"
                + "/@code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_org_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_set_org_type_code_callback", true);
            // call a method that can be inline callback
            try {error_set_org_type_code(data);} catch(e) { _log("Error calling: error_set_org_type_code: " + e);}
        }
        else {
            _log("SUCCESS::org_type_set_org_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_org_type_code(data);} catch(e) { _log("Error calling: handle_set_org_type_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_org_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_org_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_del_org_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_org_type_uuid(data);} catch(e) { _log("Error calling: error_del_org_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_type_del_org_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_org_type_uuid(data);} catch(e) { _log("Error calling: handle_del_org_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_org_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'del'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_org_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_del_org_type_code_callback", true);
            // call a method that can be inline callback
            try {error_del_org_type_code(data);} catch(e) { _log("Error calling: error_del_org_type_code: " + e);}
        }
        else {
            _log("SUCCESS::org_type_del_org_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_org_type_code(data);} catch(e) { _log("Error calling: handle_del_org_type_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_get_org_type_callback", true);
            // call a method that can be inline callback
            try {error_get_org_type(data);} catch(e) { _log("Error calling: error_get_org_type: " + e);}
        }
        else {
            _log("SUCCESS::org_type_get_org_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_type(data);} catch(e) { _log("Error calling: handle_get_org_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_get_org_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_org_type_uuid(data);} catch(e) { _log("Error calling: error_get_org_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_type_get_org_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_type_uuid(data);} catch(e) { _log("Error calling: handle_get_org_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_type_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_type_get_org_type_code_callback", true);
            // call a method that can be inline callback
            try {error_get_org_type_code(data);} catch(e) { _log("Error calling: error_get_org_type_code: " + e);}
        }
        else {
            _log("SUCCESS::org_type_get_org_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_type_code(data);} catch(e) { _log("Error calling: handle_get_org_type_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.content_item = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.content_item.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_content_item: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_count_content_item_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item(data);} catch(e) { _log("Error calling: error_count_content_item: " + e);}
        }
        else {
            _log("SUCCESS::content_item_count_content_item_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item(data);} catch(e) { _log("Error calling: handle_count_content_item: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_item_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_count_content_item_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item_uuid(data);} catch(e) { _log("Error calling: error_count_content_item_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_count_content_item_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item_uuid(data);} catch(e) { _log("Error calling: handle_count_content_item_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_item_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_count_content_item_code_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item_code(data);} catch(e) { _log("Error calling: error_count_content_item_code: " + e);}
        }
        else {
            _log("SUCCESS::content_item_count_content_item_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item_code(data);} catch(e) { _log("Error calling: handle_count_content_item_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_item_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_count_content_item_name_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item_name(data);} catch(e) { _log("Error calling: error_count_content_item_name: " + e);}
        }
        else {
            _log("SUCCESS::content_item_count_content_item_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item_name(data);} catch(e) { _log("Error calling: handle_count_content_item_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_item_path: function
    (
        path,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'count'
                + "/by-path"
                + "/@path/" + path            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_path_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_count_content_item_path_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item_path(data);} catch(e) { _log("Error calling: error_count_content_item_path: " + e);}
        }
        else {
            _log("SUCCESS::content_item_count_content_item_path_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item_path(data);} catch(e) { _log("Error calling: handle_count_content_item_path: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_content_item_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_content_item_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_browse_content_item_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_content_item_filter(data);} catch(e) { _log("Error calling: error_browse_content_item_filter: " + e);}
        }
        else {
            _log("SUCCESS::content_item_browse_content_item_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_content_item_filter(data);} catch(e) { _log("Error calling: handle_browse_content_item_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_content_item_uuid: function
    (
        status,
        type_id,
        code,
        display_name,
        name,
        date_modified,
        data,
        date_end,
        date_start,
        uuid,
        path,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@type_id": type_id
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@data": data
            , "@date_end": date_end
            , "@date_start": date_start
            , "@uuid": uuid
            , "@path": path
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_content_item_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_set_content_item_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_content_item_uuid(data);} catch(e) { _log("Error calling: error_set_content_item_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_set_content_item_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_content_item_uuid(data);} catch(e) { _log("Error calling: handle_set_content_item_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_content_item_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_content_item_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_del_content_item_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_content_item_uuid(data);} catch(e) { _log("Error calling: error_del_content_item_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_del_content_item_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_content_item_uuid(data);} catch(e) { _log("Error calling: handle_del_content_item_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_content_item_path: function
    (
        path,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'del'
                + "/by-path"
                + "/@path/" + path            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_content_item_path_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_del_content_item_path_callback", true);
            // call a method that can be inline callback
            try {error_del_content_item_path(data);} catch(e) { _log("Error calling: error_del_content_item_path: " + e);}
        }
        else {
            _log("SUCCESS::content_item_del_content_item_path_callback", false);
            // call a method that can be inline callback
            try {handle_del_content_item_path(data);} catch(e) { _log("Error calling: handle_del_content_item_path: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_get_content_item_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item(data);} catch(e) { _log("Error calling: error_get_content_item: " + e);}
        }
        else {
            _log("SUCCESS::content_item_get_content_item_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item(data);} catch(e) { _log("Error calling: handle_get_content_item: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_get_content_item_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item_uuid(data);} catch(e) { _log("Error calling: error_get_content_item_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_get_content_item_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item_uuid(data);} catch(e) { _log("Error calling: handle_get_content_item_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_get_content_item_code_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item_code(data);} catch(e) { _log("Error calling: error_get_content_item_code: " + e);}
        }
        else {
            _log("SUCCESS::content_item_get_content_item_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item_code(data);} catch(e) { _log("Error calling: handle_get_content_item_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_get_content_item_name_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item_name(data);} catch(e) { _log("Error calling: error_get_content_item_name: " + e);}
        }
        else {
            _log("SUCCESS::content_item_get_content_item_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item_name(data);} catch(e) { _log("Error calling: handle_get_content_item_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item_path: function
    (
        path,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_service + 'get'
                + "/by-path"
                + "/@path/" + path            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_path_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_get_content_item_path_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item_path(data);} catch(e) { _log("Error calling: error_get_content_item_path: " + e);}
        }
        else {
            _log("SUCCESS::content_item_get_content_item_path_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item_path(data);} catch(e) { _log("Error calling: handle_get_content_item_path: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.content_item_type = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.content_item_type.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_content_item_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_count_content_item_type_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item_type(data);} catch(e) { _log("Error calling: error_count_content_item_type: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_count_content_item_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item_type(data);} catch(e) { _log("Error calling: handle_count_content_item_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_item_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_count_content_item_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item_type_uuid(data);} catch(e) { _log("Error calling: error_count_content_item_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_count_content_item_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item_type_uuid(data);} catch(e) { _log("Error calling: handle_count_content_item_type_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_item_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_item_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_count_content_item_type_code_callback", true);
            // call a method that can be inline callback
            try {error_count_content_item_type_code(data);} catch(e) { _log("Error calling: error_count_content_item_type_code: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_count_content_item_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_item_type_code(data);} catch(e) { _log("Error calling: handle_count_content_item_type_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_content_item_type_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_content_item_type_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_browse_content_item_type_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_content_item_type_filter(data);} catch(e) { _log("Error calling: error_browse_content_item_type_filter: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_browse_content_item_type_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_content_item_type_filter(data);} catch(e) { _log("Error calling: handle_browse_content_item_type_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_content_item_type_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_content_item_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_set_content_item_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_content_item_type_uuid(data);} catch(e) { _log("Error calling: error_set_content_item_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_set_content_item_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_content_item_type_uuid(data);} catch(e) { _log("Error calling: handle_set_content_item_type_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_content_item_type_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'set'
                + "/by-code"
                + "/@code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_content_item_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_set_content_item_type_code_callback", true);
            // call a method that can be inline callback
            try {error_set_content_item_type_code(data);} catch(e) { _log("Error calling: error_set_content_item_type_code: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_set_content_item_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_content_item_type_code(data);} catch(e) { _log("Error calling: handle_set_content_item_type_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_content_item_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_content_item_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_del_content_item_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_content_item_type_uuid(data);} catch(e) { _log("Error calling: error_del_content_item_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_del_content_item_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_content_item_type_uuid(data);} catch(e) { _log("Error calling: handle_del_content_item_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_content_item_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'del'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_content_item_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_del_content_item_type_code_callback", true);
            // call a method that can be inline callback
            try {error_del_content_item_type_code(data);} catch(e) { _log("Error calling: error_del_content_item_type_code: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_del_content_item_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_content_item_type_code(data);} catch(e) { _log("Error calling: handle_del_content_item_type_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_get_content_item_type_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item_type(data);} catch(e) { _log("Error calling: error_get_content_item_type: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_get_content_item_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item_type(data);} catch(e) { _log("Error calling: handle_get_content_item_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_get_content_item_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item_type_uuid(data);} catch(e) { _log("Error calling: error_get_content_item_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_get_content_item_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item_type_uuid(data);} catch(e) { _log("Error calling: handle_get_content_item_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_item_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_item_type_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_item_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_item_type_get_content_item_type_code_callback", true);
            // call a method that can be inline callback
            try {error_get_content_item_type_code(data);} catch(e) { _log("Error calling: error_get_content_item_type_code: " + e);}
        }
        else {
            _log("SUCCESS::content_item_type_get_content_item_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_item_type_code(data);} catch(e) { _log("Error calling: handle_get_content_item_type_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.content_page = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.content_page.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_content_page: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_page_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_count_content_page_callback", true);
            // call a method that can be inline callback
            try {error_count_content_page(data);} catch(e) { _log("Error calling: error_count_content_page: " + e);}
        }
        else {
            _log("SUCCESS::content_page_count_content_page_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_page(data);} catch(e) { _log("Error calling: handle_count_content_page: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_page_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_page_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_count_content_page_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_content_page_uuid(data);} catch(e) { _log("Error calling: error_count_content_page_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_page_count_content_page_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_page_uuid(data);} catch(e) { _log("Error calling: handle_count_content_page_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_page_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_page_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_count_content_page_code_callback", true);
            // call a method that can be inline callback
            try {error_count_content_page_code(data);} catch(e) { _log("Error calling: error_count_content_page_code: " + e);}
        }
        else {
            _log("SUCCESS::content_page_count_content_page_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_page_code(data);} catch(e) { _log("Error calling: handle_count_content_page_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_page_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_page_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_count_content_page_name_callback", true);
            // call a method that can be inline callback
            try {error_count_content_page_name(data);} catch(e) { _log("Error calling: error_count_content_page_name: " + e);}
        }
        else {
            _log("SUCCESS::content_page_count_content_page_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_page_name(data);} catch(e) { _log("Error calling: handle_count_content_page_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_content_page_path: function
    (
        path,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'count'
                + "/by-path"
                + "/@path/" + path            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_content_page_path_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_count_content_page_path_callback", true);
            // call a method that can be inline callback
            try {error_count_content_page_path(data);} catch(e) { _log("Error calling: error_count_content_page_path: " + e);}
        }
        else {
            _log("SUCCESS::content_page_count_content_page_path_callback", false);
            // call a method that can be inline callback
            try {handle_count_content_page_path(data);} catch(e) { _log("Error calling: handle_count_content_page_path: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_content_page_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_content_page_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_browse_content_page_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_content_page_filter(data);} catch(e) { _log("Error calling: error_browse_content_page_filter: " + e);}
        }
        else {
            _log("SUCCESS::content_page_browse_content_page_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_content_page_filter(data);} catch(e) { _log("Error calling: handle_browse_content_page_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_content_page_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        date_end,
        date_start,
        site_id,
        uuid,
        template,
        path,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@date_end": date_end
            , "@date_start": date_start
            , "@site_id": site_id
            , "@uuid": uuid
            , "@template": template
            , "@path": path
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_content_page_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_set_content_page_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_content_page_uuid(data);} catch(e) { _log("Error calling: error_set_content_page_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_page_set_content_page_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_content_page_uuid(data);} catch(e) { _log("Error calling: handle_set_content_page_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_content_page_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_content_page_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_del_content_page_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_content_page_uuid(data);} catch(e) { _log("Error calling: error_del_content_page_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_page_del_content_page_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_content_page_uuid(data);} catch(e) { _log("Error calling: handle_del_content_page_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_content_page_path_site_id: function
    (
        path,
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'del'
                + "/by-path/by-site-id"
                + "/@path/" + path            
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_content_page_path_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_del_content_page_path_site_id_callback", true);
            // call a method that can be inline callback
            try {error_del_content_page_path_site_id(data);} catch(e) { _log("Error calling: error_del_content_page_path_site_id: " + e);}
        }
        else {
            _log("SUCCESS::content_page_del_content_page_path_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_content_page_path_site_id(data);} catch(e) { _log("Error calling: handle_del_content_page_path_site_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_content_page_path: function
    (
        path,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'del'
                + "/by-path"
                + "/@path/" + path            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_content_page_path_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_del_content_page_path_callback", true);
            // call a method that can be inline callback
            try {error_del_content_page_path(data);} catch(e) { _log("Error calling: error_del_content_page_path: " + e);}
        }
        else {
            _log("SUCCESS::content_page_del_content_page_path_callback", false);
            // call a method that can be inline callback
            try {handle_del_content_page_path(data);} catch(e) { _log("Error calling: handle_del_content_page_path: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_page: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_page_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_get_content_page_callback", true);
            // call a method that can be inline callback
            try {error_get_content_page(data);} catch(e) { _log("Error calling: error_get_content_page: " + e);}
        }
        else {
            _log("SUCCESS::content_page_get_content_page_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_page(data);} catch(e) { _log("Error calling: handle_get_content_page: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_page_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_page_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_get_content_page_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_content_page_uuid(data);} catch(e) { _log("Error calling: error_get_content_page_uuid: " + e);}
        }
        else {
            _log("SUCCESS::content_page_get_content_page_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_page_uuid(data);} catch(e) { _log("Error calling: handle_get_content_page_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_page_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_page_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_get_content_page_code_callback", true);
            // call a method that can be inline callback
            try {error_get_content_page_code(data);} catch(e) { _log("Error calling: error_get_content_page_code: " + e);}
        }
        else {
            _log("SUCCESS::content_page_get_content_page_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_page_code(data);} catch(e) { _log("Error calling: handle_get_content_page_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_page_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_page_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_get_content_page_name_callback", true);
            // call a method that can be inline callback
            try {error_get_content_page_name(data);} catch(e) { _log("Error calling: error_get_content_page_name: " + e);}
        }
        else {
            _log("SUCCESS::content_page_get_content_page_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_page_name(data);} catch(e) { _log("Error calling: handle_get_content_page_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_page_path: function
    (
        path,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'get'
                + "/by-path"
                + "/@path/" + path            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_page_path_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_get_content_page_path_callback", true);
            // call a method that can be inline callback
            try {error_get_content_page_path(data);} catch(e) { _log("Error calling: error_get_content_page_path: " + e);}
        }
        else {
            _log("SUCCESS::content_page_get_content_page_path_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_page_path(data);} catch(e) { _log("Error calling: handle_get_content_page_path: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_page_site_id: function
    (
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'get'
                + "/by-site-id"
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_page_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_get_content_page_site_id_callback", true);
            // call a method that can be inline callback
            try {error_get_content_page_site_id(data);} catch(e) { _log("Error calling: error_get_content_page_site_id: " + e);}
        }
        else {
            _log("SUCCESS::content_page_get_content_page_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_page_site_id(data);} catch(e) { _log("Error calling: handle_get_content_page_site_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_content_page_site_id_path: function
    (
        site_id,
        path,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.content_page_service + 'get'
                + "/by-site-id/by-path"
                + "/@site_id/" + site_id            
                + "/@path/" + path            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_content_page_site_id_path_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::content_page_get_content_page_site_id_path_callback", true);
            // call a method that can be inline callback
            try {error_get_content_page_site_id_path(data);} catch(e) { _log("Error calling: error_get_content_page_site_id_path: " + e);}
        }
        else {
            _log("SUCCESS::content_page_get_content_page_site_id_path_callback", false);
            // call a method that can be inline callback
            try {handle_get_content_page_site_id_path(data);} catch(e) { _log("Error calling: handle_get_content_page_site_id_path: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.message = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.message.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_message: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.message_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_message_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::message_count_message_callback", true);
            // call a method that can be inline callback
            try {error_count_message(data);} catch(e) { _log("Error calling: error_count_message: " + e);}
        }
        else {
            _log("SUCCESS::message_count_message_callback", false);
            // call a method that can be inline callback
            try {handle_count_message(data);} catch(e) { _log("Error calling: handle_count_message: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_message_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.message_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_message_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::message_count_message_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_message_uuid(data);} catch(e) { _log("Error calling: error_count_message_uuid: " + e);}
        }
        else {
            _log("SUCCESS::message_count_message_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_message_uuid(data);} catch(e) { _log("Error calling: handle_count_message_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_message_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.message_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_message_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::message_browse_message_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_message_filter(data);} catch(e) { _log("Error calling: error_browse_message_filter: " + e);}
        }
        else {
            _log("SUCCESS::message_browse_message_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_message_filter(data);} catch(e) { _log("Error calling: handle_browse_message_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_message_uuid: function
    (
        status,
        profile_from_name,
        read,
        profile_from_id,
        profile_to_token,
        app_id,
        active,
        subject,
        uuid,
        date_modified,
        profile_to_id,
        date_created,
        profile_to_name,
        type,
        sent,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.message_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@profile_from_name": profile_from_name
            , "@read": read
            , "@profile_from_id": profile_from_id
            , "@profile_to_token": profile_to_token
            , "@app_id": app_id
            , "@active": active
            , "@subject": subject
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@profile_to_id": profile_to_id
            , "@date_created": date_created
            , "@profile_to_name": profile_to_name
            , "@type": type
            , "@sent": sent
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_message_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::message_set_message_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_message_uuid(data);} catch(e) { _log("Error calling: error_set_message_uuid: " + e);}
        }
        else {
            _log("SUCCESS::message_set_message_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_message_uuid(data);} catch(e) { _log("Error calling: handle_set_message_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_message_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.message_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_message_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::message_del_message_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_message_uuid(data);} catch(e) { _log("Error calling: error_del_message_uuid: " + e);}
        }
        else {
            _log("SUCCESS::message_del_message_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_message_uuid(data);} catch(e) { _log("Error calling: handle_del_message_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_message: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.message_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_message_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::message_get_message_callback", true);
            // call a method that can be inline callback
            try {error_get_message(data);} catch(e) { _log("Error calling: error_get_message: " + e);}
        }
        else {
            _log("SUCCESS::message_get_message_callback", false);
            // call a method that can be inline callback
            try {handle_get_message(data);} catch(e) { _log("Error calling: handle_get_message: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_message_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.message_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_message_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::message_get_message_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_message_uuid(data);} catch(e) { _log("Error calling: error_get_message_uuid: " + e);}
        }
        else {
            _log("SUCCESS::message_get_message_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_message_uuid(data);} catch(e) { _log("Error calling: handle_get_message_uuid: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.offer = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.offer.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_offer: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_count_offer_callback", true);
            // call a method that can be inline callback
            try {error_count_offer(data);} catch(e) { _log("Error calling: error_count_offer: " + e);}
        }
        else {
            _log("SUCCESS::offer_count_offer_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer(data);} catch(e) { _log("Error calling: handle_count_offer: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_count_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_uuid(data);} catch(e) { _log("Error calling: error_count_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_count_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_uuid(data);} catch(e) { _log("Error calling: handle_count_offer_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_count_offer_code_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_code(data);} catch(e) { _log("Error calling: error_count_offer_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_count_offer_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_code(data);} catch(e) { _log("Error calling: handle_count_offer_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_count_offer_name_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_name(data);} catch(e) { _log("Error calling: error_count_offer_name: " + e);}
        }
        else {
            _log("SUCCESS::offer_count_offer_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_name(data);} catch(e) { _log("Error calling: handle_count_offer_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_count_offer_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_org_id(data);} catch(e) { _log("Error calling: error_count_offer_org_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_count_offer_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_org_id(data);} catch(e) { _log("Error calling: handle_count_offer_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_offer_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_offer_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_browse_offer_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_offer_filter(data);} catch(e) { _log("Error calling: error_browse_offer_filter: " + e);}
        }
        else {
            _log("SUCCESS::offer_browse_offer_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_offer_filter(data);} catch(e) { _log("Error calling: handle_browse_offer_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_offer_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        url,
        type_id,
        org_id,
        uuid,
        usage_count,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@type_id": type_id
            , "@org_id": org_id
            , "@uuid": uuid
            , "@usage_count": usage_count
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_set_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_offer_uuid(data);} catch(e) { _log("Error calling: error_set_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_set_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_offer_uuid(data);} catch(e) { _log("Error calling: handle_set_offer_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_offer_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_del_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_uuid(data);} catch(e) { _log("Error calling: error_del_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_del_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_uuid(data);} catch(e) { _log("Error calling: handle_del_offer_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_offer_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'del'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_del_offer_org_id_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_org_id(data);} catch(e) { _log("Error calling: error_del_offer_org_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_del_offer_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_org_id(data);} catch(e) { _log("Error calling: handle_del_offer_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_get_offer_callback", true);
            // call a method that can be inline callback
            try {error_get_offer(data);} catch(e) { _log("Error calling: error_get_offer: " + e);}
        }
        else {
            _log("SUCCESS::offer_get_offer_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer(data);} catch(e) { _log("Error calling: handle_get_offer: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_get_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_uuid(data);} catch(e) { _log("Error calling: error_get_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_get_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_uuid(data);} catch(e) { _log("Error calling: handle_get_offer_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_get_offer_code_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_code(data);} catch(e) { _log("Error calling: error_get_offer_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_get_offer_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_code(data);} catch(e) { _log("Error calling: handle_get_offer_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_get_offer_name_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_name(data);} catch(e) { _log("Error calling: error_get_offer_name: " + e);}
        }
        else {
            _log("SUCCESS::offer_get_offer_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_name(data);} catch(e) { _log("Error calling: handle_get_offer_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_get_offer_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_org_id(data);} catch(e) { _log("Error calling: error_get_offer_org_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_get_offer_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_org_id(data);} catch(e) { _log("Error calling: handle_get_offer_org_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.offer_type = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.offer_type.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_offer_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_count_offer_type_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_type(data);} catch(e) { _log("Error calling: error_count_offer_type: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_count_offer_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_type(data);} catch(e) { _log("Error calling: handle_count_offer_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_count_offer_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_type_uuid(data);} catch(e) { _log("Error calling: error_count_offer_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_count_offer_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_type_uuid(data);} catch(e) { _log("Error calling: handle_count_offer_type_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_count_offer_type_code_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_type_code(data);} catch(e) { _log("Error calling: error_count_offer_type_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_count_offer_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_type_code(data);} catch(e) { _log("Error calling: handle_count_offer_type_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_type_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_type_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_count_offer_type_name_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_type_name(data);} catch(e) { _log("Error calling: error_count_offer_type_name: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_count_offer_type_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_type_name(data);} catch(e) { _log("Error calling: handle_count_offer_type_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_offer_type_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_offer_type_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_browse_offer_type_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_offer_type_filter(data);} catch(e) { _log("Error calling: error_browse_offer_type_filter: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_browse_offer_type_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_offer_type_filter(data);} catch(e) { _log("Error calling: handle_browse_offer_type_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_offer_type_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_offer_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_set_offer_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_offer_type_uuid(data);} catch(e) { _log("Error calling: error_set_offer_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_set_offer_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_offer_type_uuid(data);} catch(e) { _log("Error calling: handle_set_offer_type_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_offer_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_del_offer_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_type_uuid(data);} catch(e) { _log("Error calling: error_del_offer_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_del_offer_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_type_uuid(data);} catch(e) { _log("Error calling: handle_del_offer_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_get_offer_type_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_type(data);} catch(e) { _log("Error calling: error_get_offer_type: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_get_offer_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_type(data);} catch(e) { _log("Error calling: handle_get_offer_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_get_offer_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_type_uuid(data);} catch(e) { _log("Error calling: error_get_offer_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_get_offer_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_type_uuid(data);} catch(e) { _log("Error calling: handle_get_offer_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_get_offer_type_code_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_type_code(data);} catch(e) { _log("Error calling: error_get_offer_type_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_get_offer_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_type_code(data);} catch(e) { _log("Error calling: handle_get_offer_type_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_type_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_type_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_type_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_type_get_offer_type_name_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_type_name(data);} catch(e) { _log("Error calling: error_get_offer_type_name: " + e);}
        }
        else {
            _log("SUCCESS::offer_type_get_offer_type_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_type_name(data);} catch(e) { _log("Error calling: handle_get_offer_type_name: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.offer_location = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.offer_location.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_offer_location: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_location_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_count_offer_location_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_location(data);} catch(e) { _log("Error calling: error_count_offer_location: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_count_offer_location_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_location(data);} catch(e) { _log("Error calling: handle_count_offer_location: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_count_offer_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_location_uuid(data);} catch(e) { _log("Error calling: error_count_offer_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_count_offer_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_location_uuid(data);} catch(e) { _log("Error calling: handle_count_offer_location_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_location_offer_id: function
    (
        offer_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'count'
                + "/by-offer-id"
                + "/@offer_id/" + offer_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_location_offer_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_count_offer_location_offer_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_location_offer_id(data);} catch(e) { _log("Error calling: error_count_offer_location_offer_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_count_offer_location_offer_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_location_offer_id(data);} catch(e) { _log("Error calling: handle_count_offer_location_offer_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_location_city: function
    (
        city,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'count'
                + "/by-city"
                + "/@city/" + city            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_location_city_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_count_offer_location_city_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_location_city(data);} catch(e) { _log("Error calling: error_count_offer_location_city: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_count_offer_location_city_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_location_city(data);} catch(e) { _log("Error calling: handle_count_offer_location_city: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_location_country_code: function
    (
        country_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'count'
                + "/by-country-code"
                + "/@country_code/" + country_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_location_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_count_offer_location_country_code_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_location_country_code(data);} catch(e) { _log("Error calling: error_count_offer_location_country_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_count_offer_location_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_location_country_code(data);} catch(e) { _log("Error calling: handle_count_offer_location_country_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_location_postal_code: function
    (
        postal_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'count'
                + "/by-postal-code"
                + "/@postal_code/" + postal_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_location_postal_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_count_offer_location_postal_code_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_location_postal_code(data);} catch(e) { _log("Error calling: error_count_offer_location_postal_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_count_offer_location_postal_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_location_postal_code(data);} catch(e) { _log("Error calling: handle_count_offer_location_postal_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_offer_location_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_offer_location_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_browse_offer_location_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_offer_location_filter(data);} catch(e) { _log("Error calling: error_browse_offer_location_filter: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_browse_offer_location_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_offer_location_filter(data);} catch(e) { _log("Error calling: handle_browse_offer_location_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_offer_location_uuid: function
    (
        status,
        fax,
        code,
        description,
        address1,
        twitter,
        phone,
        postal_code,
        offer_id,
        country_code,
        date_created,
        active,
        uuid,
        state_province,
        city,
        display_name,
        name,
        date_modified,
        dob,
        date_start,
        longitude,
        email,
        date_end,
        latitude,
        facebook,
        type,
        address2,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@fax": fax
            , "@code": code
            , "@description": description
            , "@address1": address1
            , "@twitter": twitter
            , "@phone": phone
            , "@postal_code": postal_code
            , "@offer_id": offer_id
            , "@country_code": country_code
            , "@date_created": date_created
            , "@active": active
            , "@uuid": uuid
            , "@state_province": state_province
            , "@city": city
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@dob": dob
            , "@date_start": date_start
            , "@longitude": longitude
            , "@email": email
            , "@date_end": date_end
            , "@latitude": latitude
            , "@facebook": facebook
            , "@type": type
            , "@address2": address2
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_offer_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_set_offer_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_offer_location_uuid(data);} catch(e) { _log("Error calling: error_set_offer_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_set_offer_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_offer_location_uuid(data);} catch(e) { _log("Error calling: handle_set_offer_location_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_offer_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_del_offer_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_location_uuid(data);} catch(e) { _log("Error calling: error_del_offer_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_del_offer_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_location_uuid(data);} catch(e) { _log("Error calling: handle_del_offer_location_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_location: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_location_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_get_offer_location_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_location(data);} catch(e) { _log("Error calling: error_get_offer_location: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_get_offer_location_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_location(data);} catch(e) { _log("Error calling: handle_get_offer_location: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_get_offer_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_location_uuid(data);} catch(e) { _log("Error calling: error_get_offer_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_get_offer_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_location_uuid(data);} catch(e) { _log("Error calling: handle_get_offer_location_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_location_offer_id: function
    (
        offer_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'get'
                + "/by-offer-id"
                + "/@offer_id/" + offer_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_location_offer_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_get_offer_location_offer_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_location_offer_id(data);} catch(e) { _log("Error calling: error_get_offer_location_offer_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_get_offer_location_offer_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_location_offer_id(data);} catch(e) { _log("Error calling: handle_get_offer_location_offer_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_location_city: function
    (
        city,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'get'
                + "/by-city"
                + "/@city/" + city            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_location_city_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_get_offer_location_city_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_location_city(data);} catch(e) { _log("Error calling: error_get_offer_location_city: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_get_offer_location_city_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_location_city(data);} catch(e) { _log("Error calling: handle_get_offer_location_city: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_location_country_code: function
    (
        country_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'get'
                + "/by-country-code"
                + "/@country_code/" + country_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_location_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_get_offer_location_country_code_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_location_country_code(data);} catch(e) { _log("Error calling: error_get_offer_location_country_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_get_offer_location_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_location_country_code(data);} catch(e) { _log("Error calling: handle_get_offer_location_country_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_location_postal_code: function
    (
        postal_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_location_service + 'get'
                + "/by-postal-code"
                + "/@postal_code/" + postal_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_location_postal_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_location_get_offer_location_postal_code_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_location_postal_code(data);} catch(e) { _log("Error calling: error_get_offer_location_postal_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_location_get_offer_location_postal_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_location_postal_code(data);} catch(e) { _log("Error calling: handle_get_offer_location_postal_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.offer_category = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.offer_category.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_offer_category: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_count_offer_category_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category(data);} catch(e) { _log("Error calling: error_count_offer_category: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_count_offer_category_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category(data);} catch(e) { _log("Error calling: handle_count_offer_category: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_count_offer_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_uuid(data);} catch(e) { _log("Error calling: error_count_offer_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_count_offer_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_uuid(data);} catch(e) { _log("Error calling: handle_count_offer_category_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_count_offer_category_code_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_code(data);} catch(e) { _log("Error calling: error_count_offer_category_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_count_offer_category_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_code(data);} catch(e) { _log("Error calling: handle_count_offer_category_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_count_offer_category_name_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_name(data);} catch(e) { _log("Error calling: error_count_offer_category_name: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_count_offer_category_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_name(data);} catch(e) { _log("Error calling: handle_count_offer_category_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_count_offer_category_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_org_id(data);} catch(e) { _log("Error calling: error_count_offer_category_org_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_count_offer_category_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_org_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'count'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_count_offer_category_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_type_id(data);} catch(e) { _log("Error calling: error_count_offer_category_type_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_count_offer_category_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_type_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_org_id_type_id: function
    (
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'count'
                + "/by-org-id/by-type-id"
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_count_offer_category_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_org_id_type_id(data);} catch(e) { _log("Error calling: error_count_offer_category_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_count_offer_category_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_org_id_type_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_org_id_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_offer_category_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_offer_category_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_browse_offer_category_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_offer_category_filter(data);} catch(e) { _log("Error calling: error_browse_offer_category_filter: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_browse_offer_category_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_offer_category_filter(data);} catch(e) { _log("Error calling: handle_browse_offer_category_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_offer_category_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        org_id,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@org_id": org_id
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_offer_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_set_offer_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_offer_category_uuid(data);} catch(e) { _log("Error calling: error_set_offer_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_set_offer_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_offer_category_uuid(data);} catch(e) { _log("Error calling: handle_set_offer_category_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_offer_category_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_del_offer_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_uuid(data);} catch(e) { _log("Error calling: error_del_offer_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_del_offer_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_uuid(data);} catch(e) { _log("Error calling: handle_del_offer_category_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_offer_category_code_org_id: function
    (
        code,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'del'
                + "/by-code/by-org-id"
                + "/@code/" + code            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_code_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_del_offer_category_code_org_id_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_code_org_id(data);} catch(e) { _log("Error calling: error_del_offer_category_code_org_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_del_offer_category_code_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_code_org_id(data);} catch(e) { _log("Error calling: handle_del_offer_category_code_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_offer_category_code_org_id_type_id: function
    (
        code,
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'del'
                + "/by-code/by-org-id/by-type-id"
                + "/@code/" + code            
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_code_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_del_offer_category_code_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_code_org_id_type_id(data);} catch(e) { _log("Error calling: error_del_offer_category_code_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_del_offer_category_code_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_code_org_id_type_id(data);} catch(e) { _log("Error calling: handle_del_offer_category_code_org_id_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_get_offer_category_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category(data);} catch(e) { _log("Error calling: error_get_offer_category: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_get_offer_category_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category(data);} catch(e) { _log("Error calling: handle_get_offer_category: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_get_offer_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_uuid(data);} catch(e) { _log("Error calling: error_get_offer_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_get_offer_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_uuid(data);} catch(e) { _log("Error calling: handle_get_offer_category_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_get_offer_category_code_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_code(data);} catch(e) { _log("Error calling: error_get_offer_category_code: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_get_offer_category_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_code(data);} catch(e) { _log("Error calling: handle_get_offer_category_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_get_offer_category_name_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_name(data);} catch(e) { _log("Error calling: error_get_offer_category_name: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_get_offer_category_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_name(data);} catch(e) { _log("Error calling: handle_get_offer_category_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_get_offer_category_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_org_id(data);} catch(e) { _log("Error calling: error_get_offer_category_org_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_get_offer_category_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_org_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'get'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_get_offer_category_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_type_id(data);} catch(e) { _log("Error calling: error_get_offer_category_type_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_get_offer_category_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_type_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_org_id_type_id: function
    (
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_service + 'get'
                + "/by-org-id/by-type-id"
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_get_offer_category_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_org_id_type_id(data);} catch(e) { _log("Error calling: error_get_offer_category_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_get_offer_category_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_org_id_type_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_org_id_type_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.offer_category_tree = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.offer_category_tree.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_offer_category_tree: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_count_offer_category_tree_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_tree(data);} catch(e) { _log("Error calling: error_count_offer_category_tree: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_count_offer_category_tree_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_tree(data);} catch(e) { _log("Error calling: handle_count_offer_category_tree: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_count_offer_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: error_count_offer_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_count_offer_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_count_offer_category_tree_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_parent_id: function
    (
        parent_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'count'
                + "/by-parent-id"
                + "/@parent_id/" + parent_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_parent_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_count_offer_category_tree_parent_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_tree_parent_id(data);} catch(e) { _log("Error calling: error_count_offer_category_tree_parent_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_count_offer_category_tree_parent_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_tree_parent_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_tree_parent_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'count'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_count_offer_category_tree_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_tree_category_id(data);} catch(e) { _log("Error calling: error_count_offer_category_tree_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_count_offer_category_tree_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_tree_category_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_tree_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_parent_id_category_id: function
    (
        parent_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'count'
                + "/by-parent-id/by-category-id"
                + "/@parent_id/" + parent_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_tree_parent_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_count_offer_category_tree_parent_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: error_count_offer_category_tree_parent_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_count_offer_category_tree_parent_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_tree_parent_id_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_offer_category_tree_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_offer_category_tree_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_browse_offer_category_tree_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_offer_category_tree_filter(data);} catch(e) { _log("Error calling: error_browse_offer_category_tree_filter: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_browse_offer_category_tree_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_offer_category_tree_filter(data);} catch(e) { _log("Error calling: handle_browse_offer_category_tree_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_offer_category_tree_uuid: function
    (
        status,
        parent_id,
        uuid,
        date_modified,
        active,
        date_created,
        category_id,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@parent_id": parent_id
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@category_id": category_id
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_offer_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_set_offer_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: error_set_offer_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_set_offer_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_set_offer_category_tree_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_offer_category_tree_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_del_offer_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: error_del_offer_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_del_offer_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_del_offer_category_tree_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_offer_category_tree_parent_id: function
    (
        parent_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'del'
                + "/by-parent-id"
                + "/@parent_id/" + parent_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_tree_parent_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_del_offer_category_tree_parent_id_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_tree_parent_id(data);} catch(e) { _log("Error calling: error_del_offer_category_tree_parent_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_del_offer_category_tree_parent_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_tree_parent_id(data);} catch(e) { _log("Error calling: handle_del_offer_category_tree_parent_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_offer_category_tree_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'del'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_tree_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_del_offer_category_tree_category_id_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_tree_category_id(data);} catch(e) { _log("Error calling: error_del_offer_category_tree_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_del_offer_category_tree_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_tree_category_id(data);} catch(e) { _log("Error calling: handle_del_offer_category_tree_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_offer_category_tree_parent_id_category_id: function
    (
        parent_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'del'
                + "/by-parent-id/by-category-id"
                + "/@parent_id/" + parent_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_tree_parent_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_del_offer_category_tree_parent_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: error_del_offer_category_tree_parent_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_del_offer_category_tree_parent_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: handle_del_offer_category_tree_parent_id_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_tree: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_get_offer_category_tree_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_tree(data);} catch(e) { _log("Error calling: error_get_offer_category_tree: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_get_offer_category_tree_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_tree(data);} catch(e) { _log("Error calling: handle_get_offer_category_tree: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_get_offer_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: error_get_offer_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_get_offer_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_get_offer_category_tree_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_parent_id: function
    (
        parent_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'get'
                + "/by-parent-id"
                + "/@parent_id/" + parent_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_parent_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_get_offer_category_tree_parent_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_tree_parent_id(data);} catch(e) { _log("Error calling: error_get_offer_category_tree_parent_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_get_offer_category_tree_parent_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_tree_parent_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_tree_parent_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'get'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_get_offer_category_tree_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_tree_category_id(data);} catch(e) { _log("Error calling: error_get_offer_category_tree_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_get_offer_category_tree_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_tree_category_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_tree_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_parent_id_category_id: function
    (
        parent_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_tree_service + 'get'
                + "/by-parent-id/by-category-id"
                + "/@parent_id/" + parent_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_tree_parent_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_tree_get_offer_category_tree_parent_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: error_get_offer_category_tree_parent_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_tree_get_offer_category_tree_parent_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_tree_parent_id_category_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.offer_category_assoc = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.offer_category_assoc.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_offer_category_assoc: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_count_offer_category_assoc_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_assoc(data);} catch(e) { _log("Error calling: error_count_offer_category_assoc: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_count_offer_category_assoc_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_assoc(data);} catch(e) { _log("Error calling: handle_count_offer_category_assoc: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_count_offer_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_count_offer_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_count_offer_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_count_offer_category_assoc_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_offer_id: function
    (
        offer_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'count'
                + "/by-offer-id"
                + "/@offer_id/" + offer_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_offer_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_count_offer_category_assoc_offer_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_assoc_offer_id(data);} catch(e) { _log("Error calling: error_count_offer_category_assoc_offer_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_count_offer_category_assoc_offer_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_assoc_offer_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_assoc_offer_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'count'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_count_offer_category_assoc_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_assoc_category_id(data);} catch(e) { _log("Error calling: error_count_offer_category_assoc_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_count_offer_category_assoc_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_assoc_category_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_assoc_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_offer_id_category_id: function
    (
        offer_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'count'
                + "/by-offer-id/by-category-id"
                + "/@offer_id/" + offer_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_category_assoc_offer_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_count_offer_category_assoc_offer_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_category_assoc_offer_id_category_id(data);} catch(e) { _log("Error calling: error_count_offer_category_assoc_offer_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_count_offer_category_assoc_offer_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_category_assoc_offer_id_category_id(data);} catch(e) { _log("Error calling: handle_count_offer_category_assoc_offer_id_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_offer_category_assoc_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_offer_category_assoc_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_browse_offer_category_assoc_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_offer_category_assoc_filter(data);} catch(e) { _log("Error calling: error_browse_offer_category_assoc_filter: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_browse_offer_category_assoc_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_offer_category_assoc_filter(data);} catch(e) { _log("Error calling: handle_browse_offer_category_assoc_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_offer_category_assoc_uuid: function
    (
        status,
        uuid,
        date_modified,
        active,
        date_created,
        offer_id,
        category_id,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@offer_id": offer_id
            , "@category_id": category_id
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_offer_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_set_offer_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_set_offer_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_set_offer_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_set_offer_category_assoc_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_offer_category_assoc_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_del_offer_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_del_offer_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_del_offer_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_del_offer_category_assoc_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_get_offer_category_assoc_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_assoc(data);} catch(e) { _log("Error calling: error_get_offer_category_assoc: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_get_offer_category_assoc_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_assoc(data);} catch(e) { _log("Error calling: handle_get_offer_category_assoc: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_get_offer_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_get_offer_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_get_offer_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_get_offer_category_assoc_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_offer_id: function
    (
        offer_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'get'
                + "/by-offer-id"
                + "/@offer_id/" + offer_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_offer_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_get_offer_category_assoc_offer_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_assoc_offer_id(data);} catch(e) { _log("Error calling: error_get_offer_category_assoc_offer_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_get_offer_category_assoc_offer_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_assoc_offer_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_assoc_offer_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'get'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_get_offer_category_assoc_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_assoc_category_id(data);} catch(e) { _log("Error calling: error_get_offer_category_assoc_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_get_offer_category_assoc_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_assoc_category_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_assoc_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_offer_id_category_id: function
    (
        offer_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_category_assoc_service + 'get'
                + "/by-offer-id/by-category-id"
                + "/@offer_id/" + offer_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_category_assoc_offer_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_category_assoc_get_offer_category_assoc_offer_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_category_assoc_offer_id_category_id(data);} catch(e) { _log("Error calling: error_get_offer_category_assoc_offer_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_category_assoc_get_offer_category_assoc_offer_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_category_assoc_offer_id_category_id(data);} catch(e) { _log("Error calling: handle_get_offer_category_assoc_offer_id_category_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.offer_game_location = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.offer_game_location.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_offer_game_location: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_count_offer_game_location_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_game_location(data);} catch(e) { _log("Error calling: error_count_offer_game_location: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_count_offer_game_location_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_game_location(data);} catch(e) { _log("Error calling: handle_count_offer_game_location: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_count_offer_game_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_game_location_uuid(data);} catch(e) { _log("Error calling: error_count_offer_game_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_count_offer_game_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_game_location_uuid(data);} catch(e) { _log("Error calling: handle_count_offer_game_location_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_game_location_id: function
    (
        game_location_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'count'
                + "/by-game-location-id"
                + "/@game_location_id/" + game_location_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_game_location_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_count_offer_game_location_game_location_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_game_location_game_location_id(data);} catch(e) { _log("Error calling: error_count_offer_game_location_game_location_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_count_offer_game_location_game_location_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_game_location_game_location_id(data);} catch(e) { _log("Error calling: handle_count_offer_game_location_game_location_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_offer_id: function
    (
        offer_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'count'
                + "/by-offer-id"
                + "/@offer_id/" + offer_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_offer_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_count_offer_game_location_offer_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_game_location_offer_id(data);} catch(e) { _log("Error calling: error_count_offer_game_location_offer_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_count_offer_game_location_offer_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_game_location_offer_id(data);} catch(e) { _log("Error calling: handle_count_offer_game_location_offer_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_offer_id_game_location_id: function
    (
        offer_id,
        game_location_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'count'
                + "/by-offer-id/by-game-location-id"
                + "/@offer_id/" + offer_id            
                + "/@game_location_id/" + game_location_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_offer_game_location_offer_id_game_location_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_count_offer_game_location_offer_id_game_location_id_callback", true);
            // call a method that can be inline callback
            try {error_count_offer_game_location_offer_id_game_location_id(data);} catch(e) { _log("Error calling: error_count_offer_game_location_offer_id_game_location_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_count_offer_game_location_offer_id_game_location_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_offer_game_location_offer_id_game_location_id(data);} catch(e) { _log("Error calling: handle_count_offer_game_location_offer_id_game_location_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_offer_game_location_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_offer_game_location_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_browse_offer_game_location_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_offer_game_location_filter(data);} catch(e) { _log("Error calling: error_browse_offer_game_location_filter: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_browse_offer_game_location_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_offer_game_location_filter(data);} catch(e) { _log("Error calling: handle_browse_offer_game_location_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_offer_game_location_uuid: function
    (
        status,
        game_location_id,
        uuid,
        date_modified,
        active,
        date_created,
        offer_id,
        type_id,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@game_location_id": game_location_id
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@offer_id": offer_id
            , "@type_id": type_id
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_offer_game_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_set_offer_game_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_offer_game_location_uuid(data);} catch(e) { _log("Error calling: error_set_offer_game_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_set_offer_game_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_offer_game_location_uuid(data);} catch(e) { _log("Error calling: handle_set_offer_game_location_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_offer_game_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_offer_game_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_del_offer_game_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_offer_game_location_uuid(data);} catch(e) { _log("Error calling: error_del_offer_game_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_del_offer_game_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_offer_game_location_uuid(data);} catch(e) { _log("Error calling: handle_del_offer_game_location_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_game_location: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_game_location_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_get_offer_game_location_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_game_location(data);} catch(e) { _log("Error calling: error_get_offer_game_location: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_get_offer_game_location_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_game_location(data);} catch(e) { _log("Error calling: handle_get_offer_game_location: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_game_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_game_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_get_offer_game_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_game_location_uuid(data);} catch(e) { _log("Error calling: error_get_offer_game_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_get_offer_game_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_game_location_uuid(data);} catch(e) { _log("Error calling: handle_get_offer_game_location_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_game_location_game_location_id: function
    (
        game_location_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'get'
                + "/by-game-location-id"
                + "/@game_location_id/" + game_location_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_game_location_game_location_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_get_offer_game_location_game_location_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_game_location_game_location_id(data);} catch(e) { _log("Error calling: error_get_offer_game_location_game_location_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_get_offer_game_location_game_location_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_game_location_game_location_id(data);} catch(e) { _log("Error calling: handle_get_offer_game_location_game_location_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_game_location_offer_id: function
    (
        offer_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'get'
                + "/by-offer-id"
                + "/@offer_id/" + offer_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_game_location_offer_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_get_offer_game_location_offer_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_game_location_offer_id(data);} catch(e) { _log("Error calling: error_get_offer_game_location_offer_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_get_offer_game_location_offer_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_game_location_offer_id(data);} catch(e) { _log("Error calling: handle_get_offer_game_location_offer_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_offer_game_location_offer_id_game_location_id: function
    (
        offer_id,
        game_location_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.offer_game_location_service + 'get'
                + "/by-offer-id/by-game-location-id"
                + "/@offer_id/" + offer_id            
                + "/@game_location_id/" + game_location_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_offer_game_location_offer_id_game_location_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::offer_game_location_get_offer_game_location_offer_id_game_location_id_callback", true);
            // call a method that can be inline callback
            try {error_get_offer_game_location_offer_id_game_location_id(data);} catch(e) { _log("Error calling: error_get_offer_game_location_offer_id_game_location_id: " + e);}
        }
        else {
            _log("SUCCESS::offer_game_location_get_offer_game_location_offer_id_game_location_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_offer_game_location_offer_id_game_location_id(data);} catch(e) { _log("Error calling: handle_get_offer_game_location_offer_id_game_location_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.event_info = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.event_info.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_event_info: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_info_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_count_event_info_callback", true);
            // call a method that can be inline callback
            try {error_count_event_info(data);} catch(e) { _log("Error calling: error_count_event_info: " + e);}
        }
        else {
            _log("SUCCESS::event_info_count_event_info_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_info(data);} catch(e) { _log("Error calling: handle_count_event_info: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_info_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_info_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_count_event_info_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_event_info_uuid(data);} catch(e) { _log("Error calling: error_count_event_info_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_info_count_event_info_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_info_uuid(data);} catch(e) { _log("Error calling: handle_count_event_info_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_info_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_info_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_count_event_info_code_callback", true);
            // call a method that can be inline callback
            try {error_count_event_info_code(data);} catch(e) { _log("Error calling: error_count_event_info_code: " + e);}
        }
        else {
            _log("SUCCESS::event_info_count_event_info_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_info_code(data);} catch(e) { _log("Error calling: handle_count_event_info_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_info_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_info_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_count_event_info_name_callback", true);
            // call a method that can be inline callback
            try {error_count_event_info_name(data);} catch(e) { _log("Error calling: error_count_event_info_name: " + e);}
        }
        else {
            _log("SUCCESS::event_info_count_event_info_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_info_name(data);} catch(e) { _log("Error calling: handle_count_event_info_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_info_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_info_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_count_event_info_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_info_org_id(data);} catch(e) { _log("Error calling: error_count_event_info_org_id: " + e);}
        }
        else {
            _log("SUCCESS::event_info_count_event_info_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_info_org_id(data);} catch(e) { _log("Error calling: handle_count_event_info_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_event_info_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_event_info_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_browse_event_info_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_event_info_filter(data);} catch(e) { _log("Error calling: error_browse_event_info_filter: " + e);}
        }
        else {
            _log("SUCCESS::event_info_browse_event_info_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_event_info_filter(data);} catch(e) { _log("Error calling: handle_browse_event_info_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_event_info_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        url,
        org_id,
        uuid,
        usage_count,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@org_id": org_id
            , "@uuid": uuid
            , "@usage_count": usage_count
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_event_info_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_set_event_info_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_event_info_uuid(data);} catch(e) { _log("Error calling: error_set_event_info_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_info_set_event_info_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_event_info_uuid(data);} catch(e) { _log("Error calling: handle_set_event_info_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_event_info_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_info_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_del_event_info_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_event_info_uuid(data);} catch(e) { _log("Error calling: error_del_event_info_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_info_del_event_info_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_info_uuid(data);} catch(e) { _log("Error calling: handle_del_event_info_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_event_info_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'del'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_info_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_del_event_info_org_id_callback", true);
            // call a method that can be inline callback
            try {error_del_event_info_org_id(data);} catch(e) { _log("Error calling: error_del_event_info_org_id: " + e);}
        }
        else {
            _log("SUCCESS::event_info_del_event_info_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_info_org_id(data);} catch(e) { _log("Error calling: handle_del_event_info_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_info: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_info_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_get_event_info_callback", true);
            // call a method that can be inline callback
            try {error_get_event_info(data);} catch(e) { _log("Error calling: error_get_event_info: " + e);}
        }
        else {
            _log("SUCCESS::event_info_get_event_info_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_info(data);} catch(e) { _log("Error calling: handle_get_event_info: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_info_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_info_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_get_event_info_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_event_info_uuid(data);} catch(e) { _log("Error calling: error_get_event_info_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_info_get_event_info_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_info_uuid(data);} catch(e) { _log("Error calling: handle_get_event_info_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_info_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_info_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_get_event_info_code_callback", true);
            // call a method that can be inline callback
            try {error_get_event_info_code(data);} catch(e) { _log("Error calling: error_get_event_info_code: " + e);}
        }
        else {
            _log("SUCCESS::event_info_get_event_info_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_info_code(data);} catch(e) { _log("Error calling: handle_get_event_info_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_info_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_info_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_get_event_info_name_callback", true);
            // call a method that can be inline callback
            try {error_get_event_info_name(data);} catch(e) { _log("Error calling: error_get_event_info_name: " + e);}
        }
        else {
            _log("SUCCESS::event_info_get_event_info_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_info_name(data);} catch(e) { _log("Error calling: handle_get_event_info_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_info_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_info_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_info_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_info_get_event_info_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_info_org_id(data);} catch(e) { _log("Error calling: error_get_event_info_org_id: " + e);}
        }
        else {
            _log("SUCCESS::event_info_get_event_info_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_info_org_id(data);} catch(e) { _log("Error calling: handle_get_event_info_org_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.event_location = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.event_location.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_event_location: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_location_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_count_event_location_callback", true);
            // call a method that can be inline callback
            try {error_count_event_location(data);} catch(e) { _log("Error calling: error_count_event_location: " + e);}
        }
        else {
            _log("SUCCESS::event_location_count_event_location_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_location(data);} catch(e) { _log("Error calling: handle_count_event_location: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_count_event_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_event_location_uuid(data);} catch(e) { _log("Error calling: error_count_event_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_location_count_event_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_location_uuid(data);} catch(e) { _log("Error calling: handle_count_event_location_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_location_event_id: function
    (
        event_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'count'
                + "/by-event-id"
                + "/@event_id/" + event_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_location_event_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_count_event_location_event_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_location_event_id(data);} catch(e) { _log("Error calling: error_count_event_location_event_id: " + e);}
        }
        else {
            _log("SUCCESS::event_location_count_event_location_event_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_location_event_id(data);} catch(e) { _log("Error calling: handle_count_event_location_event_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_location_city: function
    (
        city,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'count'
                + "/by-city"
                + "/@city/" + city            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_location_city_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_count_event_location_city_callback", true);
            // call a method that can be inline callback
            try {error_count_event_location_city(data);} catch(e) { _log("Error calling: error_count_event_location_city: " + e);}
        }
        else {
            _log("SUCCESS::event_location_count_event_location_city_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_location_city(data);} catch(e) { _log("Error calling: handle_count_event_location_city: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_location_country_code: function
    (
        country_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'count'
                + "/by-country-code"
                + "/@country_code/" + country_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_location_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_count_event_location_country_code_callback", true);
            // call a method that can be inline callback
            try {error_count_event_location_country_code(data);} catch(e) { _log("Error calling: error_count_event_location_country_code: " + e);}
        }
        else {
            _log("SUCCESS::event_location_count_event_location_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_location_country_code(data);} catch(e) { _log("Error calling: handle_count_event_location_country_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_location_postal_code: function
    (
        postal_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'count'
                + "/by-postal-code"
                + "/@postal_code/" + postal_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_location_postal_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_count_event_location_postal_code_callback", true);
            // call a method that can be inline callback
            try {error_count_event_location_postal_code(data);} catch(e) { _log("Error calling: error_count_event_location_postal_code: " + e);}
        }
        else {
            _log("SUCCESS::event_location_count_event_location_postal_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_location_postal_code(data);} catch(e) { _log("Error calling: handle_count_event_location_postal_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_event_location_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_event_location_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_browse_event_location_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_event_location_filter(data);} catch(e) { _log("Error calling: error_browse_event_location_filter: " + e);}
        }
        else {
            _log("SUCCESS::event_location_browse_event_location_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_event_location_filter(data);} catch(e) { _log("Error calling: handle_browse_event_location_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_event_location_uuid: function
    (
        status,
        fax,
        code,
        description,
        address1,
        twitter,
        phone,
        postal_code,
        country_code,
        date_created,
        active,
        uuid,
        state_province,
        city,
        display_name,
        name,
        date_modified,
        dob,
        date_start,
        longitude,
        email,
        event_id,
        date_end,
        latitude,
        facebook,
        type,
        address2,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@fax": fax
            , "@code": code
            , "@description": description
            , "@address1": address1
            , "@twitter": twitter
            , "@phone": phone
            , "@postal_code": postal_code
            , "@country_code": country_code
            , "@date_created": date_created
            , "@active": active
            , "@uuid": uuid
            , "@state_province": state_province
            , "@city": city
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@dob": dob
            , "@date_start": date_start
            , "@longitude": longitude
            , "@email": email
            , "@event_id": event_id
            , "@date_end": date_end
            , "@latitude": latitude
            , "@facebook": facebook
            , "@type": type
            , "@address2": address2
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_event_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_set_event_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_event_location_uuid(data);} catch(e) { _log("Error calling: error_set_event_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_location_set_event_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_event_location_uuid(data);} catch(e) { _log("Error calling: handle_set_event_location_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_event_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_del_event_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_event_location_uuid(data);} catch(e) { _log("Error calling: error_del_event_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_location_del_event_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_location_uuid(data);} catch(e) { _log("Error calling: handle_del_event_location_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_location: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_location_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_get_event_location_callback", true);
            // call a method that can be inline callback
            try {error_get_event_location(data);} catch(e) { _log("Error calling: error_get_event_location: " + e);}
        }
        else {
            _log("SUCCESS::event_location_get_event_location_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_location(data);} catch(e) { _log("Error calling: handle_get_event_location: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_location_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_location_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_get_event_location_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_event_location_uuid(data);} catch(e) { _log("Error calling: error_get_event_location_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_location_get_event_location_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_location_uuid(data);} catch(e) { _log("Error calling: handle_get_event_location_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_location_event_id: function
    (
        event_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'get'
                + "/by-event-id"
                + "/@event_id/" + event_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_location_event_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_get_event_location_event_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_location_event_id(data);} catch(e) { _log("Error calling: error_get_event_location_event_id: " + e);}
        }
        else {
            _log("SUCCESS::event_location_get_event_location_event_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_location_event_id(data);} catch(e) { _log("Error calling: handle_get_event_location_event_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_location_city: function
    (
        city,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'get'
                + "/by-city"
                + "/@city/" + city            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_location_city_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_get_event_location_city_callback", true);
            // call a method that can be inline callback
            try {error_get_event_location_city(data);} catch(e) { _log("Error calling: error_get_event_location_city: " + e);}
        }
        else {
            _log("SUCCESS::event_location_get_event_location_city_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_location_city(data);} catch(e) { _log("Error calling: handle_get_event_location_city: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_location_country_code: function
    (
        country_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'get'
                + "/by-country-code"
                + "/@country_code/" + country_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_location_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_get_event_location_country_code_callback", true);
            // call a method that can be inline callback
            try {error_get_event_location_country_code(data);} catch(e) { _log("Error calling: error_get_event_location_country_code: " + e);}
        }
        else {
            _log("SUCCESS::event_location_get_event_location_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_location_country_code(data);} catch(e) { _log("Error calling: handle_get_event_location_country_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_location_postal_code: function
    (
        postal_code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_location_service + 'get'
                + "/by-postal-code"
                + "/@postal_code/" + postal_code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_location_postal_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_location_get_event_location_postal_code_callback", true);
            // call a method that can be inline callback
            try {error_get_event_location_postal_code(data);} catch(e) { _log("Error calling: error_get_event_location_postal_code: " + e);}
        }
        else {
            _log("SUCCESS::event_location_get_event_location_postal_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_location_postal_code(data);} catch(e) { _log("Error calling: handle_get_event_location_postal_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.event_category = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.event_category.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_event_category: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_count_event_category_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category(data);} catch(e) { _log("Error calling: error_count_event_category: " + e);}
        }
        else {
            _log("SUCCESS::event_category_count_event_category_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category(data);} catch(e) { _log("Error calling: handle_count_event_category: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_count_event_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_uuid(data);} catch(e) { _log("Error calling: error_count_event_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_count_event_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_uuid(data);} catch(e) { _log("Error calling: handle_count_event_category_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_count_event_category_code_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_code(data);} catch(e) { _log("Error calling: error_count_event_category_code: " + e);}
        }
        else {
            _log("SUCCESS::event_category_count_event_category_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_code(data);} catch(e) { _log("Error calling: handle_count_event_category_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_count_event_category_name_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_name(data);} catch(e) { _log("Error calling: error_count_event_category_name: " + e);}
        }
        else {
            _log("SUCCESS::event_category_count_event_category_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_name(data);} catch(e) { _log("Error calling: handle_count_event_category_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_count_event_category_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_org_id(data);} catch(e) { _log("Error calling: error_count_event_category_org_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_count_event_category_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_org_id(data);} catch(e) { _log("Error calling: handle_count_event_category_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'count'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_count_event_category_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_type_id(data);} catch(e) { _log("Error calling: error_count_event_category_type_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_count_event_category_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_type_id(data);} catch(e) { _log("Error calling: handle_count_event_category_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_org_id_type_id: function
    (
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'count'
                + "/by-org-id/by-type-id"
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_count_event_category_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_org_id_type_id(data);} catch(e) { _log("Error calling: error_count_event_category_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_count_event_category_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_org_id_type_id(data);} catch(e) { _log("Error calling: handle_count_event_category_org_id_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_event_category_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_event_category_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_browse_event_category_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_event_category_filter(data);} catch(e) { _log("Error calling: error_browse_event_category_filter: " + e);}
        }
        else {
            _log("SUCCESS::event_category_browse_event_category_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_event_category_filter(data);} catch(e) { _log("Error calling: handle_browse_event_category_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_event_category_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        org_id,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@org_id": org_id
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_event_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_set_event_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_event_category_uuid(data);} catch(e) { _log("Error calling: error_set_event_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_set_event_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_event_category_uuid(data);} catch(e) { _log("Error calling: handle_set_event_category_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_event_category_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_del_event_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_uuid(data);} catch(e) { _log("Error calling: error_del_event_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_del_event_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_uuid(data);} catch(e) { _log("Error calling: handle_del_event_category_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_event_category_code_org_id: function
    (
        code,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'del'
                + "/by-code/by-org-id"
                + "/@code/" + code            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_code_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_del_event_category_code_org_id_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_code_org_id(data);} catch(e) { _log("Error calling: error_del_event_category_code_org_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_del_event_category_code_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_code_org_id(data);} catch(e) { _log("Error calling: handle_del_event_category_code_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_event_category_code_org_id_type_id: function
    (
        code,
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'del'
                + "/by-code/by-org-id/by-type-id"
                + "/@code/" + code            
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_code_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_del_event_category_code_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_code_org_id_type_id(data);} catch(e) { _log("Error calling: error_del_event_category_code_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_del_event_category_code_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_code_org_id_type_id(data);} catch(e) { _log("Error calling: handle_del_event_category_code_org_id_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_get_event_category_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category(data);} catch(e) { _log("Error calling: error_get_event_category: " + e);}
        }
        else {
            _log("SUCCESS::event_category_get_event_category_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category(data);} catch(e) { _log("Error calling: handle_get_event_category: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_get_event_category_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_uuid(data);} catch(e) { _log("Error calling: error_get_event_category_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_get_event_category_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_uuid(data);} catch(e) { _log("Error calling: handle_get_event_category_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_get_event_category_code_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_code(data);} catch(e) { _log("Error calling: error_get_event_category_code: " + e);}
        }
        else {
            _log("SUCCESS::event_category_get_event_category_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_code(data);} catch(e) { _log("Error calling: handle_get_event_category_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_get_event_category_name_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_name(data);} catch(e) { _log("Error calling: error_get_event_category_name: " + e);}
        }
        else {
            _log("SUCCESS::event_category_get_event_category_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_name(data);} catch(e) { _log("Error calling: handle_get_event_category_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_get_event_category_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_org_id(data);} catch(e) { _log("Error calling: error_get_event_category_org_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_get_event_category_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_org_id(data);} catch(e) { _log("Error calling: handle_get_event_category_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'get'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_get_event_category_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_type_id(data);} catch(e) { _log("Error calling: error_get_event_category_type_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_get_event_category_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_type_id(data);} catch(e) { _log("Error calling: handle_get_event_category_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_org_id_type_id: function
    (
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_service + 'get'
                + "/by-org-id/by-type-id"
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_get_event_category_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_org_id_type_id(data);} catch(e) { _log("Error calling: error_get_event_category_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_get_event_category_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_org_id_type_id(data);} catch(e) { _log("Error calling: handle_get_event_category_org_id_type_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.event_category_tree = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.event_category_tree.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_event_category_tree: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_count_event_category_tree_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_tree(data);} catch(e) { _log("Error calling: error_count_event_category_tree: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_count_event_category_tree_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_tree(data);} catch(e) { _log("Error calling: handle_count_event_category_tree: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_count_event_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_tree_uuid(data);} catch(e) { _log("Error calling: error_count_event_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_count_event_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_count_event_category_tree_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_parent_id: function
    (
        parent_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'count'
                + "/by-parent-id"
                + "/@parent_id/" + parent_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_parent_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_count_event_category_tree_parent_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_tree_parent_id(data);} catch(e) { _log("Error calling: error_count_event_category_tree_parent_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_count_event_category_tree_parent_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_tree_parent_id(data);} catch(e) { _log("Error calling: handle_count_event_category_tree_parent_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'count'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_count_event_category_tree_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_tree_category_id(data);} catch(e) { _log("Error calling: error_count_event_category_tree_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_count_event_category_tree_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_tree_category_id(data);} catch(e) { _log("Error calling: handle_count_event_category_tree_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_parent_id_category_id: function
    (
        parent_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'count'
                + "/by-parent-id/by-category-id"
                + "/@parent_id/" + parent_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_tree_parent_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_count_event_category_tree_parent_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: error_count_event_category_tree_parent_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_count_event_category_tree_parent_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: handle_count_event_category_tree_parent_id_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_event_category_tree_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_event_category_tree_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_browse_event_category_tree_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_event_category_tree_filter(data);} catch(e) { _log("Error calling: error_browse_event_category_tree_filter: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_browse_event_category_tree_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_event_category_tree_filter(data);} catch(e) { _log("Error calling: handle_browse_event_category_tree_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_event_category_tree_uuid: function
    (
        status,
        parent_id,
        uuid,
        date_modified,
        active,
        date_created,
        category_id,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@parent_id": parent_id
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@category_id": category_id
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_event_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_set_event_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_event_category_tree_uuid(data);} catch(e) { _log("Error calling: error_set_event_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_set_event_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_event_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_set_event_category_tree_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_event_category_tree_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_del_event_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_tree_uuid(data);} catch(e) { _log("Error calling: error_del_event_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_del_event_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_del_event_category_tree_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_event_category_tree_parent_id: function
    (
        parent_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'del'
                + "/by-parent-id"
                + "/@parent_id/" + parent_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_tree_parent_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_del_event_category_tree_parent_id_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_tree_parent_id(data);} catch(e) { _log("Error calling: error_del_event_category_tree_parent_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_del_event_category_tree_parent_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_tree_parent_id(data);} catch(e) { _log("Error calling: handle_del_event_category_tree_parent_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_event_category_tree_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'del'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_tree_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_del_event_category_tree_category_id_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_tree_category_id(data);} catch(e) { _log("Error calling: error_del_event_category_tree_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_del_event_category_tree_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_tree_category_id(data);} catch(e) { _log("Error calling: handle_del_event_category_tree_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_event_category_tree_parent_id_category_id: function
    (
        parent_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'del'
                + "/by-parent-id/by-category-id"
                + "/@parent_id/" + parent_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_tree_parent_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_del_event_category_tree_parent_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: error_del_event_category_tree_parent_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_del_event_category_tree_parent_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: handle_del_event_category_tree_parent_id_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_tree: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_tree_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_get_event_category_tree_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_tree(data);} catch(e) { _log("Error calling: error_get_event_category_tree: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_get_event_category_tree_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_tree(data);} catch(e) { _log("Error calling: handle_get_event_category_tree: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_tree_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_tree_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_get_event_category_tree_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_tree_uuid(data);} catch(e) { _log("Error calling: error_get_event_category_tree_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_get_event_category_tree_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_tree_uuid(data);} catch(e) { _log("Error calling: handle_get_event_category_tree_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_tree_parent_id: function
    (
        parent_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'get'
                + "/by-parent-id"
                + "/@parent_id/" + parent_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_tree_parent_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_get_event_category_tree_parent_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_tree_parent_id(data);} catch(e) { _log("Error calling: error_get_event_category_tree_parent_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_get_event_category_tree_parent_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_tree_parent_id(data);} catch(e) { _log("Error calling: handle_get_event_category_tree_parent_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_tree_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'get'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_tree_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_get_event_category_tree_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_tree_category_id(data);} catch(e) { _log("Error calling: error_get_event_category_tree_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_get_event_category_tree_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_tree_category_id(data);} catch(e) { _log("Error calling: handle_get_event_category_tree_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_tree_parent_id_category_id: function
    (
        parent_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_tree_service + 'get'
                + "/by-parent-id/by-category-id"
                + "/@parent_id/" + parent_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_tree_parent_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_tree_get_event_category_tree_parent_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: error_get_event_category_tree_parent_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_tree_get_event_category_tree_parent_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_tree_parent_id_category_id(data);} catch(e) { _log("Error calling: handle_get_event_category_tree_parent_id_category_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.event_category_assoc = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.event_category_assoc.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_event_category_assoc: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_count_event_category_assoc_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_assoc(data);} catch(e) { _log("Error calling: error_count_event_category_assoc: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_count_event_category_assoc_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_assoc(data);} catch(e) { _log("Error calling: handle_count_event_category_assoc: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_count_event_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_count_event_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_count_event_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_count_event_category_assoc_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_event_id: function
    (
        event_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'count'
                + "/by-event-id"
                + "/@event_id/" + event_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_event_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_count_event_category_assoc_event_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_assoc_event_id(data);} catch(e) { _log("Error calling: error_count_event_category_assoc_event_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_count_event_category_assoc_event_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_assoc_event_id(data);} catch(e) { _log("Error calling: handle_count_event_category_assoc_event_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'count'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_count_event_category_assoc_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_assoc_category_id(data);} catch(e) { _log("Error calling: error_count_event_category_assoc_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_count_event_category_assoc_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_assoc_category_id(data);} catch(e) { _log("Error calling: handle_count_event_category_assoc_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_event_id_category_id: function
    (
        event_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'count'
                + "/by-event-id/by-category-id"
                + "/@event_id/" + event_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_event_category_assoc_event_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_count_event_category_assoc_event_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_count_event_category_assoc_event_id_category_id(data);} catch(e) { _log("Error calling: error_count_event_category_assoc_event_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_count_event_category_assoc_event_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_event_category_assoc_event_id_category_id(data);} catch(e) { _log("Error calling: handle_count_event_category_assoc_event_id_category_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_event_category_assoc_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_event_category_assoc_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_browse_event_category_assoc_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_event_category_assoc_filter(data);} catch(e) { _log("Error calling: error_browse_event_category_assoc_filter: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_browse_event_category_assoc_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_event_category_assoc_filter(data);} catch(e) { _log("Error calling: handle_browse_event_category_assoc_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_event_category_assoc_uuid: function
    (
        status,
        event_id,
        uuid,
        date_modified,
        active,
        date_created,
        category_id,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@event_id": event_id
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@category_id": category_id
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_event_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_set_event_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_set_event_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_set_event_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_set_event_category_assoc_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_event_category_assoc_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_event_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_del_event_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_del_event_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_del_event_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_del_event_category_assoc_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_assoc: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_get_event_category_assoc_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_assoc(data);} catch(e) { _log("Error calling: error_get_event_category_assoc: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_get_event_category_assoc_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_assoc(data);} catch(e) { _log("Error calling: handle_get_event_category_assoc: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_get_event_category_assoc_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: error_get_event_category_assoc_uuid: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_get_event_category_assoc_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_assoc_uuid(data);} catch(e) { _log("Error calling: handle_get_event_category_assoc_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_event_id: function
    (
        event_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'get'
                + "/by-event-id"
                + "/@event_id/" + event_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_event_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_get_event_category_assoc_event_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_assoc_event_id(data);} catch(e) { _log("Error calling: error_get_event_category_assoc_event_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_get_event_category_assoc_event_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_assoc_event_id(data);} catch(e) { _log("Error calling: handle_get_event_category_assoc_event_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_category_id: function
    (
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'get'
                + "/by-category-id"
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_get_event_category_assoc_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_assoc_category_id(data);} catch(e) { _log("Error calling: error_get_event_category_assoc_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_get_event_category_assoc_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_assoc_category_id(data);} catch(e) { _log("Error calling: handle_get_event_category_assoc_category_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_event_id_category_id: function
    (
        event_id,
        category_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.event_category_assoc_service + 'get'
                + "/by-event-id/by-category-id"
                + "/@event_id/" + event_id            
                + "/@category_id/" + category_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_event_category_assoc_event_id_category_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::event_category_assoc_get_event_category_assoc_event_id_category_id_callback", true);
            // call a method that can be inline callback
            try {error_get_event_category_assoc_event_id_category_id(data);} catch(e) { _log("Error calling: error_get_event_category_assoc_event_id_category_id: " + e);}
        }
        else {
            _log("SUCCESS::event_category_assoc_get_event_category_assoc_event_id_category_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_event_category_assoc_event_id_category_id(data);} catch(e) { _log("Error calling: handle_get_event_category_assoc_event_id_category_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.channel = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.channel.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_channel: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_count_channel_callback", true);
            // call a method that can be inline callback
            try {error_count_channel(data);} catch(e) { _log("Error calling: error_count_channel: " + e);}
        }
        else {
            _log("SUCCESS::channel_count_channel_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel(data);} catch(e) { _log("Error calling: handle_count_channel: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_count_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_uuid(data);} catch(e) { _log("Error calling: error_count_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_count_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_uuid(data);} catch(e) { _log("Error calling: handle_count_channel_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_count_channel_code_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_code(data);} catch(e) { _log("Error calling: error_count_channel_code: " + e);}
        }
        else {
            _log("SUCCESS::channel_count_channel_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_code(data);} catch(e) { _log("Error calling: handle_count_channel_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_count_channel_name_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_name(data);} catch(e) { _log("Error calling: error_count_channel_name: " + e);}
        }
        else {
            _log("SUCCESS::channel_count_channel_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_name(data);} catch(e) { _log("Error calling: handle_count_channel_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_count_channel_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_org_id(data);} catch(e) { _log("Error calling: error_count_channel_org_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_count_channel_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_org_id(data);} catch(e) { _log("Error calling: handle_count_channel_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'count'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_count_channel_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_type_id(data);} catch(e) { _log("Error calling: error_count_channel_type_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_count_channel_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_type_id(data);} catch(e) { _log("Error calling: handle_count_channel_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_org_id_type_id: function
    (
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'count'
                + "/by-org-id/by-type-id"
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_count_channel_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_org_id_type_id(data);} catch(e) { _log("Error calling: error_count_channel_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_count_channel_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_org_id_type_id(data);} catch(e) { _log("Error calling: handle_count_channel_org_id_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_channel_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_channel_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_browse_channel_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_channel_filter(data);} catch(e) { _log("Error calling: error_browse_channel_filter: " + e);}
        }
        else {
            _log("SUCCESS::channel_browse_channel_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_channel_filter(data);} catch(e) { _log("Error calling: handle_browse_channel_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_channel_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        type_id,
        org_id,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@type_id": type_id
            , "@org_id": org_id
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_set_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_channel_uuid(data);} catch(e) { _log("Error calling: error_set_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_set_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_channel_uuid(data);} catch(e) { _log("Error calling: handle_set_channel_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_channel_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_del_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_channel_uuid(data);} catch(e) { _log("Error calling: error_del_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_del_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_channel_uuid(data);} catch(e) { _log("Error calling: handle_del_channel_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_channel_code_org_id: function
    (
        code,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'del'
                + "/by-code/by-org-id"
                + "/@code/" + code            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_channel_code_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_del_channel_code_org_id_callback", true);
            // call a method that can be inline callback
            try {error_del_channel_code_org_id(data);} catch(e) { _log("Error calling: error_del_channel_code_org_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_del_channel_code_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_channel_code_org_id(data);} catch(e) { _log("Error calling: handle_del_channel_code_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_channel_code_org_id_type_id: function
    (
        code,
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'del'
                + "/by-code/by-org-id/by-type-id"
                + "/@code/" + code            
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_channel_code_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_del_channel_code_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_del_channel_code_org_id_type_id(data);} catch(e) { _log("Error calling: error_del_channel_code_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_del_channel_code_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_channel_code_org_id_type_id(data);} catch(e) { _log("Error calling: handle_del_channel_code_org_id_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_get_channel_callback", true);
            // call a method that can be inline callback
            try {error_get_channel(data);} catch(e) { _log("Error calling: error_get_channel: " + e);}
        }
        else {
            _log("SUCCESS::channel_get_channel_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel(data);} catch(e) { _log("Error calling: handle_get_channel: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_get_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_uuid(data);} catch(e) { _log("Error calling: error_get_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_get_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_uuid(data);} catch(e) { _log("Error calling: handle_get_channel_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_get_channel_code_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_code(data);} catch(e) { _log("Error calling: error_get_channel_code: " + e);}
        }
        else {
            _log("SUCCESS::channel_get_channel_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_code(data);} catch(e) { _log("Error calling: handle_get_channel_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_get_channel_name_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_name(data);} catch(e) { _log("Error calling: error_get_channel_name: " + e);}
        }
        else {
            _log("SUCCESS::channel_get_channel_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_name(data);} catch(e) { _log("Error calling: handle_get_channel_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_get_channel_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_org_id(data);} catch(e) { _log("Error calling: error_get_channel_org_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_get_channel_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_org_id(data);} catch(e) { _log("Error calling: handle_get_channel_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'get'
                + "/by-type-id"
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_get_channel_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_type_id(data);} catch(e) { _log("Error calling: error_get_channel_type_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_get_channel_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_type_id(data);} catch(e) { _log("Error calling: handle_get_channel_type_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_org_id_type_id: function
    (
        org_id,
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_service + 'get'
                + "/by-org-id/by-type-id"
                + "/@org_id/" + org_id            
                + "/@type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_org_id_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_get_channel_org_id_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_org_id_type_id(data);} catch(e) { _log("Error calling: error_get_channel_org_id_type_id: " + e);}
        }
        else {
            _log("SUCCESS::channel_get_channel_org_id_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_org_id_type_id(data);} catch(e) { _log("Error calling: handle_get_channel_org_id_type_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.channel_type = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.channel_type.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_channel_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_count_channel_type_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_type(data);} catch(e) { _log("Error calling: error_count_channel_type: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_count_channel_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_type(data);} catch(e) { _log("Error calling: handle_count_channel_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_count_channel_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_type_uuid(data);} catch(e) { _log("Error calling: error_count_channel_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_count_channel_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_type_uuid(data);} catch(e) { _log("Error calling: handle_count_channel_type_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_count_channel_type_code_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_type_code(data);} catch(e) { _log("Error calling: error_count_channel_type_code: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_count_channel_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_type_code(data);} catch(e) { _log("Error calling: handle_count_channel_type_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_channel_type_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_channel_type_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_count_channel_type_name_callback", true);
            // call a method that can be inline callback
            try {error_count_channel_type_name(data);} catch(e) { _log("Error calling: error_count_channel_type_name: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_count_channel_type_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_channel_type_name(data);} catch(e) { _log("Error calling: handle_count_channel_type_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_channel_type_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_channel_type_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_browse_channel_type_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_channel_type_filter(data);} catch(e) { _log("Error calling: error_browse_channel_type_filter: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_browse_channel_type_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_channel_type_filter(data);} catch(e) { _log("Error calling: handle_browse_channel_type_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_channel_type_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@uuid": uuid
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_channel_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_set_channel_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_channel_type_uuid(data);} catch(e) { _log("Error calling: error_set_channel_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_set_channel_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_channel_type_uuid(data);} catch(e) { _log("Error calling: handle_set_channel_type_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_channel_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_channel_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_del_channel_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_channel_type_uuid(data);} catch(e) { _log("Error calling: error_del_channel_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_del_channel_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_channel_type_uuid(data);} catch(e) { _log("Error calling: handle_del_channel_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_get_channel_type_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_type(data);} catch(e) { _log("Error calling: error_get_channel_type: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_get_channel_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_type(data);} catch(e) { _log("Error calling: handle_get_channel_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_get_channel_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_type_uuid(data);} catch(e) { _log("Error calling: error_get_channel_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_get_channel_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_type_uuid(data);} catch(e) { _log("Error calling: handle_get_channel_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_get_channel_type_code_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_type_code(data);} catch(e) { _log("Error calling: error_get_channel_type_code: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_get_channel_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_type_code(data);} catch(e) { _log("Error calling: handle_get_channel_type_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_channel_type_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.channel_type_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_channel_type_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::channel_type_get_channel_type_name_callback", true);
            // call a method that can be inline callback
            try {error_get_channel_type_name(data);} catch(e) { _log("Error calling: error_get_channel_type_name: " + e);}
        }
        else {
            _log("SUCCESS::channel_type_get_channel_type_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_channel_type_name(data);} catch(e) { _log("Error calling: handle_get_channel_type_name: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.question = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.question.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_question: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_callback", true);
            // call a method that can be inline callback
            try {error_count_question(data);} catch(e) { _log("Error calling: error_count_question: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_callback", false);
            // call a method that can be inline callback
            try {handle_count_question(data);} catch(e) { _log("Error calling: handle_count_question: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_question_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_question_uuid(data);} catch(e) { _log("Error calling: error_count_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_question_uuid(data);} catch(e) { _log("Error calling: handle_count_question_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_question_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_code_callback", true);
            // call a method that can be inline callback
            try {error_count_question_code(data);} catch(e) { _log("Error calling: error_count_question_code: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_question_code(data);} catch(e) { _log("Error calling: handle_count_question_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_question_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_name_callback", true);
            // call a method that can be inline callback
            try {error_count_question_name(data);} catch(e) { _log("Error calling: error_count_question_name: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_name_callback", false);
            // call a method that can be inline callback
            try {handle_count_question_name(data);} catch(e) { _log("Error calling: handle_count_question_name: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_question_channel_id: function
    (
        channel_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + "/by-channel-id"
                + "/@channel_id/" + channel_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_channel_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_channel_id_callback", true);
            // call a method that can be inline callback
            try {error_count_question_channel_id(data);} catch(e) { _log("Error calling: error_count_question_channel_id: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_channel_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_question_channel_id(data);} catch(e) { _log("Error calling: handle_count_question_channel_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_question_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_question_org_id(data);} catch(e) { _log("Error calling: error_count_question_org_id: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_question_org_id(data);} catch(e) { _log("Error calling: handle_count_question_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_question_channel_id_org_id: function
    (
        channel_id,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + "/by-channel-id/by-org-id"
                + "/@channel_id/" + channel_id            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_channel_id_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_channel_id_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_question_channel_id_org_id(data);} catch(e) { _log("Error calling: error_count_question_channel_id_org_id: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_channel_id_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_question_channel_id_org_id(data);} catch(e) { _log("Error calling: handle_count_question_channel_id_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_question_channel_id_code: function
    (
        channel_id,
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'count'
                + "/by-channel-id/by-code"
                + "/@channel_id/" + channel_id            
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_question_channel_id_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_count_question_channel_id_code_callback", true);
            // call a method that can be inline callback
            try {error_count_question_channel_id_code(data);} catch(e) { _log("Error calling: error_count_question_channel_id_code: " + e);}
        }
        else {
            _log("SUCCESS::question_count_question_channel_id_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_question_channel_id_code(data);} catch(e) { _log("Error calling: handle_count_question_channel_id_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_question_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_question_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_browse_question_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_question_filter(data);} catch(e) { _log("Error calling: error_browse_question_filter: " + e);}
        }
        else {
            _log("SUCCESS::question_browse_question_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_question_filter(data);} catch(e) { _log("Error calling: handle_browse_question_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_question_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        org_id,
        uuid,
        choices,
        channel_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@org_id": org_id
            , "@uuid": uuid
            , "@choices": choices
            , "@channel_id": channel_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_set_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_question_uuid(data);} catch(e) { _log("Error calling: error_set_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::question_set_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_question_uuid(data);} catch(e) { _log("Error calling: handle_set_question_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_question_channel_id_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        org_id,
        uuid,
        choices,
        channel_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'set'
                + "/by-channel-id/by-code"
                + "/@channel_id/" + channel_id            
                + "/@code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@org_id": org_id
            , "@uuid": uuid
            , "@choices": choices
            , "@channel_id": channel_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_question_channel_id_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_set_question_channel_id_code_callback", true);
            // call a method that can be inline callback
            try {error_set_question_channel_id_code(data);} catch(e) { _log("Error calling: error_set_question_channel_id_code: " + e);}
        }
        else {
            _log("SUCCESS::question_set_question_channel_id_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_question_channel_id_code(data);} catch(e) { _log("Error calling: handle_set_question_channel_id_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_question_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_del_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_question_uuid(data);} catch(e) { _log("Error calling: error_del_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::question_del_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_question_uuid(data);} catch(e) { _log("Error calling: handle_del_question_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_question_channel_id_org_id: function
    (
        channel_id,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'del'
                + "/by-channel-id/by-org-id"
                + "/@channel_id/" + channel_id            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_question_channel_id_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_del_question_channel_id_org_id_callback", true);
            // call a method that can be inline callback
            try {error_del_question_channel_id_org_id(data);} catch(e) { _log("Error calling: error_del_question_channel_id_org_id: " + e);}
        }
        else {
            _log("SUCCESS::question_del_question_channel_id_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_question_channel_id_org_id(data);} catch(e) { _log("Error calling: handle_del_question_channel_id_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_callback", true);
            // call a method that can be inline callback
            try {error_get_question(data);} catch(e) { _log("Error calling: error_get_question: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_callback", false);
            // call a method that can be inline callback
            try {handle_get_question(data);} catch(e) { _log("Error calling: handle_get_question: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_question_uuid(data);} catch(e) { _log("Error calling: error_get_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_uuid(data);} catch(e) { _log("Error calling: handle_get_question_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-code"
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_code_callback", true);
            // call a method that can be inline callback
            try {error_get_question_code(data);} catch(e) { _log("Error calling: error_get_question_code: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_code(data);} catch(e) { _log("Error calling: handle_get_question_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_name: function
    (
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-name"
                + "/@name/" + name            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_name_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_name_callback", true);
            // call a method that can be inline callback
            try {error_get_question_name(data);} catch(e) { _log("Error calling: error_get_question_name: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_name_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_name(data);} catch(e) { _log("Error calling: handle_get_question_name: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_type: function
    (
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-type"
                + "/@type/" + type            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_type_callback", true);
            // call a method that can be inline callback
            try {error_get_question_type(data);} catch(e) { _log("Error calling: error_get_question_type: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_type(data);} catch(e) { _log("Error calling: handle_get_question_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_channel_id: function
    (
        channel_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-channel-id"
                + "/@channel_id/" + channel_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_channel_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_channel_id_callback", true);
            // call a method that can be inline callback
            try {error_get_question_channel_id(data);} catch(e) { _log("Error calling: error_get_question_channel_id: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_channel_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_channel_id(data);} catch(e) { _log("Error calling: handle_get_question_channel_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_question_org_id(data);} catch(e) { _log("Error calling: error_get_question_org_id: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_org_id(data);} catch(e) { _log("Error calling: handle_get_question_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_channel_id_org_id: function
    (
        channel_id,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-channel-id/by-org-id"
                + "/@channel_id/" + channel_id            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_channel_id_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_channel_id_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_question_channel_id_org_id(data);} catch(e) { _log("Error calling: error_get_question_channel_id_org_id: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_channel_id_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_channel_id_org_id(data);} catch(e) { _log("Error calling: handle_get_question_channel_id_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_question_channel_id_code: function
    (
        channel_id,
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.question_service + 'get'
                + "/by-channel-id/by-code"
                + "/@channel_id/" + channel_id            
                + "/@code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_question_channel_id_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::question_get_question_channel_id_code_callback", true);
            // call a method that can be inline callback
            try {error_get_question_channel_id_code(data);} catch(e) { _log("Error calling: error_get_question_channel_id_code: " + e);}
        }
        else {
            _log("SUCCESS::question_get_question_channel_id_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_question_channel_id_code(data);} catch(e) { _log("Error calling: handle_get_question_channel_id_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.profile_offer = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.profile_offer.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_offer: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_offer_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_count_profile_offer_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_offer(data);} catch(e) { _log("Error calling: error_count_profile_offer: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_count_profile_offer_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_offer(data);} catch(e) { _log("Error calling: handle_count_profile_offer: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_offer_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_count_profile_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_offer_uuid(data);} catch(e) { _log("Error calling: error_count_profile_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_count_profile_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_offer_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_offer_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_offer_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'count'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_offer_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_count_profile_offer_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_offer_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_offer_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_count_profile_offer_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_offer_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_offer_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_offer_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_offer_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_browse_profile_offer_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_offer_filter(data);} catch(e) { _log("Error calling: error_browse_profile_offer_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_browse_profile_offer_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_offer_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_offer_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_offer_uuid: function
    (
        status,
        redeem_code,
        offer_id,
        profile_id,
        active,
        uuid,
        redeemed,
        url,
        date_modified,
        date_created,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@redeem_code": redeem_code
            , "@offer_id": offer_id
            , "@profile_id": profile_id
            , "@active": active
            , "@uuid": uuid
            , "@redeemed": redeemed
            , "@url": url
            , "@date_modified": date_modified
            , "@date_created": date_created
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_set_profile_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_offer_uuid(data);} catch(e) { _log("Error calling: error_set_profile_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_set_profile_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_offer_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_offer_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_offer_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_del_profile_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_offer_uuid(data);} catch(e) { _log("Error calling: error_del_profile_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_del_profile_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_offer_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_offer_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_offer_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'del'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_offer_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_del_profile_offer_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_offer_profile_id(data);} catch(e) { _log("Error calling: error_del_profile_offer_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_del_profile_offer_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_offer_profile_id(data);} catch(e) { _log("Error calling: handle_del_profile_offer_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_offer: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_offer_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_get_profile_offer_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_offer(data);} catch(e) { _log("Error calling: error_get_profile_offer: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_get_profile_offer_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_offer(data);} catch(e) { _log("Error calling: handle_get_profile_offer: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_offer_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_offer_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_get_profile_offer_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_offer_uuid(data);} catch(e) { _log("Error calling: error_get_profile_offer_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_get_profile_offer_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_offer_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_offer_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_offer_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_offer_service + 'get'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_offer_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_offer_get_profile_offer_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_offer_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_offer_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_offer_get_profile_offer_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_offer_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_offer_profile_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.profile_app = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.profile_app.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_app: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_app_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_count_profile_app_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_app(data);} catch(e) { _log("Error calling: error_count_profile_app: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_count_profile_app_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_app(data);} catch(e) { _log("Error calling: handle_count_profile_app: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_count_profile_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_app_uuid(data);} catch(e) { _log("Error calling: error_count_profile_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_count_profile_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_app_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_app_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_app_profile_id_app_id: function
    (
        profile_id,
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'count'
                + "/by-profile-id/by-app-id"
                + "/@profile_id/" + profile_id            
                + "/@app_id/" + app_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_app_profile_id_app_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_count_profile_app_profile_id_app_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: error_count_profile_app_profile_id_app_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_count_profile_app_profile_id_app_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: handle_count_profile_app_profile_id_app_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_app_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_app_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_browse_profile_app_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_app_filter(data);} catch(e) { _log("Error calling: error_browse_profile_app_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_browse_profile_app_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_app_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_app_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_app_uuid: function
    (
        status,
        uuid,
        date_modified,
        active,
        date_created,
        profile_id,
        type,
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@profile_id": profile_id
            , "@type": type
            , "@app_id": app_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_set_profile_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_app_uuid(data);} catch(e) { _log("Error calling: error_set_profile_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_set_profile_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_app_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_app_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_app_profile_id_app_id: function
    (
        status,
        uuid,
        date_modified,
        active,
        date_created,
        profile_id,
        type,
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'set'
                + "/by-profile-id/by-app-id"
                + "/@profile_id/" + profile_id            
                + "/@app_id/" + app_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@profile_id": profile_id
            , "@type": type
            , "@app_id": app_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_app_profile_id_app_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_set_profile_app_profile_id_app_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: error_set_profile_app_profile_id_app_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_set_profile_app_profile_id_app_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: handle_set_profile_app_profile_id_app_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_del_profile_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_app_uuid(data);} catch(e) { _log("Error calling: error_del_profile_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_del_profile_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_app_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_app_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_app_profile_id_app_id: function
    (
        profile_id,
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'del'
                + "/by-profile-id/by-app-id"
                + "/@profile_id/" + profile_id            
                + "/@app_id/" + app_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_app_profile_id_app_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_del_profile_app_profile_id_app_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: error_del_profile_app_profile_id_app_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_del_profile_app_profile_id_app_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: handle_del_profile_app_profile_id_app_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_app: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_app_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_get_profile_app_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_app(data);} catch(e) { _log("Error calling: error_get_profile_app: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_get_profile_app_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_app(data);} catch(e) { _log("Error calling: handle_get_profile_app: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_get_profile_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_app_uuid(data);} catch(e) { _log("Error calling: error_get_profile_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_get_profile_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_app_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_app_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_app_app_id: function
    (
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'get'
                + "/by-app-id"
                + "/@app_id/" + app_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_app_app_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_get_profile_app_app_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_app_app_id(data);} catch(e) { _log("Error calling: error_get_profile_app_app_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_get_profile_app_app_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_app_app_id(data);} catch(e) { _log("Error calling: handle_get_profile_app_app_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_app_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'get'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_app_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_get_profile_app_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_app_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_app_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_get_profile_app_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_app_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_app_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_app_profile_id_app_id: function
    (
        profile_id,
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_app_service + 'get'
                + "/by-profile-id/by-app-id"
                + "/@profile_id/" + profile_id            
                + "/@app_id/" + app_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_app_profile_id_app_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_app_get_profile_app_profile_id_app_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: error_get_profile_app_profile_id_app_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_app_get_profile_app_profile_id_app_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_app_profile_id_app_id(data);} catch(e) { _log("Error calling: handle_get_profile_app_profile_id_app_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.profile_org = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.profile_org.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_org: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_org_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_count_profile_org_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_org(data);} catch(e) { _log("Error calling: error_count_profile_org: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_count_profile_org_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_org(data);} catch(e) { _log("Error calling: handle_count_profile_org: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_org_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_count_profile_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_org_uuid(data);} catch(e) { _log("Error calling: error_count_profile_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_count_profile_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_org_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_org_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_org_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_org_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_count_profile_org_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_org_org_id(data);} catch(e) { _log("Error calling: error_count_profile_org_org_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_count_profile_org_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_org_org_id(data);} catch(e) { _log("Error calling: handle_count_profile_org_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_org_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'count'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_org_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_count_profile_org_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_org_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_org_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_count_profile_org_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_org_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_org_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_org_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_org_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_browse_profile_org_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_org_filter(data);} catch(e) { _log("Error calling: error_browse_profile_org_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_browse_profile_org_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_org_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_org_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_org_uuid: function
    (
        status,
        type_id,
        uuid,
        date_modified,
        active,
        date_created,
        profile_id,
        type,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@type_id": type_id
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@profile_id": profile_id
            , "@type": type
            , "@org_id": org_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_set_profile_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_org_uuid(data);} catch(e) { _log("Error calling: error_set_profile_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_set_profile_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_org_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_org_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_org_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_del_profile_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_org_uuid(data);} catch(e) { _log("Error calling: error_del_profile_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_del_profile_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_org_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_org_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_org: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_org_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_get_profile_org_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_org(data);} catch(e) { _log("Error calling: error_get_profile_org: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_get_profile_org_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_org(data);} catch(e) { _log("Error calling: handle_get_profile_org: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_org_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_org_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_get_profile_org_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_org_uuid(data);} catch(e) { _log("Error calling: error_get_profile_org_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_get_profile_org_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_org_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_org_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_org_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_org_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_get_profile_org_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_org_org_id(data);} catch(e) { _log("Error calling: error_get_profile_org_org_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_get_profile_org_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_org_org_id(data);} catch(e) { _log("Error calling: handle_get_profile_org_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_org_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_org_service + 'get'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_org_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_org_get_profile_org_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_org_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_org_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_org_get_profile_org_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_org_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_org_profile_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.profile_question = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.profile_question.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_question: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question(data);} catch(e) { _log("Error calling: error_count_profile_question: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question(data);} catch(e) { _log("Error calling: handle_count_profile_question: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_uuid(data);} catch(e) { _log("Error calling: error_count_profile_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_question_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_channel_id: function
    (
        channel_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-channel-id"
                + "/@channel_id/" + channel_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_channel_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_channel_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_channel_id(data);} catch(e) { _log("Error calling: error_count_profile_question_channel_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_channel_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_channel_id(data);} catch(e) { _log("Error calling: handle_count_profile_question_channel_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_org_id(data);} catch(e) { _log("Error calling: error_count_profile_question_org_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_org_id(data);} catch(e) { _log("Error calling: handle_count_profile_question_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_question_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_question_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_question_id: function
    (
        question_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-question-id"
                + "/@question_id/" + question_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_question_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_question_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_question_id(data);} catch(e) { _log("Error calling: error_count_profile_question_question_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_question_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_question_id(data);} catch(e) { _log("Error calling: handle_count_profile_question_question_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_channel_id_org_id: function
    (
        channel_id,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-channel-id/by-org-id"
                + "/@channel_id/" + channel_id            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_channel_id_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_channel_id_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_channel_id_org_id(data);} catch(e) { _log("Error calling: error_count_profile_question_channel_id_org_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_channel_id_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_channel_id_org_id(data);} catch(e) { _log("Error calling: handle_count_profile_question_channel_id_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_channel_id_profile_id: function
    (
        channel_id,
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-channel-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_channel_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_channel_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_channel_id_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_question_channel_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_channel_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_channel_id_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_question_channel_id_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_question_question_id_profile_id: function
    (
        question_id,
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'count'
                + "/by-question-id/by-profile-id"
                + "/@question_id/" + question_id            
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_question_question_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_count_profile_question_question_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_question_question_id_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_question_question_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_count_profile_question_question_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_question_question_id_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_question_question_id_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_question_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_question_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_browse_profile_question_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_question_filter(data);} catch(e) { _log("Error calling: error_browse_profile_question_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_browse_profile_question_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_question_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_question_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_question_uuid: function
    (
        status,
        profile_id,
        active,
        data,
        uuid,
        date_modified,
        org_id,
        channel_id,
        answer,
        date_created,
        type,
        question_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@profile_id": profile_id
            , "@active": active
            , "@data": data
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@org_id": org_id
            , "@channel_id": channel_id
            , "@answer": answer
            , "@date_created": date_created
            , "@type": type
            , "@question_id": question_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_set_profile_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_question_uuid(data);} catch(e) { _log("Error calling: error_set_profile_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_set_profile_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_question_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_question_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_question_channel_id_profile_id: function
    (
        status,
        profile_id,
        active,
        data,
        uuid,
        date_modified,
        org_id,
        channel_id,
        answer,
        date_created,
        type,
        question_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'set'
                + "/by-channel-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@profile_id/" + profile_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@profile_id": profile_id
            , "@active": active
            , "@data": data
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@org_id": org_id
            , "@channel_id": channel_id
            , "@answer": answer
            , "@date_created": date_created
            , "@type": type
            , "@question_id": question_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_question_channel_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_set_profile_question_channel_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_question_channel_id_profile_id(data);} catch(e) { _log("Error calling: error_set_profile_question_channel_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_set_profile_question_channel_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_question_channel_id_profile_id(data);} catch(e) { _log("Error calling: handle_set_profile_question_channel_id_profile_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_question_question_id_profile_id: function
    (
        status,
        profile_id,
        active,
        data,
        uuid,
        date_modified,
        org_id,
        channel_id,
        answer,
        date_created,
        type,
        question_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'set'
                + "/by-question-id/by-profile-id"
                + "/@question_id/" + question_id            
                + "/@profile_id/" + profile_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@profile_id": profile_id
            , "@active": active
            , "@data": data
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@org_id": org_id
            , "@channel_id": channel_id
            , "@answer": answer
            , "@date_created": date_created
            , "@type": type
            , "@question_id": question_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_question_question_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_set_profile_question_question_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_question_question_id_profile_id(data);} catch(e) { _log("Error calling: error_set_profile_question_question_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_set_profile_question_question_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_question_question_id_profile_id(data);} catch(e) { _log("Error calling: handle_set_profile_question_question_id_profile_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_question_channel_id_question_id_profile_id: function
    (
        status,
        profile_id,
        active,
        data,
        uuid,
        date_modified,
        org_id,
        channel_id,
        answer,
        date_created,
        type,
        question_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'set'
                + "/by-channel-id/by-question-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@question_id/" + question_id            
                + "/@profile_id/" + profile_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@profile_id": profile_id
            , "@active": active
            , "@data": data
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@org_id": org_id
            , "@channel_id": channel_id
            , "@answer": answer
            , "@date_created": date_created
            , "@type": type
            , "@question_id": question_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_question_channel_id_question_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_set_profile_question_channel_id_question_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_question_channel_id_question_id_profile_id(data);} catch(e) { _log("Error calling: error_set_profile_question_channel_id_question_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_set_profile_question_channel_id_question_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_question_channel_id_question_id_profile_id(data);} catch(e) { _log("Error calling: handle_set_profile_question_channel_id_question_id_profile_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_question_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_del_profile_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_question_uuid(data);} catch(e) { _log("Error calling: error_del_profile_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_del_profile_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_question_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_question_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_question_channel_id_org_id: function
    (
        channel_id,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'del'
                + "/by-channel-id/by-org-id"
                + "/@channel_id/" + channel_id            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_question_channel_id_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_del_profile_question_channel_id_org_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_question_channel_id_org_id(data);} catch(e) { _log("Error calling: error_del_profile_question_channel_id_org_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_del_profile_question_channel_id_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_question_channel_id_org_id(data);} catch(e) { _log("Error calling: handle_del_profile_question_channel_id_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question(data);} catch(e) { _log("Error calling: error_get_profile_question: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question(data);} catch(e) { _log("Error calling: handle_get_profile_question: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_uuid(data);} catch(e) { _log("Error calling: error_get_profile_question_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_question_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_channel_id: function
    (
        channel_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-channel-id"
                + "/@channel_id/" + channel_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_channel_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_channel_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_channel_id(data);} catch(e) { _log("Error calling: error_get_profile_question_channel_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_channel_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_channel_id(data);} catch(e) { _log("Error calling: handle_get_profile_question_channel_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_org_id(data);} catch(e) { _log("Error calling: error_get_profile_question_org_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_org_id(data);} catch(e) { _log("Error calling: handle_get_profile_question_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_question_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_question_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_question_id: function
    (
        question_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-question-id"
                + "/@question_id/" + question_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_question_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_question_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_question_id(data);} catch(e) { _log("Error calling: error_get_profile_question_question_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_question_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_question_id(data);} catch(e) { _log("Error calling: handle_get_profile_question_question_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_channel_id_org_id: function
    (
        channel_id,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-channel-id/by-org-id"
                + "/@channel_id/" + channel_id            
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_channel_id_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_channel_id_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_channel_id_org_id(data);} catch(e) { _log("Error calling: error_get_profile_question_channel_id_org_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_channel_id_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_channel_id_org_id(data);} catch(e) { _log("Error calling: handle_get_profile_question_channel_id_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_channel_id_profile_id: function
    (
        channel_id,
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-channel-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_channel_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_channel_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_channel_id_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_question_channel_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_channel_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_channel_id_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_question_channel_id_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_question_question_id_profile_id: function
    (
        question_id,
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_question_service + 'get'
                + "/by-question-id/by-profile-id"
                + "/@question_id/" + question_id            
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_question_question_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_question_get_profile_question_question_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_question_question_id_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_question_question_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_question_get_profile_question_question_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_question_question_id_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_question_question_id_profile_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.profile_channel = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.profile_channel.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_channel: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_channel_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_count_profile_channel_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_channel(data);} catch(e) { _log("Error calling: error_count_profile_channel: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_count_profile_channel_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_channel(data);} catch(e) { _log("Error calling: handle_count_profile_channel: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_channel_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_count_profile_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_channel_uuid(data);} catch(e) { _log("Error calling: error_count_profile_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_count_profile_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_channel_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_channel_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_channel_channel_id: function
    (
        channel_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'count'
                + "/by-channel-id"
                + "/@channel_id/" + channel_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_channel_channel_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_count_profile_channel_channel_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_channel_channel_id(data);} catch(e) { _log("Error calling: error_count_profile_channel_channel_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_count_profile_channel_channel_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_channel_channel_id(data);} catch(e) { _log("Error calling: handle_count_profile_channel_channel_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_channel_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'count'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_channel_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_count_profile_channel_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_channel_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_channel_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_count_profile_channel_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_channel_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_channel_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_channel_channel_id_profile_id: function
    (
        channel_id,
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'count'
                + "/by-channel-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_channel_channel_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_count_profile_channel_channel_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_channel_channel_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_count_profile_channel_channel_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_channel_channel_id_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_channel_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_channel_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_browse_profile_channel_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_channel_filter(data);} catch(e) { _log("Error calling: error_browse_profile_channel_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_browse_profile_channel_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_channel_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_channel_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_channel_uuid: function
    (
        status,
        channel_id,
        uuid,
        date_modified,
        active,
        date_created,
        profile_id,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@channel_id": channel_id
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@profile_id": profile_id
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_set_profile_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_channel_uuid(data);} catch(e) { _log("Error calling: error_set_profile_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_set_profile_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_channel_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_channel_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_channel_channel_id_profile_id: function
    (
        status,
        channel_id,
        uuid,
        date_modified,
        active,
        date_created,
        profile_id,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'set'
                + "/by-channel-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@profile_id/" + profile_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@channel_id": channel_id
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@profile_id": profile_id
            , "@type": type
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_channel_channel_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_set_profile_channel_channel_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: error_set_profile_channel_channel_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_set_profile_channel_channel_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: handle_set_profile_channel_channel_id_profile_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_channel_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_del_profile_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_channel_uuid(data);} catch(e) { _log("Error calling: error_del_profile_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_del_profile_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_channel_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_channel_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_channel_channel_id_profile_id: function
    (
        channel_id,
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'del'
                + "/by-channel-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_channel_channel_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_del_profile_channel_channel_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: error_del_profile_channel_channel_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_del_profile_channel_channel_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: handle_del_profile_channel_channel_id_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_channel: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_channel_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_get_profile_channel_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_channel(data);} catch(e) { _log("Error calling: error_get_profile_channel: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_get_profile_channel_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_channel(data);} catch(e) { _log("Error calling: handle_get_profile_channel: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_channel_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_channel_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_get_profile_channel_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_channel_uuid(data);} catch(e) { _log("Error calling: error_get_profile_channel_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_get_profile_channel_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_channel_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_channel_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_channel_channel_id: function
    (
        channel_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'get'
                + "/by-channel-id"
                + "/@channel_id/" + channel_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_channel_channel_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_get_profile_channel_channel_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_channel_channel_id(data);} catch(e) { _log("Error calling: error_get_profile_channel_channel_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_get_profile_channel_channel_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_channel_channel_id(data);} catch(e) { _log("Error calling: handle_get_profile_channel_channel_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_channel_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'get'
                + "/by-profile-id"
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_channel_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_get_profile_channel_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_channel_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_channel_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_get_profile_channel_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_channel_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_channel_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_channel_channel_id_profile_id: function
    (
        channel_id,
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.profile_channel_service + 'get'
                + "/by-channel-id/by-profile-id"
                + "/@channel_id/" + channel_id            
                + "/@profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_channel_channel_id_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_channel_get_profile_channel_channel_id_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_channel_channel_id_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_channel_get_profile_channel_channel_id_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_channel_channel_id_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_channel_channel_id_profile_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.org_site = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.org_site.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_org_site: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_site_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_count_org_site_callback", true);
            // call a method that can be inline callback
            try {error_count_org_site(data);} catch(e) { _log("Error calling: error_count_org_site: " + e);}
        }
        else {
            _log("SUCCESS::org_site_count_org_site_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_site(data);} catch(e) { _log("Error calling: handle_count_org_site: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_site_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_count_org_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_org_site_uuid(data);} catch(e) { _log("Error calling: error_count_org_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_site_count_org_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_site_uuid(data);} catch(e) { _log("Error calling: handle_count_org_site_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_site_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'count'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_site_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_count_org_site_org_id_callback", true);
            // call a method that can be inline callback
            try {error_count_org_site_org_id(data);} catch(e) { _log("Error calling: error_count_org_site_org_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_count_org_site_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_site_org_id(data);} catch(e) { _log("Error calling: handle_count_org_site_org_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_site_site_id: function
    (
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'count'
                + "/by-site-id"
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_site_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_count_org_site_site_id_callback", true);
            // call a method that can be inline callback
            try {error_count_org_site_site_id(data);} catch(e) { _log("Error calling: error_count_org_site_site_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_count_org_site_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_site_site_id(data);} catch(e) { _log("Error calling: handle_count_org_site_site_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_org_site_org_id_site_id: function
    (
        org_id,
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'count'
                + "/by-org-id/by-site-id"
                + "/@org_id/" + org_id            
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_org_site_org_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_count_org_site_org_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_count_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: error_count_org_site_org_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_count_org_site_org_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: handle_count_org_site_org_id_site_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_org_site_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_org_site_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_browse_org_site_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_org_site_filter(data);} catch(e) { _log("Error calling: error_browse_org_site_filter: " + e);}
        }
        else {
            _log("SUCCESS::org_site_browse_org_site_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_org_site_filter(data);} catch(e) { _log("Error calling: handle_browse_org_site_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_org_site_uuid: function
    (
        status,
        uuid,
        date_modified,
        active,
        date_created,
        site_id,
        type,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@site_id": site_id
            , "@type": type
            , "@org_id": org_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_org_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_set_org_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_org_site_uuid(data);} catch(e) { _log("Error calling: error_set_org_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_site_set_org_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_org_site_uuid(data);} catch(e) { _log("Error calling: handle_set_org_site_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_org_site_org_id_site_id: function
    (
        status,
        uuid,
        date_modified,
        active,
        date_created,
        site_id,
        type,
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'set'
                + "/by-org-id/by-site-id"
                + "/@org_id/" + org_id            
                + "/@site_id/" + site_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@site_id": site_id
            , "@type": type
            , "@org_id": org_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_org_site_org_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_set_org_site_org_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_set_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: error_set_org_site_org_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_set_org_site_org_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: handle_set_org_site_org_id_site_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_org_site_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_org_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_del_org_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_org_site_uuid(data);} catch(e) { _log("Error calling: error_del_org_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_site_del_org_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_org_site_uuid(data);} catch(e) { _log("Error calling: handle_del_org_site_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_org_site_org_id_site_id: function
    (
        org_id,
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'del'
                + "/by-org-id/by-site-id"
                + "/@org_id/" + org_id            
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_org_site_org_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_del_org_site_org_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_del_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: error_del_org_site_org_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_del_org_site_org_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: handle_del_org_site_org_id_site_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_site: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_site_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_get_org_site_callback", true);
            // call a method that can be inline callback
            try {error_get_org_site(data);} catch(e) { _log("Error calling: error_get_org_site: " + e);}
        }
        else {
            _log("SUCCESS::org_site_get_org_site_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_site(data);} catch(e) { _log("Error calling: handle_get_org_site: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_site_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_site_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_get_org_site_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_org_site_uuid(data);} catch(e) { _log("Error calling: error_get_org_site_uuid: " + e);}
        }
        else {
            _log("SUCCESS::org_site_get_org_site_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_site_uuid(data);} catch(e) { _log("Error calling: handle_get_org_site_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_site_org_id: function
    (
        org_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'get'
                + "/by-org-id"
                + "/@org_id/" + org_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_site_org_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_get_org_site_org_id_callback", true);
            // call a method that can be inline callback
            try {error_get_org_site_org_id(data);} catch(e) { _log("Error calling: error_get_org_site_org_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_get_org_site_org_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_site_org_id(data);} catch(e) { _log("Error calling: handle_get_org_site_org_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_site_site_id: function
    (
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'get'
                + "/by-site-id"
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_site_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_get_org_site_site_id_callback", true);
            // call a method that can be inline callback
            try {error_get_org_site_site_id(data);} catch(e) { _log("Error calling: error_get_org_site_site_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_get_org_site_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_site_site_id(data);} catch(e) { _log("Error calling: handle_get_org_site_site_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_org_site_org_id_site_id: function
    (
        org_id,
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.org_site_service + 'get'
                + "/by-org-id/by-site-id"
                + "/@org_id/" + org_id            
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_org_site_org_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::org_site_get_org_site_org_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_get_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: error_get_org_site_org_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::org_site_get_org_site_org_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_org_site_org_id_site_id(data);} catch(e) { _log("Error calling: handle_get_org_site_org_id_site_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.site_app = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.site_app.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_site_app: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_app_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_count_site_app_callback", true);
            // call a method that can be inline callback
            try {error_count_site_app(data);} catch(e) { _log("Error calling: error_count_site_app: " + e);}
        }
        else {
            _log("SUCCESS::site_app_count_site_app_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_app(data);} catch(e) { _log("Error calling: handle_count_site_app: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_count_site_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_site_app_uuid(data);} catch(e) { _log("Error calling: error_count_site_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_app_count_site_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_app_uuid(data);} catch(e) { _log("Error calling: handle_count_site_app_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_app_app_id: function
    (
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'count'
                + "/by-app-id"
                + "/@app_id/" + app_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_app_app_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_count_site_app_app_id_callback", true);
            // call a method that can be inline callback
            try {error_count_site_app_app_id(data);} catch(e) { _log("Error calling: error_count_site_app_app_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_count_site_app_app_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_app_app_id(data);} catch(e) { _log("Error calling: handle_count_site_app_app_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_app_site_id: function
    (
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'count'
                + "/by-site-id"
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_app_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_count_site_app_site_id_callback", true);
            // call a method that can be inline callback
            try {error_count_site_app_site_id(data);} catch(e) { _log("Error calling: error_count_site_app_site_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_count_site_app_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_app_site_id(data);} catch(e) { _log("Error calling: handle_count_site_app_site_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_site_app_app_id_site_id: function
    (
        app_id,
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'count'
                + "/by-app-id/by-site-id"
                + "/@app_id/" + app_id            
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_site_app_app_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_count_site_app_app_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_count_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: error_count_site_app_app_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_count_site_app_app_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: handle_count_site_app_app_id_site_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_site_app_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_site_app_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_browse_site_app_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_site_app_filter(data);} catch(e) { _log("Error calling: error_browse_site_app_filter: " + e);}
        }
        else {
            _log("SUCCESS::site_app_browse_site_app_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_site_app_filter(data);} catch(e) { _log("Error calling: handle_browse_site_app_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_site_app_uuid: function
    (
        status,
        uuid,
        date_modified,
        active,
        date_created,
        site_id,
        type,
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@site_id": site_id
            , "@type": type
            , "@app_id": app_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_site_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_set_site_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_site_app_uuid(data);} catch(e) { _log("Error calling: error_set_site_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_app_set_site_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_site_app_uuid(data);} catch(e) { _log("Error calling: handle_set_site_app_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_site_app_app_id_site_id: function
    (
        status,
        uuid,
        date_modified,
        active,
        date_created,
        site_id,
        type,
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'set'
                + "/by-app-id/by-site-id"
                + "/@app_id/" + app_id            
                + "/@site_id/" + site_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@uuid": uuid
            , "@date_modified": date_modified
            , "@active": active
            , "@date_created": date_created
            , "@site_id": site_id
            , "@type": type
            , "@app_id": app_id
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_site_app_app_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_set_site_app_app_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_set_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: error_set_site_app_app_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_set_site_app_app_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: handle_set_site_app_app_id_site_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_site_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_site_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_del_site_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_site_app_uuid(data);} catch(e) { _log("Error calling: error_del_site_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_app_del_site_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_site_app_uuid(data);} catch(e) { _log("Error calling: handle_del_site_app_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_site_app_app_id_site_id: function
    (
        app_id,
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'del'
                + "/by-app-id/by-site-id"
                + "/@app_id/" + app_id            
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_site_app_app_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_del_site_app_app_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_del_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: error_del_site_app_app_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_del_site_app_app_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: handle_del_site_app_app_id_site_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_app: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_app_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_get_site_app_callback", true);
            // call a method that can be inline callback
            try {error_get_site_app(data);} catch(e) { _log("Error calling: error_get_site_app: " + e);}
        }
        else {
            _log("SUCCESS::site_app_get_site_app_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_app(data);} catch(e) { _log("Error calling: handle_get_site_app: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_app_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_app_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_get_site_app_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_site_app_uuid(data);} catch(e) { _log("Error calling: error_get_site_app_uuid: " + e);}
        }
        else {
            _log("SUCCESS::site_app_get_site_app_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_app_uuid(data);} catch(e) { _log("Error calling: handle_get_site_app_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_app_app_id: function
    (
        app_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'get'
                + "/by-app-id"
                + "/@app_id/" + app_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_app_app_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_get_site_app_app_id_callback", true);
            // call a method that can be inline callback
            try {error_get_site_app_app_id(data);} catch(e) { _log("Error calling: error_get_site_app_app_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_get_site_app_app_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_app_app_id(data);} catch(e) { _log("Error calling: handle_get_site_app_app_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_app_site_id: function
    (
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'get'
                + "/by-site-id"
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_app_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_get_site_app_site_id_callback", true);
            // call a method that can be inline callback
            try {error_get_site_app_site_id(data);} catch(e) { _log("Error calling: error_get_site_app_site_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_get_site_app_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_app_site_id(data);} catch(e) { _log("Error calling: handle_get_site_app_site_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_site_app_app_id_site_id: function
    (
        app_id,
        site_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.site_app_service + 'get'
                + "/by-app-id/by-site-id"
                + "/@app_id/" + app_id            
                + "/@site_id/" + site_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_site_app_app_id_site_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::site_app_get_site_app_app_id_site_id_callback", true);
            // call a method that can be inline callback
            try {error_get_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: error_get_site_app_app_id_site_id: " + e);}
        }
        else {
            _log("SUCCESS::site_app_get_site_app_app_id_site_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_site_app_app_id_site_id(data);} catch(e) { _log("Error calling: handle_get_site_app_app_id_site_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.photo = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.photo.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_photo: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_photo_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_count_photo_callback", true);
            // call a method that can be inline callback
            try {error_count_photo(data);} catch(e) { _log("Error calling: error_count_photo: " + e);}
        }
        else {
            _log("SUCCESS::photo_count_photo_callback", false);
            // call a method that can be inline callback
            try {handle_count_photo(data);} catch(e) { _log("Error calling: handle_count_photo: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_photo_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_photo_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_count_photo_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_photo_uuid(data);} catch(e) { _log("Error calling: error_count_photo_uuid: " + e);}
        }
        else {
            _log("SUCCESS::photo_count_photo_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_photo_uuid(data);} catch(e) { _log("Error calling: handle_count_photo_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_photo_external_id: function
    (
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'count'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_photo_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_count_photo_external_id_callback", true);
            // call a method that can be inline callback
            try {error_count_photo_external_id(data);} catch(e) { _log("Error calling: error_count_photo_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_count_photo_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_photo_external_id(data);} catch(e) { _log("Error calling: handle_count_photo_external_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_photo_url: function
    (
        url,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'count'
                + "/by-url"
                + "/@url/" + url            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_photo_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_count_photo_url_callback", true);
            // call a method that can be inline callback
            try {error_count_photo_url(data);} catch(e) { _log("Error calling: error_count_photo_url: " + e);}
        }
        else {
            _log("SUCCESS::photo_count_photo_url_callback", false);
            // call a method that can be inline callback
            try {handle_count_photo_url(data);} catch(e) { _log("Error calling: handle_count_photo_url: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_photo_url_external_id: function
    (
        url,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'count'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_photo_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_count_photo_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_count_photo_url_external_id(data);} catch(e) { _log("Error calling: error_count_photo_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_count_photo_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_photo_url_external_id(data);} catch(e) { _log("Error calling: handle_count_photo_url_external_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_photo_uuid_external_id: function
    (
        uuid,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'count'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_photo_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_count_photo_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_count_photo_uuid_external_id(data);} catch(e) { _log("Error calling: error_count_photo_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_count_photo_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_photo_uuid_external_id(data);} catch(e) { _log("Error calling: handle_count_photo_uuid_external_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_photo_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_photo_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_browse_photo_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_photo_filter(data);} catch(e) { _log("Error calling: error_browse_photo_filter: " + e);}
        }
        else {
            _log("SUCCESS::photo_browse_photo_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_photo_filter(data);} catch(e) { _log("Error calling: handle_browse_photo_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_photo_uuid: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_photo_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_set_photo_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_photo_uuid(data);} catch(e) { _log("Error calling: error_set_photo_uuid: " + e);}
        }
        else {
            _log("SUCCESS::photo_set_photo_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_photo_uuid(data);} catch(e) { _log("Error calling: handle_set_photo_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_photo_external_id: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'set'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_photo_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_set_photo_external_id_callback", true);
            // call a method that can be inline callback
            try {error_set_photo_external_id(data);} catch(e) { _log("Error calling: error_set_photo_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_set_photo_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_photo_external_id(data);} catch(e) { _log("Error calling: handle_set_photo_external_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_photo_url: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'set'
                + "/by-url"
                + "/@url/" + url            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_photo_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_set_photo_url_callback", true);
            // call a method that can be inline callback
            try {error_set_photo_url(data);} catch(e) { _log("Error calling: error_set_photo_url: " + e);}
        }
        else {
            _log("SUCCESS::photo_set_photo_url_callback", false);
            // call a method that can be inline callback
            try {handle_set_photo_url(data);} catch(e) { _log("Error calling: handle_set_photo_url: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_photo_url_external_id: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'set'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_photo_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_set_photo_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_set_photo_url_external_id(data);} catch(e) { _log("Error calling: error_set_photo_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_set_photo_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_photo_url_external_id(data);} catch(e) { _log("Error calling: handle_set_photo_url_external_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_photo_uuid_external_id: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'set'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_photo_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_set_photo_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_set_photo_uuid_external_id(data);} catch(e) { _log("Error calling: error_set_photo_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_set_photo_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_photo_uuid_external_id(data);} catch(e) { _log("Error calling: handle_set_photo_uuid_external_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_photo_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_photo_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_del_photo_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_photo_uuid(data);} catch(e) { _log("Error calling: error_del_photo_uuid: " + e);}
        }
        else {
            _log("SUCCESS::photo_del_photo_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_photo_uuid(data);} catch(e) { _log("Error calling: handle_del_photo_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_photo_external_id: function
    (
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'del'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_photo_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_del_photo_external_id_callback", true);
            // call a method that can be inline callback
            try {error_del_photo_external_id(data);} catch(e) { _log("Error calling: error_del_photo_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_del_photo_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_photo_external_id(data);} catch(e) { _log("Error calling: handle_del_photo_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_photo_url: function
    (
        url,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'del'
                + "/by-url"
                + "/@url/" + url            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_photo_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_del_photo_url_callback", true);
            // call a method that can be inline callback
            try {error_del_photo_url(data);} catch(e) { _log("Error calling: error_del_photo_url: " + e);}
        }
        else {
            _log("SUCCESS::photo_del_photo_url_callback", false);
            // call a method that can be inline callback
            try {handle_del_photo_url(data);} catch(e) { _log("Error calling: handle_del_photo_url: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_photo_url_external_id: function
    (
        url,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'del'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_photo_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_del_photo_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_del_photo_url_external_id(data);} catch(e) { _log("Error calling: error_del_photo_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_del_photo_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_photo_url_external_id(data);} catch(e) { _log("Error calling: handle_del_photo_url_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_photo_uuid_external_id: function
    (
        uuid,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'del'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_photo_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_del_photo_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_del_photo_uuid_external_id(data);} catch(e) { _log("Error calling: error_del_photo_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_del_photo_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_photo_uuid_external_id(data);} catch(e) { _log("Error calling: handle_del_photo_uuid_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_photo: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_photo_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_get_photo_callback", true);
            // call a method that can be inline callback
            try {error_get_photo(data);} catch(e) { _log("Error calling: error_get_photo: " + e);}
        }
        else {
            _log("SUCCESS::photo_get_photo_callback", false);
            // call a method that can be inline callback
            try {handle_get_photo(data);} catch(e) { _log("Error calling: handle_get_photo: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_photo_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_photo_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_get_photo_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_photo_uuid(data);} catch(e) { _log("Error calling: error_get_photo_uuid: " + e);}
        }
        else {
            _log("SUCCESS::photo_get_photo_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_photo_uuid(data);} catch(e) { _log("Error calling: handle_get_photo_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_photo_external_id: function
    (
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'get'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_photo_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_get_photo_external_id_callback", true);
            // call a method that can be inline callback
            try {error_get_photo_external_id(data);} catch(e) { _log("Error calling: error_get_photo_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_get_photo_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_photo_external_id(data);} catch(e) { _log("Error calling: handle_get_photo_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_photo_url: function
    (
        url,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'get'
                + "/by-url"
                + "/@url/" + url            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_photo_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_get_photo_url_callback", true);
            // call a method that can be inline callback
            try {error_get_photo_url(data);} catch(e) { _log("Error calling: error_get_photo_url: " + e);}
        }
        else {
            _log("SUCCESS::photo_get_photo_url_callback", false);
            // call a method that can be inline callback
            try {handle_get_photo_url(data);} catch(e) { _log("Error calling: handle_get_photo_url: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_photo_url_external_id: function
    (
        url,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'get'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_photo_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_get_photo_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_get_photo_url_external_id(data);} catch(e) { _log("Error calling: error_get_photo_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_get_photo_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_photo_url_external_id(data);} catch(e) { _log("Error calling: handle_get_photo_url_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_photo_uuid_external_id: function
    (
        uuid,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.photo_service + 'get'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_photo_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::photo_get_photo_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_get_photo_uuid_external_id(data);} catch(e) { _log("Error calling: error_get_photo_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::photo_get_photo_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_photo_uuid_external_id(data);} catch(e) { _log("Error calling: handle_get_photo_uuid_external_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
platform.video = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_platform_obj = this;
}        
        
platform.video.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_video: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_video_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_count_video_callback", true);
            // call a method that can be inline callback
            try {error_count_video(data);} catch(e) { _log("Error calling: error_count_video: " + e);}
        }
        else {
            _log("SUCCESS::video_count_video_callback", false);
            // call a method that can be inline callback
            try {handle_count_video(data);} catch(e) { _log("Error calling: handle_count_video: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_video_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'count'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_video_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_count_video_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_video_uuid(data);} catch(e) { _log("Error calling: error_count_video_uuid: " + e);}
        }
        else {
            _log("SUCCESS::video_count_video_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_video_uuid(data);} catch(e) { _log("Error calling: handle_count_video_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_video_external_id: function
    (
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'count'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_video_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_count_video_external_id_callback", true);
            // call a method that can be inline callback
            try {error_count_video_external_id(data);} catch(e) { _log("Error calling: error_count_video_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_count_video_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_video_external_id(data);} catch(e) { _log("Error calling: handle_count_video_external_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_video_url: function
    (
        url,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'count'
                + "/by-url"
                + "/@url/" + url            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_video_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_count_video_url_callback", true);
            // call a method that can be inline callback
            try {error_count_video_url(data);} catch(e) { _log("Error calling: error_count_video_url: " + e);}
        }
        else {
            _log("SUCCESS::video_count_video_url_callback", false);
            // call a method that can be inline callback
            try {handle_count_video_url(data);} catch(e) { _log("Error calling: handle_count_video_url: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_video_url_external_id: function
    (
        url,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'count'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_video_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_count_video_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_count_video_url_external_id(data);} catch(e) { _log("Error calling: error_count_video_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_count_video_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_video_url_external_id(data);} catch(e) { _log("Error calling: handle_count_video_url_external_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_video_uuid_external_id: function
    (
        uuid,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'count'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_video_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_count_video_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_count_video_uuid_external_id(data);} catch(e) { _log("Error calling: error_count_video_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_count_video_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_video_uuid_external_id(data);} catch(e) { _log("Error calling: handle_count_video_uuid_external_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_video_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'browse'
                + "/by-filter"
                + "/@page/" + page
                + "/@page_size/" + page_size
                + "/@filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_video_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_browse_video_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_video_filter(data);} catch(e) { _log("Error calling: error_browse_video_filter: " + e);}
        }
        else {
            _log("SUCCESS::video_browse_video_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_video_filter(data);} catch(e) { _log("Error calling: handle_browse_video_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_video_uuid: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'set'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_video_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_set_video_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_video_uuid(data);} catch(e) { _log("Error calling: error_set_video_uuid: " + e);}
        }
        else {
            _log("SUCCESS::video_set_video_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_video_uuid(data);} catch(e) { _log("Error calling: handle_set_video_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_video_external_id: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'set'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_video_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_set_video_external_id_callback", true);
            // call a method that can be inline callback
            try {error_set_video_external_id(data);} catch(e) { _log("Error calling: error_set_video_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_set_video_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_video_external_id(data);} catch(e) { _log("Error calling: handle_set_video_external_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_video_url: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'set'
                + "/by-url"
                + "/@url/" + url            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_video_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_set_video_url_callback", true);
            // call a method that can be inline callback
            try {error_set_video_url(data);} catch(e) { _log("Error calling: error_set_video_url: " + e);}
        }
        else {
            _log("SUCCESS::video_set_video_url_callback", false);
            // call a method that can be inline callback
            try {handle_set_video_url(data);} catch(e) { _log("Error calling: handle_set_video_url: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_video_url_external_id: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'set'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_video_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_set_video_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_set_video_url_external_id(data);} catch(e) { _log("Error calling: error_set_video_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_set_video_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_video_url_external_id(data);} catch(e) { _log("Error calling: handle_set_video_url_external_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_video_uuid_external_id: function
    (
        status,
        third_party_oembed,
        code,
        display_name,
        name,
        date_modified,
        url,
        third_party_data,
        uuid,
        third_party_url,
        third_party_id,
        content_type,
        external_id,
        active,
        date_created,
        type,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'set'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "@status": status
            , "@third_party_oembed": third_party_oembed
            , "@code": code
            , "@display_name": display_name
            , "@name": name
            , "@date_modified": date_modified
            , "@url": url
            , "@third_party_data": third_party_data
            , "@uuid": uuid
            , "@third_party_url": third_party_url
            , "@third_party_id": third_party_id
            , "@content_type": content_type
            , "@external_id": external_id
            , "@active": active
            , "@date_created": date_created
            , "@type": type
            , "@description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_video_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_set_video_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_set_video_uuid_external_id(data);} catch(e) { _log("Error calling: error_set_video_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_set_video_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_video_uuid_external_id(data);} catch(e) { _log("Error calling: handle_set_video_uuid_external_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_video_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'del'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_video_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_del_video_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_video_uuid(data);} catch(e) { _log("Error calling: error_del_video_uuid: " + e);}
        }
        else {
            _log("SUCCESS::video_del_video_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_video_uuid(data);} catch(e) { _log("Error calling: handle_del_video_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_video_external_id: function
    (
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'del'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_video_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_del_video_external_id_callback", true);
            // call a method that can be inline callback
            try {error_del_video_external_id(data);} catch(e) { _log("Error calling: error_del_video_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_del_video_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_video_external_id(data);} catch(e) { _log("Error calling: handle_del_video_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_video_url: function
    (
        url,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'del'
                + "/by-url"
                + "/@url/" + url            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_video_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_del_video_url_callback", true);
            // call a method that can be inline callback
            try {error_del_video_url(data);} catch(e) { _log("Error calling: error_del_video_url: " + e);}
        }
        else {
            _log("SUCCESS::video_del_video_url_callback", false);
            // call a method that can be inline callback
            try {handle_del_video_url(data);} catch(e) { _log("Error calling: handle_del_video_url: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_video_url_external_id: function
    (
        url,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'del'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_video_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_del_video_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_del_video_url_external_id(data);} catch(e) { _log("Error calling: error_del_video_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_del_video_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_video_url_external_id(data);} catch(e) { _log("Error calling: handle_del_video_url_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_video_uuid_external_id: function
    (
        uuid,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'del'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_video_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_del_video_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_del_video_uuid_external_id(data);} catch(e) { _log("Error calling: error_del_video_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_del_video_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_video_uuid_external_id(data);} catch(e) { _log("Error calling: handle_del_video_uuid_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_video: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_video_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_get_video_callback", true);
            // call a method that can be inline callback
            try {error_get_video(data);} catch(e) { _log("Error calling: error_get_video: " + e);}
        }
        else {
            _log("SUCCESS::video_get_video_callback", false);
            // call a method that can be inline callback
            try {handle_get_video(data);} catch(e) { _log("Error calling: handle_get_video: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_video_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'get'
                + "/by-uuid"
                + "/@uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_video_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_get_video_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_video_uuid(data);} catch(e) { _log("Error calling: error_get_video_uuid: " + e);}
        }
        else {
            _log("SUCCESS::video_get_video_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_video_uuid(data);} catch(e) { _log("Error calling: handle_get_video_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_video_external_id: function
    (
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'get'
                + "/by-external-id"
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_video_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_get_video_external_id_callback", true);
            // call a method that can be inline callback
            try {error_get_video_external_id(data);} catch(e) { _log("Error calling: error_get_video_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_get_video_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_video_external_id(data);} catch(e) { _log("Error calling: handle_get_video_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_video_url: function
    (
        url,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'get'
                + "/by-url"
                + "/@url/" + url            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_video_url_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_get_video_url_callback", true);
            // call a method that can be inline callback
            try {error_get_video_url(data);} catch(e) { _log("Error calling: error_get_video_url: " + e);}
        }
        else {
            _log("SUCCESS::video_get_video_url_callback", false);
            // call a method that can be inline callback
            try {handle_get_video_url(data);} catch(e) { _log("Error calling: handle_get_video_url: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_video_url_external_id: function
    (
        url,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'get'
                + "/by-url/by-external-id"
                + "/@url/" + url            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_video_url_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_get_video_url_external_id_callback", true);
            // call a method that can be inline callback
            try {error_get_video_url_external_id(data);} catch(e) { _log("Error calling: error_get_video_url_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_get_video_url_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_video_url_external_id(data);} catch(e) { _log("Error calling: handle_get_video_url_external_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_video_uuid_external_id: function
    (
        uuid,
        external_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = platform_platform_global.video_service + 'get'
                + "/by-uuid/by-external-id"
                + "/@uuid/" + uuid            
                + "/@external_id/" + external_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            None
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_video_uuid_external_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::video_get_video_uuid_external_id_callback", true);
            // call a method that can be inline callback
            try {error_get_video_uuid_external_id(data);} catch(e) { _log("Error calling: error_get_video_uuid_external_id: " + e);}
        }
        else {
            _log("SUCCESS::video_get_video_uuid_external_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_video_uuid_external_id(data);} catch(e) { _log("Error calling: handle_get_video_uuid_external_id: " + e);}
        }
        
    }
}






