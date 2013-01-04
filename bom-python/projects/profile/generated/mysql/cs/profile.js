
var return_profile_obj = null;

//-------------------------------------------------
if (!window.ah)
    window.ah = {};
    
if (!window.profile)
    window.profile = {};
    
if (!window.profile.base_entity)
    window.profile.base_entity = {};
   
if (!window.profile.base_meta)
    window.profile.base_meta = {};
   
if (!window.profile.profile)
    window.profile.profile = {};
   
if (!window.profile.profile_type)
    window.profile.profile_type = {};
   
if (!window.profile.profile_attribute)
    window.profile.profile_attribute = {};
   
if (!window.profile.profile_attribute_text)
    window.profile.profile_attribute_text = {};
   
if (!window.profile.profile_attribute_data)
    window.profile.profile_attribute_data = {};
   
if (!window.profile.profile_device)
    window.profile.profile_device = {};
   
if (!window.profile.country)
    window.profile.country = {};
   
if (!window.profile.state)
    window.profile.state = {};
   
if (!window.profile.city)
    window.profile.city = {};
   
if (!window.profile.postal_code)
    window.profile.postal_code = {};
   

//-------------------------------------------------
ah.profile.global = function() {

    this.url = document.location;
    this.service_base = '/api/v1/';
    this.base_entity_service = this.service_base + 'base_entity/';
    this.base_meta_service = this.service_base + 'base_meta/';
    this.profile_service = this.service_base + 'profile/';
    this.profile_type_service = this.service_base + 'profile_type/';
    this.profile_attribute_service = this.service_base + 'profile_attribute/';
    this.profile_attribute_text_service = this.service_base + 'profile_attribute_text/';
    this.profile_attribute_data_service = this.service_base + 'profile_attribute_data/';
    this.profile_device_service = this.service_base + 'profile_device/';
    this.country_service = this.service_base + 'country/';
    this.state_service = this.service_base + 'state/';
    this.city_service = this.service_base + 'city/';
    this.postal_code_service = this.service_base + 'postal_code/';
}

var ah_profile_global = new ah.profile.global();
       
//-------------------------------------------------
profile.base_entity = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.base_entity.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
}
//-------------------------------------------------
profile.base_meta = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.base_meta.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
}
//-------------------------------------------------
profile.profile = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.profile.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_count_profile_callback", true);
            // call a method that can be inline callback
            try {error_count_profile(data);} catch(e) { _log("Error calling: error_count_profile: " + e);}
        }
        else {
            _log("SUCCESS::profile_count_profile_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile(data);} catch(e) { _log("Error calling: handle_count_profile: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_count_profile_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_uuid(data);} catch(e) { _log("Error calling: error_count_profile_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_count_profile_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_username_hash: function
    (
        username,
        hash,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'count'
                + "/username/hash"
                + "/username/" + username            
                + "/hash/" + hash            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_username_hash_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_count_profile_username_hash_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_username_hash(data);} catch(e) { _log("Error calling: error_count_profile_username_hash: " + e);}
        }
        else {
            _log("SUCCESS::profile_count_profile_username_hash_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_username_hash(data);} catch(e) { _log("Error calling: handle_count_profile_username_hash: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_username: function
    (
        username,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'count'
                + "/username"
                + "/username/" + username            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_username_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_count_profile_username_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_username(data);} catch(e) { _log("Error calling: error_count_profile_username: " + e);}
        }
        else {
            _log("SUCCESS::profile_count_profile_username_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_username(data);} catch(e) { _log("Error calling: handle_count_profile_username: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_browse_profile_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_filter(data);} catch(e) { _log("Error calling: error_browse_profile_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_browse_profile_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_uuid: function
    (
        status,
        username,
        first_name,
        last_name,
        hash,
        uuid,
        date_modified,
        active,
        date_created,
        email,
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "username": username
            , "first_name": first_name
            , "last_name": last_name
            , "hash": hash
            , "uuid": uuid
            , "date_modified": date_modified
            , "active": active
            , "date_created": date_created
            , "email": email
            , "name": name
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_set_profile_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_uuid(data);} catch(e) { _log("Error calling: error_set_profile_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_set_profile_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_username: function
    (
        status,
        username,
        first_name,
        last_name,
        hash,
        uuid,
        date_modified,
        active,
        date_created,
        email,
        name,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'set'
                + "/username"
                + "/username/" + username            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "username": username
            , "first_name": first_name
            , "last_name": last_name
            , "hash": hash
            , "uuid": uuid
            , "date_modified": date_modified
            , "active": active
            , "date_created": date_created
            , "email": email
            , "name": name
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_username_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_set_profile_username_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_username(data);} catch(e) { _log("Error calling: error_set_profile_username: " + e);}
        }
        else {
            _log("SUCCESS::profile_set_profile_username_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_username(data);} catch(e) { _log("Error calling: handle_set_profile_username: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_del_profile_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_uuid(data);} catch(e) { _log("Error calling: error_del_profile_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_del_profile_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_username: function
    (
        username,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'del'
                + "/username"
                + "/username/" + username            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_username_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_del_profile_username_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_username(data);} catch(e) { _log("Error calling: error_del_profile_username: " + e);}
        }
        else {
            _log("SUCCESS::profile_del_profile_username_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_username(data);} catch(e) { _log("Error calling: handle_del_profile_username: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_get_profile_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_uuid(data);} catch(e) { _log("Error calling: error_get_profile_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_get_profile_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_username_hash: function
    (
        username,
        hash,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'get'
                + "/username/hash"
                + "/username/" + username            
                + "/hash/" + hash            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_username_hash_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_get_profile_username_hash_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_username_hash(data);} catch(e) { _log("Error calling: error_get_profile_username_hash: " + e);}
        }
        else {
            _log("SUCCESS::profile_get_profile_username_hash_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_username_hash(data);} catch(e) { _log("Error calling: handle_get_profile_username_hash: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_username: function
    (
        username,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_service + 'get'
                + "/username"
                + "/username/" + username            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_username_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_get_profile_username_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_username(data);} catch(e) { _log("Error calling: error_get_profile_username: " + e);}
        }
        else {
            _log("SUCCESS::profile_get_profile_username_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_username(data);} catch(e) { _log("Error calling: handle_get_profile_username: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.profile_type = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.profile_type.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_type: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_count_profile_type_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_type(data);} catch(e) { _log("Error calling: error_count_profile_type: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_count_profile_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_type(data);} catch(e) { _log("Error calling: handle_count_profile_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_count_profile_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_type_uuid(data);} catch(e) { _log("Error calling: error_count_profile_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_count_profile_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_type_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_type_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_type_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'count'
                + "/type-id"
                + "/type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_type_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_count_profile_type_type_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_type_type_id(data);} catch(e) { _log("Error calling: error_count_profile_type_type_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_count_profile_type_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_type_type_id(data);} catch(e) { _log("Error calling: handle_count_profile_type_type_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_type_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_type_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_browse_profile_type_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_type_filter(data);} catch(e) { _log("Error calling: error_browse_profile_type_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_browse_profile_type_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_type_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_type_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_type_uuid: function
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
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "type_id": type_id
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_set_profile_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_type_uuid(data);} catch(e) { _log("Error calling: error_set_profile_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_set_profile_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_type_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_type_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_del_profile_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_type_uuid(data);} catch(e) { _log("Error calling: error_del_profile_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_del_profile_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_type_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_type_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_type_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_get_profile_type_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_type_uuid(data);} catch(e) { _log("Error calling: error_get_profile_type_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_get_profile_type_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_type_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_type_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_type_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'get'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_type_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_get_profile_type_code_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_type_code(data);} catch(e) { _log("Error calling: error_get_profile_type_code: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_get_profile_type_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_type_code(data);} catch(e) { _log("Error calling: handle_get_profile_type_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_type_type_id: function
    (
        type_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_type_service + 'get'
                + "/type-id"
                + "/type_id/" + type_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_type_type_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_type_get_profile_type_type_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_type_type_id(data);} catch(e) { _log("Error calling: error_get_profile_type_type_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_type_get_profile_type_type_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_type_type_id(data);} catch(e) { _log("Error calling: handle_get_profile_type_type_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.profile_attribute = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.profile_attribute.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_attribute: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_count_profile_attribute_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute(data);} catch(e) { _log("Error calling: error_count_profile_attribute: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_count_profile_attribute_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute(data);} catch(e) { _log("Error calling: handle_count_profile_attribute: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_count_profile_attribute_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_uuid(data);} catch(e) { _log("Error calling: error_count_profile_attribute_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_count_profile_attribute_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'count'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_count_profile_attribute_code_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_code(data);} catch(e) { _log("Error calling: error_count_profile_attribute_code: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_count_profile_attribute_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_code(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_type: function
    (
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'count'
                + "/type"
                + "/type/" + type            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_count_profile_attribute_type_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_type(data);} catch(e) { _log("Error calling: error_count_profile_attribute_type: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_count_profile_attribute_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_type(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_group: function
    (
        group,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'count'
                + "/group"
                + "/group/" + group            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_group_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_count_profile_attribute_group_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_group(data);} catch(e) { _log("Error calling: error_count_profile_attribute_group: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_count_profile_attribute_group_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_group(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_group: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_code_type: function
    (
        code,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'count'
                + "/code/type"
                + "/code/" + code            
                + "/type/" + type            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_code_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_count_profile_attribute_code_type_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_code_type(data);} catch(e) { _log("Error calling: error_count_profile_attribute_code_type: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_count_profile_attribute_code_type_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_code_type(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_code_type: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_attribute_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_attribute_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_browse_profile_attribute_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_attribute_filter(data);} catch(e) { _log("Error calling: error_browse_profile_attribute_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_browse_profile_attribute_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_attribute_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_attribute_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_uuid: function
    (
        status,
        sort,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        group,
        active,
        date_created,
        type,
        order,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "group": group
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_set_profile_attribute_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_uuid(data);} catch(e) { _log("Error calling: error_set_profile_attribute_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_set_profile_attribute_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_attribute_code: function
    (
        status,
        sort,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        group,
        active,
        date_created,
        type,
        order,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'set'
                + "/code"
                + "/code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "group": group
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_set_profile_attribute_code_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_code(data);} catch(e) { _log("Error calling: error_set_profile_attribute_code: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_set_profile_attribute_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_code(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_attribute_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_del_profile_attribute_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_uuid(data);} catch(e) { _log("Error calling: error_del_profile_attribute_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_del_profile_attribute_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'del'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_del_profile_attribute_code_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_code(data);} catch(e) { _log("Error calling: error_del_profile_attribute_code: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_del_profile_attribute_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_code(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_get_profile_attribute_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_uuid(data);} catch(e) { _log("Error calling: error_get_profile_attribute_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_get_profile_attribute_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'get'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_get_profile_attribute_code_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_code(data);} catch(e) { _log("Error calling: error_get_profile_attribute_code: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_get_profile_attribute_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_code(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_type: function
    (
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'get'
                + "/type"
                + "/type/" + type            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_get_profile_attribute_type_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_type(data);} catch(e) { _log("Error calling: error_get_profile_attribute_type: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_get_profile_attribute_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_type(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_type: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_group: function
    (
        group,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'get'
                + "/group"
                + "/group/" + group            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_group_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_get_profile_attribute_group_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_group(data);} catch(e) { _log("Error calling: error_get_profile_attribute_group: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_get_profile_attribute_group_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_group(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_group: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_code_type: function
    (
        code,
        type,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_service + 'get'
                + "/code/type"
                + "/code/" + code            
                + "/type/" + type            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_code_type_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_get_profile_attribute_code_type_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_code_type(data);} catch(e) { _log("Error calling: error_get_profile_attribute_code_type: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_get_profile_attribute_code_type_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_code_type(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_code_type: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.profile_attribute_text = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.profile_attribute_text.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_attribute_text: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_text_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_count_profile_attribute_text_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_text(data);} catch(e) { _log("Error calling: error_count_profile_attribute_text: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_count_profile_attribute_text_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_text(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_text: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_text_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_text_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_count_profile_attribute_text_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: error_count_profile_attribute_text_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_count_profile_attribute_text_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_text_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_text_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'count'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_text_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_count_profile_attribute_text_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_attribute_text_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_count_profile_attribute_text_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_text_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_text_profile_id_attribute_id: function
    (
        profile_id,
        attribute_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'count'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_text_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_count_profile_attribute_text_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_count_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_count_profile_attribute_text_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_attribute_text_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_attribute_text_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_browse_profile_attribute_text_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_attribute_text_filter(data);} catch(e) { _log("Error calling: error_browse_profile_attribute_text_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_browse_profile_attribute_text_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_attribute_text_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_attribute_text_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_text_uuid: function
    (
        status,
        sort,
        group,
        uuid,
        date_modified,
        profile_id,
        attribute_id,
        attribute_value,
        active,
        date_created,
        type,
        order,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "group": group
            , "uuid": uuid
            , "date_modified": date_modified
            , "profile_id": profile_id
            , "attribute_id": attribute_id
            , "attribute_value": attribute_value
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_text_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_set_profile_attribute_text_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: error_set_profile_attribute_text_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_set_profile_attribute_text_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_text_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_attribute_text_profile_id: function
    (
        status,
        sort,
        group,
        uuid,
        date_modified,
        profile_id,
        attribute_id,
        attribute_value,
        active,
        date_created,
        type,
        order,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'set'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "group": group
            , "uuid": uuid
            , "date_modified": date_modified
            , "profile_id": profile_id
            , "attribute_id": attribute_id
            , "attribute_value": attribute_value
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_text_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_set_profile_attribute_text_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: error_set_profile_attribute_text_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_set_profile_attribute_text_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_text_profile_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_attribute_text_profile_id_attribute_id: function
    (
        status,
        sort,
        group,
        uuid,
        date_modified,
        profile_id,
        attribute_id,
        attribute_value,
        active,
        date_created,
        type,
        order,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'set'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "group": group
            , "uuid": uuid
            , "date_modified": date_modified
            , "profile_id": profile_id
            , "attribute_id": attribute_id
            , "attribute_value": attribute_value
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_text_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_set_profile_attribute_text_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_set_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_set_profile_attribute_text_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_attribute_text_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_text_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_del_profile_attribute_text_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: error_del_profile_attribute_text_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_del_profile_attribute_text_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_text_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_text_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'del'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_text_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_del_profile_attribute_text_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: error_del_profile_attribute_text_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_del_profile_attribute_text_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_text_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_text_profile_id_attribute_id: function
    (
        profile_id,
        attribute_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'del'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_text_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_del_profile_attribute_text_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_del_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_del_profile_attribute_text_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_text_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_text_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_get_profile_attribute_text_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: error_get_profile_attribute_text_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_get_profile_attribute_text_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_text_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_text_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_text_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'get'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_text_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_get_profile_attribute_text_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_attribute_text_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_get_profile_attribute_text_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_text_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_text_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_text_profile_id_attribute_id: function
    (
        profile_id,
        attribute_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_text_service + 'get'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_text_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_text_get_profile_attribute_text_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_get_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_text_get_profile_attribute_text_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_text_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_text_profile_id_attribute_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.profile_attribute_data = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.profile_attribute_data.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_attribute_data: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_data_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_count_profile_attribute_data_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_data(data);} catch(e) { _log("Error calling: error_count_profile_attribute_data: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_count_profile_attribute_data_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_data(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_data: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_data_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_data_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_count_profile_attribute_data_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: error_count_profile_attribute_data_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_count_profile_attribute_data_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_data_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_data_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'count'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_data_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_count_profile_attribute_data_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_attribute_data_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_count_profile_attribute_data_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_data_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_data_profile_id_attribute_id: function
    (
        profile_id,
        attribute_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'count'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_attribute_data_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_count_profile_attribute_data_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_count_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_count_profile_attribute_data_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_count_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_attribute_data_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_attribute_data_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_browse_profile_attribute_data_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_attribute_data_filter(data);} catch(e) { _log("Error calling: error_browse_profile_attribute_data_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_browse_profile_attribute_data_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_attribute_data_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_attribute_data_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_data_uuid: function
    (
        status,
        sort,
        group,
        uuid,
        date_modified,
        profile_id,
        attribute_id,
        attribute_value,
        active,
        date_created,
        type,
        order,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "group": group
            , "uuid": uuid
            , "date_modified": date_modified
            , "profile_id": profile_id
            , "attribute_id": attribute_id
            , "attribute_value": attribute_value
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_data_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_set_profile_attribute_data_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: error_set_profile_attribute_data_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_set_profile_attribute_data_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_data_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_attribute_data_profile_id: function
    (
        status,
        sort,
        group,
        uuid,
        date_modified,
        profile_id,
        attribute_id,
        attribute_value,
        active,
        date_created,
        type,
        order,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'set'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "group": group
            , "uuid": uuid
            , "date_modified": date_modified
            , "profile_id": profile_id
            , "attribute_id": attribute_id
            , "attribute_value": attribute_value
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_data_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_set_profile_attribute_data_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: error_set_profile_attribute_data_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_set_profile_attribute_data_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_data_profile_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_profile_attribute_data_profile_id_attribute_id: function
    (
        status,
        sort,
        group,
        uuid,
        date_modified,
        profile_id,
        attribute_id,
        attribute_value,
        active,
        date_created,
        type,
        order,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'set'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "sort": sort
            , "group": group
            , "uuid": uuid
            , "date_modified": date_modified
            , "profile_id": profile_id
            , "attribute_id": attribute_id
            , "attribute_value": attribute_value
            , "active": active
            , "date_created": date_created
            , "type": type
            , "order": order
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_attribute_data_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_set_profile_attribute_data_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_set_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_set_profile_attribute_data_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_set_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_attribute_data_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_data_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_del_profile_attribute_data_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: error_del_profile_attribute_data_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_del_profile_attribute_data_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_data_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_data_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'del'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_data_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_del_profile_attribute_data_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: error_del_profile_attribute_data_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_del_profile_attribute_data_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_data_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_data_profile_id_attribute_id: function
    (
        profile_id,
        attribute_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'del'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_attribute_data_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_del_profile_attribute_data_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_del_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_del_profile_attribute_data_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_del_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_data_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_data_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_get_profile_attribute_data_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: error_get_profile_attribute_data_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_get_profile_attribute_data_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_data_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_data_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_data_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'get'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_data_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_get_profile_attribute_data_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_attribute_data_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_get_profile_attribute_data_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_data_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_data_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_attribute_data_profile_id_attribute_id: function
    (
        profile_id,
        attribute_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_attribute_data_service + 'get'
                + "/profile-id/attribute-id"
                + "/profile_id/" + profile_id            
                + "/attribute_id/" + attribute_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_attribute_data_profile_id_attribute_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_attribute_data_get_profile_attribute_data_profile_id_attribute_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: error_get_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_attribute_data_get_profile_attribute_data_profile_id_attribute_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_attribute_data_profile_id_attribute_id(data);} catch(e) { _log("Error calling: handle_get_profile_attribute_data_profile_id_attribute_id: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.profile_device = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.profile_device.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_profile_device: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_device_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_count_profile_device_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_device(data);} catch(e) { _log("Error calling: error_count_profile_device: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_count_profile_device_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_device(data);} catch(e) { _log("Error calling: handle_count_profile_device: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_device_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_device_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_count_profile_device_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_device_uuid(data);} catch(e) { _log("Error calling: error_count_profile_device_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_count_profile_device_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_device_uuid(data);} catch(e) { _log("Error calling: handle_count_profile_device_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_device_profile_id_device_id: function
    (
        profile_id,
        device_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'count'
                + "/profile-id/device-id"
                + "/profile_id/" + profile_id            
                + "/device_id/" + device_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_device_profile_id_device_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_count_profile_device_profile_id_device_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_device_profile_id_device_id(data);} catch(e) { _log("Error calling: error_count_profile_device_profile_id_device_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_count_profile_device_profile_id_device_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_device_profile_id_device_id(data);} catch(e) { _log("Error calling: handle_count_profile_device_profile_id_device_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_device_profile_id_token: function
    (
        profile_id,
        token,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'count'
                + "/profile-id/token"
                + "/profile_id/" + profile_id            
                + "/token/" + token            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_device_profile_id_token_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_count_profile_device_profile_id_token_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_device_profile_id_token(data);} catch(e) { _log("Error calling: error_count_profile_device_profile_id_token: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_count_profile_device_profile_id_token_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_device_profile_id_token(data);} catch(e) { _log("Error calling: handle_count_profile_device_profile_id_token: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_device_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'count'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_device_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_count_profile_device_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_device_profile_id(data);} catch(e) { _log("Error calling: error_count_profile_device_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_count_profile_device_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_device_profile_id(data);} catch(e) { _log("Error calling: handle_count_profile_device_profile_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_device_device_id: function
    (
        device_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'count'
                + "/device-id"
                + "/device_id/" + device_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_device_device_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_count_profile_device_device_id_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_device_device_id(data);} catch(e) { _log("Error calling: error_count_profile_device_device_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_count_profile_device_device_id_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_device_device_id(data);} catch(e) { _log("Error calling: handle_count_profile_device_device_id: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_profile_device_token: function
    (
        token,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'count'
                + "/token"
                + "/token/" + token            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_profile_device_token_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_count_profile_device_token_callback", true);
            // call a method that can be inline callback
            try {error_count_profile_device_token(data);} catch(e) { _log("Error calling: error_count_profile_device_token: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_count_profile_device_token_callback", false);
            // call a method that can be inline callback
            try {handle_count_profile_device_token(data);} catch(e) { _log("Error calling: handle_count_profile_device_token: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_profile_device_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_profile_device_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_browse_profile_device_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_profile_device_filter(data);} catch(e) { _log("Error calling: error_browse_profile_device_filter: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_browse_profile_device_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_profile_device_filter(data);} catch(e) { _log("Error calling: handle_browse_profile_device_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_profile_device_uuid: function
    (
        status,
        uuid,
        date_modified,
        profile_id,
        token,
        secret,
        device_version,
        device_type,
        active,
        date_created,
        device_os,
        device_id,
        device_platform,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "uuid": uuid
            , "date_modified": date_modified
            , "profile_id": profile_id
            , "token": token
            , "secret": secret
            , "device_version": device_version
            , "device_type": device_type
            , "active": active
            , "date_created": date_created
            , "device_os": device_os
            , "device_id": device_id
            , "device_platform": device_platform
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_profile_device_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_set_profile_device_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_profile_device_uuid(data);} catch(e) { _log("Error calling: error_set_profile_device_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_set_profile_device_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_profile_device_uuid(data);} catch(e) { _log("Error calling: handle_set_profile_device_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_profile_device_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_device_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_del_profile_device_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_device_uuid(data);} catch(e) { _log("Error calling: error_del_profile_device_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_del_profile_device_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_device_uuid(data);} catch(e) { _log("Error calling: handle_del_profile_device_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_device_profile_id_device_id: function
    (
        profile_id,
        device_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'del'
                + "/profile-id/device-id"
                + "/profile_id/" + profile_id            
                + "/device_id/" + device_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_device_profile_id_device_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_del_profile_device_profile_id_device_id_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_device_profile_id_device_id(data);} catch(e) { _log("Error calling: error_del_profile_device_profile_id_device_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_del_profile_device_profile_id_device_id_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_device_profile_id_device_id(data);} catch(e) { _log("Error calling: handle_del_profile_device_profile_id_device_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_device_profile_id_token: function
    (
        profile_id,
        token,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'del'
                + "/profile-id/token"
                + "/profile_id/" + profile_id            
                + "/token/" + token            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_device_profile_id_token_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_del_profile_device_profile_id_token_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_device_profile_id_token(data);} catch(e) { _log("Error calling: error_del_profile_device_profile_id_token: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_del_profile_device_profile_id_token_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_device_profile_id_token(data);} catch(e) { _log("Error calling: handle_del_profile_device_profile_id_token: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_profile_device_token: function
    (
        token,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'del'
                + "/token"
                + "/token/" + token            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_profile_device_token_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_del_profile_device_token_callback", true);
            // call a method that can be inline callback
            try {error_del_profile_device_token(data);} catch(e) { _log("Error calling: error_del_profile_device_token: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_del_profile_device_token_callback", false);
            // call a method that can be inline callback
            try {handle_del_profile_device_token(data);} catch(e) { _log("Error calling: handle_del_profile_device_token: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_device_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_device_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_get_profile_device_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_device_uuid(data);} catch(e) { _log("Error calling: error_get_profile_device_uuid: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_get_profile_device_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_device_uuid(data);} catch(e) { _log("Error calling: handle_get_profile_device_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_device_profile_id_device_id: function
    (
        profile_id,
        device_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'get'
                + "/profile-id/device-id"
                + "/profile_id/" + profile_id            
                + "/device_id/" + device_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_device_profile_id_device_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_get_profile_device_profile_id_device_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_device_profile_id_device_id(data);} catch(e) { _log("Error calling: error_get_profile_device_profile_id_device_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_get_profile_device_profile_id_device_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_device_profile_id_device_id(data);} catch(e) { _log("Error calling: handle_get_profile_device_profile_id_device_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_device_profile_id_token: function
    (
        profile_id,
        token,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'get'
                + "/profile-id/token"
                + "/profile_id/" + profile_id            
                + "/token/" + token            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_device_profile_id_token_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_get_profile_device_profile_id_token_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_device_profile_id_token(data);} catch(e) { _log("Error calling: error_get_profile_device_profile_id_token: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_get_profile_device_profile_id_token_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_device_profile_id_token(data);} catch(e) { _log("Error calling: handle_get_profile_device_profile_id_token: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_device_profile_id: function
    (
        profile_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'get'
                + "/profile-id"
                + "/profile_id/" + profile_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_device_profile_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_get_profile_device_profile_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_device_profile_id(data);} catch(e) { _log("Error calling: error_get_profile_device_profile_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_get_profile_device_profile_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_device_profile_id(data);} catch(e) { _log("Error calling: handle_get_profile_device_profile_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_device_device_id: function
    (
        device_id,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'get'
                + "/device-id"
                + "/device_id/" + device_id            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_device_device_id_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_get_profile_device_device_id_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_device_device_id(data);} catch(e) { _log("Error calling: error_get_profile_device_device_id: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_get_profile_device_device_id_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_device_device_id(data);} catch(e) { _log("Error calling: handle_get_profile_device_device_id: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_profile_device_token: function
    (
        token,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.profile_device_service + 'get'
                + "/token"
                + "/token/" + token            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_profile_device_token_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::profile_device_get_profile_device_token_callback", true);
            // call a method that can be inline callback
            try {error_get_profile_device_token(data);} catch(e) { _log("Error calling: error_get_profile_device_token: " + e);}
        }
        else {
            _log("SUCCESS::profile_device_get_profile_device_token_callback", false);
            // call a method that can be inline callback
            try {handle_get_profile_device_token(data);} catch(e) { _log("Error calling: handle_get_profile_device_token: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.country = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.country.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_country: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_country_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_count_country_callback", true);
            // call a method that can be inline callback
            try {error_count_country(data);} catch(e) { _log("Error calling: error_count_country: " + e);}
        }
        else {
            _log("SUCCESS::country_count_country_callback", false);
            // call a method that can be inline callback
            try {handle_count_country(data);} catch(e) { _log("Error calling: handle_count_country: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_country_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_country_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_count_country_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_country_uuid(data);} catch(e) { _log("Error calling: error_count_country_uuid: " + e);}
        }
        else {
            _log("SUCCESS::country_count_country_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_country_uuid(data);} catch(e) { _log("Error calling: handle_count_country_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_country_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'count'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_count_country_code_callback", true);
            // call a method that can be inline callback
            try {error_count_country_code(data);} catch(e) { _log("Error calling: error_count_country_code: " + e);}
        }
        else {
            _log("SUCCESS::country_count_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_country_code(data);} catch(e) { _log("Error calling: handle_count_country_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_country_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_country_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_browse_country_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_country_filter(data);} catch(e) { _log("Error calling: error_browse_country_filter: " + e);}
        }
        else {
            _log("SUCCESS::country_browse_country_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_country_filter(data);} catch(e) { _log("Error calling: handle_browse_country_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_country_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_country_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_set_country_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_country_uuid(data);} catch(e) { _log("Error calling: error_set_country_uuid: " + e);}
        }
        else {
            _log("SUCCESS::country_set_country_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_country_uuid(data);} catch(e) { _log("Error calling: handle_set_country_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_country_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'set'
                + "/code"
                + "/code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_set_country_code_callback", true);
            // call a method that can be inline callback
            try {error_set_country_code(data);} catch(e) { _log("Error calling: error_set_country_code: " + e);}
        }
        else {
            _log("SUCCESS::country_set_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_country_code(data);} catch(e) { _log("Error calling: handle_set_country_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_country_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_country_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_del_country_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_country_uuid(data);} catch(e) { _log("Error calling: error_del_country_uuid: " + e);}
        }
        else {
            _log("SUCCESS::country_del_country_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_country_uuid(data);} catch(e) { _log("Error calling: handle_del_country_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_country_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'del'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_del_country_code_callback", true);
            // call a method that can be inline callback
            try {error_del_country_code(data);} catch(e) { _log("Error calling: error_del_country_code: " + e);}
        }
        else {
            _log("SUCCESS::country_del_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_country_code(data);} catch(e) { _log("Error calling: handle_del_country_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_country: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_country_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_get_country_callback", true);
            // call a method that can be inline callback
            try {error_get_country(data);} catch(e) { _log("Error calling: error_get_country: " + e);}
        }
        else {
            _log("SUCCESS::country_get_country_callback", false);
            // call a method that can be inline callback
            try {handle_get_country(data);} catch(e) { _log("Error calling: handle_get_country: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_country_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_country_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_get_country_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_country_uuid(data);} catch(e) { _log("Error calling: error_get_country_uuid: " + e);}
        }
        else {
            _log("SUCCESS::country_get_country_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_country_uuid(data);} catch(e) { _log("Error calling: handle_get_country_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_country_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.country_service + 'get'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_country_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::country_get_country_code_callback", true);
            // call a method that can be inline callback
            try {error_get_country_code(data);} catch(e) { _log("Error calling: error_get_country_code: " + e);}
        }
        else {
            _log("SUCCESS::country_get_country_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_country_code(data);} catch(e) { _log("Error calling: handle_get_country_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.state = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.state.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_state: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_state_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_count_state_callback", true);
            // call a method that can be inline callback
            try {error_count_state(data);} catch(e) { _log("Error calling: error_count_state: " + e);}
        }
        else {
            _log("SUCCESS::state_count_state_callback", false);
            // call a method that can be inline callback
            try {handle_count_state(data);} catch(e) { _log("Error calling: handle_count_state: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_state_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_state_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_count_state_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_state_uuid(data);} catch(e) { _log("Error calling: error_count_state_uuid: " + e);}
        }
        else {
            _log("SUCCESS::state_count_state_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_state_uuid(data);} catch(e) { _log("Error calling: handle_count_state_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_state_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'count'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_state_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_count_state_code_callback", true);
            // call a method that can be inline callback
            try {error_count_state_code(data);} catch(e) { _log("Error calling: error_count_state_code: " + e);}
        }
        else {
            _log("SUCCESS::state_count_state_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_state_code(data);} catch(e) { _log("Error calling: handle_count_state_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_state_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_state_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_browse_state_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_state_filter(data);} catch(e) { _log("Error calling: error_browse_state_filter: " + e);}
        }
        else {
            _log("SUCCESS::state_browse_state_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_state_filter(data);} catch(e) { _log("Error calling: handle_browse_state_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_state_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_state_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_set_state_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_state_uuid(data);} catch(e) { _log("Error calling: error_set_state_uuid: " + e);}
        }
        else {
            _log("SUCCESS::state_set_state_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_state_uuid(data);} catch(e) { _log("Error calling: handle_set_state_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_state_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'set'
                + "/code"
                + "/code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_state_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_set_state_code_callback", true);
            // call a method that can be inline callback
            try {error_set_state_code(data);} catch(e) { _log("Error calling: error_set_state_code: " + e);}
        }
        else {
            _log("SUCCESS::state_set_state_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_state_code(data);} catch(e) { _log("Error calling: handle_set_state_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_state_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_state_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_del_state_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_state_uuid(data);} catch(e) { _log("Error calling: error_del_state_uuid: " + e);}
        }
        else {
            _log("SUCCESS::state_del_state_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_state_uuid(data);} catch(e) { _log("Error calling: handle_del_state_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_state_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'del'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_state_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_del_state_code_callback", true);
            // call a method that can be inline callback
            try {error_del_state_code(data);} catch(e) { _log("Error calling: error_del_state_code: " + e);}
        }
        else {
            _log("SUCCESS::state_del_state_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_state_code(data);} catch(e) { _log("Error calling: handle_del_state_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_state: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_state_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_get_state_callback", true);
            // call a method that can be inline callback
            try {error_get_state(data);} catch(e) { _log("Error calling: error_get_state: " + e);}
        }
        else {
            _log("SUCCESS::state_get_state_callback", false);
            // call a method that can be inline callback
            try {handle_get_state(data);} catch(e) { _log("Error calling: handle_get_state: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_state_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_state_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_get_state_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_state_uuid(data);} catch(e) { _log("Error calling: error_get_state_uuid: " + e);}
        }
        else {
            _log("SUCCESS::state_get_state_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_state_uuid(data);} catch(e) { _log("Error calling: handle_get_state_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_state_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.state_service + 'get'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_state_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::state_get_state_code_callback", true);
            // call a method that can be inline callback
            try {error_get_state_code(data);} catch(e) { _log("Error calling: error_get_state_code: " + e);}
        }
        else {
            _log("SUCCESS::state_get_state_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_state_code(data);} catch(e) { _log("Error calling: handle_get_state_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.city = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.city.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_city: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_city_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_count_city_callback", true);
            // call a method that can be inline callback
            try {error_count_city(data);} catch(e) { _log("Error calling: error_count_city: " + e);}
        }
        else {
            _log("SUCCESS::city_count_city_callback", false);
            // call a method that can be inline callback
            try {handle_count_city(data);} catch(e) { _log("Error calling: handle_count_city: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_city_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_city_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_count_city_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_city_uuid(data);} catch(e) { _log("Error calling: error_count_city_uuid: " + e);}
        }
        else {
            _log("SUCCESS::city_count_city_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_city_uuid(data);} catch(e) { _log("Error calling: handle_count_city_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_city_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'count'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_city_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_count_city_code_callback", true);
            // call a method that can be inline callback
            try {error_count_city_code(data);} catch(e) { _log("Error calling: error_count_city_code: " + e);}
        }
        else {
            _log("SUCCESS::city_count_city_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_city_code(data);} catch(e) { _log("Error calling: handle_count_city_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_city_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_city_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_browse_city_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_city_filter(data);} catch(e) { _log("Error calling: error_browse_city_filter: " + e);}
        }
        else {
            _log("SUCCESS::city_browse_city_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_city_filter(data);} catch(e) { _log("Error calling: handle_browse_city_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_city_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_city_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_set_city_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_city_uuid(data);} catch(e) { _log("Error calling: error_set_city_uuid: " + e);}
        }
        else {
            _log("SUCCESS::city_set_city_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_city_uuid(data);} catch(e) { _log("Error calling: handle_set_city_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_city_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'set'
                + "/code"
                + "/code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_city_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_set_city_code_callback", true);
            // call a method that can be inline callback
            try {error_set_city_code(data);} catch(e) { _log("Error calling: error_set_city_code: " + e);}
        }
        else {
            _log("SUCCESS::city_set_city_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_city_code(data);} catch(e) { _log("Error calling: handle_set_city_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_city_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_city_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_del_city_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_city_uuid(data);} catch(e) { _log("Error calling: error_del_city_uuid: " + e);}
        }
        else {
            _log("SUCCESS::city_del_city_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_city_uuid(data);} catch(e) { _log("Error calling: handle_del_city_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_city_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'del'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_city_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_del_city_code_callback", true);
            // call a method that can be inline callback
            try {error_del_city_code(data);} catch(e) { _log("Error calling: error_del_city_code: " + e);}
        }
        else {
            _log("SUCCESS::city_del_city_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_city_code(data);} catch(e) { _log("Error calling: handle_del_city_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_city: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_city_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_get_city_callback", true);
            // call a method that can be inline callback
            try {error_get_city(data);} catch(e) { _log("Error calling: error_get_city: " + e);}
        }
        else {
            _log("SUCCESS::city_get_city_callback", false);
            // call a method that can be inline callback
            try {handle_get_city(data);} catch(e) { _log("Error calling: handle_get_city: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_city_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_city_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_get_city_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_city_uuid(data);} catch(e) { _log("Error calling: error_get_city_uuid: " + e);}
        }
        else {
            _log("SUCCESS::city_get_city_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_city_uuid(data);} catch(e) { _log("Error calling: handle_get_city_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_city_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.city_service + 'get'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_city_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::city_get_city_code_callback", true);
            // call a method that can be inline callback
            try {error_get_city_code(data);} catch(e) { _log("Error calling: error_get_city_code: " + e);}
        }
        else {
            _log("SUCCESS::city_get_city_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_city_code(data);} catch(e) { _log("Error calling: handle_get_city_code: " + e);}
        }
        
    }
}
//-------------------------------------------------
profile.postal_code = function() {
    this.fn_callback;
    this.fn_callbacks;
    return_profile_obj = this;
}        
        
profile.postal_code.prototype = {
    //-------------------------------------------------
    init: function() {

    } 
    ,
    //-------------------------------------------------
    count_postal_code: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'count'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_postal_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_count_postal_code_callback", true);
            // call a method that can be inline callback
            try {error_count_postal_code(data);} catch(e) { _log("Error calling: error_count_postal_code: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_count_postal_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_postal_code(data);} catch(e) { _log("Error calling: handle_count_postal_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_postal_code_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'count'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_postal_code_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_count_postal_code_uuid_callback", true);
            // call a method that can be inline callback
            try {error_count_postal_code_uuid(data);} catch(e) { _log("Error calling: error_count_postal_code_uuid: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_count_postal_code_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_count_postal_code_uuid(data);} catch(e) { _log("Error calling: handle_count_postal_code_uuid: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    count_postal_code_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'count'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    count_postal_code_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_count_postal_code_code_callback", true);
            // call a method that can be inline callback
            try {error_count_postal_code_code(data);} catch(e) { _log("Error calling: error_count_postal_code_code: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_count_postal_code_code_callback", false);
            // call a method that can be inline callback
            try {handle_count_postal_code_code(data);} catch(e) { _log("Error calling: handle_count_postal_code_code: " + e);}
        }
    }
    ,
    //-------------------------------------------------
    browse_postal_code_filter: function
    (
        page,
        page_size,
        filter,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'browse'
                + "/filter"
                + "/page/" + page
                + "/page_size/" + page_size
                + "/filter/" + filter
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    browse_postal_code_filter_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_browse_postal_code_filter_callback", true);
            // call a method that can be inline callback
            try {error_browse_postal_code_filter(data);} catch(e) { _log("Error calling: error_browse_postal_code_filter: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_browse_postal_code_filter_callback", false);
            // call a method that can be inline callback
            try {handle_browse_postal_code_filter(data);} catch(e) { _log("Error calling: handle_browse_postal_code_filter: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    set_postal_code_uuid: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'set'
                + "/uuid"
                + "/uuid/" + uuid            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_postal_code_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_set_postal_code_uuid_callback", true);
            // call a method that can be inline callback
            try {error_set_postal_code_uuid(data);} catch(e) { _log("Error calling: error_set_postal_code_uuid: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_set_postal_code_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_set_postal_code_uuid(data);} catch(e) { _log("Error calling: handle_set_postal_code_uuid: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    set_postal_code_code: function
    (
        status,
        code,
        display_name,
        name,
        date_modified,
        uuid,
        active,
        date_created,
        description,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'set'
                + "/code"
                + "/code/" + code            
                        
                ;

        _log("serviceurl::", service_url);
            
        var obj = {
            hash: "08445a31a78661b5c746feff39a9db6e4e2cc5cf"
            , "status": status
            , "code": code
            , "display_name": display_name
            , "name": name
            , "date_modified": date_modified
            , "uuid": uuid
            , "active": active
            , "date_created": date_created
            , "description": description
        }

        _log("obj to submit::", obj);
        
        $.post(service_url, obj, fn, "json");
    }
    ,
    //-------------------------------------------------
    set_postal_code_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_set_postal_code_code_callback", true);
            // call a method that can be inline callback
            try {error_set_postal_code_code(data);} catch(e) { _log("Error calling: error_set_postal_code_code: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_set_postal_code_code_callback", false);
            // call a method that can be inline callback
            try {handle_set_postal_code_code(data);} catch(e) { _log("Error calling: handle_set_postal_code_code: " + e);}
        }
    }                    
    ,
    //-------------------------------------------------
    del_postal_code_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'del'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_postal_code_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_del_postal_code_uuid_callback", true);
            // call a method that can be inline callback
            try {error_del_postal_code_uuid(data);} catch(e) { _log("Error calling: error_del_postal_code_uuid: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_del_postal_code_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_del_postal_code_uuid(data);} catch(e) { _log("Error calling: handle_del_postal_code_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    del_postal_code_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'del'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");
    }
    ,
    //-------------------------------------------------
    del_postal_code_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);      
      
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_del_postal_code_code_callback", true);
            // call a method that can be inline callback
            try {error_del_postal_code_code(data);} catch(e) { _log("Error calling: error_del_postal_code_code: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_del_postal_code_code_callback", false);
            // call a method that can be inline callback
            try {handle_del_postal_code_code(data);} catch(e) { _log("Error calling: handle_del_postal_code_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_postal_code: function
    (
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'get'
                + ""
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_postal_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_get_postal_code_callback", true);
            // call a method that can be inline callback
            try {error_get_postal_code(data);} catch(e) { _log("Error calling: error_get_postal_code: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_get_postal_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_postal_code(data);} catch(e) { _log("Error calling: handle_get_postal_code: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_postal_code_uuid: function
    (
        uuid,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'get'
                + "/uuid"
                + "/uuid/" + uuid            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_postal_code_uuid_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_get_postal_code_uuid_callback", true);
            // call a method that can be inline callback
            try {error_get_postal_code_uuid(data);} catch(e) { _log("Error calling: error_get_postal_code_uuid: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_get_postal_code_uuid_callback", false);
            // call a method that can be inline callback
            try {handle_get_postal_code_uuid(data);} catch(e) { _log("Error calling: handle_get_postal_code_uuid: " + e);}
        }
        
    }
    ,
    //-------------------------------------------------
    get_postal_code_code: function
    (
        code,
        fn
    ){
        this.fn_callback = fn;
        var service_url = bb_profile_global.postal_code_service + 'get'
                + "/code"
                + "/code/" + code            
                ;

        _log("serviceurl::", service_url);
        
        $.get(service_url,
            null
            , fn
            , "json");

    }
    ,
    //-------------------------------------------------
    get_postal_code_code_callback: function(data) {

        _log("data", data);
        _log("data.message", data.message);
        _log("data.error", data.error);
        _log("data.data", data.data);
        _log("data.info", data.info);
        _log("data.action", data.action);
            
        if (data.error > 0 || data.error.length > 1) {
            _log("ERRORS::postal_code_get_postal_code_code_callback", true);
            // call a method that can be inline callback
            try {error_get_postal_code_code(data);} catch(e) { _log("Error calling: error_get_postal_code_code: " + e);}
        }
        else {
            _log("SUCCESS::postal_code_get_postal_code_code_callback", false);
            // call a method that can be inline callback
            try {handle_get_postal_code_code(data);} catch(e) { _log("Error calling: handle_get_postal_code_code: " + e);}
        }
        
    }
}






